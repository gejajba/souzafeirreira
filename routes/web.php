<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PillarController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Rotas Públicas do Site
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contato', [ContactController::class, 'store'])->name('contact.store');
Route::get('/lgpd', [HomeController::class, 'lgpd'])->name('lgpd');
Route::redirect('/politica-de-privacidade', '/lgpd');

// Artigos e Publicações Jurídicas (Público)
Route::get('/artigos', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artigos/{article}', [ArticleController::class, 'show'])->name('articles.show');

// Atalho de login padrão
Route::get('login', fn () => redirect()->route('admin.login'))->name('login');

// Autenticação Administrativa
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    });

    // Painel Administrativo Protegido
    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Configurações do Escritório & Textos Institucionais
        Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

        // Gestão de Serviços
        Route::resource('services', ServiceController::class);

        // Gestão de Mensagens Recebidas
        Route::get('messages', [ContactMessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
        Route::post('messages/{message}/toggle-read', [ContactMessageController::class, 'toggleRead'])->name('messages.toggle-read');
        Route::delete('messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');

        // Gestão de Pilares e Artigos
        Route::resource('pillars', PillarController::class);
        Route::resource('articles', AdminArticleController::class);
    });
});
