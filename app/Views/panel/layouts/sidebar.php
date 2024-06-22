<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/2048px-User_icon_2.svg.png" alt="profile">
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
      <a class="nav-link" href="/Panel/">
        <span class="menu-title">Kegiatan</span>
        <i class="mdi mdi-pound menu-icon"></i>
      </a>
    </li>
  </ul>
</nav>