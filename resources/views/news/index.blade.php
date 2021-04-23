<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<base href="{{ asset('/') }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teste Investidor10</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

	@include('layout.header')

	<div class="content list mt45">

		@if ($list->exists())

			@foreach ($list->get() as $article)

				<article>
					<h4>{{ $article->title }}</h4>
					<small>{{ $article->category }}</small>
					
					<p>{{ $article->text }}</p>

					<a class="btn">Acessar</a>
				</article>

			@endforeach
			
		@else

			<p>Nenhuma notícia cadastrada até o momento</p>
			
		@endif

	</div>

	@include('layout.footer')
</body>
</html>
