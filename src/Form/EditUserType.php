<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nombre', TextType::class)
        ->add('apellidos', TextType::class)
        ->add('dni', TextType::class)
        ->add('email', EmailType::class)
        ->add('foto', FileType::class, array(
            'label'=>'Foto',
            'required'=>'false',
            'attr'=> array(
                'class' => 'form-bio'
            )
        ))
        ->add('Guardar', SubmitType::class, array(
            'attr'=> array(
                'class' => 'btn-dark mt-2'
            )
        ))
    ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
