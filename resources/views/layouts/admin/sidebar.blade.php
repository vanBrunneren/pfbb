<div class="menu-wrapper">
	<div class="container">
		<div class="header-image d-none d-md-block">
			<a href="/">
				<img src="/images/PFBB_Header.png" class="img-fluid" />
			</a>
		</div>
	</div>
	<div class="container-fluid nav-wrapper">
		<div class="container nav-container">
			<nav class="navbar navbar-light navbar-expand-md bg-faded rounded navbar-toggleable-md">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#containerNavbarCenter" aria-controls="containerNavbarCenter" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-md-center" id="containerNavbarCenter">
					<ul class="navbar-nav">
						<li class="nav-item">
					  		<a class="nav-link" href="/">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle">Band</a>
					  		<div class="dropdown-menu">
								<a class="dropdown-item" href="/band/geschichte">Geschichte</a>
								<a class="dropdown-item" href="/band/mitglieder">Mitglieder</a>
								<a class="dropdown-item" href="/band/repertoire">Repertoire</a>
								<a class="dropdown-item" href="/band/kontakt">Kontakt</a>
							</div>
						</li>
						<li class="nav-item dropdown" >
							<a class="nav-link dropdown-toggle">Events</a>
					  		<div class="dropdown-menu">
								<a class="dropdown-item" href="/events">Gigs 2018</a>
								<a class="dropdown-item" href="/events/2017">Gigs 2017</a>
								<a class="dropdown-item" href="/events/2016">Gigs bis 2016</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle">Galerie</a>
					  		<div class="dropdown-menu">
								<a class="dropdown-item" href="/galerie/fotos">Fotos</a>
								<a class="dropdown-item" href="/galerie/videos">Videos</a>
								<a class="dropdown-item" href="/galerie/presse">Presse</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/links">Links</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="/intern">Intern</a>
					  		<div class="dropdown-menu">
								<a class="dropdown-item" href="/admin/index">Home</a>
								<a class="dropdown-item" href="/admin/user/index">Mitglieder</a>
								<a class="dropdown-item" href="/admin/absenzen/index">Absenzen erfassen</a>
								<a class="dropdown-item" href="/admin/absenzen/show">Absenzen anzeigen</a>
								@if(Auth::user()->hasRole('editor') || Auth::user()->hasRole('root'))
									<a class="dropdown-item" href="/admin/band">Band</a>
									<a class="dropdown-item" href="/admin/repertoire/index">Repertoire</a>
									<a class="dropdown-item" href="/admin/gallery/images/albums">Fotos</a>
									<a class="dropdown-item" href="/admin/videos/index">Videos</a>
									<a class="dropdown-item" href="/admin/presse/index">Presse</a>
									<a class="dropdown-item" href="/admin/links/index">Links</a>
								@endif
								@if(Auth::user()->hasRole('calendar_admin') || Auth::user()->hasRole('root'))
									<a class="dropdown-item" href="/admin/events/index">Events</a>
								@endif
								@if(Auth::user()->hasRole('root'))
									<a class="dropdown-item" href="">Admin</a>
								@endif
								<a class="dropdown-item" href="/admin/logout">Logout</a>
							</div>
						</li>
				  	</ul>
				</div>
			</nav>
		</div>
	</div>
</div>


<div class="container breadcrumb-container">

	<h1>@yield('title')</h1>
@php /*


		preg_match("/http:\/\/[a-zA-Z\:0-9]*\/(.*)/", url()->current(), $matches);
		$breadcrumbs = explode("/", $matches[1]);
		$link = '/';
		foreach($breadcrumbs as $key => $breadcrumb) {
			$link .= $breadcrumb . "/";
			echo '<a class="breadcrumb-link" href="'.$link.'">' . ucfirst($breadcrumb) . '</a>';
			if(count($breadcrumbs)-1 != $key) {
				echo " / ";
			}
		}
*/
	@endphp

</div>
