<?php

namespace APP\plugins\generic\authorsPage;

use PKP\plugins\Hook;
use PKP\plugins\GenericPlugin;
use APP\core\Application;
use APP\facades\Repo;
use PKP\security\Role;
use APP\template\TemplateManager;
use APP\submission\Submission;

class AuthorsPage extends GenericPlugin
{
    public function register($category, $path, $mainContextId = null)
    {
        $success = parent::register($category, $path, $mainContextId);

        if (Application::isUnderMaintenance()) {
            return $success;
        }

        if ($success && $this->getEnabled($mainContextId)) {
            //Hook::add('LoadHandler', [$this, 'replaceSearchHandler']);
        }

        return $success;
    }

    public function getDisplayName()
    {
        return __('plugins.generic.authorsPage.displayName');
    }

    public function getDescription()
    {
        return __('plugins.generic.authorsPage.description');
    }
}
