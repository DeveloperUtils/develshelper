<?php

namespace WorkingDevelopers\CodeSnippets\CsDomainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WdCsDomainBundle:Default:index.html.twig', array('name' => 'Dashboard'));
    }
}
