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

				<div class="list-article">
					<h4 style="float:left !important;padding:6px 0 !important;">{{ $article->title }}</h4>

					<a href="{{ route('news.delete', $article->id) }}" class="btn" style="float:right !important;padding:6px !important;width:10% !important;">Excluir</a>
					<a href="{{ route('news.edit', $article->id) }}" class="btn" style="float:right !important;padding:6px !important;margin:0 12px 0 !important;width:10% !important;">Editar</a>
				</div>

			@endforeach
			
		@else

			<p>Nenhuma notícia cadastrada até o momento</p>
			
		@endif

	</div>

	@include('layout.footer')
</body>
</html>
