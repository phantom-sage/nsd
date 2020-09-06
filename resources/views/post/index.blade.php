@extends('layouts.app')


@section('content')
    @include('one_shot_info')
    <hr>
    <div class="container" style="direction: @if(\App::getLocale() === 'en') ltr @elseif(\App::getLocale() === 'ar') rtl @endif;">
        @if(session('newEmailSendStatus'))
            <x-alert type="success" :message="session('newEmailSendStatus')" />
        @endif
        @if(session('newPostStatus'))
            <x-alert type="success" :message="session('newPostStatus')" />
        @endif
        @if(session('deletedPostStatus'))
            <x-alert type="success" :message="session('deletedPostStatus')" />
        @endif
        @if(count($posts) > 0)
            <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-6 col-sm-12">
                    <div class="card shadow-lg mb-3 {{ setting_element_border_direction() }}">
                        <img src="/storage/{{ $post->logo }}" class="img-fluid card-img-top" alt="post logo">
                        <div class="card-header">
                            <h3 class="{{ setting_elements_floating_direction() }}">
                                @if(\App::getLocale() === 'en')<span class="en-font-600">{{ $post->en_title }}</span>
                                @elseif(\App::getLocale() === 'ar')<span class="ar-font-600">{{ $post->ar_title }}</span>
                                @endif
                            </h3><div class="clearfix"></div>
                            <hr>
                            <h4 style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} en-font-600">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                {{ $post->user->name }}
                            </h4><div class="clearfix"></div>
                            <hr>
                            <h5 style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} en-font-600">
                                <i class="fa fa-comments" aria-hidden="true"></i>
                                {{ count($post->comments) }}
                            </h5><div class="clearfix"></div>
                            <hr>
                            <p style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} en-font-600">
                            @if($post->like)
                                <display-comments-component likes-number="{{ $post->like->likes_number }}"></display-comments-component>
                            @else
                                <display-comments-component likes-number="0"></display-comments-component>
                            @endif
                            </p><div class="clearfix"></div>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-custom-outline-primary btn-lg shadow-sm {{ setting_elements_floating_direction() }}" href="{{ route('posts.show', [ 'id' => $post->id, 'lang' => \App::getLocale()]) }}">{{ __('info.seeFullPost') }}</a><div class="clearfix"></div>
                        </div>
                        <div class="card-footer en-font-400 text-muted text-center" style="direction: ltr;">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            {{ $post->updated_at }}
                        </div>
                    </div>
                </div><!-- col -->
            @endforeach
            @if($posts->links())
            <div class="col-12 en-font-600">
                {{ $posts->links() }}
            </div><!-- col -->
            @endif
        </div><!-- row -->
        @else
            <div class="row">
                <div class="col-12">
                    <div class="{{ setting_element_warning_border_direction() }} d-block alert alert-warning alert-dismissible fade show" role="alert">
                        <strong class="{{ setting_elements_font_600() }}">{{ __('post.noPosts') }}</strong><div class="clearfix"></div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><div class="clearfix"></div>
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- alert -->
                </div>
            </div>
        @endif
    </div><!-- container -->
@endsection