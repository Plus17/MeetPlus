<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


	<link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
	<header>
		<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
						<span class="sr-only">Desplegar / Ocultar Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>
				</div>
				<!-- Inicia Menu -->
				<div class="collapse navbar-collapse" id="navegacion-fm">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Inicio</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
								Categorias <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								@if (isset($categories))
									@foreach ($categories as $category)
										<li><a href="#">{{ $category->name }}</a></li>

									@endforeach
								@endif
							</ul>
						</li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contacto</a></li>
					</ul>

                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
				</div>
			</div>
		</nav>
	</header>

	<section class="jumbotron">
		<div class="container">
			<h1>{{ config('app.name') }}</h1>
			<p>Eventos para Geeks - Encuentra eventos <strong id="typist-element" data-typist="en tu ciudad">cerca de ti</strong></p>
		</div>
	</section>

	<section class="main container">
		<div class="row">
			<section class="posts col-md-9">
				<div class="miga-de-pan">
					<ol class="breadcrumb">
						<li><a href="#">Inicio</a></li>
						<li><a href="#">Categorias</a></li>
						<li class="active">Diseño Web</li>
					</ol>
				</div>

				@yield('content')

				<nav>
					<div class="center-block">
						{{ $events->links() }}
					</div>
				</nav>
			</section>

			<aside class="col-md-3 hidden-xs hidden-sm">
				<h4>Categorias</h4>
				<div class="list-group">
					<a href="#" class="list-group-item active">Categorias</a>
					@if (isset($categories))
						@foreach ($categories as $category)
							<a href="#" class="list-group-item">{{ $category->name }}</a>
						@endforeach
					@endif
				</div>

				<h4>Eventos Recientes</h4>
				@if (isset($recentArticles))
					@foreach ($recentArticles as $article)
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">{{ $article->name }}</h4>
							<p class="list-group-item-text">{{ $article->description }}</p>
						</a>
					@endforeach
				@else

					<a href="#" class="list-group-item">
						<h4 class="list-group-item-heading">Sin eventos recientes</h4>
					</a>
				@endif
			</aside>
		</div>
	</section>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<p></p>
				</div>
				<div class="col-xs-6">
					<ul class="list-inline text-right">
						<li><a href="#">Inicio</a></li>
						<li><a href="#">Contacto</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


</body>
</html>
