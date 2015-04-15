<?php

/* FOSUserBundle:Profile:show.html.twig */
class __TwigTemplate_b6e53b4d8b121b9f303b9e31a56753e4 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"user_info\">
    <form action=\"";
        // line 2
        echo $this->env->getExtension('routing')->getPath("fos_user_profile_edit");
        echo "\" target=\"iframe-post-form\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
;
        echo " method=\"POST\" class=\"profile_edit\">
        <div class=\"avatars\">
            ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "avatars"), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("Select file to change Avatar"))));
        echo "
        </div>
        <div>
        ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "username"), 'label');
        echo "
        ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "username"), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("Username"), "disabled" => "disabled", "class" => "title")));
        echo "
        <span class=\"error\">";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "username"), 'errors');
        echo "</span>
        </div>
            
        <div>
        ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "email"), 'label');
        echo "
        ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "email"), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("Email"), "disabled" => "disabled", "class" => "email")));
        echo "
        <span class=\"error\">";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "email"), 'errors');
        echo "</span>
        </div>
            
        <div class=\"datepicker\">
        ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "dob"), 'label');
        echo "
        ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "dob"), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("vietland.dob"), "disabled" => "disabled", "class" => "date")));
        echo "
        <span class=\"error\">";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "dob"), 'errors');
        echo "</span>
        </div>
        
        <div>
            ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "sex"), 'label');
        echo "
            <div  class=\"select\">
                ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "sex"), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("vietland.sex"), "disabled" => "disabled", "class" => "sex")));
        echo "
                <span class=\"error\">";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "sex"), 'errors');
        echo "</span>
            </div>
        </div>
        
        <div>
        ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "cellphone"), 'label');
        echo "
        ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "cellphone"), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("vietland.cellphone"), "disabled" => "disabled", "class" => "cellphone")));
        echo "
        <span class=\"error\">";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "cellphone"), 'errors');
        echo "</span>
        </div>
        
        <div>
        ";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "smsConfirm"), 'label');
        echo "
        ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "smsConfirm"), 'widget', array("attr" => array("placeholder" => $this->env->getExtension('translator')->trans("vietland.smsConfirm"), "disabled" => "disabled", "class" => "sms")));
        echo "
        <span class=\"error\">";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "smsConfirm"), 'errors');
        echo "</span>
        </div>
        ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "user"), "cropped"), 'widget');
        echo "
        <div class=\"hide\" style=\"display:none\">
            ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
            <input type=\"submit\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("profile.edit.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
        </div>
        <a href=\"#\" class=\"edit\">";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Edit"), "html", null, true);
        echo "</a>
    </form>
        <div>
            <img src=\"";
        // line 51
        echo twig_escape_filter($this->env, (isset($context["userimage"]) ? $context["userimage"] : $this->getContext($context, "userimage")), "html", null, true);
        echo "\" style=\"float: left; margin-right: 10px;\" id=\"thumbnail\" alt=\"Create Thumbnail\" />
            <div style=\"float:left; position:relative; overflow:hidden; width:100px; height:100px;\">
                    <img src=\"";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["userimage"]) ? $context["userimage"] : $this->getContext($context, "userimage")), "html", null, true);
        echo "\" style=\"position: relative;\" alt=\"Thumbnail Preview\" />
            </div>
        </div>
</div>";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Profile:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 51,  148 => 53,  137 => 48,  127 => 44,  113 => 39,  102 => 34,  90 => 28,  81 => 25,  59 => 15,  255 => 76,  244 => 7,  236 => 122,  230 => 119,  226 => 118,  222 => 117,  218 => 116,  210 => 114,  206 => 113,  202 => 112,  190 => 106,  184 => 103,  172 => 97,  150 => 84,  77 => 33,  97 => 36,  65 => 18,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 75,  247 => 8,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 70,  214 => 115,  208 => 68,  169 => 60,  143 => 51,  140 => 48,  132 => 46,  128 => 66,  119 => 42,  107 => 48,  71 => 22,  177 => 65,  165 => 64,  160 => 61,  135 => 46,  126 => 43,  114 => 37,  84 => 28,  70 => 20,  67 => 29,  61 => 26,  94 => 35,  89 => 39,  85 => 25,  75 => 23,  68 => 14,  56 => 9,  201 => 92,  196 => 109,  183 => 70,  171 => 61,  166 => 71,  163 => 91,  158 => 67,  156 => 58,  151 => 53,  142 => 78,  138 => 43,  136 => 56,  121 => 41,  117 => 40,  105 => 40,  91 => 31,  62 => 17,  49 => 19,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 3,  25 => 3,  31 => 10,  26 => 6,  19 => 1,  93 => 28,  88 => 31,  78 => 21,  46 => 7,  44 => 9,  27 => 4,  79 => 27,  72 => 16,  69 => 25,  47 => 21,  40 => 8,  37 => 10,  22 => 2,  246 => 32,  157 => 88,  145 => 46,  139 => 50,  131 => 45,  123 => 47,  120 => 39,  115 => 43,  111 => 37,  108 => 37,  101 => 45,  98 => 33,  96 => 31,  83 => 36,  74 => 21,  66 => 19,  55 => 14,  52 => 21,  50 => 10,  43 => 8,  41 => 18,  35 => 5,  32 => 4,  29 => 7,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 98,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 58,  144 => 53,  141 => 51,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 36,  112 => 42,  109 => 41,  106 => 35,  103 => 37,  99 => 30,  95 => 42,  92 => 33,  86 => 27,  82 => 28,  80 => 19,  73 => 32,  64 => 17,  60 => 6,  57 => 14,  54 => 10,  51 => 13,  48 => 13,  45 => 17,  42 => 7,  39 => 6,  36 => 7,  33 => 4,  30 => 4,);
    }
}
