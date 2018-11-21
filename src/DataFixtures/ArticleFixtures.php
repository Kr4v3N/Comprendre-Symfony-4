<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       for($i = 1; $i <= 10; $i++){
           $article = new Article();
           $article->setTitle("Titre de l'article n°$i")
               ->setContent("Contenu de l'article n°$i")
               ->setImage("http://placeholder.it/350x150")
               ->setCreatedAt(new \dateTime());

           $manager->persist($article);

       }

        $manager->flush();
    }
}
