<?php

namespace Archer\MeetEntryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Archer\MeetEntryBundle\Entity\AffiliationType;
use Archer\MeetEntryBundle\Form\AffiliationTypeType;

/**
 * AffiliationType controller.
 *
 * @Route("/affiliationtype")
 */
class AffiliationTypeController extends Controller
{

    /**
     * Lists all AffiliationType entities.
     *
     * @Route("/", name="affiliationtype")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ArcherMeetEntryBundle:AffiliationType')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AffiliationType entity.
     *
     * @Route("/", name="affiliationtype_create")
     * @Method("POST")
     * @Template("ArcherMeetEntryBundle:AffiliationType:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new AffiliationType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('affiliationtype_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a AffiliationType entity.
    *
    * @param AffiliationType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(AffiliationType $entity)
    {
        $form = $this->createForm(new AffiliationTypeType(), $entity, array(
            'action' => $this->generateUrl('affiliationtype_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AffiliationType entity.
     *
     * @Route("/new", name="affiliationtype_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AffiliationType();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AffiliationType entity.
     *
     * @Route("/{id}", name="affiliationtype_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:AffiliationType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AffiliationType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AffiliationType entity.
     *
     * @Route("/{id}/edit", name="affiliationtype_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:AffiliationType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AffiliationType entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a AffiliationType entity.
    *
    * @param AffiliationType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AffiliationType $entity)
    {
        $form = $this->createForm(new AffiliationTypeType(), $entity, array(
            'action' => $this->generateUrl('affiliationtype_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AffiliationType entity.
     *
     * @Route("/{id}", name="affiliationtype_update")
     * @Method("PUT")
     * @Template("ArcherMeetEntryBundle:AffiliationType:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:AffiliationType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AffiliationType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('affiliationtype_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AffiliationType entity.
     *
     * @Route("/{id}", name="affiliationtype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ArcherMeetEntryBundle:AffiliationType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AffiliationType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('affiliationtype'));
    }

    /**
     * Creates a form to delete a AffiliationType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('affiliationtype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
