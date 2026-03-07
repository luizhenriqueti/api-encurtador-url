<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use encurtador\controller\HomeController;
use encurtador\controller\EncurtadorController;


$app->get('/', function (Request $request, Response $response, $args) {
    $HomeController = new HomeController();
    $response->getBody()->write($HomeController->home());
    return $response;
});


$app->post('/encurtar-link', function(Request $request, Response $response){

    $data = json_decode($request->getBody()->getContents(), true);

    $siteOriginal = $data['link'];

    $controller = new EncurtadorController($siteOriginal);

    $resultado = $controller->encurtarLink();

    $response->getBody()->write(json_encode($resultado));

    return $response->withHeader('Content-Type', 'application/json');
});

