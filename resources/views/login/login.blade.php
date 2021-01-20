<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="adminlte/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body style="background: #b6c9f818">

<div class="content-header">
    <div class="container-fluid" >
        <form action="/registrarse" method="POST">
        @csrf
            <div class="row">
            
                <div class="col-lg-4"></div>
                <div class="mt-5 col-lg-4"  style="text-align: center">
                    <a href="/Inicio"><img src="adminlte/img/Copec_Logo.svg" alt="Copec Logo"
                    style="opacity: .9; width:100%; padding-left:6em; padding-right:6em"></a>
                </div>
                <div class="col-lg-4"></div>

                <div class="col-lg-4"></div>
                <div class="col-lg-4"  style="text-align: center">
                    <div class="mt-5 card card-primary card-outline">
                        <div class="card-body">
                            <h2 class="mt-4 card-text">
                                Registro de usuario.
                            </h2>
                            <div class="form-group">
                                <label class="mt-5">Nombre de usuario</label>
                                <input name="usuario" class="mb-4 form-control" placeholder="Ingrese nombre usuario" required>
                                
                            </div>
                            <div class="mb-5 form-group">
                                <label>Contraseña</label>
                                <input name="contrasena" type="password" class="form-control" placeholder="Contraseña" required>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>
                <div class="col-lg-4"></div>

                <div class="col-lg-4"></div>
                <div class="col-lg-4"  style="text-align: center">
                    <button type="submit" class="mt-4 btn btn-primary btn-lg btn-block">Iniciar sesion</button>
                </div>
                <div class="col-lg-4"></div>

                
                <div class="col-lg-4"></div>
                <div class="col-lg-4 mt-4" style="text-align: center">
                    @if(session('status'))
                        <div>
                            <div class="alert" id="mensaje_error" style="background: #ff4141; color:#ffffff">
                                {{session('status')}}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-4"></div>
            </div>
        </form>
    </div>
   

    <footer class="main-footer" style="bottom:1em; position: absolute; width:98%; height: 40px; margin:0">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Página Web desarrollada por...
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2020 <a href="https://ww2.copec.cl/#/">Copec</a>.</strong> Todos los derechos reservados.
      </footer>
</div>
<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

<!--<script>
    window.onload = function() {}
    }
</script>-->

</html>