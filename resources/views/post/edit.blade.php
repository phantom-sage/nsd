@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="{{ setting_elements_floating_direction() }}">
                        {{ __('post.editPost') }}
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', ['id' => $post->id, 'lang' => \App::getLocale()]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }};" for="en_title" class="form-label {{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}">{{ __('post.en_title') }}</label>

                            <input style="{{ setting_element_reading_style() }};" id="en_title" type="text" class="form-control @error('en_title') is-invalid @enderror" name="en_title" value="{{ $post->en_title }}" required autofocus>

                            @error('en_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><div class="clearfix"></div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }};" for="ar_title" class="form-label {{ setting_elements_font_600() }} {{ setting_elements_floating_direction() }}">{{ __('post.ar_title') }}</label>

                            <input style="{{ setting_element_reading_style() }};" id="ar_title" type="text" class="form-control @error('ar_title') is-invalid @enderror" name="ar_title" value="{{ $post->ar_title }}" required autofocus>

                            @error('ar_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><div class="clearfix"></div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" for="en_body" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }} form-label">{{ __('post.en_body') }}</label>

                            <textarea style="{{ setting_element_reading_style() }}" class="{{ setting_elements_font_400() }} form-control @error('en_body') is-invalid @enderror" name="en_body" rows="3" name="en_body">{{ $post->en_body }}</textarea>

                            @error('en_body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><div class="clearfix"></div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" for="ar_body" class="form-label {{ setting_elements_font_600() }} {{ setting_elements_floating_direction() }}">{{ __('post.ar_body') }}</label>

                            <textarea style="{{ setting_element_reading_style() }}" class="form-control @error('ar_body') is-invalid @enderror" name="ar_body" rows="3" name="ar_body">{{ $post->ar_body }}</textarea>

                            @error('ar_body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </><div class="clearfix"></div>

                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" for="logo" class="form-label {{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}">{{ __('post.logo') }}</label>
                            <input style="{{ setting_element_reading_style() }}" type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                            @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><div class="clearfix"></div>

                        <hr>
                        <div class="form-group row">
                            <div class="col-12 text-center"><h3 style="{{ setting_element_reading_style() }}">{{ __('post.previousLogo') }}</h3></div>
                            <img src="/storage/{{ $post->logo }}" class="col-8 mx-auto my-3">
                        </div>
                        <hr>


                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('post.updatePost') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection