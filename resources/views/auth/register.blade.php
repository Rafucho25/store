<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{asset('images/logo.png')}}" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="register" method="post">
                                @csrf
                                <div class="form-group">
                                    <center><img id="imgUser" src="{{isset($user->photo) ? $user->photo : asset('/images/users/template.png')}}" width="200px" height="200px" alt="your image" /></center><br>
                                    <input type="file" name="photo" id="photo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input class="au-input au-input--full" type="text" name="first_name" placeholder="Nombres">
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input class="au-input au-input--full" type="text" name="last_name" placeholder="Apellidos">
                                </div>
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input class="au-input au-input--full" type="text" name="address" placeholder="Direccion">
                                </div>
                                <div class="form-group">
                                    <label>Correo Electronico</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Correo Electronico">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Contraseña">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Registrarse</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Tiene cuenta?
                                    <a href="login">Iniciar Sesion</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgUser').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#photo").change(function(){
        readURL(this);
    });
    </script>

</body>

</html>
<!-- end document-->