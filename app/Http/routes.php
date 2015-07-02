<?php

//PROJETO
Route::pattern('id', '[0-9]+');

Route::group(['prefix'=>'admin'], function(){
    //Categorias
    Route::group(['prefix'=>'categories'], function() {
        //Lista
        Route::get('/', ['as'=>'AdminCategories','uses' => 'AdminCategoriesController@index']);
        //Cria
        Route::get('create', ['as'=>'AdminCategories_create','uses' => 'AdminCategoriesController@create']);
        Route::post('store', ['as'=>'AdminCategories_store','uses' => 'AdminCategoriesController@store']);
        //Edita
        Route::get('edit/{id}', ['as'=>'AdminCategories_edit','uses' => 'AdminCategoriesController@edit']);
        Route::put('update', ['as'=>'AdminCategories_update','uses' => 'AdminCategoriesController@update']);
        //Deleta
        Route::delete('delete/{id}', ['as'=>'AdminCategories_destroy','uses' => 'AdminCategoriesController@destroy']);
        //Mostra
        Route::get('show/{id}', ['as'=>'AdminCategories_show','uses' => 'AdminCategoriesController@show']);
    });

    //Produtos
    Route::group(['prefix'=>'products'], function() {
        //Lista
        Route::get('/', ['as'=>'AdminProducts','uses' => 'AdminProductsController@index']);
        //Cria
        Route::get('create', ['as'=>'AdminProducts_create','uses' => 'AdminProductsController@create']);
        Route::post('store', ['as'=>'AdminProducts_store','uses' => 'AdminProductsController@store']);
        //Edita
        Route::get('edit/{id}', ['as'=>'AdminProducts_edit','uses' => 'AdminProductsController@edit']);
        Route::put('update', ['as'=>'AdminProducts_update','uses' => 'AdminProductsController@update']);
        //Deleta
        Route::delete('delete/{id}', ['as'=>'AdminProducts_destroy','uses' => 'AdminProductsController@destroy']);
        //Mostra
        Route::get('show/{id}', ['as'=>'AdminProducts_show','uses' => 'AdminProductsController@show']);
    });
});

//ESTUDOS
Route::get('/categories', 'CategoriesController@index');

Route::get('/categories/create', 'CategoriesController@create');
Route::post('/categories', 'CategoriesController@store');




Route::get('/', 'WelcomeController@index');

Route::get('exemplo', 'WelcomeController@exemplo');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//Passando model na rota - É necessário configurar o método boot da classe /Providers/RouteServiceProvider.php
/*Route::get('category/{category}', function(\CodeCommerce\Category $category) {
    return $category->name;
});*/

//Rotas Agrupadas
/*Route::group(['prefix'=>'admin'], function() {
   Route::get('produtos', function() {
       return 'Produtos';
   });
});*/

//Nomeando rotas
/*Route:get('produtos-legais', ['as'=>'produtos', function() {
    echo Route::currentRouteName(); //Helper retorna a rota acessada

    return "Produtos";
}]);
redirect()->route('produtos'); //helper para redirecionamento
echo route('produtos'); //Helper para gerar rota

die(;*/

//Passando parâmetro
/*Route::get('user/{id?}', function($id = "0") { //{id} = obrigatório, {id?} = não obrigatório
    return "Olá ". $id;
});*/
/*Route::get('user/{id}', function($id) { //Validando valor do parametro
    return "Olá ". $id;
})->where('id', '[0-9]+');*/

/*Route::pattern('id', '[0-9]+'); //Validando valor do parametro com pattern
Route::get('user/{id}', function($id) {
    return "Olá ". $id;
});*/

//Qualquer método
/*Route::any('/exemplo2', function() {
    return 'Teste';
});*/

//Especificar mais de um método
/*Route::match(['get', 'post'], '/exemplo2', function() {
    return 'Teste';
});*/

//Method spoofing
/*<form action="#" method="POST">
   <input type="hidden" name="_method" value="PUT">
</form>*/
