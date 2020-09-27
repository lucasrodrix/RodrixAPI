<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;
use App\Models\Usuario;
use \Firebase\JWT\JWT;


//Rotas para Geração de Token
$app->post('/api/token', function($request, $response){
		$dados = $request->getParsedBody();
		$email = $dados['email'] ?? null;
		$senha = $dados['senha'] ?? null;

		$usuario = Usuario::where('email', $email)->first();
		if(!is_null($usuario) && (md5($senha) === $usuario->senha)){
			//Gerar Token
			$secretkey = $this->get('settings')['secretKey'];
			$token = JWT::encode($usuario, $secretkey);
			
			return $response->withJson(['token' => $token]);
		}	
		
		return $response->withJson(['status' => 'erro']);
});


