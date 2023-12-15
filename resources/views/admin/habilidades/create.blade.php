@extends('plantilla')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="col-12">
            </div>
            <div class="card-body">
                <h2>Habilidades de Empleado</h2>
                    <form method="POST" action="">
                        @csrf <!-- Agregar el token de seguridad de Laravel -->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Campo para el nombre del empleado -->
                                <div class="form-group">
                                    <label for="nombre">Nombre del Empleado:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Campo para el rol del empleado -->
                                <div class="form-group">
                                    <label for="rol">Identificacion:</label>
                                    <input type="text" class="form-control" id="rol" name="rol" required>
                                </div>
                            </div>
                        </div>

                        <!-- Checklist de Habilidades -->
                        <div class="form-group">
                            <label>Habilidades:</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="diseno_grafico" name="habilidades[]" value="Diseño Gráfico">
                                <label class="form-check-label" for="diseno_grafico">Diseño Gráfico</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="ilustracion" name="habilidades[]" value="Ilustración">
                                <label class="form-check-label" for="ilustracion">Ilustración</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="edicion_video" name="habilidades[]" value="Edición de Video">
                                <label class="form-check-label" for="edicion_video">Edición de Video</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="identidad_corporativa" name="habilidades[]" value="Identidad Corporativa">
                                <label class="form-check-label" for="identidad_corporativa">Identidad Corporativa</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="diseno_web" name="habilidades[]" value="Diseño Web">
                                <label class="form-check-label" for="diseno_web">Diseño Web</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="gestion_redes_sociales" name="habilidades[]" value="Gestión de Redes Sociales">
                                <label class="form-check-label" for="gestion_redes_sociales">Gestión de Redes Sociales</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="creacion_contenido" name="habilidades[]" value="Creación de Contenido">
                                <label class="form-check-label" for="creacion_contenido">Creación de Contenido</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="analisis_metricas" name="habilidades[]" value="Análisis de Métricas">
                                <label class="form-check-label" for="analisis_metricas">Análisis de Métricas</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="marketing_digital" name="habilidades[]" value="Marketing Digital">
                                <label class="form-check-label" for="marketing_digital">Marketing Digital</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="redaccion_contenidos" name="habilidades[]" value="Redacción de Contenidos">
                                <label class="form-check-label" for="redaccion_contenidos">Redacción de Contenidos</label>
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