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
     * Get Reference action
     * @var integer $id Id of the Reference
	 * @return array
	 * @View()
	 * 
	 */
	public function getReferenceAction($id){
  	    $em  =$this->getDoctrine()->getManager();
    	$reference = $em->getRepository('AcmeMyReferenceBundle:Reference')->findOneById($id);
        $image = $em->getRepository('ApplicationSonataMediaBundle:Media')->find($reference->getImage());
        $image = $image->getId();
        $image = $em->getRepository('ApplicationSonataMediaBundle:Media')->findOneById($image);
    	// if(!is_object($image)){
    	// 	throw $this->createNotFoundException();
    	// }
    	//return $reference;
    
    	return array('reference' => $reference,
                     'image'     => $image,


            );
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