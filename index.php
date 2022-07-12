

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
    
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4">
                <br>
                <form action="sections/index.php" method="post">
                    <div class="card">
                        <div class="card-header">
                            Incio de sesion
                        </div>
                        <div class="card-body">
                            <br>
                            <div class="mb-3">
                                <label for="" class="form-label">Usuario</label>
                                <input type="text"
                                    class="form-control" 
                                    name="usuario" 
                                    id="usuario" 
                                    aria-describedby="helpId" 
                                    placeholder="usuario">
                                <small id="helpId" class="form-text text-muted">Escriba su usuario</small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password"
                                    class="form-control" 
                                    name="contraseña" 
                                    id="contraseña" 
                                    aria-describedby="helpId" 
                                    placeholder="usuario">
                                <small id="helpId" class="form-text text-muted">Escriba su contraseña</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                        </div>
                        <div class="card-footer text-muted">
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>