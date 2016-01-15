@if($votes->count() !== 0)
    <span class="col-md-12 text-center">Ocene: </span><br><br>
    @if(App\Vote::level(1)->by($user->userable_id)->count())
        <div class="row">
            <div class="activity-mini">
                <div class="col-md-6 text-right">
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                </div>
                <div class="col-md-6 text-left">
                    {{ App\Vote::level(1)->by($user->userable_id)->count() }}
                </div>
            </div>
        </div>
    @endif
    @if(App\Vote::level(2)->by($user->userable_id)->count())
        <div class="row">
            <div class="activity-mini">
                <div class="col-md-6 text-right">
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                </div>
                <div class="col-md-6 text-left">
                    {{ App\Vote::level(2)->by($user->userable_id)->count() }}
                </div>
            </div>
        </div>
    @endif
    @if(App\Vote::level(3)->by($user->userable_id)->count())
        <div class="row">
            <div class="activity-mini">
                <div class="col-md-6 text-right">
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                </div>
                <div class="col-md-6 text-left">
                    {{ App\Vote::level(3)->by($user->userable_id)->count() }}
                </div>
            </div>
        </div>
    @endif
    @if(App\Vote::level(4)->by($user->userable_id)->count())
        <div class="row">
            <div class="activity-mini">
                <div class="col-md-6 text-right">
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                </div>
                <div class="col-md-6 text-left">
                    {{ App\Vote::level(4)->by($user->userable_id)->count() }}
                </div>
            </div>
        </div>
    @endif
    @if(App\Vote::level(5)->by($user->userable_id)->count())
        <div class="row">
            <div class="activity-mini">
                <div class="col-md-6 text-right">
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                    <i class="glyphicon glyphicon-star text-muted" style="color:rgba(201, 163, 14, 0.96);"></i>
                </div>
                <div class="col-md-6 text-left">
                    {{ App\Vote::level(5)->by($user->userable_id)->count()}}
                </div>
            </div>
        </div>
    @endif
@endif