<?php

namespace Archer\MeetEntryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Archer\MeetEntryBundle\Entity\EventType;
use Archer\MeetEntryBundle\Form\EventTypeType;

/**
 * EventType controller.
 *
 * @Route("/eventtype")
 */
class EventTypeController extends Controller
{

    /**
     * Lists all EventType entities.
     *
     * @Route("/", name="eventtype")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ArcherMeetEntryBundle:EventType')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EventType entity.
     *
     * @Route("/", name="eventtype_create")
     * @Method("POST")
     * @Template("ArcherMeetEntryBundle:EventType:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EventType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('eventtype_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a EventType entity.
    *
    * @param EventType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(EventType $entity)
    {
        $form = $this->createForm(new EventTypeType(), $entity, array(
            'action' => $this->generateUrl('eventtype_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EventType entity.
     *
     * @Route("/new", name="eventtype_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EventType();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EventType entity.
     *
     * @Route("/{id}", name="eventtype_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:EventType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EventType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EventType entity.
     *
     * @Route("/{id}/edit", name="eventtype_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:EventType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EventType entity.');
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
    * Creates a form to edit a EventType entity.
    *
    * @param EventType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EventType $entity)
    {
        $form = $this->createForm(new EventTypeType(), $entity, array(
            'action' => $this->generateUrl('eventtype_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EventType entity.
     *
     * @Route("/{id}", name="eventtype_update")
     * @Method("PUT")
     * @Template("ArcherMeetEntryBundle:EventType:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:EventType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EventType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('eventtype_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EventType entity.
     *
     * @Route("/{id}", name="eventtype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ArcherMeetEntryBundle:EventType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EventType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('eventtype'));
    }

    /**
     * Creates a form to delete a EventType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eventtype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
