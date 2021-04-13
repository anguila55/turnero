<div class="dataTables_wrapper dt-bootstrap4 table-responsive">
    <table class="datatable table table-striped table-bordered dataTable" role="grid" aria-describedby="example2_info">
        <thead>
        <tr>
            <td>Sucursal</td>
            <td>Localidad</td>
            <td>Nombre</td>
            <td>DNI</td>
            <td>Email</td>
            <td>Telefono</td>
            <td>Turnos</td>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer['branch']['user']->name }}</td>
                <td>{{ $customer['branch']->city }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->dni }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>
                    <button class="btn bg-transparent"><i class="fa fa-calendar-alt text-info" data-toggle="modal"
                                                          data-target="#detail{{ $customer->id }}"></i></button>
                </td>

                <div class="modal fade" id="detail{{ $customer->id }}">
                    @include('customer.detail', ['shifts' => $customer['shifts']])
                </div>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
