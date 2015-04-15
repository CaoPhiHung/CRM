<?php

/* AevitasLevisBundle:Static:contactUs.html.twig */
class __TwigTemplate_073d39b081ea4add11884ee647d7ed39 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Front:root.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
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
        echo "<title>";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Star Club - Contact User"), "html", null, true);
        echo "</title>
";
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        // line 6
        echo "<!-- Le styles -->
";
        // line 7
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "9b39d39_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9b39d39_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_bootstrap_1.css");
            // line 13
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "9b39d39_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9b39d39_1") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_bootstrap-responsive_2.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "9b39d39_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9b39d39_2") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_contact_us_3.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "9b39d39_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9b39d39_3") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_style_4.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        } else {
            // asset "9b39d39"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9b39d39") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        }
        unset($context["asset_url"]);
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "<div id=\"panel\" class=\"toppanel\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <h3>Contact Us</h3>
            </div>
        </div>
    </div>
</div>
<section id=\"main\" class=\"clearfix\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <!--  -->
                <div id=\"panel-left\">
                    <form action=\"\" method=\"post\">
                        Please fill out this form, we will contact as you soon as possible.
                        <div class=\"box-input\">
                            <label>Name</label>
                            <input type=\"text\" name=\"name\" id=\"name\" placeholder=\"Aevitas Solution\" />
                        </div>
                        <div class=\"box-input\">
                            <label>Phone Number</label>
                            <input type=\"text\" name=\"name\" id=\"name\" placeholder=\"0912345678\" />
                        </div>
                        <div class=\"box-input\">
                            <label>Email</label>
                            <input type=\"text\" name=\"name\" id=\"name\" placeholder=\"contact@aevitas.cu\" />
                        </div>
                        <div class=\"box-input\">
                            <label>Subject</label>
                            <input type=\"text\" name=\"name\" id=\"name\" placeholder=\"Feadback on Reward\" />
                        </div>
                        <div class=\"box-input\">
                            <label>Content</label>
                            <textarea name=\"name\" id=\"name\" placeholder=\"Feadback on Reward\"></textarea>
                        </div>
                        <div class=\"box-input\">
                            <input type=\"submit\" value=\"Send\" />
                        </div>
                    </form>
                </div>
                <div id=\"panel-right\">
                    <div id=\"map\" style=\"width:490px;height:490px\"></div>
                    <div class=\"store-info\">
                        <li>
                            <div class=\"info-type\">Address</div>
                            <div class=\"info-value\">Thanh Bac Fasion Branch, 3rd floor, COPAC building, 12 Ton Dan street, Ward 13, District 4, Ho Chi Minh City, Viet Nam</div>
                        </li>
                        <li>
                            <div class=\"info-type\">Phone</div>
                            <div class=\"info-value\">+84 3 941 5001 Ext. 105</div>
                        </li>
                        <li>
                            <div class=\"info-type\">Email</div>
                            <div class=\"info-value\">contact.levis@thanhbacgroup.com</div>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type=\"text/javascript\" src=\"http://maps.google.com/maps/api/js?sensor=false&libraries=places\"></script>
";
    }

    // line 82
    public function block_javascript($context, array $blocks = array())
    {
        // line 83
        echo "var myOptions = {
    zoom: 18,
    mapTypeId: google.maps.MapTypeId.ROADMAP};
var newmap = new google.maps.Map(document.getElementById('map'),myOptions);
newmap.setCenter(new google.maps.LatLng(10.7623161,106.70776419999993));
var markerOpts = {
    position: new google.maps.LatLng(10.7623161,106.70776419999993),
    map: newmap,
    animation: google.maps.Animation.DROP,
    draggable: false
};
var urMarker = new google.maps.Marker(markerOpts);
                
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Static:contactUs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 83,  156 => 82,  88 => 17,  85 => 16,  51 => 13,  47 => 7,  44 => 6,  41 => 5,  34 => 3,  31 => 2,);
    }
}
