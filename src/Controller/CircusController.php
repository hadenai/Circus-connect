<?php

namespace App\Controller;

use App\Entity\Circus;
use App\Repository\CircusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CircusController extends AbstractController
{
    /**
     * @Route("/circus", name="circus_index")
     */
    public function index(CircusRepository $repo)
    {
        $circus = $repo->findAll();

        return $this->render('circus.html.twig', [
           'circuses' => $circus
        ]);
    }
    /**
     * @Route("/circus/{slug}", name="circus_show")
     */
    public function show(Circus $circus) :Response
    {
        return $this->render('show.html.twig',[
            'circus' => $circus
        ]);
    }
}
