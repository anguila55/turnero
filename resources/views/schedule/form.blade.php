<input name="branch_id" value="{{ $branch_id }}" type="hidden">
<div class="modal-dialog">
    <div class="modal-content bg-info">
        <div class="modal-header">
            <h4 class="modal-title">{{ $button }} horario</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('start','Horario de inicio',['class' => 'control-label']) !!}
                        </div>
                        <div class="col-md-8">
                            {!! Form::time('start', null,['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('end','Horario de cierre',['class' => 'control-label']) !!}
                        </div>
                        <div class="col-md-8">
                            {!! Form::time('end',null,['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('lapse','Intervalo',['class' => 'control-label']) !!}
                        </div>
                        <div class="col-md-8">
                            {!! Form::number('lapse',null,['class' => 'form-control', 'required', 'min' => '0', 'max' => '60']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('day','Dia',['class' => 'control-label']) !!}
                        </div>
                        <div class="col-md-8">
                            {!! Form::select('day',["1"=>"Lunes", "2"=>"Martes", "3"=>"Miercoles", "4"=>"Jueves", "5"=>"Viernes", "6"=>"Sabado", "0"=>"Domingo"],null,['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('cant','Turnos por dia',['class' => 'control-label']) !!}
                        </div>
                        <div class="col-md-8">
                            {!! Form::number('cant', null,['class' => 'form-control', 'required', 'min' => '0']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            {!! Form::submit($button,['class' => 'submit btn btn-primary validate-btn']) !!}
            <div class="validate-spinner"></div>
        </div>
    </div>
</div>
