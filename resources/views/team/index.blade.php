@extends('layouts.app')

@section('content')
<div class="container" style="direction: @if(\App::getLocale() === 'en') ltr @elseif(\App::getLocale() === 'ar') rtl @endif;">
    @if(session('newTeammate'))
        <x-alert type="success" :message="session('newTeammate')" />
    @endif
    @if(session('updateTeammateStatus'))
        <x-alert type="success" :message="session('updateTeammateStatus')" />
    @endif
    @if(session('deleteTeammateStatus'))
        <x-alert type="success" :message="session('deleteTeammateStatus')" />
    @endif
        @if(count($teams) > 0)
        <div class="row">
            @foreach ($teams as $team)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card shadow-lg mb-3">
                    <img src="/storage/{{ $team->logo }}" class="img-fluid card-img-top" alt="post logo">
                    <div class="card-header">
                        <h3 style="{{ setting_element_reading_style() }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            @if(\App::getLocale() === 'en') {{ $team->en_username }}
                            @elseif(\App::getLocale() === 'ar') {{ $team->ar_username }}
                            @endif
                        </h3>
                    </div>
                    <div class="card-body">
                        <p style="{{ setting_element_reading_style() }}" class="lead {{ setting_elements_font_400() }} {{ setting_elements_floating_direction() }}">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            @if(\App::getLocale() === 'en') <span class="en-font-600">Job:</span>  <span class="en-font-400">{{ $team->en_job_title }}</span>
                            @elseif(\App::getLocale() === 'ar') الوظيفة: {{ $team->ar_job_title }}
                            @endif
                        </p>
                        <div class="clearfix"></div>
                        <div class="dropdown">
                            <button style="{{ setting_element_reading_style() }}" class="btn @if(\App::getLocale() === 'en') en-font-400 @elseif(\App::getLocale() === 'ar') ar-font-400 @endif d-block w-100 btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('team.viewMore') }}
                            </button>
                            <div class="dropdown-menu @if(\App::getLocale() === 'en') float-left @elseif(\App::getLocale() === 'ar') float-right dropdown-menu-right @endif w-100" style="overflow-x: auto; direction: @if(\App::getLocale() === 'en') ltr @elseif(\App::getLocale() === 'ar') rtl @endif;" aria-labelledby="dropdownMenuButton">
                                <p style="{{ setting_element_reading_style() }}" class="lead {{ setting_elements_font_400() }} {{ setting_elements_floating_direction() }} dropdown-item">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    @if(\App::getLocale() === 'en') Fullname:  {{ $team->en_fullname }}
                                    @elseif(\App::getLocale() === 'ar') الاسم رباعي: {{ $team->ar_fullname }}
                                    @endif 
                                </p><div class="clearfix"></div>

                                <p style="{{ setting_element_reading_style() }}" class="lead {{ setting_elements_font_400() }} {{ setting_elements_floating_direction() }} dropdown-item">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    @if(\App::getLocale() === 'en') Email:  {{ $team->email }}
                                    @elseif(\App::getLocale() === 'ar') الايميل: {{ $team->email }}
                                    @endif 
                                </p><div class="clearfix"></div>

                                <p style="{{ setting_element_reading_style() }}" class="lead {{ setting_elements_font_400() }} {{ setting_elements_floating_direction() }} dropdown-item">
                                    <i class="fa fa-university" aria-hidden="true"></i>
                                    @if(\App::getLocale() === 'en') Education:  {{ $team->en_education }}
                                    @elseif(\App::getLocale() === 'ar') التعليم: {{ $team->ar_education }}
                                    @endif 
                                </p><div class="clearfix"></div>

                                <p style="{{ setting_element_reading_style() }}" class="lead {{ setting_elements_font_400() }} {{ setting_elements_floating_direction() }} dropdown-item">
                                    <i class="fa fa-language" aria-hidden="true"></i>
                                    @if(\App::getLocale() === 'en') Language:  {{ $team->en_language }}
                                    @elseif(\App::getLocale() === 'ar') اللغة: {{ $team->ar_language }}
                                    @endif 
                                </p><div class="clearfix"></div>

                                <p style="{{ setting_element_reading_style() }}" class="lead {{ setting_elements_font_400() }} {{ setting_elements_floating_direction() }} dropdown-item">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    @if(\App::getLocale() === 'en') Skills:  {{ $team->en_skills }}
                                    @elseif(\App::getLocale() === 'ar') المهارات: {{ $team->ar_skills }}
                                    @endif 
                                </p><div class="clearfix"></div>
                              
                            </div><div class="clearfix"></div>
                        </div><!-- dropdown -->
                    @if(Auth::user())
                        @if(Auth::user()->is_admin)
                        <hr>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <a href="{{ route('teams.edit', ['id' => $team->id, 'lang' => \App::getLocale()]) }}" class="btn btn-primary {{ setting_elements_font_600() }} {{ setting_elements_floating_direction() }}"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('team.editTeammateInfo') }}</a><div class="clearfix"></div>
                            </div><!-- col -->
                            <div class="col-6 mb-2">
                                <a onclick="event.preventDefault(); document.getElementById('delete-teammate-form').submit();" href="{{ route('teams.delete', ['id' => $team->id, 'lang' => \App::getLocale()]) }}" class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }} btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> {{ __('team.deleteTeammate') }}</a><div class="clearfix"></div>
                                <form id="delete-teammate-form" method="POST" action="{{ route('teams.delete', ['id' => $team->id, 'lang' => \App::getLocale()]) }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div><!-- col -->
                        </div><!-- row -->
                        @endif
                    @endif
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- col -->
            @endforeach
        </div><!-- row -->
        @else
            <div class="col-12 w-100">
                <div class="{{ setting_element_warning_border_direction() }} alert alert-warning alert-dismissible fade show" role="alert">
                    <strong class="{{ setting_elements_font_600() }}">{{ __('team.noTeammates') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div><!-- col -->
        @endforelse
</div><!-- container -->
@endsection