<?php

namespace Acme\MyReferenceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeMyReferenceBundle:Default:index.html.twig', array('name' => $name));
    }
}
