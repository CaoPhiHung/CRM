<?php

namespace Aevitas\LevisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Aevitas\LevisBundle\Form\FormGiftArticleType;
use Aevitas\LevisBundle\Document\GiftArticle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Aevitas\ConfigBundle\Config\Configuration;
use Aevitas\ConfigBundle\Config\ConfigData;
use Aevitas\LevisBundle\Document\Cart;
use Aevitas\LevisBundle\Form\FormGiftMetaType;
use Aevitas\LevisBundle\Document\GiftMeta;
use Vietland\UserBundle\Document\User;
use Vietland\AevitasBundle\Helper\Pagination;
use Vietland\UserBundle\Document\UserLog;

class CheckoutController extends Controller {

    /**
     * @Route("/checkout/stepone", name="checkout_step_one")
     * @Template()
     */
    public function checkoutStepOneAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        if (is_object($user))
            if ($user->hasRole('ROLE_STAFF'))
                return new RedirectResponse('/');
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $session = $this->get('session');
        $currentCart = $session->get('currentcart');
        if ($currentCart) {
            $cart = $dm->getRepository('AevitasLevisBundle:Cart')->find((int) $currentCart);
            if (!is_object($cart->getUser())) {
                if (is_object($user)) {
                    $user = $dm->getRepository('VietlandUserBundle:User')->find($user->getId());
                    $cart->setUser($user);
                    $dm->persist($cart);
                    $dm->flush();
                }
            }
        } else {
            $session = $this->getRequest()->getSession();
            $session->getFlashBag()->add('notice', 'Your cart is empty!');
            return new RedirectResponse($this->get('router')->generate('levis_gift_category'));
        }
        $giftForm = '';
        foreach ($cart->getGifts($dm) as $gift) {
            $giftForm .= $this->renderSelectedGiftAction($gift);
        }
        return array('giftform' => $giftForm);
    }

    /**
     * @Route("/checkout/steptwo.{_format}", name="checkout_step_two", defaults={"_format"="html"})
     * @Template()
     */
    public function checkoutStepTwoAction($_format) {
        $user = $this->get('security.context')->getToken()->getUser();
        if (is_object($user))
            if ($user->hasRole('ROLE_STAFF'))
                return new RedirectResponse('/');
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $session = $this->get('session');
        $currentCart = $session->get('currentcart');
        $request = $this->getRequest();
        $cart = $dm->getRepository('AevitasLevisBundle:Cart')->find((int) $currentCart);
        if (is_object($user)) {
            if (!is_object($cart))
                return new RedirectResponse('/');
            $user = $dm->getRepository('VietlandUserBundle:User')->find($user->getId());
            $cart->setUser($user);
            $form = $this->createFormBuilder()->add('store', 'hidden')->getForm();
        } else {
            $session->getFlashBag()->add('notice', $this->get('translator')->trans('You have to sign in to redeem your points for rewards'));
            $session->set('referrer', $this->get('router')->generate('checkout_step_two'));
            return new RedirectResponse($this->get('router')->generate('levis_homepage_login'));
        }
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $data = $request->request->all();
                $storeid = $data['form']['store'];
                $store = $dm->getRepository('AevitasLevisBundle:Store')->find((int) $storeid);
                if (is_object($store)) {
                    $cart->setStore($store);
                    $cart->setFinish(true);
                    $session->remove('currentcart');
                    $dm->persist($cart);
                    $dm->flush();
                    if ('json' == $_format) {
                        return new Response(json_encode(array('status' => true)));
                    }
                    return new RedirectResponse($this->get('router')->generate('levis_user_dashboard'));
                }
                else
                    exit(json_encode(array('status' => false, 'error' => $this->get('translator')->trans('We met some error. Try to refresh this page.'))));
            }
        }

        $cities = $dm->getRepository('VietlandAevitasBundle:City')->findAll();
        $districts = $dm->getRepository('VietlandAevitasBundle:District')->findBy(array('cityId' => 3));
        return array('cities' => $cities, 'districts' => $districts, 'form' => $form->createView());
    }

    /**
     * @Route("/checkout/stepthree", name="checkout_step_three")
     * @Template()
     */
    public function checkoutStepThreeAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $user = $this->get('security.context')->getToken()->getUser();
        $request = $this->getRequest();
        $session = $this->get('session');
        if (is_object($user)) {
            $currentCart = $session->get('currentcart');
            $cart = $dm->getRepository('AevitasLevisBundle:Cart')->find((int) $currentCart);
            if (!is_object($cart))
                return new RedirectResponse('/');
            $user = $dm->getRepository('VietlandUserBundle:User')->find($user->getId());
            $cart->setUser($user);
            $form = $this->createFormBuilder($cart)->add('address', 'text', array('required' => true, 'label' => $this->get('translator')->trans('Pick-up address')));
        } else {
            $session->getFlashBag()->add('notice', $this->get('translator')->trans('You have to sign in to redeem your points for rewards'));
            $session->set('referrer', $this->get('router')->generate('checkout_step_three'));
            return new RedirectResponse($this->get('router')->generate('levis_homepage_login'));
        }
        return array();
    }

    /**
     * @Route("/_proxy/selected/gift")
     */
    public function renderSelectedGiftAction($gift) {
        $fType = new FormGiftMetaType($this->get('translator'));
        $form = $this->createForm($fType, $gift);
        return $this->renderView('AevitasLevisBundle:Checkout:renderSelectedGift.html.twig', array('form' => $form->createView(), 'gift' => $gift));
    }

    /**
     * @Route("/add/gift/{id}.{_format}", name="checkout_add_gift", defaults={"_format"="json"})
     */
    public function addGiftAction($id, $_format) {
        $user = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $gift = $dm->getRepository('AevitasLevisBundle:GiftArticle')->find((int) $id);
        $session = $this->get('session');
        $currentCart = $session->get('currentcart');
        if ($currentCart) {
            $cart = $dm->getRepository('AevitasLevisBundle:Cart')->find((int) $currentCart);
        } else {
            $cart = new Cart();
            if (is_object($user)) {
                $user = $dm->getRepository('VietlandUserBundle:User')->find($user->getId());
                $cart->setUser($user);
            }
        }
        $success = $cart->addGift($gift, $dm);
        if ($success == Cart::GIFT_SUCCESS) {
            $dm->persist($cart);
            $dm->flush();
            $session->set('currentcart', $cart->getId());
            $session->save();
        }
        exit(json_encode(array('status' => $success, 'error' => $this->get('translator')->trans($cart->getMessageStatus($success)), 'count' => $cart->count())));
    }

    /**
     * @Route("/remove/gift/{id}.{_format}", name="checkout_remove_gift", defaults={"_format"="json"})
     */
    public function removeGiftAction($id, $_format) {
        $user = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $session = $this->get('session');
        $currentCart = $session->get('currentcart');
        if ($currentCart) {
            $cart = $dm->getRepository('AevitasLevisBundle:Cart')->find((int) $currentCart);
        } else {
            $cart = new Cart();
            if (is_object($user)) {
                $user = $dm->getRepository('VietlandUserBundle:User')->find($user->getId());
                $cart->setUser($user);
            }
        }
        $success = $cart->removeGift($id);
        if ($success) {
            $dm->persist($cart);
            $dm->flush();
            $session->set('currentcart', $cart->getId());
            $session->save();
        }
        return new Response(json_encode(array('status' => $success, 'id' => $id)));
    }

    /**
     * @Route("/save/checkout/items", name="checkout_save_item")
     */
    public function saveCheckoutItemAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $session = $this->get('session');
        $currentCart = $session->get('currentcart');
        if ($currentCart) {
            $cart = $dm->getRepository('AevitasLevisBundle:Cart')->find((int) $currentCart);
        }
        else
            $cart = new Cart();
        $giftMeta = new GiftMeta();
        $form = $this->createForm(new FormGiftMetaType($this->get('translator')), $giftMeta);
        $request = $this->getRequest();
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $fail = $cart->addGiftMeta($giftMeta, $dm);
                $dm->persist($cart);
                $dm->flush();
                return new Response(json_encode(array('status' => $fail, 'error' => $this->get('translator')->trans($cart->getMessageStatus($fail)), 'points' => ($fail == 0) ? $giftMeta->getPoints($dm) : 0)));
            }
            else
                exit(json_encode(array('status' => false, 'error' => $form->getErrorsAsString())));
        }
    }

    /**
     * @Route("/checkouttest")
     */
    public function checkoutTest() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $user = $this->get('security.context')->getToken()->getUser();
        $user = $dm->getRepository('VietlandUserBundle:User')->find($user->getId());
        $cart = new Cart();
        $log = new \Vietland\AevitasBundle\Document\Log();
        $cart->setUser($user);
        $log->setUser($user);
        $log->setAction('test');
        $log->setSubject('is testing');
        $dm->persist($cart);
        $dm->flush();
        var_dump($cart->getId());
        exit;
    }

    /**
     * @Route("/query/store/{city}/{district}", name="checkout_query_store", defaults={"city"="0","district"="0"})
     */
    public function queryStoreAction($district, $city) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $stores = $dm->getRepository('AevitasLevisBundle:Store')->findBy(array('city' => (int) $city, 'district' => (int) $district, 'visible' => true));
        $storesarray = array();
        foreach ($stores as $s) {
            $storesarray[] = array('id' => $s->getId(), 'name' => $s->getName(), 'address' => $s->getAddress());
        }
        exit(json_encode($storesarray));
    }

    /**
     * @Route("/_proxy/rendersumcart", name="render_sum_cart")
     * @Cache(expires="+120 seconds")
     * @Template()
     */
    public function renderSumCartAction() {
        $session = $this->get('session');
        $currentCart = $session->get('currentcart');
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        if ($currentCart) {
            $cart = $dm->getRepository('AevitasLevisBundle:Cart')->find((int) $currentCart);
        }
        else
            $cart = new Cart();
        return array('count' => $cart->count());
    }

    /**
     * @Route("/sms/redeem/code/{id}.{_format}", name="redeem_confirm_sms", defaults={"_format"="json"})
     */
    public function confirmRedeemSmsAction($id, $_format) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        if ($id) {
            $cart = $dm->getRepository('AevitasLevisBundle:Cart')->find((int) $id);
            $user = $cart->getUser();
            try {
                $sms = $this->get('sms_sender');
                $sms->setPhone($user->getCellphone())
                        ->setSms($this->renderView(":sms:confirmRedeem.html.twig", array('code' => $cart->getCode())))
                        ->send();
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
        }
        return new Response(json_encode(array('status' => true)));
    }

    /**
     * @Route("/checking/redeem/{id}.{_format}", name="checking_redeem_code", defaults={"_format"="json"})
     */
    public function checkingRedeemCodeAction($id, $_format) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        $code = $request->get('code');
        if ($id) {
            $cart = $dm->getRepository('AevitasLevisBundle:Cart')->find((int) $id);
            if ($cart->getCode() == $code) {
                $cart->setStatus(Cart::STATUS_DELIVERED);
                $user = $cart->getUser();
                $redeemPoint = $cart->checkPointCapable($dm);
                $bPoint = $user->getPoint();
                if ($user->redeemPoint($redeemPoint)) {
                    $aPoint = $user->getPoint();
                    $cart->setPoint($redeemPoint)->setAPoint($aPoint)->setBPoint($bPoint);
                    $cart->setAuth(true);
                    $userLog = new UserLog();
                    $userLog->setAction(UserLog::REDEEM_GIFT)->setPoint((0 - $redeemPoint))->setUser($user);
                    $dm->persist($userLog);
                    $dm->persist($user);
                    $dm->persist($cart);
                    $dm->flush();
                    return new Response(json_encode(array('status' => true, 'message' => 'The code is valid and user is capable to redeem this order')));
                }
                else
                    return new Response(json_encode(array('status' => true, 'message' => 'The code is valid but user does not have enough points to redeem this order')));
            }
            else
                return new Response(json_encode(array('status' => false, 'message' => 'The code is invalid')));
        }
    }

}
