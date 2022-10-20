<?php

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends HomeController
{   
    // Ajouter un objet a une base de données
        // #[Route('/contact', name: 'app_contact')]
        // public function createContact(ManagerRegistry $doctrine) {
        //     $entityManager = $doctrine->getManager();

        //     $contact = new Contact();
        //     $contact->setNom("Emi"); 
        //     $contact->setPrenom("Obo");
        //     $contact->setTelephone(0652672512);
        //     $contact->setAdresse("Test adresse");
        //     $contact->setVille("Melun");
        //     $contact->setAge(22);

        //     $entityManager->persist($contact);
        //     $entityManager->flush();

        //     return new Response($contact->getId());
        // }
    #[Route('/contact/{id}', name:"info_contact")]
    public function affichageNom(ManagerRegistry $doctrine, $id) {
        $repository = $doctrine->getManager()->getRepository(Contact::class);
        $recupInfoContact = $repository->find($id);

        $nom = $recupInfoContact->getNom();
        $prenom = $recupInfoContact->getPrenom();

        return $this->render(
            'contact/contact.html.twig', [
                'nom'=> $nom,
                'prenom'=> $prenom
            ]
        );
    }

    // Mettre a jour un objet
    #[Route('/contact_modification/{id}', name:"modification_contact")]
    public function modificationContact(ManagerRegistry $doctrine, $id) {
        $entityManager = $doctrine->getManager();
        $modifContact = $entityManager->getRepository(Contact::class)->find($id);

        if(!$modifContact) {
            throw $this->createNotFoundException(
                "Aucun contact n'a été trouvé sous l'id : $id"
            );
        }

        $modifContact->setTelephone("New number !");
        $entityManager->flush();

        return $this->redirectToRoute(
            'home_demarrage', [
                "id"=> $modifContact->getId()
            ]
        );
    }
    
    // Mettre a jour un objet
        // #[Route('/contact', name: 'app_contact')]
        // public function modifyContact(ManagerRegistry $doctrine, int $id) : Response {
        //     $entityManager = $doctrine->getManager();
        //     $contact = $entityManager->getRepository(Contact::class)->find($id);

        //     if(!$contact) {
        //         throw $this->createNotFoundException(
        //             "No product found for id $id"
        //         );
        //     }

        //     $contact->setPrenom('Emilie');
        //     $entityManager->flush();

        //     return $this->redirectToRoute(
        //         'home_demarrage', [
        //             'id' => $contact->getId()
        //         ]
        //     );
        // }
    
    // Supprimer un objet
        // #[Route('/contact', name: 'app_contact')]
        // public function deleteContact(ManagerRegistry $doctrine) : Response {
        //     $entityManager = $doctrine->getManager();
        //     $contact = new Contact();

        //     $entityManager->remove($contact);
        //     $entityManager->flush();

        //     return $this->redirectToRoute(
        //         'home_demarrage'
        //     );
        // }
}
