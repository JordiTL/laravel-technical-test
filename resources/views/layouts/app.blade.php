<!DOCTYPE html>
<html lang="en">
<head>
    @include('fragments/head')
</head>
<body>
        <div class="header-container">
            @include('fragments/header')
        </div>

        <div class="container-fluid content-container">
            @yield('content')
        </div>


    @include('fragments/footer')

    <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" integrity="sha384-rY/jv8mMhqDabXSo+UCggqKtdmBfd3qC2/KvyTDNQ6PcUJXaxK1tMepoQda4g5vB" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/2.0.8/glide.min.js" integrity="sha384-kwmdggorZWDmxluNIBo33gTt0leigoMtt4jSmJVk6ifrmpR0N99q7qZuaag0x5eP" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>
