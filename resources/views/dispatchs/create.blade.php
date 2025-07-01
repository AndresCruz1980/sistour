<div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary pt-3 py-4 pb-3">
                <h6 class="modal-title text-white">Crear nuevo despacho</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Litros Asignados</label>
                        <input class="form-control form-control-solid" id="litros_asignado" name="litros_asignado" type="number" required />
                    </div>  
                    <div class="form-group mb-2 mt-2 col-md-12">
                        <label class="mb-2">Vagoneta Propietario:</label>
                        <select class="form-control form-control-solid" id="vagoneta_id" name="vagoneta_id" type="select" required>
                            <option value="">Seleccionar</option>
                            @if ($vagonetas)
                                @foreach($vagonetas as $vagoneta)
                                    <option value="{{ $vagoneta->id }}">{{ $vagoneta?->propietario->nombre }} {{ $vagoneta?->propietario->apellido }} -  {{ $vagoneta->marca }} - {{ $vagoneta->placa }} - {{ $vagoneta->color }} - {{ $vagoneta->modelo }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>                                       
                    <input class="form-control form-control-solid" id="estatus" name="estatus" type="hidden" value="1" />
                    <input class="form-control form-control-solid" id="authorization_id" name="authorization_id" type="hidden" value="{{ $authorization->id }}" />
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