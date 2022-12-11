<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <!-- Meta tags  -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />

    <title>{{ config('app.name', 'العمليات') }}</title>
    <link rel="icon" type="image/png" href="images/favicon.png" />

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-icons.css') }}">



    <!-- jquery -->
    <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/hot-sneaks/jquery-ui.css">
    <script src="{{ asset('/js/jquery-1.12.4.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
  </head>

  <body
    x-data
    x-bind="$store.global.documentBody"
    class="is-header-blur is-sidebar-open"
  >
    <!-- App preloader-->
    <div
      class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900"
    >
      <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
    </div>





    <!-- Javascript Assets -->
    <script src="{{ asset('/js/app.js') }}"></script>

    
    @livewireScripts
  </body>
</html>