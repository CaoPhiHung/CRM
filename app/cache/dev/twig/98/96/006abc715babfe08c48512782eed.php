<?php

/* AevitasLevisBundle:Front:registerOnline.html.twig */
class __TwigTemplate_9896006abc715babfe08c48512782eed extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Become A Member"), "html", null, true);
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
                <h3>";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Become A Member"), "html", null, true);
        echo "</h3>
            </div>
        </div>
    </div>
</div><!-- /.carousel -->
<style type=\"text/css\">
        .stepone .form-row + .form-row{float:none}
</style>
<section id=\"form_reg\" class=\"clearfix\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\" style=\"background:url('";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/credit.jpg"), "html", null, true);
        echo "') no-repeat scroll bottom right #fff\">
                <ul class=\"steps\">
                    <li class=\"active step1\"><span><span>1. ";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Create Password"), "html", null, true);
        echo "</span></span></li>
                    <li class=\"step2\"><span><span>2. ";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Update Your Information"), "html", null, true);
        echo "</span></span></li>
                    <li class=\"step4\"><span><span>3. ";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Opt In"), "html", null, true);
        echo "</span></span></li>
                </ul>
                <div class=\"info stepone\">
                    <span class=\"title\"><h3>1. ";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Create Password"), "html", null, true);
        echo "</h3></span>
                    <div>
                        <p>";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("To get started, you first need to create a password for your account so that you can access your point history and rewards later."), "html", null, true);
        echo "</p>
                        ";
        // line 31
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "AevitasLevisBundle::Front/form.html.twig"));
        // line 32
        echo "                        <form action=\"";
        echo $this->env->getExtension('routing')->getPath("levis_home_register_online");
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " method=\"POST\" class=\"fos_user_registration_register\">
                                <div>";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email"), 'label');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email"), 'widget');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email"), 'errors');
        echo "</div>
                                <div class=\"hide\">";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "username"), 'label');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "username"), 'widget');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "username"), 'errors');
        echo "</div>
                                <div>";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "plainPassword"), 'widget');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "plainPassword"), 'errors');
        echo "</div>
                                ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                                <div>
                                    <input type=\"submit\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next Step"), "html", null, true);
        echo "\" class=\"yellow_button\" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
    }

    // line 49
    public function block_javascript($context, array $blocks = array())
    {
        // line 50
        echo "        \$('.stepone #fos_user_registration_form_email').on('keyup',function(){
            \$('.stepone #fos_user_registration_form_username').val(\$('.stepone #fos_user_registration_form_email').val());
        })
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Front:registerOnline.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 50,  138 => 49,  123 => 38,  118 => 36,  113 => 35,  107 => 34,  101 => 33,  93 => 32,  91 => 31,  87 => 30,  82 => 28,  76 => 25,  72 => 24,  68 => 23,  63 => 21,  49 => 10,  43 => 6,  40 => 5,  33 => 3,  30 => 2,);
    }
}
