<?php
namespace Acme\MyReferenceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
//use Sensio\Bunde\FrameworkExtraBundle\Configuration\ParamConverter;


class ReferenceRestController extends Controller
{
	/**
	 * @param Reference $reference
	 * @return array
	 * @View()
	 */
	public function getReferenceAction($title){
  		$em  =$this->getDoctrine()->getManager();
    	$reference = $em->getRepository('AcmeMyReferenceBundle:Reference')->findOneByTitle($title);
    	if(!is_object($reference)){
    		throw $this->createNotFoundException();
    	}
    	return $reference;
    }

    /**
     * @return array
     * @View()
     * 
     */

    public function getReferencesAction()
    {
    	$em  =$this->getDoctrine()->getManager();
    	$references = $em->getRepository('AcmeMyReferenceBundle:Reference')->findAll();
    	if(!is_object($references)){
    		throw $this->createNotFoundException();
    	}
    	foreach ($references as $reference) {
    		$array[] = array($reference);
    	}
    	return 	json_encode($array);
    }
}