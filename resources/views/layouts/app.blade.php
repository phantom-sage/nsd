<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- fav icon -->
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/x-icon" sizes="32x32">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    @if(\App::getLocale() === 'ar')<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">@endif
    @if(\App::getLocale() === 'en')<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">@endif

    <!-- font awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand @if(\App::getLocale() === 'ar')order-last @endif" href="{{ route('index.page', \App::getLocale()) }}">
                    <img src="{{ asset('images/logo/nsd_logo_white_32_x_32.png') }}" class="img-fluid" alt="nsd logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse @if(\App::getLocale() === 'ar')order-first @endif" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul style="direction: @if(\App::getLocale() === 'en')ltr @elseif(\App::getLocale() === 'ar')rtl @endif;" class="@if(\App::getLocale() === 'ar')ml-auto @endif navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('aboutus', \App::getLocale()) }}" class="@if(\App::getLocale() === 'en')en-font-600 @elseif(\App::getLocale() === 'ar')ar-font-600 @endif nav-link">{{ __('navbar.aboutUs') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ourservices.index', \App::getLocale()) }}" class="@if(\App::getLocale() === 'en')en-font-600 @elseif(\App::getLocale() === 'ar')ar-font-600 @endif nav-link">{{ __('navbar.ourServices') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('teams.index', \App::getLocale()) }}" class="@if(\App::getLocale() === 'en')en-font-600 @elseif(\App::getLocale() === 'ar')ar-font-600 @endif nav-link">{{ __('navbar.ourTeam') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contactus', \App::getLocale()) }}" class="@if(\App::getLocale() === 'en')en-font-600 @elseif(\App::getLocale() === 'ar')ar-font-600 @endif nav-link">{{ __('navbar.contactUs') }}</a>
                        </li>
                        <li class="@if(\App::getLocale() === 'en')en-font-600 @elseif(\App::getLocale() === 'ar')ar-font-600 @endif nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{ __('navbar.language') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <form action="{{ route('setLocale') }}" method="POST">
                                @csrf
                                <select name="language" class="dropdown-item">
                                    <option class="dropdown-item" @if(\App::getLocale() == 'ar') selected @endif value="ar">{{ __('navbar.ar') }}</option>
                                    <option class="dropdown-item" @if(\App::getLocale() == 'en') selected @endif value="en">{{ __('navbar.en') }}</option>
                                </select>
                                <button type="submit" class="@if(\App::getLocale() === 'en')en-font-600 @elseif(\App::getLocale() === 'ar')ar-font-600 @endif btn btn-primary d-block mx-auto mt-1">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    {{ __('navbar.set') }}
                                </button>
                              </form>
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul style="direction: @if(\App::getLocale() === 'en')ltr @elseif(\App::getLocale() === 'ar')rtl @endif;" class="@if(\App::getLocale() === 'ar')order-first @endif navbar-nav @if(\App::getLocale() === 'en')ml-auto @elseif(\App::getLocale() === 'ar')mr-auto @endif">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link @if(\App::getLocale() === 'en')en-font-600 @elseif(\App::getLocale() === 'ar')ar-font-600 @endif" href="{{ route('login') }}">{{ __('navbar.login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ setting_elements_font_600() }}" href="{{ route('register') }}">{{ __('navbar.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="{{ setting_elements_font_600() }} dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item btn btn-primary" href="{{ route('home') }}">{{ __('info.account') }}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="@if(\App::getLocale() === 'en') {{ route('posts.create', 'en') }} @elseif(\App::getLocale() === 'ar') {{ route('posts.create', 'ar') }} @endif">{{ __('navbar.createPost') }}</a>
                                    <div class="dropdown-divider"></div>
                                    @if(Auth::user()->is_admin)
                                    <a class="dropdown-item btn btn-primary" href="{{ route('teams.create', \App::getLocale()) }}">{{ __('navbar.createTeammate') }}</a>
                                    <div class="dropdown-divider"></div>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('navbar.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="bg-primary py-3 text-white footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 @if(\App::getLocale() == 'en') order-first @elseif(\App::getLocale() === 'ar') order-last @endif">
                        <img src="{{ asset('images/logo/nsd_logo_white_128_x_128.png') }}" alt="nsd logo" class="footer-nsd-logo d-block img-fluid @if(\App::getLocale() === 'ar') float-right @endif"><div class="clearfix"></div>
                        <p class="lead @if(\App::getLocale() === 'en')en-font-400 @elseif(\App::getLocale() === 'ar')ar-font-400 @endif">{{ __('info.welcomeToNSDInfo') }}</p>
                    </div><!-- col -->
                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <div class="important-links">
                            <h5 class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" style="@if(\App::getLocale() === 'en') ltr @elseif(\App::getLocale() === 'ar') rtl @endif">{{ __('footer.importantLinks') }}</h5><div class="clearfix"></div>
                            <a href="{{ route('ourservices.index', \App::getLocale()) }}" class="{{ setting_elements_font_600() }} {{ setting_elements_floating_direction() }}" style="{{ setting_element_reading_style() }}">{{ __('footer.ourServices') }}</a><div class="clearfix"></div>
                        </div>
                    </div><!-- col -->
                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <div class="information-links">
                            <h5 class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}">{{ __('footer.information') }}</h5><div class="clearfix"></div>
                            <a class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" href="{{ route('aboutus', \App::getLocale()) }}">{{ __('footer.aboutUs') }}</a><br><div class="clearfix"></div>
                            <a class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" href="{{ route('contactus', \App::getLocale()) }}">{{ __('footer.contactUs') }}</a><div class="clearfix"></div>
                        </div>
                    </div><!-- col -->
                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <div class="contact-us-links">
                            <h5 class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}">{{ __('footer.contactLinks') }}</h5><div class="clearfix"></div>
                            <span class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" style="{{ setting_element_reading_style() }}"><div class="clearfix"></div>
                                0115207094
                            </span><br>
                            <span class="{{ setting_elements_font_400() }} {{ setting_elements_floating_direction() }}" style="{{ setting_element_reading_style() }}"><div class="clearfix"></div>
                                {{ __('footer.khartom') }}
                            </span><br>
                            <span class="{{ setting_elements_floating_direction() }} {{ setting_elements_font_400() }}" style="{{ setting_element_reading_style() }}"><div class="clearfix"></div>
                                nsdnever@gmail.com 
                            </span>
                        </div>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </footer>
        <div class="bg-secondary text-white">
            <div class="container">
                <div class="lead py-2 {{ setting_elements_floating_direction() }} {{ setting_elements_font_600() }}" style="{{ setting_element_reading_style() }}">
                    {{ __('footer.copyrightText') }}
                </div><div class="clearfix"></div>
            </div>
        </div>
    </div>
</body>
</html>
