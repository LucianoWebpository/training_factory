<?php


namespace App\form\type;


use App\Entity\Activiteiten;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class LesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('activiteit', EntityType::class, [
            'class' => Activiteiten::class,
            'choice_label' => 'naam'
        ])
            ->add('tijd', DateTimeType::class)

            ->add('locatie', TextType::class)
            ->add('max_personen', TextType::class)
            ->add('save' , SubmitType::class);

    }

}