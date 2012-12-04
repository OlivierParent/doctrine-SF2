<?php
namespace Ahs\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('usrGivenname' , 'text'      , array('label' => 'Given name'     ))
                ->add('usrFamilyname', 'text'      , array('label' => 'Family name'    ))
                ->add('emails'       , 'collection', array('type'  => new EmailType()  ))
                ->add('adr'          , 'collection', array('type'  => new AddressType()))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ahs\DemoBundle\Entity\User',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }
}