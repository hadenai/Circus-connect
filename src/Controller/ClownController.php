<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ClownRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClownController extends AbstractController
{
    /**
     * @Route("/clown", name="clown")
     */
    public function index(ClownRepository $repo, CategoryRepository $repository)
    {
        $clowns = $repo->findAll();
        return $this->render('clown/index.html.twig', [
            'clowns' => $clowns,
        ]);
    }
}
