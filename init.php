<?php
// diretório base da aplicação
define('BASE_PATH', dirname(__FILE__));

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["us-cdbr-iron-east-02.cleardb.net"];
$username = $url["b5ee2adc25aa24"];
$password = $url["2ed683a3"];
$db = substr($url["heroku_78a881d13ca0c35"], 1);

/*
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$conn = new mysqli($server, $username, $password, $db);
*/

// credenciais de acesso ao MySQL
define('MYSQL_HOST', $server);
define('MYSQL_USER', $username);
define('MYSQL_PASS', $password);
define('MYSQL_DBNAME', $db);

/*
//Conexão local
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '');
define('MYSQL_DBNAME', 'fingerprints');
*/

// configurações do PHP
ini_set('display_errors', true);
error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');

/*
Nomo do Banco de Dados ultimatephp_artigos

CREATE TABLE users(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT, -- id
    name VARCHAR(60) NOT NULL, -- nome
    email VARCHAR(80) NOT NULL, -- email
    gender ENUM('m', 'f') NOT NULL, -- gênero (masculino, feminino)
    birthdate DATE NOT NULL, -- data de nascimento
    PRIMARY KEY(id)
) COLLATE=utf8_unicode_ci;
*/
