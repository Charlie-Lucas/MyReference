<?php

namespace Acme\MyReferenceBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ReferenceAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Reference Title'))
            ->add('image', 'entity', array('class' => 'Application\Sonata\MediaBundle\Entity\Media'))
            ->add('description')
            ->add('date','date')

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('description')
         //   ->add('image', 'entity', array('class' => 'Application\Sonata\MediaBundle\Entity\Media'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('image', 'entity', array('class' => 'Application\Sonata\MediaBundle\Entity\Media'))
            ->add('description')
        ;
    }
}