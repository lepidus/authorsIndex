{**
 * plugins/generic/authorsPage/templates/authorsPage.tpl
 *
 * Copyright (c) 2024 Lepidus Tecnologia
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * Index of authors with published works.
 *
 *}
{capture assign="pageTitle"}
    {if $prevPage}
        {translate key="plugins.generic.authorsPage.pageTitle.withNumber" pageNumber=$prevPage+1}
    {else}
        {translate key="plugins.generic.authorsPage.pageTitle"}
    {/if}
{/capture}

{include file="frontend/components/header.tpl" pageTitleTranslated=$pageTitle}

<div class="page">
    <h1>{$pageTitle|escape}</h1>

    {if empty($contributingAuthors)}
        <p>{translate key="plugins.generic.authorsPage.noAuthors"}</p>
    {else}
        <p></p>
    {/if}
</div>

{include file="frontend/components/footer.tpl"}