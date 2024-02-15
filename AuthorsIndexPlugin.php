<?php

namespace APP\plugins\generic\authorsIndex;

use PKP\plugins\Hook;
use PKP\plugins\GenericPlugin;
use APP\core\Application;

class AuthorsIndexPlugin extends GenericPlugin
{
    public function register($category, $path, $mainContextId = null)
    {
        $success = parent::register($category, $path, $mainContextId);

        if (Application::isUnderMaintenance()) {
            return $success;
        }

        if ($success && $this->getEnabled($mainContextId)) {
            Hook::add('LoadHandler', [$this, 'addAuthorsHandler']);
        }

        return $success;
    }

    public function getDisplayName()
    {
        return __('plugins.generic.authorsIndex.displayName');
    }

    public function getDescription()
    {
        return __('plugins.generic.authorsIndex.description');
    }

    public function addAuthorsHandler($hookName, $params)
    {
        $page = $params[0];
        if ($page == 'authors') {
            define('HANDLER_CLASS', 'APP\plugins\generic\authorsIndex\pages\authors\AuthorsHandler');
            return true;
        }
        return false;
    }
}
