<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>sports_site</title>
    @viteReactRefresh
    @vite(['resources/ts/app.ts', 'resources/sass/app.scss'])
  </head>
  <body>
    {{ $slot }}
  </body>
</html>
