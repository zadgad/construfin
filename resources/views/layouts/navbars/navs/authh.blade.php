<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <div class="header-search">

                
                </div>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">
               
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(!empty(session()->get('image')->first()))
                        <img {{$ima=session()->get('image')}} src="{{Storage::url($ima[0])}}" class="rounded-circle img-30 align-top mr-15" width="30"/>
                        @else
                        <img src="{{Storage::url('image.gif')}}" class="rounded-circle img-30 align-top mr-15" width="30"/>

                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a {{$id=session()->get('nombre')->first()}} class="dropdown-item" href="{{route('infoRut',$id)}}"><i class="ik ik-user dropdown-icon"></i>{{session()->get('nombre')->first()}}</a>
                        <a class="dropdown-item" href="{{route('logout')}}"><i class="ik ik-power dropdown-icon"></i> Cerrar</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
