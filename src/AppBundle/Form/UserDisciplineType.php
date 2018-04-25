<?php
/**
 * Created by PhpStorm.
 * User: gilles
 * Date: 20/03/18
 * Time: 13:38
 */

namespace AppBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserDisciplineType extends AbstractType
{

     public function buildForm(FormBuilderInterface $builder, array $options)
     {
         $builder->add('discipline', EntityType::class, array(
             'class' => 'AppBundle\Entity\Discipline',
             'required' => 'false',
             'label' => 'discipline',
             'placeholder' => ''
         ))
             ->add('value', IntegerType::class, array(
                 'label' => 'valeur',
             ))
         ->add('save', SubmitType::class, array(
             'label' => 'Enregistrer',
         ));

     }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\UserDiscipline',
        ));
    }
}