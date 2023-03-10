<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?php echo $__env->yieldContent('isActive'); ?>" aria-current="page" href="<?php echo e(route('mahasiswa.index')); ?>">Data Mahasiswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $__env->yieldContent('isActive'); ?>" aria-current="page" href="<?php echo e(route('mahasiswa.create')); ?>">Buat Mahasiswa</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Lainnya
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Edit Data</a></li>
              <li><a class="dropdown-item" href="#">Delete Data</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php /**PATH /home/sendal/laravel01/resources/views/navbar.blade.php ENDPATH**/ ?>