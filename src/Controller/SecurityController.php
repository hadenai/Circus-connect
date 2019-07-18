<?php

namespace App\Controller;

use App\Entity\Clown;
use App\Form\ClownAccountType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * @Route("/registration", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager) {

        $clown = new Clown();

        $form = $this->createForm(ClownAccountType::class, $clown);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($clown);
            $manager->flush();

            $this->addFlash(
                'success',
                'Félicitations! votre compte à était crée avec succès'
            );
            return $this->redirectToRoute('account_login');
        }
        return $this->render('security/registration.html.twig',[
            'form'=> $form->createView()
        ]);

    }
    /**
     * @Route("/login", name="account_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
    }
}
