<?php

/* AevitasLevisBundle:Front:root.html.twig */
class __TwigTemplate_ff6bcbf8edf20f8c8324525b118b0305 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'jslib' => array($this, 'block_jslib'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "    <!DOCTYPE html>
    <!--[if lt IE 8]>   <html lang=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "locale"), "html", null, true);
        echo " class=\"lt-ie9 lt-ie8\" xmlns:fb=\"http://www.facebook.com/2008/fbml\"> <![endif]-->
    <!--[if IE 8]>     <html lang=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "locale"), "html", null, true);
        echo " class=\"lt-ie9\" xmlns:fb=\"http://www.facebook.com/2008/fbml\"> <![endif]-->
    <!--[if gt IE 8]><!--> <html lang=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "locale"), "html", null, true);
        echo "\" class=\"gt-ie8\" xmlns:fb=\"http://www.facebook.com/2008/fbml\"> <!--<![endif]-->
        <head>
            <meta charset=\"utf-8\">
            ";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        // line 11
        echo "            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta name=\"author\" content=\"Star Club\">
            ";
        // line 13
        $this->displayBlock('header', $context, $blocks);
        // line 28
        echo "            <link rel=\"shortcut icon\" href=\"/ico/favicon.ico\">
        <script type=\"text/javascript\">var switchTo5x=true;</script>
";
        // line 31
        echo "<script type=\"text/javascript\">stLight.options({publisher: \"ur-aa108a06-5d8d-4eb2-da84-9fe9e749928f\", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
        </head>
        <body class=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method"), "html", null, true);
        echo "\">
            ";
        // line 34
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasConfigBundle:Config:facebookInit"));
        echo "
            <div class=\"navbar-wrapper\">
                <div class=\"container\">
                    <div class=\"navbar navbar-inverse\">
                        <div class=\"navbar-inner\">
                            <button type=\"button\" class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                                <span class=\"icon-bar\"></span>
                                <span class=\"icon-bar\"></span>
                                <span class=\"icon-bar\"></span>
                            </button>
                            <a class=\"brand\" href=\"/\" title=\"Star Club\">Star Club</a>
                            <div class=\"nav-collapse collapse\">
                                ";
        // line 46
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasLevisBundle:Home:renderTopMenu", array("route" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method"))));
        echo "
                                <!-- Top Panel -->
                                <div id=\"user_control\">
                                    ";
        // line 49
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasLevisBundle:Home:renderLoginPanel"));
        echo "
                                    ";
        // line 50
        echo $this->env->getExtension('aevitas_twig')->localize();
        echo "
                                </div>
                            </div><!--/.nav-collapse -->
                        </div><!-- /.navbar-inner -->
                    </div><!-- /.navbar -->
                </div> <!-- /.container -->
            </div><!-- /.navbar-wrapper -->

            <div id=\"myModal\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
                    <h3 id=\"myModalLabel\">";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Log in via Facebook"), "html", null, true);
        echo "</h3>
                </div>
                <div class=\"modal-body\">
                    <p>";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Loading"), "html", null, true);
        echo "...</p>
                </div>
            </div>
            ";
        // line 67
        $this->displayBlock('content', $context, $blocks);
        // line 157
        echo "            <div class=\"branches\">
                <div>
                    <span class=\"prev\">pre</span>
                    <div id=\"logo_carousel\">
                        <ul>
                            <li><a href=\"javascript:void(0);\" title=\"Levi's\"><img src=\"/images/logo/levis.png\" alt=\"Levi's\" /></a></li>
                            <li><a href=\"javascript:void(0);\" title=\"Cartier\"><img src=\"/images/logo/cartier.png\" alt=\"Cartier\" /></a></li>
                            <li><a href=\"javascript:void(0);\" title=\"Armani\"><img src=\"/images/logo/armani.png\" alt=\"Armani\" /></a></li>
                            <li><a href=\"javascript:void(0);\" title=\"Silhouette\"><img src=\"/images/logo/silhouette.png\" alt=\"Silhouette\" /></a></li>
                            <li><a href=\"javascript:void(0);\" title=\"DKNY\"><img src=\"/images/logo/dkny.png\" alt=\"DKNY\" /></a></li>
                            <li><a href=\"javascript:void(0);\" title=\"Eyewear\"><img src=\"/images/logo/eyewear.png\" alt=\"Eyewear\" /></a></li>
                            <li><a href=\"javascript:void(0);\" title=\"TagHeuer\"><img src=\"/images/logo/tagheuer.png\" alt=\"TagHeuer\" /></a></li>
                            <li><a href=\"javascript:void(0);\" title=\"Levi's\"><img src=\"/images/logo/levis.png\" alt=\"Levi's\" /></a></li>
                            <li><a href=\"javascript:void(0);\" title=\"Cartier\"><img src=\"/images/logo/cartier.png\" alt=\"Cartier\" /></a></li>
                            <li><a href=\"javascript:void(0);\" title=\"Armani\"><img src=\"/images/logo/armani.png\" alt=\"Armani\" /></a></li>
                            <li><a href=\"javascript:void(0);\" title=\"Silhouette\"><img src=\"/images/logo/silhouette.png\" alt=\"Silhouette\" /></a></li>
                            <li><a href=\"javascript:void(0);\" title=\"DKNY\"><img src=\"/images/logo/dkny.png\" alt=\"DKNY\" /></a></li>
                            <li><a href=\"javascript:void(0);\" title=\"Eyewear\"><img src=\"/images/logo/eyewear.png\" alt=\"Eyewear\" /></a></li>
                            <li><a href=\"javascript:void(0);\" title=\"TagHeuer\"><img src=\"/images/logo/tagheuer.png\" alt=\"TagHeuer\" /></a></li>
                        </ul>
                    </div>
                    <span class=\"next\">next</span>
                </div>
            </div>
            <footer>
                <div>
                    <div class=\"moreinfo\">
                        <div>
                            <h3>";
        // line 185
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("About"), "html", null, true);
        echo "</h3>
                            <span class=\"yellow\"></span>
                            <ul>
                                    <li><a href=\"";
        // line 188
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("about_us", array("locale" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "getLocale"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Starclub"), "html", null, true);
        echo "</a></li>
                                    <li><a href=\"";
        // line 189
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("about_brands", array("locale" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "getLocale"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Brands"), "html", null, true);
        echo "</a></li>
                                <li><a href=\"";
        // line 190
        echo $this->env->getExtension('routing')->getPath("levis_store_location");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Store Locations"), "html", null, true);
        echo "</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3>";
        // line 194
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Products"), "html", null, true);
        echo "</h3>
                            <span class=\"yellow\"></span>
                            <ul>
                                <li><a href=\"#team\">";
        // line 197
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("For Men"), "html", null, true);
        echo "</a></li>
                                <li><a href=\"#team\">";
        // line 198
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("For Women"), "html", null, true);
        echo "</a></li>
                                <li><a href=\"#team\">";
        // line 199
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sale Off"), "html", null, true);
        echo "</a></li>
                                <!--li><a href=\"#team\">";
        // line 200
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Look Book"), "html", null, true);
        echo "</a></li-->
                            </ul>
                        </div>
                        <div>
                            <h3>";
        // line 204
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Support"), "html", null, true);
        echo "</h3>
                            <span class=\"yellow\"></span>
                            <ul>
                                <li><a href=\"";
        // line 207
        echo $this->env->getExtension('routing')->getPath("levis_contact_us");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Contact Us"), "html", null, true);
        echo "</a></li>
                                <li><a href=\"#team\">";
        // line 208
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Shipping & Delivery"), "html", null, true);
        echo "</a></li>
                                <li><a href=\"#team\">";
        // line 209
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Sitemap"), "html", null, true);
        echo "</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=\"tos\">
                    <div>
                        <ul>
                            <li><a href=\"#\">";
        // line 217
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Privacy Policy"), "html", null, true);
        echo "</a></li>
                            <li><a href=\"#\">";
        // line 218
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("License Agreement"), "html", null, true);
        echo "</a></li>
                            <li><a href=\"#\">";
        // line 219
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Term of Use"), "html", null, true);
        echo "</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
            ";
        // line 224
        $this->displayBlock('jslib', $context, $blocks);
        // line 246
        echo "            <script>
                !function(\$) {
                    \$(function() {
                        //Logo grayscale
                        //grayscale(\$('#logo_carousel img'));
                        //\$('#logo_carousel img').hover(function() {
                        //    grayscale.reset(\$(this));
                        //},
                        //        function() {
                        //            grayscale(\$(this));
                        //        });
                        // Logo bxSlider
                        \$('#logo_carousel').jCarouselLite({
                            btnNext: \"span.next\",
                            btnPrev: \"span.prev\",
                            mouseWheel: true,
                            visible: 8,
                            auto: 1,
                            speed: 1000
                                  });;
                        // carousel demo
                        \$('#myCarousel').carousel();

                        // User Dropdown Box
                        \$('.signin_button > .yellow_button, .login > a').click(function(e) {
                            e.preventDefault();
                            \$(this).next().slideToggle();
                        });

                        //Hide Dropdown box when not focusing
                        \$(document).mouseup(function(e) {
                            var \$dropbox = \$('.signin_button, .login');
                            if (\$dropbox.has(e.target).length == 0) {
                                \$dropbox.children('div').slideUp();
                            }
                        });
                ";
        // line 282
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "ref"), "method") != null)) {
            // line 283
            echo "                            \$.ajax({
                                url: '";
            // line 284
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("front_set_ref", array("ref" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "ref"), "method"))), "html", null, true);
            echo "',
                                dataType: 'json'
                            })
                ";
        }
        // line 288
        echo "                            //Carousel controller
                            \$('.carousel-control').fadeTo(1, 0.01);
                            \$('#myCarousel').hover(function() {
                                \$(this).find('.carousel-control').stop().fadeTo(300, 1);
                            },
                                    function() {
                                        \$(this).find('.carousel-control').stop().fadeTo(300, 0.01);
                                    });
                ";
        // line 296
        $this->displayBlock('javascript', $context, $blocks);
        // line 316
        echo "                        })
                    }(window.jQuery)
            </script>
        </body>
    </html>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        // line 9
        echo "        <title>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Star Club"), "html", null, true);
        echo "</title>
            ";
    }

    // line 13
    public function block_header($context, array $blocks = array())
    {
        // line 14
        echo "                <meta property=\"og:app_id\" content=\"546740148720877\" />
                <meta property=\"fb:app_id\" content=\"546740148720877\" />
                <!-- Le styles -->
                <link rel=\"stylesheet\" href=\"/bundles/aevitaslevis/front/css/fonts.css\" type=\"text/css\" media=\"screen\" />
                ";
        // line 18
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "a76d4ac_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a76d4ac_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_bootstrap_1.css");
            // line 25
            echo "                <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
                ";
            // asset "a76d4ac_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a76d4ac_1") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_bootstrap-responsive_2.css");
            echo "                <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
                ";
            // asset "a76d4ac_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a76d4ac_2") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_select2_3.css");
            echo "                <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
                ";
            // asset "a76d4ac_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a76d4ac_3") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_datepicker_4.css");
            echo "                <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
                ";
            // asset "a76d4ac_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a76d4ac_4") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_style_5.css");
            echo "                <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
                ";
        } else {
            // asset "a76d4ac"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a76d4ac") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress.css");
            echo "                <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
                ";
        }
        unset($context["asset_url"]);
        // line 27
        echo "            ";
    }

    // line 67
    public function block_content($context, array $blocks = array())
    {
        // line 68
        echo "                <div id=\"myCarousel\" class=\"carousel slide carousel-fade\">
                    <div class=\"carousel-inner\">
                        <div class=\"item active\">
                            <img src=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/banner new-01.jpg"), "html", null, true);
        echo "\" alt=\"\">
                            <div class=\"container\">
                                <!--div class=\"carousel-caption\">
                                    <h2>Show off your class</h2>
                                    <p class=\"lead\">You Deserve Special Treatment</p>
                                </div-->
                            </div>
                        </div>
                        <div class=\"item\">
                            <img src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/banner new-02.jpg"), "html", null, true);
        echo "\" alt=\"\">
                            <div class=\"container\">
                            </div>
                        </div>
                        <div class=\"item\">
                            <img src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/banner new-03.jpg"), "html", null, true);
        echo "\" alt=\"\">
                            <div class=\"container\">
                            </div>
                        </div>
                        <div class=\"item\">
                            <img src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/banner new-04.jpg"), "html", null, true);
        echo "\" alt=\"\">
                            <div class=\"container\">
                            </div>
                        </div>
                        <div class=\"item\">
                            <img src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/banner new-05.jpg"), "html", null, true);
        echo "\" alt=\"\">
                            <div class=\"container\">
                            </div>
                        </div>
                        <div class=\"item\">
                            <img src=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/banner new-06.jpg"), "html", null, true);
        echo "\" alt=\"\">
                            <div class=\"container\">
                            </div>
                        </div>
                        <div class=\"item\">
                            <img src=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/banner new-07.jpg"), "html", null, true);
        echo "\" alt=\"\">
                            <div class=\"container\">
                            </div>
                        </div>
                    </div>
                    <a class=\"left carousel-control\" href=\"#myCarousel\" data-slide=\"prev\">&lsaquo;</a>
                    <a class=\"right carousel-control\" href=\"#myCarousel\" data-slide=\"next\">&rsaquo;</a>
                </div>
                <section id=\"registration\" class=\"clearfix\">
                    <form action=\"";
        // line 114
        echo $this->env->getExtension('routing')->getPath("levis_home_complete_enrollment");
        echo "\" id=\"instore_reg\" method=\"post\">
                        <legend>";
        // line 115
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Complete Enrolment"), "html", null, true);
        echo "</legend>
                        <div>                
                            ";
        // line 117
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice_enroll"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 118
            echo "                                <div class=\"alert alert-faded\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                                    ";
            // line 120
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                                </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 123
        echo "                            <p>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Thank you for joining Star Club. Please enter the SMS registration code you got from us to start enjoying all the privileges and exploring exciting rewards exclusively for you."), "html", null, true);
        echo "</p>
                            ";
        // line 124
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "registration"), 'label');
        echo "
                            ";
        // line 125
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "registration"), 'widget');
        echo "
                            ";
        // line 126
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                            <!--a href=\"javascript:void(0);\" title=\"Forgotten your ID\">Forgotten your ID</a-->
                            <input type=\"submit\" class=\"yellow_button\" name=\"instore_reg_submit\" id=\"instore_reg_submit\" value=\"";
        // line 128
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Continue"), "html", null, true);
        echo "\" />
                        </div>
                    </form>
                    <form action=\"";
        // line 131
        echo $this->env->getExtension('routing')->getPath("levis_home_register_online");
        echo "\" id=\"online_reg\" method=\"get\">
                        <legend>";
        // line 132
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Join Program Now"), "html", null, true);
        echo "</legend>
                        <div>
                            <p>";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("You can easily join Star Club using your Facebook account. This is highly recommended to give you the best experience as a Star Club member. You also get an extra 100 points doing so."), "html", null, true);
        echo ".</p>
                            ";
        // line 135
        echo $this->env->getExtension('facebook')->renderLoginButton(array("autologoutlink" => false, "onlogin" => $this->env->getExtension('routing')->getPath("_security_check")));
        echo "
                            <p class=\"separator\">";
        // line 136
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("OR"), "html", null, true);
        echo "</p>
                            <label for=\"online_reg_id\" class=\"required\">";
        // line 137
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("YOUR EMAIL"), "html", null, true);
        echo "</label>
                            <input type=\"email\" name=\"email\" id=\"online_reg_id\" value=\"\" />
                            <input type=\"submit\" class=\"yellow_button\" name=\"instore_reg_submit\" id=\"instore_reg_submit\" value=\"";
        // line 139
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Continue"), "html", null, true);
        echo "\" /><span class=\"agree\"><input type=\"checkbox\" id=\"aggree\"/> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Accept our Term of Use"), "html", null, true);
        echo "</span>
                            <p>";
        // line 140
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Click here"), "html", null, true);
        echo " <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("privacy_policy", array("locale" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "locale"))), "html", null, true);
        echo "\" title=\"Privacy Policy\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Privacy Policy"), "html", null, true);
        echo "</a> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("to see our Privacy Policy"), "html", null, true);
        echo ". ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("By clicking above you acknowledge and accept our"), "html", null, true);
        echo " <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("term_of_use", array("locale" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "locale"))), "html", null, true);
        echo "\" title=\"Terms of Service\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Terms of Use"), "html", null, true);
        echo "</a>, ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("and consent to receive emails from Starclub. You can update your email preferences anytime at www.starclubvn.com."), "html", null, true);
        echo " </p>
                        </div>
                    </form>
                </section>
                <div id=\"agtos\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
                        <h3 id=\"myModalLabel\">";
        // line 147
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Term of Use"), "html", null, true);
        echo "</h3>
                    </div>
                    <div class=\"modal-body\">
                        <p>";
        // line 150
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Agree our Term of Use first"), "html", null, true);
        echo "</p>
                    </div>
                    <div class=\"modal-footer\">
                        <button class=\"btn btn-primary\" data-dismiss=\"modal\" aria-hidden=\"true\">";
        // line 153
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Close"), "html", null, true);
        echo "</button>
                    </div>
                </div>
            ";
    }

    // line 224
    public function block_jslib($context, array $blocks = array())
    {
        // line 225
        echo "                <script src=\"//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js\"></script>
                ";
        // line 226
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "74ee672_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_0") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_bootstrap.min_1.js");
            // line 243
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_1") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_bootstrap-alert_2.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_2") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_bootstrap-transition_3.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_3") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_jquery.uniform.min_4.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_4") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_bootstrap-modal_5.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_5") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_bootstrap-dropdown_6.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_6") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_bootstrap-tooltip_7.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_7") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_bootstrap-popover_8.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_8") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_bootstrap-carousel_9.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_9") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_bootstrap-grayscale_10.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_10") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_bootstrap-datepicker_11.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_11"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_11") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_select2_12.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_12"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_12") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_jquery.dataTables.min_13.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_13"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_13") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_DT_bootstrap_14.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
            // asset "74ee672_14"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672_14") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_bootstrap-holder_15.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
        } else {
            // asset "74ee672"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_74ee672") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
                ";
        }
        unset($context["asset_url"]);
        // line 245
        echo "            ";
    }

    // line 296
    public function block_javascript($context, array $blocks = array())
    {
        // line 297
        echo "                            \$('#aggree').uniform();
                          \$('form#online_reg').on('submit',function(e){if(\$('.checker span').hasClass('checked')) return true; else {\$('#agtos').modal();return false;};})
                            var scrolled = false;
                            \$('form legend').on('click', function() {
                                \$form = \$(this).parents('form');
                                if (\$form.height() > 100)
                                    \$form.animate({height: 55 + 'px'});
                                else {
                                    \$form.animate({height: 532 + 'px'});
                                    \$(\"html, body\").animate({scrollTop: 500}, 700);
                                }
                            });
                            \$(window).scroll(function() {
                                if (\$(window).scrollTop() >= 100 && \$('#online_reg').height() < 100 && !scrolled) {
                                    \$('#registration form').animate({height: 532 + 'px'});
                                    scrolled = true;
                                }
                            })
                ";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Front:root.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  693 => 297,  690 => 296,  686 => 245,  588 => 243,  584 => 226,  581 => 225,  578 => 224,  570 => 153,  564 => 150,  558 => 147,  534 => 140,  528 => 139,  523 => 137,  519 => 136,  515 => 135,  511 => 134,  506 => 132,  502 => 131,  496 => 128,  491 => 126,  487 => 125,  483 => 124,  478 => 123,  469 => 120,  465 => 118,  461 => 117,  456 => 115,  452 => 114,  440 => 105,  432 => 100,  424 => 95,  416 => 90,  408 => 85,  400 => 80,  388 => 71,  383 => 68,  380 => 67,  376 => 27,  338 => 25,  334 => 18,  328 => 14,  325 => 13,  318 => 9,  315 => 8,  305 => 316,  303 => 296,  293 => 288,  286 => 284,  283 => 283,  281 => 282,  243 => 246,  241 => 224,  233 => 219,  229 => 218,  225 => 217,  214 => 209,  210 => 208,  204 => 207,  198 => 204,  191 => 200,  187 => 199,  183 => 198,  179 => 197,  173 => 194,  164 => 190,  158 => 189,  152 => 188,  146 => 185,  116 => 157,  114 => 67,  108 => 64,  102 => 61,  88 => 50,  84 => 49,  78 => 46,  63 => 34,  59 => 33,  55 => 31,  51 => 28,  49 => 13,  45 => 11,  43 => 8,  37 => 5,  33 => 4,  29 => 3,  26 => 2,  24 => 1,);
    }
}
