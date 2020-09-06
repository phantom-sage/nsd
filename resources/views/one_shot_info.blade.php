

<!-- one shot info -->
<section style="{{ setting_element_reading_style() }}">
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <div class="card px-3 shadow-lg @if(\App::getLocale() == 'en') border-left @elseif(\App::getLocale() == 'ar') border-right @endif">
                <div class="card-body">
                    <h4 class="{{ setting_elements_font_600() }} {{ setting_elements_floating_direction() }} card-title font-weight-bold primary-color-text">
                        {{-- <i class="fa fa-home" aria-hidden="true"></i> --}}
                        {{ __('info.welcomeToNSD') }}
                    </h4>
                    <div class="clearfix"></div>
                    <p class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }} card-text lead">{{ __('info.welcomeToNSDInfo') }}</p>
                    <div class="clearfix"></div>
                    <hr>
                    <h5 class="{{ setting_elements_font_600() }} {{ setting_elements_floating_direction() }} font-weight-bold primary-color-tex">
                        {{-- <i class="fa fa-eye" aria-hidden="true"></i> --}}
                        {{ __('info.ourVision') }}
                    </h5>
                    <div class="clearfix"></div>
                    <p class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }} card-text lead">{{ __('info.ourVisionText') }}</p>
                    <div class="clearfix"></div>
                    <hr>
                    <h5 class="{{ setting_elements_font_600() }} {{ setting_elements_floating_direction() }} font-weight-bold primary-color-text">
                        {{-- <i class="fa fa-road" aria-hidden="true"></i> --}}
                        {{ __('info.ourMission') }}
                    </h5>
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
                    <p class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }} card-text lead">{{ __('info.ourMissionText') }}</p>
                    <div class="clearfix"></div>
                </div>
                </div>
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
</section>