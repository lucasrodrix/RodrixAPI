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

	//Listar produto com base em um ID
	$this->get('/produtos/lista/{id}', function($request, $response, $args){
		$produto = Produto::findOrFail($args['id']);
		return $response->withJson($produto);
	});	

	//Atualiza produto com base em um ID
	$this->put('/produtos/atualiza/{id}', function($request, $response, $args){
		$dados = $request->getParsedBody();
		$produto = Produto::findOrFail($args['id']);
		$produto->update($dados);
		return $response->withJson($produto);
	});	
});