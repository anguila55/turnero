@include('site.header')
{!! Form::open((['route' => 'customer::schedule', 'method' => 'POST'])) !!}
@csrf
<input type="hidden" name="customer_id" value={{ $customer_id }}>
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
            <div class="col-lg-4 mt-5 p-3">
                <div class="card card-message">
                    <div class="card-body p-4 m-4">
                        <p class="card-text f-16 text-left"><b>Al finalizar el proceso de solicitud de turno, se estará enviando un correo electrónico con el comprobante con el que podrá acreditar la realización del servicio en cuestión.</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Next Button-->
    <div class="row d-flex justify-content-center align-items-center my-4">
        <button type="submit" class="btn btn-primary button-icon next-button">DE ACUERDO
            <i class="fa fa-check-circle ml-2 f-30" aria-hidden="true"></i>
        </button>
    </div>
</div>
{!! Form::close() !!}
@include('site.footer')
