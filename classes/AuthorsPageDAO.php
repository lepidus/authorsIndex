<?php

namespace APP\plugins\generic\authorsPage\classes;

use PKP\db\DAO;
use Illuminate\Support\Facades\DB;
use APP\facades\Repo;
use APP\submission\Submission;
use PKP\services\PKPSchemaService;
use PKP\author\DAO as AuthorDAO;

class AuthorsPageDAO extends DAO
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
        $authors = [];
        foreach ($results as $row) {
            $authors[] = $authorDao->fromRow($row);
        }

        foreach ($authors as $author) {
            $fullName = $author->getFullName();

            if (!isset($authorNames[$fullName])) {
                $authorNames[$fullName] = $author->getLocalizedFamilyName() . ', ' . $author->getLocalizedGivenName();
            }
        }
        asort($authorNames);
        return $authorNames;
    }
}
