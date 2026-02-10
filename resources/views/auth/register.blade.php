<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="{{asset('assets/estilos.css')}}">
    </head>

    <body>
        <section class="vh-100">
            <div class="container-fluid h-custom">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div style="text-align: center;">
                  <img src="assets/img/doc2.png" style="width: 300px; height: auto;" 
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                  <form action="{{ route('register.store') }}" method="POST">
                    @csrf

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">REGISTRATE</p>
                    </div>

                    <!-- Nombre input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="name" id="formName" class="form-control form-control-lg" placeholder="Ingresar nombre" required />
                        <label class="form-label" for="formName">Nombre</label>
                    </div>

                    <!-- Correo input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="formEmail" class="form-control form-control-lg" placeholder="Ingresar correo" required />
                        <label class="form-label" for="formEmail">Correo</label>
                    </div>

                    <!-- Contraseña input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="password" id="formPassword" class="form-control form-control-lg" placeholder="Ingresa contraseña" required />
                        <label class="form-label" for="formPassword">Contraseña</label>
                    </div>

                    <!-- Confirmar Contraseña input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="password_confirmation" id="formConfirmPassword" class="form-control form-control-lg" placeholder="Confirmar contraseña" required />
                        <label class="form-label" for="formConfirmPassword">Confirmar Contraseña</label>
                    </div>

          
                    <div class="text-center text-lg-start mt-4 pt-2">
                      <button type="submit" class="btn btn-primary btn-lg" 
                      style="padding-left: 2.5rem; padding-right: 2.5rem;">Registrarse</button>

                    
                      <a href="{{route('login') }}" role="button" class="btn btn-primary btn-lg " style="
                          padding-left: 4rem; padding-right: 4rem;">Volver</a>
                      </div>
          
                  </form>
                </div>
              </div>
            </div>
        
          </section>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
