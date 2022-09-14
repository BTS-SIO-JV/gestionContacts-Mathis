<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Provider\HtmlLorem;
use Faker\Provider\Lorem;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker=Factory::create("fr_FR");

        $categorie1 =new Categorie();
        $categorie1->setLibelle("Privé")
                   ->setImage("http://lorempixel.com/400/200/people")
                   ->setDescription($faker->sentence(50));
        $manager->persist($categorie1);

                   $categorie2 =new Categorie();
        $categorie2->setLibelle("Sport")
                   ->setImage("http://lorempixel.com/400/200/sports")
                   ->setDescription($faker->sentence(50));
        $manager->persist($categorie2);


                   $categorie3 =new Categorie();
        $categorie3->setLibelle("Professionnel")
                   ->setImage("http://lorempixel.com/400/200/business")
                   ->setDescription($faker->sentence(50));
        $manager->persist($categorie3);

        $genres=["male","female"];


        for ($i=0; $i < 100; $i++) { 
            
            $sexe=mt_rand(0,1);
            if ($sexe == 0) {
                $type = "men";
            }
            else {
                $type="women";
            }
            
            $contact=new Contact();
            $contact->setNom($faker->lastName())
                    ->setPrenom($faker->firstName($genres[$sexe]))
                    ->setRue($faker->streetAddress())
                    ->setCP($faker->numberBetween(75000,92000)) 
                    ->setVille($faker->city())   
                    ->setMail($faker->email())
                    ->setSexe($sexe)
                    ->setAvatar("https://randomuser.me/api/portraits/".$type."/".$i.".jpg");
                    $manager->persist($contact);
        }
        
        $manager->flush();
    }
}