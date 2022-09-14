<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categories", name="categories", methods={"GET"})
     */
    public function listeCategories(CategorieRepository $repo): Response
    {
        $categories=$repo->findAll();
        return $this->render('categorie/listeCategories.html.twig', [
            'lesCategories' => $categories,
        ]);
    }

    /**
     * @Route("/categorie/{id}", name="ficheCategorie", methods={"GET"})
     */
    public function afficheCategorie(Categorie $categorie): Response
    {
        return $this->render('categorie/listeCategories.html.twig', [
            'laCategorie' => $categorie,
        ]);
    }
}
