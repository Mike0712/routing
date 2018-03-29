<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$fileLocator = new \Symfony\Component\Config\FileLocator([__DIR__ . '/config']);
$loader = new \Symfony\Component\Routing\Loader\YamlFileLoader($fileLocator);
$routes = $loader->load('routes.yaml');

$context = new RequestContext();
$context->fromRequest(\Symfony\Component\HttpFoundation\Request::createFromGlobals());

$generator = new \Symfony\Component\Routing\Generator\UrlGenerator($routes, $context);

$url = $generator->generate('show_post',[
    'slug' => 'my-blog-post',
]);

//$matcher = new UrlMatcher($routes, $context);
//
//$parameters = $matcher->match('/foo');

