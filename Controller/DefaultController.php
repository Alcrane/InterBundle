<?php

namespace ALC\InterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ALCInterBundle:Default:index.html.twig', array('name' => $name));
    }
}
