<?php

use App\Models\User;
use App\Models\Address;
use App\Models\Company;
use App\Models\Country;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Storage;
use App\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Address\AddressResource;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\Permission\PermissionCollection;

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
    return view('app');
});




Route::get('/test', function () {
    // return $x = User::with('permissions')->get();
    // $p = Permission::create(['name' => 'users.view.2', 'display_name' => 'acceso a ver su propio usuario']);
    // $p = Permission::find(1);
    // $u = User::find(2);
    // return $u->permissions()->get();
    // $r = Role::find(2);
    return User::find(1);
});

Route::get('/{vue?}', function () {
    return view('app');
})->where('vue', '[\/\w\.-]*')->name('home');
