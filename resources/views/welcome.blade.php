<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="Sistema de ventas para gestionar compras, ventas
clientes, proveedores, productos, categorías, etc. Ideal para pequeños y medianos negocios que deesen 
automatizar sus procesos y tener a la mano cualquier información sobre su negocio" />
<meta name="author" content="VitalFarma" />
<title>FarmaZay</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>


<nav class="navbar navbar-expand-md bg-body-secondary">
    <div class="container-fluid">
       
        <a class="navbar-brand" href="">
            <img src="{{ asset('assets/img/doc2.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            VitalFarma
        </a>
     

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  
                    <a class="nav-link active" aria-current="page" href="">Inicio</a>
                 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#acerca-de">Acerca de</a>
                </li>
            </ul>
           
            <form class="d-flex" action="{{route('login')}}" method="get">
                <button class="btn btn-primary" type="submit">Iniciar sesión</button>
            </form>
            

        </div>
    </div>
</nav>

<div id="carouselExample" class="carousel slide carousel-fade">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('assets/img/farma1.jpg')}}" class="d-block w-100" alt="banner de invitacion">
        </div>
        <div class="carousel-item">
            <img src="{{asset('assets/img/med.png')}}" class="d-block w-100" alt="Banner de publicidad">
        </div>
        <div class="carousel-item">
            <img src="{{asset('assets/img/farma3.jpg')}}" class="d-block w-100" alt="Banner de contáctanos">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container-md">
    <div class="row my-4 g-5">
        <div class="col-lg-6">
            <div class="card border-0">
                <div class="card-header text-center text-info border-info fs-5 fw-semibold border-3 rounded-start rounded-end">
                    Bienvenidos a VitalFarma
                </div>
                <div id="acerca-de" class="card-body">
                    <ul class="text-light">
                        
                        <li>
                            <p class="card-text mb-2">En VitalFarma, nos enorgullece ofrecer productos farmacéuticos
                                    de alta calidad para el cuidado de tu salud y bienestar. Nuestra misión es 
                                    proporcionar un servicio personalizado y accesible, garantizando que nuestros 
                                    clientes reciban la mejor atención posible.</p>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0">
                <div class="card-header text-center text-info border-info fs-5 fw-semibold border-3 rounded-start rounded-end">
                    Nuestra Filosofía
                </div>
                <div class="card-body">
                    <ul class="text-light">
                        <li>
                            <p class="card-text mb-2">Creemos en la importancia de un enfoque integral para tu salud
                                , combinando la medicina tradicional con alternativas naturales, siempre bajo el 
                                consejo de profesionales capacitados. Nos comprometemos a ofrecerle productos 
                                innovadores y efectivos, además de un ambiente cálido y confiable.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

<!---Section Frase--->
<section class="container-fluid bg-body-secondary text-center">
    <div class="container p-5">
        <h2 class="text-light mb-5">¿Por qué elegirnos?<span class="text-info"> ¡Nosotros tenemos un compromiso con la Calidad para tu salud!. </span></h2>
        <div class="">
        
            <a href="{{route('login') }}" role="button" class="btn btn-primary">Iniciar Ahora</a>
            
        </div>
    </div>

</section>

<footer class="text-center text-white">
    
    <div class="container p-4 pb-0">
        <section class="mb-4">

        </section>
    
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2024:
        
    </div>
    
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>