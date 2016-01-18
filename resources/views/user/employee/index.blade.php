@extends('app')

@section('content')
    @if($employees->isEmpty())
        <h3 class="text-center">V bazi ni prodajalcev.</h3>
    @else
        <table class="table table-hover order-list">
            <thead>
            <tr>
                <th>Ime in priimek</th>
                <th>E-naslov</th>
                <th>Status</th>
                <th>Dodan</th>
                <th></th>
                <th class="text-center">Aktiviraj / Deaktiviraj</th>
            </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr class="order-list__item">
                    <td><a href="{{ route('user.employees.show', [$employee->id]) }}">{{$employee->user->name }} {{ $employee->user->surname }}</a></td>
                    <td><a href="mailto:{{ $employee->user->email }}">{{ $employee->user->email }}</a></td>
                    <td>
                        {!! $employee->user->getStatusSpan() !!} @if($employee->trashed()) ({{ $employee->deleted_at->format('d.m.Y \ob H:i') }}) @endif
                    </td>
                    <td>{{ $employee->user->created_at }}</td>
                    <td>
                        @if(! $employee->trashed())
                        <a href="{{ url('user/employees/'.$employee->id.'/edit') }}" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($employee->trashed())
                            {!! Form::open(['url' => 'user/employees/'.$employee->id.'/activate', 'method' => 'PUT']) !!}
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['url' => 'user/employees/'.$employee->id.'/deactivate', 'method' => 'PUT']) !!}
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
            {!! $employees->render() !!}
        </div>
    @endif
@endsection