<?php

namespace App\Controller\Frontend;

use App\Entity\Marketplace\Order;
use App\Entity\Marketplace\Order\OrderItem;
use App\Entity\User\Customer;
use App\Form\Type\MarketplaceOrderCheckoutType;
use App\Form\Type\MarketplaceOrderTrackingType;
use App\Form\Type\MarketplaceOrderType;
use App\Form\Type\MarketplaceOrderWishlistTransformType;
use Base\Form\FormProcessorInterface;
use Base\Entity\User\Notification;
use Base\Service\TranslatorInterface;
use Payum\Bundle\PayumBundle\Command\CreateCaptureTokenCommand;
use Payum\Core\Model\Payment;
use Payum\Core\Model\Token;
use Payum\Core\Payum;
use Payum\Core\Request\Capture;
use Payum\Core\Request\GetHumanStatus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Omnipay\Omnipay;

class MainController extends MarketplaceController
{

    /**
     * @Route("/form", name="form_type")
     */
    public function Form(Request $request): Response
    {
        return $this->formProxy

            ->createProcessor("my_form", FormType::class, ["use_model" => true])
            ->onDefault(function(FormProcessorInterface $formProcessor) use (&$order) {


                return $this->render('default.html.twig', [
                    "form" => $formProcessor->getForm()->createView(),
                    "order" => $order,
                ]);
            })
            ->onSubmit(function(FormProcessorInterface $formProcessor, Request $request) use (&$order) {

                // PAGE 1
                return $this->render('page1.html.twig', [
                    "form" => $formProcessor->getForm(1)->createView(),
                ]);
            })
            ->onSubmit(function(FormProcessorInterface $formProcessor, Request $request) use (&$order) {

                // PAGE 2
                return $this->render('page2.html.twig', [
                    "form" => $formProcessor->getForm(2)->createView(),
                ]);
            })
            ->onSubmit(function(FormProcessorInterface $formProcessor, Request $request) use (&$order) {

                // PAGE 3
                return $this->render('page3.twig', [
                    "form" => $formProcessor->getForm(3)->createView(),
                ]);
            })
            ->handleRequest($request)
            ->getResponse();
    }
}
