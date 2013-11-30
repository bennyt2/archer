<?php

namespace Archer\MeetEntryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Archer\MeetEntryBundle\Entity\CompetitionType;
use Archer\MeetEntryBundle\Form\CompetitionTypeType;

/**
 * CompetitionType controller.
 *
 * @Route("/competitiontype")
 */
class CompetitionTypeController extends Controller
{

    /**
     * Lists all CompetitionType entities.
     *
     * @Route("/", name="competitiontype")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ArcherMeetEntryBundle:CompetitionType')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CompetitionType entity.
     *
     * @Route("/", name="competitiontype_create")
     * @Method("POST")
     * @Template("ArcherMeetEntryBundle:CompetitionType:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CompetitionType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('competitiontype_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a CompetitionType entity.
    *
    * @param CompetitionType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CompetitionType $entity)
    {
        $form = $this->createForm(new CompetitionTypeType(), $entity, array(
            'action' => $this->generateUrl('competitiontype_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CompetitionType entity.
     *
     * @Route("/new", name="competitiontype_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CompetitionType();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CompetitionType entity.
     *
     * @Route("/{id}", name="competitiontype_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:CompetitionType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompetitionType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CompetitionType entity.
     *
     * @Route("/{id}/edit", name="competitiontype_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:CompetitionType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompetitionType entity.');
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
    * Creates a form to edit a CompetitionType entity.
    *
    * @param CompetitionType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CompetitionType $entity)
    {
        $form = $this->createForm(new CompetitionTypeType(), $entity, array(
            'action' => $this->generateUrl('competitiontype_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CompetitionType entity.
     *
     * @Route("/{id}", name="competitiontype_update")
     * @Method("PUT")
     * @Template("ArcherMeetEntryBundle:CompetitionType:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:CompetitionType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompetitionType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('competitiontype_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CompetitionType entity.
     *
     * @Route("/{id}", name="competitiontype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ArcherMeetEntryBundle:CompetitionType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CompetitionType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('competitiontype'));
    }

    /**
     * Creates a form to delete a CompetitionType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('competitiontype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
