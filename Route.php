<?php

class Route
{
    /**
     * @var string $controllerName
     */
    protected $controllerName;

    /**
     * @var string $methodName
     */
    protected $methodName;

    /**
     * @param string $controllerName
     * @param string $methodName
     */
    public function __construct($controllerName, $methodName)
    {
        $this->controllerName = $controllerName;
        $this->methodName     = $methodName;
    }

    /**
     * @return void
     */
    public function dispatch()
    {
        if (!$this->isValidController()) {
            throw new Exception(sprintf("The controller %s doesn't exists.", $this->controllerName));
        }

        if (!$this->isValidMethod()) {
            throw new Exception(sprintf("The action %s doesn't exists.", $this->methodName));
        }

        $method = $this->methodName;
        
        $controller = $this->buildController();
        $controller->$method();
    }

    /**
     * @return AbstractController
     */
    protected function buildController()
    {
        $class = sprintf("WebService\\Controller\\%s", $this->controllerName);

        return new $class;
    }

    /**
     * @return bool
     */
    protected function isValidController()
    {
        return file_exists('php/src/Controller/%s.php', $this->controllerName);
    }

    /**
     * @return bool
     */
    protected function isValidMethod()
    {
        $reflection = new \ReflectionClass($this->controllerName);

        return in_array($this->methodName, $reflection->getMethods());
    }
}
