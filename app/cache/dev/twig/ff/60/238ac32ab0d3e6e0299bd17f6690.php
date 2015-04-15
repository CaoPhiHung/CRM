<?php

/* FOSFacebookBundle::initialize.html.twig */
class __TwigTemplate_ff60238ac32ab0d3e6e0299bd17f6690 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo "<div id=\"fb-root\"></div>
";
        // line 2
        if ((!(isset($context["async"]) ? $context["async"] : $this->getContext($context, "async")))) {
            // line 3
            echo "<script type=\"text/javascript\" src=\"http://connect.facebook.net/";
            echo twig_escape_filter($this->env, (isset($context["culture"]) ? $context["culture"] : $this->getContext($context, "culture")), "html", null, true);
            echo "/all.js\"></script>
";
        }
        // line 5
        echo "<script type=\"text/javascript\">
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = \"//connect.facebook.net/en_US/all.js#xfbml=1&appId=";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["appId"]) ? $context["appId"] : $this->getContext($context, "appId")), "html", null, true);
        echo "\";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
";
        // line 14
        if ((isset($context["async"]) ? $context["async"] : $this->getContext($context, "async"))) {
            // line 15
            echo "window.fbAsyncInit = function() {
";
        }
        // line 17
        echo "  FB.init(";
        echo twig_jsonencode_filter(array("appId" => (isset($context["appId"]) ? $context["appId"] : $this->getContext($context, "appId")), "xfbml" => (isset($context["xfbml"]) ? $context["xfbml"] : $this->getContext($context, "xfbml")), "oauth" => (isset($context["oauth"]) ? $context["oauth"] : $this->getContext($context, "oauth")), "status" => (isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")), "cookie" => (isset($context["cookie"]) ? $context["cookie"] : $this->getContext($context, "cookie")), "logging" => (isset($context["logging"]) ? $context["logging"] : $this->getContext($context, "logging"))));
        echo ");
";
        // line 18
        if ((isset($context["async"]) ? $context["async"] : $this->getContext($context, "async"))) {
            // line 19
            echo "
};
function shareFacebook(){
    FB.ui({
      method: 'feed',
      link: '";
            // line 24
            echo (isset($context["link"]) ? $context["link"] : $this->getContext($context, "link"));
            if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user") != null)) {
                echo "?ref=";
                echo $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "getId");
            }
            echo "',
      picture: '";
            // line 25
            echo $this->env->getExtension('assets')->getAssetUrl((isset($context["picture"]) ? $context["picture"] : $this->getContext($context, "picture")));
            echo "',
      name: '";
            // line 26
            echo (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"));
            echo "',
      caption: '";
            // line 27
            echo (isset($context["caption"]) ? $context["caption"] : $this->getContext($context, "caption"));
            echo "',
      description: '";
            // line 28
            echo (isset($context["description"]) ? $context["description"] : $this->getContext($context, "description"));
            echo "'
    }, function(response){});
}
function fblogin(){
\$('#myModal').modal();
FB.login(function(response) {
    if (response.authResponse) {
        \$.ajax({
            url: '";
            // line 36
            echo $this->env->getExtension('routing')->getPath("_security_check");
            echo "',
            dataType: 'json',
            success: function(data){
                if(typeof data.location) window.location = data.location;
            }
        })
    } else {
        // The person cancelled the login dialog
    }
},{scope: '";
            // line 45
            echo (isset($context["scope"]) ? $context["scope"] : $this->getContext($context, "scope"));
            echo "' });    
}
(function() {
  var e = document.createElement('script');
  e.src = document.location.protocol + ";
            // line 49
            echo twig_jsonencode_filter(sprintf("//connect.facebook.net/%s/all.js", (isset($context["culture"]) ? $context["culture"] : $this->getContext($context, "culture"))));
            echo ";
  e.async = true;
  document.getElementById('fb-root').appendChild(e);
}());
";
        }
        // line 55
        echo "</script>
";
    }

    public function getTemplateName()
    {
        return "FOSFacebookBundle::initialize.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 55,  113 => 49,  106 => 45,  94 => 36,  83 => 28,  79 => 27,  75 => 26,  71 => 25,  56 => 19,  54 => 18,  30 => 5,  22 => 2,  19 => 1,  693 => 297,  690 => 296,  686 => 245,  588 => 243,  584 => 226,  581 => 225,  578 => 224,  570 => 153,  564 => 150,  558 => 147,  534 => 140,  528 => 139,  523 => 137,  519 => 136,  515 => 135,  511 => 134,  506 => 132,  502 => 131,  496 => 128,  491 => 126,  487 => 125,  483 => 124,  478 => 123,  469 => 120,  465 => 118,  461 => 117,  456 => 115,  452 => 114,  440 => 105,  432 => 100,  424 => 95,  416 => 90,  408 => 85,  400 => 80,  388 => 71,  383 => 68,  380 => 67,  376 => 27,  338 => 25,  334 => 18,  328 => 14,  325 => 13,  318 => 9,  315 => 8,  305 => 316,  303 => 296,  293 => 288,  286 => 284,  283 => 283,  281 => 282,  241 => 224,  233 => 219,  229 => 218,  225 => 217,  214 => 209,  210 => 208,  204 => 207,  198 => 204,  191 => 200,  187 => 199,  183 => 198,  179 => 197,  173 => 194,  164 => 190,  158 => 189,  152 => 188,  146 => 185,  114 => 67,  108 => 64,  102 => 61,  88 => 50,  84 => 49,  78 => 46,  63 => 24,  59 => 33,  55 => 31,  51 => 28,  49 => 17,  43 => 14,  37 => 10,  33 => 4,  29 => 3,  26 => 2,  24 => 3,  345 => 107,  340 => 104,  337 => 103,  333 => 102,  265 => 100,  261 => 88,  258 => 87,  255 => 86,  243 => 246,  239 => 76,  228 => 73,  222 => 72,  218 => 71,  208 => 70,  205 => 69,  201 => 68,  195 => 65,  190 => 63,  174 => 50,  170 => 49,  161 => 43,  147 => 36,  144 => 35,  134 => 32,  131 => 31,  129 => 30,  119 => 22,  116 => 157,  52 => 18,  48 => 7,  45 => 15,  42 => 5,  35 => 3,  32 => 2,);
    }
}
