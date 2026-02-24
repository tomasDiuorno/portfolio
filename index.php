<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
include_once ("helper/Factory.php");
$configFactory = new Factory();
$router = $configFactory->get("router");

$controller = isset($_GET["controller"]) ? $_GET["controller"] : null;
$method = isset($_GET["method"]) ? $_GET["method"] : null;

$router->executeController($controller, $method);