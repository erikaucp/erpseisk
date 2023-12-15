<div>
    <div class="row">
        @dump($parrilla)
        <h3 class="display-3 text-center p2">Agregar publicación a parrilla {{ $parrilla->id }}</h3>           
    </div>
    <form action="{{ route('crearPublicacion', $parrilla->id) }}" method="POST">
        @method('put')
        @csrf
        <div class="row mt-5">
            {{-- <input type="text" class="form-control @error('idParrilla') is-invalid @enderror" name="idParrilla" value="{{ old('idParrilla', $parrilla->id) }}" disabled>                            
            @error('idParrilla')
                <small class="text-danger">*{{ $message }}</small>
            @enderror --}}
            <div class="col-4">
                <label> Tipo de contenido</label>
                <select class="form-select @error('tipoContenido') is-invalid @enderror" aria-label="Default select example" wire:model.live="tipoContenido">
                    <option selected>Seleccione el tipo de contenido</option>
                    <option value="1">imagen 1:1</option>
                    <option value="2">Reel</option>
                    <option value="3">Short</option>
                </select>
                @error('tipoContenido')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-3">
                <label>Fecha de publicación</label>
                <input type="date" class="form-control @error('fechaPublicacion') is-invalid @enderror" placeholder="Fecha" wire:model.live="fechaPublicacion">
                @error('fechaPublicacion')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-3">
                <label>Link de contenido</label>
                <input type="text" class="form-control @error('linkContenido') is-invalid @enderror" placeholder="Link de contenido" wire:model.live="linkContenido">
                @error('linkContenido')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-3">
                <label>Copy de publicación</label>
                <input type="text" class="form-control @error('postCopyPublicacion') is-invalid @enderror" placeholder="Copy para la publicación" wire:model.live="postCopyPublicacion">
                @error('postCopyPublicacion')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-3">
                <label>Copy de diseño</label>
                <input type="text" class="form-control @error('copyDiseno') is-invalid @enderror" placeholder="Copy para el diseño" wire:model.live="copyDiseno">
                @error('copyDiseno')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-3">
                <label>Link de referencia</label>
                <input type="text" class="form-control @error('linkReferencia') is-invalid @enderror" placeholder="Link de referencia" wire:model.live="linkReferencia">
                @error('linkReferencia')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-3">
                <label>Descarga de recursos</label>
                <input type="text" class="form-control @error('linkDescargaRecursos') is-invalid @enderror" placeholder="Link para descargar recursos" wire:model.live="linkDescargaRecursos">
                @error('linkDescargaRecursos')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-3">
                <label>Observaciones</label>
                <input type="text" class="form-control @error('observaciones') is-invalid @enderror" placeholder="Observaciones" wire:model.live="observaciones">
                @error('observaciones')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-1">
                <label>Eliminar</label>
                <button wire:click="crearPublicacion">Crear Publicación</button>
            </div>
        </div>
        <hr>
    </form>

    <div class="col-4">
        <h4>Publicaciones creadas: {{$publicacionesCount}} </h4>
        <div>
            <table>
                @foreach ($publicacionres as $publicacion)
                    <td> {{$publicacion => fechaPublicacion}} </td> 
                @endforeach
            </table>
        </div>
    </div>
<hr>
</div>
