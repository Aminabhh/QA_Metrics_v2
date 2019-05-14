<?php
/**
 * Created by PhpStorm.
 * User: Win10-Space
 * Date: 18/04/2019
 * Time: 10:33
 */
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;



class ProjectFormType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)

    {
        $builder
            ->add('name' ,TextType::class)
            ->add('description',TextareaType::class)

        ;
    }
}
