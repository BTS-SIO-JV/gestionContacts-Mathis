<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts", name="contacts", methods={"GET"})
     */
    public function listeContact(ContactRepository $repo): Response
    {
        $Contacts=$repo->findAll();
        return $this->render('contact/listeContacts.html.twig',[
            'lesContacts' => $Contacts
        ]);
    }


    /**
     * @Route("/contact/{id}", name="ficheContact", methods={"GET"})
     */
    public function ficheContact(Contact $contact): Response
    {
        return $this->render('contact/ficheContact.html.twig',[
            'leContact' => $contact
        ]);
    }


    /**
     * @Route("/contact/sexe/{sexe}", name="listeContactsSexe", methods={"GET"})
     */
    public function listeContactsSexe($sexe, ContactRepository $repo): Response
    {
        // $Contacts=$repo->findBy(
        //     [
        //         'sexe' => $sexe
        //     ],
        //     [
        //         'nom' =>'ASC'
        //     ]);
        $Contacts = $repo->findBySexe($sexe);
        return $this->render('contact/listeContacts.html.twig',[
            'lesContacts' => $Contacts
        ]);
    }
}
