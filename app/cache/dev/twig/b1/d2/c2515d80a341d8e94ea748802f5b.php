<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_b1d2c2515d80a341d8e94ea748802f5b extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("TwigBundle::layout.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/exception.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        $this->env->loadTemplate("TwigBundle:Exception:exception.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 12,  54 => 11,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  437 => 167,  416 => 148,  413 => 147,  409 => 146,  347 => 144,  343 => 133,  340 => 132,  337 => 131,  315 => 112,  309 => 109,  302 => 105,  298 => 104,  288 => 99,  282 => 96,  271 => 88,  265 => 85,  261 => 84,  255 => 81,  250 => 79,  240 => 71,  231 => 69,  227 => 68,  214 => 58,  202 => 53,  190 => 50,  180 => 47,  170 => 44,  159 => 35,  156 => 34,  92 => 31,  88 => 20,  82 => 17,  78 => 16,  74 => 15,  69 => 14,  65 => 13,  62 => 12,  56 => 10,  50 => 8,  48 => 7,  45 => 6,  42 => 5,  35 => 3,  32 => 2,);
    }
}
