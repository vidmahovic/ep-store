@extends('app')

@section('content')

    <section data-section="activity-log">
        <div class="container">
            @if(isset($orders))
                @include('user.activity.orders');
            @endif
        </div>
    </section>

@endsection