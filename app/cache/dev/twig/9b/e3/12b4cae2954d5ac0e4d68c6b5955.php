<?php

/* AevitasLevisBundle:Static:aboutUs.vi.html.twig */
class __TwigTemplate_9be312b4cae2954d5ac0e4d68c6b5955 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Star Club - Store Location"), "html", null, true);
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
            // asset "7c474a5_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7c474a5_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_store_bootstrap_1.css");
            // line 13
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "7c474a5_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7c474a5_1") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_store_bootstrap-responsive_2.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "7c474a5_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7c474a5_2") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_store_style_3.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "7c474a5_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7c474a5_3") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_store_store_location_4.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        } else {
            // asset "7c474a5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7c474a5") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_store.css");
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
        echo "<!-- Carousel
================================================== -->
<div id=\"panel\" class=\"toppanel\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <h3>Giới thiệu về & Starclub</h3>
            </div>
        </div>
    </div>
</div><!-- /.carousel -->
<section id=\"main\" class=\"clearfix\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <!--  -->
                <div id=\"panel-left\">
                    <div class=\"text-title\">
                        <span>
                            <img src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/about_side.jpg"), "html", null, true);
        echo "\" alt=\"Brand\"/>
                        </span>
                    </div>
                </div>
                <div id=\"panel-right\">
                    <div><h2>Giới thiệu về TBF</h2>
                        <p>Thanh Bắc Fashion (TBF), một công ty không ngừng nâng cao vị thế của mình trong thế giới bán lẻ từ 50 năm qua bằng cách mang đến cho khách hàng sự sang trọng,  đẳng cấp quốc tế, khát vọng, thương hiệu và lối sống trong ngành công nghiệp thời trang của Việt Nam. Trong hơn một nửa thế kỷqua, đã có những đóng góp đáng kể cho ngành bán lẻ Việt Nam với danh mục sản phẩm đa dạng. Chúng tôi hứa sẽ cung cấp các thương hiệu và sản phẩm mang tính biểu tượng cho khách hàng với độ tin cậy tuyệt vời, dịch vụ và trải nghiệm mua sắm.</p>
                        <img src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/tbfbanner.jpg"), "html", null, true);
        echo "\" alt=\"store banner\"/>
                    </div>
                    <div><h2>Giới thiệu về Star Club</h2>
                        <p>Star Club là một chương trình được thiết kế dành riêng cho khách hàng than thiết của TBF, những người đang sở hữu những thương hiệu quốc tế của chúng tôi như một phần cho lối sống của họ. Các thành viên tham gia chương trình sẽ có được những quyền hạn đặc biệt cùng những phần thưởng có giá trị.</p>
                        <img src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/abtbanner.jpg"), "html", null, true);
        echo "\" alt=\"customer\"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
";
    }

    // line 55
    public function block_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Static:aboutUs.vi.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 55,  126 => 47,  119 => 43,  109 => 36,  88 => 17,  85 => 16,  51 => 13,  47 => 7,  44 => 6,  41 => 5,  34 => 3,  31 => 2,);
    }
}
