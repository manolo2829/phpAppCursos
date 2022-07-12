<?php

    require('../library/fpdf/fpdf.php');
    include_once('../settings/db.php');

    $conexionDB = DB::crearInstancia();

    function agregarTexto($pdf, $texto, $x, $y, $align='L', $fuente,$size=10, $r=0, $g=0, $b=0){

        $pdf->SetFont($fuente, "", $size);
        $pdf->SetXY($x, $y);
        $pdf->SetTextColor($r,$g,$b);
        $pdf->Cell(0,10,$texto, 0, 0, $align);

        // $pdf->Text($x, $y, $texto);
    }

    function agregarImagen($pdf, $imagen, $x, $y){
        $pdf->Image($imagen, $x, $y, 0);
    }

    $idCurso=isset($_GET['idCurso'])?$_GET['idCurso']:'';
    $idAlumno=isset($_GET['idAlumno'])?$_GET['idAlumno']:'';

    $sql = "SELECT alumnos.nombre, alumnos.apellido, cursos.nombre_curso FROM alumnos, cursos WHERE alumnos.id = :idAlumno AND cursos.id = :idCurso";
    $consulta=$conexionDB->prepare($sql);
    $consulta->bindParam(':idAlumno', $idAlumno);
    $consulta->bindParam(':idCurso', $idCurso);
    $consulta->execute();
    $alumno=$consulta->fetch(PDO::FETCH_ASSOC);

    $pdf = new FPDF('L', 'mm', array(334, 190));
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    agregarImagen($pdf, "../src/certificado.jpg", 0 , 0);
    agregarTexto($pdf, ucwords(utf8_decode($alumno['nombre']." ".$alumno['apellido'])), 155, 76, "L", "Helvetica", 30, 0, 84, 115);
    agregarTexto($pdf, $alumno['nombre_curso'], 98, 109, "C", "Helvetica", 18, 0, 84, 115);
    agregarTexto($pdf, date("d/m/Y"), 90, 139, "C", "Helvetica", 11, 0, 84, 115);
    $pdf->Output();

?>