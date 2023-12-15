@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="col-12">
                <div class="w-100 my-4 position-relative">
                    <h3 class="display-3 text-center p2">Editar Publicación</h3>
                    <h4 class="text-center">Nombre cliente</h4>
                    <h4 class="text-center">Mes de parrilla y rango</h4>
                </div>
                <p class="text-center p-3">
                    Esta sección te permite editar una publicación. Por favor, completa los campos requeridos. Asegúrate de diligenciar toda la información. ¡Gracias!
                </p>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md">
                            <label class="form-label">Estado</label>
                            <select class="form-control @error('estado') is-invalid @enderror" name="estado">
                                <option value="pendiente">Pendiente</option>
                                <option value="publicado">Publicado</option>
                                <option value="en revision">En Revisión</option>
                            </select>
                            @error('estado')
                            <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md">
                            <label class="form-label">Fecha de Publicación</label>
                            <input type="date" class="form-control @error('fechaPublicacion') is-invalid @enderror"
                                name="fechaPublicacion" value="">
                            @error('fechaPublicacion')
                            <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <label class="form-label">Link de Contenido</label>
                            <input type="text" class="form-control @error('linkContenido') is-invalid @enderror"
                                name="linkContenido" value="">
                            @error('linkContenido')
                            <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md">
                            <label class="form-label">Post Copy de Publicación</label>
                            <textarea class="form-control @error('postCopyPublicacion') is-invalid @enderror"
                                name="postCopyPublicacion"></textarea>
                            @error('postCopyPublicacion')
                            <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <label class="form-label">Link de referencia</label>
                            <input type="text" class="form-control @error('linkContenido') is-invalid @enderror"
                                name="linkContenido" value="">
                            @error('linkContenido')
                            <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md">
                            <label class="form-label">Copy de Diseño</label>
                            <textarea class="form-control @error('postCopyPublicacion') is-invalid @enderror"
                                name="postCopyPublicacion"></textarea>
                            @error('postCopyPublicacion')
                            <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <label class="form-label">Link de descarga de recursos</label>
                            <input type="text" class="form-control @error('linkContenido') is-invalid @enderror"
                                name="linkContenido" value="">
                            @error('linkContenido')
                            <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md">
                            <label class="form-label">Observaciones</label>
                            <textarea class="form-control @error('postCopyPublicacion') is-invalid @enderror"
                                name="postCopyPublicacion"></textarea>
                            @error('postCopyPublicacion')
                            <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2 my-3">
                        <div class="col-md">
                            <input type="submit" class="btn btn-primary" value="Actualizar Publicación">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('js')
        @if (session('actualizado') == 'ok')
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
                    title: 'Se actualizó la publicación correctamente'
                })
            </script>
        @endif
    @endpush
@endsection
