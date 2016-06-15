<?php

namespace WorkingDevelopers\CodeSnippets\Themes\Core3rdPartyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExampleController extends Controller
{
    public function indexAction()
    {
        return $this->render('WdCsThemesCore3rdPartyBundle:Example:index.html.twig', array('name' => 'hallo'));
    }
}
