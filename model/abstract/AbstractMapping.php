<?php
// path: model/abstract/AbstractMapping.php
// typage strict
declare(strict_types=1);

namespace model\abstract;

// doit être héritée par les classes de mapping
class AbstractMapping
{
    public function __construct(array $datas)
    {
        $this->hydrate($datas);
    }

    protected function hydrate(array $mydatas):void
    {
        foreach($mydatas as $colName => $value){
            $nameSetter = "set".str_replace("_","",ucwords($colName,"_"));
            if(method_exists($this, $nameSetter)){
                echo "$nameSetter existe";
                $this->$nameSetter($value);
            }else{
                echo "$nameSetter n'existe pas";
            }
        }
    }
}