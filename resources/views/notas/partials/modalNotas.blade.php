<div class="modal fade" id="myModalNotas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Confirmar Datos</h4>
            </div>
            <div class="modal-body">
                <p><strong>Programa:</strong> <span id="text_programa"></span></p>
                <p><strong>Modulo:</strong> <span id="text_modulo"></span></p>
                <p><span id="text_gestion"></span></p>
                <table class="table table-bordered" id="tableModal">
                    <thead>
                    <tr>
                        <th class="col-md-2">Registro</th>
                        <th class="text-center col-md-6">Nombre</th>
                        <th class="col-md-1">Nota</th>
                        <th class="col-md-3">Estado</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyModal" class="tabla-user">
                    <tr>
                        <td class="col-md-2"></td>
                        <td class="col-md-6"></td>
                        <td></td>
                        <td class="col-md-3"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Atras</button>
                <button class="btn btn-primary" type="submit" >Confirmar datos</button>
            </div>
        </div>
    </div>
</div>