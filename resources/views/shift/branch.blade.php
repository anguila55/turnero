<div class="dataTables_wrapper dt-bootstrap4 table-responsive">
    <table id="datatable" class="table table-striped table-bordered" role="grid" aria-describedby="example2_info">
        <thead>
        <tr>
            <td>Fecha</td>
            <td>Fecha</td>
            <td>Hora</td>
            <td>Estado</td>
            <td>Cliente</td>
            <td>Estado de turno</td>
        </tr>
        </thead>
        <tbody>
        @foreach($shifts as $shift)
            <tr>
                <td>{{ $shift->created_at }}</td>
                <td>{{ $shift->date() }}</td>
                <td>{{ $shift->hour() }}</td>
                <td>@include('shift.status', ['status' => $shift->status])</td>
                <td>{{ $shift['customer']->name }}</td>
                <td>
                    <button class="btn bg-transparent"><i class="fa fa-sync-alt text-info" data-toggle="modal" data-target="#detail{{ $shift->id }}"></i></button>
                </td>

                <div class="modal fade" id="detail{{ $shift->id }}">
                    @include('shift.form', ['shifts' => $shift['shifts']])
                </div>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
