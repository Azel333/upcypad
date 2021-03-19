
       <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary col-10 offset-1 rounded">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="/presentation.html">Beranda</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href=""><span>Data Transaksi</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href=""><span>Data Anggota</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href=""><span><i class="fa fa-bell"></i></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href=""><span><i class="fa fa-envelope"></i></span></a>
                </li>
            </ul>

            <form class="form-inline ml-auto">
                <div class="form-group no-border">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-just-icon btn-round">
                  <i class="material-icons">search</i>
                </button>
            </form>
        </div>
    </div>
</nav>
      <!-- End Navbar -->


  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Rubah Warna Sidebar</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <div class="text-center mb-4">
          <form action="<?php echo base_url('admin/logout'); ?>">
            <button type="submit" class="btn btn-primary btn-round">Logout</button>
          </form>
        </div>
      </ul>
    </div>
  </div>

  