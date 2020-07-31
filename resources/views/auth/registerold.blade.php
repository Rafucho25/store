<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-5">
                <div class="card text-center" >
                    <div class="card-body">
                      <h5 class="card-title">Registrarse</h5>
                      <form action="register" method="post">   
                        @csrf
                        <div class="form-group">
                            <input type="text" placeholder="Nombres" class="form-control" name="first_name" id="first_name">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Apellidos" class="form-control" name="last_name" id="last_name">
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Correo Electronico" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Contraseña" class="form-control" name="password" id="password">
                        </div>
                        <input type="submit" value="Entrar" class="btn btn-primary">
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        @yield('footer')
    </footer>
</body>
</html>