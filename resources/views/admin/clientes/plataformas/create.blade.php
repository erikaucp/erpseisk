@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                        <div class="w-100 position-relative">
                            <h3 class="display-3 text-center p2" id="nombreCliente">{{ $cliente->empresa ?? '' }} </h3>
                        </div>
                        <p class="text-center p-3">
                           La sección de plataformas te permite crear las redes sociales disponibles de este cliente.<br>Por favor, complete los campos requeridos para crear una nueva plataforma. Asegúrese de diligenciar toda la información. ¡Gracias!<br>
                        </p> 
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="col-12">
                        <h4>Crear Plataforma</h4>
                    </div>
                        <form action="{{ route('savePlataforma') }}" method="POST">
                            @csrf                                                
                                {{-- <div class="col-md">
                                    <label for="idCliente">Seleccionar Cliente</label>
                                    <select name="idCliente" id="idCliente" class="form-control">
                                        @foreach ($clientes as $c)
                                            <option value="{{ $c->id }}">{{ $c->empresa }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <!-- Campo de solo lectura para mostrar el nombre del cliente -->
                                <div class="col-md">
                                    <!--Campo oculto con id del cliente para crear plataforma-->
                                    <input type="hidden" name="idCliente" value="{{ $cliente->id }}">
                                </div>
                                <div class="col-md">
                                    <label class="form-label">Nombre de la plataforma</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}">
                                    @error('nombre')
                                        <small class="text-danger">*{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Agrega el siguiente bloque dentro del formulario -->
                                @if(isset($clienteId))
                                    <input type="hidden" name="clienteId" value="{{ $clienteId }}">
                                @endif
                                <!-- Fin del bloque a agregar -->
                                    <div class="col-md">
                                        <label class="form-label">URL</label>
                                        <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}">
                                        @error('url')
                                            <small class="text-danger">*{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea class="form-control" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                                    </div><br>
                                    <div class="col-md">
                                        <input type="submit" class="btn btn-primary" value="Crear plataforma">
                                    </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <!-- Formulario para crear plataformas -->
                        {{-- <div>
                            <h2>Crear Plataforma</h2>
                            <form wire:submit.prevent="crearPlataforma">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" wire:model="nombre">
                                </div>
                                <div class="form-group">
                                    <label for="url">URL:</label>
                                    <input type="text" class="form-control" wire:model="url">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <input type="text" class="form-control" wire:model="descripcion">
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div> --}}
                        
                        <!-- Aquí puedes mostrar las plataformas creadas -->
                        <h4>Plataformas del cliente</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre de la plataforma</th>
                                    <th>URL</th>
                                    <th>Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plataformas as $plataforma)
                                    <tr>
                                        <td>{{ $plataforma->nombre }}</td>
                                        <td>{{ $plataforma->url }}</td>
                                        {{-- <td>
                                            @if(!empty($plataforma->url))
                                                <a href="{{ $plataforma->url }}" target="_blank">{{ $plataforma->url }}</a>
                                            @else
                                                Sin URL
                                            @endif
                                        </td> --}}
                                        <td>{{ $plataforma->descripcion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Script para actualizar el campo de solo lectura si se recibe un cliente -->
@push('js')
    <script>
        // Obtén el elemento del campo de solo lectura
        var nombreClienteInput = document.getElementById('nombreCliente');

        // Verifica si el cliente se ha recibido y actualiza el campo de solo lectura
        if ('{{ $cliente->id ?? null }}' !== null) {
            // Establece el valor del campo de solo lectura al nombre del cliente seleccionado
            nombreClienteInput.value = '{{ $cliente->empresa ?? '' }}';
        }
    </script>
@endpush
@endsection