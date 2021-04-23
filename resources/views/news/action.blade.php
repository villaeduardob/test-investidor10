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

		@if($action == 'edit')
			<form action="{{ route('news.update') }}" class="action" id="formNews" method="post" role="form">
		@else
			<form action="{{ route('news.store') }}" class="action" id="formNews" method="post" role="form">
		@endif

			@csrf
			<input type="hidden" name="action" value="{{ $action }}">
			
			@if ($action == 'edit')
				<input type="hidden" name="_method" value="put">
				<input type="hidden" name="id" value="{{ $newsSelected->id }}">
			@endif

				<div class="line">
					<div id="messageAlert" hidden></div>
				</div>

				<div class="line">
					<label for="title">Título <small style="color:#900;">*</small></label>
					<input name="title" id="title" required value="{{ (($action == 'edit') ? $newsSelected->title : NULL) }}" autocomplete="off">
				</div>

				<div class="line">
					<label for="category">Categoria <small style="color:#900;">*</small></label>
					<input name="category" id="category" required value="{{ (($action == 'edit') ? $newsSelected->category : NULL) }}" autocomplete="off">
				</div>

				<div class="line">
					<label for="text">Texto <small style="color:#900;">*</small></label>
					<textarea name="text" id="text" rows="5" required>{{ (($action == 'edit') ? $newsSelected->text : NULL) }}</textarea>
				</div>

				<div class="line" style="width:50%;">
					<label for="author">Autor <small style="color:#900;">*</small></label>
					<input name="author" id="author" required value="{{ (($action == 'edit') ? $newsSelected->author : NULL) }}" autocomplete="off">
				</div>

				<div class="line" style="width:50%;">
					<label for="is_active">Status <small style="color:#900;">*</small></label>
					<select name="is_active" id="is_active" required>
						<option value="1" {{ (($action == 'edit' && $newsSelected->is_active == 1) ? 'selected' : NULL) }}>Sim</option>
						<option value="0" {{ (($action == 'edit' && $newsSelected->is_active == NULL) ? 'selected' : NULL) }}>Não</option>
					</select>
				</div>

				<div class="line-button">
					<button class="btn btn-action" type="submit" id="buttonForm">Salvar</button>
				</div>

			</form>

	</div>

	@include('layout.footer')

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/custom.js"></script>

</body>
</html>
