@if($mean == 5)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    {{ $mean }}
@elseif($mean < 5 and $mean >= 4.5)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star-"></span>
    <span class="fa fa-star-half-empty"></span>
    {{ $mean }}
@elseif($mean < 4.5 and $mean >= 4)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star-o"></span>
    {{ $mean }}
@elseif($mean < 4 and $mean >= 3.5)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star-half-empty"></span>
    <span class="fa fa-star-o"></span>
    {{ $mean }}
@elseif($mean < 3.5 and $mean >= 3)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $mean }}
@elseif($mean < 3 and $mean >= 2.5)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star-half-empty"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $mean }}
@elseif($mean < 2.5 and $mean >= 2)
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $mean }}
@elseif($mean < 2 and $mean >= 1.5)
    <span class="fa fa-star"></span>
    <span class="fa fa-star-half-empty"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $mean }}
@elseif($mean < 1.5 and $mean >= 1)
    <span class="fa fa-star"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $mean }}
@elseif($mean < 1 and $mean >= 0.5)
    <span class="fa fa-star-half-empty"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $mean }}
@else
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    <span class="fa fa-star-o"></span>
    {{ $mean }}
@endif
