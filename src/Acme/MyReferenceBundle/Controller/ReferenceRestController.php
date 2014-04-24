<?php
namespace Acme\MyReferenceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
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
     * @View(serializerGroups={"sonata_api_read", "reference"}, serializerEnableMaxDepthChecks=true)
     * 
	 */
	public function getReferenceAction($id){
  	    $em  =$this->getDoctrine()->getManager();
    	$reference = $em->getRepository('AcmeMyReferenceBundle:Reference')->findOneById($id);
    	if(!is_object($reference)){
    		throw $this->createNotFoundException();
    	}
    	return array('reference' => $reference,
            );
    }

    /**
     * @return array
     * @View(serializerGroups={"sonata_api_read", "reference"}, serializerEnableMaxDepthChecks=true)
     * 
     */

    public function getReferencesAction()
    {
    	$em  =$this->getDoctrine()->getManager();
    	$references = $em->getRepository('AcmeMyReferenceBundle:Reference')->findAll();
    	if(!($references)){
    		throw $this->createNotFoundException();
    	}
    	return array('references' => $references);
    }

    /**
     * Retrieves a specific media
     *
     * @ApiDoc(
     *  requirements={
     *      {"name"="id", "dataType"="integer", "requirement"="\d+", "description"="media id"}
     *  },
     *  output={"class"="Sonata\MediaBundle\Model\Media", "groups"="sonata_api_read"},
     *  statusCodes={
     *      200="Returned when successful",
     *      404="Returned when media is not found"
     *  }
     * )
     *
     * @View(serializerGroups="sonata_api_read", serializerEnableMaxDepthChecks=true)
     *
     * @param $id
     *
     * @return Media
     */

    public function getMediaAction($id)
    {
        $em  =$this->getDoctrine()->getManager();
        $image = $em->getRepository('ApplicationSonataMediaBundle:Media')->findOneById($id);
        return array('image' => $image);
    }
}