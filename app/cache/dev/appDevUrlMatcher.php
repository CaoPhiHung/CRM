<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/backend')) {
            if (0 === strpos($pathinfo, '/backend/customercode')) {
                // backend_customer_code_list
                if ($pathinfo === '/backend/customercode/list') {
                    return array (  '_controller' => 'Aevitas\\CustomerCodeBundle\\Controller\\DefaultController::indexAction',  '_route' => 'backend_customer_code_list',);
                }

                // backend_customer_code_create
                if ($pathinfo === '/backend/customercode/create') {
                    return array (  '_controller' => 'Aevitas\\CustomerCodeBundle\\Controller\\DefaultController::createAction',  '_route' => 'backend_customer_code_create',);
                }

                // backend_customer_code_edit
                if (0 === strpos($pathinfo, '/backend/customercode/edit') && preg_match('#^/backend/customercode/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_customer_code_edit')), array (  '_controller' => 'Aevitas\\CustomerCodeBundle\\Controller\\DefaultController::editAction',));
                }

                if (0 === strpos($pathinfo, '/backend/customercode/d')) {
                    // backend_customer_code_delete
                    if (0 === strpos($pathinfo, '/backend/customercode/delete') && preg_match('#^/backend/customercode/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_customer_code_delete')), array (  '_controller' => 'Aevitas\\CustomerCodeBundle\\Controller\\DefaultController::deleteAction',));
                    }

                    // backend_customer_code_download
                    if (0 === strpos($pathinfo, '/backend/customercode/download') && preg_match('#^/backend/customercode/download/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_customer_code_download')), array (  '_controller' => 'Aevitas\\CustomerCodeBundle\\Controller\\DefaultController::downloadAction',));
                    }

                }

            }

            // form_add_transfer
            if (0 === strpos($pathinfo, '/backend/addtransfer') && preg_match('#^/backend/addtransfer(?:/(?P<formid>[^/\\.]++)(?:\\.(?P<_format>[^/]++))?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'form_add_transfer')), array (  '_format' => 'json',  'formid' => '0',  '_controller' => 'Aevitas\\CustomerCodeBundle\\Controller\\DefaultController::createTransferAction',));
            }

            // form_save_transfer
            if (0 === strpos($pathinfo, '/backend/savetransfer') && preg_match('#^/backend/savetransfer(?:/(?P<formid>[^/\\.]++)(?:\\.(?P<_format>[^/]++))?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'form_save_transfer')), array (  '_format' => 'json',  'formid' => '0',  '_controller' => 'Aevitas\\CustomerCodeBundle\\Controller\\DefaultController::saveTransferAction',));
            }

        }

        $host = $this->context->getHost();

        if (preg_match('#^127\\.0\\.0\\.1$#s', $host, $hostMatches)) {
            // proxy_request
            if ($pathinfo === '/_proxy') {
                return array('_route' => 'proxy_request');
            }

        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/uplo')) {
            if (0 === strpos($pathinfo, '/upload')) {
                // cpanel_user_upload_image
                if (0 === strpos($pathinfo, '/upload/user') && preg_match('#^/upload/user(?:/(?P<folder>[^/\\.]++)(?:\\.(?P<_format>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cpanel_user_upload_image')), array (  '_format' => 'json',  'folder' => 'users',  '_controller' => 'Vietland\\ElfinderBundle\\Controller\\DefaultController::uploadAction',));
                }

                // levis_upload_gift
                if ($pathinfo === '/upload/gift') {
                    return array (  '_controller' => 'Vietland\\ElfinderBundle\\Controller\\DefaultController::uploadGiftAction',  '_route' => 'levis_upload_gift',);
                }

            }

            // backend_config_upload_image
            if ($pathinfo === '/uplodate/facebookimage') {
                return array (  '_controller' => 'Vietland\\ElfinderBundle\\Controller\\DefaultController::uploadFacebookPictureAction',  '_route' => 'backend_config_upload_image',);
            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            // _security_check
            if ($pathinfo === '/login_facebook_check') {
                return array('_route' => '_security_check');
            }

            // _security_logout
            if ($pathinfo === '/logout') {
                return array('_route' => '_security_logout');
            }

        }

        // backend_index
        if ($pathinfo === '/backend') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::indexAction',  '_route' => 'backend_index',);
        }

        // backend_edit_user
        if (0 === strpos($pathinfo, '/edit/user') && preg_match('#^/edit/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_edit_user')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::editUserAction',));
        }

        if (0 === strpos($pathinfo, '/backend')) {
            // backend_user_list
            if ($pathinfo === '/backend/user/list') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::listUserAction',  '_route' => 'backend_user_list',);
            }

            // backend_user_advancedsearch
            if ($pathinfo === '/backend/user/advancedsearch') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::advancedSearchUserAction',  '_route' => 'backend_user_advancedsearch',);
            }

            // backend_staff_list
            if ($pathinfo === '/backend/staff/list') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::staffManagerAction',  '_route' => 'backend_staff_list',);
            }

            if (0 === strpos($pathinfo, '/backend/user')) {
                // backend_user_seeking
                if ($pathinfo === '/backend/user/seeking') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::listSearchAction',  '_route' => 'backend_user_seeking',);
                }

                // backend_user_advancedseeking
                if ($pathinfo === '/backend/user/advancedseeking') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::listAdvancedSearchAction',  '_route' => 'backend_user_advancedseeking',);
                }

                // backend_confirm_sms
                if (0 === strpos($pathinfo, '/backend/user/confirmsms') && preg_match('#^/backend/user/confirmsms/(?P<id>[^/\\.]++)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_confirm_sms')), array (  '_format' => 'json',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::resendRegCodeAction',));
                }

            }

        }

        // backend_render_topsidebar
        if ($pathinfo === '/_proxy/render/topsidebar') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::renderTopSidebarAction',  '_route' => 'backend_render_topsidebar',);
        }

        // backend_cart_list
        if ($pathinfo === '/backend/cart/list') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::cartListAction',  '_route' => 'backend_cart_list',);
        }

        // store_staff_order
        if ($pathinfo === '/staff/list/cart/list') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::cartListStoreStaffAction',  '_route' => 'store_staff_order',);
        }

        // backend_cart_edit
        if (0 === strpos($pathinfo, '/backend/edit/cart') && preg_match('#^/backend/edit/cart/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_cart_edit')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::editCartAction',));
        }

        // aevitas_levis_backend_renderselectedgift
        if ($pathinfo === '/_proxy/selected/gift') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::renderSelectedGiftAction',  '_route' => 'aevitas_levis_backend_renderselectedgift',);
        }

        // admin_delete_user
        if (0 === strpos($pathinfo, '/delete/user') && preg_match('#^/delete/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_delete_user')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::deleteUserAction',));
        }

        if (0 === strpos($pathinfo, '/check')) {
            // admin_check_posbill
            if ($pathinfo === '/check/posbill') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::checkPosBillAction',  '_route' => 'admin_check_posbill',);
            }

            // check_bill
            if (0 === strpos($pathinfo, '/check/bill') && preg_match('#^/check/bill/(?P<ledgerid>[^/]++)/(?P<billno>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'check_bill')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::checkBillAction',));
            }

        }

        // multiply_new_points
        if ($pathinfo === '/multiply/newpoints') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::multiplyNewPointsAction',  '_route' => 'multiply_new_points',);
        }

        // user_import
        if ($pathinfo === '/import') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\BackendController::userImportAction',  '_route' => 'user_import',);
        }

        if (0 === strpos($pathinfo, '/checkout/step')) {
            // checkout_step_one
            if ($pathinfo === '/checkout/stepone') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\CheckoutController::checkoutStepOneAction',  '_route' => 'checkout_step_one',);
            }

            if (0 === strpos($pathinfo, '/checkout/stept')) {
                // checkout_step_two
                if (0 === strpos($pathinfo, '/checkout/steptwo') && preg_match('#^/checkout/steptwo(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'checkout_step_two')), array (  '_format' => 'html',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\CheckoutController::checkoutStepTwoAction',));
                }

                // checkout_step_three
                if ($pathinfo === '/checkout/stepthree') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\CheckoutController::checkoutStepThreeAction',  '_route' => 'checkout_step_three',);
                }

            }

        }

        // aevitas_levis_checkout_renderselectedgift
        if ($pathinfo === '/_proxy/selected/gift') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\CheckoutController::renderSelectedGiftAction',  '_route' => 'aevitas_levis_checkout_renderselectedgift',);
        }

        // checkout_add_gift
        if (0 === strpos($pathinfo, '/add/gift') && preg_match('#^/add/gift/(?P<id>[^/\\.]++)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'checkout_add_gift')), array (  '_format' => 'json',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\CheckoutController::addGiftAction',));
        }

        // checkout_remove_gift
        if (0 === strpos($pathinfo, '/remove/gift') && preg_match('#^/remove/gift/(?P<id>[^/\\.]++)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'checkout_remove_gift')), array (  '_format' => 'json',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\CheckoutController::removeGiftAction',));
        }

        // checkout_save_item
        if ($pathinfo === '/save/checkout/items') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\CheckoutController::saveCheckoutItemAction',  '_route' => 'checkout_save_item',);
        }

        // aevitas_levis_checkout_checkouttest
        if ($pathinfo === '/checkouttest') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\CheckoutController::checkoutTest',  '_route' => 'aevitas_levis_checkout_checkouttest',);
        }

        // checkout_query_store
        if (0 === strpos($pathinfo, '/query/store') && preg_match('#^/query/store(?:/(?P<city>[^/]++)(?:/(?P<district>[^/]++))?)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'checkout_query_store')), array (  'city' => '0',  'district' => '0',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\CheckoutController::queryStoreAction',));
        }

        // render_sum_cart
        if ($pathinfo === '/_proxy/rendersumcart') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\CheckoutController::renderSumCartAction',  '_route' => 'render_sum_cart',);
        }

        // redeem_confirm_sms
        if (0 === strpos($pathinfo, '/sms/redeem/code') && preg_match('#^/sms/redeem/code/(?P<id>[^/\\.]++)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'redeem_confirm_sms')), array (  '_format' => 'json',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\CheckoutController::confirmRedeemSmsAction',));
        }

        if (0 === strpos($pathinfo, '/c')) {
            // checking_redeem_code
            if (0 === strpos($pathinfo, '/checking/redeem') && preg_match('#^/checking/redeem/(?P<id>[^/\\.]++)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'checking_redeem_code')), array (  '_format' => 'json',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\CheckoutController::checkingRedeemCodeAction',));
            }

            if (0 === strpos($pathinfo, '/cpanel')) {
                // levis_user_dashboard
                if ($pathinfo === '/cpanel') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::dashboardAction',  '_route' => 'levis_user_dashboard',);
                }

                // levis_user_extended_profile
                if ($pathinfo === '/cpanel/extended/profile') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::profileExtendedAction',  '_route' => 'levis_user_extended_profile',);
                }

                // levis_user_profile
                if ($pathinfo === '/cpanel/profile') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::profileAction',  '_route' => 'levis_user_profile',);
                }

                // levis_user_activity
                if ($pathinfo === '/cpanel/activity') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::profileActivityAction',  '_route' => 'levis_user_activity',);
                }

                // levis_user_shopping
                if ($pathinfo === '/cpanel/shopping') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::shoppingHistoryAction',  '_route' => 'levis_user_shopping',);
                }

                // levis_user_update_avatar
                if (0 === strpos($pathinfo, '/cpanel/update/avatar/index') && preg_match('#^/cpanel/update/avatar/index(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_user_update_avatar')), array (  '_format' => 'html',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::updateAvatarAction',));
                }

            }

            // dashboard_crop_avatar
            if ($pathinfo === '/crop/avatar') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::cropAvatar',  '_route' => 'dashboard_crop_avatar',);
            }

        }

        if (0 === strpos($pathinfo, '/s')) {
            if (0 === strpos($pathinfo, '/survey/answer')) {
                // home_answer_1
                if ($pathinfo === '/survey/answerone') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::answerOneAction',  '_route' => 'home_answer_1',);
                }

                if (0 === strpos($pathinfo, '/survey/answert')) {
                    // home_answer_2
                    if ($pathinfo === '/survey/answertwo') {
                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::answerTwoAction',  '_route' => 'home_answer_2',);
                    }

                    // home_answer_3
                    if ($pathinfo === '/survey/answerthree') {
                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::answerThreeAction',  '_route' => 'home_answer_3',);
                    }

                }

                if (0 === strpos($pathinfo, '/survey/answerf')) {
                    // home_answer_4
                    if ($pathinfo === '/survey/answerfour') {
                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::answerFourAction',  '_route' => 'home_answer_4',);
                    }

                    // home_answer_5
                    if ($pathinfo === '/survey/answerfive') {
                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::answerFiveAction',  '_route' => 'home_answer_5',);
                    }

                }

                if (0 === strpos($pathinfo, '/survey/answers')) {
                    // home_answer_6
                    if ($pathinfo === '/survey/answersix') {
                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::answerSixAction',  '_route' => 'home_answer_6',);
                    }

                    // home_answer_7
                    if ($pathinfo === '/survey/answerseven') {
                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::answerSevenAction',  '_route' => 'home_answer_7',);
                    }

                }

            }

            // dash_save_trippledate
            if (0 === strpos($pathinfo, '/savetrippledate') && preg_match('#^/savetrippledate(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'dash_save_trippledate')), array (  '_format' => 'json',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::saveTripleDateAction',));
            }

        }

        // render_triple_date
        if (0 === strpos($pathinfo, '/_proxy/render_triple_dates') && preg_match('#^/_proxy/render_triple_dates/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'render_triple_date')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::renderTripleDatesAction',));
        }

        // cpanel_statement
        if ($pathinfo === '/history/statement') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\DashboardController::userStatementAction',  '_route' => 'cpanel_statement',);
        }

        if (0 === strpos($pathinfo, '/backend')) {
            if (0 === strpos($pathinfo, '/backend/gift')) {
                // backend_gift_list
                if ($pathinfo === '/backend/gift/list') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::giftListAction',  '_route' => 'backend_gift_list',);
                }

                // backend_gift_create
                if ($pathinfo === '/backend/gift/create') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::giftCreateAction',  '_route' => 'backend_gift_create',);
                }

                // backend_gift_Edit
                if (0 === strpos($pathinfo, '/backend/gift/edit') && preg_match('#^/backend/gift/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_gift_Edit')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::gifEditAction',));
                }

                // backend_gift_delete
                if ($pathinfo === '/backend/gift/delete') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::giftDeleteAction',  '_route' => 'backend_gift_delete',);
                }

            }

            if (0 === strpos($pathinfo, '/backend/categor')) {
                // backend_gift_category_delete
                if ($pathinfo === '/backend/category/delete') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::categoryDeleteAction',  '_route' => 'backend_gift_category_delete',);
                }

                if (0 === strpos($pathinfo, '/backend/categories')) {
                    // backend_gift_addcategories
                    if ($pathinfo === '/backend/categories/add') {
                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::giftAddCategories',  '_route' => 'backend_gift_addcategories',);
                    }

                    // backend_gift_categories_edit
                    if (0 === strpos($pathinfo, '/backend/categories/edit') && preg_match('#^/backend/categories/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_gift_categories_edit')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::categoryEditAction',));
                    }

                }

                // backend_gift_category_list
                if ($pathinfo === '/backend/category/list') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::categoriesListAction',  '_route' => 'backend_gift_category_list',);
                }

            }

            // backend_gift_import
            if ($pathinfo === '/backend/gift/import') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::importGiftAction',  '_route' => 'backend_gift_import',);
            }

            // backend_test
            if ($pathinfo === '/backend/test') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::testAction',  '_route' => 'backend_test',);
            }

        }

        if (0 === strpos($pathinfo, '/reward')) {
            // levis_gift_category
            if (preg_match('#^/reward(?:/(?P<topcat>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_gift_category')), array (  'topcat' => 'Reward',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::categoryAction',));
            }

            // levis_gift_subcategory
            if (preg_match('#^/reward/(?P<topcat>[^/]++)/(?P<catslug>[^/_]++)_(?P<catid>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_gift_subcategory')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::subCategoryAction',));
            }

        }

        if (0 === strpos($pathinfo, '/_proxy')) {
            // levis_gift_tags
            if (0 === strpos($pathinfo, '/_proxy/renderstatistic/tags') && preg_match('#^/_proxy/renderstatistic/tags(?:/(?P<topcat>[^/]++)(?:/(?P<catid>[^/]++))?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_gift_tags')), array (  'topcat' => 'Reward',  'catid' => 0,  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::renderTagsAction',));
            }

            // levis_gift_sumup
            if (0 === strpos($pathinfo, '/_proxy/sumup/cat') && preg_match('#^/_proxy/sumup/cat(?:/(?P<topcat>[^/]++)(?:/(?P<catid>[^/]++))?)?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_gift_sumup')), array (  'topcat' => 'Reward',  'catid' => 0,  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::renderSideBarAction',));
            }

            // generate_pagination
            if ($pathinfo === '/_proxy/generate/pagination') {
                return array (  'current' => 1,  'total' => 0,  'path' => '/',  'amount' => 9,  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::renderPaginationAction',  '_route' => 'generate_pagination',);
            }

        }

        // levis_gift_detail
        if (0 === strpos($pathinfo, '/reward') && preg_match('#^/reward/(?P<topcat>[^/]++)/(?P<category>[^/]++)/(?P<slug>[^/\\.]++)\\.(?P<_format>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_gift_detail')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::giftDetailAction',));
        }

        // render_topgrid
        if (0 === strpos($pathinfo, '/_proxy/rendertopgrid') && preg_match('#^/_proxy/rendertopgrid(?:/(?P<amount>[^/]++)(?:/(?P<sort>[^/]++))?)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'render_topgrid')), array (  'amount' => 6,  'sort' => 'name',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::renderTopGridAction',));
        }

        // levis_gift_addwishlist
        if (0 === strpos($pathinfo, '/reward/add-wish-list') && preg_match('#^/reward/add\\-wish\\-list/(?P<gid>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_gift_addwishlist')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\GiftController::giftAddWishListAction',));
        }

        // levis_homepage_index
        if ($pathinfo === '/index.html') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::indexAction',  '_route' => 'levis_homepage_index',);
        }

        // levis_homepage_login
        if ($pathinfo === '/loyalty-login') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::homeLoginAction',  '_route' => 'levis_homepage_login',);
        }

        // registration_facebook_integrate
        if (0 === strpos($pathinfo, '/facebook/integrate') && preg_match('#^/facebook/integrate(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'registration_facebook_integrate')), array (  '_format' => 'json',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::facebookLoginAction',));
        }

        // render_login
        if ($pathinfo === '/_proxy/render/login') {
            return array (  'routing' => '/',  'params' =>   array (  ),  'locale' => 'en_US',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::renderLoginAction',  '_route' => 'render_login',);
        }

        // home_search_district
        if (0 === strpos($pathinfo, '/searchdistrict') && preg_match('#^/searchdistrict(?:/(?P<map>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'home_search_district')), array (  'map' => '3',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::homeSearchDistrictAction',));
        }

        if (0 === strpos($pathinfo, '/register/online')) {
            // levis_home_register_online
            if ($pathinfo === '/register/online') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::registerOnlineAction',  '_route' => 'levis_home_register_online',);
            }

            if (0 === strpos($pathinfo, '/register/online/step')) {
                // levis_home_register_online_step2
                if (0 === strpos($pathinfo, '/register/online/step2') && preg_match('#^/register/online/step2(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_home_register_online_step2')), array (  '_format' => 'html',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::registerOnlineStep2Action',));
                }

                if (0 === strpos($pathinfo, '/register/online/step3')) {
                    // levis_home_register_online_step3
                    if (preg_match('#^/register/online/step3(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_home_register_online_step3')), array (  '_format' => 'html',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::registerOnlineStep3Action',));
                    }

                    // home_add_anniversary
                    if (0 === strpos($pathinfo, '/register/online/step3/addanni') && preg_match('#^/register/online/step3/addanni(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'home_add_anniversary')), array (  '_format' => 'json',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::addAnniversaryAction',));
                    }

                    // home_save_anniversary
                    if (0 === strpos($pathinfo, '/register/online/step3/saveanni') && preg_match('#^/register/online/step3/saveanni(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'home_save_anniversary')), array (  '_format' => 'json',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::saveAnniversaryAction',));
                    }

                }

            }

        }

        // render_annivesary
        if ($pathinfo === '/_proxy/render/anniversary') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::registerAnniversaryAction',  '_route' => 'render_annivesary',);
        }

        // levis_home_register_online_step4
        if (0 === strpos($pathinfo, '/register/online/step4') && preg_match('#^/register/online/step4(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_home_register_online_step4')), array (  '_format' => 'html',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::registerStep4Action',));
        }

        if (0 === strpos($pathinfo, '/complete/enrollment')) {
            // levis_home_complete_enrollment
            if ($pathinfo === '/complete/enrollment') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::completeEnrollmentStepOneAction',  '_route' => 'levis_home_complete_enrollment',);
            }

            if (0 === strpos($pathinfo, '/complete/enrollment/step')) {
                // levis_home_complete_enrollment_step1
                if ($pathinfo === '/complete/enrollment/step1') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::completeEnrollmentAction',  '_route' => 'levis_home_complete_enrollment_step1',);
                }

                // levis_home_complete_enrollment_step2
                if (0 === strpos($pathinfo, '/complete/enrollment/step2') && preg_match('#^/complete/enrollment/step2(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_home_complete_enrollment_step2')), array (  '_format' => 'html',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::completeEnrollmentStep2Action',));
                }

                // levis_home_complete_enrollment_step3
                if (0 === strpos($pathinfo, '/complete/enrollment/step3') && preg_match('#^/complete/enrollment/step3(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_home_complete_enrollment_step3')), array (  '_format' => 'html',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::completeEnrollmentStep3Action',));
                }

                // levis_home_complete_enrollment_step4
                if (0 === strpos($pathinfo, '/complete/enrollment/step4') && preg_match('#^/complete/enrollment/step4(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_home_complete_enrollment_step4')), array (  '_format' => 'html',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::completeEnrollmentFinalStepAction',));
                }

            }

        }

        // levis_home_forget_password
        if ($pathinfo === '/forgot/password') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::forgotPasswordAction',  '_route' => 'levis_home_forget_password',);
        }

        // levis_home_change_password
        if (0 === strpos($pathinfo, '/change/password') && preg_match('#^/change/password(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'levis_home_change_password')), array (  '_format' => 'json',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::changePasswordAction',));
        }

        // render_top_menu
        if (0 === strpos($pathinfo, '/_proxy/rendertopmenu') && preg_match('#^/_proxy/rendertopmenu(?:/(?P<route>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'render_top_menu')), array (  'route' => '_welcome',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::renderTopMenuAction',));
        }

        // front_set_ref
        if (0 === strpos($pathinfo, '/set/referral') && preg_match('#^/set/referral/(?P<ref>[^/\\.]++)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'front_set_ref')), array (  '_format' => 'json',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\HomeController::setReferralAction',));
        }

        if (0 === strpos($pathinfo, '/backend/item')) {
            // backend_item_list
            if ($pathinfo === '/backend/item/list') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ItemController::listAction',  '_route' => 'backend_item_list',);
            }

            // backend_item_import
            if ($pathinfo === '/backend/item/import') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ItemController::importAction',  '_route' => 'backend_item_import',);
            }

            // backend_item_delete
            if ($pathinfo === '/backend/item/delete') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ItemController::deleteAction',  '_route' => 'backend_item_delete',);
            }

        }

        // backend_item_search
        if (0 === strpos($pathinfo, '/item/search') && preg_match('#^/item/search(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_item_search')), array (  '_format' => 'json',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ItemController::searchAction',));
        }

        if (0 === strpos($pathinfo, '/_proxy/render/user')) {
            // render_user_active
            if ($pathinfo === '/_proxy/render/useractive') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ReportController::renderReportUserActiveAction',  '_route' => 'render_user_active',);
            }

            // render_user_profile
            if ($pathinfo === '/_proxy/render/userprofile') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ReportController::renderReportUserProfileAction',  '_route' => 'render_user_profile',);
            }

        }

        // customer_report_download
        if (rtrim($pathinfo, '/') === '/download/user/report') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'customer_report_download');
            }

            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ReportController::indexAction',  '_route' => 'customer_report_download',);
        }

        // form_download_report_account
        if ($pathinfo === '/form/download/report') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ReportController::downloadReportCustomerPurchaseAction',  '_route' => 'form_download_report_account',);
        }

        // download_report_account
        if ($pathinfo === '/download/report/account') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ReportController::memberPurchaseAction',  '_route' => 'download_report_account',);
        }

        if (0 === strpos($pathinfo, '/backend')) {
            // backend_user_exportseeking
            if ($pathinfo === '/backend/user/exportseeking') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ReportController::exportSearchAction',  '_route' => 'backend_user_exportseeking',);
            }

            // backend_report_newmember
            if ($pathinfo === '/backend/newmber/report') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ReportController::newMemberReportAction',  '_route' => 'backend_report_newmember',);
            }

            // backend_report_birthday
            if ($pathinfo === '/backend/birthday/report') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ReportController::birthdayReportAction',  '_route' => 'backend_report_birthday',);
            }

            // backend_report_anniversary
            if ($pathinfo === '/backend/anniversary/report') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ReportController::anniversarydayReportAction',  '_route' => 'backend_report_anniversary',);
            }

            // backend_report_notshopped
            if ($pathinfo === '/backend/notshopped/report') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ReportController::notShoppedReportAction',  '_route' => 'backend_report_notshopped',);
            }

            // backend_report_userstatement
            if (0 === strpos($pathinfo, '/backend/user/user_statement') && preg_match('#^/backend/user/user_statement/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_report_userstatement')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ReportController::userStatementAction',));
            }

            // backend_report_redeemption
            if ($pathinfo === '/backend/reddemption/report') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\ReportController::redeemptionReportAction',  '_route' => 'backend_report_redeemption',);
            }

        }

        // levis_store_location
        if ($pathinfo === '/storelocation.html') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StaticController::storeLocationAction',  '_route' => 'levis_store_location',);
        }

        // levis_member_tier
        if ($pathinfo === '/membership_tier.html') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StaticController::memberTierAction',  '_route' => 'levis_member_tier',);
        }

        // levis_contact_us
        if ($pathinfo === '/contact_us.html') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StaticController::contactUsAction',  '_route' => 'levis_contact_us',);
        }

        // levis_faq
        if ($pathinfo === '/faq.html') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StaticController::faqAction',  '_route' => 'levis_faq',);
        }

        // term_of_use
        if (preg_match('#^/(?P<locale>[^/]++)/termofuse\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'term_of_use')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StaticController::termAction',));
        }

        // privacy_policy
        if (preg_match('#^/(?P<locale>[^/]++)/policy\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'privacy_policy')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StaticController::policyAction',));
        }

        // about_us
        if (preg_match('#^/(?P<locale>[^/]++)/aboutus\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'about_us')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StaticController::aboutUsAction',));
        }

        // about_brands
        if (preg_match('#^/(?P<locale>[^/]++)/brands\\.html$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'about_brands')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StaticController::brandsAction',));
        }

        // vip_day
        if ($pathinfo === '/vipday') {
            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StaticController::landingpageAction',  '_route' => 'vip_day',);
        }

        if (0 === strpos($pathinfo, '/backend')) {
            if (0 === strpos($pathinfo, '/backend/s')) {
                if (0 === strpos($pathinfo, '/backend/store')) {
                    // backend_store_create
                    if ($pathinfo === '/backend/store/create') {
                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::storeCreateAction',  '_route' => 'backend_store_create',);
                    }

                    // backend_store_Edit
                    if (0 === strpos($pathinfo, '/backend/store/edit') && preg_match('#^/backend/store/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_store_Edit')), array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::StoreEditAction',));
                    }

                    // backend_store_list
                    if ($pathinfo === '/backend/store/list') {
                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::storeListAction',  '_route' => 'backend_store_list',);
                    }

                    // backend_store_delete
                    if ($pathinfo === '/backend/store/delete') {
                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::storeDeleteAction',  '_route' => 'backend_store_delete',);
                    }

                    // backend_store_adduser
                    if ($pathinfo === '/backend/store/adduser') {
                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::addUserToStore',  '_route' => 'backend_store_adduser',);
                    }

                    // backend_store_removeuser
                    if ($pathinfo === '/backend/store/removeuser') {
                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::removeUserFromStoreAction',  '_route' => 'backend_store_removeuser',);
                    }

                }

                // backend_search_user_by_store
                if ($pathinfo === '/backend/search/store/user') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::searchUserByStoreAction',  '_route' => 'backend_search_user_by_store',);
                }

            }

            // backend_remove_user_store
            if ($pathinfo === '/backend/remove/user/store') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::removeUserStoreAction',  '_route' => 'backend_remove_user_store',);
            }

            // backend_store_search
            if (0 === strpos($pathinfo, '/backend/search/store') && preg_match('#^/backend/search/store(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_store_search')), array (  '_format' => 'json',  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::searchAction',));
            }

            // backend_store_adduser_forstore
            if ($pathinfo === '/backend/add/user/forstore') {
                return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::addUserForStoreAction',  '_route' => 'backend_store_adduser_forstore',);
            }

            if (0 === strpos($pathinfo, '/backend/staff')) {
                // backend_staff_point2vnd
                if ($pathinfo === '/backend/staff/point2vnd') {
                    return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::Point2VndAction',  '_route' => 'backend_staff_point2vnd',);
                }

                if (0 === strpos($pathinfo, '/backend/staff/redeemption')) {
                    if (0 === strpos($pathinfo, '/backend/staff/redeemption-')) {
                        // backend_staff_redeemption_info
                        if ($pathinfo === '/backend/staff/redeemption-info') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_backend_staff_redeemption_info;
                            }

                            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::RedeemptionInfoAction',  '_route' => 'backend_staff_redeemption_info',);
                        }
                        not_backend_staff_redeemption_info:

                        // backend_staff_redeemption_process
                        if ($pathinfo === '/backend/staff/redeemption-process') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_backend_staff_redeemption_process;
                            }

                            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::RedeemptionProcessAction',  '_route' => 'backend_staff_redeemption_process',);
                        }
                        not_backend_staff_redeemption_process:

                        // backend_staff_redeemption_auth
                        if ($pathinfo === '/backend/staff/redeemption-auth') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_backend_staff_redeemption_auth;
                            }

                            return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::RedeemptionAuthAction',  '_route' => 'backend_staff_redeemption_auth',);
                        }
                        not_backend_staff_redeemption_auth:

                    }

                    // backend_staff_redeemption
                    if ($pathinfo === '/backend/staff/redeemption') {
                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::RedeemptionAction',  '_route' => 'backend_staff_redeemption',);
                    }

                    // backend_staff_redeemption_print
                    if ($pathinfo === '/backend/staff/redeemption/print') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_backend_staff_redeemption_print;
                        }

                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::RedeemptionPrintAction',  '_route' => 'backend_staff_redeemption_print',);
                    }
                    not_backend_staff_redeemption_print:

                    // backend_staff_redeemption_delete
                    if ($pathinfo === '/backend/staff/redeemption/delete') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_backend_staff_redeemption_delete;
                        }

                        return array (  '_controller' => 'Aevitas\\LevisBundle\\Controller\\StoreController::RedeemptionDeleteAction',  '_route' => 'backend_staff_redeemption_delete',);
                    }
                    not_backend_staff_redeemption_delete:

                }

            }

            // backend_point_rules_list
            if (0 === strpos($pathinfo, '/backend/listpoint') && preg_match('#^/backend/listpoint(?:/(?P<storeKw>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_point_rules_list')), array (  'storeKw' => 0,  '_controller' => 'Aevitas\\PointBundle\\Controller\\DefaultController::indexAction',));
            }

            if (0 === strpos($pathinfo, '/backend/p')) {
                if (0 === strpos($pathinfo, '/backend/point')) {
                    // backend_point_rules_addnew
                    if ($pathinfo === '/backend/point/addnew.html') {
                        return array (  '_controller' => 'Aevitas\\PointBundle\\Controller\\DefaultController::addNewAction',  '_route' => 'backend_point_rules_addnew',);
                    }

                    // backend_point_rules_edit
                    if (0 === strpos($pathinfo, '/backend/point/edit') && preg_match('#^/backend/point/edit/(?P<ruleID>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_point_rules_edit')), array (  '_controller' => 'Aevitas\\PointBundle\\Controller\\DefaultController::editAction',));
                    }

                    // backend_point_rules_delete
                    if (0 === strpos($pathinfo, '/backend/point/delete') && preg_match('#^/backend/point/delete/(?P<ruleID>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_point_rules_delete')), array (  '_controller' => 'Aevitas\\PointBundle\\Controller\\DefaultController::deleteAction',));
                    }

                    // backend_point_rules_test
                    if ($pathinfo === '/backend/point/test.html') {
                        return array (  '_controller' => 'Aevitas\\PointBundle\\Controller\\DefaultController::testAction',  '_route' => 'backend_point_rules_test',);
                    }

                }

                if (0 === strpos($pathinfo, '/backend/program')) {
                    // backend_program_list
                    if ($pathinfo === '/backend/program') {
                        return array (  '_controller' => 'Aevitas\\PointBundle\\Controller\\ProgramController::indexAction',  '_route' => 'backend_program_list',);
                    }

                    // backend_program_addnew
                    if ($pathinfo === '/backend/program/addnew') {
                        return array (  '_controller' => 'Aevitas\\PointBundle\\Controller\\ProgramController::addNewAction',  '_route' => 'backend_program_addnew',);
                    }

                    // backend_program_edit
                    if (0 === strpos($pathinfo, '/backend/program/edit') && preg_match('#^/backend/program/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_program_edit')), array (  '_controller' => 'Aevitas\\PointBundle\\Controller\\ProgramController::editAction',));
                    }

                    // backend_program_delete
                    if (0 === strpos($pathinfo, '/backend/program/delete') && preg_match('#^/backend/program/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_program_delete')), array (  '_controller' => 'Aevitas\\PointBundle\\Controller\\ProgramController::deleteAction',));
                    }

                    // backend_program_clone
                    if (0 === strpos($pathinfo, '/backend/program/clone') && preg_match('#^/backend/program/clone/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_program_clone')), array (  '_controller' => 'Aevitas\\PointBundle\\Controller\\ProgramController::cloneAction',));
                    }

                }

            }

        }

        // vietland_store_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'vietland_store_default_index')), array (  '_controller' => 'Vietland\\StoreBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/backend')) {
            // backend_move_bill
            if (0 === strpos($pathinfo, '/backend/move/bill') && preg_match('#^/backend/move/bill/(?P<billid>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_move_bill')), array (  '_controller' => 'Vietland\\StoreBundle\\Controller\\DefaultController::moveBillAction',));
            }

            // back_end_compare_bill_lt
            if ($pathinfo === '/backend/bill/reprocess') {
                return array (  '_controller' => 'Vietland\\StoreBundle\\Controller\\DefaultController::compareProcessBillAction',  '_route' => 'back_end_compare_bill_lt',);
            }

        }

        if (0 === strpos($pathinfo, '/store')) {
            // store_update_user
            if (0 === strpos($pathinfo, '/store/updateuser') && preg_match('#^/store/updateuser/(?P<ledgerid>[^/]++)/(?P<billno>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'store_update_user')), array (  '_controller' => 'Vietland\\StoreBundle\\Controller\\StoreController::updateUserAction',));
            }

            if (0 === strpos($pathinfo, '/store/s')) {
                // store_search_user
                if ($pathinfo === '/store/searchuser') {
                    return array (  '_controller' => 'Vietland\\StoreBundle\\Controller\\StoreController::searchUserAction',  '_route' => 'store_search_user',);
                }

                // store_shopping_action
                if (0 === strpos($pathinfo, '/store/shoppingaction') && preg_match('#^/store/shoppingaction/(?P<ledgerid>[^/]++)/(?P<billno>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'store_shopping_action')), array (  '_controller' => 'Vietland\\StoreBundle\\Controller\\StoreController::shoppingAction',));
                }

                // store_save_shopping
                if (0 === strpos($pathinfo, '/store/saveshopping') && preg_match('#^/store/saveshopping/(?P<ledgerid>[^/]++)/(?P<billno>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'store_save_shopping')), array (  '_controller' => 'Vietland\\StoreBundle\\Controller\\StoreController::saveShoppingAction',));
                }

            }

            // store_import
            if ($pathinfo === '/store/importstore') {
                return array (  '_controller' => 'Vietland\\StoreBundle\\Controller\\StoreController::importStoreAction',  '_route' => 'store_import',);
            }

        }

        if (0 === strpos($pathinfo, '/backend/import')) {
            // backend_import_city
            if ($pathinfo === '/backend/importcity') {
                return array (  '_controller' => 'Vietland\\StoreBundle\\Controller\\StoreController::importCityAction',  '_route' => 'backend_import_city',);
            }

            // backend_import_district
            if ($pathinfo === '/backend/importdistrict') {
                return array (  '_controller' => 'Vietland\\StoreBundle\\Controller\\StoreController::importDistrictAction',  '_route' => 'backend_import_district',);
            }

        }

        // staff_update_form_code
        if (0 === strpos($pathinfo, '/update') && preg_match('#^/update/(?P<cCode>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'staff_update_form_code')), array (  '_controller' => 'Vietland\\StoreBundle\\Controller\\StoreController::updateformManagementNotify',));
        }

        if (0 === strpos($pathinfo, '/checking')) {
            // staff_checking_email
            if (0 === strpos($pathinfo, '/checking/email') && preg_match('#^/checking/email(?:/(?P<email>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'staff_checking_email')), array (  'email' => 'noemail',  '_controller' => 'Vietland\\StoreBundle\\Controller\\StoreController::checkingEmailAction',));
            }

            // staff_checking_cellphone
            if (0 === strpos($pathinfo, '/checking/cellphone') && preg_match('#^/checking/cellphone(?:/(?P<cellphone>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'staff_checking_cellphone')), array (  'cellphone' => 'nocellphone',  '_controller' => 'Vietland\\StoreBundle\\Controller\\StoreController::checkingCellphoneAction',));
            }

        }

        // staff_billjob_list
        if ($pathinfo === '/billjob/list') {
            return array (  '_controller' => 'Vietland\\StoreBundle\\Controller\\StoreController::listJobAction',  '_route' => 'staff_billjob_list',);
        }

        if (0 === strpos($pathinfo, '/config')) {
            // config_environment
            if ($pathinfo === '/configenvironment') {
                return array (  '_controller' => 'Aevitas\\ConfigBundle\\Controller\\ConfigController::setEnvironmentAction',  '_route' => 'config_environment',);
            }

            // config_mailer
            if ($pathinfo === '/configmailer') {
                return array (  '_controller' => 'Aevitas\\ConfigBundle\\Controller\\ConfigController::setMailerConfigAction',  '_route' => 'config_mailer',);
            }

            // config_loyalty
            if ($pathinfo === '/configloyalty') {
                return array (  '_controller' => 'Aevitas\\ConfigBundle\\Controller\\ConfigController::setLoyaltyConfigAction',  '_route' => 'config_loyalty',);
            }

        }

        if (0 === strpos($pathinfo, '/_proxy/render_')) {
            // render_point_config
            if ($pathinfo === '/_proxy/render_point_config') {
                return array (  '_controller' => 'Aevitas\\ConfigBundle\\Controller\\ConfigController::renderPointsConfigAction',  '_route' => 'render_point_config',);
            }

            // render_facebook_init
            if ($pathinfo === '/_proxy/render_facebook_init') {
                return array (  '_controller' => 'Aevitas\\ConfigBundle\\Controller\\ConfigController::facebookInitAction',  '_route' => 'render_facebook_init',);
            }

        }

        if (0 === strpos($pathinfo, '/backend')) {
            // edit_email_template
            if (0 === strpos($pathinfo, '/backend/edit') && preg_match('#^/backend/edit/(?P<type>[^/]++)/(?P<action>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_email_template')), array (  '_controller' => 'Aevitas\\ConfigBundle\\Controller\\ConfigController::editEmailTemplateAction',));
            }

            if (0 === strpos($pathinfo, '/backend/template')) {
                // backend_list_template
                if ($pathinfo === '/backend/template/list') {
                    return array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::listTemplateAction',  '_route' => 'backend_list_template',);
                }

                // backend_create_template
                if ($pathinfo === '/backend/template/create') {
                    return array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::createTemplateAction',  '_route' => 'backend_create_template',);
                }

                if (0 === strpos($pathinfo, '/backend/template/process')) {
                    // backend_create_process
                    if ($pathinfo === '/backend/template/process') {
                        return array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::createProcessAction',  '_route' => 'backend_create_process',);
                    }

                    // aevitas_channel_default_saveprocess
                    if ($pathinfo === '/backend/template/process/save') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_aevitas_channel_default_saveprocess;
                        }

                        return array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::saveProcessAction',  '_route' => 'aevitas_channel_default_saveprocess',);
                    }
                    not_aevitas_channel_default_saveprocess:

                    // aevitas_channel_default_deleteprocess
                    if (0 === strpos($pathinfo, '/backend/template/process/delete') && preg_match('#^/backend/template/process/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_aevitas_channel_default_deleteprocess;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'aevitas_channel_default_deleteprocess')), array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::deleteProcessAction',));
                    }
                    not_aevitas_channel_default_deleteprocess:

                    if (0 === strpos($pathinfo, '/backend/template/process/st')) {
                        // aevitas_channel_default_startprocess
                        if (0 === strpos($pathinfo, '/backend/template/process/start') && preg_match('#^/backend/template/process/start/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_aevitas_channel_default_startprocess;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'aevitas_channel_default_startprocess')), array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::startProcessAction',));
                        }
                        not_aevitas_channel_default_startprocess:

                        // aevitas_channel_default_stopprocess
                        if (0 === strpos($pathinfo, '/backend/template/process/stop') && preg_match('#^/backend/template/process/stop/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_aevitas_channel_default_stopprocess;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'aevitas_channel_default_stopprocess')), array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::stopProcessAction',));
                        }
                        not_aevitas_channel_default_stopprocess:

                    }

                }

                // backend_edit_template
                if (0 === strpos($pathinfo, '/backend/template/edit') && preg_match('#^/backend/template/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_edit_template')), array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::editTemplateAction',));
                }

                // backend_delete_template
                if (0 === strpos($pathinfo, '/backend/template/delete') && preg_match('#^/backend/template/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_delete_template')), array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/backend/e')) {
                // backend_edit_template_builder
                if (0 === strpos($pathinfo, '/backend/edit-template') && preg_match('#^/backend/edit\\-template/(?P<type>[^/]++)(?:/(?P<action>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_edit_template_builder')), array (  'action' => NULL,  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::editTemplateBuilderAction',));
                }

                // backend_elfinder_connection
                if ($pathinfo === '/backend/elfinder/connection') {
                    return array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::elFinderConnectionAction',  '_route' => 'backend_elfinder_connection',);
                }

            }

            if (0 === strpos($pathinfo, '/backend/template')) {
                if (0 === strpos($pathinfo, '/backend/template/send')) {
                    // backend_send_info_template
                    if ($pathinfo === '/backend/template/send/info') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_backend_send_info_template;
                        }

                        return array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::sendInfoAction',  '_route' => 'backend_send_info_template',);
                    }
                    not_backend_send_info_template:

                    // backend_send_process_template
                    if ($pathinfo === '/backend/template/send/process') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_backend_send_process_template;
                        }

                        return array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::sendProcessAction',  '_route' => 'backend_send_process_template',);
                    }
                    not_backend_send_process_template:

                }

                if (0 === strpos($pathinfo, '/backend/template/rule')) {
                    // backend_list_template_rule
                    if ($pathinfo === '/backend/template/rule/list') {
                        return array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::listTemplateRuleAction',  '_route' => 'backend_list_template_rule',);
                    }

                    // backend_create_template_rule
                    if ($pathinfo === '/backend/template/rule/add') {
                        return array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::createTemplateRuleAction',  '_route' => 'backend_create_template_rule',);
                    }

                    // backend_edit_template_rule
                    if (0 === strpos($pathinfo, '/backend/template/rule/edit') && preg_match('#^/backend/template/rule/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_edit_template_rule')), array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::editTemplateRuleAction',));
                    }

                    // backend_delete_template_rule
                    if (0 === strpos($pathinfo, '/backend/template/rule/delete') && preg_match('#^/backend/template/rule/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_delete_template_rule')), array (  '_controller' => 'Aevitas\\ChannelBundle\\Controller\\DefaultController::deleteRuleAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/backend/user')) {
                if (0 === strpos($pathinfo, '/backend/user/group')) {
                    // backend_group_list
                    if ($pathinfo === '/backend/user/group/list') {
                        return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\GroupController::indexAction',  '_route' => 'backend_group_list',);
                    }

                    // backend_group_info
                    if (0 === strpos($pathinfo, '/backend/user/group/info') && preg_match('#^/backend/user/group/info/(?P<groupID>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_group_info')), array (  '_controller' => 'Vietland\\UserBundle\\Controller\\GroupController::infoAction',));
                    }

                    // backend_group_addnew
                    if ($pathinfo === '/backend/user/group/addnew') {
                        return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\GroupController::newAction',  '_route' => 'backend_group_addnew',);
                    }

                    // backend_group_edit
                    if (0 === strpos($pathinfo, '/backend/user/group/edit') && preg_match('#^/backend/user/group/edit/(?P<groupID>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_group_edit')), array (  '_controller' => 'Vietland\\UserBundle\\Controller\\GroupController::editAction',));
                    }

                    // backend_group_delete
                    if (0 === strpos($pathinfo, '/backend/user/group/delete') && preg_match('#^/backend/user/group/delete/(?P<groupID>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_group_delete')), array (  '_controller' => 'Vietland\\UserBundle\\Controller\\GroupController::deleteAction',));
                    }

                }

                // backend_import_user
                if ($pathinfo === '/backend/user/import-user') {
                    return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\ImportController::importUsersAction',  '_route' => 'backend_import_user',);
                }

            }

        }

        // vietland_user_security_facebooklogin
        if ($pathinfo === '/fblogin') {
            return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\SecurityController::facebookLoginAction',  '_route' => 'vietland_user_security_facebooklogin',);
        }

        // backend_user_search
        if (0 === strpos($pathinfo, '/user/search') && preg_match('#^/user/search(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'backend_user_search')), array (  '_format' => 'json',  '_controller' => 'Vietland\\UserBundle\\Controller\\UserController::searchAction',));
        }

        // validate_email_cellphone
        if ($pathinfo === '/validate/email_cellphone') {
            return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\UserController::validateEmailCellphoneAction',  '_route' => 'validate_email_cellphone',);
        }

        // update_joined
        if ($pathinfo === '/user/update/joined') {
            return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\UserController::updateJoinedAction',  '_route' => 'update_joined',);
        }

        // _facebook_secured
        if (rtrim($pathinfo, '/') === '/secured') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_facebook_secured');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_facebook_secured',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

            // fos_user_profile_avatar
            if ($pathinfo === '/profile/avatar') {
                return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\ProfileController::avatarAction',  '_route' => 'fos_user_profile_avatar',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'Vietland\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'Vietland\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
