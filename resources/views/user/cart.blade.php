@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Košarica</h2>
            <hr>
            <div class="col col-lg-12 cart-list">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Serijska številka</th>
                        <th>Naziv</th>
                        <th>Proizvajalec</th>
                        <th>Količina</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(! $products->isEmpty())
                            @foreach($products as $product)
                                <tr class="cart-list__item" data-id="{{ $product->id }}">
                                    <td>{{  $product->serial_num }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->manufacturer }}</td>
                                    <td>
                                        <select>
                                            @for ($i = 1; $i <= $product->stock ; $i++)
                                                <option value="{{ $i }}" @if($i == $quantities[$product->id]) selected="selected" @endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="...">
                                            <button type="button" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>Košarica je prazna.</p>
                        @endif
                    </tbody>
                </table>
                <br>
                <br>
                <br>
                <button class="btn btn-success pull-right">Oddaj naročilo</button>
            </div>
        </div>
    </div>
@endsection