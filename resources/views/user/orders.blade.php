@extends('app')

@section('content')

    <section data-section="orders">
        <div class="container">
            <div class="col col-lg-12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if($orders->isEmpty())
                    <h2>Ni naročil.</h2>
                @else

                    <div class="orders-list">

                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#pending" aria-controls="pending" role="tab" data-toggle="tab">Nepotrjena naročila</a></li>
                            <li role="presentation"><a href="#confirmed" aria-controls="confirmed" role="tab" data-toggle="tab">Potrjena Naročila</a></li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="pending">

                                @include('user.order.pending', ['orders' => $orders])

                            </div>
                            <div role="tabpanel" class="tab-pane" id="confirmed">

                                @include('user.order.confirmed', ['orders' => $orders])

                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection