<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\Pillar;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Exibe o painel principal com métricas e contatos recentes.
     */
    public function index(): View
    {
        $settings = SiteSetting::current();
        $totalServices = Service::count();
        $totalPillars = Pillar::count();
        $totalArticles = Article::count();
        $totalMessages = ContactMessage::count();
        $unreadMessagesCount = ContactMessage::unread()->count();

        $recentMessages = ContactMessage::recent()->take(5)->get();

        return view('admin.dashboard', compact(
            'settings',
            'totalServices',
            'totalPillars',
            'totalArticles',
            'totalMessages',
            'unreadMessagesCount',
            'recentMessages'
        ));
    }
}
