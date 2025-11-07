<?php

class Router
{
    private $factory;
    private $defaultMethod;
    private $defaultController;

    public function __construct($factory, $defaultController, $defaultMethod)
    {
        $this->factory = $factory;
        $this->defaultMethod = $defaultMethod;
        $this->defaultController = $defaultController;
    }

    public function executeController($controllerParam, $methodParam){
        $controller = $this->getControllerFrom($controllerParam);
        $this->executeMethodFromController($controller, $methodParam);
    }

    public function getControllerFrom($controllerName)
    {
        $controllerName = $this->getControllerName($controllerName);
        $controller = $this->factory->get($controllerName);

        if($controller == null){
            var_dump($controllerName);
            var_dump($controller);
        }

        return $controller;
    }

    private function getControllerName($controllerName)
    {
        return $controllerName ? ucfirst($controllerName) . "Controller": $this->defaultController;
    }

    private function executeMethodFromController($controller, $methodName)
    {
        call_user_func(array($controller, $this->getMethodName($controller, $methodName)));
    }

    private function getMethodName($controller, $methodName)
    {
        return method_exists($controller, $methodName) ? $methodName : $this->defaultMethod;
    }
}