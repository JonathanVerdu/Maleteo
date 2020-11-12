<?php

namespace App\Controller;

use App\Entity\Solicitud;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SolicitudesController extends AbstractController
{
    /**
     * @Route("/solicitudes", name="solicitudes")
     */
    public function index()
    {
        // Obtener las solicitudes de la BBDD
        $em = $this->getDoctrine()->getManager();
        $solicitudes = $em->getRepository(Solicitud::class)->todasLasPeticiones();
        return $this->render('solicitudes/index.html.twig', [
            'controller_name' => 'SolicitudesController',
            'solicitudes' => $solicitudes
        ]);
    }
}
