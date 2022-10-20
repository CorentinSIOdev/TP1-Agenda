<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{   
    // Fonction qui ouvre la page d'accueil dès le démarrage
    #[Route('/', name: 'home_demarrage')]
    public function home(ManagerRegistry $doctrine): Response
    {   
        // Tableau des contacts
            // $tableau = array(
            //     // Affectation de la première ligne du tableau
            //     "1"=>array("id"=>"1", "name"=>"Bonifacio", "firstName"=>"Corentin", "phone"=>"04 70 50 68 04"),
            // );

        $repository = $doctrine->getRepository(Contact::class);
        $contact = $repository->findAll();

        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
            // Renvoie le tableau à la vue avec le nom "tab".
            'tab' => $contact,
        ]);
    }
}
