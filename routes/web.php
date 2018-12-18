<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/autocomplete', 'AutocompleteController@index');
Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');


Route::get('/', 'ClientsController\IndexController@getIndex')->name('index');

/*Catalog Routes*/
//Route::get('catalog/{slug}', 'ClientsController\CatalogController@getCatalog')->name('catalog');
//Route::get('catalog/{slug}/{subslug}', 'ClientsController\CatalogController@getSubCatalog')->name('subCatalog');


/*Product Routes*/
Route::get('get/product/{id}', 'ClientsController\ProductController@getProductNoURL')->name('productNoURL');
//Route::get('catalog/{slug}/{subslug}/{product}', 'ClientsController\ProductController@getProduct')->name('product');


/*Basket Routes*/
Route::put('basket/add/{id}', 'ClientsController\BasketController@addToBasket');
Route::put('basket/update/{id}', 'ClientsController\BasketController@updateBasket');
Route::delete('basket/delete/{id}', 'ClientsController\BasketController@deleteItemBasket');

/*Ordering*/
Route::get('/ordering', 'ClientsController\OrderingController@getOrdering')->name('ordering');
Route::post('/ordering/buy', 'ClientsController\OrderingController@orderBuy');

Route::get('/contacts', 'ClientsController\IndexController@getContacts')->name('contacts');
Route::get('/blog', 'ClientsController\IndexController@getBlog')->name('blog');
Route::get('/income', 'ClientsController\IndexController@getIncome')->name('income');
//Route::get('/section', 'ClientsController\IndexController@getSection')->name('section');
//Route::get('/article', 'ClientsController\IndexController@getArticle')->name('article');
// Route::get('/article/{slug}', 'ClientsController\IndexController@getArticle')->name('article');
Route::get('/stock', 'ClientsController\IndexController@getStock')->name('stock');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();


    // Update currency rate
    Route::get('/currency_update', 'Voyager\CurrenciesController@currencyUpdate');
    // Update prices
    Route::get('/prices_update', 'Voyager\CurrenciesController@pricesUpdate');

    //expand categories as tree
    Route::post('treeajax', 'Voyager\CategoriesController@showsecond');

    //expand articles categories as tree
    Route::post('treeajax_articles', 'Voyager\ArticlesCategoriesController@showsecond');

    ////////////abanners
    Route::put('banner/{id}/save', [
        'uses' => 'Voyager\AdminBannerController@storeBanner',
        'as'   => 'admin.banner.save'
    ]);
    Route::post('banner/save', [
        'uses' => 'Voyager\AdminBannerController@storeBanner',
        'as'   => 'admin.banner.store'
    ]);
  /*  Route::post('attribute_values/save', [
        'uses' => 'Voyager\AttributeValuesController@store',
        'as'   => 'voyager.attribute-values.store'
    ]);*/

  Route::post('/get_attributes_id','Voyager\AttributeController@getAttribValues');



/*Product Characteristics*/
   Route::get('/product-characteristics', 'Voyager\CharacteristicsController@showList')->name('voyager.product-characteristics.index');

   /*AJAX*/
   Route::get('/get/categories', 'Voyager\CharacteristicsController@getCategories');
   Route::post('/add/characteristic', 'Voyager\CharacteristicsController@addCharacteristic');
   Route::put('/edit/characteristic/{id}', 'Voyager\CharacteristicsController@editCharacteristic');
   Route::delete('/delete/characteristic/{id}', 'Voyager\CharacteristicsController@deleteCharacteristic');
   Route::get('/get/characteristic/{id}', 'Voyager\CharacteristicsController@getcharacteristic');

   //options for table in product card
   Route::post('characteristics_options', 'Voyager\CharacteristicsController@addCharacteristicOptions')->name('char_opt');

   //night manager
   Route::post('add_night_manager', 'Voyager\ManagerController@addNightManager')->name('night_manager');

   /*In product*/

   Route::get('/get/characteristic', 'Voyager\CharacteristicsController@getSelectCharacteristic');
/*END Product Characteristics*/


   
});

Auth::routes();
Route::get('/account', 'Account\AccountController@index')->name('account');

Route::post('/account/savepersonal','Account\AccountController@store')->name('saveUserPersonal');
Route::post('/account/saveuserpassword','Account\AccountController@storePassword')->name('saveUserPassword');

// Ecommerce Routes
Route::get('/{slug}', 'ClientsController\CatalogController@getSlug')->name('catalog');
Route::get('/{slug}/{subslug}', 'ClientsController\CatalogController@getSlug')->name('subCatalog');
Route::get('/{slug}/{subslug}/{product}', 'ClientsController\CatalogController@getSlug')->name('product');;


