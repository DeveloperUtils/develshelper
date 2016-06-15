<?php

namespace WorkingDevelopers\CodeSnippets\CsDomainBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use WorkingDevelopers\CodeSnippets\CsDomainBundle\Entity\ProgrammingLanguage;
use WorkingDevelopers\CodeSnippets\CsDomainBundle\Form\ProgrammingLanguageType;

/**
 * ProgrammingLanguage controller.
 *
 */
class ProgrammingLanguageController extends Controller
{

    /**
     * Lists all ProgrammingLanguage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WdCsDomainBundle:ProgrammingLanguage')->findAll();

        return $this->render('WdCsDomainBundle:ProgrammingLanguage:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new ProgrammingLanguage entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ProgrammingLanguage();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('wd_cs_admin_programminglanguage_show', array('id' => $entity->getId())));
        }

        return $this->render('WdCsDomainBundle:ProgrammingLanguage:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ProgrammingLanguage entity.
     *
     * @param ProgrammingLanguage $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ProgrammingLanguage $entity)
    {
        $form = $this->createForm(ProgrammingLanguageType::class, $entity, array(
            'action' => $this->generateUrl('wd_cs_admin_programminglanguage_create'),
            'method' => 'POST',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ProgrammingLanguage entity.
     *
     */
    public function newAction()
    {
        $entity = new ProgrammingLanguage();
        $form = $this->createCreateForm($entity);

        return $this->render('WdCsDomainBundle:ProgrammingLanguage:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProgrammingLanguage entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WdCsDomainBundle:ProgrammingLanguage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProgrammingLanguage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WdCsDomainBundle:ProgrammingLanguage:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a ProgrammingLanguage entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('wd_cs_admin_programminglanguage_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, array('label' => 'Delete'))
            ->getForm();
    }

    /**
     * Displays a form to edit an existing ProgrammingLanguage entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WdCsDomainBundle:ProgrammingLanguage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProgrammingLanguage entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WdCsDomainBundle:ProgrammingLanguage:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a ProgrammingLanguage entity.
     *
     * @param ProgrammingLanguage $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(ProgrammingLanguage $entity)
    {
        $form = $this->createForm(ProgrammingLanguageType::class, $entity, array(
            'action' => $this->generateUrl('wd_cs_admin_programminglanguage_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing ProgrammingLanguage entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WdCsDomainBundle:ProgrammingLanguage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProgrammingLanguage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('wd_cs_admin_programminglanguage_edit', array('id' => $id)));
        }

        return $this->render('WdCsDomainBundle:ProgrammingLanguage:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProgrammingLanguage entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WdCsDomainBundle:ProgrammingLanguage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProgrammingLanguage entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('wd_cs_admin_programminglanguage'));
    }
}
