<?php

/* AevitasLevisBundle:Front:forgotPassword.html.twig */
class __TwigTemplate_8a4e693ce1c58b729acee6010d3d102a extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Front:root.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AevitasLevisBundle:Front:root.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo "        <title>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Complete Enrollment"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Step 1"), "html", null, true);
        echo "</title>
        ";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"panel\" class=\"toppanel\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <h3>Become A Member</h3>
            </div>
        </div>
    </div>
</div><!-- /.carousel -->

<section id=\"form_reg\" class=\"clearfix\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\" style=\"background:url('";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/credit.jpg"), "html", null, true);
        echo "') no-repeat scroll bottom right #fff\">
                <div class=\"info\">
                    <span class=\"title\"><h3>";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Forget Password"), "html", null, true);
        echo "</h3></span>
                    <div>
                ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice_enroll"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 24
            echo "                    <div class=\"alert alert-faded\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                        ";
            // line 26
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "                        <p>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Type your email to get change instruction."), "html", null, true);
        echo "</p>
                        ";
        // line 30
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "AevitasLevisBundle::Front/form.html.twig"));
        // line 31
        echo "                        <form action=\"";
        echo $this->env->getExtension('routing')->getPath("levis_home_forget_password");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " method=\"POST\" class=\"formstep2\">
                            <div class=\"row\">";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email"), 'row');
        echo "
                            </div>
                                ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                            <div>
                                <input type=\"submit\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next Step"), "html", null, true);
        echo "\" class=\"yellow_button\" />
                            </div>

                        </form>
                    </div>
                </div>
                <span class=\"points\"><em>+10</em></span>
            </div>
        </div>
    </div>
</section>
";
    }

    // line 48
    public function block_javascript($context, array $blocks = array())
    {
        // line 49
        echo "    \$('#form_CCode').val('');
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Front:forgotPassword.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 49,  128 => 48,  112 => 36,  107 => 34,  102 => 32,  94 => 31,  92 => 30,  87 => 29,  78 => 26,  74 => 24,  70 => 23,  65 => 21,  60 => 19,  45 => 6,  42 => 5,  33 => 3,  30 => 2,);
    }
}
