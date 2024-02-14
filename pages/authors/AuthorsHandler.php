<?php

namespace APP\plugins\generic\authorsPage\pages\authors;

use APP\handler\Handler;
use APP\template\TemplateManager;
use PKP\plugins\PluginRegistry;

class AuthorsHandler extends Handler
{
    public function index($args, $request)
    {
        $plugin = PluginRegistry::getPlugin('generic', 'authorspageplugin');
        $templateMgr = TemplateManager::getManager($request);

        return $templateMgr->display($plugin->getTemplateResource('authorsPage.tpl'));
    }
}
