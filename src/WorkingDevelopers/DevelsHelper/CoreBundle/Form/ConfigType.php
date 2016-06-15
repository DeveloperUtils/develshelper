<?php

namespace WorkingDevelopers\DevelsHelper\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use WorkingDevelopers\DevelsHelper\CoreBundle\Entity\Config;

class ConfigType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('keyname')
            ->add('value')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Config::class
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'workingdevelopers_codesnippets_corebundle_config';
    }
}
