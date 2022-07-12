
<?php include('../sections/alumnos.php'); ?>

<!-- /* --------------------------------- HEADER --------------------------------- */ -->

<?php include('../templates/header.php'); ?>

<!-- /* --------------------------------- CUERPO --------------------------------- */ -->

<div class="row">

    <div class="col-5">
        <form action="" method="post">

            <div class="card">
                <div class="card-header">
                    Alumnos
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text"
                            class="form-control" value="<?php echo $id ?>" name="id" id="id" aria-describedby="helpId" placeholder="ID">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text"
                            class="form-control" value="<?php echo $nombre ?>" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Escriba el nombre">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text"
                            class="form-control" value="<?php echo $apellido ?>" name="apellido" id="apellido" aria-describedby="helpId" placeholder="Escriba el apellido">
                    </div>
                    <div class="mb-3">
                        <label for="cursos" class="form-label">Cursos del alumno:</label>

                        <select multiple class="form-control" name="cursos[]" id="listaCursos">

                            <option disabled>Seleccione un opcion</option>
                            <?php foreach($cursos as $curso){ ?>

                                <option 
                                <?php
                                    if(!empty($arregloCursos)){
                                        if(in_array($curso['id'], $arregloCursos)){
                                            echo 'selected';
                                        }
                                    }
                                ?>
                                value="<?php echo $curso['id'];?>">
                                <?php echo $curso['id'];?> - <?php echo $curso['nombre_curso'];?>
                                </option>

                            <?php } ?>
                        </select>

                    </div>

                    <div class="btn-group" role="group" aria-label="">
                        <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
                        <button type="submit" name="accion" value="editar" class="btn btn-warning">Editar</button>
                        <button type="submit" name="accion" value="borrar" class="btn btn-danger">Borrar</button>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>

        </form>
    </div>

    <div class="col-7">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($alumnos as $alumno){ ?>

                <tr>
                    <td><?php echo $alumno['id'] ?></td>
                    <td>
                        <?php echo $alumno['nombre'] ?> <?php echo $alumno['apellido'] ?>
                        <?php foreach($alumno['cursos'] as $curso) { ?>

                        <br/>  - <a href="certificado.php?idCurso=<?php echo $curso['id']?>;&idAlumno=<?php echo $alumno['id'] ?>"><?php echo $curso['nombre_curso']; ?></a>
                            
                        <?php } ?>
                    </td>
                    <td>
                        <form action="" method="post">

                            <input type="hidden" name="id" value="<?php echo $alumno['id'];?>">
                            <input type="submit" value="Seleccionar" name="accion" class="btn btn-info">

                        </form>
                    </td>

                </tr>

                <?php } ?>
            </tbody>
        </table>
        
    </div>

</div>


<!-- /* --------------------------------- FOOTER --------------------------------- */ -->
<!-- https://tom-select.js.org/ -->
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.1.0/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.1.0/dist/js/tom-select.complete.min.js"></script>

<script>

    new TomSelect('#listaCursos');

</script>

<?php include('../templates/footer.php'); ?>