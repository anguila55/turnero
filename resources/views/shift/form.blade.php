{!! Form::model($shift, ['route' => ['shift::update', $shift], 'method' => 'PUT', 'class' => 'validate-form']) !!}
<div class="modal-dialog">
    <div class="modal-content bg-info">
        <div class="modal-header">
            <h4 class="modal-title">Estado de turno</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="body-box">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('status','Cambiar estado',['class' => 'control-label']) !!}
                        </div>
                        <div class="col-md-8">
                            {!! Form::select('status',[\App\Constants\StatusSchedule::COMPLETE=>\App\Constants\StatusSchedule::COMPLETE, \App\Constants\StatusSchedule::INCOMPLETE=>\App\Constants\StatusSchedule::INCOMPLETE],null,['class' => 'form-control type-content']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            {!! Form::submit('Cambiar',['class' => 'submit btn btn-primary validate-btn']) !!}
            <div class="validate-spinner"></div>
        </div>
    </div>
</div>
{!! Form::close() !!}
