<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Ep Store</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(Auth::guest() || Auth::user()->hasRole('customer'))
                    <li><a href="{{ url('/cart') }}">Košarica</a></li>
                @endif
                @if (Auth::user())
                    @if(Auth::user()->hasRole('customer'))
                        <li><a href="{{ url('/user/my-orders') }}">Pretekli nakupi</a></li>
                    @endif
                    @if (Auth::user()->hasRole('employee'))
                        <li><a href="{{ url('user/customers') }}">Seznam strank</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Naročilo <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('user/orders') }}">Seznam vseh naročil</a></li>
                                {{--<li><a href="{{ url('user/orders', ['status' => 'pending']) }}">Nepotrjena naročila</a></li>
                                <li><a href="{{ url('user/orders', ['status' => 'confirmed']) }}">Potrjena naročila</a></li>--}}
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->hasRole('admin'))
                            <li><a href="{{ url('user/employees') }}">Seznam prodajalcev</a></li>
                    @endif
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Prijava</a></li>
                    <li><a href="{{ url('/auth/register') }}">Registracija</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if(! Auth::user()->hasRole('admin'))
                                <li><a href="{{ url('user/my-profile') }}">Moj profil</a></li>
                            @endif
                            <li><a href="{{ url('user/my-settings') }}">Nastavitve</a></li>
                            <li><a href="{{ url('/auth/logout') }}">Odjava</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>

        <!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/URI.js/1.17.0/URI.js"></script>
<script src="{{asset('/js/app.js')}}"></script>
</body>
</html>