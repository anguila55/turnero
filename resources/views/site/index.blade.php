@include('site.header')
{!! Form::open((['route' => 'customer::create', 'method' => 'POST'])) !!}
@csrf
<div class="container-fluid mb-4 mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-2">
            <div class="card card-message card-body-message my-3">
                <div class="card-body header-title p-2 text-center">Solicitud de Turno Digital Pardo</div>
            </div>
        </div>
    </div>
    <!--Alert-->
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-2">
            <div class="alert alert-primary" role="alert">
                Le solicitamos por favor <b>se registre en el siguiente formulario</b> para recibir su turno junto a la
                <b>carta que le servirá para poder circular</b> y realizar dicho pago.
            </div>
        </div>
    </div>
    <!--Form-->
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-2">
            <div class="card card-message">
                <div class="card-body">
                    <form>
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="fullName">Nombre y Apellido</label>
                                <div class="input-group">
                                    <i class="fa fa-user icon" aria-hidden="true"></i>
                                    <input type="text" name="name" class="form-control pl-35" id="fullName"
                                           placeholder="Ingrese su nombre" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <div class="input-group">
                                    <i class="fa fa-address-card icon" aria-hidden="true"></i>
                                    <input type="number" name="dni" class="form-control pl-35" id="dni"
                                           placeholder="Ingrese su DNI" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone">Teléfono de Contacto</label>
                                <div class="input-group">
                                    <i class="fa fa-phone icon" aria-hidden="true"></i>
                                    <input type="text" name="phone" class="form-control pl-35" id="phone"
                                           placeholder="Ingrese su Telefono" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <div class="input-group">
                                    <i class="fa fa-envelope icon" aria-hidden="true"></i>
                                    <input type="email" name="email" class="form-control pl-35" id="email"
                                           placeholder="Ingrese su email" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-sm-5 mx-5 my-1 px-4">* Todos los campos son obligatorios</div>
    </div>
    <!-- Next Button-->
    <div class="row d-flex justify-content-center align-items-center">
        <button type="submit" class="btn btn-primary button-icon next-button">SIGUIENTE
            <i class="fa fa-arrow-circle-right ml-2 f-30"></i>
        </button>
    </div>
</div>
{!! Form::close() !!}
@include('site.footer')
