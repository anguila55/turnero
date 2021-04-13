@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="card-body">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            {{ Session::get('message') }}
                        </div>
                    </div>
                @endif
                @if($errors->any())
                    <div class="card-body">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                            </button>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                @endif
                    <div class="card">
                        @yield('content_body')
                    </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable({
                language: {
                    'url': '//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json'
                },
                info: false,
                lengthChange: false
            });

            $('#datatable').DataTable({
                language: {
                    'url': '//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json'
                },
                info: false,
                order: [[ 0, "desc" ]],
                lengthChange: false,
                'columnDefs': [{
                    "targets": [0],
                    "orderable": true,
                    "visible": false,
                    "searchable": false
                }]
            });

            $("#pass1").on("focusout", function () {
                if ($(this).val() != $("#pass2").val()) {
                    $(".validate-btn").prop('disabled',true);
                } else {
                    $(".validate-btn").prop('disabled',false);
                }
            });

            $("#pass2").on("keyup", function () {
                if ($("#pass1").val() != $(this).val()) {
                    $(".validate-btn").prop('disabled',true);
                } else {
                    $(".validate-btn").prop('disabled',false);
                }
            });

            $('.validate-form').submit(function () {
                $('.validate-btn').hide();
                var spinner = $("<button class='btn btn-primary' type='button'><span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>  Cargando</button>");
                $('.validate-spinner').append(spinner);
            });
        });
    </script>
@stop
