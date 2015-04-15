<?php

/* VietlandAevitasBundle:Command:AnniversaryMail.html.twig */
class __TwigTemplate_af4a7d9298b65a7ff7b4336f57fb8efd extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo "<html lang=\"en\">
    <head>
        <title>Happy birthday</title>
        <meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\">
    </head>
    <body>
        <div style=\"line-height:24px;padding:330px 10px 100px 530px;font-size:18px;color:#c00;margin:auto;width:400px;height:520px;background: url('";
        // line 7
        echo twig_escape_filter($this->env, ((isset($context["cdn"]) ? $context["cdn"] : $this->getContext($context, "cdn")) . "/bundles/vietlandaevitas/images/happy_anniversary-01.jpg"), "html", null, true);
        echo "') no-repeat\" >
            &nbsp;&nbsp;&nbsp;&nbsp;Công ty Thanh Bắc Thời Trang (TBF) xin kính chúc quý khách có một ngày kỷ niệm thật ấm áp và vui vẻ bên người thân và gia đình. Kính chúc quý khách từ giây phút này sẽ có thật nhiều niềm vui, sức khỏe cùng thành công trong cuộc sống và công việc. 
            &nbsp;&nbsp;&nbsp;&nbsp;TBF chân thành cảm ơn sự ủng hộ của quý khách hàng trong suốt thời gian qua, TBF luôn phấn đấu để đáp ứng hơn nữa sự mong mỏi và kỳ vọng của quý khách.
            ";
        // line 10
        if ((twig_length_filter($this->env, (isset($context["content"]) ? $context["content"] : $this->getContext($context, "content"))) > 0)) {
            // line 11
            echo "                <br/>&nbsp;&nbsp;&nbsp;&nbsp;Nhân dịp đặc biệt này, quý khách khi mua sắm trong suốt tháng kỷ niệm của mình tại bất kỳ cửa hàng nào của Levi’s trực thuộc TBF sẽ được tích lũy mức điểm ưu đãi theo những hạng thẻ cụ thể sau:
                <br/><table width=\"100%\">
                    <tr>
                        <th>Store</th>
                        <th>Level</th>
                        <th>Operation</th>
                        <th>Multiply by quantity</th>
                    </tr>
                    ";
            // line 19
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["content"]) ? $context["content"] : $this->getContext($context, "content")));
            foreach ($context['_seq'] as $context["_key"] => $context["cts"]) {
                // line 20
                echo "                        <tr>
                            <td>";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cts"]) ? $context["cts"] : $this->getContext($context, "cts")), "store", array(), "array"), "html", null, true);
                echo "</td>
                            <td>";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cts"]) ? $context["cts"] : $this->getContext($context, "cts")), "level", array(), "array"), "html", null, true);
                echo "</td>
                            <td>";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cts"]) ? $context["cts"] : $this->getContext($context, "cts")), "operation", array(), "array"), "html", null, true);
                echo "</td>
                            <td align=\"center\">";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cts"]) ? $context["cts"] : $this->getContext($context, "cts")), "qty", array(), "array"), "html", null, true);
                echo "</td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cts'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "                </table>
            ";
        }
        // line 29
        echo "            <br/><br/>Kính chúc quý khách có những trải nghiệm mua sắm vui vẻ và thú vị cùng TBF.
        </div>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "VietlandAevitasBundle:Command:AnniversaryMail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 9,  389 => 8,  371 => 206,  369 => 180,  358 => 171,  356 => 168,  350 => 164,  348 => 161,  317 => 133,  313 => 132,  301 => 129,  296 => 127,  273 => 110,  270 => 109,  263 => 105,  259 => 104,  253 => 101,  234 => 84,  216 => 78,  192 => 71,  188 => 67,  170 => 63,  63 => 24,  53 => 13,  58 => 10,  23 => 3,  34 => 5,  146 => 51,  148 => 53,  137 => 48,  127 => 44,  113 => 49,  102 => 34,  90 => 31,  81 => 21,  59 => 15,  255 => 76,  244 => 7,  236 => 122,  230 => 119,  226 => 118,  222 => 117,  218 => 116,  210 => 75,  206 => 73,  202 => 112,  190 => 106,  184 => 65,  172 => 97,  150 => 84,  77 => 29,  97 => 36,  65 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 181,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 212,  379 => 209,  374 => 207,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 131,  305 => 130,  298 => 91,  294 => 90,  285 => 118,  283 => 117,  278 => 86,  268 => 107,  264 => 84,  258 => 81,  252 => 75,  247 => 8,  241 => 77,  235 => 74,  229 => 73,  224 => 71,  220 => 82,  214 => 115,  208 => 68,  169 => 60,  143 => 51,  140 => 48,  132 => 46,  128 => 66,  119 => 42,  107 => 48,  71 => 25,  177 => 65,  165 => 59,  160 => 61,  135 => 46,  126 => 43,  114 => 37,  84 => 22,  70 => 29,  67 => 18,  61 => 15,  94 => 36,  89 => 39,  85 => 25,  75 => 26,  68 => 16,  56 => 22,  201 => 92,  196 => 109,  183 => 70,  171 => 61,  166 => 71,  163 => 91,  158 => 67,  156 => 58,  151 => 57,  142 => 78,  138 => 43,  136 => 56,  121 => 55,  117 => 40,  105 => 40,  91 => 31,  62 => 17,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 3,  25 => 1,  31 => 4,  26 => 3,  19 => 1,  93 => 26,  88 => 31,  78 => 21,  46 => 7,  44 => 9,  27 => 7,  79 => 27,  72 => 20,  69 => 19,  47 => 19,  40 => 8,  37 => 10,  22 => 2,  246 => 32,  157 => 88,  145 => 46,  139 => 50,  131 => 45,  123 => 46,  120 => 39,  115 => 43,  111 => 37,  108 => 37,  101 => 45,  98 => 33,  96 => 31,  83 => 28,  74 => 21,  66 => 19,  55 => 14,  52 => 21,  50 => 10,  43 => 8,  41 => 18,  35 => 11,  32 => 3,  29 => 4,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 98,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 53,  144 => 53,  141 => 50,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 36,  112 => 42,  109 => 41,  106 => 45,  103 => 37,  99 => 38,  95 => 34,  92 => 33,  86 => 27,  82 => 28,  80 => 19,  73 => 27,  64 => 24,  60 => 23,  57 => 14,  54 => 18,  51 => 23,  48 => 10,  45 => 19,  42 => 8,  39 => 6,  36 => 7,  33 => 10,  30 => 4,);
    }
}
