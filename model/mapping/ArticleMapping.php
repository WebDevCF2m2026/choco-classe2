<?php
// path: model/mapping/ArticleMapping.php
// typage strict
declare(strict_types=1);

// création du namspace
namespace model\mapping;
// import du trait (utilisation avec use dans la classe ArticmleMappind)
use model\trait\SlugifyTrait;
use Exception;

// use model\abstract\AbstractMapping;

class ArticleMapping // extends AbstractMapping
{
    // Propriétés
    private ?int $article_id = null;
    private ?string $article_title = null;
    private ?string $article_slug  = null;
    private ?string $article_text = null;

    // Méthodes

    // constructeur
    public function __construct(?int $id, string $titre, string $slug = '')
    {
        // utilisation du setter, pas du paramètre
        $this->setArticleId($id);
        $this->setArticleTitle($titre);
        $this->setArticleSlug($slug);
    }

    // getter (récupère les informations d'une propriété)
    public function getArticleId(): ?int
    {
        return $this->article_id;
    }
    // setter (met à jour les informations en suivant des règles)
    public function setArticleId(?int $id):void
    {
        // si l'id est nule (INSERT) on arrête le script
        if(is_null($id)) return ;
        if($id <=0)
            // lance une exception et s'arrête
             throw new Exception("NE peut être inférieur à 0",333);
        $this->article_id = $id;
    }

    // getter
    public function getArticleTitle(): ?string
    {
        return $this->article_title;
    }

    
    // setter
    public function setArticleTitle(string $title):void
    {
        // protection
        $title = htmlspecialchars(trim(strip_tags($title)));
        // nombre de caractères
        $nbCharTitle = strlen($title);
        // 5 caractères minimum
        if($nbCharTitle < 5) 
            throw new Exception("Votre titre doit avoir 5 caractères minimum",333);
        // 180 maximum
        if($nbCharTitle > 180)
            throw new Exception("Votre texte ne peut dépasser 180 caractères",333);
        $this->article_title = $title;
    }

    // getter
    public function getArticleSlug():?string 
    {
        return $this->article_slug;
    }

    // on importe la méthode externe
    use SlugifyTrait;
    // setter
    public function setArticleSlug(string $slug):void 
    {
        // si $slug est vide, on ne l'a pas encore créé
        if(empty($slug)){
            // on va slugifier le titre
            $this->article_slug = $this->slugify($this->getArticleTitle());
        }else{
            // on garde le slug (on slugifie par sécurité)
            $this->article_slug = $this->slugify(
                text: $slug,
                prefix: false,
                );
        }

    }

}