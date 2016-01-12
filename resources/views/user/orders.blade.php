@extends('app')

@section('content')

    <section data-section="orders">
        <div class="container">
            <div class="col col-lg-12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if($orders->isEmpty())
                    <h2>Ni naročil.</h2>
                @else
                    @foreach($orders as $order)
                        <p>{{ $order }}</p><br>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection