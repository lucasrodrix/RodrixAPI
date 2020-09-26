<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;

//Rotas para Produtos
$app->group('/api/v1', function(){

	//Listar
	$this->get('/produtos/lista', function($request, $response){
		$produtos = Produto::get();
		return $response->withJson($produtos);
	});

	//Adicionar
	$this->post('/produtos/adiciona', function($request, $response){
		$dados = $request->getParsedBody();
		$produtos = Produto::create($dados);
		return $response->withJson($produtos);
	});
});