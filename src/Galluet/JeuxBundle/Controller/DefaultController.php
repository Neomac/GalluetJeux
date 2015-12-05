<?php

namespace Galluet\JeuxBundle\Controller;

use Galluet\JeuxBundle\Entity\Jeu;
use Galluet\JeuxBundle\Form\JeuType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GalluetJeuxBundle:Default:index.html.twig');
    }

    public function creer_jeuAction()
    {
        $jeu = new Jeu();
        $form = $this->createForm(new JeuType(), $jeu);

        $req = $this->getRequest();

        if($req->getMethod() == "POST") {
            $form->bind($req);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($jeu);
                $em->flush();

                return $this->redirect($this->generateUrl('g_homepage'));
            }
        }

        return $this->render('GalluetJeuxBundle:Jeu:creer_jeu.html.twig', array(
            "form" => $form->createView(),
        ));
    }

    public function liste_jeuAction()
    {
        $jeux = $this->getDoctrine()->getManager()->getRepository('GalluetJeuxBundle:Jeu')->findAll();

        return $this->render('GalluetJeuxBundle:Jeu:liste_jeu.html.twig', array(
           "jeux" => $jeux,
        ));
    }
}
