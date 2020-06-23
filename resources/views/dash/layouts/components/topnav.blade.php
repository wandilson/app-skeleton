<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<!-- Navbar links -->
			<ul class="navbar-nav align-items-center  ml-md-auto ">
				<li class="nav-item d-xl-none">
					<!-- Sidenav toggler -->
					<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
						<div class="sidenav-toggler-inner">
						<i class="sidenav-toggler-line"></i>
						<i class="sidenav-toggler-line"></i>
						<i class="sidenav-toggler-line"></i>
						</div>
					</div>
				</li>
				<li class="nav-item d-sm-none">
					<a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
						<i class="ni ni-zoom-split-in"></i>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
				<li class="nav-item dropdown">
					<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="media align-items-center">
						<span class="avatar avatar-sm rounded-circle">
							@if (Auth::user()->image)
								<img src= "{{ asset('storage/users/'.Auth::user()->image) }}" alt="{{Auth::user()->name}}">
							@endif
						</span>
						<div class="media-body  ml-2  d-none d-lg-block">
							<span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
						</div>
						</div>
					</a>
					<div class="dropdown-menu  dropdown-menu-right ">
						<div class="dropdown-header noti-title">
							<h6 class="text-overflow m-0">Olá!</h6>
						</div>
						<a href="{{ route('profile') }}" class="dropdown-item">
							<i class="ni ni-single-02"></i>
							<span>Meu Perfil</span>
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="ni ni-user-run"></i>
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
			</ul>

		</div>
	</div>
</nav>