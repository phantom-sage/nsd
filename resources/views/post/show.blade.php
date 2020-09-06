@extends('layouts.app')

@section('content')
<div class="container" style="direction: @if(\App::getLocale() === 'en') ltr @elseif(\App::getLocale() === 'ar') rtl @endif;">
    @if(Auth::user())
        @if(Auth::user()->id === $post->user_id || Auth::user()->is_admin)
        <div class="row mb-2">
            <div class="col-6">
                <a href="{{ route('posts.edit', ['id' => $post->id, 'lang' => \App::getLocale()]) }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }} btn btn-custom-primary"><div class="clearfix"></div>
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    {{ __('post.edit') }}
                </a>
            </div><!-- col -->
            <div class="col-6">
                <a onclick="event.preventDefault(); document.getElementById('delete-post-form').submit();" href="{{ route('posts.delete', ['id' => $post->id, 'lang' => \App::getLocale()]) }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }} btn btn-danger">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    {{ __('post.delete') }}
                </a>
                <form class="d-none" id="delete-post-form" action="{{ route('posts.delete', ['id' => $post->id, 'lang' => \App::getLocale()]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </div><!-- col -->
        </div><!-- row -->
        @endif
    @endif
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm mb-3">
                <img src="/storage/{{ $post->logo }}" class="img-fluid card-img-top" alt="post logo">
                <div class="card-header">
                    <h3 class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}">
                        @if(\App::getLocale() === 'en') {{ $post->en_title }}
                        @elseif(\App::getLocale() === 'ar') {{ $post->ar_title }}
                        @endif
                    </h3><div class="clearfix"></div>
                    <hr>
                    <h4 style="direction: @if(\App::getLocale() === 'en')ltr @elseif(\App::getLocale() === 'ar')rtl @endif;" class="{{ setting_elements_floating_direction() }} en-font-600">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        {{ $post->user->name }}
                    </h4><div class="clearfix"></div>
                    <hr>
                    <p class="{{ setting_elements_floating_direction() }}" style="direction: {{ setting_element_reading_style() }};">
                    @if($post->like)
                        <comments-component post-id="{{ $post->id }}" lang="{{ \App::getLocale() }}" likes-number="{{ $post->like->likes_number }}"></comments-component>
                    @else
                        <comments-component post-id="{{ $post->id }}" lang="{{ \App::getLocale() }}" likes-number="0"></comments-component>
                    @endif
                    </p><div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <p class="lead {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}">
                        @if(\App::getLocale() === 'en') {{ $post->en_body }}
                        @elseif(\App::getLocale() === 'ar') {{ $post->ar_body }}
                        @endif
                    </p>
                </div>
                <div class="card-footer en-font-400 text-muted text-center" style="direction: ltr;">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    {{ $post->created_at }}
                </div>
            </div>
        </div><!-- col -->
    </div><!-- row -->
    <hr>
    <div class="row">
        <div class="col-12">
            @if(count($post->comments) > 0)
                <h2 class="mb-5 {{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" style="{{  setting_element_reading_style() }};"><i class="fa fa-comments" aria-hidden="true"></i> {{ __('comment.comments') }}</h2><div class="clearfix"></div>
                @foreach($post->comments as $comment)
                    <ul style="@if(\App::getLocale() === 'en') ltr @elseif(\App::getLocale() === 'ar') rtl @endif">
                        <li style="{{ setting_element_reading_style() }};">
                            <h4 class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" style="{{ setting_element_reading_style() }};">{{ $comment->person_name }}</h4><div class="clearfix"></div>
                            <p style="{{ setting_element_reading_style() }};" class="{{ setting_elements_font_400() }} {{ setting_elements_floating_direction() }} lead ml-3">{{ $comment->comment_text }}</p><div class="clearfix"></div>
                        </li>
                    </ul>
                @endforeach
            @else
            <div class="{{ setting_element_warning_border_direction() }} alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ __('comment.noComments') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div><!-- alert -->
            @endif
            <form action="{{ route('comments.store', ['post_id' => $post->id, 'lang' => \App::getLocale()]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="{{ setting_elements_font_600() }} {{ setting_elements_floating_direction() }}" style="{{ setting_element_reading_style() }};" for="person_name">{{ __('comment.name') }}</label><div class="clearfix"></div>
                    <input style="{{ setting_element_reading_style() }};" type="text" value="{{ old('person_name') }}" class="@error('person_name') is-invalid @enderror form-control @if(\App::getLocale() === 'en') float-left @elseif(\App::getLocale() === 'ar') float-right @endif" id="person_name" name="person_name"><div class="clearfix"></div>
                    @error('person_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="{{ setting_elements_font_600() }} {{ setting_elements_floating_direction() }}" style="{{ setting_element_reading_style() }};" for="comment_text">{{ __('comment.comment') }}</label><div class="clearfix"></div>
                    <textarea style="{{ setting_element_reading_style() }};" name="comment_text" id="comment_text" class="@error('comment_text') is-invalid @enderror form-control {{ setting_elements_floating_direction() }}" rows="10"></textarea><div class="clearfix"></div>
                    @error('comment_text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-custom-primary {{ setting_elements_font_600() }}">{{ __('comment.commentButtonText') }}</button>
                </div>
            </form>
        </div><!-- col -->
    </div><!-- row -->
</div><!-- container -->
@endsection