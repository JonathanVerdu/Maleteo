<?php

namespace App\Controller;

use App\Entity\Comentario;
use App\Form\OpinionesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OpinionesController extends AbstractController
{
    /**
     * @Route("/opiniones", name="opiniones")
     */
    public function index(Request $request)
    {
        $entComentario = new Comentario();
        $formComentario = $this->createForm(OpinionesType::class,$entComentario);
        $formComentario->handleRequest($request);

        if($formComentario->isSubmitted() && $formComentario->isValid()){

            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            if($user == null) $user = "Desconocido";
            $entComentario->setAutor($user->getUsername());
            $em->persist($entComentario);
            $em->flush();

        }

        return $this->render('opiniones/index.html.twig', [
            'controller_name' => 'OpinionesController',
            'form_comentario' => $formComentario->createView()
        ]);
    }
}
