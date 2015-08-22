<?php

namespace WorkingDevelopers\CodeSnippets\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WdCsCoreBundle:Default:index.html.twig', array('name' => 'Nix'));
    }
}
