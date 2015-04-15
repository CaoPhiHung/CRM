<?php

/* AevitasLevisBundle:Gift:giftDetail.html.twig */
class __TwigTemplate_79686d7654742734c1b46c7fce0cfbc6 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo "<meta property=\"og:site_name\" content=\"Star Club\"/>
";
        // line 7
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user") != null)) {
            // line 8
            echo "<meta property=\"og:url\" content=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("levis_gift_detail", array("slug" => $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getSlug"), "topcat" => $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCat"), "category" => (($this->getAttribute($this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCategory"), "getSlug") . "-") . $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCatid")), "_format" => "html", "ref" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getId"))), "html", null, true);
            echo "\"/>
";
        } else {
            // line 10
            echo "<meta property=\"og:url\" content=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("levis_gift_detail", array("slug" => $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getSlug"), "topcat" => $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCat"), "category" => (($this->getAttribute($this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCategory"), "getSlug") . "-") . $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCatid")), "_format" => "html")), "html", null, true);
            echo "\"/>
";
        }
        // line 12
        echo "<meta property=\"og:type\" content=\"gift\"/>
<meta property=\"og:title\" content=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getName"), "html", null, true);
        echo " - Star Club\" /> 
<meta property=\"og:image\" content=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getThumbnail", array(0 => 155, 1 => 155), "method")), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCreated"), "getTimestamp"), "html", null, true);
        echo "\" />
<meta property=\"og:description\" content=\"";
        // line 15
        echo $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getExcerpt");
        echo "\" />
<meta name=\"description\" content=\"";
        // line 16
        echo $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getDescription");
        echo "\" />
<meta name=\"keywords\" content=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getTags"), "html", null, true);
        echo "\"/>
<meta property=\"og:site_name\" content=\"www.StarClubvn.com\" />
<!-- Le styles -->
";
        // line 20
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "a5f3466_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a5f3466_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_dashboard_bootstrap_1.css");
            // line 31
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

    // line 34
    public function block_content($context, array $blocks = array())
    {
        // line 35
        echo "
<!-- Registration Content
================================================== -->
<!-- Wrap of all the registration block. -->
<section id=\"main\" class=\"clearfix\">
    <!-- breadsrums -->
    <div id=\"breadcrums\">
        <li class=\"br-home\" onclick=\"void(0);\"></li>
        <li class=\"br-arrow\"></li>
        <li class=\"br-normal\"><a href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("levis_gift_category", array("topcat" => "Reward"));
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Reward"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Reward"), "html", null, true);
        echo "</a></li>
        <li class=\"br-arrow2\"></li>
        <li class=\"br-arrow\"></li>
        <li class=\"br-normal\"><a href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("levis_gift_category", array("topcat" => (isset($context["topcat"]) ? $context["topcat"] : $this->getContext($context, "topcat")))), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["topcat"]) ? $context["topcat"] : $this->getContext($context, "topcat"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["topcat"]) ? $context["topcat"] : $this->getContext($context, "topcat"))), "html", null, true);
        echo "</a></li>
        <li class=\"br-arrow2\"></li>
        <li class=\"br-arrow\"></li>
        <li class=\"br-normal\"><a href=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("levis_gift_subcategory", array("topcat" => (isset($context["topcat"]) ? $context["topcat"] : $this->getContext($context, "topcat")), "catid" => $this->getAttribute($this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCategory"), "getId"), "catslug" => $this->getAttribute($this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCategory"), "getSlug"))), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["topcat"]) ? $context["topcat"] : $this->getContext($context, "topcat"))), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCategory"), "getName")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute($this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCategory"), "getName")), "html", null, true);
        echo "</a></li>
        <li class=\"br-arrow2\"></li>
        <li class=\"br-arrow\"></li>
        <li class=\"br-normal\"><a href=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("levis_gift_detail", array("slug" => $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getSlug"), "topcat" => $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCat"), "category" => (($this->getAttribute($this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCategory"), "getSlug") . "-") . $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getCatid")), "_format" => "html")), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getName"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getName"), "html", null, true);
        echo "</a></li>
        <li class=\"br-arrow2\"></li>
    </div>
    <div class=\"shadow_wrapper\">
        <div>
            ";
        // line 58
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasLevisBundle:Checkout:renderSumCart"));
        echo "
            <div class=\"content\">

                <div class=\"giftinfo\">
                    <!-- product image -->
                    <div id=\"product-image\">
                        <div class=\"list-thumbnail\">
                            <div>
                                <div id=\"logo_thumbnail\">
                                    <ul>
                                            ";
        // line 68
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getImagesUrlArray"));
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 69
            echo "                                            <li><a href=\"#\" title=\"Levi's\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((isset($context["image"]) ? $context["image"] : $this->getContext($context, "image"))), "html", null, true);
            echo "\" alt=\"Levi's\" /></a></li>
                                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- product detail -->
                                <div id=\"product-detail\">
                                    <div class=\"product-title\">";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getName"), "html", null, true);
        echo "</div>
                                    <div class=\"product-description\">
                                ";
        // line 81
        echo $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getExcerpt");
        echo "
                                        </div>
                                        <div class=\"product-info\">
                                            <div class=\"product-point\">";
        // line 84
        echo $this->env->getExtension('translator')->getTranslator()->trans("%points% points", array("%points%" => $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getPoint")), "messages");
        echo "</div>
                                            <div class=\"product-availability\">";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Availability"), "html", null, true);
        echo ": <span>In stock</span></div>
                                        </div>
                                        <div class=\"product-quantity clearfix\">
                                            <span><fb:like href=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "baseurl"), "html", null, true);
        echo "\" send=\"true\" layout=\"button_count\" width=\"450\" show_faces=\"false\"></fb:like></span>
                                            <span class='st_twitter_hcount' displayText='Tweet'></span>
                                            <span class='st_email_hcount' displayText='Email'></span>
                                            <span class='st_googleplus_hcount' displayText='Google +'></span>
                                        </div>
                                        <div class=\"product-action\">
                                            <div id=\"bt-add-wishlist\">
                                                <div id=\"icon-wish\"></div>
                                                <div>";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("I want this !"), "html", null, true);
        echo "</div>
                                            </div>
                                            <div id=\"bt-add-bag\">
                                                <div><a href=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_add_gift", array("id" => $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getId"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Add to Bag"), "html", null, true);
        echo "</a></div>
                                                <div id=\"icon-bag\"></div>
                                            </div>
                                        </div>
                                        <div class=\"product-tab\">
                                            <li class=\"pr-tab-item\" onclick=\"switch_tag(this, 'tab-description')\">";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Product Description"), "html", null, true);
        echo "</li>
                                            <li class=\"pr-tab-item active\" onclick=\"switch_tag(this, 'tab-review')\">";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Reviews"), "html", null, true);
        echo "</li>
                                        </div>
                                        <div class=\"tab-show\">
                                            <div class=\"tab-child\" id=\"tab-description\" style=\"display: none;\">
                                    ";
        // line 109
        echo $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getDescription");
        echo "
                                                </div>
                                                <div class=\"tab-child\" id=\"tab-review\">
                                                    <div class=\"fb-comments\" data-href=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "baseurl"), "html", null, true);
        echo "\" data-width=\"560\" data-num-posts=\"4\"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </section>
                    <script>
            function switch_tag(obj, id) {
                \$('.pr-tab-item').removeClass('active');
                \$(obj).addClass('active');
                \$('.tab-child').hide();
                \$('#' + id).show();
            }
                        </script>
";
    }

    // line 131
    public function block_jslib($context, array $blocks = array())
    {
        // line 132
        echo "                        <script src=\"//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js\"></script>
    ";
        // line 133
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d58d26a_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d58d26a_0") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_gift_bootstrap-transition_1.js");
            // line 144
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "d58d26a_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d58d26a_1") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_gift_bootstrap-modal_2.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "d58d26a_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d58d26a_2") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_gift_bootstrap-dropdown_3.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "d58d26a_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d58d26a_3") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_gift_bootstrap-tooltip_4.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "d58d26a_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d58d26a_4") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_gift_bootstrap-carousel_5.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "d58d26a_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d58d26a_5") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_gift_bootstrap-grayscale_6.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "d58d26a_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d58d26a_6") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_gift_bootstrap-holder_7.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "d58d26a_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d58d26a_7") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_gift_jquery.jcarousel.min_8.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "d58d26a_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d58d26a_8") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_gift_jquery.pikachoose.min_9.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "d58d26a"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d58d26a") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_gift.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 146
        echo "        ";
    }

    // line 147
    public function block_javascript($context, array $blocks = array())
    {
        // line 148
        echo "            \$('#bt-add-bag a').on('click', function(e) {
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
                        setTimeout(function(){\$(that).tooltip('hide');\$(that).tooltip('destroy');},1000);
                    }
                })
            })
            \$('#logo_thumbnail ul').PikaChoose({carousel: true});
            \$('#bt-add-wishlist').click(function() {
                \$.ajax({
                    url: '";
        // line 167
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("levis_gift_addwishlist", array("gid" => $this->getAttribute((isset($context["gift"]) ? $context["gift"] : $this->getContext($context, "gift")), "getId"))), "html", null, true);
        echo "',
                    type: \"POST\",
                    dataType: \"json\",
                    success: function(response) {
                        //console.log(response);
                        if (typeof(response.error) != 'undefined') {
                            //failed, gift not exists.
                            if (response.error == 'exists') {
                                alert('this gift already exists in your wish list!');
                            }
                            return;
                        }
                        if (typeof(response.result) != 'undefined' && response.result == true) {
                            alert('this gift was added to your wish list!');
                        }
                    }
                });
            });
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Gift:giftDetail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  437 => 167,  416 => 148,  413 => 147,  409 => 146,  347 => 144,  343 => 133,  340 => 132,  337 => 131,  315 => 112,  309 => 109,  302 => 105,  298 => 104,  288 => 99,  282 => 96,  271 => 88,  265 => 85,  261 => 84,  255 => 81,  250 => 79,  240 => 71,  231 => 69,  227 => 68,  214 => 58,  202 => 53,  190 => 50,  180 => 47,  170 => 44,  159 => 35,  156 => 34,  92 => 31,  88 => 20,  82 => 17,  78 => 16,  74 => 15,  69 => 14,  65 => 13,  62 => 12,  56 => 10,  50 => 8,  48 => 7,  45 => 6,  42 => 5,  35 => 3,  32 => 2,);
    }
}
