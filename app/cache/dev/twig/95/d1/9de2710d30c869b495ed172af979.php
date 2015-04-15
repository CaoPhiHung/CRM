<?php

/* VietlandAevitasBundle:Mailer:editor.html.twig */
class __TwigTemplate_95d19de2710d30c869b495ed172af979 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("VietlandStravelBundle:Backend:root.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "VietlandStravelBundle:Backend:root.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_head($context, array $blocks = array())
    {
        // line 3
        echo "<title>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Editing Hotel"), "html", null, true);
        echo " - Spirit Travel</title>
";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row-fluid\">
    <div id=\"addhotel\" class=\"span12\">
        <div class=\"head\">
            <div class=\"isw-documents\"></div>
            <h1>";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Adding Hotel"), "html", null, true);
        echo "</h1>
            <div class=\"clear\"></div>
        </div>
        <div class=\"block-fluid\">  
            <form method=\"POST\" action=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edit_email_template", array("action" => (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")))), "html", null, true);
        echo "\">
                <div class=\"row-form\">
                    <div class=\"span3\">Textarea placeholder:</div>
                    <div class=\"span9\">";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "templateSource"), 'widget');
        echo "</div>
                    <div class=\"clear\"></div>
                    ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                    <input type=\"submit\" value=\"Commit Template\"/>
                </div>
            </form>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "VietlandAevitasBundle:Mailer:editor.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 9,  389 => 8,  371 => 206,  369 => 180,  358 => 171,  356 => 168,  350 => 164,  348 => 161,  317 => 133,  313 => 132,  301 => 129,  296 => 127,  273 => 110,  270 => 109,  263 => 105,  259 => 104,  253 => 101,  234 => 84,  216 => 78,  192 => 71,  188 => 67,  170 => 63,  63 => 24,  53 => 22,  58 => 10,  23 => 3,  34 => 11,  146 => 51,  148 => 53,  137 => 48,  127 => 44,  113 => 49,  102 => 34,  90 => 31,  81 => 21,  59 => 15,  255 => 76,  244 => 7,  236 => 122,  230 => 119,  226 => 118,  222 => 117,  218 => 116,  210 => 75,  206 => 73,  202 => 112,  190 => 106,  184 => 65,  172 => 97,  150 => 84,  77 => 29,  97 => 36,  65 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 181,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 212,  379 => 209,  374 => 207,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 131,  305 => 130,  298 => 91,  294 => 90,  285 => 118,  283 => 117,  278 => 86,  268 => 107,  264 => 84,  258 => 81,  252 => 75,  247 => 8,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 82,  214 => 115,  208 => 68,  169 => 60,  143 => 51,  140 => 48,  132 => 46,  128 => 66,  119 => 42,  107 => 48,  71 => 25,  177 => 65,  165 => 59,  160 => 61,  135 => 46,  126 => 43,  114 => 37,  84 => 22,  70 => 29,  67 => 18,  61 => 17,  94 => 36,  89 => 39,  85 => 25,  75 => 26,  68 => 16,  56 => 22,  201 => 92,  196 => 109,  183 => 70,  171 => 61,  166 => 71,  163 => 91,  158 => 67,  156 => 58,  151 => 57,  142 => 78,  138 => 43,  136 => 56,  121 => 55,  117 => 40,  105 => 40,  91 => 31,  62 => 17,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 3,  25 => 1,  31 => 4,  26 => 3,  19 => 1,  93 => 26,  88 => 31,  78 => 30,  46 => 20,  44 => 9,  27 => 7,  79 => 27,  72 => 20,  69 => 19,  47 => 19,  40 => 8,  37 => 10,  22 => 2,  246 => 32,  157 => 88,  145 => 46,  139 => 50,  131 => 45,  123 => 46,  120 => 39,  115 => 43,  111 => 37,  108 => 37,  101 => 45,  98 => 33,  96 => 31,  83 => 28,  74 => 28,  66 => 19,  55 => 14,  52 => 21,  50 => 21,  43 => 8,  41 => 18,  35 => 11,  32 => 3,  29 => 2,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 98,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 53,  144 => 53,  141 => 50,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 36,  112 => 42,  109 => 41,  106 => 45,  103 => 37,  99 => 38,  95 => 34,  92 => 33,  86 => 27,  82 => 28,  80 => 19,  73 => 27,  64 => 24,  60 => 23,  57 => 23,  54 => 18,  51 => 23,  48 => 10,  45 => 19,  42 => 6,  39 => 5,  36 => 12,  33 => 10,  30 => 4,);
    }
}
