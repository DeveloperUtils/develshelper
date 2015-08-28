<?php
/**
 * Created by Christoph Graupner <ch.graupner@workingdeveloper.net>.
 * Date: 8/25/15
 * Time: 9:09 AM
 * Copyright (c) WorkingDevelopers.NET
 */

namespace WorkingDevelopers\CodeSnippets\CoreBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TagController extends Controller
{
    public function addTagAction()
    {
        return $this->render('WdCsCoreBundle:Default:index.html.twig', array('name' => 'add'));

    }

    public function editTagAction()
    {
        return $this->render('WdCsCoreBundle:Default:index.html.twig', array('name' => 'edit'));

    }

    public function deleteTagAction()
    {
        return $this->render('WdCsCoreBundle:Default:index.html.twig', array('name' => 'delete'));

    }
}