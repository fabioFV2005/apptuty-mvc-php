<?php 

require_once __DIR__ . '/../includes/app.php';
use Controllers\CategoriaController;
use Controllers\LoginController;
use MVC\Router;
use Controllers\CitaController;
use Controllers\APIController;
use Controllers\AdminController;
use Controllers\InformacionController;
use Controllers\MesaController;
use Controllers\ServicioController;

$router = new Router();

//Iniciar sesion
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);



//recuperar password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);

$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']); 

//crear cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);


//confirmar cuenta
$router->get('/confirmar-cuenta',[LoginController::class, 'confirmar']);
$router->get('/mensaje',[LoginController::class, 'mensaje']);


//Area privada
$router->get('/informacion', [InformacionController::class,'index']);
$router->post('/informacion', [InformacionController::class,'crear']);
$router->get('/cita', [CitaController::class,'index']);
$router->get('/admin', [AdminController::class,'index']);

//Api de Reservas
$router->get('/api/servicios', [APIController::class,'index']);
$router->post('/api/citas', [APIController::class,'guardar']);
$router->post('/api/eliminar', [APIController::class,'eliminar']);

//crud categorias
$router->get('/categorias',[CategoriaController::class,'index']);
$router->post('/categorias', [CategoriaController::class,'crear']);
$router->post('/categorias/editar', [CategoriaController::class,'editar']);
$router->get('/categorias/editar', [CategoriaController::class,'editar']);
$router->post('/categorias/eliminar', [CategoriaController::class,'eliminar']);
//Crud servicios
$router->get('/servicios', [ServicioController::class,'index' ]);
$router->post('/servicios', [ServicioController::class,'crear' ]);
//$router->get('/servicios/crear', [ServicioController::class,'crear' ]);
//$router->post('/servicios/crear', [ServicioController::class,'crear' ]);
$router->get('/servicios/actualizar', [ServicioController::class,'actualizar' ]);
$router->post('/servicios/actualizar', [ServicioController::class,'actualizar' ]);
$router->post('/servicios/eliminar', [ServicioController::class,'eliminar' ]);
// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador


//crud mesas
$router->get('/mesas', [MesaController::class,'index']);
$router->post('/mesas', [MesaController::class,'crear']);
$router->post('/mesas/editar', [MesaController::class,'editar']);
$router->get('/mesas/editar', [MesaController::class,'editar']);
$router->get('/mesas/eliminar', [MesaController::class,'eliminar']);
$router->comprobarRutas();