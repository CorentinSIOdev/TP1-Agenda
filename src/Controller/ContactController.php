<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
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

    // Afficher des données d'une base de données
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

    // Supprimer un objet
    #[Route('/contact_suppression/{id}', name:"suppression_contact")]
    public function suppressionContact(ManagerRegistry $doctrine, $id) {
        $entityManager = $doctrine->getManager();
        $modifContact = $entityManager->getRepository(Contact::class)->find($id);

        if(!$modifContact) {
            throw $this->createNotFoundException(
                "Aucun contact n'a été trouvé sous l'id : $id"
            );
        }

        $entityManager->remove($modifContact);
        $entityManager->flush();

        return $this->redirectToRoute(
            'home_demarrage'
        );
    }

    // Ajout d'un nouveau contact via un formulaire
    #[Route('/addcontact', name:"add_contact")]
    public function ajoutContact(Request $request, ManagerRegistry $doctrine) {
        $entityManager = $doctrine->getManager();
        $addContact = new Contact();

        $form = $this->createForm(ContactType::class, $addContact);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $addContact = $form->getData();
            $entityManager->persist($addContact);
            $entityManager->flush();

            return $this->redirectToRoute(
                "home_demarrage"
            );

            $this->addFlash(
                "messageAlerte",
                "Contact ajouté avec succès."
            );
        }

        return $this->renderForm(
            'ajout/ajouter.html.twig', [
                'form' => $form
            ]
        );
    }
}
