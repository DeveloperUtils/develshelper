<?php

namespace WorkingDevelopers\CodeSnippets\Themes\CoreThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExampleController extends Controller
{
    public function showAction($example)
    {
        $explode = explode('/',$example);
        if (count($explode)>1) {
            $folder = '/' . $explode[0];
            $example = end($explode);
        }else {
            $folder = '';
        }
        $example = str_ireplace('.html','',$example);
        return $this->render("WdCsThemesCoreThemeBundle:Example{$folder}:{$example}.html.twig");
    }

    public function indexAction()
    {
        return $this->render('WdCsThemesCoreThemeBundle:Example:dashboard.html.twig');
    }
}
