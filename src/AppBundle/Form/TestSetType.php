<?php
/**
 * Created by PhpStorm.
 * User: gilles
 * Date: 18/02/18
 * Time: 20:09
 */

namespace AppBundle\Form;


use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class TestSetType extends AbstractType
{
    private $user;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->user = $tokenStorage->getToken()->getUser();
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('carac', EntityType::class, array(
                'class' => 'AppBundle\Entity\UserCarac',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('uc')
                        ->where('uc.user = :user')
                        ->setParameter('user', $this->user);
                },
                'required' => false,
            ))
            ->add('skill', EntityType::class, array(
                'class' => 'AppBundle\Entity\UserSkill',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('us')
                        ->where('us.user = :user')
                        ->setParameter('user', $this->user);
                },
                'required' => false,
            ))
            ->add('discipline', EntityType::class, array(
                'class' => 'AppBundle\Entity\UserDiscipline',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('ud')
                        ->where('ud.user = :user')
                        ->setParameter('user', $this->user);
                },
                'required' => false,
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\TestSet',
            'character' => null

        ));

    }

}