<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Livre;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class LivreController extends FOSRestController
{
    /**
    * @Rest\Get("/books")
    */
    public function getAction()
    {
    $result = $this->getDoctrine()->getRepository(Livre::class)->findAll();
    if ($result === null) 
        return new View("aucun livre", Response::HTTP_NOT_FOUND);
    return $result;
    }

    /**
    * @Rest\Post("/books")
    */
    public function ajouterlivre(Request $request)
    {
        $data = new Livre();
        $data->setTitre('ajouterlivre');
        $data->setDescriptif('khouloud nouira');
        $data->setISBN('isbn');
        $data->setDateedition(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();
        return new View("livre est ajouter", Response::HTTP_CREATED);
    }

    /**
    * @Rest\Put("/books/{id}")
    */
    public function modfierlivre(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Livre::class);
        $data = $repo->find($id);
        if($data == null)
        {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_CREATED);
        }
        $data->setTitre('titre modification');
        $data->setDescriptif('modification descriptif');
        $data->setISBN('modification isbn');
        $data->setDateedition(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();
        return new View("livre est modifier", Response::HTTP_CREATED);
    }

    /**
    * @Rest\Get("/books/{id}")
    */
    public function listelivre($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Livre::class);
        $result = $repo->find($id);
        if ($result === null) 
            {return new View("aucun livre", Response::HTTP_NOT_FOUND);}
        return $result;
    }

    /**
    * @Rest\DELETE("/books/{id}")
    */
    public function supprimerlivre(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Livre::class);
        $data = $repo->find($id);
        if($data == null)
        {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_CREATED);
        }
        $em->remove($data);
        $em->flush();
        return new View("livre supprimer", Response::HTTP_CREATED);
    }
}
