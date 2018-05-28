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
     * @Route("/home", name="home")
     */
    public function BezoekerAction()
    {
              $bericht = ['Den haag training center is een sportschool waar onder professionele begeleiding in een veilige omgeving verschillende soorten martial arts,
              indoor bootcamp, personal, en small group trainingen worden aangeboden. Hier kan je je inschrijven op een les of uitschrijven op een les.'];

               return $this->render('Bezoeker/bezoeker.html.twig', ['bericht' =>$bericht]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction()
    {
       return new Response('<html><body>Admin page!</body></html>');
    }
}