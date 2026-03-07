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

    $controller = new EncurtadorController();

    $resultado = $controller->encurtarLink($siteOriginal);

    $response->getBody()->write(json_encode($resultado));

    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/todas-urls', function(Request $req, Response $res){
    $controller = new EncurtadorController();
    $resultado = $controller->getAll();

    $res->getBody()->write(json_encode($resultado));
    return $res
        ->withHeader('Content-type', 'application/json')
        ->withStatus(200);

});