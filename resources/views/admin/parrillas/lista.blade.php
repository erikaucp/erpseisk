@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="w-100 my-4 position-relative">
                        <h3 class="display-3 text-center p2">Parrillas</h3>  
                        <a href="{{ route('crearParrilla') }}" type="button" class="btn btn-primary btn-rounded btn-icon sm position-absolute top-0 start-0" style="border-radius:20% ;">
                            <i class="fs-2 fa fa-plus text-white pt-1"></i>
                        </a> 
                    </div>
                    <p class="text-center p-3">
                        En esta sección podrá ver el listado de todas las parrillas correspondientes a los clientes activos con Seisk Agencia.
                        <br>Para ver las publicaciones correspondientes a cada parrilla, haga click en el botón "Publicaciones".
                    </p>    
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-responsive" id="miTabla">
                        <thead>
                                <tr>
                                <th scope="col">Número de identificación</th>
                                <th scope="col">Empresa</th>
                                <th scope="col">Mes</th>
                                <th scope="col">Parrilla</th>
                                <th scope="col">Observaciones</th>
                                <th scope="col">Publicaciones</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parrillas as $k => $parrilla)
                                <tr>
                                    <td>{{ $parrilla->Cliente->identificacion}}</td>
                                    <td>{{ $parrilla->Cliente->empresa}}
                                    </td>
                                    <td>
                                        @if ($parrilla->mes == '1')
                                            Enero
                                        @elseif($parrilla->mes == '2')
                                            Febrero
                                        @elseif($parrilla->mes == '3')
                                            Marzo
                                        @elseif($parrilla->mes == '4')
                                            Abril
                                        @elseif($parrilla->mes == '5')
                                            Mayo
                                        @elseif($parrilla->mes == '6')
                                            Junio
                                        @elseif($parrilla->mes == '7')
                                            Julio
                                        @elseif($parrilla->mes == '8')
                                            Agosto
                                        @elseif($parrilla->mes == '9')
                                            Septiembre
                                        @elseif($parrilla->mes == '10')
                                            Octubre
                                        @elseif($parrilla->mes == '11')
                                            Noviembre
                                        @elseif($parrilla->mes == '12')
                                            Diciembre    
                                        @endif

                                    
                                    </td>
                                    <td>
                                        @if ($parrilla->quincenaPublicacion == '1')
                                            Del 1 al 15
                                        @elseif($parrilla->quincenaPublicacion == '2')
                                            Del 16 al 30/31
                                        @endif
                                    </td>
                                    <td>{{ $parrilla->observaciones}}</td>
                                    <td>
                                        <a href="{{ route('createPublicacion', ['id' => $parrilla->id]) }}" class="btn btn-outline-primary btn-sm">Publicaciones</a>
                                         {{-- @livewire('publicaciones', ['id' => $parrilla->id], key($parrilla->id)) --}}
                                    </td>
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

                    {{-- <table class="table table-responsive" id="miTabla">
                        <thead>
                            <tr>
                            <th scope="col">Número de identificación</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Parrilla</th>
                            <th scope="col">Publicaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>          
                        </tbody>
                    </table> --}}
                </div>
            </div>
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
                title: 'Se creó la parrilla correctamente'
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
                    title: 'Se actualizo la parrilla correctamente'
                })
            </script>
        @endif
    @endpush
@endsection