@extends('layouts.app')

@section('content')
    <div class="container about-us">
        <div style="{{ setting_element_reading_style() }}" class="card shadow-lg {{ setting_element_border_direction() }}">
            <div class="card-body">
                <h3 style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}">{{ __('aboutus.ourBusinessStrategy') }}</h3><div class="clearfix"></div>
                <p style="{{ setting_element_reading_style() }}" class="lead {{ setting_elements_font_400() }} {{ setting_elements_floating_direction() }}">{{ __('aboutus.ourBusinessStrategyText') }}</p><div class="clearfix"></div>
                <hr>
                <h4 style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}">{{ __('aboutus.ourWorkStation') }}</h4><div class="clearfix"></div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <img src="{{ asset('images/our_workstation.jpg') }}" class="{{ setting_elements_floating_direction() }} img-fluid d-block"><div class="clearfix"></div>
                    </div><!-- col -->
                    <div class="col-lg-6 col-sm-12">
                        <h5 style="{{ setting_element_reading_style() }}" class="administration-and-work-departments {{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}">{{ __('aboutus.administrationAndWorkDepartments') }}</h5><div class="clearfix"></div>
                        <p style="{{ setting_element_reading_style() }}" class="lead {{ setting_elements_font_400() }} {{ setting_elements_floating_direction() }}">{{ __('aboutus.administrationAndWorkDepartmentsText') }}</p><div class="clearfix"></div>
                    </div><!-- col -->
                </div><!-- row -->
                <hr>
                <div class="row my-4">
                    <div class="col-12">
                        <a type="submit" href="@if(\App::getLocale() == 'en') {{ asset('files/company_profile.pdf') }} @elseif(\App::getLocale() == 'ar') {{ asset('files/company_profile.docx') }} @endif" class="@if(\App::getLocale() === 'en')en-font-600 @elseif(\App::getLocale() === 'ar')ar-font-600 @endif btn btn-outline-primary d-block w-100">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            {{ __('aboutus.downloadProfile') }}
                        </a>
                    </div><!-- col -->    
                </div><!-- row -->
            </div><!-- card-body -->
        </div><!-- card -->
    </div>
@endsection