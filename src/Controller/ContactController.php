<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends HomeController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {   
        return $this->render('contact/contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function createContact(ManagerRegistry $doctrine) {
        $entityManager = $doctrine->getManager();

        $contact = new Contact();
        $contact->setNom(""); 
        $contact->setPrenom("");
        $contact->setTelephone("");
        $contact->setAdresse("");
        $contact->setVille("");
        $contact->setAge("");

        $entityManager->persist($contact);
        $entityManager->flush();

        return new Response($contact->getId());
    }
}
