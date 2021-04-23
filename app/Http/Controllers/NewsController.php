<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\News;

use Redirect;

class NewsController extends Controller
{
	
	public function index()
	{
		// list
		$list = News::whereNotNull('is_active');

		return view('news.index', [
			'list'	=> $list
		]);
	}


	public function create()
	{
		return view('news.action', [
			'action'	=> 'add',
		]);
	}


	public function store(Request $request)
	{		
		$validator = validator($request->all(), [
			'title'		=> 'required',
			'text'		=> 'required',
			'author'	=> 'required'
		]);

		if ($validator->fails()) {

			$code = 409;
			$response = [
				'message_action'	=> 'danger',
				'message'			=> 'Preencha todos os campos obrigatórios!'
			];
			
		}
		
		$check = News::where('title', $request->title);
		if ($check->exists()) {

			$code = 409;
			$response = [
				'message_action'	=> 'danger',
				'message'			=> 'Título já cadastrado!'
			];

		} else {

			$insert = new News;
			// param
			$insert->title		= $request->title;
			$insert->slug		= \Str::slug($request->title, '-');
			$insert->category	= $request->category;
			$insert->text		= $request->text;
			$insert->author		= $request->author;
			$insert->is_active	= ($request->is_active == 1) ? 1 : NULL;
			if ($insert->save()) {

				$code = 201;
				$response = [
					'message_action'	=> 'success',
					'message'			=> 'Notícia cadastrada com sucesso!',
					'redirect'			=> route('news.index'),
				];

			} else {

				$code = 409;
				$response = [
					'message_action'	=> 'danger',
					'message'			=> 'Não foi possível cadastrar a notícia!'
				];

			}

		}

		return response()->json($response, $code);
	}


	public function edit($id)
	{
		// news selected
		$selected = News::where('id', $id);
		if ($selected->exists()) {

			$newsSelected = $selected->first();

			return view('news.action', [
				'action'        => 'edit',
				'newsSelected'  => $newsSelected
			]);

		} else { return redirect()->route('news.index'); }
	}


	public function show(Request $request)
	{
		// list
		$list = News::whereRaw('1 = 1');

		if ($request->s) {

			$list->where('title', 'like', '\'%' . $request->s . '%\'');

		}

		return view('news.list', [
			'list'	=> $list
		]);
	}


	public function update(Request $request)
	{		
		$validator = validator($request->all(), [
			'title'		=> 'required',
			'text'		=> 'required',
			'author'	=> 'required'
		]);

		if ($validator->fails()) {

			$code = 409;
			$response = [
				'message_action'	=> 'danger',
				'message'			=> 'Preencha todos os campos obrigatórios!'
			];
			
		}

		$update = News::find($request->id);
		// params
		$update->title		= $request->title;
		$update->slug		= \Str::slug($request->title, '-');
		$update->category	= $request->category;
		$update->text		= $request->text;
		$update->author		= $request->author;
		$update->is_active	= ($request->is_active == 1) ? 1 : NULL;
		if ($update->update()) {

			$code = 201;
			$response = [
				'message_action'	=> 'success',
				'message'			=> 'Notícia alterada com sucesso!',
				'redirect'			=> route('news.index'),
			];

		} else {

			$code = 409;
			$response = [
				'message_action'	=> 'danger',
				'message'			=> 'Não foi possível alterar a notícia!'
			];

		}

		return response()->json($response, $code);
	}


	public function delete($id)
	{
		$check = News::find($id);
		if ($check->exists()) {

			$check->delete();

		}

		return Redirect::to(route('news.index'))
						 ->header('Cache-Control', 'no-store, no-cache, must-revalidate');
		
	}
}