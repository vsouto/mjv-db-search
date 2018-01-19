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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('companies', 'CompaniesController');

Route::get('/users', 'ProfileController@index')->name('users.index');
Route::get('/users/create', 'ProfileController@create')->name('users.create');
Route::delete('/users/{id}', 'ProfileController@destroy')->name('users.destroy');

/*
Route::get('/seedcompanies', function(){

    
    $faker = Faker\Factory::create();

    for($i=1;$i<=10000;$i++)
    {
        $company = \App\Company::create([
            'title' => $faker->company                 ,
            'firstname' => $faker->firstname,
            'lastname' => $faker->lastname,
            'job_title' => $faker->streetAddress,
            'city' => $faker->city,
            'industry' => 'Automóveis',
            'email' => $faker->email,
            'linkedin' => $faker->url,
            'nome_planilha' => 'Brazil - Capital',
            'hardbounce' => '0',
        ]);

        echo "{$i} - {$company->title}<br />";
    }
});
*/