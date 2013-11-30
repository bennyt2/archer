<?php
namespace Archer\MeetEntryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Homepage controller.
 */
class HomepageController extends Controller
{
    /**
     * provides easy access to all entity forms.
     *
     * @Route("/", name="_homepage")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('ArcherMeetEntryBundle:Homepage:index.html.twig');

    }
}
?>