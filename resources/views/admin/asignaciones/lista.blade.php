@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="w-100 my-4 position-relative">
                        <h4 class="display-3 text-center p2">Asignaciones CM</h4>  
                        <a href="" type="button" class="btn btn-primary btn-rounded btn-icon sm position-absolute top-0 start-0" style="border-radius:20% ;">
                            <i class="fs-2 fa fa-plus text-white pt-1"></i>
                        </a> 
                    </div>
                    <p class="text-center p-3">
                        En esta sección podrá ver el listado de todas los clientes asignados a cada CM.
                    </p>    
                </div>
            </div>
            <form method="POST" action="">
                @csrf <!-- Agregar el token de seguridad de Laravel -->
                
                <div class="row">
                    <div class="col-md-6">
                        <!-- Campo para seleccionar un cliente (lista desplegable) -->
                        <div class="form-group">
                            <label for="ideCliente">Seleccionar Cliente</label>
                            <select name="idCliente" id="idCliente" class="form-control">
                                <option value="">Listado de clientes</option>
                            </select>
                            {{-- <select name="ideCliente" id="ideCliente" class="form-control">
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->ide }}">{{ $cliente->empresa }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Campo para asignar un empleado al cliente (lista desplegable) -->
                        <div class="form-group">
                            <label for="empleado">Empleado:</label>
                            <select class="form-control" id="empleado" name="empleado" required>
                                <option value="Empleado1">Maria Fernanda Quintero</option>
                                <option value="Empleado2">Duliana Montoya</option>
                                <option value="Empleado3">Laura Crus</option>
                                <!-- Agrega más opciones de empleados si es necesario -->
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Botón de enviar -->
                <button type="submit" class="btn btn-primary">Asignar</button>
            </form>
        </div>
    </div>
    @push('js')
        <script>
            $(document).ready( function () {
                $('#miTabla').DataTable();
            } );
        </script>
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
        @if (session('actualizar') == 'ok')
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
                    title: 'Se actualizo el cliente correctamente'
                })
            </script>
        @endif
    @endpush
@endsection