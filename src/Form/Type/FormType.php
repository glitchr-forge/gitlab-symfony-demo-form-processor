<?php

namespace App\Form\Type;

use App\Entity\Marketplace\Order\Method\PaymentMethod;
use App\Entity\Marketplace\Order\Method\ShippingMethod;
use App\Entity\Marketplace\Order\OrderItem;
use App\Entity\Marketplace\Product;
use App\Entity\Marketplace\Product\Extra\Wallpaper;
use App\Form\Model\MarketplaceOrderModel;
use Base\Field\Type\AssociationType;
use Base\Field\Type\ButtonType;
use Base\Field\Type\CollectionType;
use Base\Field\Type\NumberType;
use Base\Field\Type\SelectType;
use Base\Field\Type\SubmitType;
use Base\Service\TranslatorInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarketplaceOrderType extends AbstractType
{
    protected $translator;

    public function __construct(TranslatorInterface $translator) {

        $this->translator = $translator;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'data_class' => FormModel::class,
            'order' => null
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('element_1', TextType::class, ["required" => false])
            ->add('element_2', TextType::class, ["required" => false])
            ->add('element_3', TextType::class, ["required" => false])
            ->add('element_4', TextType::class, ["required" => false])
        ;
    }
}
