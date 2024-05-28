<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

Route::redirect("/", "/note")->name("dashboard");

Route::middleware(["auth", "verified"])->group(function () {
    // Route::get("/note", [NotesController::class, "index"])->name("note.index");
    // Route::get("/note/create", [NotesController::class, "create"])->name("note.create");
    // Route::post("/note", [NotesController::class, "store"])->name("note.store");
    // Route::get("/note/{id}", [NotesController::class, "show"])->name("note.show");
    // Route::get("/note/{id}/edit", [NotesController::class, "edit"])->name("note.edit");
    // Route::put("/note/{id}", [NotesController::class, "update"])->name("note.update");
    // Route::delete("/note/{note}", [NotesController::class, "destroy"])->name("note.destroy");

    // This line below generates the same routes as the above lines
    Route::resource("note", NotesController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
