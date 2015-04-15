<?php

/* AevitasLevisBundle:Dashboard:extendprofile.html.twig */
class __TwigTemplate_32eedb8eca4a9bc2fe539146ef402605 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("User Dashboard"), "html", null, true);
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
            // asset "5f7c2ab_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5f7c2ab_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_profile_bootstrap_1.css");
            // line 17
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "5f7c2ab_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5f7c2ab_1") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_profile_bootstrap-responsive_2.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "5f7c2ab_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5f7c2ab_2") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_profile_select2_3.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "5f7c2ab_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5f7c2ab_3") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_profile_datepicker_4.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "5f7c2ab_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5f7c2ab_4") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_profile_style_5.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "5f7c2ab_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5f7c2ab_5") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_profile_reward_6.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "5f7c2ab_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5f7c2ab_6") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_profile_reward_detail_7.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "5f7c2ab_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5f7c2ab_7") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_profile_account_8.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        } else {
            // asset "5f7c2ab"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5f7c2ab") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_profile.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        }
        unset($context["asset_url"]);
    }

    // line 20
    public function block_content($context, array $blocks = array())
    {
        // line 21
        echo "<div id=\"breadcrums\">
    <ul>
        <li onclick=\"void(0);\" class=\"br-home\"></li>
        <li class=\"br-arrow\"></li>
        <li class=\"br-normal\"><a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("levis_user_dashboard");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Customer Account"), "html", null, true);
        echo "</a></li>
        <li class=\"br-arrow2\"></li>
        <li class=\"br-arrow\"></li>
        <li class=\"br-normal\"><a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("levis_user_profile");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Extended profile"), "html", null, true);
        echo "</a></li>
        <li class=\"br-arrow2\"></li></ul>
</div>
<!-- Registration Content
================================================== -->
<!-- Wrap of all the registration block. -->
<section id=\"userdash\" class=\"clearfix\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <div class=\"info\">
                    <ul class=\"topnav\">
                        <li><a href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("levis_user_dashboard");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Dashboard"), "html", null, true);
        echo "</a></li>
                        <li class=\"active\"><a href=\"";
        // line 41
        echo $this->env->getExtension('routing')->getPath("levis_user_profile");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Profile"), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 42
        echo $this->env->getExtension('routing')->getPath("levis_user_activity");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Point History"), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 43
        echo $this->env->getExtension('routing')->getPath("levis_user_shopping");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Shopping Hitory"), "html", null, true);
        echo "</a></li>
                    </ul>
                    <section>
                        <ul class=\"extpro\"><li><a href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("levis_user_profile");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Basic Information"), "html", null, true);
        echo "</a></li><li class=\"active\"><a href=\"";
        echo $this->env->getExtension('routing')->getPath("levis_user_extended_profile");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Extended Information"), "html", null, true);
        echo "</a></li></ul>
                        ";
        // line 47
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "AevitasLevisBundle::Front/form.html.twig"));
        // line 48
        echo "                        <form action=\"";
        echo $this->env->getExtension('routing')->getPath("levis_user_extended_profile");
        echo "\" method=\"POST\">
                            <div class=\"block clearfix\">
                                <span>";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Your special occasions"), "html", null, true);
        echo "</span>
                                <div>
                                    <div class=\"row\">";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "mari"), 'row');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "kids"), 'row');
        echo "
                                    </div>
                                    <div class=\"row\">";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "ocpu"), 'row');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "inco"), 'row');
        echo "
                                    </div>
                                </div>
                            </div>
                            <button class=\"yellow_button\">";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Submit"), "html", null, true);
        echo "</button>
                        </form>
                            <div class=\"block clearfix\">
                                <span>";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Your Anniversary days"), "html", null, true);
        echo "</span>
                                <div>
                                    <div class=\"row aniv tripledate\">
                                        <span>";
        // line 64
        echo $this->env->getExtension('translator')->getTranslator()->trans("Do you want to gain triple bonus points? Just book %day% days that you will come and shopping with us!", array("%day%" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getTrippleDateLimit")), "messages");
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(""), "html", null, true);
        echo "</span>
                                        <div class=\"annies\">";
        // line 65
        echo $this->env->getExtension('http_kernel')->renderFragmentStrategy("esi", $this->env->getExtension('http_kernel')->controller("AevitasLevisBundle:Dashboard:renderTripleDates", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getId"))));
        echo "</div>
                                    </div>
                                    <div class=\"row aniv\">
                                        <span>";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Anniversary Date (you can add up to 5 dates)"), "html", null, true);
        echo "</span><a href=\"";
        echo $this->env->getExtension('routing')->getPath("home_add_anniversary");
        echo "\" class=\"addmore\">+</a>
                                            <div class=\"annies\">
                                            ";
        // line 70
        echo (isset($context["anniversaries"]) ? $context["anniversaries"] : $this->getContext($context, "anniversaries"));
        echo "
                                            </div>
                                    </div>
                                </div>
                            </div>
                        <span class=\"points\"><em>+10</em></span>
                    </section>
                </div>
            </div>
        </div>
    </div>
";
        // line 81
        echo $this->env->getExtension('aevitas_twig')->pointsConfig();
        echo "
</section>
<div class=\"popup\">
    <!-- Modal -->
    <div id=\"updateava\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
            <h3 id=\"myModalLabel\">";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Crop your avatar"), "html", null, true);
        echo "</h3>
        </div>
        <div class=\"modal-body\">
            <form id='frm' action='";
        // line 91
        echo $this->env->getExtension('routing')->getPath("dashboard_crop_avatar");
        echo "' method='post' >
                <div id='parent_container' style=''>

                    <!-- Load the image which needs to be cropped -->
                    <img src=\"test.jpg\" id='crop_img'/>

                    <!-- Div for marking cropping area -->
                    <div id=\"resizable\"></div>

                    <!-- Hidden fields to submit resize and crop values -->
                    <input type='hidden' name='img_width' id='img_width' />
                    <input type='hidden' name='img_height' id='img_height' />
                    <input type='hidden' name='source_x' id='source_x' />
                    <input type='hidden' name='source_y' id='source_y' />


                    <input type=\"submit\" value='Crop' />
                </div>
            </form>
        </div>
        <div class=\"modal-footer\">
            <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
            <button class=\"btn btn-primary\" onclick=\"crop();\">Save changes</button>
        </div>
    </div>
</div>
";
    }

    // line 118
    public function block_jslib($context, array $blocks = array())
    {
        // line 119
        echo "        <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
        <script src=\"//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js\"></script>
    ";
        // line 121
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "a8fb469_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a8fb469_0") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_profile_extended_bootstrap-transition_1.js");
            // line 134
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "a8fb469_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a8fb469_1") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_profile_extended_jquery.uniform.min_2.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "a8fb469_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a8fb469_2") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_profile_extended_bootstrap-modal_3.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "a8fb469_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a8fb469_3") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_profile_extended_bootstrap-dropdown_4.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "a8fb469_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a8fb469_4") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_profile_extended_bootstrap-tooltip_5.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "a8fb469_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a8fb469_5") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_profile_extended_bootstrap-popover_6.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "a8fb469_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a8fb469_6") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_profile_extended_bootstrap-carousel_7.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "a8fb469_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a8fb469_7") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_profile_extended_bootstrap-grayscale_8.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "a8fb469_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a8fb469_8") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_profile_extended_bootstrap-datepicker_9.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "a8fb469_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a8fb469_9") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_profile_extended_select2_10.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "a8fb469_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a8fb469_10") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_profile_extended_bootstrap-holder_11.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "a8fb469"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_a8fb469") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_profile_extended.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 136
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "013c34c_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_013c34c_0") : $this->env->getExtension('assets')->getAssetUrl("js/uploader_elFinder1_1.js");
            // line 143
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
            // asset "013c34c_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_013c34c_1") : $this->env->getExtension('assets')->getAssetUrl("js/uploader_elFinder2.view_2.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
            // asset "013c34c_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_013c34c_2") : $this->env->getExtension('assets')->getAssetUrl("js/uploader_elFinder3.ui_3.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
            // asset "013c34c_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_013c34c_3") : $this->env->getExtension('assets')->getAssetUrl("js/uploader_elFinder4.quickLook_4.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
            // asset "013c34c_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_013c34c_4") : $this->env->getExtension('assets')->getAssetUrl("js/uploader_elFinder6.eventsManager_5.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        } else {
            // asset "013c34c"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_013c34c") : $this->env->getExtension('assets')->getAssetUrl("js/uploader.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        }
        unset($context["asset_url"]);
        // line 145
        echo "
";
        // line 146
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "12204f6_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_12204f6_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/vietlandelfinder/css/elfinder_compress_elfinder_1.css");
            // line 149
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        } else {
            // asset "12204f6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_12204f6") : $this->env->getExtension('assets')->getAssetUrl("bundles/vietlandelfinder/css/elfinder_compress.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        }
        unset($context["asset_url"]);
        // line 151
        echo "        
<script>
function crop(){
    \$('form#frm').submit();
}
</script>
        ";
    }

    // line 158
    public function block_javascript($context, array $blocks = array())
    {
        // line 159
        echo "var query = '";
        echo $this->env->getExtension('routing')->getPath("home_search_district");
        echo "', upload = '";
        echo $this->env->getExtension('routing')->getPath("cpanel_user_upload_image");
        echo "';

    \$('form.triple input.unedit').attr('disabled', true);
    \$('form.triple input.unedit1').datepicker({format: \"dd-mm-yyyy\"});
    \$('form.triple input').on('changeDate',function(){
        \$form = \$(this).parents('form');
        \$.ajax({
            url: \$form.attr('action'),
            dataType: 'json',
            type: 'POST',
            data: \$form.serialize(),
            success: function(data){
                \$form.find('input#form_id').val(data.id);
            }
        });
    });
    \$('select').select2();
    function initAnniversary(el){
        status = parseInt(\$('#reg_step_mari').val());
        if(status > 1) var elDate = customDate = [{id: '";
        // line 178
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Birthday"), "html", null, true);
        echo "', text: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Birthday"), "html", null, true);
        echo "'},{id: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wedding"), "html", null, true);
        echo "', text: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wedding"), "html", null, true);
        echo "'},{id: \"";
        echo $this->env->getExtension('translator')->trans("Son's birthday");
        echo "\", text: \"";
        echo $this->env->getExtension('translator')->trans("Son's birthday");
        echo "\"},{id: \"";
        echo $this->env->getExtension('translator')->trans("Daughter's birthday");
        echo "\", text: \"";
        echo $this->env->getExtension('translator')->trans("Daughter's birthday");
        echo "\"}];
        else var elDate = customDate = [{id: '";
        // line 179
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Love Anniversary"), "html", null, true);
        echo "', text: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Love Anniversary"), "html", null, true);
        echo "'},{id: \"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Parent's Wedding Anniversary"), "html", null, true);
        echo "\", text: \"";
        echo $this->env->getExtension('translator')->trans("Parent's Wedding Anniversary");
        echo "\"},{id: \"";
        echo $this->env->getExtension('translator')->trans("Mom's birthday");
        echo "\", text: \"";
        echo $this->env->getExtension('translator')->trans("Mom's birthday");
        echo "\"},{id: \"";
        echo $this->env->getExtension('translator')->trans("Dad's birthday");
        echo "\", text: \"";
        echo $this->env->getExtension('translator')->trans("Dad's birthday");
        echo "\"}];
        if(\$(el).val() != \"\" && \$(el).val() != '";
        // line 180
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Love Anniversary"), "html", null, true);
        echo "' && \$(el).val() != \"";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Parent's Wedding Anniversary"), "html", null, true);
        echo "\" && \$(el).val() != \"";
        echo $this->env->getExtension('translator')->trans("Mom's birthday");
        echo "\" && \$(el).val() != \"";
        echo $this->env->getExtension('translator')->trans("Dad's birthday");
        echo "\" && \$(el).val() != '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Birthday"), "html", null, true);
        echo "' && \$(el).val() != '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Wedding"), "html", null, true);
        echo "'  && \$(el).val() !=  \"";
        echo $this->env->getExtension('translator')->trans("Son's birthday");
        echo "\" && \$(el).val() != \"";
        echo $this->env->getExtension('translator')->trans("Daughter's birthday");
        echo "\"){
            elDate.push({id: \$(el).val(), text: \$(el).val()});
        }
        elDate.push({id: '";
        // line 183
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Custom Date"), "html", null, true);
        echo "', text: '";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Custom Anniversary date"), "html", null, true);
        echo "'});
        \$(el).select2({
            placeholder: \"Select report type\",
            allowClear: true,
            data: elDate
            });

        \$(el).on('change',function(e){
        if(e.val == '";
        // line 191
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Custom Date"), "html", null, true);
        echo "') {\$(el).removeClass('select2-offscreen');\$(el).prev().hide()}
        })
        delete elDate;
    }
    \$('#s2id_reg_step_mari').attr('data-content', '";
        // line 195
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Earn more points by update this field to get"), "html", null, true);
        echo " '+points.mari+' ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("points"), "html", null, true);
        echo "').attr('data-original-title','";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Mariage"), "html", null, true);
        echo "').hover(function(){\$(this).popover('show')},function(){\$(this).popover('hide')})
    \$('#s2id_reg_step_ocpu').attr('data-content', '";
        // line 196
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Earn more points by update this field to get"), "html", null, true);
        echo " '+points.ocpu+' ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("points"), "html", null, true);
        echo "').attr('data-original-title','";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Occupation"), "html", null, true);
        echo "').hover(function(){\$(this).popover('show')},function(){\$(this).popover('hide')})
    \$('#s2id_reg_step_kids').attr('data-content', '";
        // line 197
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Earn more points by update this field to get"), "html", null, true);
        echo " '+points.kids+' ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("points"), "html", null, true);
        echo "').attr('data-original-title','";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Children"), "html", null, true);
        echo "').hover(function(){\$(this).popover('show')},function(){\$(this).popover('hide')})
    \$('#s2id_reg_step_inco').attr('data-content', '";
        // line 198
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Earn more points by update this field to get"), "html", null, true);
        echo " '+points.inco+' ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("points"), "html", null, true);
        echo "').attr('data-original-title','";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Income"), "html", null, true);
        echo "').hover(function(){\$(this).popover('show')},function(){\$(this).popover('hide')})
    \$('form.reg_step').change(function(){
        url = \$(this).attr('action');
        \$form = \$(this);
        \$('.title h3').addClass('loading');
        \$.ajax({
            url: url+'.json',
            type:'POST',
            data: \$form.serialize(),
            dataType: 'json',
            success: function(data){
                \$('.title h3').removeClass('loading');
                if(data.points) {
                \$badge = \$('.content span.points:first').clone();
                \$('span.points').after(\$badge);
                \$badge.find('em').text('+'+data.points);
                \$badge.css({display: \"block\",opacity: 0}).animate({bottom: '500px',opacity: 1}, 5000, 'swing', function(){\$(this).fadeOut('slow').remove()})
                }
            }
        });
    });
    \$('.annies form input.datetime').datepicker({format: \"dd-mm-yyyy\"})
    \$('.aniv a.addmore').on('click', function(e){
        e.preventDefault();
        url = \$(this).attr('href');
        \$.ajax({
            url: url,
            dataType: 'json',
            success: function(data){
                if(data.status) \$('.annies:last').append(data.html);
                else alert(data.html);
                \$('.annies form:last input.datetime').datepicker({format: \"dd-mm-yyyy\"})
                el = \$('.annies form:last input.anniname');
                initAnniversary(el);
            }
        });
    });
    \$.each(\$('input.anniname'), function(i, el){
    initAnniversary(el);
    });
    \$('.row.aniv').delegate('form', 'change', function(){
        \$form = \$(this);
        \$('.title h3').addClass('loading');
        \$.ajax({
            url: \$form.attr('action'),
            dataType: 'json',
            data: \$form.serialize(),
            type: 'POST',
            success: function(data){
                \$('.title h3').removeClass('loading');
                if(data.points) {
                \$badge = \$('.content span.points:first').clone();
                \$('span.points').after(\$badge);
                \$badge.find('em').text('+'+data.points);
                \$badge.css({display: \"block\",opacity: 0}).animate({bottom: '500px',opacity: 1}, 5000, 'swing', function(){\$(this).animate({opacity:0},5000,'swing',function(){\$(this).fadeOut().remove()})})
                }
            }
        })
    });
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Dashboard:extendprofile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  576 => 197,  425 => 145,  269 => 87,  656 => 305,  649 => 301,  629 => 287,  518 => 185,  503 => 176,  472 => 163,  324 => 131,  272 => 121,  1357 => 388,  1348 => 387,  1346 => 386,  1343 => 385,  1327 => 381,  1320 => 380,  1318 => 379,  1315 => 378,  1292 => 374,  1267 => 373,  1265 => 372,  1262 => 371,  1250 => 366,  1245 => 365,  1243 => 364,  1240 => 363,  1231 => 357,  1225 => 355,  1222 => 354,  1217 => 353,  1215 => 352,  1212 => 351,  1205 => 346,  1196 => 344,  1192 => 343,  1189 => 342,  1186 => 341,  1184 => 340,  1181 => 339,  1173 => 335,  1171 => 334,  1168 => 333,  1162 => 329,  1156 => 327,  1153 => 326,  1151 => 325,  1148 => 324,  1139 => 319,  1137 => 318,  1114 => 317,  1111 => 316,  1108 => 315,  1105 => 314,  1102 => 313,  1099 => 312,  1096 => 311,  1094 => 310,  1091 => 309,  1084 => 305,  1080 => 304,  1075 => 303,  1073 => 302,  1070 => 301,  1063 => 296,  1060 => 295,  1052 => 290,  1049 => 289,  1047 => 288,  1044 => 287,  1036 => 282,  1032 => 281,  1028 => 280,  1025 => 279,  1023 => 278,  1020 => 277,  1012 => 273,  1010 => 269,  1008 => 268,  1005 => 267,  1000 => 263,  978 => 258,  975 => 257,  972 => 256,  969 => 255,  966 => 254,  963 => 253,  960 => 252,  957 => 251,  954 => 250,  951 => 249,  948 => 248,  946 => 247,  943 => 246,  935 => 240,  932 => 239,  930 => 238,  927 => 237,  919 => 233,  916 => 232,  914 => 231,  911 => 230,  899 => 226,  896 => 225,  893 => 224,  888 => 222,  885 => 221,  877 => 217,  874 => 216,  861 => 210,  858 => 209,  856 => 208,  853 => 207,  845 => 203,  842 => 202,  840 => 201,  837 => 200,  829 => 196,  826 => 195,  824 => 194,  821 => 193,  813 => 189,  810 => 188,  808 => 187,  805 => 186,  797 => 182,  794 => 181,  789 => 179,  781 => 175,  779 => 174,  776 => 173,  768 => 169,  765 => 168,  763 => 167,  760 => 166,  752 => 162,  749 => 161,  747 => 160,  745 => 159,  742 => 158,  735 => 153,  725 => 152,  720 => 151,  711 => 148,  708 => 147,  706 => 146,  703 => 145,  695 => 139,  692 => 137,  691 => 136,  685 => 134,  679 => 132,  676 => 131,  674 => 130,  671 => 129,  658 => 122,  645 => 119,  639 => 117,  634 => 115,  631 => 114,  610 => 271,  594 => 104,  589 => 102,  553 => 191,  499 => 78,  497 => 77,  489 => 75,  486 => 74,  471 => 72,  459 => 159,  426 => 58,  414 => 52,  403 => 48,  390 => 142,  217 => 66,  212 => 91,  920 => 427,  907 => 419,  887 => 416,  869 => 214,  851 => 414,  841 => 409,  833 => 406,  815 => 391,  792 => 180,  714 => 314,  697 => 300,  650 => 120,  647 => 259,  636 => 116,  632 => 253,  621 => 251,  613 => 109,  600 => 239,  579 => 228,  575 => 227,  569 => 224,  557 => 222,  551 => 92,  543 => 90,  539 => 217,  533 => 214,  525 => 89,  513 => 209,  505 => 80,  501 => 207,  495 => 204,  467 => 198,  463 => 197,  443 => 192,  421 => 184,  363 => 32,  342 => 135,  327 => 143,  306 => 137,  290 => 103,  265 => 120,  250 => 338,  923 => 425,  910 => 417,  890 => 223,  872 => 215,  854 => 412,  844 => 407,  836 => 404,  818 => 389,  795 => 387,  717 => 150,  702 => 300,  698 => 299,  655 => 260,  652 => 259,  641 => 296,  637 => 253,  624 => 251,  620 => 250,  616 => 249,  603 => 239,  590 => 229,  582 => 228,  572 => 98,  554 => 219,  546 => 91,  542 => 217,  522 => 212,  516 => 209,  508 => 81,  490 => 168,  460 => 194,  410 => 176,  366 => 33,  261 => 88,  194 => 245,  693 => 138,  690 => 135,  686 => 245,  588 => 243,  584 => 198,  578 => 227,  570 => 153,  523 => 88,  515 => 135,  511 => 82,  491 => 126,  487 => 203,  483 => 124,  478 => 199,  465 => 118,  456 => 158,  424 => 184,  416 => 90,  328 => 14,  318 => 140,  687 => 337,  662 => 123,  654 => 121,  646 => 257,  638 => 300,  630 => 295,  614 => 285,  606 => 280,  598 => 275,  581 => 225,  574 => 264,  567 => 262,  561 => 223,  558 => 147,  536 => 214,  528 => 213,  520 => 180,  514 => 249,  510 => 248,  502 => 179,  498 => 204,  481 => 202,  464 => 241,  445 => 234,  441 => 233,  383 => 136,  347 => 117,  311 => 148,  302 => 121,  242 => 78,  233 => 73,  406 => 122,  382 => 118,  370 => 160,  274 => 100,  238 => 309,  20 => 1,  571 => 219,  568 => 196,  564 => 223,  408 => 50,  405 => 49,  375 => 186,  359 => 127,  351 => 112,  320 => 130,  316 => 16,  286 => 284,  266 => 140,  262 => 139,  256 => 104,  204 => 56,  161 => 61,  185 => 76,  134 => 54,  378 => 132,  340 => 147,  336 => 123,  330 => 189,  326 => 105,  429 => 230,  422 => 145,  417 => 144,  395 => 8,  388 => 42,  339 => 123,  153 => 58,  506 => 132,  455 => 278,  449 => 193,  434 => 264,  385 => 41,  376 => 27,  372 => 226,  334 => 114,  225 => 68,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 290,  617 => 250,  615 => 110,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 274,  592 => 103,  587 => 229,  585 => 347,  540 => 183,  537 => 304,  534 => 140,  519 => 212,  494 => 244,  482 => 265,  476 => 166,  473 => 262,  452 => 193,  433 => 60,  411 => 226,  380 => 165,  367 => 160,  344 => 24,  338 => 115,  335 => 21,  331 => 186,  297 => 134,  181 => 229,  332 => 20,  323 => 250,  319 => 104,  315 => 140,  308 => 147,  292 => 144,  288 => 4,  281 => 385,  277 => 101,  254 => 112,  197 => 58,  118 => 22,  100 => 34,  504 => 207,  500 => 175,  496 => 128,  492 => 76,  488 => 243,  484 => 178,  479 => 335,  475 => 199,  470 => 198,  466 => 197,  431 => 160,  396 => 238,  394 => 120,  391 => 168,  377 => 37,  354 => 245,  345 => 136,  343 => 124,  310 => 178,  293 => 6,  284 => 100,  257 => 118,  205 => 59,  178 => 67,  462 => 274,  458 => 252,  454 => 272,  450 => 64,  446 => 151,  442 => 62,  436 => 188,  432 => 149,  419 => 147,  386 => 208,  307 => 102,  304 => 103,  289 => 97,  280 => 137,  276 => 91,  249 => 79,  232 => 82,  198 => 84,  174 => 50,  200 => 69,  186 => 56,  152 => 44,  110 => 20,  76 => 28,  260 => 360,  248 => 109,  245 => 79,  240 => 323,  237 => 70,  228 => 101,  221 => 66,  213 => 61,  180 => 47,  401 => 173,  364 => 115,  361 => 174,  353 => 151,  349 => 138,  346 => 125,  333 => 147,  329 => 85,  325 => 141,  321 => 187,  303 => 296,  299 => 8,  295 => 100,  291 => 131,  287 => 130,  279 => 125,  275 => 70,  271 => 371,  267 => 91,  251 => 81,  243 => 81,  239 => 187,  231 => 87,  227 => 67,  223 => 100,  219 => 64,  215 => 63,  211 => 61,  207 => 58,  195 => 59,  191 => 54,  179 => 51,  175 => 70,  167 => 68,  159 => 66,  155 => 60,  129 => 39,  124 => 46,  104 => 41,  563 => 210,  560 => 195,  556 => 220,  428 => 146,  420 => 171,  415 => 126,  412 => 164,  404 => 161,  400 => 47,  397 => 203,  392 => 209,  389 => 200,  371 => 129,  369 => 256,  358 => 114,  356 => 157,  350 => 203,  348 => 161,  317 => 82,  313 => 103,  301 => 119,  296 => 127,  273 => 125,  270 => 99,  263 => 85,  259 => 192,  253 => 339,  234 => 78,  216 => 60,  192 => 80,  188 => 50,  170 => 46,  63 => 19,  53 => 11,  58 => 13,  23 => 3,  34 => 3,  146 => 55,  148 => 55,  137 => 53,  127 => 28,  113 => 21,  102 => 32,  90 => 27,  81 => 24,  59 => 20,  255 => 82,  244 => 84,  236 => 103,  230 => 68,  226 => 71,  222 => 294,  218 => 94,  210 => 58,  206 => 84,  202 => 263,  190 => 49,  184 => 230,  172 => 66,  150 => 41,  77 => 21,  97 => 31,  65 => 17,  480 => 162,  474 => 161,  469 => 162,  461 => 70,  457 => 194,  453 => 236,  444 => 177,  440 => 105,  437 => 61,  435 => 146,  430 => 187,  427 => 153,  423 => 57,  413 => 134,  409 => 241,  407 => 176,  402 => 130,  398 => 173,  393 => 143,  387 => 143,  384 => 167,  381 => 133,  379 => 262,  374 => 36,  368 => 34,  365 => 128,  362 => 186,  360 => 249,  355 => 27,  341 => 105,  337 => 133,  322 => 141,  314 => 99,  312 => 143,  309 => 134,  305 => 121,  298 => 118,  294 => 90,  285 => 128,  283 => 93,  278 => 384,  268 => 87,  264 => 84,  258 => 351,  252 => 121,  247 => 77,  241 => 76,  235 => 74,  229 => 69,  224 => 65,  220 => 287,  214 => 76,  208 => 91,  169 => 65,  143 => 57,  140 => 52,  132 => 53,  128 => 51,  119 => 25,  107 => 36,  71 => 21,  177 => 49,  165 => 64,  160 => 52,  135 => 39,  126 => 38,  114 => 35,  84 => 30,  70 => 21,  67 => 20,  61 => 16,  94 => 30,  89 => 35,  85 => 25,  75 => 29,  68 => 18,  56 => 18,  201 => 60,  196 => 85,  183 => 56,  171 => 49,  166 => 51,  163 => 45,  158 => 49,  156 => 42,  151 => 43,  142 => 54,  138 => 42,  136 => 51,  121 => 37,  117 => 42,  105 => 32,  91 => 34,  62 => 18,  49 => 10,  87 => 28,  21 => 2,  38 => 8,  28 => 3,  24 => 3,  25 => 3,  31 => 2,  26 => 4,  19 => 2,  93 => 29,  88 => 29,  78 => 27,  46 => 7,  44 => 6,  27 => 4,  79 => 30,  72 => 27,  69 => 27,  47 => 7,  40 => 5,  37 => 8,  22 => 3,  246 => 106,  157 => 44,  145 => 42,  139 => 40,  131 => 38,  123 => 36,  120 => 48,  115 => 21,  111 => 107,  108 => 35,  101 => 32,  98 => 39,  96 => 38,  83 => 32,  74 => 26,  66 => 20,  55 => 15,  52 => 17,  50 => 14,  43 => 10,  41 => 5,  35 => 3,  32 => 2,  29 => 3,  209 => 64,  203 => 61,  199 => 54,  193 => 52,  189 => 72,  187 => 57,  182 => 48,  176 => 67,  173 => 50,  168 => 65,  164 => 200,  162 => 43,  154 => 57,  149 => 43,  147 => 58,  144 => 40,  141 => 44,  133 => 50,  130 => 49,  125 => 27,  122 => 49,  116 => 46,  112 => 34,  109 => 40,  106 => 30,  103 => 44,  99 => 33,  95 => 21,  92 => 32,  86 => 24,  82 => 16,  80 => 29,  73 => 19,  64 => 25,  60 => 19,  57 => 29,  54 => 18,  51 => 18,  48 => 7,  45 => 6,  42 => 5,  39 => 5,  36 => 6,  33 => 5,  30 => 4,);
    }
}
