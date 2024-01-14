<!doctype html>
<html class="no-js" lang="zxx">
    <head>
    @include('includes.head')
		
    </head>
    <body>
	@yield('alert')

    @include('includes.preloader')
		
    @include('includes.header')

    @yield('bread')
	
    @yield('content')
		
    @include('includes.footer')

    @include('includes.footerJs')

    </body>
</html>