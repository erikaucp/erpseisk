@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2>Crear Parrilla</h2>
                    </div>
                </div>
                    <form action="{{ route('saveParrilla') }}" method="post">
                    @csrf
                        <div class="row g-2">
                            <div class="col-md">
                            <label for="idCliente">Seleccionar Cliente</label>
                            <select name="idCliente" id="idCliente" class="form-control">
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->empresa }}</option>
                                @endforeach
                            </select>

                            </div>      
                            <div class="col-md">
                                <label class="form-label">Mes</label>
                                <select class="form-control @error('mes') is-invalid @enderror" name="mes">
                                    <option value="" selected>Seleccione el mes</option>
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>                
                                </select>
                                @error('mes')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>  
                        </div>
                        <div class="row g-2">
                            <div class="col-md">
                                <label class="form-label">Quincena de parrilla</label>
                                <select class="form-control @error('quincenaPublicacion') is-invalid @enderror" name="quincenaPublicacion">
                                    <option value="" selected>Seleccione el rango de la parrila</option>
                                    <option value="1">1 al 15</option>
                                    <option value="2">16 al 30/31</option>
                                </select>
                                @error('quincenaPublicacion')
                                    <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div> 
                            <div class="col-md">
                                <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
                                <textarea class="form-control" name="observaciones" value="{{ old('observaciones') }}" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row g-2 my-3">   
                            <div class="col-md">
                                <input type="submit" class="btn btn-primary" value="Crear parrilla">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection