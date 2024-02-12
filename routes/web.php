<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Content\BannerController;
use App\Http\Controllers\Admin\Content\CommentController;
use App\Http\Controllers\Admin\Content\FAQController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\admin\content\PageController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\admin\notify\EmailController;
use App\Http\Controllers\Admin\Notify\EmailFileController;
use App\Http\Controllers\admin\notify\SMSController;
use App\Http\Controllers\admin\setting\SettingController;
use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\admin\ticket\TicketController;
use App\Http\Controllers\Admin\Ticket\TicketPriorityController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\admin\user\PermissionController;
use App\Http\Controllers\admin\user\RoleController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');


//    Route::prefix('user')->namespace('User')->group(function () {
//
//        //admin-user
//        Route::prefix('admin-user')->group(function () {
//            Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.admin-user.index');
//            Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.admin-user.create');
//            Route::post('/store', [AdminUserController::class, 'store'])->name('admin.user.admin-user.store');
//            Route::get('/edit/{admin}', [AdminUserController::class, 'edit'])->name('admin.user.admin-user.edit');
//            Route::put('/update/{admin}', [AdminUserController::class, 'update'])->name('admin.user.admin-user.update');
//            Route::delete('/destroy/{admin}', [AdminUserController::class, 'destroy'])->name('admin.user.admin-user.destroy');
//            Route::get('/status/{user}', [AdminUserController::class, 'status'])->name('admin.user.admin-user.status');
//            Route::get('/activation/{user}', [AdminUserController::class, 'activation'])->name('admin.user.admin-user.activation');
//            Route::get('/roles/{admin}', [AdminUserController::class, 'roles'])->name('admin.user.admin-user.roles');
//            Route::post('/roles/{admin}/store', [AdminUserController::class, 'rolesStore'])->name('admin.user.admin-user.roles.store');
//            Route::get('/permissions/{admin}', [AdminUserController::class, 'permissions'])->name('admin.user.admin-user.permissions');
//            Route::post('/permissions/{admin}/store', [AdminUserController::class, 'permissionsStore'])->name('admin.user.admin-user.permissions.store');
//        });
//
//
//        //role
//        Route::prefix('role')->group(function () {
//            Route::get('/', [RoleController::class, 'index'])->name('admin.user.role.index');
//            Route::get('/create', [RoleController::class, 'create'])->name('admin.user.role.create');
//            Route::post('/store', [RoleController::class, 'store'])->name('admin.user.role.store');
//            Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('admin.user.role.edit');
//            Route::put('/update/{role}', [RoleController::class, 'update'])->name('admin.user.role.update');
//            Route::delete('/destroy/{role}', [RoleController::class, 'destroy'])->name('admin.user.role.destroy');
//            Route::get('/permission-form/{role}', [RoleController::class, 'permissionForm'])->name('admin.user.role.permission-form');
//            Route::put('/permission-update/{role}', [RoleController::class, 'permissionUpdate'])->name('admin.user.role.permission-update');
//        });
//
//        //permission
//        Route::prefix('permission')->group(function () {
//            Route::get('/', [PermissionController::class, 'index'])->name('admin.user.permission.index');
//            Route::get('/create', [PermissionController::class, 'create'])->name('admin.user.permission.create');
//            Route::post('/store', [PermissionController::class, 'store'])->name('admin.user.permission.store');
//            Route::get('/edit/{permission}', [PermissionController::class, 'edit'])->name('admin.user.permission.edit');
//            Route::put('/update/{permission}', [PermissionController::class, 'update'])->name('admin.user.permission.update');
//            Route::delete('/destroy/{permission}', [PermissionController::class, 'destroy'])->name('admin.user.permission.destroy');
//        });
//    });
//
//    Route::prefix('notify')->namespace('Notify')->group(function () {
//
//        //email
//        Route::prefix('email')->group(function () {
//            Route::get('/', [EmailController::class, 'index'])->name('admin.notify.email.index');
//            Route::get('/create', [EmailController::class, 'create'])->name('admin.notify.email.create');
//            Route::post('/store', [EmailController::class, 'store'])->name('admin.notify.email.store');
//            Route::get('/edit/{email}', [EmailController::class, 'edit'])->name('admin.notify.email.edit');
//            Route::put('/update/{email}', [EmailController::class, 'update'])->name('admin.notify.email.update');
//            Route::delete('/destroy/{email}', [EmailController::class, 'destroy'])->name('admin.notify.email.destroy');
//            Route::get('/status/{email}', [EmailController::class, 'status'])->name('admin.notify.email.status');
//        });
//
//        //email file
//        Route::prefix('email-file')->group(function () {
//            Route::get('/{email}', [EmailFileController::class, 'index'])->name('admin.notify.email-file.index');
//            Route::get('/{email}/create', [EmailFileController::class, 'create'])->name('admin.notify.email-file.create');
//            Route::post('/{email}/store', [EmailFileController::class, 'store'])->name('admin.notify.email-file.store');
//            Route::get('/edit/{file}', [EmailFileController::class, 'edit'])->name('admin.notify.email-file.edit');
//            Route::put('/update/{file}', [EmailFileController::class, 'update'])->name('admin.notify.email-file.update');
//            Route::delete('/destroy/{file}', [EmailFileController::class, 'destroy'])->name('admin.notify.email-file.destroy');
//            Route::get('/status/{file}', [EmailFileController::class, 'status'])->name('admin.notify.email-file.status');
//        });
//
//        //sms
//        Route::prefix('sms')->group(function () {
//            Route::get('/', [SMSController::class, 'index'])->name('admin.notify.sms.index');
//            Route::get('/create', [SMSController::class, 'create'])->name('admin.notify.sms.create');
//            Route::post('/store', [SMSController::class, 'store'])->name('admin.notify.sms.store');
//            Route::get('/edit/{sms}', [SMSController::class, 'edit'])->name('admin.notify.sms.edit');
//            Route::put('/update/{sms}', [SMSController::class, 'update'])->name('admin.notify.sms.update');
//            Route::delete('/destroy/{sms}', [SMSController::class, 'destroy'])->name('admin.notify.sms.destroy');
//            Route::get('/status/{sms}', [SMSController::class, 'status'])->name('admin.notify.sms.status');
//        });
//    });
//
//    Route::prefix('ticket')->namespace('Ticket')->group(function () {
//
//        //category
//        Route::prefix('category')->group(function () {
//            Route::get('/', [TicketCategoryController::class, 'index'])->name('admin.ticket.category.index');
//            Route::get('/create', [TicketCategoryController::class, 'create'])->name('admin.ticket.category.create');
//            Route::post('/store', [TicketCategoryController::class, 'store'])->name('admin.ticket.category.store');
//            Route::get('/edit/{ticketCategory}', [TicketCategoryController::class, 'edit'])->name('admin.ticket.category.edit');
//            Route::put('/update/{ticketCategory}', [TicketCategoryController::class, 'update'])->name('admin.ticket.category.update');
//            Route::delete('/destroy/{ticketCategory}', [TicketCategoryController::class, 'destroy'])->name('admin.ticket.category.destroy');
//            Route::get('/status/{ticketCategory}', [TicketCategoryController::class, 'status'])->name('admin.ticket.category.status');
//        });
//
//        //priority
//        Route::prefix('priority')->group(function () {
//            Route::get('/', [TicketPriorityController::class, 'index'])->name('admin.ticket.priority.index');
//            Route::get('/create', [TicketPriorityController::class, 'create'])->name('admin.ticket.priority.create');
//            Route::post('/store', [TicketPriorityController::class, 'store'])->name('admin.ticket.priority.store');
//            Route::get('/edit/{ticketPriority}', [TicketPriorityController::class, 'edit'])->name('admin.ticket.priority.edit');
//            Route::put('/update/{ticketPriority}', [TicketPriorityController::class, 'update'])->name('admin.ticket.priority.update');
//            Route::delete('/destroy/{ticketPriority}', [TicketPriorityController::class, 'destroy'])->name('admin.ticket.priority.destroy');
//            Route::get('/status/{ticketPriority}', [TicketPriorityController::class, 'status'])->name('admin.ticket.priority.status');
//        });
//
//        //admin
//        Route::prefix('admin')->group(function () {
//            Route::get('/', [TicketAdminController::class, 'index'])->name('admin.ticket.admin.index');
//            Route::get('/set/{admin}', [TicketAdminController::class, 'set'])->name('admin.ticket.admin.set');
//        });
//
//        //main
//        Route::get('/', [TicketController::class, 'index'])->name('admin.ticket.index');
//        Route::get('/new-tickets', [TicketController::class, 'newTickets'])->name('admin.ticket.newTickets');
//        Route::get('/open-tickets', [TicketController::class, 'openTickets'])->name('admin.ticket.openTickets');
//        Route::get('/close-tickets', [TicketController::class, 'closeTickets'])->name('admin.ticket.closeTickets');
//        Route::get('/show/{ticket}', [TicketController::class, 'show'])->name('admin.ticket.show');
//        Route::post('/answer/{ticket}', [TicketController::class, 'answer'])->name('admin.ticket.answer');
//        Route::get('/change/{ticket}', [TicketController::class, 'change'])->name('admin.ticket.change');
//    });
//
//    Route::prefix('setting')->namespace('Setting')->group(function () {
//
//        Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
//        Route::get('/edit/{setting}', [SettingController::class, 'edit'])->name('admin.setting.edit');
//        Route::put('/update/{setting}', [SettingController::class, 'update'])->name('admin.setting.update');
//        Route::delete('/destroy/{setting}', [SettingController::class, 'destroy'])->name('admin.setting.destroy');
//    });
//
//    Route::post('/notification/read-all', [NotificationController::class, 'readAll'])->name('admin.notification.readAll');
//});
