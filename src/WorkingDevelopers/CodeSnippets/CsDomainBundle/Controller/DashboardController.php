<?php

namespace WorkingDevelopers\CodeSnippets\CsDomainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('WdCsDomainBundle:Dashboard:index.html.twig', array('name' => 'Dashboard'));
    }
}
