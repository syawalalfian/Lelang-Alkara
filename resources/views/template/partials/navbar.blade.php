

<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            @if(auth()->user()->level == 'masyarakat')
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                {{-- @php
                    $count = 0;
                  @endphp
                   @foreach ($lelangs as $lelang)
                   @if($lelang->pemenang == Auth::user()->name)
                   @php
                      $count++;
                    @endphp
                  @endif
                @endforeach --}}
                @php
                  $count = \App\Models\Lelang::where('pemenang', Auth::user()->name)->count();
                @endphp
                <span class="badge badge-danger badge-counter">{{ $count }}</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Pesan Masuk
                </h6>
                 {{-- @php
                      $lelangs = \App\Models\lelang::take(2)->get();
                    @endphp --}}
                    @foreach (\App\Models\lelang::all() as $lelangs)
                    @if($lelangs->pemenang == Auth::user()->name)
                <div class="dropdown-item d-flex align-items-center" href="#">
                      <div class="mr-3">
                        <div class="icon-circle bg-primary">
                          <i class="fas fa-file-alt text-white"></i>
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <div class="small text-gray-500">{{ $lelangs->created_at->diffForHumans() }}</div>
                        <span class="font-weight-bold">Selamat Anda Memenangkan <a href="{{ route('lelangin.create', $lelangs->barang->id) }}" class="text-primary">{{ $lelangs->barang->nama_barang }}</a></span>
                      </div>
                    </div>

                @endif
                 @endforeach
              </div>
            </li>
            @endif
            
            
           
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">

                @if(auth()->user()->level == 'admin')
                <img class="img-profile rounded-circle" src="{{asset('assets/img/kingmasbro.jpeg')}}" style="max-width: 60px">
                @else
                <img class="img-profile rounded-circle" src="{{asset('assets/img/boy.png')}}" style="max-width: 60px"> 
                @endif

                @if(auth()->user()->level == 'admin')
                <span class="ml-2 d-none d-lg-inline text-white small">{{Str::upper(Auth ::user()->level)}}</span>
                @elseif(auth()->user()->level == 'petugas')
                <span class="ml-2 d-none d-lg-inline text-white small">{{Str::upper(Auth ::user()->level)}}</span>
                @else(auth()->user()->level == 'masyarakat')
                <span class="ml-2 d-none d-lg-inline text-white small">{{Str::upper(Auth ::user()->username)}}</span>
                @endif

              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('profile.user')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>