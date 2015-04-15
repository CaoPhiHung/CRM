<?php

/* AevitasLevisBundle:Backend:rootStore.html.twig */
class __TwigTemplate_a3b581279d0ff2ebf8c761c9dc47a67c extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
\t<link rel=\"stylesheet\" href=\"/bundles/aevitaslevis/theme/css/glyphicons.css\" />
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
        echo "
\t<!-- JQuery v1.8.2 -->
\t<script src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-1.8.2.min.js"), "html", null, true);
        echo "\"></script>
\t
\t<!-- Modernizr -->
\t<script src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/modernizr.custom.76094.js"), "html", null, true);
        echo "\"></script>
\t
\t<!-- MiniColors -->
        ";
        // line 81
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "f9150aa_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f9150aa_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-miniColors/miniColors_jquery.miniColors_1.css");
            // line 85
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
        // line 87
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
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/less-1.3.3.min.js"), "html", null, true);
        echo "\"></script>
\t
\t
\t<!--[if IE]><script type=\"text/javascript\" src=\"";
        // line 107
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/excanvas/excanvas.js"), "html", null, true);
        echo "\"></script><![endif]-->
\t<!--[if lt IE 8]><script type=\"text/javascript\" src=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/json2.js"), "html", null, true);
        echo "\"></script><![endif]-->

        ";
        // line 110
        $this->displayBlock('import', $context, $blocks);
        // line 112
        echo "</head>
<body class=\"";
        // line 113
        echo twig_escape_filter($this->env, strtr($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method"), array("_" => " ")), "html", null, true);
        echo "\">
\t
\t<!-- Start Content -->
\t<div class=\"container\">
\t<div id=\"wrapper\">

            <!-- sidebar start -->
            ";
        // line 120
        $this->env->loadTemplate("AevitasLevisBundle:Backend:sidebarStore.html.twig")->display($context);
        // line 121
        echo "            <!-- sidebar end -->

            <div id=\"content\" class=\"color-4\">
                <!-- Menu Toggle on mobile -->
                        <button type=\"button\" class=\"btn btn-navbar main\">
                                <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span>
                        </button>
                        <a href=\"#themer\" data-toggle=\"collapse\" class=\"btn btn-primary btn-icon glyphicons eyedropper\"><i></i> Themer</a>
                        <div class=\"relativeWrap pull-right\">
                        <a href=\"#\" data-toggle=\"dropdown\"><img src=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/en.png"), "html", null, true);
        echo "\" alt=\"en\" /></a>
                <ul class=\"dropdown-menu pull-right\">
                        <li class=\"active\"><a href=\"?page=index&amp;lang=en\" title=\"English\"><img src=\"";
        // line 132
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/en.png"), "html", null, true);
        echo "\" alt=\"English\"> English</a></li>
                        <li><a href=\"?page=index&amp;lang=ro\" title=\"Romanian\"><img src=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/ro.png"), "html", null, true);
        echo "\" alt=\"Romanian\"> Romanian</a></li>
                        <li><a href=\"?page=index&amp;lang=it\" title=\"Italian\"><img src=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/it.png"), "html", null, true);
        echo "\" alt=\"Italian\"> Italian</a></li>
                        <li><a href=\"?page=index&amp;lang=fr\" title=\"French\"><img src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/fr.png"), "html", null, true);
        echo "\" alt=\"French\"> French</a></li>
                        <li><a href=\"?page=index&amp;lang=pl\" title=\"Polish\"><img src=\"";
        // line 136
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
        // line 164
        $this->displayBlock('breadcrumb', $context, $blocks);
        // line 167
        echo "
                <div class=\"separator\"></div>

            <!-- content start -->
            ";
        // line 171
        $this->displayBlock('content', $context, $blocks);
        // line 174
        echo "            <!-- content end -->
            </div>

\t</div>
\t</div>
\t
\t<!-- JQueryUI v1.9.2 -->
\t
\t<!-- Themer -->
\t<script>
\tvar themerPrimaryColor = '#029ec6';
\tvar themerSelectedTheme = '0';\t</script>
        ";
        // line 186
        $this->displayBlock('extendjs', $context, $blocks);
        // line 212
        echo "\t<!-- JQueryUI Touch Punch -->
\t<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
\t
\t<!-- MiniColors -->
\t
\t
\t";
        // line 218
        $this->displayBlock('javascript', $context, $blocks);
        // line 221
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
        echo "\t<title>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Store"), "html", null, true);
        echo "</title>
        ";
    }

    // line 110
    public function block_import($context, array $blocks = array())
    {
        // line 111
        echo "        ";
    }

    // line 164
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 165
        echo "                
                ";
    }

    // line 171
    public function block_content($context, array $blocks = array())
    {
        // line 172
        echo "
            ";
    }

    // line 186
    public function block_extendjs($context, array $blocks = array())
    {
        // line 187
        echo "\t";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "82a5755_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_82a5755_0") : $this->env->getExtension('assets')->getAssetUrl("js/backend_compress_jquery-ui-1.9.2.custom.min_1.js");
            // line 209
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
        // line 211
        echo "        ";
    }

    // line 218
    public function block_javascript($context, array $blocks = array())
    {
        // line 219
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Backend:rootStore.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  571 => 219,  568 => 218,  564 => 211,  408 => 111,  405 => 110,  375 => 186,  359 => 171,  351 => 164,  320 => 136,  316 => 135,  286 => 120,  266 => 108,  262 => 107,  256 => 104,  204 => 52,  161 => 43,  185 => 67,  134 => 43,  378 => 132,  340 => 130,  336 => 123,  330 => 121,  326 => 120,  429 => 149,  422 => 145,  417 => 144,  395 => 8,  388 => 134,  339 => 123,  153 => 42,  506 => 326,  455 => 278,  449 => 276,  434 => 264,  385 => 218,  376 => 227,  372 => 226,  334 => 190,  225 => 112,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 366,  617 => 363,  615 => 362,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 352,  592 => 351,  587 => 348,  585 => 347,  540 => 305,  537 => 304,  534 => 303,  519 => 291,  494 => 268,  482 => 265,  476 => 263,  473 => 262,  452 => 277,  433 => 245,  411 => 226,  380 => 206,  367 => 202,  344 => 190,  338 => 188,  335 => 187,  331 => 186,  297 => 175,  181 => 65,  332 => 157,  323 => 154,  319 => 153,  315 => 152,  308 => 133,  292 => 142,  288 => 121,  281 => 139,  277 => 138,  254 => 120,  197 => 51,  118 => 45,  100 => 44,  504 => 342,  500 => 341,  496 => 340,  492 => 339,  488 => 267,  484 => 337,  479 => 335,  475 => 334,  470 => 332,  466 => 331,  431 => 187,  396 => 238,  394 => 267,  391 => 135,  377 => 212,  354 => 245,  345 => 241,  343 => 124,  310 => 178,  293 => 200,  284 => 152,  257 => 184,  205 => 87,  178 => 75,  462 => 274,  458 => 252,  454 => 272,  450 => 271,  446 => 249,  442 => 269,  436 => 209,  432 => 265,  419 => 147,  386 => 208,  307 => 209,  304 => 132,  289 => 129,  280 => 191,  276 => 113,  249 => 111,  232 => 102,  198 => 93,  174 => 73,  200 => 69,  186 => 48,  152 => 67,  110 => 34,  76 => 28,  260 => 128,  248 => 106,  245 => 105,  240 => 118,  237 => 87,  228 => 106,  221 => 62,  213 => 78,  180 => 156,  401 => 271,  364 => 105,  361 => 174,  353 => 167,  349 => 243,  346 => 125,  333 => 122,  329 => 85,  325 => 188,  321 => 187,  303 => 77,  299 => 130,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 110,  267 => 189,  251 => 190,  243 => 188,  239 => 187,  231 => 59,  227 => 93,  223 => 85,  219 => 81,  215 => 60,  211 => 98,  207 => 75,  195 => 50,  191 => 92,  179 => 79,  175 => 45,  167 => 63,  159 => 72,  155 => 40,  129 => 47,  124 => 35,  104 => 32,  563 => 210,  560 => 209,  556 => 205,  428 => 186,  420 => 171,  415 => 165,  412 => 164,  404 => 161,  400 => 239,  397 => 107,  392 => 209,  389 => 8,  371 => 203,  369 => 256,  358 => 171,  356 => 193,  350 => 132,  348 => 161,  317 => 82,  313 => 81,  301 => 176,  296 => 127,  273 => 112,  270 => 109,  263 => 188,  259 => 192,  253 => 121,  234 => 90,  216 => 78,  192 => 83,  188 => 56,  170 => 125,  63 => 21,  53 => 16,  58 => 16,  23 => 3,  34 => 3,  146 => 58,  148 => 57,  137 => 48,  127 => 42,  113 => 40,  102 => 35,  90 => 31,  81 => 26,  59 => 23,  255 => 191,  244 => 7,  236 => 179,  230 => 176,  226 => 64,  222 => 95,  218 => 61,  210 => 89,  206 => 96,  202 => 64,  190 => 49,  184 => 78,  172 => 72,  150 => 61,  77 => 25,  97 => 30,  65 => 25,  480 => 162,  474 => 161,  469 => 261,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 247,  437 => 246,  435 => 146,  430 => 144,  427 => 263,  423 => 172,  413 => 134,  409 => 241,  407 => 142,  402 => 130,  398 => 9,  393 => 126,  387 => 221,  384 => 121,  381 => 133,  379 => 262,  374 => 204,  368 => 112,  365 => 111,  362 => 110,  360 => 249,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 134,  309 => 166,  305 => 164,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 150,  268 => 136,  264 => 84,  258 => 122,  252 => 121,  247 => 189,  241 => 77,  235 => 103,  229 => 106,  224 => 172,  220 => 101,  214 => 90,  208 => 72,  169 => 76,  143 => 51,  140 => 39,  132 => 37,  128 => 36,  119 => 42,  107 => 42,  71 => 25,  177 => 69,  165 => 74,  160 => 52,  135 => 55,  126 => 53,  114 => 51,  84 => 17,  70 => 29,  67 => 25,  61 => 20,  94 => 36,  89 => 34,  85 => 27,  75 => 26,  68 => 26,  56 => 16,  201 => 86,  196 => 62,  183 => 47,  171 => 44,  166 => 73,  163 => 73,  158 => 67,  156 => 66,  151 => 56,  142 => 64,  138 => 43,  136 => 38,  121 => 50,  117 => 51,  105 => 39,  91 => 32,  62 => 19,  49 => 11,  87 => 28,  21 => 1,  38 => 6,  28 => 3,  24 => 4,  25 => 1,  31 => 3,  26 => 2,  19 => 1,  93 => 34,  88 => 34,  78 => 26,  46 => 9,  44 => 13,  27 => 2,  79 => 25,  72 => 27,  69 => 22,  47 => 19,  40 => 9,  37 => 11,  22 => 1,  246 => 32,  157 => 57,  145 => 41,  139 => 63,  131 => 47,  123 => 46,  120 => 34,  115 => 48,  111 => 50,  108 => 48,  101 => 31,  98 => 33,  96 => 31,  83 => 26,  74 => 27,  66 => 21,  55 => 17,  52 => 12,  50 => 15,  43 => 8,  41 => 7,  35 => 8,  32 => 4,  29 => 3,  209 => 87,  203 => 73,  199 => 63,  193 => 80,  189 => 71,  187 => 85,  182 => 66,  176 => 80,  173 => 74,  168 => 71,  164 => 69,  162 => 59,  154 => 51,  149 => 69,  147 => 54,  144 => 53,  141 => 46,  133 => 54,  130 => 55,  125 => 46,  122 => 49,  116 => 38,  112 => 47,  109 => 41,  106 => 33,  103 => 44,  99 => 38,  95 => 34,  92 => 35,  86 => 35,  82 => 28,  80 => 30,  73 => 24,  64 => 25,  60 => 17,  57 => 15,  54 => 14,  51 => 23,  48 => 11,  45 => 13,  42 => 6,  39 => 5,  36 => 5,  33 => 4,  30 => 5,);
    }
}
