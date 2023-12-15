{{-- <div>
    <a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#plataforma{{ $id }}">
        Crear Plataforma
    </a>
    <!-- Modal -->
    <div class="modal fade" id="plataforma{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Crear Plataformas de {{ $cliente->empresa}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @dump($redes)
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary btn-sm" wire:click="agregar">Agregar red social</button>
                        </div>
                    </div>
                    @if ($redes != null)
                        @foreach ($redes as $r => $red)
                        <form wire:submit='crearPlataforma'>
                            <div class="row mt-3" wire:key="{{ $r }}">
                                <div class="col-4">
                                    <label> Red Social</label>
                                    <select class="form-select @error('redSocial.'.$r) is-invalid @enderror" aria-label="Default select example" wire:model.live="redSocial.{{ $r }}">
                                        <option selected>Seleccione una red social</option>
                                        <option value="YouTube">YouTube</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="Linkedin">LinkedIn</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="Pinterest">Pinterest</option>
                                        <option value="TikTok">TikTok</option>
                                    </select>
                                    @error('redSocial.'.$r)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label>Link</label>
                                    <input type="text" class="form-control @error('link.'.$r) is-invalid @enderror" placeholder="Link de la red social" wire:model.live="link.{{ $r }}">
                                    @error('link.'.$r)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label>Descripcion</label>
                                    <textarea class="form-control @error('descripcion.'.$r) is-invalid @enderror" rows="1"  wire:model.live="descripcion.{{ $r }}"></textarea>
                                    @error('descripcion.'.$r)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-1">
                                    <label>Eliminar</label>
                                    <button class="btn btn-outline-danger" wire:click="eliminar('{{ $r }}')">X</button>
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
</div> --}}




<div>
    <a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#plataforma{{ $idPlataforma }}">
        Crear Plataforma
    </a>
    <!-- Modal -->
    <div class="modal fade" id="plataforma{{ $idPlataforma }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h1 class="modal-title fs-5">Crear Plataformas de {{ $cliente->empresa}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
                <div class="modal-body">
                    @dump($redes)
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary btn-sm" wire:click="agregar">Agregar red social</button>
                        </div>
                    </div>
                    @if ($redes != null)
                        @foreach ($redes as $r => $red)
                            <div class="row mt-3" wire:key="{{ $r }}">
                                <div class="col-4">
                                    <label> Red Social</label>
                                    <select class="form-select @error('redSocial.'.$r) is-invalid @enderror" aria-label="Default select example" wire:model.live="redSocial.{{ $r }}">
                                        <option selected>Seleccione una red social</option>
                                        <option value="YouTube">YouTube</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="Linkedin">LinkedIn</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="Pinterest">Pinterest</option>
                                        <option value="TikTok">TikTok</option>
                                    </select>
                                    @error('redSocial.'.$r)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label>Link</label>
                                    <input type="text" class="form-control @error('link.'.$r) is-invalid @enderror" placeholder="Link de la red social" wire:model.live="link.{{ $r }}">
                                    @error('link.'.$r)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-3">
                                    <label>Descripcion</label>
                                    <textarea class="form-control @error('descripcion.'.$r) is-invalid @enderror" rows="1"  wire:model.live="descripcion.{{ $r }}"></textarea>
                                    @error('descripcion.'.$r)
                                        <small class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-1">
                                    <label>Eliminar</label>
                                    <button class="btn btn-outline-danger" wire:click="eliminar('{{ $r }}')">X</button>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click="save">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
