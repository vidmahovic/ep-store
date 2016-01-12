@extends('app')

@section('content')

    <section data-section="orders">
        <div class="container">
            <div class="col col-lg-12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @include('user.order.'.$orders->first()->status)
            </div>
        </div>
    </section>

@endsection