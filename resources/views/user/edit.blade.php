@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Urejanje podatkov</div>
                <div class="panel-body">
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <strong>Ops!</strong> Pri vaših vnosih je prišlo do napak.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::model($user, ['url' => 'user/users/'.$user->id, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="form-group">
                        {!! Form::label('email', 'Elektronski naslov', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Ime', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('surname', 'Priimek', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('surname', $user->surname, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="pull-right">
                        <a href="{{ URL::previous() }}" class="btn btn-default" role="button">Prekliči</a>
                        {!! Form::reset('Pobriši vnose', ['class' => 'btn btn-warning']) !!}
                        {!! Form::submit('Posodobi', ['class' => 'btn btn-success']) !!}</div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection