<?php
/**
 * Created by PhpStorm.
 * User: marius
 * Date: 18.11.22
 * Time: 16.30
 */

namespace PlumTreeSystems\SyliusSecureTradingPlugin\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Validator\Constraints\NotBlank;

class SecureTradingGatewayConfigurationType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(\Symfony\Component\Form\FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'plumtreesystems.form.gateway_configuration.secure_trading.username',
                'constraints' => [
                    new NotBlank([
                        'message' => 'plumtreesystems.form.gateway_configuration.secure_trading.username.not_blank',
                        'groups' => 'sylius'
                    ]),
                ]
            ])
            ->add('password', TextType::class, [
                'label' => 'plumtreesystems.form.gateway_configuration.secure_trading.password',
                'constraints' => [
                    new NotBlank([
                        'message' => 'plumtreesystems.form.gateway_configuration.secure_trading.password.not_blank',
                        'groups' => 'sylius'
                    ]),
                ]
            ])
            ->add('site_reference', TextType::class, [
                'label' => 'plumtreesystems.form.gateway_configuration.secure_trading.site_reference',
                'constraints' => [
                    new NotBlank([
                        'message' => 'plumtreesystems.form.gateway_configuration.secure_trading.site_reference.not_blank',
                        'groups' => 'sylius'
                    ]),
                ]
            ])
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $data = $event->getData();

                $data['payum.http_client'] = '@sylius.payum.http_client';
            });
    }
}