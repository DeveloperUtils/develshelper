<?php

namespace WorkingDevelopers\DevelsHelper\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DhCoreBundle:Default:index.html.twig', array('name' => 'Nix'));
    }
}
