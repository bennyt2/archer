<?php

namespace Archer\MeetEntryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Archer\MeetEntryBundle\Entity\Athlete;
use Archer\MeetEntryBundle\Form\AthleteType;

/**
 * Athlete controller.
 *
 * @Route("/athlete")
 */
class AthleteController extends Controller
{

    /**
     * Lists all Athlete entities.
     *
     * @Route("/", name="athlete")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ArcherMeetEntryBundle:Athlete')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Athlete entity.
     *
     * @Route("/", name="athlete_create")
     * @Method("POST")
     * @Template("ArcherMeetEntryBundle:Athlete:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Athlete();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('athlete_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Athlete entity.
    *
    * @param Athlete $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Athlete $entity)
    {
        $form = $this->createForm(new AthleteType(), $entity, array(
            'action' => $this->generateUrl('athlete_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Athlete entity.
     *
     * @Route("/new", name="athlete_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Athlete();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Athlete entity.
     *
     * @Route("/{id}", name="athlete_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:Athlete')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Athlete entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Athlete entity.
     *
     * @Route("/{id}/edit", name="athlete_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:Athlete')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Athlete entity.');
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
    * Creates a form to edit a Athlete entity.
    *
    * @param Athlete $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Athlete $entity)
    {
        $form = $this->createForm(new AthleteType(), $entity, array(
            'action' => $this->generateUrl('athlete_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Athlete entity.
     *
     * @Route("/{id}", name="athlete_update")
     * @Method("PUT")
     * @Template("ArcherMeetEntryBundle:Athlete:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:Athlete')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Athlete entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('athlete_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Athlete entity.
     *
     * @Route("/{id}", name="athlete_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ArcherMeetEntryBundle:Athlete')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Athlete entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('athlete'));
    }

    /**
     * Creates a form to delete a Athlete entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('athlete_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
