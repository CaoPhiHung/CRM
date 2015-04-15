<?php

/* AevitasLevisBundle:Static:faq.html.twig */
class __TwigTemplate_35d967af57fee284d16eca1634335ebe extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Front:root.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AevitasLevisBundle:Front:root.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo "<title>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Star Club - FAQ"), "html", null, true);
        echo "</title>
";
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        // line 6
        echo "<!-- Le styles -->
";
        // line 7
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "62de1cd_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_62de1cd_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_faq_bootstrap_1.css");
            // line 13
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "62de1cd_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_62de1cd_1") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_faq_bootstrap-responsive_2.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "62de1cd_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_62de1cd_2") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_faq_faq_3.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "62de1cd_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_62de1cd_3") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_faq_style_4.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        } else {
            // asset "62de1cd"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_62de1cd") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_faq.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        }
        unset($context["asset_url"]);
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "
<!-- Carousel
================================================== -->
<div id=\"panel\" class=\"toppanel\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <h3>FAQ</h3>
            </div>
        </div>
    </div>
</div><!-- /.carousel -->

<!-- Registration Content
================================================== -->
<!-- Wrap of all the registration block. -->
<section id=\"main\" class=\"clearfix\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <div id=\"faq-image\"></div>
                <div id=\"faq-content\">

                    <!-- PROGRAM OVERVIEW -->
                    <div class=\"faq-box\">
                        <div class=\"faq-section\">";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("PROGRAM OVERVIEW"), "html", null, true);
        echo "</div>
                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("WHAT IS STARCLUB?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('1-1', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-1-1\">";
        // line 47
        echo $this->env->getExtension('translator')->trans("Starclub is a loyalty program that is exclusively designed for customers, who purchase Levi's® products with accumulated value of 1,000,000VND upwards. The program membership entitles you to valuable rewards and privileges.");
        echo "</a></div>

                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("HOW DO I JOIN?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('1-2', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-1-2\">";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Visit any Levi's stores nearby. On a single purchase or a cumulative purchase of 1,000,000VND (made in a calendar year), you are eligible to enroll in the Starclub. You need to fill up the simple registration form at any Levi's cash counter and provide your mobile number to the cashier. This will trigger an SMS to your mobile number that completes your registration. Later, you will also be issued a Starclub Card which would be your membership identification."), "html", null, true);
        echo "</div>

                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("HOW DOES THIS PROGRAM WORK?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('1-3', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-1-3\">";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Besides your Membership Card, your mobile number is your unique identification. Whenever you purchase at a Levi's® store, please present your Membership card or quote your registered mobile number at the cash desk before billing. Your total purchase value and points accrued since registration will be updated accordingly against your registered mobile number. All correspondences (communications, coupons, offers ...) will be sent to your personal email and this SMS number."), "html", null, true);
        echo "</div>
                    </div>
                    <!-- POINTS -->
                    <div class=\"faq-box\">
                        <div class=\"faq-section\">";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("POINTS"), "html", null, true);
        echo "</div>
                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("HOW DO I EARN POINTS?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('2-1', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-1\">";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("There are 3 levels and you will earn points accordingly based on your purchase value. As you purchase more, you move to the next level and also avail higher benefits"), "html", null, true);
        echo "
                        ";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Plus, you can earn bonus points for other activities like filling additional profile information, referring friends to become members, logging in via your Facebook account. These non-qualifying points can be redeemed for rewards. But they will NOT be counted towards level upgrade."), "html", null, true);
        echo "
                        </div>

                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("HOW DO I KNOW ABOUT MY ACCRUED POINT STATUS?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('2-2', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-2\">";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("answer_2_2"), "html", null, true);
        echo "</div>

                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("DO POINTS EVER EXPIRE?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('2-3', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-3\">";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("answer_2_3"), "html", null, true);
        echo "</div>

                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("WHAT IS THE VALIDITY OF ACCUMULATED LOYALTY POINTS?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('2-4', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-4\">answer 3</div>

                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("WHAT SHOULD I DO WHEN THE POINTS IN MY PROFILE IS NOT UPDATED?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('2-5', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-5\">";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Usually points wil be updated within 24 hours from your purchase and 5 days latest. If you have any concern about missing points in your account, please contact us at (+84) 937 200 501."), "html", null, true);
        echo "</div>

                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("DO I EARN POINTS ON ITEM IN PROMOTIONS OF CASH VOUCHERS?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('2-6', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-6\">";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("No, rewards can be earned only on the net bill value paid by you."), "html", null, true);
        echo " </div>

                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("WHAT IF I WOULD LIKE TO CHANGE MY MOBILE NUMBER?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('2-7', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-7\">";
        // line 106
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("In such a scenario, kindly call Starclub hotline (+84) 937 200 501. The operator will verify your identity before accepting your request for change of mobile number, post which the change will be updated in our system and intimated to you within 3 working days."), "html", null, true);
        echo " </div>

                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 109
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("COULD I TRANSFER MY POINTS TO OTHER MEMBER?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('2-8', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-8\">";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("No, you cannot. The points are earned by you and valid for you only."), "html", null, true);
        echo "</div>
                    </div>
                    <!-- REWARDS REDEMPTION -->
                    <div class=\"faq-box\">
                        <div class=\"faq-section\">";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("REWARDS REDEMPTION"), "html", null, true);
        echo "</div>
                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("WHEN & HOW DO I REDEEM MY POINTS?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('3-1', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-3-1\">";
        // line 121
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Points can be redeemed by visiting Starclub website and going to \"Gift\" sectoin. There you can choose the rewards you like and how you would like it to deliver to you. Or you can always go to one of our stores and ask the staff to redeem your points. You will then received an SMS with a verification number, which will match the one generated by the system at cashier desk. Then you can get your reward."), "html", null, true);
        echo "
                        </div>

                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 125
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("CAN I REDEEM CURRENTLY DISCOUNTED ITEMS?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('3-3', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-3-3\">";
        // line 128
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("No you can only redeem the items in the \"Gift\" section of Starclub"), "html", null, true);
        echo "</div>

                        <div class=\"faq-question clo\">
                            <div class=\"q-left\">";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("If I wish not to continue, can I unsubscribe or opt out from the?"), "html", null, true);
        echo "</div>
                            <div class=\"q-arrow\"><span class=\"arrow\" onclick=\"showAnswer('3-4', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-3-4\">";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Yes, you can just contact our hotline (+84) 937 200 501. The operator will guide you further about the unsubscribing process"), "html", null, true);
        echo "</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
";
    }

    // line 142
    public function block_javascript($context, array $blocks = array())
    {
        // line 143
        echo "    \$(document).ready(function() {
        \$('.faq-question').on('click', function() {
            if(\$(this).hasClass('open'))
                \$(this).removeClass('open').addClass('clo').next().hide()
            else \$(this).addClass('open').removeClass('clo').next().show()
        })
    });
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Static:faq.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  312 => 143,  309 => 142,  297 => 134,  291 => 131,  285 => 128,  279 => 125,  272 => 121,  266 => 118,  261 => 116,  254 => 112,  248 => 109,  242 => 106,  236 => 103,  230 => 100,  224 => 97,  218 => 94,  212 => 91,  203 => 85,  197 => 82,  191 => 79,  185 => 76,  179 => 73,  172 => 69,  168 => 68,  162 => 65,  157 => 63,  150 => 59,  144 => 56,  138 => 53,  132 => 50,  126 => 47,  120 => 44,  115 => 42,  88 => 17,  85 => 16,  51 => 13,  47 => 7,  44 => 6,  41 => 5,  34 => 3,  31 => 2,);
    }
}
