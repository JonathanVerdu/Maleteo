<?php

namespace App\Form;

use App\Entity\Comentario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OpinionesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comentario', TextareaType::class,[
                'label' => 'Comentario: ',
                'required' => true,
                'attr' => [
                    'class' => 'the-form__input',
                ]
            ])
            ->add('ciudad', ChoiceType::class, [
                'label' => 'Ciudad',
                'choices' => [
                    'Madrid' => 'Madrid',
                    'Puerto Hurraco' => 'Puerto Hurraco',
                    'Villabolluyos' => 'Villabolluyos'
                ],
                'attr' => [
                    'class' => 'the-form__input',
                    'class' => 'the-form__input the-form__select'
                ]
            ])
            ->add('enviar', SubmitType::class, [
                'label' => 'CREAR',
                'attr' => [
                    'class' => 'the-form__btn btn btn-lg btn-primary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comentario::class,
        ]);
    }
}
