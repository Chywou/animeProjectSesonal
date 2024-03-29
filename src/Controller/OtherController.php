<?php

namespace App\Controller;

use App\Form\SearchType;
use App\Form\FilterType;
use App\Repository\AnimeRepository;
use App\Repository\DayRepository;
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
        $search='';
        $filter=[];

        // Form pour la recherche
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);
        if (isset($form->getData()['animeName']))
        {
            $search = $form->getData()['animeName'];
        }
        // Form pour le filtre
        $form2 = $this->createForm(FilterType::class);
        $form2->handleRequest($request);
        if (isset($form2->getData()['day']))
        {
            $filter = $form2->getData()['day'];
        }
        // Récupération des données
        $datas = $this->animes->findAllSearch($search, $filter);

        // Pagination
        $allAnimes = $paginator->paginate($datas, $request->query->getInt('page', 1), 8);

        // Rendu
        return $this->render('pages/allAnime.html.twig', [
            'allAnimes' => $allAnimes,
            'form' => $form->createView(),
            'form2' => $form2->createView()
            ]);
    }
}