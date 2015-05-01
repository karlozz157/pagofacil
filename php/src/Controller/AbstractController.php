<?php

abstract class AbstractController
{
    /**
     * @param string $route
     */
    protected function redirect($route)
    {
        header(sprintf('Location: %s', $route));
    }

    /**
     * @param string $fileName
     * @param array $vars
     */
    protected function view($fileName, array $vars = [])
    {

    }
}
