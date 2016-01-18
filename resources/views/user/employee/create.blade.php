@extends('app')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nov prodajalec</div>
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



                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/employees') }}">
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

                        <br>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Potrdi
                                </button>
                                <button type="reset" class="btn btn-default">
                                    Pobriši vnose
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection