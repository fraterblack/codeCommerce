<?php

//PROJETO
Route::pattern('id', '[0-9]+');

Route::group(['prefix'=>'admin'], function(){
    //Categorias
    Route::group(['prefix'=>'categories'], function() {
        //Lista
        Route::get('', ['as'=>'admin.categories', 'uses' => 'AdminCategoriesController@index']);
        //Cria
        Route::get('create', ['as'=>'admin.categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::post('', ['as'=>'admin.categories.store', 'uses' => 'AdminCategoriesController@store']);
        //Edita
        Route::get('{id}/edit', ['as'=>'admin.categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('{id}/update', ['as'=>'admin.categories.update', 'uses' => 'AdminCategoriesController@update']);
        //Deleta
        Route::get('{id}/destroy', ['as'=>'admin.categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
        //Mostra
        Route::get('{id}/show', ['as'=>'admin.categories.show', 'uses' => 'AdminCategoriesController@show']);
    });

    //Produtos
    Route::group(['prefix'=>'products'], function() {
        //Lista
        Route::get('', ['as'=>'admin.products', 'uses' => 'AdminProductsController@index']);
        //Cria
        Route::get('create', ['as'=>'admin.products.create', 'uses' => 'AdminProductsController@create']);
        Route::post('', ['as'=>'admin.products.store', 'uses' => 'AdminProductsController@store']);
        //Edita
        Route::get('{id}/edit', ['as'=>'admin.products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('{id}/update', ['as'=>'admin.products.update', 'uses' => 'AdminProductsController@update']);
        //Deleta
        Route::get('{id}/destroy', ['as'=>'admin.products.destroy', 'uses' => 'AdminProductsController@destroy']);
        //Mostra
        Route::get('{id}/show', ['as'=>'admin.products.show', 'uses' => 'AdminProductsController@show']);
    });
});

//ESTUDOS
Route::get('/categories', ['as' => 'categories', 'uses' => 'CategoriesController@index']);

Route::get('/categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
Route::post('/categories', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);

Route::get('/categories/{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
Route::put('/categories/{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);

Route::get('/categories/{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);


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
