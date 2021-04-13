<div class="modal-dialog">
    <div class="modal-content bg-info">
        <div class="modal-header">
            <h4 class="modal-title">{{ $button }} sucursal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="box-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('name','Nombre',['class' => 'control-label']) !!}
                        </div>
                        <div class="col-md-8">
                            {!! Form::text('name', isset($branch) ? $branch['user']->name : null,['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('city','Localidad',['class' => 'control-label']) !!}
                        </div>
                        <div class="col-md-8">
                            {!! Form::text('city',null,['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>
                @if($button == 'Nuevo')
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('email','E-mail',['class' => 'control-label']) !!}
                        </div>
                        <div class="col-md-8">
                            {!! Form::text('email', isset($branch) ? $branch['user']->email : null,['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('password','Contraseña',['class' => 'control-label']) !!}
                        </div>
                        <div class="col-md-8">
                            {!! Form::password('password',['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('status','Deshabilitar',['class' => 'control-label']) !!}
                        </div>
                        <div class="col-md-8">
                            {!! Form::select('status',["Habilitado"=>"Habilitar", "Deshabilitado"=>"Deshabilitar"],null,['class' => 'form-control type-content']) !!}
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
