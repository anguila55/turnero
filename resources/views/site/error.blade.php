@include('site.header')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 mt-5 p-3">
            <div class="card card-message">
                <div class="card-body py-3 px-4 m-4">
                    @if(isset($error))
                        <h5 class="message-title text-center text-danger">{{ $error }}</h5>
                    @else
                        <h5 class="message-title text-center text-danger">Se produjo un error, intente nuevamente!</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center align-items-center my-4">
    <a type="button" href={{ asset('/') }} class="btn btn-primary button-icon-left next-button">
    <i class="fa fa-arrow-circle-left mr-2 f-30"></i>VOLVER
    </a>
</div>
@include('site.footer')
