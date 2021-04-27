<?php

namespace App\Controller;

use App\Repository\AnimeRepository;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OtherController extends AbstractController
{
    public function __construct(AnimeRepository $animes)
    {
        $this->animes = $animes;
    }
    
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
     * @Route("/Connecte", name="connected")
     */
    public function connected(): Response
    {
        return $this->render('pages/connected.html.twig');
    }

    /**
     * @Route("/TousLesAnimes", name="allAnimes")
     */
    public function allAnime(Request $request, PaginatorInterface $paginator): Response
    {
        $datas = $this->animes->findall();
        $allAnimes = $paginator->paginate($datas, $request->query->getInt('page', 1), 4);
        return $this->render('pages/allAnime.html.twig', ['allAnimes' => $allAnimes]);
    }
}