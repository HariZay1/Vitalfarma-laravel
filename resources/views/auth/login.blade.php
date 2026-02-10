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
      @if(session('success'))
      <div class="alert alert-success" id="success-alert">
          {{ session('success') }}
      </div>
      <script>
          setTimeout(function() {
              document.getElementById('success-alert').style.display = 'none';
          }, 3000);  // Desaparece después de 3 segundos
      </script>
       @endif
  

        <section class="vh-100">
            <div class="container-fluid h-custom">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                  <img src="assets/img/medicine.png"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                  <form action="{{route('login')}}" method="POST">
                    @csrf
          
                    <div class="divider d-flex align-items-center my-4">
                      <p class="text-center fw-bold mx-3 mb-0">Bienvenido a VitalFarma</p>
                    </div>
          
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="email"  name="email" 
                      value="{{ old('username') }}"  class="form-control form-control-lg"
                        placeholder="Ingresa tu correo" required="required" autofocus>
                      <label class="form-label" for="floatingName">Correo</label>
                      @error('username')
                      <span class="text-danger text-left">{{ $message }}</span>
                      @enderror
                    </div>
          
                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-3">
                      <input type="password" name="password" class="form-control form-control-lg" 
                      name="password" value="{{ old('password') }}"
                        placeholder="Ingresa tu contraseña" required="required">
                      <label class="form-label" for="floatingPassword">Contraseña</label>
                      @error('password')
                      <span class="text-danger text-left">{{ $message }}</span>
                      @enderror
                    </div>
        
                    <div class="text-center text-lg-start mt-4 pt-2">
                      <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Iniciar sesion</button>
                      <p class="small fw-bold mt-2 pt-1 mb-0">No tienes unas cuenta? <a href="{{route('register')}}"
                          class="btn btn-outline-danger">Registrarse</a></p>
                    </div>
          
                  </form>
                </div>
              </div>
            </div>
            <div
              class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
              <!-- Copyright -->
             
              
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
