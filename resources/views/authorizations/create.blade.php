<div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary pt-3 py-4 pb-3">
                <h6 class="modal-title text-white">Crear nueva autorización</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Orden</label>
                        <input class="form-control form-control-solid" id="orden" name="orden" type="text" required />
                    </div>
                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Fecha</label>
                        <input class="form-control form-control-solid" id="fecha" name="fecha" type="date" required />
                    </div>
                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Litros Autorizados</label>
                        <input class="form-control form-control-solid" id="litros" name="litros" type="number" required />
                    </div>                    
                    <input class="form-control form-control-solid" id="estatus" name="estatus" type="hidden" value="1" />
                </div>
            </div>

            <div class="modal-footer bg-light">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-6">
                        <button type="button" class="btn btn-dark col-md-12 font-14" data-bs-dismiss="modal">CANCELAR</button>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <button type="submit" class="btn btn-primary col-md-12 font-14">GUARDAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>