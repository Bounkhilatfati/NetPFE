<?php

namespace App\Repository;

use App\Entity\Encadrant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Encadrant>
 */
class EncadrantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Encadrant::class);
    }

    /**
     * Search encadrants by nom, prenom or specialite containing the search term.
     *
     * @param string|null $term
     * @return Encadrant[]
     */
    public function findBySearchTerm(?string $term): array
    {
        $qb = $this->createQueryBuilder('e');

        if ($term) {
            $qb->andWhere('e.nom LIKE :term OR e.prenom LIKE :term OR e.specialite LIKE :term')
               ->setParameter('term', '%'.$term.'%');
        }

        return $qb->orderBy('e.id', 'ASC')
                  ->getQuery()
                  ->getResult();
    }
}
