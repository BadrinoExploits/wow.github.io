<?php
$time = time();
$dbtime = Auth::user()->timestamp;
$userid = Auth::user()->id;
$rainbux = Auth::user()->rainbux;
if($time > $dbtime)
{
    $rainbux = $rainbux + 25;
    DB::table('users')
        ->where('id', $userid)
        ->update(['timestamp' => $time + 86400]);

    DB::table('users')
        ->where('id', $userid)
        ->update(['rainbux' => $rainbux]);
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>
html {
  position: relative;
  min-height: 100%;
}
body {
  margin-bottom: 60px; /* Margin bottom by footer height */
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 20px; /* Set the fixed height of the footer here */
  line-height: 40px; /* Vertically center the text there */
}
</style>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            
            <?php
                $isroute = request()->routeIs('profile');
            ?>
            @if($isroute == false)
            <footer class="footer bg-white">
                <div class="container">
                    <p class="font-weight-bold text-muted">@Copyright 2021-2022 Rainway Team</p>
                    <div class="row text-muted">
                    <p class="text-muted">We are not affiliated with ROBLOX Corporation. | <a href="https://discord.gg/B7KsMcEY4A"> Discord </a> 
                     | <a href="https://github.com/Flofy-Dev/rainway-source/tree/main"> Github </a>
                    </p>
                    </div>
                </div>
            </footer>
            @endif
        </div>
    </body>
</html>
