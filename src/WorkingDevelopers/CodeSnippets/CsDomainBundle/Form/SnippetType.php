<?php

namespace WorkingDevelopers\CodeSnippets\CsDomainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SnippetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('snippet')
            ->add('language')
            ->add('author')
            ->add('tags');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WorkingDevelopers\CodeSnippets\CsDomainBundle\Entity\Snippet'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'workingdevelopers_codesnippets_csdomainbundle_snippet';
    }
}
