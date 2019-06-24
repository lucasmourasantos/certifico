<?php
// diretório base da aplicação
define('BASE_PATH', dirname(__FILE__));

/*
*/
$url = parse_url(getenv("mysql://b5ee2adc25aa24:2ed683a3@us-cdbr-iron-east-02.cleardb.net/heroku_78a881d13ca0c35?reconnect=true"));
/*
*/

/*
*/
// credenciais de acesso ao MySQL
define('MYSQL_HOST', $url["us-cdbr-iron-east-02.cleardb.net"]);
define('MYSQL_USER', $url["b5ee2adc25aa24"]);
define('MYSQL_PASS', $url["2ed683a3"]);
define('MYSQL_DBNAME', substr($url["heroku_78a881d13ca0c35"], 1));
/*
*/

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
