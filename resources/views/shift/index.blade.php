@extends('home')

@section('content_body')
    <div class="card-header">
        <h1 class="card-title">
            Turnos
        </h1>
    </div>

    <div class="card-body">
        @if(auth()->user()->type == \App\Constants\TypeUser::ADMIN)
            @include('shift.admin', ['shift' =>$shifts])
        @else
            @include('shift.branch', ['shift' =>$shifts])
        @endif
    </div>
@stop
