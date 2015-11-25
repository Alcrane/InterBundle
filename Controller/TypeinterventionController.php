<?php
//-- Inter/src/ALC/InterBundle/Controller/TypeinterventionController.php

namespace ALC\InterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

//-- Les tables
use ALC\InterBundle\Entity\Typeinter;


//-- Les formulaires
use ALC\InterBundle\Form\TypeinterType;

class TypeinterventionController extends Controller
{
    
    
    /*-----------------------------------------------------
     * public function gesttypAction()
     * Gestion des types d'inter
     */
    public function gesttypAction()
    {
        // On récupère notre objet Paginator
        $listType = $this->getDoctrine ()
                ->getManager ()
                ->getRepository ('ALCInterBundle:Typeinter')
                ->findAllOrderedByType()
                //->getInter ($page, $nbPerPage)
        ;
        
        return $this->render('ALCInterBundle:Typeintervention:gesttyp.html.twig', array(
            'listType' => $listType
                ));
    }
    
    /*-----------------------------------------------------
     * public function addtypAction()
     * Gestion des types d'intervention
     * Ajout d'un nouveau type
     */
    public function addtypAction(Request $request)
    {
       $type = new Typeinter();
       $form = $this->get('form.factory')->create(new TypeinterType, $type);
        
       //-- Test du formulaire
       if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirect($this->generateUrl('alc_inter_gesttyp'));
        }
        return $this->render('ALCInterBundle:Typeintervention:addtyp.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /*-----------------------------------------------------
     * public function modtypAction()
     * Gestion des types d'intervention
     * Modification d'un type
     */
    public function modtypAction($id, Request $request)
    {
        //-- On récupère l'EntityManager
        $type = $this->getDoctrine ()
                ->getManager ()
                ->getRepository ('ALCInterBundle:Typeinter')
                ->find ($id);
        
        // Si le site n'existe pas, on affiche une erreur 404
        if ($type == null)
        {
            throw $this->createNotFoundException ("Le type d'id " . $id . " n'existe pas.");
        }
        
        $form = $this->get('form.factory')->create(new TypeinterType, $type);
        
        //-- Test du formulaire
       if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirect($this->generateUrl('alc_inter_gesttyp'));
        }

        
        
        return $this->render('ALCInterBundle:Typeintervention:modtyp.html.twig', array(
            'form' => $form->createView(),
                ));
    }
    
    /*-----------------------------------------------------
     * public function deletetypeAction()
     * Gestion des types d'intervention
     * Supression d'un type
     */
    public function deletetypAction($id, Request $request)
    {
        //-- On récupère l'EntityManager
        $type = $this->getDoctrine ()
                ->getManager ()
                ->getRepository ('ALCInterBundle:Typeinter')
                ->find ($id);
        
        // Si le site n'existe pas, on affiche une erreur 404
        if ($type == null)
        {
            throw $this->createNotFoundException ("Le type d'id " . $id . " n'existe pas.");
        }
        
        $form = $this->get('form.factory')->create(new TypeinterType, $type);
        
        //-- Test du formulaire
       if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($type);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirect($this->generateUrl('alc_inter_gesttyp'));
        }

        
        
        return $this->render('ALCInterBundle:Typeintervention:deletetyp.html.twig', array(
            'type' => $type,
            'form' => $form->createView ()
        ));
    }
}//-- Fin class
