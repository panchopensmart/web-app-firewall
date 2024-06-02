<?php
require_once 'Autoloader.php';

Autoloader::loadClassesFromFolder('Config/');
Autoloader::loadClassesFromFolder('Middleware/');
Autoloader::loadClassesFromFolder('Controllers/');
Autoloader::loadClassesFromFolder('View/');
Autoloader::loadClassesFromFolder('lib/');

$requestUri = $_SERVER['REQUEST_URI'];
$routes = Router::getRoutes();

try {
    WebApplicationFirewall::protectRequests($requestUri);

    if (array_key_exists($requestUri, $routes)) {
        $partsRoute = explode('@', $routes[$requestUri]);

        //Если нет сущности для контроллера
        if (count($partsRoute) == 2) {
            list($controllerName, $methodName) = $partsRoute;
            $controller = new $controllerName();
            $result = $controller->$methodName();
            //Если есть сущность для контроллера
        } elseif (count($partsRoute) == 3) {
            list($controllerName, $methodName, $entity) = $partsRoute;
            $EntityDTO = (new EntityFactory)->createEntity($entity);
            $controller = new $controllerName($EntityDTO);
            $result = $controller->$methodName();
        }

        DefaultView::render($result);
    } else {
        http_response_code(404);
    }
} catch (Exception $e) {
    echo ":( Error connection: " . $e->getMessage();
}
