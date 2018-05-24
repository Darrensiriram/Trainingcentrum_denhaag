<?php
/**
 * Created by PhpStorm.
 * User: darren
 * Date: 24-5-2018
 * Time: 11:43
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BezoekerController extends Controller
{
    /**
     * @Route("/home/{homePagina}")
     */
    public function BezoekerAction($homePagina)
    {
              $bericht = ['Welkom op onze webpagina Schrijf in voor een training',
                  'Hier kunt alle informatie vinden over onze trainingen',
                  'Nu in schrijven !'];

               return $this->render('Bezoeker/bezoeker.html.twig', ['name' =>$homePagina, 'bericht' =>$bericht]);
    }
}