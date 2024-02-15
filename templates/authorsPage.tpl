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

<link rel="stylesheet" type="text/css" href="/plugins/generic/authorsPage/styles/authorsList.css">
{include file="frontend/components/header.tpl" pageTitleTranslated=$pageTitle}

<div class="page">
    <h1>{$pageTitle|escape}</h1>

    {if empty($contributingAuthors)}
        <p>{translate key="plugins.generic.authorsPage.noAuthors"}</p>
    {else}
        <div id="authorsList">
            {foreach from=$contributingAuthors item="searchParam" key="displayName"}
                {capture assign="authorSearchUrl"}{url router=$smarty.const.ROUTE_PAGE page="search" op="index" params=['query' => '', 'dateFromYear' => '', 'dateToYear' => '', 'dateToMonth' => '', 'dateToDay' => '', 'authors' => $searchParam|escape, 'sections' => '']}{/capture}
                <a href="{$authorSearchUrl}">{$displayName|escape}</a>
                <br>
            {/foreach}
        </div>

        {* Pagination *}
		{if $prevPage > 1}
            {capture assign=prevUrl}{url router=$smarty.const.ROUTE_PAGE page="authors" path=$prevPage}{/capture}
        {elseif $prevPage === 1}
            {capture assign=prevUrl}{url router=$smarty.const.ROUTE_PAGE page="authors"}{/capture}
        {/if}
        {if $nextPage}
            {capture assign=nextUrl}{url router=$smarty.const.ROUTE_PAGE page="authors" path=$nextPage}{/capture}
        {/if}
        {include
            file="frontend/components/pagination.tpl"
            prevUrl=$prevUrl
            nextUrl=$nextUrl
            showingStart=$showingStart
            showingEnd=$showingEnd
            total=$total
        }
    {/if}
</div>

{include file="frontend/components/footer.tpl"}