<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Auteur;
use AppBundle\Entity\Livre;

class AuteurController extends FOSRestController
{
    /**
    * @Rest\Get("/authors")
    */
    public function getAction()
    {
    $result = $this->getDoctrine()->getRepository(Auteur::class)->findAll();
    if ($result === null) 
        return new View("aucun auteur", Response::HTTP_NOT_FOUND);
    return $result;
    }

    /**
    * @Rest\Get("/authors/{id}")
    */
    public function auteur($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Auteur::class);
        $result = $repo->find($id);
        if ($result === null) 
            {return new View("il n'a pas dauteurs", Response::HTTP_NOT_FOUND);}
        return $result;
    }

    /**
    * @Rest\Post("/authors")
    */
    public function ajout(Request $request)
    {
        $data = new Auteur();
        $data->setNom('list auteur khouloud');
        $data->setEmail('kloud235@gmail.com');
        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();
        return new View("author ajouter", Response::HTTP_CREATED);
    }

    /**
    * @Rest\Put("/authors/{id}")
    */
    public function modifier(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Auteur::class);
        $data = $repo->find($id);
        if($data == null)
        {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_CREATED);
        }
        $data->setNom('supprimer khouloud');
        $data->setEmail('nouira@gmail.com');
        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();
        return new View("auteur modifier", Response::HTTP_CREATED);
    }
}
