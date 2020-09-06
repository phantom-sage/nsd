@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg @if(\App::getLocale() === 'en')border-left @elseif(\App::getLocale() === 'ar')border-right @endif">
                    <div class="card-header">
                        <h2 style="{{ setting_element_reading_style() }}" class="@if(\App::getLocale() === 'en')float-left en-font-600 @elseif(\App::getLocale() === 'ar')float-right ar-font-600 @endif">{{ __('ourservices.ourServices') }}</h2><div class="clearfix"></div>
                    </div><!-- card-header -->
                    <div class="card-body bg-primary text-primary">

                        <!-- web application -->
                        <div style="@if(\App::getLocale() === 'en')border-bottom-right-radius: 270px;@endif @if(\App::getLocale() === 'ar')border-bottom-left-radius: 270px;@endif {{ setting_element_reading_style() }}" class="row bg-white py-3">
                            <div class="col-lg-2 col-sm-12 @if(\App::getLocale() === 'ar')order-first @endif"><i style="font-size: 120px;" class="fa fa-code @if(\App::getLocale() === 'ar')float-right @endif" aria-hidden="true"></i></div><div class="clearfix"></div>
                            <div class="col-lg-10 col-sm-12 mt-3">
                                <h5 class="@if(\App::getLocale() === 'en')en-font-600 @elseif(\App::getLocale() === 'ar')ar-font-600 float-right @endif">{{ __('ourservices.webApplication') }}</h5><div class="clearfix"></div>
                                <p class="lead @if(\App::getLocale() === 'en')en-font-400 @elseif(\App::getLocale() === 'ar')ar-font-400 float-right @endif">{{ __('ourservices.webApplicationText') }}</p><div class="clearfix"></div>
                            </div>
                        </div><!-- row -->


                        <!-- mobile application -->
                        <div style="@if(\App::getLocale() === 'en')border-bottom-right-radius: 270px;@endif @if(\App::getLocale() === 'ar')border-bottom-left-radius: 270px;@endif {{ setting_element_reading_style() }}" class="row text-white py-3">
                            <div class="col-lg-2 col-sm-12 @if(\App::getLocale() === 'ar')order-first @endif"><i style="font-size: 120px;" class="fa fa-google @if(\App::getLocale() === 'ar')float-right @endif" aria-hidden="true"></i></div><div class="clearfix"></div>
                            <div class="col-lg-10 col-sm-12 mt-3">
                                <h5 class="@if(\App::getLocale() === 'en')en-font-600 @elseif(\App::getLocale() === 'ar')ar-font-600 float-right @endif">{{ __('ourservices.mobileApplication') }}</h5><div class="clearfix"></div>
                                <p class="lead @if(\App::getLocale() === 'en')en-font-400 @elseif(\App::getLocale() === 'ar')ar-font-400 float-right @endif">{{ __('ourservices.mobileApplicationText') }}</p><div class="clearfix"></div>
                            </div>
                        </div><!-- row -->


                        <!-- technical support for institutions -->
                        <div style="@if(\App::getLocale() === 'en')border-bottom-right-radius: 125px; border-top-right-radius: 125px;@endif @if(\App::getLocale() === 'ar')border-bottom-left-radius: 125px; border-top-left-radius: 125px;@endif {{ setting_element_reading_style() }}" class="row bg-white py-3 @if(\App::getLocale() === 'en')border-right-bottom-0 @elseif(\App::getLocale() === 'ar')border-left-bottom-0 @endif">
                            <div class="col-lg-2 col-sm-12 @if(\App::getLocale() === 'ar')order-first @endif"><i style="font-size: 120px;" class="fa fa-globe @if(\App::getLocale() === 'ar')float-right @endif" aria-hidden="true"></i></div><div class="clearfix"></div>
                            <div class="col-lg-10 col-sm-12 mt-3">
                                <h5 class="@if(\App::getLocale() === 'en')en-font-600 @elseif(\App::getLocale() === 'ar')ar-font-600 float-right @endif">{{ __('ourservices.technicalSupportForInstitutions') }}</h5><div class="clearfix"></div>
                                <p class="lead @if(\App::getLocale() === 'en')en-font-400 @elseif(\App::getLocale() === 'ar')ar-font-400 float-right @endif">{{ __('ourservices.technicalSupportForInstitutionsText') }}</p><div class="clearfix"></div>
                            </div>
                        </div><!-- row -->


                        <!-- information security -->
                        <div style="background-color: #7270db !important;{{ setting_element_reading_style() }}" class="row mt-2 text-white py-3">
                            <div class="col-lg-2 col-sm-12 @if(\App::getLocale() === 'ar')order-first @endif"><i style="font-size: 120px;" class="fa fa-shield @if(\App::getLocale() === 'ar')float-right @endif" aria-hidden="true"></i></div><div class="clearfix"></div>
                            <div class="col-lg-10 col-sm-12 mt-3">
                                <h5 class="@if(\App::getLocale() === 'en')en-font-600 @elseif(\App::getLocale() === 'ar')ar-font-600 float-right @endif">{{ __('ourservices.informationSecurity') }}</h5><div class="clearfix"></div>
                                <p class="lead @if(\App::getLocale() === 'en')en-font-400 @elseif(\App::getLocale() === 'ar')ar-font-400 float-right @endif">{{ __('ourservices.informationSecurityText') }}</p><div class="clearfix"></div>
                            </div>
                        </div><!-- row -->

                        <!-- designing mock identities -->
                        <div style="color: #7270db !important;@if(\App::getLocale() === 'en')border-top-right-radius: 125px;@endif @if(\App::getLocale() === 'ar')border-top-left-radius: 125px;@endif {{ setting_element_reading_style() }}" class="row bg-white py-3 mt-3">
                            <div class="col-lg-2 col-sm-12 @if(\App::getLocale() === 'ar')order-first @endif"><i style="font-size: 120px;" class="fa fa-magic @if(\App::getLocale() === 'ar')float-right @endif" aria-hidden="true"></i></div><div class="clearfix"></div>
                            <div class="col-lg-10 col-sm-12 mt-3">
                                <h5 class="@if(\App::getLocale() === 'en')en-font-600 @elseif(\App::getLocale() === 'ar')ar-font-600 float-right @endif">{{ __('ourservices.designingMockIdentities') }}</h5><div class="clearfix"></div>
                                <p class="lead @if(\App::getLocale() === 'en')en-font-400 @elseif(\App::getLocale() === 'ar')ar-font-400 float-right @endif">{{ __('ourservices.designingMockIdentitiesText') }}</p><div class="clearfix"></div>
                            </div>
                        </div><!-- row -->

                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
@endsection