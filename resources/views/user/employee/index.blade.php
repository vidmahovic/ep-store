@extends('app')

@section('content')
    @if($employees->isEmpty())

    @else
        <table class="table table-hover order-list">
            <thead>
            <tr>
                <th>Ime in priimek</th>
                <th>E-naslov</th>
                <th>Status</th>
                <th>Dodan</th>
                <th></th>
                <th class="text-center">Deaktiviraj</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr class="order-list__item">
                    <td><a href="{{ route('user.employees.show', [$employee->id]) }}">{{$employee->user->name }} {{ $employee->user->surname }}</a></td>
                    <td><a href="mailto:{{ $employee->user->email }}">{{ $employee->user->email }}</a></td>
                    <td>
                        @if($employee->user->trashed())
                            deaktiviran ({{ $employee->deleted_at }})
                        @else
                            aktiviran
                        @endif
                    </td>
                    <td>{{ $employee->user->created_at }}</td>
                    <td>
                        <a href="{{ url('user/employees/'.$employee->id) }}" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                    </td>
                    <td>
                        @if(! $employee->user->trashed())
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
            {!! $employees->render() !!}
        </div>
    @endif
@endsection