<?php

namespace WorkingDevelopers\CodeSnippets\Themes\CoreThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WdCsThemesCoreThemeBundle:Default:index.html.twig', array('name' => $name));
    }
}
