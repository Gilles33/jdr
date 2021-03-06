<?php
namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('characterName', TextType::class, array(
                'label' => 'Nom du personnage'
            ))
            ->add('concept', TextType::class, array(
                'label' => 'Concept'
            ))
            ->add('clan', TextType::class, array(
                'label' => 'Clan'
            ))
            ->add('will', IntegerType::class, array(
                'label' => 'Volonté'
            ))
            ->add('blood_power', IntegerType::class, array(
                'label' => 'Puissance de sang'
            ))
            ->add('totalExperience', IntegerType::class, array(
                'label' => 'Experience Totale'
            ))
            ->add('spentExperience', IntegerType::class, array(
                'label' => 'Experience dépensée'
            ))
            ->add('blood_power', IntegerType::class, array(
                'label' => 'Puissance de sang'
            ))
            ->add('caracs', CollectionType::class, array(
                'entry_type' => UserCaracType::class,
                'label' => false
            ))
            ->add('skills', CollectionType::class, array(
                'entry_type' => UserSkillType::class,
                'label' => false
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Enregistrer'
            ))
        ;
    }
}