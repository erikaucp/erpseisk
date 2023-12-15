<div>
    <a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#publicacion{{ $id }}">
        Crear publicacion
    </a>
    <!-- Modal -->
    <div class="modal fade" id="publicacion{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Crear Publicacion de {{ $cliente->empresa}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @dump($publicaciones)
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary btn-sm" wire:click="agregar">Agregar publicacion</button>
                        </div>
                    </div>
                    @if ($publicaciones != null)
                        @foreach ($publicaciones as $p => $publicacion)
                        <form wire:submit='crearPlataforma'>
                            <div class="row mt-5" wire:key="{{ $p }}">
                                <div class="col-4">
                                    <label> Tipo de contenido</label>
                                    <select class="form-select @error('tipoContenido.'.$p) is-invalid @enderror" aria-label="Default select example" wire:model.live="tipoContenido.{{ $p }}">
                                        <option selected>Seleccione el tipo de contenido</option>
                                        <option value="1">imagen 1:1</option>
                                        <option value="2">Reel</option>
                                        <option value="3">Short</option>
                                    </select>
                                    @error('tipoContenido.'.$p)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label>Plataforma/Red Social</label>
                                    <select class="form-select @error('plataforma.'.$p) is-invalid @enderror" aria-label="Default select example" wire:model.live="plataforma.{{ $p }}">
                                        <option selected>Seleccione la plataforma</option>
                                        <option value="1">Facebook</option>
                                        <option value="2">Youtube</option>
                                        <option value="3">LinkedIn</option>
                                    </select>
                                    @error('plataforma.'.$p)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label>Fecha de publicación</label>
                                    <input type="date" class="form-control @error('fechaPublicacion.'.$p) is-invalid @enderror" placeholder="Fecha" wire:model.live="fechaPublicacion.{{ $p }}">
                                    @error('fechaPublicacion.'.$p)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label>Link de contenido</label>
                                    <input type="text" class="form-control @error('linkContenido.'.$p) is-invalid @enderror" placeholder="Link de contenido" wire:model.live="linkContenido.{{ $p }}">
                                    @error('linkContenido.'.$p)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label>Descripción</label>
                                    <input type="text" class="form-control @error('descripcion.'.$p) is-invalid @enderror" placeholder="Descripción" wire:model.live="descripcion.{{ $p }}">
                                    @error('descripcion.'.$p)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label>Copy de publicación</label>
                                    <input type="text" class="form-control @error('postCopyPublicacion.'.$p) is-invalid @enderror" placeholder="Copy para la publicación" wire:model.live="postCopyPublicacion.{{ $p }}">
                                    @error('postCopyPublicacion.'.$p)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label>Copy de diseño</label>
                                    <input type="text" class="form-control @error('copyDiseno.'.$p) is-invalid @enderror" placeholder="Copy para el diseño" wire:model.live="copyDiseno.{{ $p }}">
                                    @error('copyDiseno.'.$p)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label>Link de referencia</label>
                                    <input type="text" class="form-control @error('linkReferencia.'.$p) is-invalid @enderror" placeholder="Link de referencia" wire:model.live="linkReferencia.{{ $p }}">
                                    @error('linkReferencia.'.$p)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label>Descarga de recursos</label>
                                    <input type="text" class="form-control @error('linkDescargaRecursos.'.$p) is-invalid @enderror" placeholder="Link para descargar recursos" wire:model.live="linkDescargaRecursos.{{ $p }}">
                                    @error('linkDescargaRecursos.'.$p)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label>Observaciones</label>
                                    <input type="text" class="form-control @error('observaciones.'.$p) is-invalid @enderror" placeholder="Observaciones" wire:model.live="observaciones.{{ $p }}">
                                    @error('observaciones.'.$p)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-1">
                                    <label>Eliminar</label>
                                    <button class="btn btn-outline-danger" wire:click="eliminar('{{ $p }}')">X</button>
                                </div>
                            </div>
                            <hr>
                        </form>
                        @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
