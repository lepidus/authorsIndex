<?php

namespace APP\plugins\generic\authorsPage\pages\authors;

use APP\handler\Handler;
use APP\template\TemplateManager;
use PKP\plugins\PluginRegistry;
use PKP\config\Config;
use APP\plugins\generic\authorsPage\classes\AuthorsPageDAO;

class AuthorsHandler extends Handler
{
    public function index($args, $request)
    {
        $plugin = PluginRegistry::getPlugin('generic', 'authorspageplugin');
        $templateMgr = TemplateManager::getManager($request);

        $pageData = $this->getPageData($args, $request);
        $templateMgr->assign($pageData);

        return $templateMgr->display($plugin->getTemplateResource('authorsPage.tpl'));
    }

    private function getPageData($args, $request): array
    {
        $context = $request->getContext();
        $page = isset($args[0]) ? (int) $args[0] : 1;
        $itemsPerPage = $context->getData('itemsPerPage') ? $context->getData('itemsPerPage') : Config::getVar('interface', 'items_per_page');
        $offset = $page > 1 ? ($page - 1) * $itemsPerPage : 0;

        $dao = new AuthorsPageDAO();
        $contributingAuthors = $dao->getContributingAuthors($context->getId());

        $total = count($contributingAuthors);
        $showingStart = $offset + 1;
        $showingEnd = min($offset + $itemsPerPage, $offset + $total);
        $nextPage = $total > $showingEnd ? $page + 1 : null;
        $prevPage = $showingStart > 1 ? $page - 1 : null;

        return [
            'contributingAuthors' => $contributingAuthors,
            'showingStart' => $showingStart,
            'showingEnd' => $showingEnd,
            'total' => $total,
            'nextPage' => $nextPage,
            'prevPage' => $prevPage
        ];
    }
}
