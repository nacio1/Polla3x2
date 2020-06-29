<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group('jugador', ['filter' => 'isLoggedIn'], function($routes){
	$routes->get('/', 'jugador/Jugar::index');
	$routes->get('jugar', 'jugador/Jugar::index');
	$routes->get('mis-jugadas', 'jugador/Jugar::misJugadas');
	$routes->post('crear-jugada', 'jugador/Jugar::crearJugada');
	$routes->post('editar-jugada', 'jugador/Jugar::editarJugada');
	$routes->get('abonar', 'jugador/Abonar::index');
	$routes->post('crear-abono', 'jugador/Abonar::insertarAbono');
	$routes->get('puntuacion/(:any)', 'jugador\Puntuacion::index/$1');
	$routes->get('puntuacion', 'jugador/Puntuacion::index');	
	$routes->get('retirar', 'jugador/Retirar::index');	
	$routes->post('agregar-retiro', 'jugador/Retirar::crearRetiro');
	$routes->add('perfil', 'Usuario::perfil');
	$routes->add('mis-cuentas', 'jugador/Bancos::misCuentas');	
	$routes->post('agregar-cuenta', 'jugador/Bancos::registrarCuenta');
	$routes->post('editar-cuenta', 'jugador/Bancos::editarCuenta');
	$routes->get('mis-transacciones', 'jugador/Transacciones::index');
	$routes->post('cedulaExists', 'Usuario::cedulaExists');
	$routes->post('userExists', 'Usuario::userExists');
	$routes->get('salir', 'Usuario::cerrarSesion');
});

$routes->group('admin', ['filter' => 'isAdmin'], function($routes){
	
	$routes->get('/', 'admin/Dashboard::index');
	$routes->get('dashboard', 'admin/Dashboard::index');
	$routes->get('usuarios', 'admin/Usuarios::index');
	$routes->get('usuarios/(:any)', 'admin\Usuarios::Detalles/$1');
	$routes->post('cambiar-rol', 'admin\Usuarios::cambiarRol');

	$routes->get('abonos', 'admin/Abonos::index');

	$routes->get('jornadas', 'admin/Jornada::index');	
	$routes->get('cerrar-jornada/(:any)', 'admin\Jornada::cerrarJornada/$1');
	$routes->post('crear-jornada', 'admin/Jornada::crearJornada');	

	$routes->get('resultados', 'admin/Resultados::index');
	$routes->post('actualizar-puntos', 'admin/Resultados::actualizarPuntos');

	$routes->get('retirados', 'admin/Retirados::index');
	$routes->post('retirar-ejemplar', 'admin/Retirados::retirarEjemplar');
	$routes->post('editar-retirados', 'admin/Retirados::actualizarRetirados');
	$routes->get('retiros', 'admin/Retiros::index');	
});

$routes->add('registro', 'Usuario::registro');
$routes->add('login', 'Usuario::login');
$routes->get('salir', 'Usuario::cerrarSesion');
$routes->get('reglamento', 'Home::reglamento');
$routes->get('terminos', 'Home::terminos');
$routes->get('/', 'Home::index', ['filter' => 'isLoggedIn']);

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
