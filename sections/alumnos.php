<?php 

// INSERT INTO `alumnos` (`id`, `nombre`, `apellido`) VALUES (NULL, 'Manuel', 'Diez');

include_once '../settings/db.php';
$conexionDB = DB::crearInstancia();


$id=isset($_POST['id'])?$_POST['id']:'';
$nombre=isset($_POST['nombre'])?$_POST['nombre']:'';
$apellido=isset($_POST['apellido'])?$_POST['apellido']:'';

$cursos=isset($_POST['cursos'])?$_POST['cursos']:'';
$accion=isset($_POST['accion'])?$_POST['accion']:'';


if($accion){
    switch ($accion) {
        case 'agregar':
            $sql = "INSERT INTO `alumnos` (`id`, `nombre`, `apellido`) VALUES (NULL, :nombre, :apellido)";
            $consulta = $conexionDB->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellido', $apellido);
            $consulta->execute();

            $idAlumno=$conexionDB->lastInsertId();

            foreach($cursos as $curso){
                $sql = "INSERT INTO alumnos_cursos (id, id_alumno, id_curso) VALUES (NULL, :id_alumno, :id_curso)";
                $consulta = $conexionDB->prepare($sql);
                $consulta->bindParam(':id_alumno', $idAlumno);
                $consulta->bindParam(':id_curso', $curso);
                $consulta->execute();

            }

        break;
        case 'Seleccionar':
           
            $sql = "SELECT * FROM alumnos WHERE id=:id";
            $consulta = $conexionDB->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $alumno=$consulta->fetch(PDO::FETCH_ASSOC);
            $nombre = $alumno['nombre'];
            $apellido = $alumno['apellido'];

            $sql = "SELECT cursos.id FROM alumnos_cursos INNER JOIN cursos ON cursos.id=alumnos_cursos.id_curso WHERE alumnos_cursos.id_alumno = :id_alumno";
            $consulta = $conexionDB->prepare($sql);
            $consulta->bindParam(':id_alumno', $id);
            $consulta->execute();
            $cursoAlumno=$consulta->fetchAll(PDO::FETCH_ASSOC);
            print_r($cursoAlumno);

            foreach($cursoAlumno as $curso){
                $arregloCursos[] = $curso['id'];
            }


        break;

        case 'borrar':
            $sql = "DELETE FROM alumnos WHERE id=:id";
            $consulta= $conexionDB->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
        break;

        case 'editar':
            $sql = "UPDATE alumnos SET nombre=:nombre, apellido=:apellido WHERE id=:id";
            $consulta = $conexionDB->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellido', $apellido);
            $consulta->bindParam(':id', $id);
            $consulta->execute();

            if(isset($cursos)){
                $sql="DELETE FROM alumnos_cursos WHERE id_alumno = :id_alumno";
                $consulta=$conexionDB->prepare($sql);
                $consulta->bindParam(':id_alumno', $id);
                $consulta->execute();

                foreach($cursos as $curso){
                    $sql = "INSERT INTO alumnos_cursos (id, id_alumno, id_curso) VALUES (NULL, :id_alumno, :id_curso)";
                    $consulta= $conexionDB->prepare($sql);
                    $consulta->bindParam(':id_alumno', $id);
                    $consulta->bindParam(':id_curso', $curso);
                    $consulta->execute();

                }

                $arregloCursos=$cursos;
            }
        break;
    }   


}


$sql="SELECT * FROM alumnos";
$listaAlumnos = $conexionDB->query($sql);
$alumnos = $listaAlumnos->fetchAll();

foreach($alumnos as $clave => $alumno){

    $sql = "SELECT * FROM cursos WHERE id IN (SELECT id_curso FROM alumnos_cursos WHERE id_alumno=:id_alumno)";
    $consulta = $conexionDB->prepare($sql);
    $consulta->bindParam(':id_alumno', $alumno['id']);
    $consulta->execute();
    $cursoAlumno = $consulta->fetchAll();

    $alumnos[$clave]['cursos'] = $cursoAlumno;

}

$sql = "SELECT * FROM cursos";
$listaCursos = $conexionDB->query($sql);
$cursos= $listaCursos->fetchAll();


?>