@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="w-100 position-relative">
                        <div class="w-100 position-relative">
                            <h3 class="display-3 text-center p2" id="nombreCliente">{{ $cliente->empresa ?? '' }} </h3>   
                        </div>
                        <h1 class="display-3 text-center p2" id="nombreCliente">{{ $parrilla->idCliente ?? '' }} </h1>   
                        <h3 class="text-center p2" >{{$parrilla->idCliente ?? '' }} </h3>
                        <h3 class="text-center p2" >{{$parrilla->quincenaPublicacion ?? '' }} </h3>
                        <h4 class="text-center p2" >Mes de parrilla</h4>
                    </div>
                    <p class="text-center p-3">
                        Esta sección te permite crear una nueva publicación para la parrilla del cliente. Por favor, completa los campos requeridos. Asegúrate de diligenciar toda la información. ¡Gracias!<br>
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-12">
                            <h4>Crear Publicación</h4>
                        </div>
                        <form action="{{ route('savePublicacion') }}" method="POST">
                            @csrf
                            {{-- <div class="col-md">
                                <input type="hidden" name="idParrilla" value="{{ $parrilla->id }}">
                            </div> --}}
                            <div class="col-md">
                                <label class="form-label">Fecha de Publicación</label>
                                <input type="date" class="form-control @error('fechaPublicacion') is-invalid @enderror" name="fechaPublicacion" value="{{ old('fechaPublicacion') }}">
                                @error('fechaPublicacion')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md">
                                <label class="form-label">Link Contenido</label>
                                <input type="text" class="form-control @error('linkContenido') is-invalid @enderror" name="linkContenido" value="{{ old('linkContenido') }}">
                                @error('linkContenido')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md">
                                <label class="form-label">Post Copy Publicación</label>
                                <textarea class="form-control @error('postCopyPublicacion') is-invalid @enderror" name="postCopyPublicacion" rows="3">{{ old('postCopyPublicacion') }}</textarea>
                                @error('postCopyPublicacion')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md">
                                <label class="form-label">Copy Diseño</label>
                                <textarea class="form-control @error('copyDiseno') is-invalid @enderror" name="copyDiseno" rows="3">{{ old('copyDiseno') }}</textarea>
                                @error('copyDiseno')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md">
                                <label class="form-label">Link Referencia</label>
                                <input type="text" class="form-control @error('linkReferencia') is-invalid @enderror" name="linkReferencia" value="{{ old('linkReferencia') }}">
                                @error('linkReferencia')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md">
                                <label class="form-label">Link Descarga Recursos</label>
                                <input type="text" class="form-control @error('linkDescargaRecursos') is-invalid @enderror" name="linkDescargaRecursos" value="{{ old('linkDescargaRecursos') }}">
                                @error('linkDescargaRecursos')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md">
                                <label class="form-label">Observaciones</label>
                                <textarea class="form-control @error('observaciones') is-invalid @enderror" name="observaciones" rows="3">{{ old('observaciones') }}</textarea>
                                @error('observaciones')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md">
                                <label class="form-label">Tipo de Contenido</label>
                                
                                {{-- <select class="form-select @error('idTipoContenido') is-invalid @enderror" name="idTipoContenido">
                                    @foreach($tiposPrueba as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('idTipoContenido')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror --}}
                            </div>
                            @foreach($tiposPrueba as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                            <div class="col-md">
                                <input type="submit" class="btn btn-primary" value="Crear publicación">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
                <div class="row my-5">
                    <h4>Publicaciones Actuales</h4>
                        <table class="table table-responsive" id="miTabla">
                            <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Fecha de Publicación</th>
                                    <th>Ver más</th>
                                    <!-- Otras columnas -->
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td><button class="btn btn-outline-success btn-sm">Publicada</button></td>
                                        <td>12/11/2023</td>
                                        <td>
                                            <a href="{{ route('editPublicacion')}}" class="btn btn-outline-primary btn-sm">Ver más</a>
                                        <!-- Otras columnas -->
                                    </tr>
                                    <tr>
                                        <td><button class="btn btn-outline-warning btn-sm">En revisión</button></td>
                                        <td>13/11/2023</td>
                                        <td>
                                            <a href="{{ route('editPublicacion')}}" class="btn btn-outline-primary btn-sm">Ver más</a>
                                        <!-- Otras columnas -->
                                    </tr>
                                    <tr>
                                        <td><button class="btn btn-outline-info btn-sm">Aprobada</button></td>
                                        <td>14/11/2023</td>
                                        <td>
                                            <a href="{{ route('editPublicacion')}}" class="btn btn-outline-primary btn-sm">Ver más</a>
                                        <!-- Otras columnas -->
                                    </tr>
                                    <tr>
                                        <td><button class="btn btn-outline-danger btn-sm">Pendiente</button></td>
                                        <td>15/11/2023</td>
                                        <td>
                                            <a href="{{ route('editPublicacion')}}" class="btn btn-outline-primary btn-sm">Ver más</a>
                                        <!-- Otras columnas -->
                                    </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        myVariable = {!! json_encode($books) !!};
        console.log(myVariable);
    </script>
@endsection
