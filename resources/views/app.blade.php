<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
  </head>
  <body id="app" class="min-h-screen w-screen bg-blue-100">

    <header class="pt-4 max-w-screen">
      
      @include('partials.nav')

    </header>

    @yield('content')
        
    
    @vite('resources/js/app.js')  
  </body>
</html>