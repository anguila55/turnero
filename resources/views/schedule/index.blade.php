@extends('home')

@section('content_body')
    <div class="card-header">
        <h1 class="card-title">
            Horarios
        </h1>
    </div>

    <div class="card-body">
        <div class="dataTables_wrapper dt-bootstrap4 table-responsive">
            <table class="datatable table table-striped table-bordered dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr>
                    <td>Dia</td>
                    <td>Horario inicio</td>
                    <td>Horario cierre</td>
                    <td>Intervalo</td>
                    <td>Limite de turnos</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>
                </thead>
                <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->day() }}</td>
                        <td>{{ $schedule->start }}</td>
                        <td>{{ $schedule->end }}</td>
                        <td>{{ $schedule->lapse }}</td>
                        <td>{{ $schedule->cant }}</td>
                        <td>
                            <button class="btn bg-transparent"><i class="fa fa-pen text-info" data-toggle="modal"
                                                                  data-target="#edit{{ $schedule->id }}"></i></button>
                        </td>
                        <td>
                            <button class="btn bg-transparent"><i class="fa fa-trash-alt text-red" data-toggle="modal"
                                                                  data-target="#delete{{ $schedule->id }}"></i></button>
                        </td>

                        <div class="modal fade" id="edit{{ $schedule->id }}">
                            {!! Form::model($schedule, ['route' => ['schedule::update', $schedule], 'method' => 'PUT', 'class' => 'validate-form']) !!}
                            @include('schedule.form', ['button' => 'Actualizar', 'branch_id' => $branch_id])
                            {!! Form::close() !!}
                        </div>

                        <div class="modal fade" id="delete{{ $schedule->id }}">
                            @include('schedule.delete', ['schedule' => $schedule])
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
            {!! Form::open((['route' => 'schedule::create', 'method' => 'POST', 'class' => 'validate-form'])) !!}
            @include('schedule.form', ['button' => 'Nuevo', 'branch_id' => $branch_id])
            {!! Form::close() !!}
        </div>
    </div>
@stop
