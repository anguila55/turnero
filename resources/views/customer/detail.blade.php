<div class="modal-dialog">
    <div class="modal-content bg-info">
        <div class="modal-header">
            <h4 class="modal-title">Detalle cliente</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <div class="row">
                    @foreach($shifts as $shift)
                        <div class="col-6">
                            <b>Turno:</b>
                        </div>
                        <div class="col-6">
                            {{ $shift->shift() }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
