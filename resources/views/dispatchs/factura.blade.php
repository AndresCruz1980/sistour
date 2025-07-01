<div class="modal fade" id="ModalFactura{{ $dispatch->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success pt-3 py-4 pb-3">
                <h6 class="modal-title text-white">FACTURA DESPACHO</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Litros Asignados</label>
                        <input class="form-control form-control-solid" id="litros_asignado" disabled name="litros_asignado" type="text" required value="{{ $dispatch->litros_asignado }}" />
                    </div>
                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Vagoneta Propietario:</label>
                        <select class="form-control form-control-solid" id="vagoneta_id" disabled name="vagoneta_id" type="select" required>
                            <option value="">Seleccionar</option>
                            @if ($vagonetas)
                                @foreach($vagonetas as $vagoneta)
                                    <option value="{{ $vagoneta->id }}" {{ $dispatch->vagoneta_id == $vagoneta->id ? 'selected="selected"' : '' }}>{{ $vagoneta?->propietario->nombre }} {{ $vagoneta?->propietario->apellido }} -  {{ $vagoneta->marca }} - {{ $vagoneta->placa }} - {{ $vagoneta->color }} - {{ $vagoneta->modelo }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>  
                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Litros Cargados</label>
                        <input class="form-control form-control-solid" id="litros_cargado" name="litros_cargado" type="text" required value="{{ $dispatch->litros_cargado }}" />
                    </div>
                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Numero Factura</label>
                        <input class="form-control form-control-solid" id="numero_factura" name="numero_factura" type="text" required value="{{ $dispatch->numero_factura }}" />
                    </div>                    
                    <input class="form-control form-control-solid" id="estatus" name="estatus" type="hidden" value="{{ $dispatch->estatus }}" />
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