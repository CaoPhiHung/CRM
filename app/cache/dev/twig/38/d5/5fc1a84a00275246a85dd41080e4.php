<?php

/* AevitasLevisBundle:GiftArticle:EditGiftArticle.html.twig */
class __TwigTemplate_38d55fc1a84a00275246a85dd41080e4 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Backend:root.html.twig");

        $this->blocks = array(
            'import' => array($this, 'block_import'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'content' => array($this, 'block_content'),
            'extendjs' => array($this, 'block_extendjs'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AevitasLevisBundle:Backend:root.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_import($context, array $blocks = array())
    {
        // line 5
        echo "<style>
        .tab-content input[type=\"radio\"]{
            float: left;
            margin-right: 10px;
        }
    </style>
";
    }

    // line 13
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 14
        echo "    <ul class=\"breadcrumb\">
        <li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
        <li class=\"divider\"></li>
        <li>Gift Article</li>
        <li class=\"divider\"></li>
        <li>Add Gift</li>
    </ul>
";
    }

    // line 23
    public function block_content($context, array $blocks = array())
    {
        // line 24
        echo "                ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 25
            echo "    <div class=\"alert alert-faded\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                        ";
            // line 27
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "    <div class=\"widget widget-2 widget-tabs widget-tabs-2 border-bottom-none\">
        <div class=\"widget-head\">
            <ul>
                <li class=\"active\"><a class=\"\" href=\"#general-info\" data-toggle=\"tab\"><i></i>General Infomation</a></li>
                <li class=\"\"><a class=\"\" href=\"#settings\" data-toggle=\"tab\"><i></i>Settings</a></li>
            </ul>
        </div>
    </div>
    <form class=\"form-horizontal\" action=\"\" ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " method=\"POST\">
        <div class=\"tab-content\" style=\"padding: 0;\">
            <div class=\"tab-pane active\" id=\"general-info\">
                <div class=\"row-fluid\">
                    <div class=\"span9\">
                   ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'label');
        echo "
                   ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("Name gift article."), "class" => "span10")));
        echo "
                            <span style=\"margin: 0;\" class=\"btn-action single glyphicons circle_question_mark\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Name is required.\"><i></i></span>
                            <span class=\"error\">";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'errors');
        echo "</span>
                            ";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cat"), 'label');
        echo "
                            ";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "cat"), 'widget');
        echo "
                            <div class=\"separator\"></div>
                        ";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "categories"), 'label');
        echo "
                        ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "categories"), 'widget');
        echo "
                            <span style=\"margin: 0;\" class=\"btn-action single glyphicons circle_question_mark\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Category is required\"><i></i></span>
                            <div class=\"separator\"></div>
                        ";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tags"), 'label');
        echo "
                        ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tags"), 'widget');
        echo "
                            <div class=\"separator\"></div>
                        ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "excerpt"), 'label');
        echo "
                        ";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "excerpt"), 'widget', array("attr" => array("class" => "wysihtml5 span12", "rows" => "5")));
        echo "
                            <div class=\"separator\"></div>
                        ";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'label');
        echo "
                        ";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'widget', array("attr" => array("class" => "wysihtml5 span12", "rows" => "5")));
        echo "
                            <div class=\"separator\"></div>
                        </div>
                    </div>
                </div>

                <div class=\"tab-pane\" id=\"settings\">
                    <div class=\"row-fluid\">
                        ";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "point"), 'label');
        echo "
                            ";
        // line 70
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "point"), 'widget');
        echo "
                            <span style=\"margin: 0;\" class=\"btn-action single glyphicons circle_question_mark\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Point is required, must is numberic.\"><i></i></span>
                            <div class=\"separator\"></div>
                        ";
        // line 73
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "inventory"), 'label');
        echo "
                            ";
        // line 74
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "inventory"), 'widget');
        echo "
                            <span style=\"margin: 0;\" class=\"btn-action single glyphicons circle_question_mark\" data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"Inventory is required, must is numberic.\"><i></i></span>
                            ";
        // line 76
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "images"), 'label');
        echo "
                                    <div class=\"separator line bottom\"></div>
                            ";
        // line 78
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "images"), 'widget');
        echo "
                                    <div>
                                        <span id=\"addimages\" href=\"";
        // line 80
        echo twig_escape_filter($this->env, (isset($context["uploaded"]) ? $context["uploaded"] : $this->getContext($context, "uploaded")), "html", null, true);
        echo "\" style=\"cursor:pointer\"><i class=\"icon-plus-sign\"></i>
                                    ";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Upload Images"), "html", null, true);
        echo "
                                            </span>
                                            <div class=\"images\"></div>
                                        </div>
                                        <div class=\"separator line bottom\"></div>
                        ";
        // line 86
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "gender"), 'label');
        echo "
                            ";
        // line 87
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "gender"), 'widget');
        echo "
                                        <div class=\"separator line bottom\"></div>
                        ";
        // line 89
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isActive"), 'label');
        echo "
                            ";
        // line 90
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "isActive"), 'widget');
        echo "
                                        <div class=\"separator line bottom\"></div>
                        ";
        // line 92
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "DeliveryType"), 'label');
        echo "
                            ";
        // line 93
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "DeliveryType"), 'widget');
        echo "
                                        <div class=\"separator\"></div>
                                    </div>
                                </div>
                                <div class=\"separator line bottom\"></div>
            ";
        // line 98
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                                <div class=\"form-actions\" style=\"margin: 0;\">
                                    <button type=\"submit\" class=\"btn btn-icon btn-primary glyphicons circle_ok pull-right\"><i></i>Save</button>
                                </div>
                        </form>
";
    }

    // line 105
    public function block_extendjs($context, array $blocks = array())
    {
        // line 106
        echo "\t";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "012ab55_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55_0") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress_jquery-ui-1.9.2.custom.min_1.js");
            // line 121
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "012ab55_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55_1") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress_jquery.ui.touch-punch.min_2.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "012ab55_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55_2") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress_jquery.miniColors_3.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "012ab55_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55_3") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress_jquery.cookie_4.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "012ab55_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55_4") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress_themer_5.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "012ab55_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55_5") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress_jquery.toggle.buttons_6.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "012ab55_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55_6") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress_jquery.uniform.min_7.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "012ab55_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55_7") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress_bootstrap.min_8.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "012ab55_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55_8") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress_bootstrap-select_9.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "012ab55_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55_9") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress_wysihtml5-0.3.0_rc2.min_10.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "012ab55_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55_10") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress_bootstrap-wysihtml5-0.0.2_11.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "012ab55_11"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55_11") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress_select2_12.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "012ab55_12"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55_12") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress_load_13.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "012ab55"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_012ab55") : $this->env->getExtension('assets')->getAssetUrl("js/backend_gift_edit_compress.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 123
        echo "        ";
    }

    // line 124
    public function block_javascript($context, array $blocks = array())
    {
        // line 125
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "013c34c_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_013c34c_0") : $this->env->getExtension('assets')->getAssetUrl("js/uploader_elFinder1_1.js");
            // line 132
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
            // asset "013c34c_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_013c34c_1") : $this->env->getExtension('assets')->getAssetUrl("js/uploader_elFinder2.view_2.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
            // asset "013c34c_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_013c34c_2") : $this->env->getExtension('assets')->getAssetUrl("js/uploader_elFinder3.ui_3.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
            // asset "013c34c_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_013c34c_3") : $this->env->getExtension('assets')->getAssetUrl("js/uploader_elFinder4.quickLook_4.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
            // asset "013c34c_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_013c34c_4") : $this->env->getExtension('assets')->getAssetUrl("js/uploader_elFinder6.eventsManager_5.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        } else {
            // asset "013c34c"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_013c34c") : $this->env->getExtension('assets')->getAssetUrl("js/uploader.js");
            echo "                        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        }
        unset($context["asset_url"]);
        // line 134
        echo "
";
        // line 135
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "12204f6_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_12204f6_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/vietlandelfinder/css/elfinder_compress_elfinder_1.css");
            // line 138
            echo "                        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
                        <style type=\"text/css\">
                                span.img{position:relative;display:inline-block;margin-right:5px;border:1px dashed #dedede}
                                span.img img{width:48px;height:48px}
                            </style>
";
        } else {
            // asset "12204f6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_12204f6") : $this->env->getExtension('assets')->getAssetUrl("bundles/vietlandelfinder/css/elfinder_compress.css");
            echo "                        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
                        <style type=\"text/css\">
                                span.img{position:relative;display:inline-block;margin-right:5px;border:1px dashed #dedede}
                                span.img img{width:48px;height:48px}
                            </style>
";
        }
        unset($context["asset_url"]);
        // line 144
        echo "                            <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/css/tagit.css"), "html", null, true);
        echo "\" />
                            <script src=\"";
        // line 145
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/js/tag-it.min.js"), "html", null, true);
        echo "\"></script>
                            <script>
                                \$(document).ready(function() {
                                    \$('#aevitas_gift_tags').tagit();
                                    url_finder = '";
        // line 149
        echo $this->env->getExtension('routing')->getPath("levis_upload_gift");
        echo "';
                                    uploaded = \$('#aevitas_gift_images').val().split(';');
                                    uploadurl = \$('#addimages').attr('href');
                                    \$.each(uploaded, function(i, el) {
                                        \$('.images').append('<span class=\"img\"><img src=\"' + uploadurl + '/' + el + '\" rel=\"' + el + '\"/><i style=\"position:absolute;right:0px;top:0px;cursor:pointer\" class=\"icon-remove-sign\"></i></span>')
                                    })
                                    \$('.images').delegate('.icon-remove-sign', 'click', function() {
                                        \$(this).parent('.img').remove();
                                        var images = [];
                                        \$.each(\$('.images .img'), function(i, el) {
                                            images.push(\$(el).find('img').attr('rel'));
                                        })
                                        \$('#aevitas_gift_images').val(images.join(';'));
                                    });
                                    \$('#addimages').on('click', function() {
                                        var finderContainer = \$('<div></div>').appendTo('body');
                                        var FINDER = finderContainer.elfinder({
                                            url: url_finder,
                                            docked: false,
                                            selectMultiple: true,
                                            cutURL: 'root',
                                            dialog: {
                                                title: 'Upload Hình: Ctr+Click -> đề chọn nhiều hình',
                                                height: 500,
                                                zIndex: 9999,
                                                width: 630
                                            },
                                            closeOnEditorCallback: true,
                                            editorCallback: function(items) {
                                                var images = [];
                                                \$.each(\$('.images .img'), function(i, el) {
                                                    images.push(\$(el).find('img').attr('rel'));
                                                })
                                                \$.each(items, function(i, el) {
                                                    images.push(el.name);
                                                    \$('.images').append('<span class=\"img\"><img src=\"' + el.tmb + '\" rel=\"' + el.name + '\"/><i style=\"position:absolute;right:0px;top:0px;cursor:pointer\" class=\"icon-remove-sign\"></i></span>')
                                                })
                                                \$('#aevitas_gift_images').val(images.join(';'));
                                            }
                                        });
                                    })
                                });
                                </script>
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:GiftArticle:EditGiftArticle.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  429 => 149,  422 => 145,  417 => 144,  395 => 138,  388 => 134,  339 => 123,  153 => 61,  506 => 326,  455 => 278,  449 => 276,  434 => 264,  385 => 229,  376 => 227,  372 => 226,  334 => 190,  225 => 112,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 366,  617 => 363,  615 => 362,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 352,  592 => 351,  587 => 348,  585 => 347,  540 => 305,  537 => 304,  534 => 303,  519 => 291,  494 => 268,  482 => 265,  476 => 263,  473 => 262,  452 => 277,  433 => 245,  411 => 226,  380 => 206,  367 => 202,  344 => 190,  338 => 188,  335 => 187,  331 => 186,  297 => 175,  181 => 70,  332 => 157,  323 => 154,  319 => 153,  315 => 152,  308 => 150,  292 => 142,  288 => 154,  281 => 139,  277 => 138,  254 => 120,  197 => 81,  118 => 53,  100 => 45,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 267,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 299,  396 => 238,  394 => 267,  391 => 135,  377 => 261,  354 => 245,  345 => 241,  343 => 124,  310 => 178,  293 => 200,  284 => 152,  257 => 184,  205 => 86,  178 => 74,  462 => 274,  458 => 252,  454 => 272,  450 => 271,  446 => 249,  442 => 269,  436 => 266,  432 => 265,  419 => 260,  386 => 208,  307 => 209,  304 => 208,  289 => 129,  280 => 191,  276 => 149,  249 => 111,  232 => 177,  198 => 93,  174 => 73,  200 => 77,  186 => 72,  152 => 67,  110 => 50,  76 => 25,  260 => 128,  248 => 106,  245 => 105,  240 => 180,  237 => 8,  228 => 106,  221 => 131,  213 => 97,  180 => 156,  401 => 271,  364 => 105,  361 => 104,  353 => 99,  349 => 243,  346 => 125,  333 => 86,  329 => 85,  325 => 188,  321 => 187,  303 => 77,  299 => 162,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 189,  251 => 64,  243 => 62,  239 => 113,  231 => 59,  227 => 93,  223 => 92,  219 => 87,  215 => 55,  211 => 98,  207 => 96,  195 => 50,  191 => 92,  179 => 79,  175 => 45,  167 => 61,  159 => 72,  155 => 40,  129 => 59,  124 => 25,  104 => 42,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 239,  397 => 107,  392 => 209,  389 => 8,  371 => 203,  369 => 256,  358 => 171,  356 => 193,  350 => 132,  348 => 161,  317 => 82,  313 => 81,  301 => 176,  296 => 127,  273 => 110,  270 => 109,  263 => 188,  259 => 117,  253 => 121,  234 => 90,  216 => 78,  192 => 90,  188 => 78,  170 => 62,  63 => 21,  53 => 16,  58 => 19,  23 => 3,  34 => 8,  146 => 59,  148 => 131,  137 => 57,  127 => 30,  113 => 116,  102 => 41,  90 => 38,  81 => 25,  59 => 23,  255 => 131,  244 => 7,  236 => 179,  230 => 176,  226 => 105,  222 => 117,  218 => 90,  210 => 83,  206 => 96,  202 => 164,  190 => 73,  184 => 90,  172 => 81,  150 => 61,  77 => 23,  97 => 42,  65 => 20,  480 => 162,  474 => 161,  469 => 261,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 247,  437 => 246,  435 => 146,  430 => 144,  427 => 263,  423 => 262,  413 => 134,  409 => 241,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 264,  384 => 121,  381 => 212,  379 => 262,  374 => 204,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 151,  309 => 166,  305 => 164,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 150,  268 => 136,  264 => 84,  258 => 122,  252 => 121,  247 => 118,  241 => 77,  235 => 98,  229 => 106,  224 => 172,  220 => 101,  214 => 89,  208 => 68,  169 => 76,  143 => 51,  140 => 57,  132 => 53,  128 => 66,  119 => 45,  107 => 42,  71 => 27,  177 => 69,  165 => 74,  160 => 64,  135 => 55,  126 => 45,  114 => 47,  84 => 17,  70 => 29,  67 => 25,  61 => 20,  94 => 41,  89 => 31,  85 => 28,  75 => 14,  68 => 22,  56 => 17,  201 => 94,  196 => 161,  183 => 76,  171 => 44,  166 => 73,  163 => 73,  158 => 63,  156 => 66,  151 => 39,  142 => 59,  138 => 43,  136 => 52,  121 => 50,  117 => 51,  105 => 44,  91 => 32,  62 => 24,  49 => 11,  87 => 20,  21 => 1,  38 => 7,  28 => 3,  24 => 1,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 34,  88 => 18,  78 => 26,  46 => 9,  44 => 13,  27 => 96,  79 => 28,  72 => 23,  69 => 22,  47 => 13,  40 => 9,  37 => 5,  22 => 1,  246 => 32,  157 => 88,  145 => 65,  139 => 58,  131 => 54,  123 => 44,  120 => 42,  115 => 48,  111 => 47,  108 => 46,  101 => 43,  98 => 36,  96 => 43,  83 => 27,  74 => 25,  66 => 22,  55 => 17,  52 => 12,  50 => 14,  43 => 8,  41 => 18,  35 => 5,  32 => 4,  29 => 3,  209 => 87,  203 => 92,  199 => 94,  193 => 80,  189 => 86,  187 => 85,  182 => 66,  176 => 80,  173 => 74,  168 => 70,  164 => 69,  162 => 74,  154 => 62,  149 => 60,  147 => 53,  144 => 58,  141 => 50,  133 => 56,  130 => 55,  125 => 51,  122 => 49,  116 => 48,  112 => 47,  109 => 45,  106 => 48,  103 => 44,  99 => 43,  95 => 41,  92 => 32,  86 => 35,  82 => 28,  80 => 30,  73 => 24,  64 => 20,  60 => 18,  57 => 18,  54 => 18,  51 => 12,  48 => 14,  45 => 13,  42 => 11,  39 => 2,  36 => 5,  33 => 4,  30 => 3,);
    }
}
