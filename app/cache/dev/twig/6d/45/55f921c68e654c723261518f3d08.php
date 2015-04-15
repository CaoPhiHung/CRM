<?php

/* AevitasLevisBundle:Static:faqvi.html.twig */
class __TwigTemplate_6d4555f921c68e654c723261518f3d08 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Star Club - FAQ"), "html", null, true);
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
            // asset "5013256_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5013256_0") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_bootstrap_1.css");
            // line 13
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "5013256_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5013256_1") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_bootstrap-responsive_2.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "5013256_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5013256_2") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_faq_3.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
            // asset "5013256_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5013256_3") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us_style_4.css");
            echo "<link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" type=\"text/css\" media=\"screen\" />
";
        } else {
            // asset "5013256"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5013256") : $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/front/cpassets/compress_contact_us.css");
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
        echo "
<!-- Carousel
================================================== -->
<div id=\"panel\" class=\"toppanel\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <h3>FAQ</h3>
            </div>
        </div>
    </div>
</div><!-- /.carousel -->

<!-- Registration Content
================================================== -->
<!-- Wrap of all the registration block. -->
<section id=\"main\" class=\"clearfix\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <div id=\"faq-image\"></div>
                <div id=\"faq-content\">

                    <!-- PROGRAM OVERVIEW -->
                    <div class=\"faq-box\">
                        <div class=\"faq-section\">TỔNG QUAN CHƯƠNG TRÌNH</div>
                        <div class=\"faq-question\">
                            <div class=\"q-left\">STARCLUB LÀ GÌ?</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('1-1', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-1-1\">'Starclub' là chương trình khách hàng thân thiết chỉ dành cho khách hàng của TBF. Thành viên của Starclub sẽ nhận được rất nhiều ưu đãi cũng như <a href=\"http://www.starclubvn.com/reward\" target=\"blank\">những phần quà hấp dẫn.</a></div>

                        <div class=\"faq-question\">
                            <div class=\"q-left\">LÀM SAO ĐỂ THAM GIA?</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('1-2', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-1-2\">Khi mua sắm với hóa đơn trị giá 1,000,000 VND trở lên tại cửa hàng Levi's® gần nhất, bạn sẽ được mời đăng ký làm thành viên Starclub tại cửa hàng. Sau 1 phút bạn sẽ nhận được tin nhắn xác nhận đã trở thành thành viên Starclub, và sau 10 ngày bạn sẽ nhận được thẻ thành viên Starclub. Ngoài ra, bạn cũng có thể đăng ký tại trang chủ của Starclub bằng email hoặc tài khoản Facebook, rồi hoàn tất việc đăng ký tại cửa hàng Levi's® gần nhất theo email hướng dẫn.</div>

                        <div class=\"faq-question\">
                            <div class=\"q-left\">STARCLUB HOẠT ĐỘNG NHƯ THẾ NÀO?</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('1-3', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-1-3\">Bạn sẽ tích lũy được điểm thưởng khi mua sắm tại cửa hàng Levi's® dựa trên giá trị hóa đơn và loại thẻ thành viên của bạn khi đó. Nếu quên Thẻ thành viên, bạn có thể cung cấp số điện thoại di động mà bạn dùng đăng ký Starclub cho nhân viên cửa hàng. Định kỳ bạn sẽ nhận được email và tin nhắn tổng kết số điểm bạn đã tích lũy được để đổi lấy <a href=\"http://www.starclubvn.com/reward\" target=\"blank\">những phần quà hấp dẫn</a> cùng những thông tin ưu đãi chỉ dành riêng cho thành viên Starclub.</div>
                    </div>
                    <!-- POINTS -->
                    <div class=\"faq-box\">
                        <div class=\"faq-section\">ĐIỂM THƯỞNG</div>
                        <div class=\"faq-question\">
                            <div class=\"q-left\">LÀM SAO ĐỂ TÍCH ĐIỂM?</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('2-1', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-1\">Tùy thuộc vào hạng thành viên của bạn, khi mua sắm bạn sẽ tích lũy được điểm thưởng dựa trên giá trị mua hàng của bạn như sau: 
                            Khi tích lũy đủ điểm bạn sẽ tự động được nâng thứ hạng thành viên lên. Ngoài ra bạn cũng có thể điền đầy đủ thông tin của mình trong trang cá nhân, hoặc giói thiệu bạn bè để được thêm điểm thưởng.
                        </div>

                        <div class=\"faq-question\">
                            <div class=\"q-left\">TÔI THEO DÕI ĐIỂM THƯỞNG ĐƯỢC TÍCH LŨY NHƯ THẾ NÀO?</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('2-2', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-2\">Ngay sau khi thanh toán bạn sẽ nhận được tin nhắn thông báo số điểm bạn vừa tích lũy được và số điểm bạn đang có trong tài khoản. Ngoài ra bất cứ khi nào bạn cũng có thể gửi tin nhắn cú pháp [CUPHAP] đến số #### để kiểm tra tài khoản hoặc đăng nhập vào trang chủ www.starclubvn.com.</div>

                        <div class=\"faq-question\">
                            <div class=\"q-left\">ĐIỂM THƯỞNG CÓ HẾT HẠN KHÔNG?</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('2-3', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-3\">Có, điểm thưởng không sử dụng sẽ hết hạn trong vòng 2 năm kể từ ngày tích lũy. Do đó bạn đừng quên đổi điểm lấy quà nhé! Starclub sẽ gửi tin nhắn hoặc email nhắc nhở trước khi điểm thưởng của bạn hết hạn.</div>

                        <div class=\"faq-question\">
                            <div class=\"q-left\">WHAT IS THE VALIDITY OF ACCUMULATED LOYALTY POINTS?</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('2-4', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-4\">answer 3</div>

                        <div class=\"faq-question\">
                            <div class=\"q-left\">TÔI KHÔNG THẤY ĐIỂM THƯỞNG CẬP NHẬT TRONG TÀI KHOẢN CỦA MÌNH?</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('2-5', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-5\">Điểm thưởng của bạn thường sẽ được cập nhật trong vòng 24 giờ sau khi thanh toán, và chậm nhất là 5 ngày. Nếu bạn nghĩ có sai sót xảy ra, vui lòng liên hệ đường dây chăm sóc khách hàng: (+84) 937 200 501.</div>

                        <div class=\"faq-question\">
                            <div class=\"q-left\">ĐIỂM THƯỞNG ĐƯỢC TÍNH NHƯ THẾ NÀO KHI MUA SẢN PHẨM GIẢM GIÁ HOẶC DÙNG PHIẾU QUÀ TẶNG?</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('2-6', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-6\">Khi mua các sản phẩm giảm giá, bạn không được tính điểm dựa trên giá nguyên, mà sẽ dựa trên giá đã giảm. Ví dụ, bạn mua một áo sơ mi đang được giảm giá từ 3,000,000 VND còn 1,500,000 VND, thì số điểm bạn tích được (theo hạng Silver) là 150 điểm (10,000 VND/điểm). Tương tự nếu bạn dùng phiếu quà tặng. Nói ngắn gọn, số điểm thưởng bạn tích lũy sẽ được tính dựa trên số tiền bạn thực trả.</div>

                        <div class=\"faq-question\">
                            <div class=\"q-left\">NẾU TÔI THAY ĐỔI SỐ ĐIỆN THOẠI THÌ SAO?</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('2-7', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-7\">Khi bạn thay đổi số điện thoại, vui lòng liên hệ đường dây chăm sóc khách hàng: (+84) 937 200 501, Starclub sẽ yêu cầu bạn cung cấp thông tin xác thực và cập nhật ngay số mới cho bạn.</div>

                        <div class=\"faq-question\">
                            <div class=\"q-left\">TÔI CÓ ĐƯỢC CHUYỂN ĐIỂM CHO THÀNH VIÊN KHÁC KHÔNG?</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('2-8', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-2-8\">Không, bạn không được chuyển điểm của mình cho thành viên khác.</div>
                    </div>
                    <!-- REWARDS REDEMPTION -->
                    <div class=\"faq-box\">
                        <div class=\"faq-section\">QUY ĐỔI QUÀ TẶNG</div>
                        <div class=\"faq-question\">
                            <div class=\"q-left\">TÔI ĐỔI ĐIỂM LẤY QUÀ NHƯ THẾ NÀO?</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('3-1', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-3-1\">Khi muốn đổi điểm lấy quà, bạn đăng nhập vào trang chủ www.starclubvn.com. Bạn vào phần \"Quà tặng\" và click chọn \"Thêm vào giỏ\" phần quà mình thích rồi click vào hình giỏ hàng góc trên phải để hoàn tất. Sau đó bạn có thể đến cửa hàng để nhận quà hoặc yêu cầu giao đến tận nơi.
                        </div>

                        <div class=\"faq-question\">
                            <div class=\"q-left\">TÔI CÓ THỂ ĐỔI ĐIỂM THƯỞNG LẤY NHỮNG SẢN PHẨM GIẢM GIÁ KO</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('3-3', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-3-3\">Bạn chỉ có thể đổi những phần quà có trong danh sách quà tặng của Starclub</div>

                        <div class=\"faq-question\">
                            <div class=\"q-left\">TÔI SẼ LÀM GÌ NẾU MUỐN DỪNG LÀM THÀNH VIÊN STARCLUB?</div>
                            <div class=\"q-arrow\"><span class=\"arrow-close\" onclick=\"showAnswer('3-4', this)\"></span></div>
                        </div>
                        <div class=\"faq-answer\" id=\"answer-3-4\">Bạn chỉ cần liên hệ đường dây chăm sóc khách hàng (+84) 937 200 501 để được hướng dẫn thêm.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
";
    }

    // line 142
    public function block_javascript($context, array $blocks = array())
    {
        // line 143
        echo "\$(document).ready(function() {
\$('.faq-question').on('click', function() {
\$(this).next().show()
})
});
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Static:faqvi.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1357 => 388,  1348 => 387,  1346 => 386,  1343 => 385,  1327 => 381,  1320 => 380,  1318 => 379,  1315 => 378,  1292 => 374,  1267 => 373,  1265 => 372,  1262 => 371,  1250 => 366,  1245 => 365,  1243 => 364,  1240 => 363,  1231 => 357,  1225 => 355,  1222 => 354,  1217 => 353,  1215 => 352,  1212 => 351,  1205 => 346,  1196 => 344,  1192 => 343,  1189 => 342,  1186 => 341,  1184 => 340,  1181 => 339,  1173 => 335,  1171 => 334,  1168 => 333,  1162 => 329,  1156 => 327,  1153 => 326,  1151 => 325,  1148 => 324,  1139 => 319,  1137 => 318,  1114 => 317,  1111 => 316,  1108 => 315,  1105 => 314,  1102 => 313,  1099 => 312,  1096 => 311,  1094 => 310,  1091 => 309,  1084 => 305,  1080 => 304,  1075 => 303,  1073 => 302,  1070 => 301,  1063 => 296,  1060 => 295,  1052 => 290,  1049 => 289,  1047 => 288,  1044 => 287,  1036 => 282,  1032 => 281,  1028 => 280,  1025 => 279,  1023 => 278,  1020 => 277,  1012 => 273,  1010 => 269,  1008 => 268,  1005 => 267,  1000 => 263,  978 => 258,  975 => 257,  972 => 256,  969 => 255,  966 => 254,  963 => 253,  960 => 252,  957 => 251,  954 => 250,  951 => 249,  948 => 248,  946 => 247,  943 => 246,  935 => 240,  932 => 239,  930 => 238,  927 => 237,  919 => 233,  916 => 232,  914 => 231,  911 => 230,  899 => 226,  896 => 225,  893 => 224,  888 => 222,  885 => 221,  877 => 217,  874 => 216,  861 => 210,  858 => 209,  856 => 208,  853 => 207,  845 => 203,  842 => 202,  840 => 201,  837 => 200,  829 => 196,  826 => 195,  824 => 194,  821 => 193,  813 => 189,  810 => 188,  808 => 187,  805 => 186,  797 => 182,  794 => 181,  789 => 179,  781 => 175,  779 => 174,  776 => 173,  768 => 169,  765 => 168,  763 => 167,  760 => 166,  752 => 162,  749 => 161,  747 => 160,  745 => 159,  742 => 158,  735 => 153,  725 => 152,  720 => 151,  711 => 148,  708 => 147,  706 => 146,  703 => 145,  695 => 139,  692 => 137,  691 => 136,  685 => 134,  679 => 132,  676 => 131,  674 => 130,  671 => 129,  658 => 122,  645 => 119,  639 => 117,  634 => 115,  631 => 114,  610 => 108,  594 => 104,  589 => 102,  553 => 93,  499 => 78,  497 => 77,  489 => 75,  486 => 74,  471 => 72,  459 => 69,  426 => 58,  414 => 52,  403 => 48,  390 => 43,  217 => 77,  212 => 68,  920 => 427,  907 => 419,  887 => 416,  869 => 214,  851 => 414,  841 => 409,  833 => 406,  815 => 391,  792 => 180,  714 => 314,  697 => 300,  650 => 120,  647 => 259,  636 => 116,  632 => 253,  621 => 251,  613 => 109,  600 => 239,  579 => 228,  575 => 227,  569 => 224,  557 => 222,  551 => 92,  543 => 90,  539 => 217,  533 => 214,  525 => 89,  513 => 209,  505 => 80,  501 => 207,  495 => 204,  467 => 198,  463 => 197,  443 => 192,  421 => 184,  363 => 32,  342 => 23,  327 => 143,  306 => 137,  290 => 5,  265 => 120,  250 => 338,  923 => 425,  910 => 417,  890 => 223,  872 => 215,  854 => 412,  844 => 407,  836 => 404,  818 => 389,  795 => 387,  717 => 150,  702 => 300,  698 => 299,  655 => 260,  652 => 259,  641 => 257,  637 => 253,  624 => 251,  620 => 250,  616 => 249,  603 => 239,  590 => 229,  582 => 228,  572 => 98,  554 => 219,  546 => 91,  542 => 217,  522 => 212,  516 => 209,  508 => 81,  490 => 203,  460 => 194,  410 => 176,  366 => 33,  261 => 119,  194 => 245,  693 => 138,  690 => 135,  686 => 245,  588 => 243,  584 => 226,  578 => 227,  570 => 153,  523 => 88,  515 => 135,  511 => 82,  491 => 126,  487 => 203,  483 => 124,  478 => 199,  465 => 118,  456 => 68,  424 => 184,  416 => 90,  328 => 14,  318 => 140,  687 => 337,  662 => 123,  654 => 121,  646 => 257,  638 => 300,  630 => 295,  614 => 285,  606 => 280,  598 => 275,  581 => 225,  574 => 264,  567 => 262,  561 => 223,  558 => 147,  536 => 214,  528 => 213,  520 => 87,  514 => 249,  510 => 248,  502 => 131,  498 => 204,  481 => 202,  464 => 241,  445 => 234,  441 => 233,  383 => 68,  347 => 136,  311 => 148,  302 => 121,  242 => 109,  233 => 301,  406 => 122,  382 => 118,  370 => 160,  274 => 100,  238 => 309,  20 => 1,  571 => 219,  568 => 218,  564 => 223,  408 => 50,  405 => 49,  375 => 186,  359 => 157,  351 => 112,  320 => 159,  316 => 16,  286 => 284,  266 => 363,  262 => 129,  256 => 104,  204 => 86,  161 => 61,  185 => 71,  134 => 35,  378 => 132,  340 => 147,  336 => 123,  330 => 143,  326 => 105,  429 => 230,  422 => 145,  417 => 144,  395 => 8,  388 => 42,  339 => 123,  153 => 69,  506 => 132,  455 => 278,  449 => 193,  434 => 264,  385 => 41,  376 => 27,  372 => 226,  334 => 18,  225 => 295,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 290,  617 => 250,  615 => 110,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 274,  592 => 103,  587 => 229,  585 => 347,  540 => 305,  537 => 304,  534 => 140,  519 => 212,  494 => 244,  482 => 265,  476 => 263,  473 => 262,  452 => 193,  433 => 60,  411 => 226,  380 => 165,  367 => 160,  344 => 24,  338 => 25,  335 => 21,  331 => 186,  297 => 101,  181 => 229,  332 => 20,  323 => 154,  319 => 153,  315 => 140,  308 => 147,  292 => 144,  288 => 4,  281 => 385,  277 => 101,  254 => 124,  197 => 246,  118 => 39,  100 => 29,  504 => 207,  500 => 341,  496 => 128,  492 => 76,  488 => 243,  484 => 202,  479 => 335,  475 => 199,  470 => 198,  466 => 197,  431 => 186,  396 => 238,  394 => 120,  391 => 168,  377 => 37,  354 => 245,  345 => 149,  343 => 124,  310 => 178,  293 => 6,  284 => 124,  257 => 118,  205 => 87,  178 => 67,  462 => 274,  458 => 252,  454 => 272,  450 => 64,  446 => 192,  442 => 62,  436 => 188,  432 => 100,  419 => 147,  386 => 208,  307 => 209,  304 => 103,  289 => 93,  280 => 137,  276 => 378,  249 => 83,  232 => 82,  198 => 84,  174 => 78,  200 => 82,  186 => 77,  152 => 188,  110 => 34,  76 => 24,  260 => 360,  248 => 333,  245 => 332,  240 => 323,  237 => 104,  228 => 101,  221 => 70,  213 => 94,  180 => 50,  401 => 173,  364 => 115,  361 => 174,  353 => 139,  349 => 243,  346 => 125,  333 => 147,  329 => 85,  325 => 141,  321 => 187,  303 => 296,  299 => 8,  295 => 117,  291 => 126,  287 => 130,  279 => 128,  275 => 70,  271 => 371,  267 => 116,  251 => 115,  243 => 324,  239 => 187,  231 => 101,  227 => 298,  223 => 100,  219 => 143,  215 => 69,  211 => 75,  207 => 74,  195 => 50,  191 => 243,  179 => 221,  175 => 64,  167 => 57,  159 => 83,  155 => 43,  129 => 145,  124 => 42,  104 => 87,  563 => 210,  560 => 96,  556 => 205,  428 => 59,  420 => 171,  415 => 126,  412 => 164,  404 => 161,  400 => 47,  397 => 203,  392 => 209,  389 => 200,  371 => 35,  369 => 256,  358 => 114,  356 => 157,  350 => 26,  348 => 161,  317 => 82,  313 => 105,  301 => 102,  296 => 127,  273 => 125,  270 => 99,  263 => 362,  259 => 192,  253 => 339,  234 => 78,  216 => 142,  192 => 80,  188 => 53,  170 => 76,  63 => 21,  53 => 17,  58 => 13,  23 => 3,  34 => 3,  146 => 42,  148 => 59,  137 => 55,  127 => 47,  113 => 37,  102 => 29,  90 => 27,  81 => 26,  59 => 20,  255 => 350,  244 => 84,  236 => 179,  230 => 300,  226 => 99,  222 => 294,  218 => 61,  210 => 267,  206 => 84,  202 => 263,  190 => 49,  184 => 230,  172 => 76,  150 => 56,  77 => 24,  97 => 28,  65 => 21,  480 => 162,  474 => 161,  469 => 71,  461 => 70,  457 => 194,  453 => 236,  444 => 177,  440 => 105,  437 => 61,  435 => 146,  430 => 187,  427 => 263,  423 => 57,  413 => 134,  409 => 241,  407 => 176,  402 => 130,  398 => 173,  393 => 126,  387 => 167,  384 => 167,  381 => 133,  379 => 262,  374 => 36,  368 => 34,  365 => 111,  362 => 186,  360 => 249,  355 => 27,  341 => 105,  337 => 22,  322 => 141,  314 => 99,  312 => 134,  309 => 104,  305 => 316,  298 => 97,  294 => 90,  285 => 3,  283 => 129,  278 => 384,  268 => 370,  264 => 84,  258 => 351,  252 => 121,  247 => 189,  241 => 82,  235 => 105,  229 => 218,  224 => 109,  220 => 287,  214 => 76,  208 => 87,  169 => 61,  143 => 41,  140 => 49,  132 => 44,  128 => 43,  119 => 43,  107 => 50,  71 => 26,  177 => 49,  165 => 62,  160 => 52,  135 => 59,  126 => 47,  114 => 31,  84 => 41,  70 => 21,  67 => 22,  61 => 25,  94 => 42,  89 => 35,  85 => 16,  75 => 27,  68 => 22,  56 => 12,  201 => 85,  196 => 81,  183 => 66,  171 => 213,  166 => 47,  163 => 73,  158 => 44,  156 => 82,  151 => 57,  142 => 54,  138 => 55,  136 => 52,  121 => 39,  117 => 49,  105 => 32,  91 => 27,  62 => 14,  49 => 10,  87 => 28,  21 => 2,  38 => 5,  28 => 3,  24 => 3,  25 => 3,  31 => 2,  26 => 2,  19 => 1,  93 => 29,  88 => 17,  78 => 27,  46 => 7,  44 => 6,  27 => 4,  79 => 28,  72 => 18,  69 => 27,  47 => 7,  40 => 5,  37 => 8,  22 => 2,  246 => 106,  157 => 60,  145 => 72,  139 => 53,  131 => 34,  123 => 36,  120 => 39,  115 => 48,  111 => 107,  108 => 30,  101 => 86,  98 => 28,  96 => 23,  83 => 27,  74 => 26,  66 => 20,  55 => 19,  52 => 15,  50 => 10,  43 => 6,  41 => 5,  35 => 5,  32 => 4,  29 => 3,  209 => 87,  203 => 83,  199 => 262,  193 => 82,  189 => 72,  187 => 199,  182 => 80,  176 => 220,  173 => 67,  168 => 82,  164 => 200,  162 => 71,  154 => 45,  149 => 43,  147 => 54,  144 => 57,  141 => 61,  133 => 44,  130 => 41,  125 => 53,  122 => 33,  116 => 113,  112 => 47,  109 => 36,  106 => 30,  103 => 44,  99 => 68,  95 => 28,  92 => 30,  86 => 46,  82 => 32,  80 => 24,  73 => 29,  64 => 26,  60 => 19,  57 => 29,  54 => 15,  51 => 13,  48 => 12,  45 => 6,  42 => 6,  39 => 5,  36 => 6,  33 => 5,  30 => 4,);
    }
}
