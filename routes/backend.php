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
use App\Http\Livewire\Backend\CarDetails;
use App\Http\Livewire\Backend\Customer;
use App\Http\Livewire\Backend\Dashboard;
use App\Http\Livewire\Backend\ExpenseBudget;
use App\Http\Livewire\Backend\Invoice;
use App\Http\Livewire\Backend\InvoiceDetails;
use App\Http\Livewire\Backend\PermissionManagement;
use App\Http\Livewire\Backend\Pos;
use App\Http\Livewire\Backend\PurchaseOrder;
use App\Http\Livewire\Backend\Report;
use App\Http\Livewire\Backend\Video;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
*/

Route::get('dashboard', Dashboard::class)->middleware(['auth'])->name('dashboard');
Route::group(['as' => 'backend.', 'prefix' => 'backend/', 'middleware' => 'auth'], function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile')->middleware(['permission:profile']);
    Route::post('profile', [ProfileController::class, 'update'])->middleware(['permission:profile']);
    Route::resource('investor', InvestorController::class)->middleware(['permission:investor']);
    Route::resource('investment', InvestmentController::class)->middleware(['permission:investment']);
    Route::resource('investorContactPerson', InvestorContactPersonController::class)->middleware(['permission:investor-contact-person']);
    Route::resource('settlement', SettlementController::class)->middleware(['permission:settlement']);
    Route::resource('vendorInfo', VendorInfoController::class)->middleware(['permission:vendor-info']);
    Route::resource('carCategory', CarCategoryController::class)->middleware(['permission:car-category']);
    Route::resource('car', CarController::class)->middleware(['permission:car']);
    Route::resource('expense', ExpenseController::class)->middleware(['permission:expense']);
    Route::resource('expenseCategory', ExpenseCategoryController::class)->middleware(['permission:expense-category']);
    Route::resource('carExpense', CarExpenseController::class)->middleware(['permission:car-expense']);
    Route::resource('purchasePayment', PurchasePaymentController::class)->middleware(['permission:purchase-payment']);
    Route::resource('bookingPurpose', BookingPurposeController::class)->middleware(['permission:booking-purpose']);
    Route::get('purchase-payment/{car}', [PurchasePaymentController::class, 'purchasePayment'])->name('purchasePayment')->middleware(['permission:purchase-payment']);
    Route::get('pdf/{invoice}', [PdfController::class, 'show'])->name('pdf')->middleware(['permission:pdf']);
    Route::get('delivery-challan', [InvoiceController::class, 'deliveryChallan'])->name('delivery-challan.index')->middleware(['permission:delivery-challan']);
    Route::get('delivery-challan/{invoice}', [InvoiceController::class, 'deliveryChallanShow'])->name('delivery-challan.show')->middleware(['permission:delivery-challan']);
    Route::get('/ajax/get-items-by-category/{category}', [InvoiceController::class, 'searchByCategory'])->middleware(['permission:search-by-category']);
    Route::resource('paymentMethod', PaymentMethodController::class)->middleware(['permission:payment-method']);
    Route::resource('purchaseOrder', PurchaseOrderController::class)->middleware(['permission:purchase-order']);

    Route::get('settings', [SettingsController::class, 'index'])->name('settings')->middleware(['permission:settings']);
    Route::post('settings', [SettingsController::class, 'update'])->middleware(['permission:settings']);
    Route::resource('booking', BookingController::class)->middleware(['permission:booking']);
    Route::resource('user', UserController::class)->middleware(['permission:user']);
    // Route::get('/report', [DashboardController::class, 'indexReport'])->name('report.index');
    // Route::post('/report', [DashboardController::class, 'storeReport'])->name('report.store');

    // Livewire
    Route::get('pos', Pos::class)->name('pos')->middleware(['permission:pos']); //Livewire
    Route::get('invoice', Invoice::class)->name('invoice')->middleware(['permission:invoice']); //Livewire
    Route::get('invoice/details/{invoice}', InvoiceDetails::class)->name('invoice.details')->middleware(['permission:invoice']); //Livewire
    Route::get('car/details/{car}', CarDetails::class)->name('car.details')->middleware(['permission:car']); //Livewire
    Route::get('customer', Customer::class)->name('customer')->middleware(['permission:customer']); //Livewire
    Route::get('expense-budget', ExpenseBudget::class)->name('expense-budget')->middleware(['permission:expense-budget']); //Livewire
    Route::get('purchase-order', PurchaseOrder::class)->name('purchase-order')->middleware(['permission:purchase-order']); //Livewire
    Route::get('report', Report::class)->name('report')->middleware(['permission:report']); //Livewire
    Route::get('video', Video::class)->name('video')->middleware(['permission:video']); //Livewire
    Route::get('permission-management', PermissionManagement::class)->name('permission-management')->middleware(['permission:permission-management']);
});
