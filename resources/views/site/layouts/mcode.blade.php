<!DOCTYPE html>
<html class="@yield('layout', 'boxed ')" itemscope @hasSection('htmlschema')itemtype="https://schema.org/@yield('htmlschema')"@endif @hasSection('htmlschema2')itemtype="https://schema.org/@yield('htmlschema2')" @endif @hasSection('htmlschema3')itemtype="https://schema.org/@yield('htmlschema3')" @endif>
    <head>
        <!-- Basic -->
        <!-- Mobile Metas -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
        <link rel="shortcut icon" href="{{ asset('site/img/favicon.ico') }}" type="image/x-icon" />
        <link rel="apple-touch-icon" href="{{ asset('site/img/apple-touch-icon.png') }}">

        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if(\App::environment() === 'production')
            @include('site.layouts.partials.head-prod')
        @elseif(\App::environment() === 'stage')
            @include('site.layouts.partials.head-stage')
        @elseif(\App::environment() === 'development')
            @include('site.layouts.partials.head-dev')
        @elseif(\App::environment() === 'local')
            @include('site.layouts.partials.head-local')
        @else
            @include('site.layouts.partials.head')
        @endif

        @yield('meta')

        @yield('jsonld')

        @yield('styles')

        @yield('topjs')

        <style>
            .portfolio-list .portfolio-item {z-index: 2!important; }
            div.header-nav-feature a {z-index: 3!important; }
            .nav-sidebar .nav-item.menu-open {background-color: #212529!important; }
            li.menu-open>ul>li {margin-left: 20px!important }
        </style>

    </head>
    <body @hasSection('bodyClasses') class="@yield('bodyClasses')"  @endif @hasSection('bodyschema') itemscope="" itemtype="http://schema.org/@yield('bodyschema')" @endif>
            {{-- @if (env('CUSTOMDEBUG')!='ON' /* ON/OFF */) --}}

        @if(\App::environment() === 'production')
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MQ96DWR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        @elseif(\App::environment() === 'stage')
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MV6G7TP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        @elseif(\App::environment() === 'development')

            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MV6G7TP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            {{-- <script> console.log("ENV: Development");</script> --}}
        @elseif(\App::environment() === 'local')
        @endif

        <div class="body">


            @hasSection('top-bar')
                @yield('top-bar')
               <header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 135, 'stickySetTop': '-135px', 'stickyChangeLogo': true}">
                    @include('site.layouts.partials.header')
                </header>
            @else
                <header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
                    @include('site.layouts.partials.header')
                </header>
            @endif



         {{-- <div role="main" class="main" style="min-height: calc(100vh - 600px);"> --}}
            <div role="main" class="main @yield('main-classes')">
                @yield('above-content')
                @yield('slider')
                @include('flash::message')
                    @yield('content')
                @yield('below-content')
            </div> <!-- main close -->

            @include('site.layouts.partials.footer')
        </div>

        @include('site.layouts.partials.javascript')

        @yield('scripts')

        <script>
            document.querySelectorAll( 'oembed[url]' ).forEach( element => {
                // Create the <a href="..." class="embedly-card"></a> element that Embedly uses
                // to discover the media.
                const anchor = document.createElement( 'a' );

                anchor.setAttribute( 'href', element.getAttribute( 'url' ) );
                anchor.className = 'embedly-card';

                element.appendChild( anchor );
            } );
        </script>


        <!-- {{App::environment()}} -->

{{-- @include('site.layouts.partials.debug') --}}

    </body>
</html>
