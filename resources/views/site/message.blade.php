@include('site.header')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 mt-5 p-3">
            <div class="card card-message">
                <div class="card-body py-3 px-4 m-4">
                    <h5 class="message-title mb-2">Gracias por confiar en nosotros.</h5>
                    <p class="card-text f-16 text-left"> En breve estará llegando el comprobante de la gestión a su
                        correo electrónico. Le sugerimos imprimirlo y llevarlo a la sucursal correspondiente, en el
                        horario confirmado.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Next Button-->
<div class="row d-flex justify-content-center align-items-center my-4">
    <a type="button" href={{ asset('/') }} class="btn btn-primary button-icon next-button">FINALIZAR
    <i class="fa fa-check-circle ml-2 f-30" aria-hidden="true"></i>
    </a>
</div>
@include('site.footer')
