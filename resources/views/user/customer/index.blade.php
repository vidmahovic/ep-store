@extends('app')

@section('content')
    @if($customers->isEmpty())

    @else
        <table class="table table-hover order-list">
            <thead>
            <tr>
                <th>Ime in priimek</th>
                <th>Naslov</th>
                <th>Status</th>
                <th>Pridružen</th>
                <th></th>
                <th class="text-center">Deaktiviraj</th>
            </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr class="order-list__item">
                        <td><a href="{{ route('user.customers.show', [$customer->id]) }}">{{$customer->user->name }} {{ $customer->user->surname }}</a></td>
                        <td>{{ $customer->street }}, {{ $customer->city->zip_code }} {{ $customer->city->name }}</td>
                        <td>
                            @if($customer->trashed())
                                deaktiviran
                            @else
                                aktiviran
                            @endif
                        </td>
                        <td>{{ $customer->user->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </button>
                        </td>
                        <td>
                            @if(! $customer->trashed())
                            <div class="checkbox text-center">
                                <label>
                                    <input type="checkbox">
                                </label>
                            </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $customers->render() !!}
            </div>
    @endif
@endsection