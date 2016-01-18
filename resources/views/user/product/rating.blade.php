@if($rate == 5)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    {{ $rate }}
@elseif($rate < 5 and $rate >= 4.5)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star-"></span>
    <span class="fa fa-star-half-empty"></span>
    {{ $rate }}
@elseif($rate < 4.5 and $rate >= 4)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star-o"></span>
    {{ $rate }}
@elseif($rate < 4 and $rate >= 3.5)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star-half-empty"></span>
    <span class="fa fa-star-o"></span>
    {{ $rate }}
@elseif($rate < 3.5 and $rate >= 3)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $rate }}
@elseif($rate < 3 and $rate >= 2.5)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star-half-empty"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $rate }}
@elseif($rate < 2.5 and $rate >= 2)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $rate }}
@elseif($rate < 2 and $rate >= 1.5)
    <span class="fa fa-star"></span>
    <span class="fa fa-star-half-empty"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $rate }}
@elseif($rate < 1.5 and $rate >= 1)
    <span class="fa fa-star"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $rate }}
@elseif($rate < 1 and $rate >= 0.5)
    <span class="fa fa-star-half-empty"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $rate }}
@else
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $rate }}
@endif
