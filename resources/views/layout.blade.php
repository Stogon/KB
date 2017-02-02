<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- META -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="author" content="Joël Sunier">
	<meta name="description" content="Knowledge Base">
	<meta name="keywords" content="laravel, php, knowledge base">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- SCRIPTS -->
    @if(App::environment('local'))
        <link rel="stylesheet" href="{{ asset('assets/css/flexboxgrid.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/flexboxgrid.min.css') }}">
    @endif
    <!-- TITLE -->
    <title>{{ isset($title) ? $title . ' - ' : null }}Knowledge Base</title>
</head>
<body>
    <main class="site-container">
        <div class="site-pusher">
            @include('components.navbar')
            <div class="site-content">
                @include('components.header')
                @include('components.breadcrumb')
                <div id="content">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
                @include('components.footer')
            </div>
            <div class="site-cache" v-on:click="hideNav"></div>
        </div>
    </main>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
