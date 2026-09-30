<?php
// path: model/mapping/UserMapping.php
// typage strict
declare(strict_types=1);

namespace model\mapping;
use Exception;

use model\abstract\AbstractMapping;
class UserMapping extends AbstractMapping
{
    // propriétés
    private ?int $user_id = null;
    private ?string $user_login = null;
    private ?string $privateuser_pwd= null;

    public function getUserId():? int
    {
        return $this->user_id;
    }

    public function setUserId(?int $id):void
    {
        // si l'id est nule (INSERT) on arrête le script
        if(is_null($id)) return ;
        if($id <=0)
            // lance une exception et s'arrête
             throw new Exception("NE peut être inférieur à 0",333);
        $this->user_id = $id;
    }

}