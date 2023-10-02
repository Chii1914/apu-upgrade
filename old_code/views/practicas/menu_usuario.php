<!--<nav class="navbar sticky-top navbar-dark navbar-expand-lg primary-color-dark  border-bottom "  >-->

<nav class="navbar navbar-expand-lg navbar-dark primary-color-dark apu-navbar">
  <div class="container">
    <a class="navbar-brand p-0" href="http://administracionpublica-uv.cl/beta/app/index.php">
      <img src="https://administracionpublica-uv.cl/beta/images/logo_ba2.png" width="180em" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarNavDropdown">
      <ul class="navbar-nav mr-auto smooth-scroll ">
        <li class="nav-item  ">
          <a class="nav-link" href="<?php echo base_url('practicas/principal') ?>">Inicio </a>
        </li>

      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="badge badge-pill light-blue"> <i class="fas fa-user"> </i></span>
            <?= " " . $this->session->userdata('run'); ?> </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
            <a class="dropdown-item" href="<?php echo base_url('practicas/perfil/editar') ?>"><i class="far fa-edit"></i> Modificar Info. Personal</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url('practicas/cerrar_sesion') ?>"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
          </div>
        </li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->

      </ul>
    </div>
    
  </div>
</nav>