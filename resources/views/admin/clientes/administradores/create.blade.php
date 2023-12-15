@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="col-12">
                <div class="w-100 my-4 position-relative">
                    <h3 class="display-3 text-center p2">Crear Administrador</h3>
                </div>
                <p class="text-center p-3">
                    La sección de administradores te permite crear y gestionar los administradores de la empresa.
                    <br>Por favor, complete los campos requeridos para crear un nuevo administrador. Asegúrese de diligenciar toda la información. ¡Gracias!
                </p>
            </div>
            <div class="card-body">
                <form action="{{ route('saveAdministrador') }}" method="post">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md">
                            <label class="form-label">Tipo de identificación</label>
                            <select class="form-control @error('idTipoIdentificacion') is-invalid @enderror" name="idTipoIdentificacion">
                                <option value="" selected>Seleccione el tipo de identifiación</option>
                                <option value="1">NIT</option>
                                <option value="2">Cedula de ciudadanía</option>
                                <option value="3">Cedula de extranjería</option>
                                <option value="4">Pasaporte</option>
                            </select>
                            @error('idTipoIdentificacion')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md">
                            <label class="form-label">Numero de identificación</label>
                            <input type="text" class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" value="{{ old('identificacion') }}">
                            @error('identificacion')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <label class="form-label">Nombres</label>
                            <input type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}">
                            @error('nombres')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md">
                            <label class="form-label">Apellidos</label>
                            <input type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}">
                            @error('apellidos')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            @error('email')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md">
                            <label class="form-label">Número(s) de teléfono:</label>
                            <div id="telefonos-container">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="telefonos[]" placeholder="Número de teléfono">
                                    <button class="btn btn-outline-secondary" type="button" onclick="agregarTelefono()">Agregar Teléfono</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 my-3">
                        <div class="col-md">
                            <input type="submit" class="btn btn-primary" value="Crear administrador">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function agregarTelefono() {
            var container = $('#telefonos-container');
            var nuevoCampo = $('<div class="input-group mb-3"><input type="text" class="form-control" name="telefonos[]" placeholder="Número de teléfono"><button class="btn btn-outline-secondary" type="button" onclick="eliminarTelefono(this)">Eliminar Teléfono</button></div>');
            container.append(nuevoCampo);
        }

        function eliminarTelefono(boton) {
            $(boton).closest('.input-group').remove();
        }
    </script>
@endsection
