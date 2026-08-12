<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Lang;
use Exception;
use Parsedown;

class DocsController extends Controller
{
    public function index()
    {
        $this->redirect(route('docs.show', ['page' => 'installation']));
    }

    public function show($page)
    {
        $page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page);
        $locale = Lang::getLocale();

        // Check localized docs path e.g. resources/docs/en/installation.md
        $localizedPath = __DIR__ . '/../../resources/docs/' . $locale . '/' . $page . '.md';
        $fallbackPath  = __DIR__ . '/../../resources/docs/' . $page . '.md';

        $filePath = file_exists($localizedPath) ? $localizedPath : $fallbackPath;

        if (!file_exists($filePath)) {
            http_response_code(404);
            return $this->view('errors/404');
        }

        $markdownContent = file_get_contents($filePath);
        
        $parsedown = new Parsedown();
        $parsedown->setSafeMode(false);
        $htmlContent = $parsedown->text($markdownContent);

        // Sidebar configuration resolution
        $localizedSidebar = __DIR__ . '/../../resources/docs/sidebar_' . $locale . '.json';
        $fallbackSidebar  = __DIR__ . '/../../resources/docs/sidebar.json';
        $sidebarPath = file_exists($localizedSidebar) ? $localizedSidebar : $fallbackSidebar;

        $sidebarData = [];
        if (file_exists($sidebarPath)) {
            $sidebarData = json_decode(file_get_contents($sidebarPath), true);
        }

        $title = ucfirst(str_replace('-', ' ', $page)) . ' - Zen PHP Documentation';

        return \App\Core\App::View('layouts/docs', [
            'content' => $htmlContent,
            'sidebar' => $sidebarData,
            'currentPage' => $page,
            'title' => $title
        ]);
    }
}
