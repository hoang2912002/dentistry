<?php

use App\Http\Controllers\AdminController\BillController;
use App\Http\Controllers\AdminController\BookController;
use App\Http\Controllers\AdminController\BookDetailController;
use App\Http\Controllers\AdminController\GroupController;
use App\Http\Controllers\AdminController\HomepageAdminController;
use App\Http\Controllers\AdminController\LoginController;
use App\Http\Controllers\AdminController\ManufacturerController;
use App\Http\Controllers\AdminController\MedicineController;
use App\Http\Controllers\AdminController\PrescriptionController;
use App\Http\Controllers\AdminController\PrescriptionDetailController;
use App\Http\Controllers\AdminController\RoleController;
use App\Http\Controllers\AdminController\RoomController;
use App\Http\Controllers\AdminController\ServiceController;
use App\Http\Controllers\AdminController\ShiftController;
use App\Http\Controllers\AdminController\TypeOfMedicineController;
use App\Http\Controllers\AdminController\UserController;
use App\Http\Controllers\CustomerController\AppointmentController;
use App\Http\Controllers\CustomerController\CustomerLoginController;
use App\Http\Controllers\CustomerController\DentistController;
use App\Http\Controllers\CustomerController\DoctorController;
use App\Http\Controllers\CustomerController\HomepageController;
use App\Http\Controllers\CustomerController\LoginController as CustomerControllerLoginController;
use App\Http\Controllers\CustomerController\LoginCustomerController;
use App\Http\Controllers\CustomerController\ServiceController as CustomerControllerServiceController;
use App\Http\Controllers\CustomerController\ServiceDetailController;
use App\Http\Middleware\CheckCustomerLogin;
use App\Http\Middleware\CheckLoginAdminPage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['controller' =>   LoginController::class, 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'login')->name('login');
    Route::post('process', 'processLogin')->name('processLogin');
    Route::get('logout', 'logout')->name('logout');
});


Route::middleware([CheckLoginAdminPage::class])->group(function(){
    Route::prefix('admin')->group(function(){
        //Homepage
        Route::group(['controller' => HomepageAdminController::class, 'prefix' => 'homepage', 'as' => 'homepage.'], function () {
            Route::get('/', 'index')->name('index');
        });
        //User
        Route::group(['controller' => UserController::class, 'prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{userModel}', 'edit')->name('edit');
            Route::patch('update/{userModel}', 'update')->name('update');
            Route::delete('destroy/{userModel}', 'destroy')->name('destroy');
        });
        //Group
        Route::group(['controller' => GroupController::class, 'prefix' => 'group', 'as' => 'group.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{groupModel}', 'edit')->name('edit');
            Route::patch('update/{groupModel}', 'update')->name('update');
            Route::delete('destroy/{groupModel}', 'destroy')->name('destroy');
        });
        //Shift
        Route::group(['controller' => ShiftController::class, 'prefix' => 'shift', 'as' => 'shift.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{shiftModel}', 'edit')->name('edit');
            Route::patch('update/{shiftModel}', 'update')->name('update');
            Route::delete('destroy/{shiftModel}', 'destroy')->name('destroy');
        });
        //Room
        Route::group(['controller' => RoomController::class, 'prefix' => 'room', 'as' => 'room.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{roomModel}', 'edit')->name('edit');
            Route::patch('update/{roomModel}', 'update')->name('update');
            Route::delete('destroy/{roomModel}', 'destroy')->name('destroy');
            
        });
        //Role
        Route::group(['controller' => RoleController::class, 'prefix' => 'role', 'as' => 'role.'], function () {
            Route::get('/', 'index')->name('index');
            Route::post('/api','api')->name('api');
            Route::post('store','store')->name('store');
        });
        //Service
        Route::group(['controller' => ServiceController::class, 'prefix' => 'service', 'as' => 'service.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{serviceModel}', 'edit')->name('edit');
            Route::post('api', 'api')->name('api');
            Route::post('api_service_sku', 'api_service_sku')->name('api_service_sku');
            Route::patch('update/{serviceModel}', 'update')->name('update');
            Route::delete('destroy/{serviceModel}', 'destroy')->name('destroy');
            
        });
        //Type of medicines
        Route::group(['controller' => TypeOfMedicineController::class, 'prefix' => 'typeOfMedicine', 'as' => 'typeOfMedicine.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{typeOfMedicineModel}', 'edit')->name('edit');
            Route::patch('update/{typeOfMedicineModel}', 'update')->name('update');
            Route::delete('destroy/{typeOfMedicineModel}', 'destroy')->name('destroy');
            
        });
        //Manufaturer
        Route::group(['controller' => ManufacturerController::class, 'prefix' => 'manufacturer', 'as' => 'manufacturer.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{manufacturerModel}', 'edit')->name('edit');
            Route::patch('update/{manufacturerModel}', 'update')->name('update');
            Route::delete('destroy/{manufacturerModel}', 'destroy')->name('destroy');
            
        });
        //Medicines
        Route::group(['controller' => MedicineController::class, 'prefix' => 'medicine', 'as' => 'medicine.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{medicineModel}', 'edit')->name('edit');
            Route::patch('update/{medicineModel}', 'update')->name('update');
            Route::delete('destroy/{medicineModel}', 'destroy')->name('destroy');
            
        });
        //Bils
        Route::group(['controller' => BillController::class, 'prefix' => 'bill', 'as' => 'bill.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{billModel}', 'edit')->name('edit');
            Route::patch('update/{billModel}', 'update')->name('update');
            Route::delete('destroy/{billModel}', 'destroy')->name('destroy'); 
        });
        //Books
        Route::group(['controller' => BookController::class, 'prefix' => 'book', 'as' => 'book.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{bookModel}', 'edit')->name('edit');
            Route::patch('update/{bookModel}', 'update')->name('update');
            Route::delete('destroy/{bookModel}', 'destroy')->name('destroy'); 
            Route::post('/api','api')->name('api');
        });
        //BookDetail
        Route::group(['controller' => BookDetailController::class, 'prefix' => 'bookdetail', 'as' => 'bookdetail.'], function () {
            Route::get('/{bookModel}', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{bookdetailModel}', 'edit')->name('edit');
            Route::patch('update/{bookdetailModel}', 'update')->name('update');
            Route::delete('destroy/{bookdetailModel}', 'destroy')->name('destroy'); 
        });
        //Prescription
        Route::group(['controller' => PrescriptionController::class, 'prefix' => 'prescription', 'as' => 'prescription.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::post('/api','api')->name('api');
            Route::get('edit/{prescriptionModel}', 'edit')->name('edit');
            Route::patch('update/{prescriptionModel}', 'update')->name('update');
            Route::delete('destroy/{prescriptionModel}', 'destroy')->name('destroy'); 
        });
        //Prescription Detail
        Route::group(['controller' => PrescriptionDetailController::class, 'prefix' => 'prescriptiondetail', 'as' => 'prescriptiondetail.'], function () {
            Route::get('/{prescriptionModel}', 'index')->name('index');
            Route::get('/{prescriptionModel}/pdf', 'export_file_pdf')->name('export_file_pdf');
            
        });
    });
    
});

Route::group(['controller' => LoginCustomerController::class, 'prefix' => 'login', 'as' => 'login.'], function () {
    Route::get('/', 'login')->name('login');
    Route::post('processLogin', 'processLogin')->name('processLogin');
    Route::get('signup', 'signup')->name('signup');
    Route::post('processSignUp', 'processSignUp')->name('processSignUp');
    Route::get('logout', 'logout')->name('logout');
});

//Route::middleware([CheckCustomerLogin::class])->group(function(){
    Route::prefix('/')->group(function(){
        
        Route::group(['controller' => HomepageController::class, 'prefix' => '', 'as' => '.'], function () {
            Route::get('/', 'index')->name('index');
        });
        Route::group(['controller' => DoctorController::class, 'prefix' => 'doctor', 'as' => 'doctor.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{doctorModel}', 'detail')->name('detail');
        });
        Route::group(['controller' => ServiceDetailController::class, 'prefix' => 'service', 'as' => 'service.'], function () {
            Route::get('/', 'service')->name('service');
            Route::get('/{serviceDetailModel}', 'serviceDetail')->name('serviceDetail');
           
        });
        Route::group(['controller' => DentistController::class, 'prefix' => 'dentist', 'as' => 'dentist.'], function () {
            Route::get('/', 'dentist')->name('dentist');
            Route::get('/{dentistDetailModel}', 'dentistDetail')->name('dentistDetail');
           
        });
       
        Route::group(['controller' => AppointmentController::class, 'prefix' => 'appointment', 'as' => 'appointment.'], function () {
            Route::get('/', 'index')->name('index'); 
            Route::post('store', 'store')->name('store');
        });
        Route::group(['controller' => AppointmentController::class, 'prefix' => 'appointment', 'as' => 'appointment.'], function () {
            Route::get('/', 'index')->name('index'); 
            Route::post('store', 'store')->name('store');
        });

    });
//});