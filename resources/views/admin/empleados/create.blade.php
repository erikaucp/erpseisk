@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="col-12">
            </div>
            <div class="card-body">
                <h2>Creación de Empleados</h2>
                    <form method="POST" action="">
                        @csrf <!-- Agregar el token de seguridad de Laravel -->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Campo para la identificación -->
                                <div class="form-group">
                                    <label for="identificacion">Identificación:</label>
                                    <input type="text" class="form-control" id="identificacion" name="identificacion" required>
                                </div>

                                <!-- Campo para nombres -->
                                <div class="form-group">
                                    <label for="nombres">Nombres:</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" required>
                                </div>

                                <!-- Campo para el correo electrónico -->
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                
                                <!-- Campo para observaciones -->
                                <div class="form-group">
                                    <label for="observaciones">Observaciones:</label>
                                    <textarea class="form-control" id="observaciones" name="observaciones" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Campo para el tipo de identificación (lista desplegable) -->
                                <div class="form-group">
                                    <label for="tipo_identificacion">Tipo de Identificación:</label>
                                    <select class="form-control" id="tipo_identificacion" name="tipo_identificacion" required>
                                        <option value="Cédula">Cédula</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                        <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                                        <option value="NIT">NIT</option>
                                    </select>
                                </div>
                                
                                <!-- Campo para apellidos -->
                                <div class="form-group">
                                    <label for="apellidos">Apellidos:</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                                </div>

                                <!-- Campo para el rol (lista desplegable) -->
                                <div class="form-group">
                                    <label for="rol">Rol:</label>
                                    <select class="form-control" id="rol" name="rol" required>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Community">Community</option>
                                        <option value="Diseñador">Diseñador</option>
                                    </select>
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