@switch($status)
    @case(\App\Constants\StatusSchedule::CONFIRM)
        <span class="badge badge-primary">{{ $status }}</span>
        @break
    @case(\App\Constants\StatusSchedule::COMPLETE)
        <span class="badge badge-success">{{ $status }}</span>
        @break
    @case(\App\Constants\StatusSchedule::INCOMPLETE)
        <span class="badge badge-danger">{{ $status }}</span>
        @break
@endswitch
