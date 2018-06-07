<?php
/**
 * Created by PhpStorm.
 * User: darren
 * Date: 24-5-2018
 * Time: 11:43
 */

namespace AppBundle\Controller;


use AppBundle\Entity\lesson;
use AppBundle\Entity\Training;
use AppBundle\Form\AanmeldType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
     * @Route("/create", name="create")
     */
    public function createAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new lesson();
        $product->setMaxPersons('5');
        $product->setLocation('DenHaag');

        $entityManager->persist($product);
        $entityManager->flush();

        return new Response('Nieuwe waarde meegegeven! ' . $product->getId());
    }

    /**
     * @Route("/aanmelden", name="aanmelden")
     */
    public function newAction(Request $request ,UserPasswordEncoderInterface $passwordEncoder)
    {

        $form=$this->createForm(AanmeldType::class);

        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid())
        {
           $aanmeldform = $form->getData();
            $password = $passwordEncoder->encodePassword($aanmeldform, $aanmeldform->getPlainPassword());
            $aanmeldform->setPassword($password);
           $aanmeldform->setRoles(array('ROLE_USER'));
           $em = $this->getDoctrine()->getManager();
           $em->persist($aanmeldform);
           $em->flush();
           $this->addFlash('success', 'Bedankt voor het aanmelden');
           return $this->redirectToRoute('home');
        }

        return $this->render('Bezoeker/new.html.twig', [ 'aanmeldForm'=>$form->createView()
        ]);
    }



}