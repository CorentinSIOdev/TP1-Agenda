<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{   
    // Fonction qui ouvre la page d'accueil dès le démarrage
    #[Route('/', name: 'home_demarrage')]
    public function home(): Response
    {   
        // Tableau des contacts
        $tableau = array(
            // Affectation de la première ligne du tableau
            "1"=>array("id"=>"1", "name"=>"Bonifacio", "firstName"=>"Corentin", "phone"=>"04 70 50 68 04"),
        );

        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
            // Renvoie le tableau à la vue avec le nom "tab".
            'tab' => $tableau,
        ]);
    }
}
