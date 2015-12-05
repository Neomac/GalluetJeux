<?php

namespace Galluet\JeuxBundle\Controller;

use Galluet\JeuxBundle\Entity\Jeu;
use Galluet\JeuxBundle\Form\JeuType;
use Galluet\JeuxBundle\Entity\Editeur;
use Galluet\JeuxBundle\Form\EditeurType;
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


    public function creer_editeurAction()
    {
        $editeur = new Editeur();
        $form = $this->createForm(new EditeurType(), $editeur);

        $req = $this->getRequest();

        if($req->getMethod() == "POST") {
            $form->bind($req);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($editeur);
                $em->flush();

                return $this->redirect($this->generateUrl('g_homepage'));
            }
        }

        return $this->render('GalluetJeuxBundle:Editeur:creer_editeur.html.twig', array(
            "form" => $form->createView(),
        ));
    }

    public function liste_editeurAction()
    {
        $editeurs = $this->getDoctrine()->getManager()->getRepository('GalluetJeuxBundle:Editeur')->findAll();

        return $this->render('GalluetJeuxBundle:Editeur:liste_editeur.html.twig', array(
            "editeurs" => $editeurs,
        ));
    }

}
