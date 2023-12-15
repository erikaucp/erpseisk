@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="w-100 my-4 position-relative">
                        <h3 class="display-3 text-center p2">Clientes</h3>  
                        <a href="{{ route('crearCliente') }}" type="button" class="btn btn-primary btn-rounded btn-icon sm position-absolute top-0 start-0" style="border-radius:20% ;">
                            <i class="fs-2 fa fa-plus text-white pt-1"></i>
                        </a> 
                    </div>
                    <p class="text-center p-3">
                        En esta sección podrá ver el listado de todos los clientes activos con Seisk Agencia.
                    </p>    
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="miTabla" class="table table-responsive" style="margin: 0 auto;" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">Tipo de identificación</th>
                                    <th scope="col">Número de identificación</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Tamaño de cliente</th>
                                    <th scope="col">Nombres de administrador</th>
                                    <th scope="col">Apellidos de administrador</th>
                                    <th scope="col">Crear plataforma</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                    <th scope="col">Ver Parrilla</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $k => $cliente)
                                    <tr>
                                        <td>
                                            @php
                                                $tipoIdentificacion = $tiposIdentificacion->find($cliente->idTipoIdentificacion);
                                            @endphp
                                            @if($tipoIdentificacion)
                                                {{ $tipoIdentificacion->nombre }}
                                            @endif
                                        </td>
                                        <td>{{ $cliente->identificacion}}</td>
                                        <td>{{ $cliente->empresa}}</td>
                                        <td>
                                            @if ($cliente->tipo == 'PQ')
                                                Pequeña
                                            @elseif($cliente->tipo == 'MD')
                                                Mediana
                                            @elseif($cliente->tipo == 'GR')
                                                Grande
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $administrador = $administradores->find($cliente->idAdministrador);
                                            @endphp
                                            @if($administrador)
                                                {{ $administrador->nombres }}
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $administrador = $administradores->find($cliente->idAdministrador);
                                            @endphp
                                            @if($administrador)
                                                {{ $administrador->apellidos }}
                                            @endif
                                        </td>
                                        <td>               
                                        <a href="{{ route('crearPlataforma', ['id' => $cliente->id]) }}" class="btn btn-outline-primary btn-sm">Plataformas</a>
                                                                     
                                        {{-- <a href="{{ route('crearPlataforma',$cliente->id) }}" class="btn btn-outline-primary btn-sm">Plataformas</a> --}}

                                            {{-- @livewire('plataformas', ['id' => $cliente->idPlataforma], key($cliente->id)) --}}
                                        </td>
                                        <td>
                                        <a href="{{ route('editCliente',$cliente->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                                        </td>
                                        <td>
                                        <a href="#" class="btn btn-outline-primary btn-sm">Eliminar</a>
                                        </td>
                                        <td>
                                        <a href="#" class="btn btn-outline-primary btn-sm">Ver parrilla</a>
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
        {{-- Script para mostrar alerta de creación de cliente --}}
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