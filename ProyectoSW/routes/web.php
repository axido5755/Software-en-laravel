<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ClausulaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ContenidoClausulaController;
use App\Http\Controllers\AnexoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\GenerarPDFController;

/*AnexoClausula
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Login');
});

/*Route::get('/home', function () {
    return view('home');
});*/

Route::get('/subir', function () {
    return view('creacion');
});

Route::get('/menuempresa', function () {
    return view('menuempresa');
});


Route::get('contrato/{contrato}/download' , '\App\Http\Controllers\ContratoController@download');
Route::get('contrato/generarpdf' , '\App\Http\Controllers\ContratoController@generarPDF');
Route::post('ContratoClausula/create' , '\App\Http\Controllers\ContratoController@AñadirClausula');
Route::get('contrato/creacioncontrato' , '\App\Http\Controllers\ContratoController@create2');


Route::post('ContratoClausula/create' , '\App\Http\Controllers\ContratoController@store2');
Route::get('contrato/creacioncontrato' , '\App\Http\Controllers\ContratoController@create2');
Route::post('contrato/ClausulasPorDefecto' , '\App\Http\Controllers\ContratoController@store3');


Route::get('ContratoClausula/{contrato}/index2' , '\App\Http\Controllers\ContenidoClausulaController@index2');
Route::get('ContratoClausula/{contrato}/create2' , '\App\Http\Controllers\ContenidoClausulaController@create2');
Route::get('ContratoClausula/{contrato}/{clausula}/{datos}/destroy2' , '\App\Http\Controllers\ContenidoClausulaController@destroy2');
Route::get('ContratoClausula/{contrato}/{clausula}/edit' , '\App\Http\Controllers\ContenidoClausulaController@edit');
Route::patch('ContratoClausula/{contrato}/{clausula}/update2' , '\App\Http\Controllers\ContenidoClausulaController@update2');
Route::post('ContratoClausula/{contrato}/store2' , '\App\Http\Controllers\ContenidoClausulaController@AñadirClausula');
Route::post('ContratoClausula/{contrato}/AñadirClausulaDefecto' , '\App\Http\Controllers\ContenidoClausulaController@AñadirClausulaDefecto');
Route::post('ContratoClausula/create' , '\App\Http\Controllers\ContratoController@store2');


Route::post('/' , '\App\Http\Controllers\session@sessionput');
Route::get('/usuario' , '\App\Http\Controllers\session@sessionget');
Route::get('/home' , '\App\Http\Controllers\session@Gethome');

Route::get('/Login', function () {
    return view('Login');
});



Route::post('/' , '\App\Http\Controllers\session@sessionput');
Route::get('/usuario' , '\App\Http\Controllers\session@sessionget');

Route::get('/Login', function () {
    return view('Login');
});
Route::get('anexos/{contrato}/index2' , '\App\Http\Controllers\AnexoController@index2');
Route::get('anexos/{contrato}/create2' , '\App\Http\Controllers\AnexoController@create2');
Route::post('anexos/{contrato}/store2' , '\App\Http\Controllers\AnexoController@store2');
Route::get('AnexoClausula/{contrato}/index2' , '\App\Http\Controllers\ContenidoAnexoController@index2');
Route::get('AnexoClausula/{contrato}/{clausula}/{datos}/destroy2' , '\App\Http\Controllers\ContenidoAnexoController@destroy2');
Route::get('AnexoClausula/{contrato}/{clausula}/edit' , '\App\Http\Controllers\ContenidoAnexoController@edit');
Route::patch('AnexoClausula/{contrato}/{clausula}/update2' , '\App\Http\Controllers\ContenidoAnexoController@update2');


Route::get('contrato/creacioncontrato' , '\App\Http\Controllers\ContratoController@create2');
Route::post('AnexoClausula/{contrato}/anadirClausula' , '\App\Http\Controllers\ContenidoAnexoController@AñadirClausula');

Route::get('AnexoClausula/{contrato}/create2' , '\App\Http\Controllers\ContenidoAnexoController@create2');




Route::resource('contrato', ContratoController::class);
Route::resource('perfil', PerfilController::class);
Route::resource('clausula', ClausulaController::class);
Route::resource('empresa', EmpresaController::class);
Route::resource('ContratoClausula', ContenidoClausulaController::class);
Route::resource('proveedor', ProveedorController::class);

Route::resource('anexo', AnexoController::class);

Route::get('/findcontenido','App\Http\Controllers\ClausulaController@findcontenido');
Route::get('/findultimaclausula','App\Http\Controllers\ClausulaController@findultimaclausula');
Route::post('/guardarclusula','App\Http\Controllers\ClausulaController@store2');


Route::get('/generarpdf', [GenerarPDFController::class, 'index']);
Route::post('/imprimir','App\Http\Controllers\GenerarPDFController@generar');
