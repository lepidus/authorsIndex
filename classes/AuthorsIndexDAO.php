<?php

namespace APP\plugins\generic\authorsIndex\classes;

use PKP\db\DAO;
use Illuminate\Support\Facades\DB;
use APP\facades\Repo;
use APP\submission\Submission;
use PKP\services\PKPSchemaService;
use PKP\author\DAO as AuthorDAO;

class AuthorsIndexDAO extends DAO
{
    public function getContributingAuthors(int $contextId): array
    {
        $authorNames = [];

        $query = Repo::author()->getCollector()
            ->filterByContextIds([$contextId])
            ->getQueryBuilder();
        $results = $query->where('p.status', '=', Submission::STATUS_PUBLISHED)->get();

        $schemaService = new PKPSchemaService();
        $authorDao = new AuthorDAO($schemaService);

        foreach ($results as $row) {
            $author = $authorDao->fromRow($row);
            $givenName = trim($author->getLocalizedGivenName());
            $familyName = trim($author->getLocalizedFamilyName());
            $displayName = $familyName . ', ' . $givenName;

            if (!isset($authorNames[$displayName])) {
                $authorNames[$displayName] = $givenName . ' ' . $familyName;
            }
        }
        ksort($authorNames);
        return $authorNames;
    }
}
