<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AProposController extends AbstractController
{
    /**
     * @Route("/APropos", name="aPropos")
     */
    public function index(): Response
    {
        /**$day = new Day();
        $day->setDayName('Mardi');
        $em = $this->getDoctrine()->getManager();
        $em->persist($day);
        $em->flush();*/

        return $this->render('pages/aPropos.html.twig');
    }


    /**
     * @Route("/Connecté", name="connected")
     */
    public function connected(): Response
    {
        return $this->render('pages/connected.html.twig');
    }
}