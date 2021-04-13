<div class="modal-dialog">
    <div class="modal-content bg-danger">
        <div class="modal-header">
            <h4 class="modal-title">Eliminar</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <p>Desea eliminar {{ $schedule['branch']->name }}?</p>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light"
                    data-dismiss="modal">Close
            </button>
            {!! Form::model($schedule, ['route' => ['schedule::delete', $schedule->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Eliminar',['class' => 'btn btn-outline-light']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
