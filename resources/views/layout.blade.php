<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Stylesheets -->
        @if (!config('articles.custom_css'))
        <link rel="stylesheet" href="{{ asset('vendor/agpretto/articles/css/app.css') }}">
        @endif

        @stack( 'stylesheets' )

        <title>{{ config( 'app.name' ) }}{{ isset( $title ) ? " | {$title}" : '' }}</title>
    </head>
    <body>
        @yield('body')

    </body>
</html>
