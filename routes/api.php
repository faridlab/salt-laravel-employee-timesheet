<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use SaltEmployeeTimesheet\Controllers\TimesheetsController;
use SaltEmployeeTimesheet\Controllers\SettingsController;
use SaltEmployeeTimesheet\Controllers\TimesheetApprovalsController;

$version = config('app.API_VERSION', 'v1');

Route::middleware(['api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: TIMESHEET SETTINGS
    Route::get("timesheets/settings", [SettingsController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("timesheets/settings", [SettingsController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("timesheets/settings/trash", [SettingsController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("timesheets/settings/import", [SettingsController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("timesheets/settings/export", [SettingsController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("timesheets/settings/report", [SettingsController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("timesheets/settings/{id}/trashed", [SettingsController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("timesheets/settings/{id}/restore", [SettingsController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timesheets/settings/{id}/delete", [SettingsController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("timesheets/settings/{id}", [SettingsController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("timesheets/settings/{id}", [SettingsController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("timesheets/settings/{id}", [SettingsController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timesheets/settings/{id}", [SettingsController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID

    // API: TIMESHEET APPROVALS
    Route::get("timesheets/approvals", [TimesheetApprovalsController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("timesheets/approvals", [TimesheetApprovalsController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("timesheets/approvals/trash", [TimesheetApprovalsController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("timesheets/approvals/import", [TimesheetApprovalsController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("timesheets/approvals/export", [TimesheetApprovalsController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("timesheets/approvals/report", [TimesheetApprovalsController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("timesheets/approvals/{id}/trashed", [TimesheetApprovalsController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("timesheets/approvals/{id}/restore", [TimesheetApprovalsController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timesheets/approvals/{id}/delete", [TimesheetApprovalsController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("timesheets/approvals/{id}", [TimesheetApprovalsController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("timesheets/approvals/{id}", [TimesheetApprovalsController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("timesheets/approvals/{id}", [TimesheetApprovalsController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timesheets/approvals/{id}", [TimesheetApprovalsController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID

    // API: TIMESHEETS
    Route::get("timesheets", [TimesheetsController::class, 'index'])->middleware(['auth:api']); // get entire collection
    Route::post("timesheets", [TimesheetsController::class, 'store'])->middleware(['auth:api']); // create new collection

    Route::get("timesheets/trash", [TimesheetsController::class, 'trash'])->middleware(['auth:api']); // trash of collection

    Route::post("timesheets/import", [TimesheetsController::class, 'import'])->middleware(['auth:api']); // import collection from external
    Route::post("timesheets/export", [TimesheetsController::class, 'export'])->middleware(['auth:api']); // export entire collection
    Route::get("timesheets/report", [TimesheetsController::class, 'report'])->middleware(['auth:api']); // report collection

    Route::get("timesheets/{id}/trashed", [TimesheetsController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("timesheets/{id}/restore", [TimesheetsController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timesheets/{id}/delete", [TimesheetsController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // hard delete collection by ID

    Route::get("timesheets/{id}", [TimesheetsController::class, 'show'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // get collection by ID
    Route::put("timesheets/{id}", [TimesheetsController::class, 'update'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // update collection by ID
    Route::patch("timesheets/{id}", [TimesheetsController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("timesheets/{id}", [TimesheetsController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+')->middleware(['auth:api']); // soft delete a collection by ID

});
