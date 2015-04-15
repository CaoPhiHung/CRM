<?php

/* FOSUserBundle:Registration:email.txt.twig */
class __TwigTemplate_919cfc7c5864eb8884f209e41829d145 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'subject' => array($this, 'block_subject'),
            'body_text' => array($this, 'block_body_text'),
            'body_html' => array($this, 'block_body_html'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('subject', $context, $blocks);
        // line 6
        $this->displayBlock('body_text', $context, $blocks);
        // line 11
        $this->displayBlock('body_html', $context, $blocks);
    }

    // line 1
    public function block_subject($context, array $blocks = array())
    {
        // line 3
        echo $this->env->getExtension('translator')->trans("registration.email.subject", array("%username%" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"), "%confirmationUrl%" => (isset($context["confirmationUrl"]) ? $context["confirmationUrl"] : $this->getContext($context, "confirmationUrl"))), "FOSUserBundle");
        echo "
";
    }

    // line 6
    public function block_body_text($context, array $blocks = array())
    {
        // line 8
        echo $this->env->getExtension('translator')->trans("registration.email.message", array("%username%" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"), "%confirmationUrl%" => (isset($context["confirmationUrl"]) ? $context["confirmationUrl"] : $this->getContext($context, "confirmationUrl"))), "FOSUserBundle");
        echo "
";
    }

    // line 11
    public function block_body_html($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:email.txt.twig";
    }

    public function getDebugInfo()
    {
        return array (  58 => 13,  23 => 3,  34 => 6,  146 => 51,  148 => 53,  137 => 48,  127 => 44,  113 => 39,  102 => 34,  90 => 28,  81 => 25,  59 => 15,  255 => 76,  244 => 7,  236 => 122,  230 => 119,  226 => 118,  222 => 117,  218 => 116,  210 => 114,  206 => 113,  202 => 112,  190 => 106,  184 => 103,  172 => 97,  150 => 84,  77 => 33,  97 => 36,  65 => 18,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 75,  247 => 8,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 115,  208 => 68,  169 => 60,  143 => 51,  140 => 48,  132 => 46,  128 => 66,  119 => 42,  107 => 48,  71 => 22,  177 => 65,  165 => 64,  160 => 61,  135 => 46,  126 => 43,  114 => 37,  84 => 28,  70 => 20,  67 => 29,  61 => 26,  94 => 35,  89 => 39,  85 => 25,  75 => 23,  68 => 14,  56 => 17,  201 => 92,  196 => 109,  183 => 70,  171 => 61,  166 => 71,  163 => 91,  158 => 67,  156 => 58,  151 => 53,  142 => 78,  138 => 43,  136 => 56,  121 => 41,  117 => 40,  105 => 40,  91 => 31,  62 => 17,  49 => 19,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 6,  25 => 3,  31 => 4,  26 => 11,  19 => 1,  93 => 28,  88 => 31,  78 => 21,  46 => 10,  44 => 9,  27 => 4,  79 => 27,  72 => 16,  69 => 25,  47 => 21,  40 => 6,  37 => 5,  22 => 1,  246 => 32,  157 => 88,  145 => 46,  139 => 50,  131 => 45,  123 => 47,  120 => 39,  115 => 43,  111 => 37,  108 => 37,  101 => 45,  98 => 33,  96 => 31,  83 => 36,  74 => 21,  66 => 19,  55 => 14,  52 => 10,  50 => 10,  43 => 12,  41 => 18,  35 => 8,  32 => 3,  29 => 2,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 98,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 58,  144 => 53,  141 => 51,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 36,  112 => 42,  109 => 41,  106 => 35,  103 => 37,  99 => 30,  95 => 42,  92 => 33,  86 => 27,  82 => 28,  80 => 19,  73 => 32,  64 => 17,  60 => 18,  57 => 14,  54 => 10,  51 => 13,  48 => 11,  45 => 9,  42 => 8,  39 => 6,  36 => 7,  33 => 3,  30 => 1,);
    }
}
