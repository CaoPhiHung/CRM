<?php

/* VietlandUserBundle::layout.html.twig */
class __TwigTemplate_eec7e40e1df5302325cb2f894dacfd5c extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--[if lt IE 7]> <html class=\"lt-ie9 lt-ie8 lt-ie7\"> <![endif]-->
<!--[if IE 7]>    <html class=\"lt-ie9 lt-ie8\"> <![endif]-->
<!--[if IE 8]>    <html class=\"lt-ie9\"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
        ";
        // line 7
        $this->displayBlock('head', $context, $blocks);
        // line 10
        echo "
\t<!-- Meta -->
\t<meta charset=\"UTF-8\" />
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0\">
\t<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
\t<meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black\">

\t<!-- Bootstrap -->
\t<link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />

\t<!-- Bootstrap Extended -->
\t<link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t<link href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t<link href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

\t<!-- JQueryUI v1.9.2 -->
\t<link rel=\"stylesheet\" href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css"), "html", null, true);
        echo "\" />

\t<!-- Glyphicons -->
\t<link rel=\"stylesheet\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/css/glyphicons.css"), "html", null, true);
        echo "\" />

\t<!-- Bootstrap Extended -->
\t<link rel=\"stylesheet\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-select/bootstrap-select.css"), "html", null, true);
        echo "\" />
\t<link rel=\"stylesheet\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css"), "html", null, true);
        echo "\" />

\t<!-- Uniform -->
\t<link rel=\"stylesheet\" media=\"screen\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/pixelmatrix-uniform/css/uniform.default.css"), "html", null, true);
        echo "\" />

\t<!-- JQuery v1.8.2 -->
\t<script src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-1.8.2.min.js"), "html", null, true);
        echo "\"></script>

\t<!-- Modernizr -->
\t<script src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/modernizr.custom.76094.js"), "html", null, true);
        echo "\"></script>

\t<!-- MiniColors -->
\t<link rel=\"stylesheet\" media=\"screen\" href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-miniColors/jquery.miniColors.css"), "html", null, true);
        echo "\" />

\t<!-- Theme -->
\t<link rel=\"stylesheet\" href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/css/style.min.css?1361543651"), "html", null, true);
        echo "\" />

\t<!-- Google Analytics -->
\t<script type=\"text/javascript\">

\t  var _gaq = _gaq || [];
\t  _gaq.push(['_setAccount', 'UA-36057737-1']);
\t  _gaq.push(['_trackPageview']);

\t  (function() {
\t    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
\t    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
\t    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
\t  })();

\t</script>

\t<!-- LESS 2 CSS -->
\t<script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/less-1.3.3.min.js"), "html", null, true);
        echo "\"></script>

</head>
<body class=\"login\">

\t<!-- Start Content -->
\t<div class=\"container\">
            <div id=\"wrapper\">
                <div id=\"content\" class=\"\">
                    ";
        // line 75
        $this->displayBlock('content', $context, $blocks);
        // line 78
        echo "                </div>
\t\t</div>

\t</div>

\t<!-- JQueryUI v1.9.2 -->
\t<script src=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"), "html", null, true);
        echo "\"></script>

\t<!-- JQueryUI Touch Punch -->
\t<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
\t<script src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"), "html", null, true);
        echo "\"></script>

\t<!-- MiniColors -->
\t<script src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery-miniColors/jquery.miniColors.js"), "html", null, true);
        echo "\"></script>

\t<!-- Themer -->
\t<script>
\tvar themerPrimaryColor = '#029ec6';
\t\t</script>
\t<script src=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery.cookie.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/themer.js"), "html", null, true);
        echo "\"></script>



\t<!-- Resize Script -->
\t<script src=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/jquery.ba-resize.js"), "html", null, true);
        echo "\"></script>

\t<!-- Uniform -->
\t<script src=\"";
        // line 106
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/pixelmatrix-uniform/jquery.uniform.min.js"), "html", null, true);
        echo "\"></script>

\t<!-- Bootstrap Script -->
\t<script src=\"";
        // line 109
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>

\t<!-- Bootstrap Extended -->
\t<script src=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-select/bootstrap-select.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 113
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 114
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 115
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
\t<script src=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
\t<script src=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootbox.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
\t<script src=\"";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
\t<script src=\"";
        // line 119
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>

\t<!-- Custom Onload Script -->
\t<script src=\"";
        // line 122
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/theme/scripts/load.js"), "html", null, true);
        echo "\"></script>

</body>
</html>";
    }

    // line 7
    public function block_head($context, array $blocks = array())
    {
        // line 8
        echo "\t<title>METRO - Premium Bootstrap Admin Template</title>
        ";
    }

    // line 75
    public function block_content($context, array $blocks = array())
    {
        // line 76
        echo "
                    ";
    }

    public function getTemplateName()
    {
        return "VietlandUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  255 => 76,  252 => 75,  247 => 8,  244 => 7,  236 => 122,  230 => 119,  226 => 118,  222 => 117,  218 => 116,  214 => 115,  210 => 114,  206 => 113,  202 => 112,  196 => 109,  190 => 106,  184 => 103,  176 => 98,  172 => 97,  163 => 91,  157 => 88,  150 => 84,  142 => 78,  140 => 75,  128 => 66,  107 => 48,  101 => 45,  95 => 42,  89 => 39,  83 => 36,  77 => 33,  73 => 32,  55 => 23,  51 => 22,  47 => 21,  41 => 18,  31 => 10,  21 => 1,  71 => 19,  67 => 29,  61 => 26,  57 => 14,  53 => 13,  49 => 12,  45 => 11,  40 => 8,  37 => 7,  32 => 3,  29 => 7,);
    }
}
