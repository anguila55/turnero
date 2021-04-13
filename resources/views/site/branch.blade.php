@include('site.header')
@include('site.sideBar')
{!! Form::open((['route' => 'customer::create', 'method' => 'POST'])) !!}
@csrf
@foreach($customer as $key => $value)
    <input type="hidden" name={{ $key }} value={{ $value }}>
@endforeach
<div class="content px-5 mb-4">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-7 p-2">
            <div class="header-title text-left mb-2">Seleccione una sucursal</div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-7 px-0">
            <div class="card card-message">
                <div class="card-body">
                    <div class="row my-4">
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::select('branch_id', $branches->pluck('city', 'id'),null,['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Next Button-->

    <div class="row justify-content-center mt-4">
        <div class="col-lg-7 justify-content-end d-flex">
            <button type="submit" class="btn btn-primary button-icon next-button">SIGUIENTE
                <i class="fa fa-arrow-circle-right ml-2 f-30"></i>
            </button>
        </div>
    </div>
</div>
{!! Form::close() !!}
@include('site.footer')
