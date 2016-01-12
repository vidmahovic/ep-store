<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-4 control-label">Ime</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Priimek</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="surname"value="{{ old('surname') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Elektronski naslov</label>
        <div class="col-md-6">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Naslov</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="street" value="{{ old('street') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Mesto</label>
        <div class="col-md-6">
            {!! Form::select('city_id', App\Municipality::lists('name', 'id'), null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Telefonska številka</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Geslo</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Ponovi geslo</label>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Registriraj se
            </button>
        </div>
    </div>
</form>
