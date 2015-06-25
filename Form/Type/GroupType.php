<?php

namespace DoS\UserBundle\Form\Type;

use Sylius\Bundle\UserBundle\Form\Type\GroupType as BaseGroupType;
use Symfony\Component\Form\FormBuilderInterface;

class GroupType extends BaseGroupType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('color', 'text', array(
                'label' => 'ui.trans.group.form.color.label',
                'required' => false,
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'dos_group';
    }
}
