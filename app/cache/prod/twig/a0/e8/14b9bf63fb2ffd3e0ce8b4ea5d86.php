<?php

/* :mail:root.html.twig */
class __TwigTemplate_a0e814b9bf63fb2ffd3e0ce8b4ea5d86 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
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
                                <td width=\"590\"><h2 align=\"center\" class=\"h1\">";
        // line 71
        $this->displayBlock('title', $context, $blocks);
        echo "</h2></td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td><table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                            <tr>
                                <td width=\"20\">&nbsp;</td>
                                <td>";
        // line 79
        $this->displayBlock('content', $context, $blocks);
        // line 80
        echo "</td>
                                <td width=\"20\">&nbsp;</td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td><table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                            <tr>
                                <td width=\"20\">
                                    <p><img src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/sig.png"), "html", null, true);
        echo "\" width=\"173\" height=\"58\" /></p>
                                    <p><strong>Chairman, Tanwani</strong></p><hr /></td>
                                <td width=\"20\">&nbsp;</td>
                            </tr>
                            <!-- <tr>
                               <td colspan=\"3\"><img src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/step.png"), "html", null, true);
        echo "\" width=\"600\" height=\"69\" alt=\"step1\" />
                       </td>
                               </tr> -->
                            <tr>
                                <td colspan=\"3\"><table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                        <tr>
                                            <td width=\"20\">&nbsp;</td>
                                            <td height=\"30\">In the mean time, you might want to <strong>get extra points by:</strong></td>
                                            <td width=\"20\">&nbsp;</td>
                                        </tr>
                                    </table></td>
                            </tr>
                            <tr>
                                <td colspan=\"3\"><table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                        <tr>
                                            <td><img src=\"";
        // line 109
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/get-more-points-RED.png"), "html", null, true);
        echo "\" width=\"300\" height=\"141\" alt=\"gmpoints\" /></td>
                                            <td> <img src=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/get-more-points-2-RED.png"), "html", null, true);
        echo "\" width=\"300\" height=\"141\" alt=\"gmpoints2\" /></td>
                                        </tr>
                                    </table></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td height=\"30\"><strong>And redeem your points NOW for these exciting rewards!</strong></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td height=\"30\" colspan=\"3\"><img src=\"";
        // line 120
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/Gold_Gift.JPG"), "html", null, true);
        echo "\" width=\"600\" height=\"250\" alt=\"gift\" /></td>
                            </tr>
                            <tr>
                                <td height=\"30\" colspan=\"3\"><table width=\"600\" border=\"0\" cellspacing=\"0\">
                                        <tr>
                                            <td width=\"20\" height=\"50\">&nbsp;</td>
                                            <td height=\"50\">If you need further assistance, please contact us by email at contact@tbfstarclub.com or by phone at (+84) 937.200.501</td>
                                            <td width=\"20\" height=\"50\">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td height=\"20\">&nbsp;</td>
                                            <td height=\"20\"><a href=\"\"><img src=\"";
        // line 131
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
                                            <td height=\"50\" style=\"font-size: 11px; line-height:15px\"><p><strong>LEVI'S® STORE IN VIETNAM:</strong><br />
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

                                                    <a data-cke-saved-href=\"*|UNSUB|*\" href=\"https://us7.admin.mailchimp.com/campaigns/wizard/*%7CUNSUB%7C*\">unsubscribe from this list</a>    <a data-cke-saved-href=\"*|UPDATE_PROFILE|*\" href=\"https://us7.admin.mailchimp.com/campaigns/wizard/*%7CUPDATE_PROFILE%7C*\">update subscription preferences</a> <br />
                                                </p></td>
                                            <td height=\"50\">&nbsp;</td>
                                        </tr>
                                    </table></td>
                            </tr>
                            <tr>
                                <td height=\"30\" colspan=\"3\"><img src=\"";
        // line 162
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("email/logo-brand.png"), "html", null, true);
        echo "\" width=\"599\" height=\"90\" /></td>
                            </tr>
                        </table></td>
                </tr>
            </table>
        </body>
    </html>
";
    }

    // line 71
    public function block_title($context, array $blocks = array())
    {
    }

    // line 79
    public function block_content($context, array $blocks = array())
    {
        // line 80
        echo "                                    ";
    }

    public function getTemplateName()
    {
        return ":mail:root.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 80,  237 => 79,  232 => 71,  220 => 162,  186 => 131,  172 => 120,  159 => 110,  155 => 109,  137 => 94,  129 => 89,  118 => 80,  116 => 79,  105 => 71,  96 => 65,  90 => 62,  83 => 58,  76 => 54,  21 => 1,  36 => 4,  28 => 2,);
    }
}
