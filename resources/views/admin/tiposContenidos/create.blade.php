@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="col-12">
            </div>
            <div class="card-body">
                <h2>Contenido para Redes Sociales</h2>
                <form method="POST" action="">
                    @csrf <!-- Agregar el token de seguridad de Laravel -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Campo para el tipo de contenido -->
                            <div class="form-group">
                                <label for="tipo_contenido">Tipo de Contenido:</label>
                                <select class="form-control" id="tipo_contenido" name="tipo_contenido" required>
                                    <option value="">Imagen 1:1</option>
                                    <option value="">Imagen 4:5</option>
                                    <option value="">Imagen 9:16</option>
                                    <option value="">Video Reel</option>
                                    <option value="">Video 9:16</option>
                                    <!-- Agrega más opciones de tipos de contenido si es necesario -->
                                </select>
                            </div>

                            <!-- Campo para la descripción -->
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Campo para la URL de ejemplo -->
                            <div class="form-group">
                                <label for="url_ejemplo">URL de Ejemplo:</label>
                                <input type="text" class="form-control" id="url_ejemplo" name="url_ejemplo" required>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de enviar -->
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                
                </div>
            </div>
        </div>
    </div>
@endsection