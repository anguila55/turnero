<div class="dataTables_wrapper dt-bootstrap4 table-responsive">
    <table class="datatable table table-striped table-bordered dataTable" role="grid" aria-describedby="example2_info">
        <thead>
        <tr>
            <td>Nombre</td>
            <td>Email</td>
            <td>Localidad</td>
            <td>Estado</td>
            <td>Confirmados</td>
            <td>Completados</td>
            <td>Incompletos</td>
            <td>Horarios</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
        </thead>
        <tbody>
        @foreach($branches as $branch)
            <tr>
                <td>{{ $branch['user']->name }}</td>
                <td>{{ $branch['user']->email }}</td>
                <td>{{ $branch->city }}</td>
                <td><span class="badge badge-{{ $branch->status == 'Habilitado' ? 'success' : 'danger'}}">{{ $branch->status }}</span></td>
                <td>{{ $shifts->where('branch_id',$branch->id)->where('status',\App\Constants\StatusSchedule::CONFIRM)->count() }}</td>
                <td>{{ $shifts->where('branch_id',$branch->id)->where('status',\App\Constants\StatusSchedule::COMPLETE)->count() }}</td>
                <td>{{ $shifts->where('branch_id',$branch->id)->where('status',\App\Constants\StatusSchedule::INCOMPLETE)->count() }}</td>
                <td>
                    <a class="btn bg-transparent" href="{{ route('schedule::index', ['branch_id' => $branch->id]) }}"><i class="fa fa-calendar-times"></i></a>
                </td>
                <td>
                    <button class="btn bg-transparent"><i class="fa fa-pen text-info" data-toggle="modal"
                                                          data-target="#edit{{ $branch->id }}"></i></button>
                </td>
                <td>
                    <button class="btn bg-transparent"><i class="fa fa-trash-alt text-red" data-toggle="modal"
                                                          data-target="#delete{{ $branch->id }}"></i></button>
                </td>

                <div class="modal fade" id="edit{{ $branch->id }}">
                    {!! Form::model($branch, ['route' => ['branch::update', $branch], 'method' => 'PUT', 'class' => 'validate-form']) !!}
                    @include('branch.form', ['button' => 'Actualizar', 'branch' => $branch])
                    {!! Form::close() !!}
                </div>

                <div class="modal fade" id="delete{{ $branch->id }}">
                    @include('branch.delete', ['user' => $branch])
                </div>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new-user">Nuevo</button>
<div class="modal fade" id="new-user">
    {!! Form::open((['route' => 'branch::create', 'method' => 'POST', 'class' => 'validate-form'])) !!}
    @include('branch.form', ['button' => 'Nuevo', 'branch' => null])
    {!! Form::close() !!}
</div>
