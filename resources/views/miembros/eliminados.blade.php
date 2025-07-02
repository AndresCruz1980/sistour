@extends('layouts.app')

@section('template_title')
    Miembros eliminados
@endsection

@section('estilos')
    <style>
        
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-danger pt-3 pb-3">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0 title_page text-white">LISTADO DE MIEMBROS ELIMINADOS</h6>
                </div>

                <div class="ms-auto">
                    <a href="{{ URL::to('miembros') }}" class="btn btn-dark mt-2 mt-lg-0 font-13 btn">
                        <i class="bx bx-arrow-back"></i>REGRESAR
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Correo</th>
                            <th>Nombres</th>
                            <th>Tipo de usuario</th>
                            <th>Registrado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            @if($user->estatus == "2")
                                @php
                                    $originalDate = $user->created_at;
                                    $newDate = date("d/m/Y", strtotime($originalDate));
                                @endphp

                                <tr>
                                    <td>#{{ $user->id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->first_name.' '.$user->last_name }}</td>
                                    <td>
                                        @foreach ($user->roles as $user_role)
                                            @if ($user_role->name == 'User')
                                                @php $badgeClass = 'primary'; $badgeName = 'Usuario'; @endphp
                                            @elseif ($user_role->name == 'Admin')
                                                @php $badgeClass = 'success'; $badgeName = 'Administrador'; @endphp
                                            @else
                                                @php $badgeClass = 'default'; $badgeName = $user_role->name; @endphp
                                            @endif

                                            <div class="badge rounded-pill text-{{ $badgeClass }} bg-light-{{ $badgeClass }} p-2 text-uppercase px-3">
                                                <i class="bx bxs-circle me-1"></i>{{ $badgeName }}
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>{{ $newDate }}</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <form action="{{ route('estatus.update', $user->id) }}" class="ms-1" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <button type="button" class="btn boton-eliminar ms-1" data-bs-toggle="modal" data-bs-target="#ModalRestaurar{{ $user->id }}">
                                                    <i class="bx bx-refresh"></i>
                                                </button>

                                                <input type="hidden" value="1" id="estatus" name="estatus" />
                                                <input type="hidden" value="miembros" id="pagina" name="pagina" />

                                                @include('miembros.restaurar')
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
                order: [5, 'desc'],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                }
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
    </script>
@endsection