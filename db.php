<?php
if (PHP_SAPI != 'cli') {
	exit('Rodar via CLI');
}

require __DIR__ . '/vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

$db = $container->get('db');

$schema = $db->schema();
$tabela = 'usuarios';

// $schema->dropIfExists($tabela);

// $schema->create($tabela, function($table){
// 	$table->increments('id');
// 	$table->string('titulo', 100);
// 	$table->text('descricao');
// 	$table->text('preco', 11, 2);
// 	$table->string('fabricante', 60);
// 	$table->timestamps();
// });

// // Popular tabela

// $db->table($tabela)->insert([
// 	'titulo' => 'Smart TV LED 32" LG',
// 	'descricao' => '3 HDMI, 2 USB, Bluetooth, Wi-Fi, Active HDR, ThinQ AI - 32LM621CBSB.A',
// 	'preco' => 1199.00,
// 	'fabricante' => 'LG',
// 	'created_at' => '2020-01-10',
// 	'updated_at' => '2020-01-10'
// ]);

// $db->table($tabela)->insert([
// 	'titulo' => 'Tv Box Tv',
// 	'descricao' => '3gb Ram , 16gb Rom sistema android wifi dual band 2 e 5 ghz',
// 	'preco' => 248.76,
// 	'fabricante' => 'Mm',
// 	'created_at' => '2020-01-10',
// 	'updated_at' => '2020-01-10'
// ]);

$schema->dropIfExists($tabela);

$schema->create($tabela, function($table){
	$table->increments('id');
	$table->string('nome', 100);
	$table->string('email', 100);
	$table->string('senha', 100);
});

// Popular tabela

$db->table($tabela)->insert([
	'nome' => 'Lucas Rodrix',
	'email' => 'lucas@rodrix.net',
	'senha' => 'renata.1983'
]);

$db->table($tabela)->insert([
	'nome' => 'Renata Rodrix',
	'email' => 'renata@rodrix.net',
	'senha' => 'lucas.1985'
]);

$db->table($tabela)->insert([
	'nome' => 'Alice Rodrix',
	'email' => 'alice@rodrix.net',
	'senha' => 'relu.1987'
]);