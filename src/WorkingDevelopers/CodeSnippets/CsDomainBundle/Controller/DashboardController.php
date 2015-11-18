<?php

namespace WorkingDevelopers\CodeSnippets\CsDomainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use WorkingDevelopers\CodeSnippets\CoreBundle\Entity\Tag;
use WorkingDevelopers\CodeSnippets\CsDomainBundle\Entity\Author;
use WorkingDevelopers\CodeSnippets\CsDomainBundle\Entity\ProgrammingLanguage;
use WorkingDevelopers\CodeSnippets\CsDomainBundle\Entity\Snippet;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render(
            'WdCsDomainBundle:Dashboard:index.html.twig',
            array(
                'name' => 'Dashboard',
                'count' => [
                    'snippets' => $this->getDoctrine()->getRepository(Snippet::class)->count(),
                    'tags' => $this->getDoctrine()->getRepository(Tag::class)->count(),
                    'languages' => $this->getDoctrine()->getRepository(ProgrammingLanguage::class)->count(),
                    'authors' => $this->getDoctrine()->getRepository(Author::class)->count()

                ]
            )
        );
    }
}
