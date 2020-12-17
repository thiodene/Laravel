// Check Roles from middleware
Route::get('support', 'SupportController@index')->middleware('role:editor');

// Check Permissions from middleware
Route::put('support/{user}', 'SupportController@update')->name('support_update')->middleware('permission:update');
Route::delete('support', 'SupportController@destroy')->name('support_destroy')->middleware('permission:delete');

