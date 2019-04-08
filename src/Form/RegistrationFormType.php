<?php
/**
 * Created by PhpStorm.
 * User: Win10-Space
 * Date: 08/04/2019
 * Time: 23:04
 */
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;
class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FirstName', TextType::class, array('required'=>true,'translation_domain' => 'FOSUserBundle'))

            ->add('LastName', TextType::class, array('required'=>true,'translation_domain' => 'FOSUserBundle'))
    ;

    }
    public function getParent()
    {
        return BaseRegistrationFormType::class;
    }
}