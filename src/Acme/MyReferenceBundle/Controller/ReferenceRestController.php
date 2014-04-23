<?php
namespace Acme\MyReferenceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Acme\MyReferenceBundle\Entity\Reference;


class ReferenceRestController extends Controller
{
	/**
	 * @param Reference $reference
	 * @return array
	 * @View()
	 * @ParamConverter("reference", class="\Acme\MyReferenceBundle\Entity\Reference")
	 */
	public function getReferenceAction(Reference $reference){
  	/*	$em  =$this->getDoctrine()->getManager();
    	$reference = $em->getRepository('AcmeMyReferenceBundle:Reference')->findOneByTitle($title);
    	if(!is_object($reference)){
    		throw $this->createNotFoundException();
    	}
    	return $reference;
    */
    	return array('reference' => $reference);
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
    /*	if(!($references)){
    		throw $this->createNotFoundException();
    	}
  
    	return 	$references;
    */
    	return array('references' => $references);
    }
}