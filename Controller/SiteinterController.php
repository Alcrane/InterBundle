<?php
//-- Inter/src/ALC/InterBundle/Controller/SiteinterController.php

namespace ALC\InterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;

//-- Les tables
use ALC\InterBundle\Entity\Site;

//-- Les formulaires
use ALC\InterBundle\Form\SiteType;

class SiteinterController extends Controller
{
   
    
   
    
     /*-----------------------------------------------------
     * public function gestsiteAction()
     * Gestion des sites
     */
    public function gestsiteAction()
    {
        // On récupère notre objet Paginator
        $listSites = $this->getDoctrine ()
                ->getManager ()
                ->getRepository ('ALCInterBundle:Site')
                ->findAllOrderedBySite()
                //->getInter ($page, $nbPerPage)
        ;

        // On calcule le nombre total de pages grâce au count($listAdverts) qui retourne le nombre total d'annonces
        //$nbPages = ceil (count ($listSites) / $nbPerPage);

        // Si la page n'existe pas, on retourne une 404
        /*if ($page > $nbPages)
        {
            throw $this->createNotFoundException("La page ".$page." n'existe pas.");
        }*/
        
        return $this->render('ALCInterBundle:Siteinter:gestsite.html.twig', array(
            'listSites' => $listSites
                ));
    }
    
    /*-----------------------------------------------------
     * public function modsiteAction()
     * Gestion des sites
     */
    public function modsiteAction($id, Request $request)
    {
        //-- On récupère l'EntityManager
        $site = $this->getDoctrine ()
                ->getManager ()
                ->getRepository ('ALCInterBundle:Site')
                ->find ($id);
        
        // Si le site n'existe pas, on affiche une erreur 404
        if ($site == null)
        {
            throw $this->createNotFoundException ("Le site d'id " . $id . " n'existe pas.");
        }
        
        $form = $this->get('form.factory')->create(new SiteType, $site);
        
        //-- Test du formulaire
       if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($site);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirect($this->generateUrl('alc_inter_gestsite'));
        }

        
        
        return $this->render('ALCInterBundle:Siteinter:modsite.html.twig', array(
            'form' => $form->createView(),
                ));
    }
    
    /*-----------------------------------------------------
     * public function addsiteAction()
     * Gestion des sites
     * Ajout d'un nouveau site
     */
    public function addsiteAction(Request $request)
    {
       $site = new Site();
       $form = $this->get('form.factory')->create(new SiteType, $site);
        
       //-- Test du formulaire
       if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($site);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirect($this->generateUrl('alc_inter_gestsite'));
        }
        return $this->render('ALCInterBundle:Siteinter:addsite.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
     /*-----------------------------------------------------
     * public function deletesiteAction()
     * Gestion des sites
     */
    public function deletesiteAction($id, Request $request)
    {
        //-- On récupère l'EntityManager
        $site = $this->getDoctrine ()
                ->getManager ()
                ->getRepository ('ALCInterBundle:Site')
                ->find ($id);
        
        // Si le site n'existe pas, on affiche une erreur 404
        if ($site == null)
        {
            throw $this->createNotFoundException ("Le site d'id " . $id . " n'existe pas.");
        }
        
        $form = $this->get('form.factory')->create(new SiteType, $site);
        
        //-- Test du formulaire
       if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($site);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirect($this->generateUrl('alc_inter_gestsite'));
        }

        
        
        return $this->render('ALCInterBundle:Siteinter:deletesite.html.twig', array(
            'site' => $site,
            'form' => $form->createView ()
        ));
    }
}
