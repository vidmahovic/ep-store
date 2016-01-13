{!! Form::model($customer, ['route' => ['user.customers.update', $customer->id], 'method' => 'put']) !!}
<div class="form-group">
    {!! Form::label('email', 'Elektronski naslov', ['class' => 'col-md-4 control-label']) !!}
    {!! Form::email('email', $customer->user->email, ['class' => 'form-control']) !!}

    {!! Form::label('name', 'Ime', ['class' => 'col-md-4 control-label']) !!}
    {!! Form::text('name', $customer->user->name, ['class' => 'form-control']) !!}

    {!! Form::label('surname', 'Priimek', ['class' => 'col-md-4 control-label']) !!}
    {!! Form::text('surname', $customer->user->surname, ['class' => 'form-control']) !!}

    {!! Form::label('street', 'Naslov', ['class' => 'col-md-4 control-label']) !!}
    {!! Form::text('street', $customer->user->street, ['class' => 'form-control']) !!}

    {!! Form::label('city_id', 'Mesto', ['class' => 'col-md-4 control-label']) !!}
    {!! Form::select('city_id', App\Municipality::lists('name', 'id'), $customer->city_id, ['class' => 'form-control']) !!}

    {!! Form::label('phone', 'Telefon', ['class' => 'col-md-4 control-label']) !!}
    {!! Form::text('phone', $customer->user->phone, ['class' => 'form-control']) !!}

    {!! Form::button('Prekliči', ['class' => 'btn btn-default']) !!}
    {!! Form::reset('Pobriši vnose', ['class' => 'btn btn-warning']) !!}
    {!! Form::submit('Posodobi', ['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}
</div>





{!! Form::close() !!}