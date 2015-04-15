<?php

/* AevitasLevisBundle:Static:brands.html.twig */
class __TwigTemplate_3e8ce0c31a6a0ab2cdb1b271bb0729c6 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Star Club - Store Location"), "html", null, true);
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
            // asset "7c474a5_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7c474a5_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_store_bootstrap_1.css");
            // line 13
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "7c474a5_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7c474a5_1") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_store_bootstrap-responsive_2.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "7c474a5_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7c474a5_2") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_store_style_3.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "7c474a5_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7c474a5_3") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_store_store_location_4.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        } else {
            // asset "7c474a5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7c474a5") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_store.css");
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Brands"), "html", null, true);
        echo "</h3>
            </div>
        </div>
    </div>
</div><!-- /.carousel -->
<section id=\"main\" class=\"clearfix\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <!--  -->
                <div id=\"panel-left\">
                    <div class=\"text-title\"><span rel=\"apparel\">";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Apparel"), "html", null, true);
        echo "</span><i></i></div>
                    <div class=\"text-title\"><span rel=\"footwear\">";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Footwear"), "html", null, true);
        echo "</span><i></i></div>
                    <div class=\"text-title\"><span rel=\"eyewear\">";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Eyewear"), "html", null, true);
        echo "</span><i></i></div>
                    <div class=\"text-title\"><span rel=\"watches\">";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Watches"), "html", null, true);
        echo "</span><i></i></div>
                    <div class=\"text-title\"><span rel=\"fragnance\">";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Fragrance"), "html", null, true);
        echo "</span><i></i></div>
                </div>
                <div id=\"panel-right\">
                    <div id=\"apparel\" class=\"show\"><h2>";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Apparel"), "html", null, true);
        echo "</h2>
                        <div class=\"list\"><img src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/levis.png"), "html", null, true);
        echo "\" alt=\"levis\"/></div>
                    </div>
                    <div id=\"footwear\"><h2>";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Footwear"), "html", null, true);
        echo "</h2>
                        <div class=\"list\"><img src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/birkenstock.jpg"), "html", null, true);
        echo "\" alt=\"birkenstock\"/></div>
                    </div>
                    <div id=\"eyewear\"><h2>";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Eyewear"), "html", null, true);
        echo "</h2>
                        <div class=\"list\"><img src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/cartier.png"), "html", null, true);
        echo "\" alt=\"cartier\"/>
                            <img src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/eyewear.png"), "html", null, true);
        echo "\" alt=\"eyewear\"/>
                            <img src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/silhouette.png"), "html", null, true);
        echo "\" alt=\"silhoutte\"/>
                            <img src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/tagheuer.png"), "html", null, true);
        echo "\" alt=\"tagheure\"/>
                            <img src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/davidyurman.png"), "html", null, true);
        echo "\" alt=\"tagheure\"/>
                            <img src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/judithleiber.png"), "html", null, true);
        echo "\" alt=\"tagheure\"/></div>
                    </div>
                    <div id=\"watches\"><h2>";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Watches"), "html", null, true);
        echo "</h2>
                        <div class=\"list\"><img src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/armani.png"), "html", null, true);
        echo "\" alt=\"birkenstock\"/>
                            <img src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/dkny.png"), "html", null, true);
        echo "\" alt=\"birkenstock\"/>
                            <img src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/marc.png"), "html", null, true);
        echo "\" alt=\"birkenstock\"/>
                            <img src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/diesel.png"), "html", null, true);
        echo "\" alt=\"birkenstock\"/>
                            <img src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/fossil.png"), "html", null, true);
        echo "\" alt=\"birkenstock\"/>
                            <img src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/addidas.png"), "html", null, true);
        echo "\" alt=\"birkenstock\"/>
                        </div>
                    </div>
                    <div id=\"fragnance\"><h2>";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Fragrance"), "html", null, true);
        echo "</h2>
                        <div class=\"list\"><img src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/caron.png"), "html", null, true);
        echo "\" alt=\"birkenstock\"/>
                            <img src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/range.png"), "html", null, true);
        echo "\" alt=\"birkenstock\"/>
                            <img src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/dsquared.png"), "html", null, true);
        echo "\" alt=\"birkenstock\"/>
                            <img src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/ferre.png"), "html", null, true);
        echo "\" alt=\"birkenstock\"/>
                            <img src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo/aigner.png"), "html", null, true);
        echo "\" alt=\"birkenstock\"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
";
    }

    // line 78
    public function block_javascript($context, array $blocks = array())
    {
        // line 79
        echo "    \$('.text-title span').on('click', function(){rel = \$(this).attr('rel');\$('.show').removeClass('show');\$('#'+rel).addClass('show')})
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Static:brands.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 79,  242 => 78,  229 => 69,  225 => 68,  221 => 67,  217 => 66,  213 => 65,  209 => 64,  203 => 61,  199 => 60,  195 => 59,  191 => 58,  187 => 57,  183 => 56,  179 => 55,  174 => 53,  170 => 52,  166 => 51,  162 => 50,  158 => 49,  154 => 48,  150 => 47,  145 => 45,  141 => 44,  136 => 42,  132 => 41,  126 => 38,  122 => 37,  118 => 36,  114 => 35,  110 => 34,  96 => 23,  88 => 17,  85 => 16,  51 => 13,  47 => 7,  44 => 6,  41 => 5,  34 => 3,  31 => 2,);
    }
}
