<?php
/**
 * Created by PhpStorm.
 * User: gilles
 * Date: 18/02/18
 * Time: 20:09
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use AppBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class StaticTestType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('defendant', TargetType::class, array(
                'label' => false,
            ))
            ->add('game_master_value', IntegerType::class, array(
                'label' => 'difficulté du test',
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Défier'
            ));
    }

}