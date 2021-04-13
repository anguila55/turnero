@extends('home')

@section('content_body')
    <div class="card-header">
        <h1 class="card-title">
            Clientes
        </h1>
    </div>

    <div class="card-body">
        @if(auth()->user()->type == \App\Constants\TypeUser::ADMIN)
            @include('customer.admin', ['customers' =>$customers])
        @else
            @include('customer.branch', ['customers' =>$customers])
        @endif
    </div>
@stop
