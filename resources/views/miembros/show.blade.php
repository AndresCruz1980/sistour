@extends('layouts.app')

@section('template_title')
    Ver miembro
@endsection

@section('estilos')
    <style>
        
    </style>
@endsection

@section('content')
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('miembros.update', $user->id) }}" class="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="d-flex flex-column align-items-center text-center">
                                @if($user->file)
                                    <img src="{{ asset('panelusers/'.$user->file) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="200">
                                @else
                                    <img src="{{ asset('assets/imagenes/img_default.jpg') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="200">
                                @endif

                                <div class="mt-3">
                                    <h5 class="title_dir">{{ $user->first_name }}</h5>
                                    <p class="text-secondary mb-1">{{ $user->last_name }}</p>
                                    <p class="text-muted font-size-sm"></p>

                                    <div class="row g-3 pt-3 pb-2 col-md-12">
                                        <div class="form-group mb-2 mt-2 col-md-8">
                                            <input type="file" id="file" name="file" required class="form-control form-control-solid">
                                            <input id="foto" name="foto" type="hidden" value="2" />
                                        </div>
                                        
                                        <div class="form-group mb-2 mt-2 col-md-4">
                                            <button type="submit" class="col-md-12 btn btn-primary">Guardar foto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-30 text-white">
                                <i class="bx bxs-check-circle"></i>
                            </div>

                            <div class="ms-3">
                                <h6 class="mb-0 text-white font-14">Configuración - {{ $message }}</h6>
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
                                <h6 class="mb-0 text-white font-14">Configuración - {{ $message }}</h6>
                            </div>
                        </div>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('miembros.update', $user->id) }}" class="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3 pt-3 pb-2 col-md-12">
                                <div class="form-group mb-2 mt-2 col-md-4">
                                    <label class="mb-2">Nombres:</label>
                                    <input class="form-control form-control-solid" id="first_name" name="first_name" type="text" required value="{{ $user->first_name }}" />
                                </div>

                                <div class="form-group mb-2 mt-2 col-md-4">
                                    <label class="mb-2">Apellidos:</label>
                                    <input class="form-control form-control-solid" id="last_name" name="last_name" type="text" required value="{{ $user->last_name }}" />
                                </div>

                                <div class="form-group mb-2 mt-2 col-md-4">
                                    <label class="mb-2">Correo electrónico:</label>
                                    <input class="form-control form-control-solid" id="email" name="email" type="email" required value="{{ $user->email }}" />
                                </div>

                                <div class="form-group mb-2 mt-2 col-md-4">
                                    <label class="mb-2">DNI/Pasaporte:</label>
                                    <input class="form-control form-control-solid" id="documento" name="documento" type="number" required value="{{ $user->documento }}" />
                                </div>

                                <div class="form-group mb-2 mt-2 col-md-4">
                                    <label class="mb-2">Celular:</label>
                                    <input class="form-control form-control-solid" id="celular" name="celular" type="number" required value="{{ $user->celular }}" />
                                </div>

                                <div class="form-group mb-2 mt-2 col-md-4">
                                    <label class="mb-2">Dirección:</label>
                                    <input class="form-control form-control-solid" id="direccion" name="direccion" type="text" required value="{{ $user->direccion }}" />
                                </div>

                                <div class="form-group mb-2 mt-2 col-md-6">
                                    <label class="mb-2">Contraseña:</label>
                                    <input class="form-control form-control-solid" id="password" name="password" type="password" />
                                </div>

                                <div class="form-group mb-2 mt-2 col-md-6">
                                    <label class="mb-2">Confirmar contraseña:</label>
                                    <input class="form-control form-control-solid" id="password_confirmation" name="password_confirmation" type="password" />
                                </div>

                                <div class="form-group mb-2 mt-2 col-md-6">
                                    <label class="mb-2">Estado:</label>
                                    <select class="form-control form-control-solid" id="estatus" name="estatus" type="select" required>
                                        @if($user->estatus == 1)
                                            <option value="1">Activo</option>
                                        @else
                                            <option value="2">Inactivo</option>
                                        @endif
                                        <option value="">Seleccionar</option>
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                    </select>
                                </div>

                                <div class="form-group mb-2 mt-2 col-md-6">
                                    <label class="mb-2">Rol de usuario:</label>
                                    <select class="form-control form-control-solid" id="role" name="role" type="select" required>
                                        @php
                                            foreach ($user->roles as $userRole) {
                                                $currentRole = $userRole;
                                            }
                                        @endphp

                                        @if ($roles)
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ $currentRole->id == $role->id ? 'selected="selected"' : '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <input id="foto" name="foto" type="hidden" value="1" />

                                <div class="form-group mb-2 mt-2 col-md-12">
                                    <button type="submit" class="btn btn-success col-md-12 font-14">ACTUALIZAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>		
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    
@endsection