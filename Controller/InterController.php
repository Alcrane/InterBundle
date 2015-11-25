<?php

namespace ALC\InterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

//-- Les tables
use ALC\InterBundle\Entity\Inter;

//-- Les formulaires
use ALC\InterBundle\Form\InterType;

class InterController extends Controller
{
    public function indexAction($page)
    {
        //-- Une page doit être sup à 1
        if ($page < 1){
            //-- Déclanche exception 
            //-- Affichige une page 404
            throw new NotFoundHttpException('Page "'. $page .'" inexistante');
        }
        
        // On récupère notre objet Paginator
        $listInters = $this->getDoctrine ()
                ->getManager ()
                ->getRepository ('ALCInterBundle:Inter')
                ->findAll()
                //->getInter ($page, $nbPerPage)
        ;
        
        return $this->render('ALCInterBundle:Inter:index.html.twig', array(
            'listInters' => $listInters
                ));
    }
    
    /*-----------------------------------------------------
     * public function addsiteAction()
     * Gestion des sites
     * Ajout d'un nouveau site
     */
    public function addinterAction(Request $request)
    {
       $inter = new Inter();
       $form = $this->get('form.factory')->create(new InterType, $inter);
        
       //-- Test du formulaire
       if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($inter);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirect($this->generateUrl('alc_inter_homepage'));
        }
        return $this->render('ALCInterBundle:Inter:addinter.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /*-----------------------------------------------------
     * public function modinterAction()
     * Gestion des inters
     * Modification d'une inter
     */
    public function modinterAction($id, Request $request)
    {
        //-- On récupère l'EntityManager
        $inter = $this->getDoctrine()
                ->getManager()
                ->getRepository('ALCInterBundle:Inter')
                ->find($id);
        
        if ($inter == null)
        {
            throw $this->createNotFoundException ("L'inter d'id " . $id . " n'existe pas.");
        }


        $form = $this->get('form.factory')->create(new InterType, $inter);

        //-- Test du formulaire
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($inter);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirect($this->generateUrl('alc_inter_homepage'));
        }
        return $this->render('ALCInterBundle:Inter:modinter.html.twig', array(
                    'form' => $form->createView(),
        ));
    }
    
     
}//-- Fin class
