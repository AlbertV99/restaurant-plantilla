<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ComidaController;
use App\Http\Controllers\ComidaIngrediente;
use App\Http\Controllers\PlatoDiaController;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=>'sistema'], function () use ($router){

    // TODAS LAS RUTAS CORRESOPNDIENTE A EL CLIENTE
    $router->group(['prefix'=>'cliente'], function () use ($router){
        $controller = new ClienteController();
        $router->get('/',function () use ($controller) {
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->index();
        });

        $router->get('/u/{id}',function ($id) use ($controller) {
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->show($id);
        });

        $router->post('/',function (Request $request) use ($controller) {
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->store($request);
        });

        $router->put('/actualizar/{id}',function (Request $request,$id)  use ($controller ){
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->update($request,$id);
        });

        $router->delete('/eliminar/{id}',function ($id) use ($controller) {
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->destroy($request);
        });

    });

    // TODAS LAS RUTAS CORRESOPNDIENTE A LOS PRODUCTOS
    $router->group(['prefix'=>'producto'], function () use ($router){
        $controller = new ProductoController();
        $router->get('/',function () use ($controller) {
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->index();
        });

        $router->get('/u/{id}',function ($id) use ($controller) {
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->show($id);
        });

        $router->post('/',function (Request $request) use ($controller) {
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->store($request);
        });

        $router->put('/actualizar/{id}',function (Request $request,$id)  use ($controller ){
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->update($request,$id);
        });

        $router->delete('/eliminar/{id}',function ($id) use ($controller) {
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->destroy($request);
        });

    });

    // TODAS LAS RUTAS CORRESOPNDIENTE A LA COMIDA
    $router->group(['prefix'=>'comida'], function () use ($router){
        $controller = new ComidaController();
        $router->get('/',function () use ($controller) {
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->index();
        });

        $router->get('/u/{id}',function ($id) use ($controller) {
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->show($id);
        });

        $router->post('/',function (Request $request) use ($controller) {
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->store($request);
        });

        $router->put('/actualizar/{id}',function (Request $request,$id)  use ($controller ){
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->update($request,$id);
        });

        $router->delete('/eliminar/{id}',function ($id) use ($controller) {
            // TODO: CREAR ESTRUCTURA TRY CATCH
            return $controller->destroy($request);
        });

    });


});



$router->get('/menu',function () use ($controller) {
    $controller = new PlatoDiaController();
    // TODO: CREAR ESTRUCTURA TRY CATCH
    return $controller->showLastMenu();
});
