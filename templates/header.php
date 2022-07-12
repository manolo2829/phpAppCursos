<?php

  session_start();
  if(!isset($_SESSION['usuario'])){
    header('location: ../index.php');
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    

  </head>
  <body>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="index.php">Home</a>
            <a class="nav-item nav-link" href="vista_alumnos.php">Alumnos</a>
            <a class="nav-item nav-link" href="vista_cursos.php">Cursos</a>
            <a class="nav-item nav-link" href="cerrar.php">Cerrar sesion</a>

        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12">
              <br>
              <div class="row">