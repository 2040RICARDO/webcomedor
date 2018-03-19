<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('welcome', 'PublicoController@index');




Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
 
// Registration routes...
Route::get('register', 'AdminController@getRegister');
Route::post('register','AdminController@postRegister');
Route::get('/', 'AdminController@index');

Route::get('admin','AdminController@index');








Route::get('indexcomensal','ComensalController@index');
Route::get('indextarjeta','TarjetaController@index');

Route::resource('frmregistrocomensal','ComensalController@agregar');
Route::get('frmregistrotarjeta','TarjetaController@agregar');
Route::get('frmregistropermiso','PermisoController@index');

Route::get('frmpermiso/{comensal_id}/{id_tarjeta}','PermisoController@permiso');
Route::get('indexpermiso','PermisoController@index');
Route::get('frmeditarpermiso/{id_edit_permiso}', 'PermisoController@edit');










Route::post('agregar_nuevo_usuario', 'ComensalController@agregar_nuevo_usuario');
Route::post('agregar_nuevo_tarjeta', 'TarjetaController@agregar_nuevo_tarjeta');

Route::post('agregar_nuevo_permiso', 'PermisoController@agregar_nuevo_permiso');
Route::resource('eliminarpermiso', 'PermisoController');
route::resource('editarpermiso','PermisoController');





//Route::resource('frmeditarcomensal', 'ComensalController');







Route::get('frmeditarcomensal/{id_edit_comensal}', 'ComensalController@edit');
Route::get('frmeditartarjeta/{id_edit_tarjeta}', 'TarjetaController@edit');
Route::get('frmeditartarjeta1/{id_edit_tarjeta1}', 'TarjetaController@edit1');
Route::get('perfilcomensal/{comensal_id}','ComensalController@perfilcomensal');




route::resource('editar','ComensalController');
route::resource('editartarjeta','TarjetaController');


route::get('photo/{id_photo_comensal}','ComensalController@photo');




Route::post('photoproduct','ComensalController@update_photo');




Route::resource('eliminarcomensal', 'ComensalController');
Route::resource('eliminartarjeta', 'TarjetaController');
Route::get('verificartarjeta','TarjetaController@verificartarjeta');
Route::post('verificartag','TarjetaController@verificartag');






Route::get('carnet','CarnetController@index');
Route::get('cargar_carnet/{tipo}','CarnetController@carnet');
Route::get('carnete/{individual}','CarnetController@carneti');













//CONTROL DE ASISTENCIA
Route::get('indexasistencia','AsistenciaController@index');
Route::post('asistencia/add','AsistenciaController@store');

Route::post('rfid/add1', 'TarjetaController@registrar');
Route::post('control', 'AsistenciaController@store');

Route::get('frmfecha','AsistenciaController@fechaindex');

Route::post('fechacontrol', 'AsistenciaController@listacontrol');

Route::post('numero','AsistenciaController@numero');
Route::post('asistencia_eventual','AsistenciaController@asistencia_eventual');

Route::get('listaasistencia','AsistenciaController@listaasistencia');




Route::get('frmsuspender/{cid}/{tid}','SuspendidoController@frmsuspender');
Route::post('agregar_nuevo_suspendermodal', 'SuspendidoController@agregar_nuevo_suspendermodal');
Route::get('indexsuspendido','SuspendidoController@index');
Route::get('frmeditarsuspendido/{id_edit_suspendido}', 'SuspendidoController@edit');
route::resource('editarsuspender','SuspendidoController');
Route::resource('eliminarsuspender', 'SuspendidoController');
Route::get('frmsuspendernuevo/{comensal_id}/{id_tarjeta}','SuspendidoController@frmsuspendernuevo');
Route::post('agregar_nuevo_suspendido', 'SuspendidoController@agregar_nuevo_suspendido');








route::get('list/{op}','ComensalController@listarc');











Route::get('indexeventual','EventualController@index');
Route::get('frmeventual/{idd}/{tarjeta_idd}/{comensal_idd}','EventualController@eventual');
Route::post('agregar_nuevo_eventual', 'EventualController@agregar_nuevo_eventual');
Route::get('frmeditareventual/{id_edit_eventual}', 'EventualController@edit');
route::resource('editareventual','EventualController');
Route::get('frmeventualnuevo','EventualController@eventualnuevo');
Route::post('agregar_nuevo_eventualnuevo', 'EventualController@agregar_nuevo_eventualnuevo');
Route::resource('eliminareventual', 'EventualController');
route::get('photoeventual/{id_photo_eventual}','EventualController@photo');
Route::post('photo_eventual','EventualController@update_photo');









Route::get('indexreporte','ReporteController@index');
Route::get('reportecomensal','ReporteController@reportecomensal');
Route::post('agregar_reporte_comensal', 'ReporteController@agregar_reporte_comensal');
route::get('rcomensal','ReporteController@lista');

//VISTAS REPORTES
Route::get('frmcomensal','ReporteController@frmcomensal');
Route::get('frmeventual','ReporteController@frmeventual');
Route::get('frmpermiso','ReporteController@frmpermiso');
Route::get('frmsuspender','ReporteController@frmsuspender');
Route::get('frmtarjeta','ReporteController@frmtarjeta');
Route::get('frmlistacontrol','ReporteController@frmlistacontrol');
Route::get('frmlistaasistencia','ReporteController@frmlistaasistencia');










//Reportes Comensales
route::get('rcomensalc/{car_id}','ReporteController@rcomensalc');
route::get('rcomensalgeneral','ReporteController@rcomensalgeneral');
route::get('rcomensalnumero','ReporteController@rcomensalnumero');

//Reportes Terjeta
route::get('rtarjetae/{car_id}','ReporteController@rtarjetae');
route::get('rtarjetageneral','ReporteController@rtarjetageneral');

//Reportes Permiso
route::get('rpermisov/{car_id}','ReporteController@rpermisov');
route::get('rpermisogeneral','ReporteController@rpermisogeneral');

//Reportes Eventual
route::get('rcomensaleventualc/{car_id}','ReporteController@rcomensaleventualc');
route::get('rcomensaleventualgeneral','ReporteController@rcomensaleventualgeneral');

//Reportes Suspender
route::get('rsuspender/{car_id}','ReporteController@rsuspender');
route::get('rsuspendergeneral','ReporteController@rsuspendergeneral');

//REPORTE LISTA DE NUMEROS SUSPENDIDOS
//Route::get('listanumerosuspendidos/{fechaa1}/','ReporteController@numerosuspendidos');
Route::post('listanumerosuspender', 'ReporteController@numerosuspendidos');
Route::post('listanombresuspender', 'ReporteController@nombresuspendidos');











///////////////CARRERA/////////////////////////


Route::get('indexcarrera','CarreraController@index');
Route::get('frmregistrocarrera','CarreraController@agregar');
Route::post('agregar_nuevo_carrera', 'CarreraController@agregar_nuevo_carrera');
Route::get('frmeditarcarrera/{id_edit_carrera}', 'CarreraController@edit');
route::resource('editarcarrera','CarreraController');
Route::resource('eliminarcarrera', 'CarreraController');



///////////////////////ACTIVIDAD//////////
Route::get('indexactividad','ActividadController@index');
Route::get('frmregistroactividad','ActividadController@frmregistroactividad');
Route::post('agregar_nuevo_actividad', 'ActividadController@agregar_nuevo_actividad');
Route::get('frmeditaractividad/{id_edit_actividad}', 'ActividadController@edit');
route::resource('editaractividad','ActividadController');
Route::resource('eliminaractividad', 'ActividadController');















Route::get('generarborrar','AdminController@generar');





















Route::get('indexbackup', 'BackupController@index');
Route::get('backupcreate', 'BackupController@create');
Route::get('restaurar/{$n}', 'BackupController@restaurar');
Route::get('backup/download/{nombre}', 'BackupController@download');



Route::get('acerca', 'AyudaController@acerca');

Route::get('acerca1', 'AyudaController@acerca1');


//PUBLICACIONES
Route::get('publicacion','PublicarController@index');
Route::get('frmregistropublicacion','PublicarController@vistapublicacion');
Route::post('agregar_nueva_publicacion','PublicarController@create');
Route::get('frmeditarpublicacion/{id}','PublicarController@edit');
Route::resource('editarpublicacion','PublicarController');
Route::resource('eliminarpublicacion','PublicarController');
Route::post('verificaobservado','PublicoController@verificar');
Route::get('descargar_publicacion/{id}', 'PublicoController@descargar_publicacion');