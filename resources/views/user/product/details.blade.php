@extends('app')

@section('content')
    <div class="thumbnail">
        <img class="img-responsive" src="{{ $product->image_path }}" alt="No image.">
        <div class="caption-full" style="margin-top: 3%;">
            <h3 class="pull-right">{{ number_format($product->price, 2) }}</h3>
            <h3>{{ $product->name }}</h3>
        </div>
        <div class="ratings" style="margin-top: 3%;">
            <h5 class="pull-right">{{ $product->voters()->count() }} ocen</h5>
            <p>
                @if($product->voters()->count() !== 0)
                    @include('user.product.rating', ['rate' => $product->voters()->sum('vote') / $product->voters()->count()])
                @else
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    Za ta izdelek še ni ocene.
                @endif
            </p>
        </div>
    </div>

    <div class="well">
        @if($product->voters()->get()->isEmpty())
            <p class="text-center">Za ta izdelek ni še nobene ocene.</p>
        @else
            @foreach($product->voters()->get() as $vote)
                <div class="row">
                    <div class="col-md-12">
                        @include('user.product.rating', ['rate' => $vote->pivot->vote ])
                        {{ $vote->user->name }} {{ $vote->user->surname }}
                        <span class="pull-right">{{ $vote->pivot->created_at }}</span>
                    </div>

                    <hr>

                </div>
            @endforeach
        @endif
    </div>
@endsection