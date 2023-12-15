@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="col-12">
                <div class="w-100 my-4 position-relative">
                    <h3 class="display-3 text-center p2">Editar empresa {{ $datos->empresa }}</h3>   
                </div>
                <p class="text-center p-3">
                    La sección de clientes te permite crear y gestionar los clientes de la empresa.
                    <br>Por favor, complete los campos requeridos para crear un nuevo cliente. Asegúrese de diligenciar toda la información. ¡Gracias!
                </p>    
            </div>
            <div class="card-body">
                <form action="{{ route('updateCliente', $datos->id) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row g-2">
                        <div class="col-md">
                            <label class="form-label">Tipo de identificación</label>
                            <select class="form-control @error('tipoId') is-invalid @enderror" name="tipoId" disabled>
                                <option value="{{ old('tipoId', $datos->tipoId) }}" selected>{{ $datos->tipoId }}</option>
                            </select>
                            @error('tipoId')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>                        
                        <div class="col-md">
                            <label class="form-label">Numero de identificación</label>
                            <input type="text" class="form-control @error('ide') is-invalid @enderror" name="ide" value="{{ old('ide', $datos->ide) }}" disabled>                            
                            @error('ide')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>  
                    </div>
                    <div class="row g-2">                        
                        <div class="col-md">
                            <label class="form-label">Empresa</label>                            
                            <input type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" value="{{ old('empresa', $datos->empresa) }}">
                            @error('empresa')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>                          
                        <div class="col-md">
                            <label class="form-label">Nombres</label>                            
                            <input type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres', $datos->nombres) }}">
                            @error('nombres')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>  
                    </div>                    
                    <div class="row g-2">                        
                        <div class="col-md">
                            <label class="form-label">Apellidos</label>                            
                            <input type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos', $datos->apellidos) }}">
                        </div>                          
                        <div class="col-md">
                            <label class="form-label">Email</label>                            
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $datos->email) }}">                           
                            @error('email')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div> 
                    </div>
                    <div class="row g-2">                         
                        <div class="col-md">
                            <label class="form-label">Teléfono celular</label>                            
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono', $datos->telefono) }}">
                            @error('telefono')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>                          
                        <div class="col-md">
                            <label class="form-label">Teléfono fijo</label>                            
                            <input type="text" class="form-control @error('fijo') is-invalid @enderror" name="fijo" value="{{ old('fijo', $datos->fijo) }}">
                        </div> 
                    </div>
                    <div class="row g-2">                  
                        <div class="col-md">
                            <label class="form-label">Dirección</label>                            
                            <input type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion', $datos->direccion) }}">                           
                            @error('direccion')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>       
                        <div class="col-md">
                            <label class="form-label">Tipo de cliente</label>
                            <select class="form-control @error('tipoC') is-invalid @enderror" name="tipoC" disabled>
                                <option value="{{ old('tipoC', $datos->tipo) }}" selected>{{ $datos->tipo }}                                
                                    @if ($datos->tipo == 'PQ')
                                                Pequeña
                                    @elseif($datos->tipo == 'MD')
                                                Mediana
                                    @elseif($datos->tipo == 'GR')
                                                Grande
                                    @endif
                                </option>
                            </select>
                            @error('tipoC')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>           
                    </div>
                    <div class="row">
                        <div class="col-md">
                        <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
                        <textarea class="form-control" rows="3" name="obsevaciones" value="{{ old('observaciones', $datos->observaciones) }}"></textarea>
                        </div>
                    </div>
                    <div class="row g-2 my-3">   
                        <div class="col-md">
                            <input type="submit" class="btn btn-primary" value="Actualizar cliente">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        @if (session('creado') == 'ok')
            <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

                Toast.fire({
                icon: 'success',
                title: 'Se creó el cliente correctamente'
            })
            </script>
        @endif
    @endpush
@endsection