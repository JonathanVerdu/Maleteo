<?php

namespace App\Controller;

use App\Entity\Comentario;
use App\Entity\Solicitud;
use App\Form\SolicitudType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/maleteo", name="index")
     */
    public function index(Request $request)
    {
        // --- FORMULARIO ---
        $entSolicitud = new Solicitud();
        $formSolicitud = $this->createForm(SolicitudType::class,$entSolicitud);
        $formSolicitud->handleRequest($request);

        if($formSolicitud->isSubmitted() && $formSolicitud->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($entSolicitud);
            $em->flush();

        }

        // --- TRES ÚLTIMOS COMENTARIOS ---
        $em = $this->getDoctrine()->getManager();
        $ultimosComentarios = $em->getRepository(Comentario::class)->tresUltimosComentarios();

        // --- PINTAR PÁGINA ---
        return $this->render('index/index.html.twig', [
            'controller_name' => 'DashboardController',
            'form_solicitud' => $formSolicitud->createView(),
            'ultimos_comentarios' => $ultimosComentarios
        ]);
    }
}
