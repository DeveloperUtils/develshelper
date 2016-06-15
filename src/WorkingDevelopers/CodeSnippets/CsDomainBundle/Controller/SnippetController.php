<?php

namespace WorkingDevelopers\CodeSnippets\CsDomainBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use WorkingDevelopers\CodeSnippets\CoreBundle\Entity\Tag;
use WorkingDevelopers\CodeSnippets\CsDomainBundle\Entity\Snippet;
use WorkingDevelopers\CodeSnippets\CsDomainBundle\Form\SnippetType;

/**
 * Snippet controller.
 *
 */
class SnippetController extends Controller
{

    /**
     * Lists all Snippet entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WdCsDomainBundle:Snippet')->findAll();

        return $this->render('WdCsDomainBundle:Snippet:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Snippet entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Snippet();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('wd_cs_admin_snippet_show', array('id' => $entity->getId())));
        }

        return $this->render('WdCsDomainBundle:Snippet:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Snippet entity.
     *
     * @param Snippet $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Snippet $entity)
    {
        $form = $this->createForm(SnippetType::class, $entity, array(
            'action' => $this->generateUrl('wd_cs_admin_snippet_create'),
            'method' => 'POST',
        ));

        $form->add('submit', ButtonType::class, array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Snippet entity.
     *
     */
    public function newAction()
    {
        $entity = new Snippet();
        $tag1 = new Tag();
        $tag1->setName('test');
        $entity->addTag($tag1);
        $form = $this->createCreateForm($entity);

        return $this->render('WdCsDomainBundle:Snippet:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Snippet entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WdCsDomainBundle:Snippet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Snippet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WdCsDomainBundle:Snippet:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a Snippet entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('wd_cs_admin_snippet_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', ButtonType::class, array('label' => 'Delete'))
            ->getForm();
    }

    /**
     * Displays a form to edit an existing Snippet entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WdCsDomainBundle:Snippet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Snippet entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WdCsDomainBundle:Snippet:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Snippet entity.
     *
     * @param Snippet $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Snippet $entity)
    {
        $form = $this->createForm(SnippetType::class, $entity, array(
            'action' => $this->generateUrl('wd_cs_admin_snippet_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', ButtonType::class, array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Snippet entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WdCsDomainBundle:Snippet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Snippet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('wd_cs_admin_snippet_edit', array('id' => $id)));
        }

        return $this->render('WdCsDomainBundle:Snippet:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Snippet entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WdCsDomainBundle:Snippet')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Snippet entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('wd_cs_admin_snippet'));
    }
}
