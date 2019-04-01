<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('question', QuestionController::class);
    $router->resource('question-option', QuestionOptionController::class);
    $router->resource('setting', SettingController::class);
    $router->resource('answer', AnswerController::class);
    $router->resource('footer-menu', FooterMenuPageController::class);
    $router->resource('ebook', EbookController::class);
    
    $router->get('survey-answer/{id}', 'AnswerController@answer_by_zipcode')->name('answer');
});
