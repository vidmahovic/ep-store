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

                    {!! Form::model($product, ['route' => ['user.employees.update', $product->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}

                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <div class="form-group">
                        {!! Form::label('name', 'Ime', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::email('name', $product->name, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('serial_num', 'Serijska številka', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('serial_num', $product->serial_num, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('price', 'Cena', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                        <div class="form-group">
                            {!! Form::label('manufacturer', 'Proizvajalec', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('manufacturer', $product->manufacturer, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        {{--<div class="form-group">
                            {!! Form::label('image_path', 'Slika', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('image_path', $product->image_path, ['class' => 'form-control']) !!}
                            </div>
                        </div>--}}

                        <div class="form-group">
                            {!! Form::label('stock', 'Zaloga', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('stock', $product->stock, ['class' => 'form-control']) !!}
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