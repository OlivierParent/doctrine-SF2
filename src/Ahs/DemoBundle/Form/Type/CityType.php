<?php
namespace Ahs\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CityType extends AbstractType
{
    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ctyPostcode', 'text', array('label'=> 'Postcode'));
        $builder->add('ctyName'    , 'text', array('label'=> 'City'    ));
    }

    /**
     * @param array $options
     * @return array
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ahs\DemoBundle\Entity\City',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'city';
    }
}