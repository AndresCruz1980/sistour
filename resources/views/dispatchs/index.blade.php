@extends('layouts.app')

@section('template_title')
    Despachos
@endsection

@section('estilos')
    <style>
        
    </style>
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-30 text-white">
                    <i class="bx bxs-check-circle"></i>
                </div>

                <div class="ms-3">
                    <h6 class="mb-0 text-white font-14">{{ $message }}</h6>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-30 text-white">
                    <i class="bx bxs-check-circle"></i>
                </div>

                <div class="ms-3">
                    <h6 class="mb-0 text-white font-14">{{ $message }}</h6>
                </div>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-primary pt-3 pb-3">
            <div class="d-flex align-items-center">
                <div>
@php
                                    $originalDate = $authorization->fecha;
                                    $newDate = date("d/m/Y", strtotime($originalDate));
                                @endphp                    
                    <h6 class="mb-0 title_page text-white">LISTADO DE DESPACHOS - ORDEN: {{ $authorization->orden }} FECHA: {{ $newDate }} - LITROS: {{ $authorization->litros }}</h6>
                </div>

                <div class="ms-auto">
                    <form action="{{ route('dispatchs.store') }}" class="ms-1" method="POST" enctype="multipart/form-data">
                        @csrf

                        <button type="button" class="btn btn-primary mt-2 mt-lg-0 font-13 btn" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                            <i class="bx bxs-plus-square"></i>NUEVO DESPACHO
                        </button>

                        @include('dispatchs.create')
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Propietario</th>
                            <th>Vagoneta</th>
                            <th>Litros Asignado</th>
                            <th>Litros Cargado</th>
                            <th>Nro Factura</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($dispatchs as $dispatch)
                            @if($dispatch->estatus == "1")
                                @php
                                    $originalDate = $dispatch->created_at;
                                    $newDate = date("d/m/Y", strtotime($originalDate));
                                @endphp

                                <tr>
                                    <td>{{ '#'.$dispatch->id }}</td>
                                    <td>{{ $newDate }}</td>
                                    <td>{{ $dispatch->vagoneta->propietario->nombre }} {{ $dispatch->vagoneta->propietario->apellido }}</td>
                                    <td>{{ $dispatch->vagoneta->marca }} - {{ $dispatch->vagoneta->placa }} - {{ $dispatch->vagoneta->color }} - {{ $dispatch->vagoneta->modelo }}</td>
                                    <td>{{ $dispatch->litros_asignado }}</td>
                                    <td>{{ $dispatch->litros_cargado }}</td>
                                    <td>{{ $dispatch->numero_factura }}</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a target="_blank" href="{{ URL::to('imprimir-dispatch/' . $dispatch->id ) }}" class="">
                                                <i class="bx bxs-file-pdf"></i>
                                            </a>

                                            <form action="{{ route('dispatchs.update', $dispatch->id) }}" class="ms-1" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
        
                                                <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $dispatch->id }}">
                                                    <i class="bx bxs-edit"></i>
                                                </button>

                                                @include('dispatchs.edit')
                                            </form>

                                            <form action="{{ route('dispatchs.update', $dispatch->id) }}" class="ms-1" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
        
                                                <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalFactura{{ $dispatch->id }}">
                                                    <i class="bx bx-comment-add"></i>
                                                </button>

                                                @include('dispatchs.factura')
                                            </form>                                            

                                            <form action="{{ route('dispatchs.destroy', $dispatch->id) }}" class="ms-1" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalPreDelete{{ $dispatch->id }}">
                                                    <i class="bx bxs-trash"></i>
                                                </button>

                                                <input type="hidden" value="2" id="estatus" name="estatus" />
                                                <input type="hidden" value="dispatch" id="pagina" name="pagina" />

                                                @include('dispatchs.predelete')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>

    <script>
        $(document).ready(function() {
            $.fn.dataTable.moment('DD/MM/YYYY');
            
            var table = $('#example2').DataTable( {
				lengthChange: true,
                order: [3, 'desc'],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                }
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
    </script>
@endsection