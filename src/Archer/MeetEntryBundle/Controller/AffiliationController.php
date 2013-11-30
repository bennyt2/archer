<?php

namespace Archer\MeetEntryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Archer\MeetEntryBundle\Entity\Affiliation;
use Archer\MeetEntryBundle\Form\AffiliationType;

/**
 * Affiliation controller.
 *
 * @Route("/affiliation")
 */
class AffiliationController extends Controller
{

    /**
     * Lists all Affiliation entities.
     *
     * @Route("/", name="affiliation")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ArcherMeetEntryBundle:Affiliation')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Affiliation entity.
     *
     * @Route("/", name="affiliation_create")
     * @Method("POST")
     * @Template("ArcherMeetEntryBundle:Affiliation:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Affiliation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('affiliation_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Affiliation entity.
    *
    * @param Affiliation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Affiliation $entity)
    {
        $form = $this->createForm(new AffiliationType(), $entity, array(
            'action' => $this->generateUrl('affiliation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Affiliation entity.
     *
     * @Route("/new", name="affiliation_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Affiliation();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Affiliation entity.
     *
     * @Route("/{id}", name="affiliation_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:Affiliation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Affiliation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Affiliation entity.
     *
     * @Route("/{id}/edit", name="affiliation_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:Affiliation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Affiliation entity.');
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
    * Creates a form to edit a Affiliation entity.
    *
    * @param Affiliation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Affiliation $entity)
    {
        $form = $this->createForm(new AffiliationType(), $entity, array(
            'action' => $this->generateUrl('affiliation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Affiliation entity.
     *
     * @Route("/{id}", name="affiliation_update")
     * @Method("PUT")
     * @Template("ArcherMeetEntryBundle:Affiliation:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:Affiliation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Affiliation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('affiliation_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Affiliation entity.
     *
     * @Route("/{id}", name="affiliation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ArcherMeetEntryBundle:Affiliation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Affiliation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('affiliation'));
    }

    /**
     * Creates a form to delete a Affiliation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('affiliation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
