<?php

use App\Http\Controllers\Api\ClientesController;
use App\Http\Controllers\Api\ContactosController;
use App\Http\Controllers\Api\EstadoController;
use App\Http\Controllers\Api\EstadosCostosController;
use App\Http\Controllers\Api\EstadoProductosController;
use App\Http\Controllers\Api\EstadosProyectosController;
use App\Http\Controllers\Api\LocationsController;
use App\Http\Controllers\Api\SeguimientoController;
use App\Http\Controllers\Api\SeguimientoCotizacionController;
use App\Http\Controllers\Api\TipoClientesController;
use App\Http\Controllers\Api\TipoRubroController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\GraficoClientesController;
use App\Http\Controllers\Api\AccionController;
use App\Http\Controllers\Api\EstudioUsuariosController;
use App\Http\Controllers\Api\ProductosController;
use App\Http\Controllers\Api\CotizacionesController;
use App\Http\Controllers\Api\LiquidacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\TrabajadoresController;

use App\Http\Controllers\Api\CabecerasController;

use App\Http\Controllers\Api\Graficos\GraficoProyectoController as GraficoProyectoEstadosController;



use App\Http\Controllers\Api\Roles\RolesController;
use App\Http\Controllers\Api\CentroCosto\ServiciosController;
use App\Http\Controllers\Api\CentroCosto\StatusNController;

//platilla
use App\Http\Controllers\Api\Plantilla\BodegaController;
use App\Http\Controllers\Api\Plantilla\CompraController;
use App\Http\Controllers\Api\Plantilla\CotizacionController;
use App\Http\Controllers\Api\Plantilla\LogisticaController;
use App\Http\Controllers\Api\Plantilla\OtrosController;
use App\Http\Controllers\Api\PagosController;
use App\Http\Controllers\Api\TiposCostosController;
use App\Http\Controllers\Api\TiposIngresosController;
use App\Http\Controllers\Api\GraficoProyectoController;

use App\Http\Controllers\Api\ProyectoController;


//tree
use App\Http\Controllers\Api\CosteoController;
use App\Http\Controllers\Api\TreeController;
use App\Http\Controllers\Api\CentroCostosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/estudio-proyecto-estados', [GraficoProyectoEstadosController::class, 'get_data']);


Route::get('/getAllPermissions', [RolesController::class, 'getAllPermissionsAttribute']);

Route::get('/getProcesos', [App\Http\Controllers\Api\SubProcesoCostosController::class, 'getProcesos']);
Route::get('/getProcesos/{id}', [App\Http\Controllers\Api\SubProcesoCostosController::class, 'getProceso']);

Route::apiResource('costeo', CosteoController::class);

Route::get('/proyectoBodyAsoc/{id}',[ProyectoController::class, 'getBodyAsoc'] );

Route::get('/costeoTotal/{id}',[CosteoController::class, 'getSumAll'] );
Route::apiResource('tree', TreeController::class);

Route::apiResource('subproceso-costos', App\Http\Controllers\Api\SubProcesoCostosController::class);

Route::apiResource('cabeceras', CabecerasController::class);

Route::put('/update-cabecera', [CabecerasController::class, 'updateCabecera']);


Route::get('statusN/', [StatusNController::class, 'bringValues']);
Route::post('statusN', [StatusNController::class, 'updateValues']);

Route::get('/users', [UserController::class, 'getAll']);
Route::get('/grafico-clientes', [GraficoClientesController::class, 'index']);
Route::get('/regiones', [LocationsController::class, 'getRegiones']);
Route::get('/regiones/{region}', [LocationsController::class, 'getRegion']);
Route::get('/clientes-all', [ClientesController::class, 'showAll']);

Route::get('/comunas/{region}', [LocationsController::class, 'getComunas']);

Route::get('/comunas-name/{region}', [LocationsController::class, 'getComunasByName']);

Route::get('/seguimientos/show/{seguimiento}', [SeguimientoController::class, 'showAll']);

Route::get('/seguimientos-cotizacion/show/{seguimiento}', [SeguimientoCotizacionController::class, 'showAll']);

Route::get('/seguimiento/show/{seguimiento}', [SeguimientoController::class, 'showSeguimiento']);

Route::get('/seguimiento/getPendientes', [SeguimientoController::class, 'getPendientesSeguimientos']);

Route::get('clientes/export/{clientes}', [ClientesController::class, 'export']);

Route::get('/productosAsoc', [CotizacionesController::class, 'indexProductosAsoc']);
Route::get('/productosAsoc/{producto}', [CotizacionesController::class, 'indexProductosAsocUnique']);
Route::post('/productosAsoc', [CotizacionesController::class, 'storeProductosAsoc']);

Route::post('/save-producto', [CotizacionesController::class, 'saveProductoAsoc']);
Route::delete('/delete-producto/{producto}', [CotizacionesController::class, 'deleteProductoAsoc']);

Route::post('/change-seguimiento', [SeguimientoController::class, 'changeSeguimiento']);
Route::post('/change-seguimiento-cotizacion', [SeguimientoCotizacionController::class, 'changeSeguimiento']);
Route::put('/update-pendiente', [CosteoController::class, 'updatePendientes']);

Route::get('/get-body/{id}', [CotizacionesController::class, 'getBody']);
Route::get('/get-body/liquidacion/{id}', [LiquidacionController::class, 'getBody']);

Route::put('/guardar-estructura', [CotizacionesController::class, 'storeBody']);

Route::put('/guardar-estructura/liquidacion', [LiquidacionController::class, 'storeBody']);


Route::apiResource('clientes', ClientesController::class);

Route::apiResource('contactos', ContactosController::class);

Route::get('/contactos_cliente/{id_cliente}', [ContactosController::class,'get_clientes_contactos']);



Route::apiResource('liquidaciones', LiquidacionController::class);

Route::apiResource('trabajadores', TrabajadoresController::class);

Route::apiResource('cotizaciones', CotizacionesController::class);

Route::apiResource('productos', ProductosController::class);

Route::apiResource('estudio-user', EstudioUsuariosController::class);

Route::apiResource('tipo-clientes', TipoClientesController::class);

Route::apiResource('tipo-rubros', TipoRubroController::class);

Route::apiResource('usuarios', UserController::class);

Route::apiResource('seguimientos', SeguimientoController::class);

Route::apiResource('seguimientos-cotizaciones', SeguimientoCotizacionController::class);

Route::apiResource('estados', EstadoController::class);

Route::apiResource('centro_costos', CentroCostosController::class);

Route::apiResource('estados-proyectos', EstadosProyectosController::class);

Route::apiResource('estados_costos', EstadosCostosController::class);


Route::apiResource('estados-productos', EstadoProductosController::class);

Route::apiResource('accion', AccionController::class);


Route::apiResource('pagos', PagosController::class);

Route::apiResource('tcostos', TiposCostosController::class);

Route::apiResource('grafico-proyecto', GraficoProyectoController::class);

Route::apiResource('tingresos', TiposIngresosController::class);


Route::apiResource('roles', RolesController::class);

Route::apiResource('servicios', ServiciosController::class);

Route::apiResource('proyectos', ProyectoController::class);

Route::apiResource('logistica', LogisticaController::class);

Route::apiResource('bodega', BodegaController::class);
