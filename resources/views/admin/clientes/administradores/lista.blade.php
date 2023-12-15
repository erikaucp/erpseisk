@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="w-100 my-4 position-relative">
                        <h3 class="display-3 text-center p2">Administradores</h3>
                        <a href="{{ route('crearAdministrador') }}" type="button" class="btn btn-primary btn-rounded btn-icon sm position-absolute top-0 start-0" style="border-radius:20%;">
                            <i class="fs-2 fa fa-plus text-white pt-1"></i>
                        </a>
                    </div>
                    <p class="text-center p-3">
                        En esta sección podrás ver el listado de todos los administradores para asignar a los clientes activos con Seisk Agencia.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="miTabla" class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Número de identificación</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Email</th>
                                    {{-- <th scope="col">Teléfonos</th> --}}
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($administradores as $administrador)
                                    <tr>
                                        <td>{{ $administrador->identificacion }}</td>
                                        <td>{{ $administrador->nombres }}</td>
                                        <td>{{ $administrador->apellidos }}</td>
                                        <td>{{ $administrador->email }}</td>
                                        {{-- <td>
                                            @foreach ($administrador->telefonos as $telefono)
                                                {{ $telefono->numero }}<br>
                                            @endforeach
                                        </td> --}}
                                        <td>
                                            <a href="#" class="btn btn-outline-primary btn-sm">Editar</a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-outline-primary btn-sm">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
        </script>
    @endpush
@endsection
