@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Izdelki</h2>
        <hr>
        @for ($i = 0; $i < 6; $i++)
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="http://placehold.it/320x150" alt="">
                    <div class="caption">
                        <h4 class="pull-right">$24.99</h4>
                        <h4><a href="#">{{$i}}. Product</a>
                        </h4>
                        <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary">Dodaj v košarico</button>
                    </div>
                </div>
            </div>
        @endfor

    </div>
</div>

@endsection