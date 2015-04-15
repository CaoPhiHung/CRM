<?php

/* :mail:signup.html.twig */
class __TwigTemplate_3fafd9bfe198ca879be132a60e416642 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate(":mail:root.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return ":mail:root.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        echo "<h2><strong>Dear ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "getName"), "html", null, true);
        echo ",<br />
            Thank you for your purchase and registration to Star club.</strong></h2>
    Please login to <a href=\"www.starclubvn.com\">www.starclubvn.com</a> and used this code to complete your enrollment. CODE: <strong>";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["code"]) ? $context["code"] : null), "html", null, true);
        echo "</strong><br/><br />
    Then you can fill up your information to get more point from our program.
";
    }

    public function getTemplateName()
    {
        return ":mail:signup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 4,  28 => 2,);
    }
}
