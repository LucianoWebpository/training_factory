<?php


namespace App\form\type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', TextType::class, [
                'mapped'=>false])
            ->add('email', EmailType::class)
            ->add('voornaam', TextType::class)
            ->add('achternaam', TextType::class)
            ->add('prefix', TextType::class,["required"=>false])
            ->add('geboortedatum', DateType::class)
            ->add('geslacht', ChoiceType::class, [
                'choices' => [
                    'man' => 'man',
                    'vrouw' => 'vrouw',
                    'anders' => 'anders', ]])
            ->add('gebruikersnaam', TextType::class)
            ->add('aangenomen', DateType::class,["required"=>false])
            ->add('salaris', MoneyType::class,["required"=>false])
            ->add('straatnaam', TextType::class,["required"=>false])
            ->add('postcode', TextType::class,["required"=>false])
            ->add('woonplaats', TextType::class,["required"=>false])
            ->add('save', SubmitType::class);

    }

}