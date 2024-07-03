<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/2048px-User_icon_2.svg.png"
            alt="profile">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2"><?= session()->get('username'); ?></span>
          <span class="text-secondary text-small"><?= session()->get('type'); ?></span>
        </div>
        <i class="mdi mdi-circle text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a href="/Panel" class="nav-link">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/Panel/Kegiatan">
        <span class="menu-title">Kegiatan</span>
        <i class="mdi mdi-pound menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
        aria-controls="general-pages">
        <span class="menu-title">Edit Informasi</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-medical-bag menu-icon"></i>
      </a>
      <div class="collapse" id="general-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#"> Tentang </a></li>
          <li class="nav-item"> <a class="nav-link" href="#"> Sejarah </a></li>
          <li class="nav-item"> <a class="nav-link" href="#"> Struktural </a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>