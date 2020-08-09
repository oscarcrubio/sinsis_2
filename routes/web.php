<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', array('as' => 'home', 'uses' => 'MainController@index'));
Route::get('/contacto', array('as' => 'contact', 'uses' => 'MainController@contact'));
Route::get('/nosotros', array('as' => 'nosotros', 'uses' => 'MainController@nosotros'));
Route::get('/login', array('as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm'));
Route::post('/login', array('as' => 'login', 'uses' => 'Auth\LoginController@login'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'Auth\LoginController@logout'));

/*
**
* Admin Routes
**
*/

Route::group(
    [
        'prefix' => 'admin'
    ],
    function () {
        Route::get('/', array('as' => 'admin', 'uses' => 'AdminController@dashboard'));
        Route::get('create-zip/{project_id}', array('as' => 'create-zip', 'uses' => 'CreateZipController@index'));
        Route::get('create-zip/{project_id}/{proposal_id}', array('as' => 'create-zip-proposal', 'uses' => 'CreateZipController@index'));
        Route::group(
            [
                'prefix' => 'project'
            ],
            function () {
                Route::get('/', array('as' => 'projects', 'uses' => 'AdminController@indexProject'));
                Route::get('/create', array('as' => 'create-project', 'uses' => 'AdminController@createProject'));
                Route::post('/create', array('as' => 'create-project', 'uses' => 'AdminController@createProject'));
                Route::get('/{project_name}', array('as' => 'set-project-view', 'uses' => 'AdminController@setProject'));
                Route::post('/users', array('as' => 'set-user-project', 'uses' => 'ProjectController@setUser'));
                Route::get('/{project_name}/proposals', array('as' => 'proposals', 'uses' => 'AdminController@indexProposals'));
                Route::get('/{project_name}/diagnostics', array('as' => 'diagnostics', 'uses' => 'AdminController@indexDiagnostics'));
                Route::post('/change-status', array('as' => 'change-status', 'uses' => 'AdminController@changeProjectStatus'));
            }
        );


        Route::group(
            [
                'prefix' => 'enterview'
            ],
            function () {
                Route::get('/', array('as' => 'enterview', 'uses' => 'AdminController@indexEnterview'));
                Route::get('/create/{project_id}', array('as' => 'create-enterview-project', 'uses' => 'AdminController@createEnterview'));
                Route::post('/create', array('as' => 'create-enterview', 'uses' => 'AdminController@createEnterview'));
            }
        );

        Route::group(
            [
                'prefix' => 'user'
            ],
            function () {
                Route::get('/', array('as' => 'user', 'uses' => 'AdminController@indexUser'));
                Route::get('/create', array('as' => 'create-user', 'uses' => 'AdminController@createUser'));
                Route::post('/create', array('as' => 'create-user', 'uses' => 'AdminController@createUser'));
                Route::get('/{user_id}/projects', array('as' => 'user-projects', 'uses' => 'AdminController@getProjectsbyUser'));

            }
        );

        Route::group(
            [
                'prefix' => 'diagnostics'
            ],
            function () {                
                Route::get('/create/{project_id}', array('as' => 'create-diagnostics', 'uses' => 'AdminController@createDiagnostics'));
                Route::post('store', array('as' => 'store-diagnostics', 'uses' => 'AdminController@storeDiagnostics'));
                Route::get('download/{pdf_file}', array('as' => 'download-diagnostics', 'uses' => 'AdminController@downloadDiagnostics'));
            }
        );

        Route::group(
            [
                'prefix' => 'enterprise'
            ],
            function () {
                Route::get('/', array('as' => 'enterprise', 'uses' => 'AdminController@indexEnterprise'));
                Route::get('/create', array('as' => 'create-enterprise', 'uses' => 'AdminController@createEnterprise'));
                Route::post('/create', array('as' => 'create-enterprise', 'uses' => 'AdminController@createEnterprise'));
                Route::get('/{enterprise_name}/projects', array('as' => 'enterprise-projects', 'uses' => 'AdminController@getProjectsbyEnterprise'));
            }
        );

        Route::group(
            [
                'prefix' => 'proposals'
            ],
            function () {               
                Route::get('create/{project_id}', array('as' => 'create-proposals', 'uses' => 'DropzoneController@createProposals'));
                Route::post('create/upload', array('as' => 'create-upload', 'uses' => 'DropzoneController@upload'));
                Route::post('create', array('as' => 'proposal-create', 'uses' => 'DropzoneController@create'));
            }
        );

        Route::group(
            [
                'prefix' => 'clientv'
            ],
            function () {                
                Route::get('project/{project_slug} )', array('as' => 'indexClientsv', 'uses' => 'AdminController@indexClientsv'));
            }
        );
    }
);