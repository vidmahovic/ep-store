@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nov produkt</div>
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('user/products') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Ime</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Serijska številka</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="serial_num" value="{{ old('serial_num') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Cena</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Proizvajalec</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="manufacturer" value="{{ old('manufacturer') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Zaloga</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="stock" value="{{ old('stock') }}">
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