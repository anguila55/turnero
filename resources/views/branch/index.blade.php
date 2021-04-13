@extends('home')

@section('content_body')
    <div class="card-header">
        <h1 class="card-title">
            Sucursales
        </h1>
    </div>

    <div class="card-body">
        @if(auth()->user()->type == \App\Constants\TypeUser::ADMIN)
            @include('branch.admin', ['branches' =>$branches])
        @else
            @include('branch.branch', ['branches' =>$branches, 'shifts'=>$shifts])
        @endif
    </div>
@stop
