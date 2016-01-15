@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 lead text-center">Moj profil<hr></div>
                </div>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img class="img-circle avatar avatar-original" style="-webkit-user-select:none;
              display:block; margin:auto;" src="http://robohash.org/sitsequiquia.png?size=120x120">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="only-bottom-margin">{{ $user->name }} {{ $user->surname }}</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="text-muted">Elektronski naslov: </span><a href="mailto: ".{{ $user->email }}>{{ $user->email }}</a><br>
                                <span class="text-muted">Pridružen: </span>{{ $user->created_at->format('d.m.Y \ob H:i') }}<br>
                                <span class="text-muted">Status: </span>{!! $user->getStatusSpan() !!}<br><br>
                                @if($user->hasRole('customer'))
                                    <span class="text-muted">Naslov prebivališča: </span>{{ $user->userable->street }}<br>
                                    <span class="text-muted">Mesto: </span>{{ $user->userable->city->name }}, {{ $user->userable->city->zip_code }}<br>
                                    <span class="text-muted">Telefon: </span>{{ $user->userable->phone }}<br><br>
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if($user->hasRole('customer'))
                                    @include('user.customer.votes', ['votes' => App\Vote::where('customer_id', $user->userable->id)])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-default pull-right" href="{{ url('user/my-settings') }}"><i class="glyphicon glyphicon-pencil"></i> Uredi profil</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 lead text-center">
                        <hr>Zgodovina<hr>
                    </div>
                </div>
                <div class="row"></div>
            </div>
        </div>
    </div>
</div>

@endsection