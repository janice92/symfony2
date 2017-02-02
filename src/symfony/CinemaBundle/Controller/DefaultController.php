<?php

// src/symfony/CinemaBundle/Controller/DefaultController.php
namespace symfony\CinemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
    * @Route("/")
    */
    public function indexAction()
    {
        return $this->render('symfonyCinemaBundle:Default:index.html.twig');
    }
//test
    /**
    * @Route("/films")
    */
    public function listAction()
    {

    $films = $this->getDoctrine()->getRepository('symfonyCinemaBundle:Film')->findAll();

    $titre_de_la_page = 'Films de la bibliothèques';
        
         return $this->render(
        'symfonyCinemaBundle:Film:list.html.twig',
        ['films' => $films, 'titre' => $titre_de_la_page]
    );
    }

    /**
    * @Route("/film/{id}", requirements={"id": "\d+"})
    */
    public function showAction($id)
    {
        $film = $this->getDoctrine()->getRepository('symfonyCinemaBundle:Film')->find($id);

    return $this->render(
        'symfonyCinemaBundle:Film:show.html.twig',
        ['film' => $film]
    );

    }
}
