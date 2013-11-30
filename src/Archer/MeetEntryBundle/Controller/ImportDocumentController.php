<?php
namespace Archer\MeetEntryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Archer\MeetEntryBundle\Entity\ImportDocument;
use Archer\MeetEntryBundle\Form\ImportDocumentType;

/**
 * Athlete controller.
 *
 * @Route("/import")
 */
class ImportDocumentController extends Controller
{
    
    /**
     * Displays a form to create a new Athlete entity.
     *
     * @Route("/athlete", name="athlete_import")
     * @Method("POST")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $entity = new ImportDocument();
        $form   = $this->createCreateForm($entity);
        
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('import_document_show', array('id' => $entity->getId())));
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
    public function createCreateForm(ImportDocument $entity)
    {
        $form = $this->createForm(new ImportDocumentType(), $entity, array(
            'action' => $this->generateUrl('athlete_import'),
            'method' => 'POST',
        ));
        
        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
    
    /**
     * Finds and displays an Import Document entity.
     *
     * @Route("/{id}", name="import_document_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:ImportDocument')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ImportDocument entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
    
    /**
     * Parses import file and provides ability to 
     *
     * @Route("/{id}", name="import_document_show")
     * @Method("GET")
     * @Template()
     */
    public function importShowAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ArcherMeetEntryBundle:ImportDocument')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ImportDocument entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
?>