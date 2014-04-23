<?php
namespace Acme\MyReferenceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ReferenceRestController extends Controller
{
  public function getReferenceAction($title){
    $reference = $this->getRepository('MyReferenceBundle:Reference')->findOneByTitle($title);
    if(!is_object($reference)){
      throw $this->createNotFoundException();
    }
    return $reference;
  }
}