<div class="modal fade" id="myModalDescuento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <p>Descuento: <span id="text_descuento"></span></p>
                <p>Nombre Archivo: <span id="text_archivo"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Atras</button>
                <button class="btn btn-primary" type="submit" >Confirmar datos</button>
            </div>
        </div>
    </div>
</div>