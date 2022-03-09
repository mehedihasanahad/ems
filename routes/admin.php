<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


// employee routes
Route::get('/', function () {
    return view('admin.pages.index');
})->name('employee_list');
Route::get('/employee-create', function() {
    return view('admin.pages.create_employee');
})->name('create');
Route::get('/employee-edit/{employee_id}', 'EmployeeController@edit_view')->name('edit_view');


// employee education routes
Route::get('/{id}/educational-informations', function() {
    return view('admin.pages.educations.index');
})->name('education_list');
Route::get('/{id}/educational-inforamations/create', function() {
    return view('admin.pages.educations.create_education');
})->name('create_education');
Route::get('/{employee_id}/educational-inforamations/edit/{education_id}', 'EmployeeEducationController@edit_view')->name('edit_education_view');



// employee experience routes
Route::get('/{id}/experience-informations', function() {
    return view('admin.pages.experiences.index');
})->name('experience_list');
Route::get('/{id}/experience-informations/create', function() {
    return view('admin.pages.experiences.create_experience');
})->name('create_experience');
Route::get('/{employee_id}/experience-inforamations/edit/{experience_id}', 'EmployeeExperienceController@edit_view')->name('edit_experience_view');
