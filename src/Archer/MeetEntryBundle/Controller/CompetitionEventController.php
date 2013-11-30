<?php

namespace Archer\MeetEntryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Archer\MeetEntryBundle\Entity\CompetitionEvent;
use Archer\MeetEntryBundle\Form\CompetitionEventType;

/**
 * CompetitionEvent controller.
 *
 * @Route("/competitionevent")
 */
class CompetitionEventController extends Controller
{

    /**
     * Lists all CompetitionEvent entities.
     *
     * @Route("/", name="competitionevent")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ArcherMeetEntryBundle:CompetitionEvent')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CompetitionEvent entity.
     *
     * @Route("/", name="competitionevent_create")
     * @Method("POST")
     * @Template("ArcherMeetEntryBundle:CompetitionEvent:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CompetitionEvent();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('competitionevent_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a CompetitionEvent entity.
    *
    * @param CompetitionEvent $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CompetitionEvent $entity)
    {
        $form = $this->createForm(new CompetitionEventType(), $entity, array(
            'action' => $this->generateUrl('competitionevent_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CompetitionEvent entity.
     *
     * @Route("/new", name="competitionevent_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CompetitionEvent();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CompetitionEvent entity.
     *
     * @Route("/{id}", name="competitionevent_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:CompetitionEvent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompetitionEvent entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CompetitionEvent entity.
     *
     * @Route("/{id}/edit", name="competitionevent_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:CompetitionEvent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompetitionEvent entity.');
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
    * Creates a form to edit a CompetitionEvent entity.
    *
    * @param CompetitionEvent $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CompetitionEvent $entity)
    {
        $form = $this->createForm(new CompetitionEventType(), $entity, array(
            'action' => $this->generateUrl('competitionevent_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CompetitionEvent entity.
     *
     * @Route("/{id}", name="competitionevent_update")
     * @Method("PUT")
     * @Template("ArcherMeetEntryBundle:CompetitionEvent:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:CompetitionEvent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompetitionEvent entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('competitionevent_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CompetitionEvent entity.
     *
     * @Route("/{id}", name="competitionevent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ArcherMeetEntryBundle:CompetitionEvent')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CompetitionEvent entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('competitionevent'));
    }

    /**
     * Creates a form to delete a CompetitionEvent entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('competitionevent_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
