@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-lg {{ setting_element_border_direction() }}">
            <div class="card-header">
                <div style="{{ setting_element_reading_style() }}" class="h3 {{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}">{{ __('contactus.contactUs') }}</div><div class="clearfix"></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7 col-sm-12 @if(\App::getLocale() === 'ar') order-last @endif">
                        <form action="{{ route('sending.email') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" style="{{ setting_element_reading_style() }}" class="{{ setting_elements_font_600() }} {{ setting_elements_floating_direction() }}">{{ __('contactus.name') }}</label><div class="clearfix"></div>
                                <input type="text" name="name" style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} @error('name') is-invalid @enderror form-control" id="name" value="{{ old('name') }}" autofocus required><div class="clearfix"></div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" style="{{ setting_element_reading_style() }}" for="email">{{ __('contactus.emailAddress') }}</label><div class="clearfix"></div>
                                <input style="{{ setting_element_reading_style() }}" type="email" name="email" class="{{ setting_elements_floating_direction() }} @error('email') is-invalid @enderror form-control" id="email" value="{{ old('email') }}" aria-describedby="emailHelp"><div class="clearfix"></div>
                                <small style="{{ setting_element_reading_style() }}" id="email" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }} form-text text-muted">{{ __('contactus.emailSmallTextHelper') }}</small><div class="clearfix"></div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" style="{{ setting_element_reading_style() }}" for="message">{{ __('contactus.message') }}</label><div class="clearfix"></div>
                                <textarea style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} @error('message') is-invalid @enderror form-control" name="message" id="message" rows="3">{{ old('message') }}</textarea><div class="clearfix"></div>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" style="{{ setting_element_reading_style() }}" class="btn btn-primary @if(\App::getLocale() === 'en') en-font-600 @elseif(\App::getLocale() === 'ar') ar-font-600 @endif">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    {{ __('contactus.send') }}
                                </button>
                            </div>
                        </form>
                    </div><!-- col -->
                    <div class="col-lg-5 col-sm-12">
                        <p class="lead {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" style="{{ setting_element_reading_style() }}">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            {{ __('contactus.address') }}: {{ __('contactus.khartoum') }}
                        </p><div class="clearfix"></div>
                        <p class="lead {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" style="{{ setting_element_reading_style() }}">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            {{ __('contactus.phone') }}: {{ __('contactus.phoneNumber') }}
                        </p><div class="clearfix"></div>
                        <p class="lead {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" style="{{ setting_element_reading_style() }}">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            {{ __('contactus.email') }}: nsdnever@gmail.com
                        </p><div class="clearfix"></div>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- card-body -->
        </div><!-- card -->
    </div><!-- container -->
@endsection