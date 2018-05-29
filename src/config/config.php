<?php
date_default_timezone_set('America/Sao_Paulo');

//Configuração banco de dados
$config['Database'] = array();
$config['Database']['dbtype'] = 'mysql';
$config['Database']['dbname'] = 'essentia';
$config['Database']['host'] = 'localhost';
$config['Database']['port'] = 3306;
$config['Database']['username'] = 'root';
$config['Database']['password'] = '';
$config['Database']['charset'] = 'utf8';


//Diretório Root da aplicação
define("DIR","/essentia-pharma");

define('DIR_IMG','/img/');

//Nome da Aplicação
define("APLICATION_NAME","Essentia");