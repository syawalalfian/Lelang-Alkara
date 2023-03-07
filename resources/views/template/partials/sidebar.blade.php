<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Lelang Alkara</div>
      </a>
      
      
      <li class="nav-item">
        @if(auth()->user()->level == 'admin')
        <a class="nav-link" href="{{route('dashboard.admin')}}">
          @elseif(auth()->user()->level == 'petugas')
          <a class="nav-link" href="{{route('dashboard.petugas')}}">
          @else(auth()->user()->level == 'masyarakat')
            <a class="nav-link" href="{{route('dashboard.masyarakat')}}">
          @endif
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      
      @if(auth()->user()->level == 'admin')
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Data Pengguna
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-users"></i>
          <span>Data Users</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

          <a class="nav-link" href="{{route('dataadmin.index')}}">
         <i class="fas fa-user-edit"></i>
          <span>Data Admin</span></a>

          <a class="nav-link" href="{{route('petugas.index')}}">
         <i class="fas fa-user-cog"></i>
          <span>Data Petugas</span></a>

          <a class="nav-link" href="{{route('datamasyarakat.index')}}">
         <i class="fas fa-user-tag"></i>
          <span>Data Masyarakat</span></a>
            
          </div>
        </div>
      </li>
      @endif

      @if(auth()->user()->level == 'admin') 
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Data Barang
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{route('barang.index')}}">
         <i class="fas fa-fw fa-box"></i>
          <span>Data Barang</span></a>
      </li>
      @elseif(auth()->user()->level == 'petugas')
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Data Barang
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{route('barang.index')}}">
         <i class="fas fa-fw fa-box"></i>
          <span>Data Barang</span></a>
      </li>
      @endif

      @if(auth()->user()->level == 'petugas')
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
              Data Lelang
            </div>
            <li class="nav-item">
              <a class="nav-link" href="{{route('lelang.index')}}">
              <i class="fas fa-fw fa-file"></i>
                <span>Data Lelang</span></a>
            </li>
            @endif

      @if(auth()->user()->level == 'admin')
      <hr class="sidebar-divider">
            <div class="sidebar-heading">
              Data Laporan
            </div>
            <li class="nav-item">
              <a class="nav-link" href="index.html">
              <i class="fas fa-fw fa-file"></i>
                <span>Laporan</span></a>
            </li>
       @elseif(auth()->user()->level == 'petugas')
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
              Data Laporan
            </div>
            <li class="nav-item">
              <a class="nav-link" href="index.html">
              <i class="fas fa-fw fa-file"></i>
                <span>Laporan</span></a>
            </li>
      @endif

@if(auth()->user()->level == 'masyarakat')
      <hr class="sidebar-divider">
            <div class="sidebar-heading">
              Data Lelang
            </div>
            <li class="nav-item">
              <a class="nav-link" href="{{route('datapenawaran.index')}}">
              <i class="fas fa-fw fa-file"></i>
                <span>Data Penawaran Anda</span></a>
            </li>
            @endif

      

      
      
    </ul>