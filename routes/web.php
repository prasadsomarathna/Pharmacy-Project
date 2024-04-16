<?php

use Illuminate\Support\Facades\Route;

Auth::routes();


Auth::routes(['verify' => true]);
Route::get('/','HomeController@AllLinks')->middleware('verified');

Route::get('/','HomeController@AllLinks')->name('admin')->middleware('admin');

//Route for the Rider Skimming function
Route::get('/Cashier/Skimming','CashierController\RiderSkimmingController@index')->name('auth')->middleware('auth');
Route::post('/Cashier/skimmingDataStore','CashierController\RiderSkimmingController@skimmingDataStore')->name('RiderSkimmingController.skimmingDataStore')->middleware('auth');
Route::post('/Cashier/removeSkimmingData','CashierController\RiderSkimmingController@removeSkimmingData')->name('RiderSkimmingController.removeSkimmingData')->middleware('auth');

//Route for the Rider Cash Float function
Route::get('/Cashier/CashFloat','CashierController\CashFloatController@index')->name('auth')->middleware('auth');
Route::post('/Cashier/cashFloatDataStore','CashierController\CashFloatController@cashFloatDataStore')->name('CashFloatController.cashFloatDataStore')->middleware('auth');
Route::post('/Cashier/removeCashFloatData','CashierController\CashFloatController@removeCashFloatData')->name('CashFloatController.removeCashFloatData')->middleware('auth');

//Send Sms bill in first stage
Route::post('/Cashier/SendBillInFirstStage','CashierController\cashierModuleController@sendSmsBillInFirstStage')->name('cashierModuleController.sendSmsBillInFirstStage')->middleware('auth');

Route::post('/Cashier/SendBillInFirstStageTwo','CashierController\cashierModuleController@sendSmsBillInFirstStageTwo')->name('cashierModuleController.sendSmsBillInFirstStageTwo')->middleware('auth');

//Route for the Cashiering function

Route::get('/Cashier/Cashiering','CashierController\cashierModuleController@index')->name('cashier')->middleware('cashier');
//Route::get('/Cashier/Pastorder','CashierController\cashierModuleController@index')->name('cashier')->middleware('cashier');

Route::get('/Cashier/Pastorder', function () {return view('/Cashier/Pastorder');})->name('cashier')->middleware('cashier');

Route::post('/Cashier/getDetailsOfBills','CashierController\cashierModuleController@getDetailsOfBills')->name('cashierModuleController.getDetailsOfBills')->middleware('auth');
Route::post('/Cashier/getSelectedDiscountDetails','CashierController\cashierModuleController@getSelectedDiscountDetails')->name('cashierModuleController.getSelectedDiscountDetails')->middleware('auth');
Route::post('/Cashier/getSelectedPaymentDetails','CashierController\cashierModuleController@getSelectedPaymentDetails')->name('cashierModuleController.getSelectedPaymentDetails')->middleware('auth');
Route::post('/Cashier/getSelectedPaymentTypeDetails','CashierController\cashierModuleController@getSelectedPaymentTypeDetails')->name('cashierModuleController.getSelectedPaymentTypeDetails')->middleware('auth');
Route::post('/Cashier/removeSelectedPaymentData','CashierController\cashierModuleController@removeSelectedPaymentData')->name('cashierModuleController.removeSelectedPaymentData')->middleware('auth');
Route::post('/Cashier/getSelectedPaymentBillValueTempRemove','CashierController\cashierModuleController@getSelectedPaymentBillValueTempRemove')->name('cashierModuleController.getSelectedPaymentBillValueTempRemove')->middleware('auth');
Route::post('/Cashier/getSelectedPaymentBillValueTempRemove2','CashierController\cashierModuleController@getSelectedPaymentBillValueTempRemove2')->name('cashierModuleController.getSelectedPaymentBillValueTempRemove2')->middleware('auth');
Route::post('/Cashier/selectedBillDiscountRemove','CashierController\cashierModuleController@selectedBillDiscountRemove')->name('cashierModuleController.selectedBillDiscountRemove')->middleware('auth');
Route::post('/Cashier/reserveBillToSteward','CashierController\cashierModuleController@reserveBillToSteward')->name('cashierModuleController.reserveBillToSteward')->middleware('auth');

//First Stage Bill Print
Route::post('/Cashier/firstStagePrintOut','CashierController\cashierModuleController@firstStagePrintOut')->name('cashierModuleController.firstStagePrintOut')->middleware('auth');

Route::post('/Cashier/firstStagePrintOutTwo','CashierController\cashierModuleController@firstStagePrintOutTwo')->name('cashierModuleController.firstStagePrintOutTwo')->middleware('auth');

Route::get('/logout', 'HomeController@logout');
