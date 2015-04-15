<?php

/* AevitasChannelBundle:eLRTE:root.html.twig */
class __TwigTemplate_d64c88367278b6f42c1470dfc69f6a74 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
\t<link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
\t
\t<!-- Bootstrap Extended -->
\t
\t<link href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t<link href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t
\t<!-- Glyphicons -->
\t<link rel=\"stylesheet\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/css/glyphicons.css"), "html", null, true);
        echo "\" />
\t
\t<!-- Bootstrap Extended -->
\t<link rel=\"stylesheet\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-select/bootstrap-select.css"), "html", null, true);
        echo "\" />
\t<link rel=\"stylesheet\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css"), "html", null, true);
        echo "\" />
\t
\t<!-- Uniform -->
\t<link rel=\"stylesheet\" media=\"screen\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/pixelmatrix-uniform/css/uniform.default.css"), "html", null, true);
        echo "\" />

\t<!-- MiniColors -->
\t<link rel=\"stylesheet\" media=\"screen\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-miniColors/jquery.miniColors.css"), "html", null, true);
        echo "\" />
\t
\t<!-- Theme -->
\t<link rel=\"stylesheet\" href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/css/style.min.css?1361543579"), "html", null, true);
        echo "\" />
\t
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
\t
\t";
        // line 59
        echo "
\t<!-- LESS 2 CSS -->
\t<script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/less-1.3.3.min.js"), "html", null, true);
        echo "\"></script>
\t
\t
\t<!--[if IE]><script type=\"text/javascript\" src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/excanvas/excanvas.js"), "html", null, true);
        echo "\"></script><![endif]-->
\t<!--[if lt IE 8]><script type=\"text/javascript\" src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/json2.js"), "html", null, true);
        echo "\"></script><![endif]-->

        ";
        // line 67
        $this->displayBlock('import', $context, $blocks);
        // line 69
        echo "</head>
<body class=\"";
        // line 70
        echo twig_escape_filter($this->env, strtr($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method"), array("_" => " ")), "html", null, true);
        echo "\">
\t
\t<!-- Start Content -->
\t<div class=\"container\">
\t<div id=\"wrapper\">

            <!-- sidebar start -->
            ";
        // line 77
        $this->env->loadTemplate("AevitasLevisBundle:Backend:sidebar.html.twig")->display($context);
        // line 78
        echo "            <!-- sidebar end -->

            <div id=\"content\" class=\"color-4\">
                <!-- Menu Toggle on mobile -->
                        <button type=\"button\" class=\"btn btn-navbar main\">
                                <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span>
                        </button>
                        <a href=\"#themer\" data-toggle=\"collapse\" class=\"btn btn-primary btn-icon glyphicons eyedropper\"><i></i> Themer</a>
                        <div class=\"relativeWrap pull-right\">
                        <a href=\"#\" data-toggle=\"dropdown\"><img src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/en.png"), "html", null, true);
        echo "\" alt=\"en\" /></a>
                <ul class=\"dropdown-menu pull-right\">
                        <li class=\"active\"><a href=\"?page=index&amp;lang=en\" title=\"English\"><img src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/en.png"), "html", null, true);
        echo "\" alt=\"English\"> English</a></li>
                        <li><a href=\"?page=index&amp;lang=ro\" title=\"Romanian\"><img src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/ro.png"), "html", null, true);
        echo "\" alt=\"Romanian\"> Romanian</a></li>
                        <li><a href=\"?page=index&amp;lang=it\" title=\"Italian\"><img src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/it.png"), "html", null, true);
        echo "\" alt=\"Italian\"> Italian</a></li>
                        <li><a href=\"?page=index&amp;lang=fr\" title=\"French\"><img src=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/images/lang/fr.png"), "html", null, true);
        echo "\" alt=\"French\"> French</a></li>
                        <li><a href=\"?page=index&amp;lang=pl\" title=\"Polish\"><img src=\"";
        // line 93
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
        // line 121
        $this->displayBlock('breadcrumb', $context, $blocks);
        // line 124
        echo "
                <div class=\"separator\"></div>

            <!-- content start -->
            ";
        // line 128
        $this->displayBlock('content', $context, $blocks);
        // line 131
        echo "            <!-- content end -->
            </div>

\t</div>
\t</div>
\t";
        // line 136
        $this->displayBlock('javascript', $context, $blocks);
        // line 139
        echo "</body>
</html>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 8
    public function block_head($context, array $blocks = array())
    {
        // line 9
        echo "\t<title>METRO - Premium Bootstrap Admin Template</title>
        ";
    }

    // line 67
    public function block_import($context, array $blocks = array())
    {
        // line 68
        echo "        ";
    }

    // line 121
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 122
        echo "                
                ";
    }

    // line 128
    public function block_content($context, array $blocks = array())
    {
        // line 129
        echo "
            ";
    }

    // line 136
    public function block_javascript($context, array $blocks = array())
    {
        // line 137
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "AevitasChannelBundle:eLRTE:root.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  260 => 128,  248 => 68,  245 => 67,  240 => 9,  237 => 8,  228 => 136,  221 => 131,  213 => 124,  180 => 93,  401 => 135,  364 => 105,  361 => 104,  353 => 99,  349 => 97,  346 => 96,  333 => 86,  329 => 85,  325 => 84,  321 => 83,  303 => 77,  299 => 76,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 137,  267 => 68,  251 => 64,  243 => 62,  239 => 61,  231 => 59,  227 => 58,  223 => 57,  219 => 128,  215 => 55,  211 => 121,  207 => 53,  195 => 50,  191 => 49,  179 => 46,  175 => 45,  167 => 43,  159 => 87,  155 => 40,  129 => 28,  124 => 25,  104 => 21,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 131,  389 => 8,  371 => 206,  369 => 180,  358 => 171,  356 => 168,  350 => 164,  348 => 161,  317 => 82,  313 => 81,  301 => 129,  296 => 127,  273 => 110,  270 => 109,  263 => 129,  259 => 66,  253 => 101,  234 => 84,  216 => 78,  192 => 71,  188 => 67,  170 => 63,  63 => 27,  53 => 23,  58 => 10,  23 => 3,  34 => 8,  146 => 77,  148 => 78,  137 => 48,  127 => 30,  113 => 49,  102 => 34,  90 => 31,  81 => 17,  59 => 10,  255 => 122,  244 => 7,  236 => 122,  230 => 139,  226 => 118,  222 => 117,  218 => 116,  210 => 75,  206 => 73,  202 => 112,  190 => 106,  184 => 65,  172 => 91,  150 => 84,  77 => 29,  97 => 21,  65 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 181,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 212,  379 => 209,  374 => 207,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 80,  305 => 130,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 86,  268 => 136,  264 => 84,  258 => 81,  252 => 121,  247 => 63,  241 => 77,  235 => 60,  229 => 73,  224 => 71,  220 => 82,  214 => 115,  208 => 68,  169 => 60,  143 => 51,  140 => 48,  132 => 46,  128 => 66,  119 => 28,  107 => 25,  71 => 13,  177 => 65,  165 => 59,  160 => 61,  135 => 32,  126 => 65,  114 => 37,  84 => 17,  70 => 29,  67 => 12,  61 => 17,  94 => 36,  89 => 19,  85 => 37,  75 => 14,  68 => 16,  56 => 22,  201 => 92,  196 => 109,  183 => 47,  171 => 44,  166 => 71,  163 => 42,  158 => 67,  156 => 58,  151 => 39,  142 => 78,  138 => 43,  136 => 70,  121 => 55,  117 => 40,  105 => 40,  91 => 40,  62 => 17,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 1,  25 => 1,  31 => 4,  26 => 2,  19 => 1,  93 => 20,  88 => 18,  78 => 30,  46 => 19,  44 => 9,  27 => 96,  79 => 34,  72 => 20,  69 => 30,  47 => 19,  40 => 8,  37 => 10,  22 => 1,  246 => 32,  157 => 88,  145 => 36,  139 => 33,  131 => 67,  123 => 29,  120 => 39,  115 => 27,  111 => 26,  108 => 37,  101 => 22,  98 => 33,  96 => 31,  83 => 28,  74 => 28,  66 => 19,  55 => 9,  52 => 21,  50 => 7,  43 => 5,  41 => 18,  35 => 11,  32 => 104,  29 => 103,  209 => 82,  203 => 52,  199 => 51,  193 => 73,  189 => 71,  187 => 48,  182 => 66,  176 => 92,  173 => 74,  168 => 90,  164 => 89,  162 => 62,  154 => 54,  149 => 51,  147 => 53,  144 => 53,  141 => 50,  133 => 69,  130 => 41,  125 => 44,  122 => 64,  116 => 61,  112 => 59,  109 => 41,  106 => 22,  103 => 37,  99 => 38,  95 => 34,  92 => 33,  86 => 27,  82 => 16,  80 => 19,  73 => 31,  64 => 24,  60 => 23,  57 => 24,  54 => 18,  51 => 23,  48 => 7,  45 => 19,  42 => 6,  39 => 2,  36 => 11,  33 => 10,  30 => 3,);
    }
}
