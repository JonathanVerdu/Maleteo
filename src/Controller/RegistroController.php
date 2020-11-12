<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistroController extends AbstractController
{
    /**
     * @Route("/registro", name="registro")
     */
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

        $entUser = new User();
        $formRegistro = $this->createForm(UserType::class,$entUser);
        $formRegistro->handleRequest($request);

        if($formRegistro->isSubmitted() && $formRegistro->isValid()){

            $em = $this->getDoctrine()->getManager();
            $entUser->setPassword($passwordEncoder->encodePassword($entUser,$formRegistro['password']->getData()));
            $em->persist($entUser);
            $em->flush();
        }
        
        return $this->render('registro/index.html.twig', [
            'controller_name' => 'RegistroController',
            'form_registro' => $formRegistro->createView(),
        ]);
    }
}
