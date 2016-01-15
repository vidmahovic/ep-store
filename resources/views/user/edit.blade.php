@extends('app')

@section('content')

<div class="form-group">
{!! Form::model($user, ['route' => ['user.users.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('email', 'Elektronski naslov', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::email('email', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Ime', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('name', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('surname', 'Priimek', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('surname', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::button('Prekliči', ['class' => 'btn btn-default']) !!}
        {!! Form::reset('Pobriši vnose', ['class' => 'btn btn-warning']) !!}
        {!! Form::submit('Posodobi', ['class' => 'btn btn-success']) !!}
    </div>

{!! Form::close() !!}
</div>
@endsection
