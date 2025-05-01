<?php

namespace App\Repository;

use App\Entity\Projet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Projet>
 */
class ProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Projet::class);
    }

    /**
     * Search projects by title or description containing the search term.
     *
     * @param string|null $term
     * @return Projet[]
     */
    public function findBySearchTerm(?string $term): array
    {
        $qb = $this->createQueryBuilder('p');

        if ($term) {
            $qb->andWhere('p.titre LIKE :term OR p.description LIKE :term')
               ->setParameter('term', '%'.$term.'%');
        }

        return $qb->orderBy('p.id', 'ASC')
                  ->getQuery()
                  ->getResult();
    }
}
