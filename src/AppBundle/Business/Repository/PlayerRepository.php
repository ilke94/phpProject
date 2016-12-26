<?php

namespace AppBundle\Business\Repository;

use CoreBundle\Business\Manager\BasicEntityRepositoryTrait;
use Doctrine\ORM\EntityRepository;
use Exception;
use AppBundle\Entity\Player;

class PlayerRepository extends EntityRepository
{
    use BasicEntityRepositoryTrait;

    const ALIAS       = 'player';

    /**
     * @param $id
     * @return mixed
     */
    public function findPlayer($id)
    {
        $qb = $this->createQueryBuilder(self::ALIAS);
        $qb->select(self::ALIAS);

        if (intval($id)) {
            $qb->where(self::ALIAS.'.id =:id')
                ->setParameter('id', $id);
            return $qb->getQuery()->getOneOrNullResult();
        }

        return $qb->getQuery()->getResult();
    }
}