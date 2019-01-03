<?php
namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Livre;
use AppBundle\Entity\Auteur;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
class LoadFixtures implements FixtureInterface

{
	public function load(ObjectManager $manager)

	{
		for ($i = 0; $i < 10; $i++) {
			$Livre = new Livre();
			$Livre->setTitre('khouloud'.$i);
			$Livre->setDescriptif('nouira'.$i);
			$Livre->setISBN('mdw'.$i);
			$Livre->setDateedition(new \DateTime());
			$manager->persist($Livre);
			$Auteur = new Auteur();
			$Auteur->setNom('kloudnouira'.$i); 
			$Auteur->setEmail('kloud235@gmail.com'.$i);
			$manager->persist($Auteur);
		}
		$manager->flush();
	}
}