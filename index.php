<?php

// some like that
// http://www.example.com/?controller=application&action=index

$route = new Route($_GET['controller'], $_GET['action']);
$route->dispatch();
