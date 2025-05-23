<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

//Definicion de rutas basicas

Route::get('/hola', function(){
    $nombre= "Alexander Ardila";
    return "Hola, Laravel {$nombre}";
});

//Parametros en la rutas
Route::get('/usuario/{nombre}', function($nombre){
    return "Usuario: $nombre";
});

//Rutas nombradas

Route::get('/perfil', function(){
    return view('perfil');
})->name('perfil');

//Redirrecion de rutas
Route::redirect('/ruta-anterior', '/ruta-nueva');

Route::get('/ruta-nueva', function(){
    return "Ruta Nueva";
});

//Vista directa
Route::view('/bienvenido', 'welcome');

// ************* Helpers ***************
//env(): Obtener variables de entorni

Route:: get('/db', function(){
    return env('DB_CONNECTION');
});

//dd(): Depuracion rápida

Route::get('/dd', function(){
    $nombre = "Alexander Ardila";
    dd($nombre);
    return env('DB_CONNECTION');
});

Route::get('/app', function(){
    return config('app.timezone');
});

//Vistas

//Route::view('/producto', 'producto');

Route::get('/producto', function(){
    //return view('almacen.producto', ['nombre' => 'Impresora LX300', 'marca'=> 'Epson']);
    //return view('almacen.producto')->with(['nombre' => 'Impresora LX300', 'marca'=> 'Epson']);
    $nombre="Impresora LX300";
    $marca="EPSON";
    return view('almacen.producto',compact('nombre', 'marca'));
});

Route::get('condicional/{nota}', function($nota = 12){
    return view('estructuras.condicional', compact('nota'));
});

Route::get('control/{nota}', function($numero = 2){
    return view('estructuras.switch', compact('numero'));
});


Route::get('/while/{numero}', function($numero){
    return view('estructuras.while', compact('numero'));
});

Route::get('foreach', function(){
    $lista = ["Platanos", "Naranjas", "Uvas", "Mandarinas"];
    return view('estructuras.foreach', compact('lista'));
});

Route::get('categoria', function(){
    return view('categoria');
});

Route::get('contacto', function(){
    return view('contacto');
});

Route::get('probar-conexion', function(){
    try {
        DB::connection()->getPdo();
        return "Conexion a base de datos exitosa";
    } catch (\Exception $e) {
        return "No se puede conectar a la DB <br> Error ".$e->getMessage();
    }
});

// ******   QUERY BUILDER  **** ///

//Obtener Datos
Route::get('query', function(){
    $entradas= DB::table('entradas')->get();
    return $entradas;
});

//Obtener el primer registro
Route::get('find', function(){
    $entradas= DB::table('entradas')->first();
    return $entradas;
});

//Filtrado de datos
Route::get('filtro', function(){
    $entradas= DB::table('entradas')
    ->where('user_id', 1)
    ->where('titulo', 'LIKE', 'a%')
    ->orWhere('titulo', 'LIKE', 'b%')
    ->get();
    return $entradas;
});

//whereNull()
//whereNotNull()
//whereIn()
//whereNotIn()
//whereNotBetween()
//whereBetween()

//Joins con query Builder
Route::get('join',function(){
    $entradas=DB::table('entradas')
    ->join('users', 'entradas.user_id','=','user_id')
    ->select('entradas.id','entradas.titulo','entradas.tag','entradas.iamagen','users.email')->get();
    return $entradas;
});

//leftJoin()
//rightJoin()
//joinWhere()


//Insertar
Route::get('/insert', function(){
    $insertado = DB::table('users')
    ->insert([
        "Name" => "Juan Perez",
        "email" => "juan@correo.com",
        "password" => "Juan"
    ]);
    return $insertado;
});

Route::get('/getId', function(){
    $id = DB::table('users')
    ->insertGetId([
        "Name" => "Juan Perez",
        "email" => "juan2@correo.com",
        "password" => "Juan2"
    ]);
    return $id;
});




