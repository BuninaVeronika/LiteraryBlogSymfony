<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('header')
            ->add('description')
            ->add('text')
            ->add('categories', Categories::class, ['mapped' => false])
            ->add('img')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('categories')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
