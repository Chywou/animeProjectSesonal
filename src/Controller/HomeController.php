<?php

namespace App\Controller;

use App\Entity\Anime;
use App\Form\ModifyNBType;
use App\Form\NewAnimeType;
use App\Repository\AnimeRepository;
use App\Repository\DayRepository;
use Doctrine\Persistence\ManagerRegistry ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class HomeController extends AbstractController
{
    public function __construct(DayRepository $days, AnimeRepository $animes, ManagerRegistry $oms)
    {
        $this->om  = $oms;
        $this->days = $days;
        $this->animes = $animes;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $allDays = $this->days->findAllORder();
        return $this->render('pages/home.html.twig', ['allDays' => $allDays]);
    }

    
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/Ajouter", name="addAnime")
     */
    public function newAnime(Request $request): Response
    {
        $newAnime = new Anime();
        $form = $this->createForm(NewAnimeType::class, $newAnime,);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $this->om->getManager()->persist($newAnime);
            $this->om->getManager()->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('pages/addAnime.html.twig', ['newAnime' => $newAnime, 'form' => $form->createView()]);
    }

    /**
     * @Route("/anime:{id}", name="oneAnime")
     */
    public function oneAnime($id, Request $request): Response
    {
        $anime = $this->animes->find($id);
        $form = $this->createForm(ModifyNBType::class, $anime);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $this->om->getManager()->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('pages/oneAnime.html.twig', ['anime' => $anime, 'form' => $form->createView()]);
    }
}