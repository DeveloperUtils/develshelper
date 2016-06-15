<?php

namespace WorkingDevelopers\CodeSnippets\CsDomainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WorkingDevelopers\DevelsHelper\CoreBundle\Form\SimpleTagType;
use WorkingDevelopers\CodeSnippets\CsDomainBundle\Entity\Snippet;

class SnippetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('snippet')
            ->add('language')
            ->add('author')
            ->add('tags', CollectionType::class,
                array(
                    'entry_type' => SimpleTagType::class,
                    'allow_add' => true,
                    'by_reference' => false,
                    'allow_delete' => true,
                    'block_name' => 'Tag'
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Snippet::class
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
