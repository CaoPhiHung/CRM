<?php

/* FOSUserBundle:Registration:checkEmail.html.twig */
class __TwigTemplate_795f7f2dff2968f9046e90c51c32b126 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("FOSUserBundle::layout.html.twig");

        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 4
        echo "    <p>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("registration.check_email", array("%email%" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email")), "FOSUserBundle"), "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:checkEmail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 9,  389 => 8,  371 => 206,  369 => 180,  358 => 171,  356 => 168,  350 => 164,  348 => 161,  317 => 133,  313 => 132,  301 => 129,  296 => 127,  273 => 110,  270 => 109,  263 => 105,  259 => 104,  253 => 101,  234 => 84,  216 => 78,  192 => 71,  188 => 67,  170 => 63,  63 => 17,  53 => 11,  58 => 13,  23 => 3,  34 => 3,  146 => 51,  148 => 53,  137 => 48,  127 => 44,  113 => 40,  102 => 34,  90 => 31,  81 => 21,  59 => 15,  255 => 76,  244 => 7,  236 => 122,  230 => 119,  226 => 118,  222 => 117,  218 => 116,  210 => 75,  206 => 73,  202 => 112,  190 => 106,  184 => 65,  172 => 97,  150 => 84,  77 => 33,  97 => 36,  65 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 181,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 212,  379 => 209,  374 => 207,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 131,  305 => 130,  298 => 91,  294 => 90,  285 => 118,  283 => 117,  278 => 86,  268 => 107,  264 => 84,  258 => 81,  252 => 75,  247 => 8,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 82,  214 => 115,  208 => 68,  169 => 60,  143 => 51,  140 => 48,  132 => 46,  128 => 66,  119 => 42,  107 => 48,  71 => 22,  177 => 65,  165 => 59,  160 => 61,  135 => 46,  126 => 43,  114 => 37,  84 => 22,  70 => 29,  67 => 18,  61 => 26,  94 => 35,  89 => 39,  85 => 25,  75 => 23,  68 => 14,  56 => 12,  201 => 92,  196 => 109,  183 => 70,  171 => 61,  166 => 71,  163 => 91,  158 => 67,  156 => 58,  151 => 57,  142 => 78,  138 => 43,  136 => 56,  121 => 41,  117 => 40,  105 => 40,  91 => 31,  62 => 17,  49 => 19,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 6,  25 => 1,  31 => 4,  26 => 11,  19 => 1,  93 => 26,  88 => 31,  78 => 21,  46 => 7,  44 => 9,  27 => 2,  79 => 27,  72 => 20,  69 => 19,  47 => 19,  40 => 6,  37 => 11,  22 => 1,  246 => 32,  157 => 88,  145 => 46,  139 => 50,  131 => 45,  123 => 46,  120 => 39,  115 => 43,  111 => 37,  108 => 37,  101 => 45,  98 => 33,  96 => 31,  83 => 36,  74 => 21,  66 => 19,  55 => 14,  52 => 10,  50 => 10,  43 => 6,  41 => 18,  35 => 8,  32 => 3,  29 => 2,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 98,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 53,  144 => 53,  141 => 50,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 36,  112 => 42,  109 => 41,  106 => 35,  103 => 37,  99 => 38,  95 => 34,  92 => 33,  86 => 27,  82 => 28,  80 => 19,  73 => 32,  64 => 17,  60 => 18,  57 => 14,  54 => 10,  51 => 23,  48 => 11,  45 => 9,  42 => 8,  39 => 6,  36 => 7,  33 => 3,  30 => 1,);
    }
}
