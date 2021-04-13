@include('site.header')
@include('site.sideBar')
{!! Form::open((['route' => 'customer::shift', 'method' => 'POST'])) !!}
@csrf
<input type="hidden" name='branch_id' value={{ $branch_id }}>
<input type="hidden" name='customer_id' value={{ $customer_id }}>
<input type="hidden" name='date' value={{ $date }} id="date">
<div class="content mb-4">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-7 p-2 px-4">
            <div class="header-title mb-2">Seleccione un horario</div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-7 col-sm-12">
            <div class="card card-message mx-3">

                <div class="card-body form-check form-check-inline">
                    <div class="row my-4 text-center ">
                        @foreach($avalilable_hours as $key=>$hour)
                        <div class="col-4">
                            <input class="form-check-input" name="hour" type="radio" id="inlineCheckbox{{ $key }}" value="{{ $hour }}" required>
                            <label class="form-check-label f-13" for="inlineCheckbox{{ $key }}">{{ $hour }} hs</label>
                        </div><br><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Next Button-->
    <div class="row justify-content-center mt-5">
        <div class="col-lg-7 d-flex justify-content-end px-4" role="group" aria-label="Basic example">
            <a type="button" href={{ asset('/') }} class="btn btn-primary mr-3 button-icon-left next-button">
                <i class="fa fa-arrow-circle-left mr-2 f-30"></i>ANTERIOR
            </a>
            <button type="submit" class="btn btn-primary button-icon next-button">SIGUIENTE
                <i class="fa fa-arrow-circle-right ml-2 f-30"></i>
            </button>
        </div>
    </div>
</div>
{!! Form::close() !!}
@include('site.footer')
