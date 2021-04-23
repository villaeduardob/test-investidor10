<header>
	<div class="content">

		<a class="logo" href="{{ route('news.index') }}">
			<img src="assets/images/logo.svg">
		</a>

		<div class="items">
			<ul>
				<li>
					<a href="{{ route('news.create') }}">CADASTRAR NOTÍCIAS</a>
				</li>
				<li>
					<a href="{{ route('news.show') }}">EXIBIR NOTÍCIAS</a>
				</li>
			</ul>

			<form action="{{ route('news.show') }}" method="get" role="form">
				<input name="s" id="s" autocomplete="off">
				<button type="submit">Buscar</button>
			</form>
		</div>

	</div>
</header>