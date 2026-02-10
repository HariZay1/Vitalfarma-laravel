<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <div class="sb-sidenav-menu-heading">Inicio</div>
                <a class="nav-link" href="{{ route('panel.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Panel
                </a>

                <div class="sb-sidenav-menu-heading">Productos</div>
                  <!-- Productos-->
                <a class="nav-link" href="/listaProducto">
                    <div class="sb-nav-link-icon"><i class="fa-brands fa-shopify"></i></div>
                    Productos
                </a>
                  <!-- Clientes-->
                <a class="nav-link" href="/listaCliente">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    Clientes
                </a>
                  <!-- Categorías-->
                <a class="nav-link" href="/tipoCategoria">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-tag"></i></div>
                    Categorías
                </a>
                  <!-- Presentaciones-->
                <a class="nav-link" href="/tipoPresentacion">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-box-archive"></i></div>
                    Presentaciones
                </a>
                <a class="nav-link" href="/tipoLaboratorio">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-box-archive"></i></div>
                    Laboratorio
                </a>
                  <!-- Proveedores-->              
                <a class="nav-link" href="/listaProveedor">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
                    Proveedores
                </a>
                  <!-- Ventas-->
                <a class="nav-link" href="/ventaProductos" >
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                    Ventas
                </a>
         
            </div>
        </div>
        <div class="small">Bienvenido:</div>
        @if(auth()->check())
            {{ auth()->user()->name }}
        @else
            Invitado
        @endif

    </nav>
</div>