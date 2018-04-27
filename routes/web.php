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

Route::get('/home', 'HomeController@dashboard');
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard','HomeController@dashboard');

//user routes
Route::get('all_users','UserController@index');
Route::post('new_user','UserController@newUser');
Route::post('delete_user','UserController@deleteUser');
Route::post('get_all_roles_to_assign','UserController@allRoles')->name('get_all_roles_to_assign');
Route::post('attach_role_to_user','UserController@attachRole')->name('attach_role_to_user');


//roles and permission routes
//roles
Route::get('all_roles','RolesPermissionController@allRoles')->name('all_roles');
Route::post('new_role','RolesPermissionController@newRole')->name('new_role');
Route::get('delete_role/{id}','RolesPermissionController@deleteRole')->name('delete_role.id');

//permission routes
Route::get('all_permissions','RolesPermissionController@allPermissions')->name('all_permissions');
Route::post('new_permission','RolesPermissionController@newPermision')->name('new_permission');
Route::get('delete_permission/{id}','RolesPermissionController@deletePermission')->name('delete_permission.id');


//unit routes
Route::get('all_units','UnitController@index');
Route::post('new_unit','UnitController@newUnit');
Route::post('get_unit_details_4_edit','UnitController@getIdEdit');
Route::post('editted_unit','UnitController@saveEdittedUnit');
Route::post('delete_unit','UnitController@deleteUnit');

//supplier routes
Route::get('all_suppliers','SupplierController@index');
Route::post('new_supplier','SupplierController@newSupplier');
Route::post('editted_supplier','SupplierController@edittedSupplier');
Route::post('get_supplier_details_4_edit','SupplierController@getDetails');
Route::post('delete_supplier','SupplierController@deleteSupplier');


//supplies routes
Route::get('all_supplies','SupplyController@index');
Route::post('new_supply','SupplyController@newSupply');
Route::post('get_supply_details_4_edit','SupplyController@getSupplyDetails');
Route::post('delete_supply','SupplyController@deleteSupply');
Route::post('editted_supplies','SupplyController@editSupply');

//profile routes
Route::get('profile','ProfileController@profile');
Route::post('upload_company_pic','ProfileController@changePic');
Route::post('update_company_details','ProfileController@updateCompany');

//products routes
Route::get('all_products','ProductController@index');
Route::post('get_supplies_supplied','ProductController@findSupplier');
Route::post('new_product','ProductController@newProduct');
Route::post('delete_product','ProductController@deleteProduct');
Route::post('get_single_product_price_for_product','ProductController@productPrice');
Route::get('convert_products_to_excel','ProductController@exportProduct');
Route::post('import_products','ProductController@importProducts');

//discount routes
Route::get('discounts','DiscountController@allDiscounts');
Route::post('get_product_size_for_product_name','DiscountController@ProductSize');
Route::post('doing_crazy_shit','DiscountController@insideFun');
Route::post('product_to_display_table','DiscountController@displayTable');
Route::post('silly_work','DiscountController@productTable');
Route::post('records_to_give_discount','DiscountController@productsToDiscount');
Route::post('add_new_discount','DiscountController@newDiscount');
Route::get('active_discounts','DiscountController@displayActiveDiscount');
Route::post('product_active_discount_table','DiscountController@displayProductDiscountTable');
Route::get('delete_discount/{discount_id}','DiscountController@deleteDiscount');
Route::post('get_discount_to_edit','DiscountController@editDiscount');
Route::post('update_discount','DiscountController@updateDiscount');

//buyer routes
Route::get('all_buyers','BuyerController@index');
Route::post('new_buyer','BuyerController@newBuyer');
Route::post('delete_buyer','BuyerController@deleteBuyer');
Route::post('get_buyer_id_for_edit','BuyerController@editBuyer');

//purchase route
Route::get('new_purchase','PurchaseController@displayNewPurchase');
Route::post('product_id_for_similar_products','PurchaseController@getSimilarProducts');
Route::post('get_product_name_from_supply_id_for_purchase','PurchaseController@getProductName');
Route::post('save_purchase_before_display','PurchaseController@savePurchase');
Route::post('get_purchase_to_delete','PurchaseController@purchaseToDelete');
Route::get('existing_purchases','PurchaseController@displayExistingPurchases');
Route::get('delete_purchase/{purchase_code}','PurchaseController@deletePurchase');

//payment routes
Route::get('make_payment_from_purchase/{purchase_code}','PaymentController@displayPaymentView');
Route::post('save_new_payment','PaymentController@newPayment');
Route::get('existing_payments','PaymentController@existingPayment');
Route::get('open_invoice_from_payments_view/{payment_id}/{purchase_code}','PaymentController@openInvoiceFromExistingPayment');
Route::get('open_invoice/{payment_id}/{purchase_code}','PaymentController@openRealInvoice');
Route::get('download_purchase_pdf/{payment_id}/{purchase_code}','PaymentController@downloadPdf');

//reports routes
Route::get('payment_report','ReportController@paymentReport');
Route::post('get_filtered_purchases','ReportController@filteredPurchases');
Route::get('supplied_products_report','ReportController@suppliedProductsReport');