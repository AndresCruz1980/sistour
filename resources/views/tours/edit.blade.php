<div class="modal fade" id="ModalEdit{{ $tour->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success pt-3 py-4 pb-3">
                <h6 class="modal-title text-white">EDITAR TOUR</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body bg-white p-4">
                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Código</label>
                        <input class="form-control form-control-solid" id="codigo" name="codigo" type="text" required value="{{ $tour->codigo }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Titulo</label>
                        <input class="form-control form-control-solid" id="titulo" name="titulo" type="text" required value="{{ $tour->titulo }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Descripción</label>
                        <textarea class="form-control form-control-solid" id="descripcion" name="descripcion" rows="5">{{ $tour->descripcion }}</textarea>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Categoría</label>
                        <select class="form-control form-control-solid" id="categoria_id" name="categoria_id" type="select" required>
                            <option value="{{ $tour->categoria->id }}">{{ $tour->categoria->titulo }}</option>
                            <option value="">Seleccionar</option>
                            @foreach($categorias as $categoria)
                                @if($categoria->estatus == "1")
                                    <option value="{{ $categoria->id }}">{{ $categoria->titulo }}</option>
                                @endif
                            @endforeach
                        </select>

                        <label class="mt-2 mb-2">Hora límite de reserva</label>
                        <input class="form-control form-control-solid" id="hor_lim" name="hor_lim" type="text" required value="{{ $tour->hor_lim }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Duración/días</label>
                        <input class="form-control form-control-solid" id="duracion" name="duracion" type="text" required value="{{ $tour->duracion }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Duración/noches</label>
                        <input class="form-control form-control-solid" id="noches_edit" name="noches" type="text" required value="{{ $tour->noches }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Tipo de tour</label>
                        <select class="form-control form-control-solid" id="tipo" name="tipo" type="select" required>
                            <option value="{{ $tour->tipo }}">{{ $tour->tipo }}</option>
                            <option value="">Seleccionar</option>
                            <option value="Ambos">Ambos</option>
                            <option value="Compartido">Compartido</option>
                            <option value="Privado">Privado</option>
                        </select>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Mínimo de personas</label>
                        <input class="form-control form-control-solid" id="min_per" name="min_per" type="number" required value="{{ $tour->min_per }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Máximo de personas</label>
                        <input class="form-control form-control-solid" id="max_per" name="max_per" type="number" required value="{{ $tour->min_per }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Servicios por tour</label>
                        <select class="form-select serv_tour" name="serv_tour[]" type="select" required data-placeholder="Seleccionar" multiple>
                            @php
                                $serv_tour_id = json_decode($tour->serv_tour);
                            @endphp

@foreach($servicios as $servicio)
 <option value="{{ $servicio->id }}" 
     @if(is_array($serv_tour_id) && in_array($servicio->id, $serv_tour_id)) selected @endif>
       {{ $servicio->titulo }}
 </option>
@endforeach

                                
                                    <option @if(in_array(100, $serv_tour_id))) selected @endif value="100">Guias</option>
                                
                                
                                
                                    <option @if(in_array(101, $serv_tour_id))) selected @endif value="101">Traductores</option>
                                    
                                
                                    <option @if(in_array(102, $serv_tour_id))) selected @endif value="102">Cocineros</option>
                                    
                                
                                    <option @if(in_array(103, $serv_tour_id))) selected @endif value="103">Choferes</option>
                                    
                                
                                    <option @if(in_array(104, $serv_tour_id))) selected @endif value="104">Vagonetas</option>
                                   
                                
                                    <option @if(in_array(105, $serv_tour_id))) selected @endif value="105">Caballos</option>
                                   
                                
                                    <option @if(in_array(106, $serv_tour_id))) selected @endif value="106">Bicicletas</option>
                                
                            
                        </select>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Precio unitario</label>
                        <input class="form-control form-control-solid" id="pre_uni" name="pre_uni" type="number" required value="{{ $tour->pre_uni }}" />
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Precio total</label>
                        <input class="form-control form-control-solid" id="pre_tot" name="pre_tot" type="number" required value="{{ $tour->pre_tot }}" />
                    </div>
                </div>
                
                <div class="row g-3 pt-3 pb-0 col-md-12" id="hoteles_cont">
                    @php
                        $hotelesSeleccionados = json_decode($tour->hoteles, true);
                        use App\Models\Servicio\Hotel;
                    @endphp
                    @if (is_array($hotelesSeleccionados))
                    @foreach ($hotelesSeleccionados as $key => $hotelIds)
                        <div class="form-group mb-2 mt-2 col-md-6">
                            <label for="hoteles_{{ $key }}">Hotel Día {{ $key }}</label>
                            <select class="form-select hotel-select" name="hoteles[{{ $key }}][]" multiple required>
                                @foreach ($hoteles as $hotel)
                                    <option value="{{ $hotel->id }}" 
                                        @if(in_array($hotel->id, $hotelIds)) selected @endif>
                                        {{ $hotel->titulo }}
                                    </option>
                                @endforeach
                            </select>

                            <input type="hidden" value="Día {{ $key }}" name="dias[]" />
                        </div>
                    @endforeach
                    @endif
                </div>

                <div class="row g-3 pt-3 pb-2 col-md-12">
                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Tickets</label>
                        @php
                            $ticket_id = json_decode($tour->tickets);
                        @endphp
                        <select class="form-select tickets" name="tickets[]" type="select" data-placeholder="Seleccionar" multiple>
                            @foreach($tickets as $ticket)
                                @if($ticket->estatus == "1")
                                    <option value="{{ $ticket->id }}" 
                                        @if(is_array($ticket_id) && in_array($ticket->id, $ticket_id)) selected @endif>
                                        {{ $ticket->titulo }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Alquiler de accesorios</label>
                        @php
                            $accesorio_id = json_decode($tour->accesorios);
                        @endphp
                        <select class="form-select accesorios" name="accesorios[]" type="select" data-placeholder="Seleccionar" multiple>
                            @foreach($accesorios as $accesorio)
                                @if($accesorio->estatus == "1")
                                    <option value="{{ $accesorio->id }}" 
                                        @if(is_array($accesorio_id) && in_array($accesorio->id, $accesorio_id)) selected @endif>
                                        {{ $accesorio->titulo }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2 mt-2 col-md-6">
                        <label class="mb-2">Alquiler de servicios</label>
                        @php
                            $turista_id = json_decode($tour->turistas);
                        @endphp
                        <select class="form-select turistas" name="turistas[]" type="select" data-placeholder="Seleccionar" multiple>
                            @foreach($turistas as $turista)
                                @if($turista->estatus == "1")
                                    <option value="{{ $turista->id }}" 
                                        @if(is_array($turista_id) && in_array($turista->id, $turista_id)) selected @endif>
                                        {{ $turista->titulo }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <input type="hidden" id="serv_cli" name="serv_cli" value="{{ $tour->serv_cli }}">

                    <input id="estatus" name="estatus" type="hidden" value="{{ $tour->estatus }}" />
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