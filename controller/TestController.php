<?php
declare(strict_types=1);

use model\mapping\ArticleMapping;
use model\mapping\UserMapping;

$user = new UserMapping(
    [
        "user_id"=>5,
        "ton_nom"=>"blabla",
    ]
);

var_dump($user);



try{

$article = new ArticleMapping(
    titre: "La petite maison dans la prairie",
    id: 25,
    slug: 'je t\'ai <br> eut passoire',
    );
}catch(Exception $e){
    echo $e->getCode()." -> ".$e->getMessage();
}

echo $article->getArticleId()."<br>";

// setter, modifie l'id
$article->setArticleId(33);

echo $article->getArticleTitle()."<br>";

var_dump($article);