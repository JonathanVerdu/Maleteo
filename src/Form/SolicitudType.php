<?php

namespace App\Form;

use App\Entity\Solicitud;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SolicitudType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
                'label' => 'Nombre',
                'required' => true,
                'attr' => [
                    'class' => 'the-form__input',
                    'placeholder' => "Vincent Chase"
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => true,
                'attr' => [
                    'class' => 'the-form__input',
                    'placeholder' => "vincent@mgal.com",
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
            ->add('aceptoPublicidad',CheckboxType::class, [
                'label' => 'Acepto la política de privacidad ',
                'required' => false,
            ])
            ->add('enviar', SubmitType::class, [
                'label' => 'ENVIAR',
                'attr' => [
                    'class' => 'the-form__btn btn btn-lg btn-primary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Solicitud::class,
        ]);
    }
}
