<div class="main-sidebar">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="{{ route('home') }}">{{ config('app.name') }}</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="{{ route('home') }}">MAU</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li class="nav-item dropdown{{ request()->routeIs('home') ? ' active' : '' }}">
				<a href="{{ route('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
			</li>
			<li class="menu-header">Manajemen</li>
			<li class="nav-item dropdown{{ request()->routeIs('barang.index') ? ' active' : '' }}">
				<a href="{{ route('barang.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Data
						Barang</span></a>
			</li>
			<li class="nav-item dropdown{{ request()->routeIs('bantuan-dana-operasional.index') ? ' active' : '' }}">
				<a class="nav-link" href="{{ route('bantuan-dana-operasional.index') }}"><i class="far fa-square"></i>
					<span>Data Sumber</span></a>
			</li>
			<li class="nav-item dropdown{{ request()->routeIs('ruangan.index') ? ' active' : '' }}">
				<a href="{{ route('ruangan.index') }}" class="nav-link"><i class="fas fa-th"></i> <span>Data
						Ruangan</span></a>
			</li>
			<li class="nav-item dropdown{{ request()->routeIs('pengguna.index') ? ' active' : '' }}">
				<a href="{{ route('pengguna.index') }}" class="nav-link"><i class="fas fa-users"></i> <span>Data
						Pengguna</span></a>
			</li>
			<li class="menu-header">Pengaturan</li>
			<li class="nav-item dropdown{{ request()->routeIs('profile.index') ? ' active' : '' }}">
				<a href="{{ route('profile.index') }}" class="nav-link"><i class="fas fa-cog"></i> <span>Pengaturan
						Profil</span></a>
			</li>
		</ul>

		<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
			<form id="logout-form" action="{{ route('logout') }}" method="POST">
				<button type="submit" class="btn btn-danger btn-lg btn-block btn-icon-split logout">
					<i class="fas fa-fw fa-sign-out-alt"></i>
					Logout
				</button>
				@csrf
			</form>
		</div>
	</aside>
</div>
