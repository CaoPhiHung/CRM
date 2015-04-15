<?php

/* AevitasLevisBundle:Gift:category.html.twig */
class __TwigTemplate_9ebb81b1479b613f7b68bbdc01731a66 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Front:root.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'jslib' => array($this, 'block_jslib'),
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Gift Store"), "html", null, true);
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
            // asset "a5f3466_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a5f3466_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_dashboard_bootstrap_1.css");
            // line 18
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "a5f3466_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a5f3466_1") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_dashboard_bootstrap-responsive_2.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "a5f3466_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a5f3466_2") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_dashboard_select2_3.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "a5f3466_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a5f3466_3") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_dashboard_datepicker_4.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "a5f3466_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a5f3466_4") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_dashboard_style_5.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "a5f3466_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a5f3466_5") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_dashboard_reward_6.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "a5f3466_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a5f3466_6") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_dashboard_reward_detail_7.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "a5f3466_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a5f3466_7") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_dashboard_account_8.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "a5f3466_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a5f3466_8") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_dashboard_clock_9.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        } else {
            // asset "a5f3466"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a5f3466") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_dashboard.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        }
        unset($context["asset_url"]);
    }

    // line 21
    public function block_content($context, array $blocks = array())
    {
        // line 22
        echo "
<!-- Registration Content
================================================== -->
<!-- Wrap of all the registration block. -->
<section id=\"main\" class=\"clearfix\">
    <!-- breadsrums -->
    <div id=\"breadcrums\">
        <li class=\"br-home\" onclick=\"void(0);\"></li>
                    ";
        // line 30
        if (((isset($context["topcat"]) ? $context["topcat"] : $this->getContext($context, "topcat")) != "Reward")) {
            // line 31
            echo "            <li class=\"br-arrow\"></li>
            <li class=\"br-normal\"><a href=\"";
            // line 32
            echo $this->env->getExtension('routing')->getPath("levis_gift_category");
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Reward"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Reward"), "html", null, true);
            echo "</a></li>
            <li class=\"br-arrow2\"></li>
                    ";
        }
        // line 35
        echo "                <li class=\"br-arrow\"></li>
                <li class=\"br-normal\"><a href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("levis_gift_category", array("topcat" => (isset($context["topcat"]) ? $context["topcat"] : $this->getContext($context, "topcat")))), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "currentcat"), "method"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "currentcat"), "method")), "html", null, true);
        echo "</a></li>
                <li class=\"br-arrow2\"></li>
            </div>
            <div class=\"shadow_wrapper\">
                <div>
                        <!-- Shopcart
                        ================================================== -->
                        ";
        // line 43
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasLevisBundle:Checkout:renderSumCart"));
        echo "
                        <!-- /.Shopcart -->
                    <div class=\"content\">
                        <div>
                            <!-- navigation sidebar -->
                            <div id=\"navigation-sidebar\">
                        ";
        // line 49
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasLevisBundle:Gift:renderSideBar", array("topcat" => (isset($context["topcat"]) ? $context["topcat"] : $this->getContext($context, "topcat")))));
        echo "
                        ";
        // line 50
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasLevisBundle:Gift:renderTags", array("topcat" => (isset($context["topcat"]) ? $context["topcat"] : $this->getContext($context, "topcat")))));
        echo "
                                    <div class=\"shop-now amodule\">
                                        <div class=\"module-content\">
                                            <div class=\"shop-now-img\">
                                                <img src=\"/images/shopnow.jpg\"/>
                                            </div>
                                        </div>
                                        <div class=\"bt-shopnow\">SHOP NOW</div>
                                    </div>
                                </div>
                                <!-- main content -->
                                <div id=\"main-content\">
                                    <div id=\"promotion-banner\">
                                        <img src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/discount-50.jpg"), "html", null, true);
        echo "\" width=\"712\"/>
                                    </div>
                                    ";
        // line 65
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasLevisBundle:Gift:renderTopGrid", array("amount" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "amount"), "method"), "sort" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "sort"), "method"))));
        echo "
                                    <div id=\"list-product\">
                                        <ul class=\"arow\">
                                ";
        // line 68
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["gifts"]) ? $context["gifts"] : $this->getContext($context, "gifts")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 69
            echo "                                                <li class=\"item\">
                                                    <div class=\"item-img\"><a href=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("levis_gift_detail", array("slug" => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "getSlug"), "topcat" => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "getCat"), "category" => (($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "getCategory"), "getSlug") . "-") . $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "getCatid")), "_format" => "html")), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "getName"), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "getThumbnail", array(0 => 200, 1 => 242), "method")), "html", null, true);
            echo "\" width=\"200\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "getName"), "html", null, true);
            echo "\"/></a></div>
                                                    <div class=\"item-name\">";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "getName"), "html", null, true);
            echo "</div>
                                                    <div class=\"item-point\">";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "getPoint"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("points"), "html", null, true);
            echo "</div>
                                                    <div class=\"item-add\"><a href=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_add_gift", array("id" => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "getId"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Add to Bag"), "html", null, true);
            echo "</a></div>
                                                </li>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "                                            </ul>
                                        </div>
                                    ";
        // line 78
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasLevisBundle:Gift:renderPagination", array("current" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "page"), "method"), "total" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => ("totalitem" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "currentcat"), "method"))), "method"), "path" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "baseurl"), "amount" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "get", array(0 => "amount"), "method"))));
        echo "
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
";
    }

    // line 86
    public function block_jslib($context, array $blocks = array())
    {
        // line 87
        echo "                <script src=\"//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js\"></script>
    ";
        // line 88
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "9941ec5_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9941ec5_0") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_category_bootstrap-transition_1.js");
            // line 100
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "9941ec5_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9941ec5_1") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_category_bootstrap-modal_2.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "9941ec5_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9941ec5_2") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_category_bootstrap-dropdown_3.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "9941ec5_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9941ec5_3") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_category_bootstrap-tooltip_4.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "9941ec5_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9941ec5_4") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_category_bootstrap-affix_5.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "9941ec5_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9941ec5_5") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_category_select2_6.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "9941ec5_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9941ec5_6") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_category_bootstrap-carousel_7.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "9941ec5_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9941ec5_7") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_category_bootstrap-grayscale_8.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "9941ec5_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9941ec5_8") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_category_bootstrap-holder_9.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "9941ec5_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9941ec5_9") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_category_jquery.jcarousel.min_10.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "9941ec5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9941ec5") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_category.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 102
        echo "        ";
    }

    // line 103
    public function block_javascript($context, array $blocks = array())
    {
        // line 104
        echo "            \$(document).ready(function() {
                \$('#shopcart').affix({offset: 120})
                \$('.submenu').hide();
                \$('.";
        // line 107
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, strtr(strtr((isset($context["topcat"]) ? $context["topcat"] : $this->getContext($context, "topcat")), " ", "_"), "&", "_")), "html", null, true);
        echo "').after(\$('.submenu').html());
                \$('select').select2({showSearchInput: false})
                \$('#sort').on('change', function() {
                });
                \$('form#grid').on('change', function(e) {
                    \$(this).submit();
                });
                \$('.item-add a').on('click', function(e) {
                    that = this;
                    e.preventDefault();
                    \$.ajax({
                        url: \$(this).attr('href'),
                        dataType: 'json',
                        success: function(data) {
                            if (!data.status) {
                                \$('#shopcart span strong').text(data.count);
                            }
                            \$(that).tooltip({title: data.error, delay: {show: 200,hide: 3000}});
                            \$(that).tooltip('show');
                            setTimeout(function(){\$(that).tooltip('destroy')},1000);
                        }
                    })
                })
            });
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Gift:category.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  345 => 107,  340 => 104,  337 => 103,  333 => 102,  265 => 100,  261 => 88,  258 => 87,  255 => 86,  243 => 78,  239 => 76,  228 => 73,  222 => 72,  218 => 71,  208 => 70,  205 => 69,  201 => 68,  195 => 65,  190 => 63,  174 => 50,  170 => 49,  161 => 43,  147 => 36,  144 => 35,  134 => 32,  131 => 31,  129 => 30,  119 => 22,  116 => 21,  52 => 18,  48 => 7,  45 => 6,  42 => 5,  35 => 3,  32 => 2,);
    }
}
