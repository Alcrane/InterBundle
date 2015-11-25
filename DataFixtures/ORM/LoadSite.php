<?php
//-- src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ALC\InterBundle\Entity\Site;

class LoadSite implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
    $names = array(
      '27 Saint Guillaume',
      '28 Saint Père',
      '56 Saint Père',
      'IDDRI',
      'CSO'
    );

    foreach ($names as $name) {
      // On crée la catégorie
      $site = new Site();
      $site->setName($name);

      // On la persiste
      $manager->persist($site);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}