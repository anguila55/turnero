<div class="row">
    <div class="col-12">
        <h2>Turnos</h2>
    </div>
    <div class="col-4">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $shifts->where('status',App\Constants\StatusSchedule::CONFIRM)->count() }}</h3>
                <p>{{ App\Constants\StatusSchedule::CONFIRM }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $shifts->where('status',App\Constants\StatusSchedule::COMPLETE)->count() }}</h3>
                <p>{{ App\Constants\StatusSchedule::COMPLETE }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $shifts->where('status',App\Constants\StatusSchedule::INCOMPLETE)->count() }}</h3>
                <p>{{ App\Constants\StatusSchedule::INCOMPLETE }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
        </div>
    </div>
</div>
