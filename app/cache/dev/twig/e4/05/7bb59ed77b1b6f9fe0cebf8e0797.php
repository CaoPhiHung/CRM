<?php

/* AevitasLevisBundle:Static:memberTier.html.twig */
class __TwigTemplate_e4057bb59ed77b1b6f9fe0cebf8e0797 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("TBF Star Club - Membership Tier"), "html", null, true);
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
            // asset "fdf1fed_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_fdf1fed_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_member_tier_bootstrap_1.css");
            // line 13
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "fdf1fed_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_fdf1fed_1") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_member_tier_bootstrap-responsive_2.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "fdf1fed_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_fdf1fed_2") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_member_tier_membership_tier_3.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "fdf1fed_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_fdf1fed_3") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_member_tier_style_4.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        } else {
            // asset "fdf1fed"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_fdf1fed") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_member_tier.css");
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
        echo "<!-- Carousel
================================================== -->
<div id=\"panel\" class=\"toppanel\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <h3>";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Membership Tiers"), "html", null, true);
        echo "</h3>
            </div>
        </div>
    </div>
</div>
<section id=\"main\" class=\"clearfix\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <img src=\"images/head-image.jpg\" width=\"960\">
                <div id=\"headline\">
                    ";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("membership_tiers_top"), "html", null, true);
        echo "
                    </div>
                    <img src=\"images/tier-image.jpg\" width=\"960\">  
                    <div class=\"column-box\">
                        <div class=\"column-left height-2\">
                            <li class=\"column-title background-1\">";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Accumulated_level"), "html", null, true);
        echo "</li>
                        </div>
                        <div class=\"column-right\">
                            <li class=\"column-child background-4 height-0\">1 Mil–4 Mil ";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("VND"), "html", null, true);
        echo "</li>
                            <li class=\"column-child background-4 height-0\">4.01 Mil–10 Mil ";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("VND"), "html", null, true);
        echo "</li>
                            <li class=\"column-child background-4 height-0\">>10.01 ";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("VND"), "html", null, true);
        echo "</li>
                        </div>
                    </div>
                    <div class=\"column-box\">
                        <div class=\"column-left\">
                            <li class=\"column-title background-1\">";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Purchase points"), "html", null, true);
        echo "</li>
                        </div>
                        <div class=\"column-right\">

                        </div>
                    </div>
                    <div class=\"column-box\">
                        <div class=\"column-left height-1\">
                            <li class=\"column-title background-2\">";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Earn points for every purchase at TBF stores"), "html", null, true);
        echo "</li>
                        </div>
                        <div class=\"column-right\">
                            <li class=\"column-child background-3 height-1\">100,000";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("VND"), "html", null, true);
        echo " = 3000 pt</li>
                            <li class=\"column-child background-3 height-1\">100,000";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("VND"), "html", null, true);
        echo " = 5000 pt</li>
                            <li class=\"column-child background-3 height-1\">100,000";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("VND"), "html", null, true);
        echo " = 7000 pt</li>
                        </div>
                    </div>
                    <div class=\"column-box\">
                        <div class=\"column-left height-1\">
                            <li class=\"column-title background-2\">";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Earn double points for every Purchase during Birthday Month"), "html", null, true);
        echo "</li>
                        </div>
                        <div class=\"column-right\">
                            <li class=\"column-child background-4 height-0\">x2</li>
                            <li class=\"column-child background-4 height-0\">x3</li>
                            <li class=\"column-child background-4 height-0\">x4</li>
                        </div>
                    </div>
                    <div class=\"column-box\">
                        <div class=\"column-left height-2\">
                            <li class=\"column-title background-2\">";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Your personal triple points day-earn triple points when shopping at the booked days"), "html", null, true);
        echo "</li>
                        </div>
                        <div class=\"column-right\">
                            <li class=\"column-child background-4 height-0\">2 ";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("days/year"), "html", null, true);
        echo "</li>
                            <li class=\"column-child background-4 height-0\">3 ";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("days/year"), "html", null, true);
        echo "</li>
                            <li class=\"column-child background-4 height-0\">5 ";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("days/year"), "html", null, true);
        echo "</li>
                        </div>
                    </div>
                    <div class=\"column-box\">
                        <div class=\"column-left\">
                            <li class=\"column-title background-1\">";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Bonus points"), "html", null, true);
        echo "</li>
                        </div>
                        <div class=\"column-right\">

                        </div>
                    </div>
                    <div class=\"column-box\">
                        <div class=\"column-left height-1\">
                            <li class=\"column-title background-2\">";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Fill in extended profile online"), "html", null, true);
        echo "</li>
                        </div>
                        <div class=\"column-right\">
                            <li class=\"column-child background-3 height-0\"></li>
                            <li class=\"column-child background-3 height-0\">";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Up to 200,000 pt"), "html", null, true);
        echo "</li>
                            <li class=\"column-child background-3 height-0\"></li>
                        </div>
                    </div>
                    <div class=\"column-box\">
                        <div class=\"column-left height-1\">
                            <li class=\"column-title background-2\">";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sign up with Facebook account"), "html", null, true);
        echo "</li>
                        </div>
                        <div class=\"column-right\">
                            <li class=\"column-child background-4 height-0\"></li>
                            <li class=\"column-child background-4 height-0\">50,000 ";
        // line 109
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pt"), "html", null, true);
        echo "</li>
                            <li class=\"column-child background-4 height-0\"></li>
                        </div>
                    </div>
                    <div class=\"column-box\">
                        <div class=\"column-left height-1\">
                            <li class=\"column-title background-2\">";
        // line 115
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Refer a friend to become member"), "html", null, true);
        echo "</li>
                        </div>
                        <div class=\"column-right\">
                            <li class=\"column-child background-3 height-0\">50,000 ";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pt"), "html", null, true);
        echo "</li>
                            <li class=\"column-child background-3 height-0\">75,000 ";
        // line 119
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pt"), "html", null, true);
        echo "</li>
                            <li class=\"column-child background-3 height-0\">100,000 ";
        // line 120
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("pt"), "html", null, true);
        echo "</li>
                        </div>
                    </div>
                    <div class=\"column-box\">
                        <div class=\"column-left height-2\">
                            <li class=\"column-title background-2\">";
        // line 125
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Shop at Levi’s during Monday & Tuesday every week"), "html", null, true);
        echo "</li>
                        </div>
                        <div class=\"column-right\">
                            <li class=\"column-child background-4 height-0\">";
        // line 128
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Extra 25,000 pt"), "html", null, true);
        echo "</li>
                            <li class=\"column-child background-4 height-0\">";
        // line 129
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Extra 50,000 pt"), "html", null, true);
        echo "</li>
                            <li class=\"column-child background-4 height-0\">";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Extra 75,000 pt"), "html", null, true);
        echo "</li>
                        </div>
                    </div>
                    <div class=\"column-box\">
                        <div class=\"column-left height-1\">

                        </div>
                        <div class=\"column-right\">

                        </div>
                    </div>
                    <div>&nbsp;</div>
                </div>
            </div>
        </div>
    </section>
";
    }

    // line 147
    public function block_javascript($context, array $blocks = array())
    {
        // line 148
        echo "
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Static:memberTier.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  311 => 148,  308 => 147,  287 => 130,  283 => 129,  279 => 128,  273 => 125,  265 => 120,  261 => 119,  257 => 118,  251 => 115,  242 => 109,  235 => 105,  226 => 99,  219 => 95,  208 => 87,  200 => 82,  196 => 81,  192 => 80,  186 => 77,  173 => 67,  165 => 62,  161 => 61,  157 => 60,  151 => 57,  140 => 49,  132 => 44,  128 => 43,  124 => 42,  118 => 39,  110 => 34,  96 => 23,  88 => 17,  85 => 16,  51 => 13,  47 => 7,  44 => 6,  41 => 5,  34 => 3,  31 => 2,);
    }
}
