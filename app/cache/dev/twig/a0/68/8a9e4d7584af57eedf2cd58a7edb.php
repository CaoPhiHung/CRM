<?php

/* AevitasLevisBundle:Backend:root.html.twig */
class __TwigTemplate_a0688a9e4d7584af57eedf2cd58a7edb extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'import' => array($this, 'block_import'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'content' => array($this, 'block_content'),
            'extendjs' => array($this, 'block_extendjs'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "<!DOCTYPE html>
<!--[if lt IE 7]> <html class=\"lt-ie9 lt-ie8 lt-ie7\"> <![endif]-->
<!--[if IE 7]>    <html class=\"lt-ie9 lt-ie8\"> <![endif]-->
<!--[if IE 8]>    <html class=\"lt-ie9\"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
        ";
        // line 8
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "\t
\t<!-- Meta -->
\t<meta charset=\"UTF-8\" />
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0\">
\t<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
\t<meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black\">
\t
\t<!-- Bootstrap -->
        ";
        // line 19
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "3bdb8b5_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3bdb8b5_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/css/bst_cp_bootstrap.min_1.css");
            // line 23
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        } else {
            // asset "3bdb8b5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3bdb8b5") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/css/bst_cp.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        }
        unset($context["asset_url"]);
        // line 25
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "7ace640_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7ace640_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/jasny-bootstrap/css/jasny_cp_jasny-bootstrap.min_1.css");
            // line 29
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
            // asset "7ace640_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7ace640_1") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/jasny-bootstrap/css/jasny_cp_jasny-bootstrap-responsive.min_2.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        } else {
            // asset "7ace640"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7ace640") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/jasny-bootstrap/css/jasny_cp.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        }
        unset($context["asset_url"]);
        // line 31
        echo "\t
\t<!-- Bootstrap Extended -->
        
        ";
        // line 34
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "46165a0_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_46165a0_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysi_cp_bootstrap-wysihtml5-0.0.2_1.css");
            // line 38
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        } else {
            // asset "46165a0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_46165a0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysi_cp.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        }
        unset($context["asset_url"]);
        // line 40
        echo "\t<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/css/style.min.css"), "html", null, true);
        echo "\" />
\t<!-- JQueryUI v1.9.2 -->
        ";
        // line 42
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "22c3c39_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_22c3c39_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jui_jquery-ui-1.9.2.custom.min_1.css");
            // line 46
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        } else {
            // asset "22c3c39"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_22c3c39") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jui.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        }
        unset($context["asset_url"]);
        // line 48
        echo "\t
\t<!-- Glyphicons -->
\t<link rel=\"stylesheet\" href=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/css/glyphicons.css"), "html", null, true);
        echo "\" />
\t
\t<!-- Bootstrap Extended -->
        ";
        // line 53
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "fbf8836_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_fbf8836_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-select/bootstrap-select-cp_bootstrap-select_1.css");
            // line 57
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        } else {
            // asset "fbf8836"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_fbf8836") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-select/bootstrap-select-cp.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        }
        unset($context["asset_url"]);
        // line 59
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "422765f_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_422765f_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons-cp_bootstrap-toggle-buttons_1.css");
            // line 63
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        } else {
            // asset "422765f"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_422765f") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons-cp.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        }
        unset($context["asset_url"]);
        // line 65
        echo "\t
\t<!-- Uniform -->
        ";
        // line 67
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "aba4e3d_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_aba4e3d_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/pixelmatrix-uniform/css/uniform.default.cp_uniform.default_1.css");
            // line 71
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        } else {
            // asset "aba4e3d"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_aba4e3d") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/pixelmatrix-uniform/css/uniform.default.cp.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        }
        unset($context["asset_url"]);
        // line 73
        echo "\t
\t<!-- Modernizr -->
\t<script src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/modernizr.custom.76094.js"), "html", null, true);
        echo "\"></script>
\t
\t<!-- MiniColors -->
        ";
        // line 78
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "f9150aa_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f9150aa_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-miniColors/miniColors_jquery.miniColors_1.css");
            // line 82
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        } else {
            // asset "f9150aa"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f9150aa") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-miniColors/miniColors.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
        ";
        }
        unset($context["asset_url"]);
        // line 84
        echo "\t
\t<!-- Google Analytics -->
\t<script type=\"text/javascript\">

\t  var _gaq = _gaq || [];
\t  _gaq.push(['_setAccount', 'UA-36057737-1']);
\t  _gaq.push(['_trackPageview']);
\t
\t  (function() {
\t    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
\t    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
\t    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
\t  })();
\t
\t</script>
\t
\t<!-- LESS 2 CSS -->
\t<script src=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/less-1.3.3.min.js"), "html", null, true);
        echo "\"></script>
\t
\t
\t<!--[if IE]><script type=\"text/javascript\" src=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/excanvas/excanvas.js"), "html", null, true);
        echo "\"></script><![endif]-->
\t<!--[if lt IE 8]><script type=\"text/javascript\" src=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/json2.js"), "html", null, true);
        echo "\"></script><![endif]-->

        ";
        // line 107
        $this->displayBlock('import', $context, $blocks);
        // line 109
        echo "</head>
<body class=\"";
        // line 110
        echo twig_escape_filter($this->env, strtr($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method"), array("_" => " ")), "html", null, true);
        echo "\">
\t
\t<!-- Start Content -->
\t<div class=\"container\">
\t<div id=\"wrapper\">

            <!-- sidebar start -->
            ";
        // line 117
        $this->env->loadTemplate("AevitasLevisBundle:Backend:sidebar.html.twig")->display($context);
        // line 118
        echo "            <!-- sidebar end -->

            <div id=\"content\" class=\"color-4\">
                <!-- Menu Toggle on mobile -->
                        <button type=\"button\" class=\"btn btn-navbar main\">
                                <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span>
                        </button>
                        <a href=\"#themer\" data-toggle=\"collapse\" class=\"btn btn-primary btn-icon glyphicons eyedropper\"><i></i> Themer</a>
                        <div class=\"relativeWrap pull-right\">
                        <a href=\"#\" data-toggle=\"dropdown\"><img src=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/en.png"), "html", null, true);
        echo "\" alt=\"en\" /></a>
                <ul class=\"dropdown-menu pull-right\">
                        <li class=\"active\"><a href=\"?page=index&amp;lang=en\" title=\"English\"><img src=\"";
        // line 129
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/en.png"), "html", null, true);
        echo "\" alt=\"English\"> English</a></li>
                        <li><a href=\"?page=index&amp;lang=ro\" title=\"Romanian\"><img src=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/ro.png"), "html", null, true);
        echo "\" alt=\"Romanian\"> Romanian</a></li>
                        <li><a href=\"?page=index&amp;lang=it\" title=\"Italian\"><img src=\"";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/it.png"), "html", null, true);
        echo "\" alt=\"Italian\"> Italian</a></li>
                        <li><a href=\"?page=index&amp;lang=fr\" title=\"French\"><img src=\"";
        // line 132
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/fr.png"), "html", null, true);
        echo "\" alt=\"French\"> French</a></li>
                        <li><a href=\"?page=index&amp;lang=pl\" title=\"Polish\"><img src=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/pl.png"), "html", null, true);
        echo "\" alt=\"Polish\"> Polish</a></li>
                </ul>
                </div>
\t\t<div class=\"relativeWrap\">
\t\t\t<div id=\"themer\" class=\"collapse\">
\t\t\t\t<div class=\"wrapper\">
\t\t\t\t\t<span class=\"close2\">&times; close</span>
\t\t\t\t\t<h4>Themer <span>color</span></h4>
\t\t\t\t\t<ul>
\t\t\t\t\t\t<li>Primary Color: <input type=\"text\" data-type=\"minicolors\" data-default=\"#ffffff\" data-slider=\"hue\" data-textfield=\"false\" data-position=\"left\" id=\"themer-primary-cp\" /><div class=\"clearfix\"></div></li>
\t\t\t\t\t\t<li>Page: <select id=\"themer-theme\" class=\"pull-right\"></select><div class=\"clearfix\"></div></li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<span class=\"link\" id=\"themer-custom-reset\">reset page</span>
\t\t\t\t\t\t\t<span class=\"pull-right\"><label>advanced <input type=\"checkbox\" value=\"1\" id=\"themer-advanced-toggle\" /></label></span>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t\t<div id=\"themer-getcode\" class=\"hide\">
\t\t\t\t\t\t<div class=\"separator\"></div>
\t\t\t\t\t\t<button class=\"btn btn-primary btn-small pull-right btn-icon glyphicons download\" id=\"themer-getcode-less\"><i></i>Get LESS</button>
\t\t\t\t\t\t<button class=\"btn btn-inverse btn-small pull-right btn-icon glyphicons download\" id=\"themer-getcode-css\"><i></i>Get CSS</button>
\t\t\t\t\t\t<div class=\"clearfix\"></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

                <div class=\"separator\"></div>

                ";
        // line 161
        $this->displayBlock('breadcrumb', $context, $blocks);
        // line 164
        echo "
                <div class=\"separator\"></div>

            <!-- content start -->
            ";
        // line 168
        $this->displayBlock('content', $context, $blocks);
        // line 171
        echo "            <!-- content end -->
            </div>

\t</div>
\t</div>
\t<script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
\t<script>
\tvar themerPrimaryColor = '#029ec6';
\tvar themerSelectedTheme = '0';\t</script>
        ";
        // line 180
        $this->displayBlock('extendjs', $context, $blocks);
        // line 206
        echo "            <script type=\"text/javascript\">
                backend_user_search = '";
        // line 207
        echo $this->env->getExtension('routing')->getPath("backend_user_search");
        echo "';
            </script>
\t";
        // line 209
        $this->displayBlock('javascript', $context, $blocks);
        // line 212
        echo "
</body>
</html>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 8
    public function block_head($context, array $blocks = array())
    {
        // line 9
        echo "\t<title>Loyalty Program - Backend</title>
        ";
    }

    // line 107
    public function block_import($context, array $blocks = array())
    {
        // line 108
        echo "        ";
    }

    // line 161
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 162
        echo "                
                ";
    }

    // line 168
    public function block_content($context, array $blocks = array())
    {
        // line 169
        echo "
            ";
    }

    // line 180
    public function block_extendjs($context, array $blocks = array())
    {
        // line 181
        echo "\t";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "82a5755_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_0") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_jquery-ui-1.9.2.custom.min_1.js");
            // line 203
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_1") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_jquery.ui.touch-punch.min_2.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_2") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_jquery.miniColors_3.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_3") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_jquery.cookie_4.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_4") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_themer_5.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_5") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_jquery.sparkline.min_6.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_6") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_jquery.ba-resize_7.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_7") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_jquery.uniform.min_8.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_8") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_jquery.dataTables.min_9.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_9"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_9") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_bootstrap.min_10.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_10"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_10") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_bootstrap-select_11.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_11"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_11") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_jquery.toggle.buttons_12.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_12"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_12") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_twitter-bootstrap-hover-dropdown.min_13.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_13"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_13") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_jasny-bootstrap.min_14.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_14"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_14") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_bootstrap-fileupload_15.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_15"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_15") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_bootbox_16.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_16"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_16") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_wysihtml5-0.3.0_rc2.min_17.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_17"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_17") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_bootstrap-wysihtml5-0.0.2_18.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_18"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_18") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_select2_19.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "82a5755_19"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_19") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_load_20.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "82a5755"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress.js");
            echo "            <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 205
        echo "        ";
    }

    // line 209
    public function block_javascript($context, array $blocks = array())
    {
        // line 210
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Backend:root.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  563 => 210,  560 => 209,  428 => 203,  423 => 181,  420 => 180,  415 => 169,  412 => 168,  407 => 162,  404 => 161,  400 => 108,  397 => 107,  392 => 9,  389 => 8,  379 => 209,  374 => 207,  371 => 206,  358 => 171,  356 => 168,  350 => 164,  348 => 161,  317 => 133,  313 => 132,  305 => 130,  301 => 129,  296 => 127,  285 => 118,  283 => 117,  273 => 110,  268 => 107,  263 => 105,  259 => 104,  253 => 101,  234 => 84,  220 => 82,  216 => 78,  210 => 75,  206 => 73,  188 => 67,  184 => 65,  170 => 63,  165 => 59,  151 => 57,  147 => 53,  141 => 50,  137 => 48,  123 => 46,  119 => 42,  113 => 40,  99 => 38,  95 => 34,  90 => 31,  70 => 29,  65 => 25,  51 => 23,  37 => 11,  35 => 8,  27 => 2,  25 => 1,  690 => 344,  660 => 317,  652 => 312,  644 => 307,  636 => 302,  628 => 297,  620 => 292,  612 => 287,  604 => 282,  596 => 277,  593 => 276,  590 => 275,  579 => 267,  572 => 266,  565 => 264,  559 => 261,  556 => 205,  534 => 256,  526 => 255,  518 => 254,  512 => 251,  508 => 250,  504 => 249,  500 => 248,  496 => 247,  492 => 246,  486 => 245,  479 => 244,  462 => 243,  455 => 239,  451 => 238,  447 => 237,  443 => 236,  439 => 235,  435 => 234,  431 => 233,  427 => 232,  395 => 205,  387 => 202,  381 => 212,  369 => 180,  360 => 188,  345 => 178,  336 => 174,  318 => 161,  309 => 131,  300 => 153,  290 => 146,  278 => 139,  270 => 109,  262 => 130,  254 => 124,  242 => 117,  233 => 113,  224 => 109,  214 => 102,  197 => 90,  192 => 71,  178 => 79,  172 => 76,  162 => 71,  154 => 68,  149 => 66,  139 => 61,  130 => 57,  122 => 54,  111 => 48,  102 => 44,  72 => 24,  64 => 21,  52 => 15,  47 => 19,  44 => 13,  33 => 5,  129 => 28,  124 => 25,  115 => 23,  106 => 22,  104 => 21,  88 => 35,  84 => 17,  82 => 16,  75 => 15,  59 => 19,  55 => 11,  53 => 10,  48 => 7,  39 => 5,  32 => 4,  30 => 4,  26 => 2,  19 => 1,);
    }
}
