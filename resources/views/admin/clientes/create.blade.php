@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="col-12">
                <div class="w-100 my-4 position-relative">
                    <h3 class="display-3 text-center p2">Crear Cliente</h3>   
                </div>
                <p class="text-center p-3">
                    La sección de clientes te permite crear y gestionar los clientes de la empresa.
                    <br>Por favor, complete los campos requeridos para crear un nuevo cliente. Asegúrese de diligenciar toda la información. ¡Gracias!<br>Recuerda que si un administrador no se encuentra en la lista, debes crearlo primero en la sección de administradores.
                </p>    
            </div>
            <div class="card-body">
                <form action="{{ route('saveCliente') }}" method="post">
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
                            <label class="form-label">Empresa</label>                            
                            <input type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" value="{{ old('empresa') }}">
                            @error('empresa')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>                          
                        <div class="col-md">
                            <label class="form-label">Dirección</label>                            
                            <input type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}">
                            @error('direccion')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>  
                    </div> 
                    <div class="row g-2">               
                            <div class="col-md">
                                <label class="form-label">Tipo de cliente</label>                            
                                <select class="form-control @error('tipo') is-invalid @enderror" name="tipo">
                                    <option value="" selected>Seleccione el tipo de cliente</option>
                                    <option value="GR">Grande</option>
                                    <option value="MD">Mediano</option>
                                    <option value="PQ">Pequeño</option>
                                </select>                           
                                @error('tipo')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md">
                                <label class="form-label">Administrador</label>
                                <select class="form-control @error('idAdministrador') is-invalid @enderror" name="idAdministrador">
                                    @foreach ($administradores as $administrador)
                                        <option value="{{ $administrador->id }}">{{ $administrador->nombres }} {{ $administrador->apellidos }}</option>
                                    @endforeach
                                </select>
                                @error('idAdministrador')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div> 
                    </div>
                    <div class="row">
                        <div class="col-md">
                        <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
                        <textarea class="form-control" rows="3" name="observaciones" value="{{ old('observaciones') }}"></textarea>
                        </div>
                    </div>
                    <div class="row g-2 my-3">   
                        <div class="col-md">
                            <input type="submit" class="btn btn-primary" value="Crear cliente">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection