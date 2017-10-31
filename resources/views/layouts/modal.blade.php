<!-- Modal -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header modal-header-green">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: #FFFFFF;">Mensaje</h4>
            </div>
            <div class="modal-body">
                @if(Session::get('msj')== 1)
                    <p style="font-size: 18px" class="center">Datos registrados correctamente&nbsp;
                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                    </p>
                @elseif(Session::get('msj')== 2)
                    <p style="font-size: 18px" class="center">Datos actualizados correctamente&nbsp;
                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                    </p>
                @else
                    <p class="bg-danger">Error al registrar datos</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
