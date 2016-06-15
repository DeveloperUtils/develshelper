<?php

namespace WorkingDevelopers\CodeSnippets\CoreBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use WorkingDevelopers\CodeSnippets\CoreBundle\Entity\Config;
use WorkingDevelopers\CodeSnippets\CoreBundle\Form\ConfigType;

/**
 * Config controller.
 *
 */
class ConfigController extends Controller
{

    /**
     * Lists all Config entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WdCsCoreBundle:Config')->findAll();

        return $this->render('WdCsCoreBundle:Config:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Config entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Config();
        $form   = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('wd_cs_admin_config_show', array('id' => $entity->getId())));
        }

        return $this->render('WdCsCoreBundle:Config:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Config entity.
     *
     * @param Config $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Config $entity)
    {
        $form = $this->createForm(ConfigType::class, $entity, array(
            'action' => $this->generateUrl('wd_cs_admin_config_create'),
            'method' => 'POST',
        ));

        $form->add('submit', ButtonType::class, array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Config entity.
     *
     */
    public function newAction()
    {
        $entity = new Config();
        $form   = $this->createCreateForm($entity);

        return $this->render('WdCsCoreBundle:Config:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Config entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WdCsCoreBundle:Config')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Config entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WdCsCoreBundle:Config:show.html.twig', array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Config entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WdCsCoreBundle:Config')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Config entity.');
        }

        $editForm   = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WdCsCoreBundle:Config:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Config entity.
     *
     * @param Config $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Config $entity)
    {
        $form = $this->createForm(new ConfigType(), $entity, array(
            'action' => $this->generateUrl('wd_cs_admin_config_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Config entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WdCsCoreBundle:Config')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Config entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm   = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('wd_cs_admin_config_edit', array('id' => $id)));
        }

        return $this->render('WdCsCoreBundle:Config:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Config entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em     = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WdCsCoreBundle:Config')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Config entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('wd_cs_admin_config'));
    }

    /**
     * Creates a form to delete a Config entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl('wd_cs_admin_config_delete', array('id' => $id)))
                    ->setMethod('DELETE')
                    ->add('submit', 'submit', array('label' => 'Delete'))
                    ->getForm();
    }
}
