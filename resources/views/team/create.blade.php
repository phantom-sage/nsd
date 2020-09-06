@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }}">
                        {{ __('team.createTeam') }}
                    </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('teams.store', \App::getLocale()) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="en_username">{{ __('team.enUsernameText') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="text" class="{{ setting_elements_floating_direction() }} form-control @error('en_username') is-invalid @enderror" id="en_username" name="en_username" autofocus required><div class="clearfix"></div>
                            <div class="clearfix"></div>
                            
                            @error('en_username')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="ar_username">{{ __('team.arUsernameText') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="text" class="{{ setting_elements_floating_direction() }} form-control @error('ar_username') is-invalid @enderror" id="ar_username" name="ar_username" autofocus required><div class="clearfix"></div>
                            
                            @error('ar_username')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="en_job_title">{{ __('team.enJobTitleText') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="text" class="{{ setting_elements_floating_direction() }} form-control @error('en_job_title') is-invalid @enderror" id="en_job_title" name="en_job_title" autofocus required><div class="clearfix"></div>
                            <div class="clearfix"></div>
                            
                            @error('en_job_title')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="ar_job_title">{{ __('team.arJobTitleText') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="text" class="{{ setting_elements_floating_direction() }} form-control @error('ar_job_title') is-invalid @enderror" id="ar_job_title" name="ar_job_title" autofocus required><div class="clearfix"></div>
                            <div class="clearfix"></div>
                            
                            @error('ar_job_title')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="en_fullname">{{ __('team.enFullnameText') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="text" class="{{ setting_elements_floating_direction() }} form-control @error('en_fullname') is-invalid @enderror" id="en_fullname" name="en_fullname" autofocus required><div class="clearfix"></div>
                            <div class="clearfix"></div>
                            
                            @error('en_fullname')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="ar_fullname">{{ __('team.arFullnameText') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="text" class="{{ setting_elements_floating_direction() }} form-control @error('ar_fullname') is-invalid @enderror" id="ar_fullname" name="ar_fullname" autofocus required><div class="clearfix"></div>
                            <div class="clearfix"></div>
                            
                            @error('ar_fullname')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>

                        <!-- here -->
                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="email">{{ __('team.emailText') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="text" class="{{ setting_elements_floating_direction() }} form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus required><div class="clearfix"></div>
                            <div class="clearfix"></div>
                            
                            @error('email')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="en_education">{{ __('team.enEducation') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="text" class="{{ setting_elements_floating_direction() }} form-control @error('en_education') is-invalid @enderror" id="en_education" name="en_education" autofocus required><div class="clearfix"></div>
                            <div class="clearfix"></div>
                            
                            @error('en_education')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="ar_education">{{ __('team.arEducation') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="text" class="{{ setting_elements_floating_direction() }} form-control @error('ar_education') is-invalid @enderror" id="ar_education" name="ar_education" autofocus required><div class="clearfix"></div>
                            <div class="clearfix"></div>
                            
                            @error('ar_education')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="en_language">{{ __('team.enLanguage') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="text" class="{{ setting_elements_floating_direction() }} form-control @error('en_language') is-invalid @enderror" id="en_language" name="en_language" autofocus required><div class="clearfix"></div>
                            <div class="clearfix"></div>
                            
                            @error('en_language')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="ar_language">{{ __('team.arLanguage') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="text" class="{{ setting_elements_floating_direction() }} form-control @error('ar_language') is-invalid @enderror" id="ar_language" name="ar_language" autofocus required><div class="clearfix"></div>
                            <div class="clearfix"></div>
                            
                            @error('ar_language')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="en_skills">{{ __('team.enSkills') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="text" class="{{ setting_elements_floating_direction() }} form-control @error('en_skills') is-invalid @enderror" id="en_skills" name="en_skills" autofocus required><div class="clearfix"></div>
                            <div class="clearfix"></div>
                            
                            @error('en_skills')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="ar_skills">{{ __('team.arSkills') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="text" class="{{ setting_elements_floating_direction() }} form-control @error('ar_skills') is-invalid @enderror" id="ar_skills" name="ar_skills" autofocus required><div class="clearfix"></div>
                            <div class="clearfix"></div>
                            
                            @error('ar_skills')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" for="logo">{{ __('team.logo') }}</label><div class="clearfix"></div>
                            <input style="{{ setting_element_reading_style() }}" type="file" class="{{ setting_elements_floating_direction() }} form-control @error('logo') is-invalid @enderror" id="logo" name="logo" autofocus required><div class="clearfix"></div>
                            <div class="clearfix"></div>
                            
                            @error('logo')
                                <span class="invalid-feedback {{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="clearfix"></div>
                            @enderror
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('team.createNewTeammate') }}
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