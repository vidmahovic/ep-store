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
                    <tr class="cart-list__item" data-id="id">
                        <td>47515654ghjfkgd</td>
                        <td>iPhone</td>
                        <td>Apple Inc.</td>
                        <td>
                            <select>
                                <option value="1">1</option>
                                <option value="2" selected="selected">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="cart-list__item" data-id="id">
                        <td>47515654djhkfgkgd</td>
                        <td>iMac</td>
                        <td>Apple Inc.</td>
                        <td>
                            <select>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3" selected="selected">3</option>
                                <option value="4">4</option>
                            </select>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="cart-list__item" data-id="id">
                        <td>596548hdfgj5689</td>
                        <td>macBook</td>
                        <td>Apple Inc.</td>
                        <td>
                            <select>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected="selected">4</option>
                            </select>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            </div>
                        </td>
                    </tr>
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