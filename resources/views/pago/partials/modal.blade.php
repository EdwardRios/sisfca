<div class="modal fade" id="myModalPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Confirmar Datos</h4>
            </div>
            <div class="modal-body">
                {{--<p>Registro: <span id="text_registro"></span></p>--}}
                <p>Nombre: <span id="text_nombre"></span>&nbsp;<span id="text_apellido"></span></p>
                <p>Programa: <span id="text_programa"></span></p>
                <p>Numero deposito: <span id="text_nrodeposito"></span></p>
                <p>Fecha deposito: <span id="text_fechadeposito"></span></p>
                <p>Monto: <span id="text_monto"></span></p>
                <p>Glosa: <span id="text_glosa"></span></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Atras</button>
                <button class="btn btn-primary" type="submit" >Confirmar datos</button>
            </div>
        </div>
    </div>
</div>