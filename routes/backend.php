<?php

use App\Http\Controllers\Backend\BookingPurposeController;
use App\Http\Controllers\Backend\CarCategoryController;
use App\Http\Controllers\Backend\CarController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\InvestmentController;
use App\Http\Controllers\Backend\InvestorContactPersonController;
use App\Http\Controllers\Backend\InvestorController;
use App\Http\Controllers\Backend\PurchasePaymentController;
use App\Http\Controllers\Backend\SettlementController;
use App\Http\Controllers\Backend\VendorInfoController;
use App\Http\Controllers\Backend\InvoiceController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\CarExpenseController;
use App\Http\Controllers\Backend\ExpenseCategoryController;
use App\Http\Controllers\Backend\PaymentMethodController;
use App\Http\Controllers\Backend\PdfController;
use App\Http\Controllers\Backend\PurchaseOrderController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BookingController;
use App\Http\Livewire\Backend\Customer;
use App\Http\Livewire\Backend\Dashboard;
use App\Http\Livewire\Backend\ExpenseBudget;
use App\Http\Livewire\Backend\Invoice;
use App\Http\Livewire\Backend\Pos;
use App\Http\Livewire\Backend\PurchaseOrder;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
*/

// Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('dashboard', Dashboard::class)->middleware(['auth'])->name('dashboard');
Route::group(['as' => 'backend.', 'prefix' => 'backend/', 'middleware' => 'auth'], function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'update']);
    Route::resource('investor', InvestorController::class);
    Route::resource('investment', InvestmentController::class);
    Route::resource('investorContactPerson', InvestorContactPersonController::class);
    Route::resource('settlement', SettlementController::class);
    Route::resource('vendorInfo', VendorInfoController::class);
    Route::resource('carCategory', CarCategoryController::class);
    Route::resource('car', CarController::class);
    Route::resource('expense', ExpenseController::class);
    Route::resource('expenseCategory', ExpenseCategoryController::class);
    Route::resource('carExpense', CarExpenseController::class);
    Route::resource('purchasePayment', PurchasePaymentController::class);
    Route::resource('bookingPurpose', BookingPurposeController::class);
    Route::get('purchase-payment/{car}', [PurchasePaymentController::class, 'purchasePayment'])->name('purchasePayment');
    Route::get('pdf/{invoice}', [PdfController::class, 'show'])->name('pdf');
    Route::get('delivery-challan', [InvoiceController::class, 'deliveryChallan'])->name('delivery-challan.index');
    Route::get('delivery-challan/{invoice}', [InvoiceController::class, 'deliveryChallanShow'])->name('delivery-challan.show');
    Route::get('/ajax/get-items-by-category/{category}', [ InvoiceController::class, 'searchByCategory']);
    Route::resource('paymentMethod', PaymentMethodController::class);
    Route::resource('purchaseOrder', PurchaseOrderController::class);

    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('settings', [SettingsController::class, 'update']);
    Route::resource('booking', BookingController::class);
    Route::resource('user', UserController::class);
    Route::get('/report', [DashboardController::class, 'indexReport'])->name('report.index');
    Route::post('/report', [DashboardController::class, 'storeReport'])->name('report.store');

    // Livewire
    Route::get('pos', Pos::class)->name('pos'); //Livewire
    Route::get('invoice', Invoice::class)->name('invoice'); //Livewire
    Route::get('customer', Customer::class)->name('customer'); //Livewire
    Route::get('expense-budget', ExpenseBudget::class)->name('expense-budget'); //Livewire
    Route::get('purchase-order', PurchaseOrder::class)->name('purchase-order'); //Livewire

});
