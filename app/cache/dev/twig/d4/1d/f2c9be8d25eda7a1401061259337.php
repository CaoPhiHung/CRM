<?php

/* :mail:signup.vi.html.twig */
class __TwigTemplate_d41df2c9be8d25eda7a1401061259337 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        ob_start();
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
        <title>Welcome to TBF star Club</title>
        <style type=\"text/css\">
                body,td,th {
                    font-size: 14px;
                    color: #999;
                    font-family: Helvetica;
                    font-weight: lighter;
                }
                h1 {
                    font-size: 16px;
                    color: #999;
                }
                h2 {
                    font-size: 12px;
                    color: #999;
                }
                h1,h2,h3,h4,h5,h6 {
                    font-family: Helvetica;
                    font-size: 14px;
                }
                h3 {
                    font-size: 36px;
                    color: #FF0;
                }
                .h1 {\t\t\t/*@editable*/
                    color:#C00;
                    display:block;
                    /*@editable*/font-family:Helvetica;
                    /*@editable*/font-size:60px;
                    /*@editable*/letter-spacing:-5px;
                    /*@editable*/line-height:normal;
                    margin-top:0;
                    margin-right:0;
                    margin-bottom:0px;
                    margin-left:0;
                    /*@editable*/text-align:left;
                }
                body {
                    background-color: #FFF;
                }
            </style>
        </head>

        <body>
            <table width=\"600\" border=\"0\" align=\"center\">
                <tr>
                    <td><div align=\"right\" style=\"font-size:10px\"><a href=\"#\">Hiển thị toàn bộ nội dung</a></div></td>
                </tr>
                <tr>
                    <td><img src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/line.jpg"), "html", null, true);
        echo "\" width=\"600\" height=\"2\" alt=\"line\" /></td>
                </tr>
                <tr>
                    <td><div align=\"center\">
                            <img src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/TBFstarclub-B.png"), "html", null, true);
        echo "\" width=\"153\" height=\"45\" alt=\"logo\" />
                        </div></td>
                </tr>
                <tr>
                    <td height=\"7\"><img src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/line.jpg"), "html", null, true);
        echo "\" width=\"600\" height=\"1\" alt=\"line\" /></td>
                </tr>
                <tr>
                    <td><img src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/LEVI-LOOK.jpg"), "html", null, true);
        echo "\" width=\"600\" height=\"293\" /></td>
                </tr>
                <tr valign=\"middle\">
                    <td height=\"50\"><table width=\"600\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                            <tr>
                                <td width=\"20\">&nbsp;</td>
                                <td width=\"590\"><h2 align=\"center\" class=\"h1\">TBF Starclub xin chào!</h2></td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td><table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                            <tr>
                                <td width=\"20\">&nbsp;</td>
                                <td><h2><strong>Chào bạn ";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getName"), "html", null, true);
        echo ",<br />
                                            Cảm ơn bạn đã tham gia mua sắm và trở thành thành viên của TBF Starclub.</strong></h2></td>
                                <td width=\"20\">&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td><table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                            <tr>
                                <td width=\"20\"><p>Chúc bạn có những trải nghiệm mua sắm thật thú vị với TBF Starclub.</p>
              <p><img src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/sig.png"), "html", null, true);
        echo "\" width=\"173\" height=\"58\" /></p>
              <p><strong>Chủ tịch, Tanwani</strong></p><hr /></td>
                                <td width=\"486\">Bạn có thể vào website <a href=\"www.tbfstarclub.com\">www.tbfstarclub.com</a> để hoàn thành quán trình đăng ký bằng CODE: <strong>";
        // line 91
        echo twig_escape_filter($this->env, (isset($context["code"]) ? $context["code"] : $this->getContext($context, "code")), "html", null, true);
        echo "</strong><br/><br />
                                    Sau đó cập nhật thông tin trong tài khoản để tích luỹ điểm thưởng từ chương trình của chúng tôi.
                                </td>
                                <td width=\"20\">&nbsp;</td>
                            </tr>
                            <!-- <tr>
                               <td colspan=\"3\"><img src=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/step.png"), "html", null, true);
        echo "\" width=\"600\" height=\"69\" alt=\"step1\" />
                       </td>
                               </tr> -->
                            <tr>
                                <td colspan=\"3\"><table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                        <tr>
                                            <td width=\"20\">&nbsp;</td>
                                            <td height=\"30\">Ngoài ra, bạn có thể muốn <strong>lấy thêm điểm</strong> bằng cách</td>
                                            <td width=\"20\">&nbsp;</td>
                                        </tr>
                                    </table></td>
                            </tr>
                            <tr>
                                <td colspan=\"3\"><table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                        <tr>
                                            <td><img src=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/get-more-points-RED-VN.png"), "html", null, true);
        echo "\" width=\"300\" height=\"141\" alt=\"gmpoints\" /></td>
                                            <td> <img src=\"";
        // line 113
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/get-more-points-2-RED-VN.png"), "html", null, true);
        echo "\" width=\"300\" height=\"141\" alt=\"gmpoints2\" /></td>
                                        </tr>
                                    </table></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td height=\"30\"><strong>Để đổi lấy những phần quà rất hấp dẫn.</strong></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td height=\"30\" colspan=\"3\"><img src=\"";
        // line 123
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/Gold_Gift.JPG"), "html", null, true);
        echo "\" width=\"600\" height=\"250\" alt=\"gift\" /></td>
                            </tr>
                            <tr>
                                <td height=\"30\" colspan=\"3\"><table width=\"600\" border=\"0\" cellspacing=\"0\">
                                        <tr>
                                            <td width=\"20\" height=\"50\">&nbsp;</td>
                                            <td height=\"50\">Nếu bạn có thắc mắc hay yêu cầu giúp đỡ, hãy liên hệ với chúng tôi qua email contact@tbfstarclub.com hoặc số (+84) 937.200.501</td>
                                            <td width=\"20\" height=\"50\">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td height=\"20\">&nbsp;</td>
                                            <td height=\"20\"><a href=\"\"><img src=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/facebook.png"), "html", null, true);
        echo "\" width=\"28\" height=\"28\" alt=\"face\" /> Follow us on Facebook</a>
                                                <br />
                                            </td>
                                            <td height=\"20\">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <hr />
                                        </tr>
                                        <tr>
                                            <td height=\"50\">&nbsp;</td>
                                            <td height=\"50\" style=\"font-size: 11px; line-height:15px\"><p><strong>CÁC CỬA HÀNG LEVI'S® TẠI VIETNAM:</strong><br />
                                                    <br />
                                                    <strong>Hồ Chí Minh: </strong>Levi's® 47 B-C Nguyễn Trãi | 181B 3 Tháng 2 | Vincom | Parkson Lê Thánh Tôn | Diamond | Parkson  Hùng Vương |  Parkson Flemington Plaza | Parkson CT Plaza | Parkson  Paragon | Maxi Cộng Hoà | Nowzone | Zen Plaza | Lotte Mart | BigC Hoàng  Văn Thụ | BigC Pandora<br />
                                                    <br />
                                                    <strong>Hà Nội:</strong>Levi's®  Vincom Bà Triệu | 105 Hàng Bông | Parkson HN | Garden Mall | 79 Tran  Hung Dao | Indochina Plaza 239 Xuân Thủy | BigC Cầu Giấy<br /><br />

                                                    <strong>Hải Phòng: </strong>Levi's® Parkson Thùy Dương Plaza<br />  
                                                    <strong>Nha Trang:</strong>Levi's®  20 Trần Phú<br />
                                                    <strong>Đà Nẵng: </strong>Levi's® BigC Đà Nẵng - 255-257 Hùng Vương<br />
                                                    <strong>Bình Dương: </strong>Levi's® 230 Đại lộ Bình Dương, Phú Hoà,Thủ Dầu Một<br />
                                                    <strong>Vũng Tàu: </strong>Levi's® 159 - 163 Thuỳ Vân, Phường Thắng Tam<br />
                                                    <strong>Đồng Nai: </strong>Levi's® BigC Đồng Nai - Khu 1 Phường Long Bình Tân, Biên Hòa<br />  
                                                    <strong>Huế: </strong>Levi's® Big C Huế - Hùng Vương, Phường Phú Hội<br /><br />

                                                    <a data-cke-saved-href=\"*|UNSUB|*\" href=\"https://us7.admin.mailchimp.com/campaigns/wizard/*%7CUNSUB%7C*\">dừng nhận email</a>    <a data-cke-saved-href=\"*|UPDATE_PROFILE|*\" href=\"https://us7.admin.mailchimp.com/campaigns/wizard/*%7CUPDATE_PROFILE%7C*\">chỉnh sửa tùy chọn</a> <br />
                                                </p></td>
                                            <td height=\"50\">&nbsp;</td>
                                        </tr>
                                    </table></td>
                            </tr>
                            <tr>
                                <td height=\"30\" colspan=\"3\"><img src=\"";
        // line 165
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/logo-brand.png"), "html", null, true);
        echo "\" width=\"599\" height=\"90\" /></td>
                            </tr>
                        </table></td>
                </tr>
            </table>
        </body>
    </html>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return ":mail:signup.vi.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  806 => 488,  803 => 487,  788 => 484,  784 => 482,  771 => 481,  723 => 473,  694 => 468,  682 => 465,  678 => 464,  675 => 463,  673 => 462,  618 => 451,  565 => 414,  547 => 411,  530 => 410,  527 => 409,  357 => 123,  439 => 195,  373 => 156,  300 => 105,  282 => 96,  576 => 197,  425 => 145,  269 => 107,  656 => 461,  649 => 301,  629 => 287,  518 => 185,  503 => 176,  472 => 163,  324 => 113,  272 => 87,  1357 => 388,  1348 => 387,  1346 => 386,  1343 => 385,  1327 => 381,  1320 => 380,  1318 => 379,  1315 => 378,  1292 => 374,  1267 => 373,  1265 => 372,  1262 => 371,  1250 => 366,  1245 => 365,  1243 => 364,  1240 => 363,  1231 => 357,  1225 => 355,  1222 => 354,  1217 => 353,  1215 => 352,  1212 => 351,  1205 => 346,  1196 => 344,  1192 => 343,  1189 => 342,  1186 => 341,  1184 => 340,  1181 => 339,  1173 => 335,  1171 => 334,  1168 => 333,  1162 => 329,  1156 => 327,  1153 => 326,  1151 => 325,  1148 => 324,  1139 => 319,  1137 => 318,  1114 => 317,  1111 => 316,  1108 => 315,  1105 => 314,  1102 => 313,  1099 => 312,  1096 => 311,  1094 => 310,  1091 => 309,  1084 => 305,  1080 => 304,  1075 => 303,  1073 => 302,  1070 => 301,  1063 => 296,  1060 => 295,  1052 => 290,  1049 => 289,  1047 => 288,  1044 => 287,  1036 => 282,  1032 => 281,  1028 => 280,  1025 => 279,  1023 => 278,  1020 => 277,  1012 => 273,  1010 => 269,  1008 => 268,  1005 => 267,  1000 => 263,  978 => 258,  975 => 257,  972 => 256,  969 => 255,  966 => 254,  963 => 253,  960 => 252,  957 => 251,  954 => 250,  951 => 249,  948 => 248,  946 => 247,  943 => 246,  935 => 240,  932 => 239,  930 => 238,  927 => 237,  919 => 233,  916 => 232,  914 => 231,  911 => 230,  899 => 226,  896 => 225,  893 => 224,  888 => 222,  885 => 221,  877 => 217,  874 => 216,  861 => 210,  858 => 209,  856 => 208,  853 => 207,  845 => 203,  842 => 202,  840 => 201,  837 => 200,  829 => 196,  826 => 195,  824 => 194,  821 => 193,  813 => 189,  810 => 188,  808 => 187,  805 => 186,  797 => 182,  794 => 181,  789 => 179,  781 => 175,  779 => 174,  776 => 173,  768 => 169,  765 => 168,  763 => 167,  760 => 166,  752 => 162,  749 => 161,  747 => 160,  745 => 476,  742 => 475,  735 => 153,  725 => 152,  720 => 151,  711 => 148,  708 => 147,  706 => 472,  703 => 145,  695 => 139,  692 => 137,  691 => 136,  685 => 134,  679 => 132,  676 => 131,  674 => 130,  671 => 129,  658 => 122,  645 => 460,  639 => 117,  634 => 115,  631 => 114,  610 => 271,  594 => 104,  589 => 102,  553 => 191,  499 => 78,  497 => 77,  489 => 75,  486 => 74,  471 => 72,  459 => 159,  426 => 58,  414 => 52,  403 => 48,  390 => 142,  217 => 66,  212 => 78,  920 => 427,  907 => 419,  887 => 416,  869 => 214,  851 => 414,  841 => 409,  833 => 406,  815 => 391,  792 => 485,  714 => 314,  697 => 300,  650 => 120,  647 => 259,  636 => 116,  632 => 253,  621 => 452,  613 => 109,  600 => 239,  579 => 228,  575 => 227,  569 => 224,  557 => 222,  551 => 92,  543 => 90,  539 => 217,  533 => 214,  525 => 408,  513 => 209,  505 => 80,  501 => 207,  495 => 204,  467 => 198,  463 => 197,  443 => 192,  421 => 184,  363 => 153,  342 => 137,  327 => 114,  306 => 107,  290 => 119,  265 => 105,  250 => 85,  923 => 425,  910 => 417,  890 => 223,  872 => 215,  854 => 412,  844 => 407,  836 => 404,  818 => 389,  795 => 387,  717 => 150,  702 => 470,  698 => 469,  655 => 260,  652 => 259,  641 => 296,  637 => 253,  624 => 251,  620 => 250,  616 => 450,  603 => 239,  590 => 229,  582 => 228,  572 => 98,  554 => 219,  546 => 91,  542 => 217,  522 => 212,  516 => 209,  508 => 81,  490 => 168,  460 => 194,  410 => 176,  366 => 33,  261 => 83,  194 => 68,  693 => 138,  690 => 467,  686 => 466,  588 => 243,  584 => 198,  578 => 227,  570 => 153,  523 => 88,  515 => 404,  511 => 82,  491 => 126,  487 => 203,  483 => 124,  478 => 199,  465 => 118,  456 => 158,  424 => 184,  416 => 148,  328 => 139,  318 => 111,  687 => 337,  662 => 123,  654 => 121,  646 => 257,  638 => 300,  630 => 455,  614 => 285,  606 => 280,  598 => 275,  581 => 225,  574 => 264,  567 => 262,  561 => 223,  558 => 147,  536 => 214,  528 => 213,  520 => 406,  514 => 249,  510 => 248,  502 => 179,  498 => 204,  481 => 202,  464 => 241,  445 => 234,  441 => 196,  383 => 136,  347 => 144,  311 => 148,  302 => 125,  242 => 78,  233 => 87,  406 => 122,  382 => 118,  370 => 160,  274 => 110,  238 => 309,  20 => 1,  571 => 219,  568 => 196,  564 => 223,  408 => 176,  405 => 49,  375 => 186,  359 => 143,  351 => 120,  320 => 127,  316 => 16,  286 => 112,  266 => 84,  262 => 98,  256 => 96,  204 => 56,  161 => 113,  185 => 134,  134 => 54,  378 => 157,  340 => 145,  336 => 123,  330 => 189,  326 => 138,  429 => 188,  422 => 184,  417 => 144,  395 => 8,  388 => 42,  339 => 316,  153 => 114,  506 => 132,  455 => 278,  449 => 198,  434 => 264,  385 => 41,  376 => 27,  372 => 226,  334 => 141,  225 => 68,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 453,  622 => 290,  617 => 250,  615 => 110,  612 => 361,  607 => 358,  605 => 357,  602 => 449,  597 => 353,  595 => 274,  592 => 103,  587 => 229,  585 => 347,  540 => 183,  537 => 304,  534 => 140,  519 => 212,  494 => 244,  482 => 265,  476 => 166,  473 => 262,  452 => 193,  433 => 60,  411 => 226,  380 => 158,  367 => 155,  344 => 119,  338 => 135,  335 => 134,  331 => 140,  297 => 104,  181 => 65,  332 => 116,  323 => 128,  319 => 116,  315 => 131,  308 => 147,  292 => 144,  288 => 118,  281 => 114,  277 => 101,  254 => 97,  197 => 69,  118 => 80,  100 => 39,  504 => 207,  500 => 175,  496 => 128,  492 => 76,  488 => 243,  484 => 178,  479 => 335,  475 => 199,  470 => 198,  466 => 197,  431 => 189,  396 => 238,  394 => 168,  391 => 168,  377 => 37,  354 => 245,  345 => 147,  343 => 146,  310 => 178,  293 => 120,  284 => 104,  257 => 98,  205 => 69,  178 => 66,  462 => 202,  458 => 252,  454 => 272,  450 => 64,  446 => 197,  442 => 62,  436 => 188,  432 => 149,  419 => 147,  386 => 159,  307 => 128,  304 => 103,  289 => 113,  280 => 96,  276 => 111,  249 => 79,  232 => 71,  198 => 68,  174 => 123,  200 => 72,  186 => 131,  152 => 110,  110 => 38,  76 => 54,  260 => 100,  248 => 97,  245 => 78,  240 => 80,  237 => 79,  228 => 73,  221 => 170,  213 => 78,  180 => 47,  401 => 172,  364 => 115,  361 => 152,  353 => 149,  349 => 138,  346 => 125,  333 => 102,  329 => 131,  325 => 129,  321 => 135,  303 => 106,  299 => 8,  295 => 275,  291 => 102,  287 => 130,  279 => 125,  275 => 105,  271 => 88,  267 => 101,  251 => 79,  243 => 92,  239 => 76,  231 => 83,  227 => 86,  223 => 100,  219 => 165,  215 => 60,  211 => 101,  207 => 75,  195 => 67,  191 => 67,  179 => 51,  175 => 65,  167 => 125,  159 => 110,  155 => 109,  129 => 89,  124 => 36,  104 => 31,  563 => 210,  560 => 195,  556 => 220,  428 => 146,  420 => 171,  415 => 180,  412 => 164,  404 => 161,  400 => 47,  397 => 203,  392 => 209,  389 => 160,  371 => 156,  369 => 256,  358 => 151,  356 => 328,  350 => 203,  348 => 140,  317 => 82,  313 => 115,  301 => 89,  296 => 121,  273 => 125,  270 => 102,  263 => 95,  259 => 103,  253 => 100,  234 => 78,  216 => 79,  192 => 67,  188 => 134,  170 => 84,  63 => 18,  53 => 5,  58 => 14,  23 => 1,  34 => 5,  146 => 69,  148 => 109,  137 => 94,  127 => 35,  113 => 48,  102 => 30,  90 => 62,  81 => 24,  59 => 6,  255 => 101,  244 => 136,  236 => 77,  230 => 68,  226 => 84,  222 => 165,  218 => 71,  210 => 77,  206 => 57,  202 => 77,  190 => 76,  184 => 63,  172 => 120,  150 => 55,  77 => 56,  97 => 67,  65 => 17,  480 => 162,  474 => 161,  469 => 162,  461 => 70,  457 => 194,  453 => 199,  444 => 177,  440 => 105,  437 => 167,  435 => 146,  430 => 187,  427 => 153,  423 => 57,  413 => 147,  409 => 146,  407 => 176,  402 => 130,  398 => 173,  393 => 143,  387 => 164,  384 => 167,  381 => 133,  379 => 262,  374 => 36,  368 => 34,  365 => 128,  362 => 144,  360 => 249,  355 => 150,  341 => 118,  337 => 105,  322 => 141,  314 => 99,  312 => 130,  309 => 129,  305 => 121,  298 => 120,  294 => 90,  285 => 128,  283 => 115,  278 => 98,  268 => 87,  264 => 84,  258 => 94,  252 => 73,  247 => 81,  241 => 93,  235 => 89,  229 => 87,  224 => 81,  220 => 162,  214 => 58,  208 => 76,  169 => 63,  143 => 51,  140 => 58,  132 => 72,  128 => 37,  119 => 40,  107 => 37,  71 => 13,  177 => 132,  165 => 120,  160 => 63,  135 => 62,  126 => 42,  114 => 38,  84 => 60,  70 => 19,  67 => 16,  61 => 12,  94 => 21,  89 => 62,  85 => 26,  75 => 54,  68 => 20,  56 => 12,  201 => 68,  196 => 92,  183 => 66,  171 => 53,  166 => 54,  163 => 82,  158 => 62,  156 => 62,  151 => 59,  142 => 68,  138 => 54,  136 => 71,  121 => 50,  117 => 39,  105 => 71,  91 => 64,  62 => 14,  49 => 12,  87 => 26,  21 => 1,  38 => 5,  28 => 2,  24 => 3,  25 => 35,  31 => 5,  26 => 3,  19 => 1,  93 => 28,  88 => 30,  78 => 24,  46 => 10,  44 => 11,  27 => 3,  79 => 18,  72 => 18,  69 => 11,  47 => 12,  40 => 11,  37 => 7,  22 => 2,  246 => 96,  157 => 112,  145 => 74,  139 => 97,  131 => 98,  123 => 61,  120 => 31,  115 => 40,  111 => 47,  108 => 33,  101 => 33,  98 => 29,  96 => 65,  83 => 58,  74 => 22,  66 => 25,  55 => 12,  52 => 13,  50 => 10,  43 => 9,  41 => 6,  35 => 3,  32 => 3,  29 => 2,  209 => 70,  203 => 73,  199 => 93,  193 => 88,  189 => 66,  187 => 139,  182 => 87,  176 => 86,  173 => 85,  168 => 61,  164 => 98,  162 => 59,  154 => 60,  149 => 113,  147 => 75,  144 => 42,  141 => 73,  133 => 42,  130 => 91,  125 => 89,  122 => 41,  116 => 79,  112 => 79,  109 => 52,  106 => 51,  103 => 19,  99 => 23,  95 => 65,  92 => 31,  86 => 35,  82 => 58,  80 => 24,  73 => 33,  64 => 10,  60 => 20,  57 => 19,  54 => 15,  51 => 13,  48 => 11,  45 => 8,  42 => 10,  39 => 6,  36 => 4,  33 => 6,  30 => 3,);
    }
}
