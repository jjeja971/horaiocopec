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
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />
    <link rel="stylesheet" href="adminlte/css/adminlte.min.css">
    
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="fondologo">

<div class="content-header">
    <div class="container-fluid" >
        <form action="/registrarse" method="POST">
        @csrf
            <div class="row">
            
                <div class="col-lg-4 col-sm-2"></div>
                <div class="mt-5 col-lg-4 col-sm-8" style="text-align: center">
                    <a href="/Inicio"><img src="{{ URL::asset('/img/Copec_Logo.svg')}}" alt="Copec Logo"
                    style="opacity: .9; width:100%; padding-left:6em; padding-right:6em"></a>
                </div>
                <div class="col-lg-4 col-sm-2"></div>

                <div class="col-lg-4 col-sm-1"></div>
                <div class="col-lg-4 col-sm-10"  style="text-align: center">
                    <div class="mt-5 pb-4 card card-primary card-outline elevation-4">
                        <div class="imagencielologo"></div>
                        <div class="card-body">
                            <h2 class="mt-1" style="color: rgb(102, 102, 252); font-weight: bold">
                                ACCESO DE USUARIO
                            </h2>
                            <div class="form-group ml-5 mr-5">
                                <h4 class="mt-5" style="color: rgb(126, 126, 255);">Nombre de usuario</h4>
                                <input style="text-align: center" name="usuario" class="mb-4 mt-3 form-control" placeholder="Ingrese nombre usuario" onkeypress='return validaletraynumero(event)' required>
                                
                            </div>
                            <div class="mb-5 ml-5 mr-5 form-group">
                                <h4 style="color: rgb(126, 126, 255);">Contraseña</h4>
                                <input style="text-align: center" name="contrasena" type="password" class="form-control mt-3" placeholder="Ingrese contraseña" onkeypress='return validaletraynumero(event)' required>
                            </div>
                            <div class="mb-2 ml-5 mr-5 form-group">
                                <button type="submit" class="mt-4 btn btn-primary btn-lg btn-block">Iniciar sesion</button>
                            </div>
                            <div class="mb-3 ml-5 mr-5 form-group">
                                @if(session('status'))
                                    <div>
                                        <div class="alert" id="mensaje_error" style="font-size:1.1em ;background: #ffffff00; color:#ff0505">
                                            {{session('status')}}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>
                <div class="col-lg-4 col-sm-1"></div>

        

                
               
            </div>
        </form>
    </div>
   
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