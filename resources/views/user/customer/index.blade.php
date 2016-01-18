@extends('app')

@section('content')
    @if($customers->isEmpty())
        <h3 class="text-center">V bazi ni strank.</h3>
    @else
        <table class="table table-hover order-list">
            <thead>
            <tr>
                <th>Ime in priimek</th>
                <th>E-naslov</th>
                <th>Status</th>
                <th>Pridružen</th>
                <th></th>
                <th class="text-center">Aktiviraj / Deaktiviraj</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr class="order-list__item">
                    <td><a href="{{ route('user.employees.show', [$customer->id]) }}">{{$customer->user->name }} {{ $customer->user->surname }}</a></td>
                    <td><a href="mailto:{{ $customer->user->email }}">{{ $customer->user->email }}</a></td>
                    <td>
                        {!! $customer->user->getStatusSpan() !!} @if($customer->trashed()) ({{ $customer->deleted_at->format('d.m.Y \ob H:i') }}) @endif
                    </td>
                    <td>{{ $customer->user->created_at }}</td>
                    <td>
                        @if(! $customer->trashed())
                            <a href="{{ url('user/customers/'.$customer->id.'/edit') }}" type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($customer->trashed())
                            {!! Form::open(['url' => 'user/customers/'.$customer->id.'/activate', 'method' => 'PUT']) !!}
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['url' => 'user/customers/'.$customer->id.'/deactivate', 'method' => 'PUT']) !!}
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                            {!! Form::close() !!}
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