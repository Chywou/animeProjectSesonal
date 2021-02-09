<?php

namespace App\Controller;

use App\Repository\AnimeRepository;
use App\Repository\DayRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(DayRepository $days, AnimeRepository $animes)
    {
        $this->days = $days;
        $this->animes = $animes;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $allDays = $this->days->findAll();
        return $this->render('pages/home.html.twig', ['allDays' => $allDays]);
    }

    /**
     * @Route("/{aniName}{id}", name="oneAnime")
     */
    public function oneAnime($id): Response
    {
        $anime = $this->animes->find($id);
        return $this->render('pages/oneAnime.html.twig', ['anime' => $anime]);
    }
}