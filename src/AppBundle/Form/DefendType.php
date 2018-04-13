<?php
/**
 * Created by PhpStorm.
 * User: gilles
 * Date: 18/02/18
 * Time: 20:09
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefendType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('defCarac1', ChoiceType::class, array(
                'label' => 'Carac 1',
                'choices' => array(
                    'aucune' => null,
                    'force' => 'strength',
                    'défense' => 'defense'
                ),
                'expanded' => false
            ))
            ->add('defCarac2', ChoiceType::class, array(
                'label' => 'Carac 2',
                'choices' => array(
                    'aucune' => null,
                    'force' => 'strength',
                    'défense' => 'defense'
                ),
                'expanded' => false
            ))
            ->add('defCarac3', ChoiceType::class, array(
                'label' => 'Carac 3',
                'choices' => array(
                    'aucune' => null,
                    'force' => 'strength',
                    'défense' => 'defense'
                ),
                'expanded' => false
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Défendre'
            ))
        ;
    }



}