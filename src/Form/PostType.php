<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\File;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('header',null,[
                'label'=> 'Заголовок'
                ]
            )
            ->add('description',null,[
                    'label'=> 'Краткое описание'
                ]
            )
            ->add('text',null,[
                    'label'=> 'Полное описание'
                ]
            )
            ->add('categories', Categories::class, [
                'mapped' => false,
                'label'=> 'Категории']
            )
            ->add('createdAt',  DateType::class, [
                'label'=> 'Дата создания']
            )
            ->add('updatedAt',  DateType::class, [
                'label'=> 'Дата обновления']
            )
            ->add('img', FileType::class, array(
                    'multiple' => false,
                    'label'=> 'Изображение',
                    'data_class' => null,
                    'attr' => array(
                        'accept' => 'image/*',
                    ),
                )
            )
            ->add('categories',null,[
                'label'=> 'Категории'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
