<?php

/* AevitasLevisBundle:Static:storeLocation.html.twig */
class __TwigTemplate_820c6b9d88f4e34e8487ddea5110af9e extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo "    <!-- Carousel
    ================================================== -->
    <div id=\"panel\" class=\"toppanel\">
\t\t<div class=\"shadow_wrapper\">
\t\t\t<div>
\t\t\t<div class=\"content\">
\t\t\t\t<h3>Store Locations</h3>
\t\t\t</div>
\t\t\t</div>
\t\t</div>
    </div><!-- /.carousel -->
    <section id=\"main\" class=\"clearfix\">
\t<div class=\"shadow_wrapper\">
\t\t<div>
\t\t<div class=\"content\">
          \t<!--  -->
          \t<div id=\"panel-left\">
          \t\t<div class=\"text-title\"><span>City</span></div>
\t\t\t\t<li class=\"menu-active\">TP. HỒ CHÍ MINH</a></li>
\t\t\t\t<li>HÀ NỘI</li>
\t\t\t\t<li>ĐÀ NẴNG</li>
\t\t\t\t<li>HẢI PHÒNG</li>
\t\t\t\t<li>NHA TRANG</li>
\t\t\t\t<li>VŨNG TÀU</li>
\t\t\t\t<li>BIÊN HOÀ</li>
\t\t\t\t<li>BÌNH DƯƠNG</li>
\t\t\t\t<li>HUẾ</li>
          \t</div>
\t\t\t<div id=\"panel-right\">
\t\t\t\t<div class=\"item\">Store</div>
\t\t\t\t<div class=\"item\">Store</div>
\t\t\t\t<div class=\"item\">Store</div>
\t\t\t\t<div class=\"item\">Store</div>
\t\t\t</div>
\t\t</div>
\t\t</div>
\t</div>
    </section>
";
    }

    // line 56
    public function block_javascript($context, array $blocks = array())
    {
        // line 57
        echo "
\t Branches = new Array();
\t //HỒ CHÍ MINH
\t Branches[0] = new Array();
\t Branches[0][0] = {img:\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® PREMIUM STORE\", address:\"47 B-C Nguyễn Trãi, Q1\", phne:\"083.9260.686\"};
\t Branches[0][1] = {img:\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® VINCOM B HCM\", address:\"B1, TTTM Vincom 70-72 Lê Thánh Tôn, Q.1\", phne:\"083.9939.501\"};
\t Branches[0][2] = {img:\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® BA THÁNG HAI\", address:\"181B 3 Tháng 2, Q10\", phne:\"083.8333.904\"};
\t Branches[0][3] = {img:\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® DIAMOND PLAZA\", address:\"Tầng 1, TTTM Diamond, 34 Lê Duẫn, Q1\", phne:\"083.8247.120\"};
\t Branches[0][4] = {img:\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® PARKSON SAIGONTOURIST\", address:\"Tầng 1,TTTM Parkson 35BIS - 45 Lê Thánh Tôn, Q1\", phne:\"083.8223.281\"};
\t Branches[0][5] = {img:\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® ZEN PLAZA\", address:\"Tầng 2, Zen Plaza, 56 Nguyễn Trãi, Q.1\", phne:\"083.9255.352\"};
\t Branches[0][6] = {img:\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® NOWZONE\", address:\"Tầng trệt, TTTM Nowzone, 235 Nguyễn Văn Cừ, Q1\", phne:\"083.9381.187\"};
\t Branches[0][7] = {img:\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® PARKSON HÙNG VƯƠNG\", address:\"Tầng 1, TTTM Parkson 126 Hùng Vương, Q5\", phne:\"08.2222.0273\"};
\t Branches[0][8] = {img:\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® PARKSON CT PLAZA\", address:\"Tầng 2, Parkson CT, 60A Trường Sơn, Quận Tân Bình\", phne:\"08.6297.1768\"};
\t Branches[0][9] = {img:\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® MAXIMARK CỘNG HÒA\", address:\"Tầng 1, TTTM Maximark, 15-17 Cộng Hoà, Quận Tân Bình.\", phne:\"083.8119.604\"};
\t Branches[0][10] = {img:\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® BIG C HOÀNG VĂN THỤ\", address:\"Tầng trệt, BigC Hoàng Văn Thụ - 202B Hoàng Văn Thụ, Quận Phú Nhuận\", phne:\"083.9979.816\"};
\t Branches[0][11] = {img:\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® PARKSON FLEMINGTON\", address:\"Tầng 1, TTTM Parkson Flemington, 184 Lê Đại Hành, Q11\", phne:\"083.9651.326\"};
\t Branches[0][12] = {img:\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® PARKSON PARAGON\", address:\"Tầng 2, Parkson Paragon, 03 Nguyễn Lương Bằng, Q7\", phne:\"08.66846.222\"};
\t Branches[0][13] = {img:\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® LOTTE MART\", address:\"Tầng 1, Siêu thị Lotte, 469 Nguyễn Hữu Thọ, Tân Hưng, Q.7\", phne:\"083.7753.958\"};
\t Branches[0][14] = {img:\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® PANDORA CITY\", address:\"Tầng trệt, Big C Pandora City, số 1 Trường Chinh, Q.12\", phne:\"null\"};
\t //HÀ NỘI:
\t Branches[1] = new Array();
\t Branches[1][0] = {img:\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® VINCOM HN\", address:\"Tầng 2, TTTM Vincom, 191 Bà Triệu\", phne:\"04-22200591\"};
\t Branches[1][1] = {img:\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® HÀNG BÔNG\", address:\"105 Hàng Bông, Hoàn Kiếm\", phne:\"043.8286.848\"};
\t Branches[1][2] = {img:\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® GARDEN MALL\", address:\"Tầng G, TTTM Garden Mall, Mễ Trì, Từ Liêm\", phne:\"043.7877.214\"};
\t Branches[1][3] = {img:\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® INDOCHINA PLAZA\", address:\"239 Xuân Thủy, Cầu Giấy\", phne:\"043.7954.060\"};
\t Branches[1][4] = {img:\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® PARKSON HN\", address:\"Tầng 4, TTTM Parkson HN, 198 Thái Hà\", phne:\"043.8575.038\"};
\t Branches[1][5] = {img:\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® BIG C THĂNG LONG\", address:\"Tầng G, TTTM Big C, 220-222 Trần Duy Hưng, Cầu Giấy\", phne:\"043.7833.170\"};
\t //ĐÀ NẴNG
\t Branches[2] = new Array();
\t Branches[2][0] = {img:\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® BIG C ĐÀ NẴNG\", address:\"Tầng 1 Big C, 255-257 Hùng Vương, Thanh Khê\", phne:\"0511.3666.469\"};
\t Branches[2][1] = {img:\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® LOTTE ĐÀ NẴNG\", address:\"Tầng 2, Lotte Đà Nẵng, Phường Hòa Cường Bắc, Quận Hải Châu\", phne:\"0511.3624.140\"};
\t //HẢI PHÒNG
\t Branches[3] = new Array();
\t Branches[3][0] = {img:\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® PARKSON HẢI PHÒNG\", address:\"Tầng 1, TTTM Parkson, Thùy Dương Plaza, Ngô Quyền\", phne:\"0313.852.515\"};
\t //NHA TRANG
\t Branches[4] = new Array();
\t Branches[4][0] = {img:\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® TTTM HOÀN CẦU\", address:\"20 Trần Phú, Phường Lộc Thọ, TP Nha Trang\", phne:\"058.625.0253\"};
\t //VŨNG TÀU
\t Branches[5] = new Array();
\t Branches[5][0] = {img:\"";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® VŨNG TÀU\", address:\"159 - 163 Thuỳ Vân, Phường Thắng Tam, TP.Vũng Tàu\", phne:\"064.352.1314\"};
\t //BIÊN HÒA
\t Branches[6] = new Array();
\t Branches[6][0] = {img:\"";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® BIG C ĐỒNG NAI\", address:\"Big C Đồng Nai - Khu 1 Phường Long Bình Tân, Biên Hòa\", phne:\"061.882.6639\"};
\t //BÌNH DƯƠNG
\t Branches[7] = new Array();
\t Branches[7][0] = {img:\"";
        // line 102
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® BÌNH DƯƠNG\", address:\"230 Đại lộ Bình Dương, Phú Hoà,Thủ Dầu Một\", phne:\"0650.222.1207\"};
\t //HUẾ
\t Branches[8] = new Array();
\t Branches[8][0] = {img:\"";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/branch.jpg"), "html", null, true);
        echo "\", name:\"LEVI’S® BIG C HUẾ\", address:\"Bà Triệu - Hùng Vương, Phường Phú Hội\", phne:\"054.389.8901\"};
\t 
\t function showBranchesByCity(i, obj){
\t\t if (typeof(obj) != 'undefined'){
\t\t\t \$('#panel-left li').removeClass('menu-active');
\t\t\t \$(obj).addClass('menu-active');
\t\t }
\t\t var cts = '';
\t\t for (j in Branches[i]){
\t\t\t Brand = Branches[i][j];
\t\t\t if (j%2==0){
\t\t\t \tcts += '<div class=\"item item-left\">';
\t\t\t }else{
\t\t\t \tcts += '<div class=\"item item-right\">';
\t\t\t }
\t\t\t cts += '<div class=\"branch-name\">'+Brand.name+'</div>'
\t\t\t cts += '<div class=\"branch-image\"><img src=\"'+Brand.img+'\" width=\"265\"/></div>';
\t\t\t cts += '<div class=\"box-left\">Address</div> <div class=\"box-right\">'+Brand.address+'</div>';
\t\t\t cts += '<div class=\"box-left\">Phone</div> <div class=\"box-right\">'+Brand.phne+'</div>';
\t\t\t cts += '</div>';
\t\t }
\t\t \$('#panel-right').html(cts);
\t\t j++;//console.log(j);
\t\t var hmain = Math.ceil(j/2)*300;
\t\t if (hmain < 500){
\t\t\t hmain = 500;
\t\t }
\t\t \$('#main .content').css({'height':hmain});
\t\t \$('#panel-right').css({'height':hmain});
\t }
\t \$('#panel-left li').on('click',function(i, obj){
            index = \$('#panel-left li').index(this);
            showBranchesByCity(index,this)
         })
\t showBranchesByCity(0);
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Static:storeLocation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  267 => 105,  261 => 102,  255 => 99,  249 => 96,  243 => 93,  237 => 90,  231 => 87,  227 => 86,  221 => 83,  217 => 82,  213 => 81,  209 => 80,  205 => 79,  201 => 78,  195 => 75,  191 => 74,  187 => 73,  183 => 72,  179 => 71,  175 => 70,  171 => 69,  167 => 68,  163 => 67,  159 => 66,  155 => 65,  151 => 64,  147 => 63,  143 => 62,  139 => 61,  133 => 57,  130 => 56,  88 => 17,  85 => 16,  51 => 13,  47 => 7,  44 => 6,  41 => 5,  34 => 3,  31 => 2,);
    }
}
