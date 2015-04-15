<?php

/* FOSUserBundle:Resetting:checkEmail.html.twig */
class __TwigTemplate_faeb021c836221e7df32ba1ecb7390ab extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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

    // line 5
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 6
        echo "<p>
";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.check_email", array("%email%" => (isset($context["email"]) ? $context["email"] : $this->getContext($context, "email"))), "FOSUserBundle"), "html", null, true);
        echo "
</p>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:checkEmail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 7,  146 => 51,  148 => 53,  137 => 48,  127 => 44,  113 => 39,  102 => 34,  90 => 28,  81 => 25,  59 => 15,  255 => 76,  244 => 7,  236 => 122,  230 => 119,  226 => 118,  222 => 117,  218 => 116,  210 => 114,  206 => 113,  202 => 112,  190 => 106,  184 => 103,  172 => 97,  150 => 84,  77 => 33,  97 => 36,  65 => 18,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 75,  247 => 8,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 115,  208 => 68,  169 => 60,  143 => 51,  140 => 48,  132 => 46,  128 => 66,  119 => 42,  107 => 48,  71 => 22,  177 => 65,  165 => 64,  160 => 61,  135 => 46,  126 => 43,  114 => 37,  84 => 28,  70 => 20,  67 => 29,  61 => 26,  94 => 35,  89 => 39,  85 => 25,  75 => 23,  68 => 14,  56 => 17,  201 => 92,  196 => 109,  183 => 70,  171 => 61,  166 => 71,  163 => 91,  158 => 67,  156 => 58,  151 => 53,  142 => 78,  138 => 43,  136 => 56,  121 => 41,  117 => 40,  105 => 40,  91 => 31,  62 => 17,  49 => 19,  87 => 20,  21 => 1,  38 => 6,  28 => 5,  24 => 7,  25 => 3,  31 => 6,  26 => 12,  19 => 1,  93 => 28,  88 => 31,  78 => 21,  46 => 10,  44 => 9,  27 => 4,  79 => 27,  72 => 16,  69 => 25,  47 => 21,  40 => 8,  37 => 10,  22 => 2,  246 => 32,  157 => 88,  145 => 46,  139 => 50,  131 => 45,  123 => 47,  120 => 39,  115 => 43,  111 => 37,  108 => 37,  101 => 45,  98 => 33,  96 => 31,  83 => 36,  74 => 21,  66 => 19,  55 => 14,  52 => 21,  50 => 10,  43 => 8,  41 => 18,  35 => 5,  32 => 4,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 98,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 58,  144 => 53,  141 => 51,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 36,  112 => 42,  109 => 41,  106 => 35,  103 => 37,  99 => 30,  95 => 42,  92 => 33,  86 => 27,  82 => 28,  80 => 19,  73 => 32,  64 => 17,  60 => 18,  57 => 14,  54 => 10,  51 => 13,  48 => 12,  45 => 17,  42 => 9,  39 => 7,  36 => 7,  33 => 4,  30 => 2,);
    }
}
