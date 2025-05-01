<?php

namespace App\Repository;

use App\Entity\Etudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Etudiant>
 */
class EtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etudiant::class);
    }

    /**
     * Search etudiants by nom, prenom or email containing the search term.
     *
     * @param string|null $term
     * @return Etudiant[]
     */
    public function findBySearchTerm(?string $term): array
    {
        $qb = $this->createQueryBuilder('e');

        if ($term) {
            $qb->andWhere('e.nom LIKE :term OR e.prenom LIKE :term OR e.email LIKE :term')
               ->setParameter('term', '%'.$term.'%');
        }

        return $qb->orderBy('e.id', 'ASC')
                  ->getQuery()
                  ->getResult();
    }
}
