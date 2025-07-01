<div class="modal fade" id="ModalEdit{{ $authorization->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success pt-3 py-4 pb-3">
                <h6 class="modal-title text-white">EDITAR autorización</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Orden</label>
                        <input class="form-control form-control-solid" id="orden" name="orden" type="text" required value="{{ $authorization->orden }}" />
                    </div>
                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Fecha</label>
                        <input class="form-control form-control-solid" id="fecha" name="fecha" type="date" required value="{{ $authorization->fecha }}" />
                    </div>
                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Litros Autorizados</label>
                        <input class="form-control form-control-solid" id="litros" name="litros" type="number" required value="{{ $authorization->litros }}" />
                    </div>  
                    <input class="form-control form-control-solid" id="estatus" name="estatus" type="hidden" value="{{ $authorization->estatus }}" />
                </div>
            </div>

            <div class="modal-footer bg-light">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-6">
                        <button type="button" class="btn btn-dark col-md-12 font-14" data-bs-dismiss="modal">CANCELAR</button>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <button type="submit" class="btn btn-success col-md-12 font-14">ACTUALIZAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>