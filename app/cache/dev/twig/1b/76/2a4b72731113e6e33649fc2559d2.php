<?php

/* AevitasLevisBundle:Store:Point2Vnd.html.twig */
class __TwigTemplate_1b762a4b72731113e6e33649fc2559d2 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Backend:root.html.twig");

        $this->blocks = array(
            'import' => array($this, 'block_import'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AevitasLevisBundle:Backend:root.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_import($context, array $blocks = array())
    {
        // line 5
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/css/Point2VndCSS.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"print\" />
";
    }

    // line 8
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 9
        echo "<ul class=\"breadcrumb\">
    <li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
    <li class=\"divider\"></li>
    <li>users</li>
    <li class=\"divider\"></li>
    <li>search</li>
</ul>
";
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        // line 18
        echo "<div class=\"loading-bar\" style=\"display:none;\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/ajax-loader.gif"), "html", null, true);
        echo "\"></div>
<form action=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("backend_staff_point2vnd");
        echo "\" method=\"GET\" id=\"searchuser\">
";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
<input type=\"submit\" class=\"btn btn-action\" value=\"Search\"/>
</form>
<table class=\"dynamicTable table table-striped table-bordered table-condensed dataTable\" id=\"table-list-store\" aria-describedby=\"DataTables_Table_0_info\">
    <thead>
        <tr role=\"row\">
            <th>";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Firstname"), "html", null, true);
        echo "</th>
            <th>";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Lastname"), "html", null, true);
        echo "</th>
            <th>";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Email"), "html", null, true);
        echo "</th>
            <th>";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Point"), "html", null, true);
        echo "</th>
            <th>";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("C.Code"), "html", null, true);
        echo "</th>
            <th>";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Level"), "html", null, true);
        echo "</th>
            <th>";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Action"), "html", null, true);
        echo "</th>
        </tr>
    </thead>
    <tbody role=\"alert\" aria-live=\"polite\" aria-relevant=\"all\">
        ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : $this->getContext($context, "users")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 37
            echo "            <tr class=\"";
            echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index")), "html", null, true);
            echo " gradeA remove_item_";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo "\">
                <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getFirstname"), "html", null, true);
            echo "</td>
                <td>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getLastname"), "html", null, true);
            echo "</td>
                <td class=\"center item-name\">";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getEmail"), "html", null, true);
            echo "</td>
                <td class=\"center item-name\">";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getPoint"), "html", null, true);
            echo "</td>
                <td class=\"center item-name\">";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getCCode"), "html", null, true);
            echo "</td>
                <td>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getLevel"), "html", null, true);
            echo "</td>
                <td class=\"center item-price\" colspan=\"2\"><a href=\"javascript:showCvPopup(";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getId"), "html", null, true);
            echo ")\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Redeemption"), "html", null, true);
            echo "</a></td>
            </tr>
           ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "        </tbody>
    </table>
    
    <div class=\"modal fade\" id=\"myModal\" style=\"color:#000\">
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
              <h4 class=\"modal-title\" style=\"color:#000\">Converting point to VND</h4>
            </div>
            <div class=\"modal-body\">
            </div>
            <div class=\"modal-footer\">
              <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
              <button type=\"button\" class=\"btn btn-primary\" id=\"bt-process\">Convert</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
";
    }

    // line 68
    public function block_javascript($context, array $blocks = array())
    {
        // line 69
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/js/print.js"), "html", null, true);
        echo "\"></script>
    <script>
        window.setTimeout(function(){
            \$('#table-list-store_filter').hide();
        },1000);
        
        function showCvPopup(uid){
            \$('.loading-bar').show();
            \$.ajax({
                url: '";
        // line 78
        echo $this->env->getExtension('routing')->getPath("backend_staff_redeemption_info");
        echo "',
                dataType: 'json',
                type: 'post',
                data: {userid:uid},
                success: function(response){
                    \$('.loading-bar').hide();
                    console.log(response);
                    if (typeof(response.error)!='undefined'){
                        alert(response.error);
                        return;
                    }
                    //
                    var cts = '<div></div>';
                    cts += '<div>total points: <span id=\"max-point\">'+response.point+'</span></div>';
                    cts += '<div>base rate: <span id=\"base-rate\">'+response.baserate+' (1point = '+(parseInt(response.baserate))+'VND)</span></div>';
                    if (response.point < response.redeemlimit){
                        \$('#myModal #bt-process').attr({'disabled':'disabled'})
                        cts += '<div class=\"label label-warning\">your point much be NOT less than redeem limit (<b>'+response.redeemlimit+' point</b>)</div>';
                    }else{
                        \$('#myModal #bt-process').removeAttr('disabled');
                        cts += '<div>points <input type=\"text\" value=\"0\" id=\"point-value\" onkeyup=\"Point2Vnd(this,'+response.baserate+','+response.point+','+response.redeemlimit+')\"/> to VND <input type=\"text\" value=\"0\" id=\"vnd-value\"/>';
                    }
                    cts += '<div id=\"v-status\"style=\"display:none;\">Processing...</div>';
                    cts += '<input type=\"hidden\" id=\"uid\" value=\"'+uid+'\">'
                    \$('#myModal .modal-body').html(cts);
                    \$('#myModal').modal(\"show\");
                }
            });
        }
        
        var redeemlimit;
        
        function Point2Vnd(obj,baserate,point,rlimit){
            var p = parseInt(\$(obj).val());
            if (\$(obj).val() == ''){
                p = 0;
            }
            redeemlimit = rlimit;
            /*if (p < rlimit){
                alert('the point to redeem much be NOT less than redeemption limit ('+rlimit+' point)');
                return;
                \$(obj).val(rlimit);
                p = rlimit;
            }/**/
            if (p > point){
                \$(obj).val(point);
                p = point;
            }
            if (p < 0){
                p = 0;
                \$(obj).val(0);
            }
            var rs = p*baserate;
            \$('#vnd-value').val(rs);
        }
        
        \$('#myModal #bt-process').click(function(){
            var p = parseInt(\$('#point-value').val());
            var point = parseInt(\$('#max-point').html());
            baserate = parseInt(\$('#base-rate').html());
            if (p<1 || p>point){
                return;
            }
            if (p < redeemlimit){
                alert('the point to redeem much be NOT less than redeemption limit ('+redeemlimit+' point)');
                return;
            }
            if (!confirm('are you sure?')){
                return;
            }
            \$('#myModal #bt-process').attr({'disable':'disable'});
            \$('#myModal .modal-body #v-status').show();
\t    var rs = p*baserate;
\t     \$.ajax({
                url: '";
        // line 152
        echo $this->env->getExtension('routing')->getPath("backend_staff_redeemption_process");
        echo "',
                dataType: 'json',
                type: 'post',
                data: {userid:\$('#uid').val(), point:p},
                success: function(response){
                    console.log(response);
                    \$('#myModal .modal-body #v-status').hide();
                    if (typeof(response.error)!='undefined'){
                        alert(response.error);
                        return;
                    }
                    //showCvPopup(\$('#uid').val());
                    //<button class=\"btn btn-primary\" onclick=\"DoPrint()\">Print</button>
                    var cts = '<div id=\"vauth\" style=\"text-align:right\"><input type=\"text\" id=\"input-code\" class=\"input-small\" style=\"border:1px solid #c00\"/>&nbsp;&nbsp;<button class=\"btn btn-primary\" onclick=\"DoAuth()\" id=\"bt-auth\">Authenticate</button></div>';
                    cts += '<input type=\"hidden\" id=\"redeem-id\" value=\"'+response.id+'\"/>';
                    cts += '<div id=\"printable\" style=\"\"><p style=\"text-align:left\" id=\"hashcode\"></p>';
                    cts += '<p style=\"text-align:left\">Time: '+response.time+'</p>';
                    cts += '<p style=\"font-size:20px;text-align:center;padding-bottom:20px\">Point Receipt</p>';
                    cts += '<table align=\"center\" class=\"dynamicTable table table-striped table-bordered table-condensed dataTable\" aria-describedby=\"DataTables_Table_1_info\">';
                    cts += '<tr><th>Store</th><td>'+response.store+'</td></tr>';
                    cts += '<tr><th>Customer</th><td>'+response.name+'</td></tr>';
                    cts += '<tr><th>C.Code</th><td>'+response.ccode+'</td></tr>';
                    cts += '<tr><th>Point to convert</th><td>'+response.point+'</td></tr>';
                    cts += '<tr><th>Point remaining</th><td>'+response.remaining+'</td></tr>';
                    cts += '<tr><th>Current baserate</th><td>'+response.baserate+'</td></tr>';
                    cts += '<tr><th>VND</th><td>'+response.vnd+'</td></tr>';
                    cts += '</table><div>';
                    \$('#myModal .modal-body').html(cts);
                    \$('#myModal #bt-process').attr({'disabled':'disabled'});
                    \$('#myModal').modal(\"show\");
                }
            });
        });
        
        function DoPrint(){
            \$(\"#printable\").printElement({
                overrideElementCSS:[
                   '";
        // line 189
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/css/Point2VndCSS.css"), "html", null, true);
        echo "',
                   { href:'";
        // line 190
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/css/Point2VndCSS.css"), "html", null, true);
        echo "',media:'print'}
                ]
            });
        }
        
        function DoAuth(){
            var authcode = \$('#input-code').val();
            if (authcode.length != 8){
                alert('please input a valid code !');
            }
            \$('#myModal #bt-auth').attr({'disabled':'disabled'});
            var rid = \$('#redeem-id').val();
            \$.ajax({
                url: '";
        // line 203
        echo $this->env->getExtension('routing')->getPath("backend_staff_redeemption_auth");
        echo "',
                dataType: 'json',
                type: 'post',
                data: {code:authcode, id:rid},
                success: function(response){
                    console.log(response);
                    if (typeof(response.msg) == 'undefined' || response.msg != 'ok'){
                        \$('#myModal #bt-auth').removeAttr('disabled');
                        alert('Authentication has failed');
                    }else{
                        \$('#vauth').html('<label class=\"label label-success\"><i class=\"icon-thumbs-up\"></i> Success!</label> <br/> <button class=\"btn btn-success\" onclick=\"DoPrint()\">Print</button>');
                        \$('#hashcode').html('code: '+authcode);
                    }
                }
            });
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Store:Point2Vnd.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  272 => 121,  1357 => 388,  1348 => 387,  1346 => 386,  1343 => 385,  1327 => 381,  1320 => 380,  1318 => 379,  1315 => 378,  1292 => 374,  1267 => 373,  1265 => 372,  1262 => 371,  1250 => 366,  1245 => 365,  1243 => 364,  1240 => 363,  1231 => 357,  1225 => 355,  1222 => 354,  1217 => 353,  1215 => 352,  1212 => 351,  1205 => 346,  1196 => 344,  1192 => 343,  1189 => 342,  1186 => 341,  1184 => 340,  1181 => 339,  1173 => 335,  1171 => 334,  1168 => 333,  1162 => 329,  1156 => 327,  1153 => 326,  1151 => 325,  1148 => 324,  1139 => 319,  1137 => 318,  1114 => 317,  1111 => 316,  1108 => 315,  1105 => 314,  1102 => 313,  1099 => 312,  1096 => 311,  1094 => 310,  1091 => 309,  1084 => 305,  1080 => 304,  1075 => 303,  1073 => 302,  1070 => 301,  1063 => 296,  1060 => 295,  1052 => 290,  1049 => 289,  1047 => 288,  1044 => 287,  1036 => 282,  1032 => 281,  1028 => 280,  1025 => 279,  1023 => 278,  1020 => 277,  1012 => 273,  1010 => 269,  1008 => 268,  1005 => 267,  1000 => 263,  978 => 258,  975 => 257,  972 => 256,  969 => 255,  966 => 254,  963 => 253,  960 => 252,  957 => 251,  954 => 250,  951 => 249,  948 => 248,  946 => 247,  943 => 246,  935 => 240,  932 => 239,  930 => 238,  927 => 237,  919 => 233,  916 => 232,  914 => 231,  911 => 230,  899 => 226,  896 => 225,  893 => 224,  888 => 222,  885 => 221,  877 => 217,  874 => 216,  861 => 210,  858 => 209,  856 => 208,  853 => 207,  845 => 203,  842 => 202,  840 => 201,  837 => 200,  829 => 196,  826 => 195,  824 => 194,  821 => 193,  813 => 189,  810 => 188,  808 => 187,  805 => 186,  797 => 182,  794 => 181,  789 => 179,  781 => 175,  779 => 174,  776 => 173,  768 => 169,  765 => 168,  763 => 167,  760 => 166,  752 => 162,  749 => 161,  747 => 160,  745 => 159,  742 => 158,  735 => 153,  725 => 152,  720 => 151,  711 => 148,  708 => 147,  706 => 146,  703 => 145,  695 => 139,  692 => 137,  691 => 136,  685 => 134,  679 => 132,  676 => 131,  674 => 130,  671 => 129,  658 => 122,  645 => 119,  639 => 117,  634 => 115,  631 => 114,  610 => 108,  594 => 104,  589 => 102,  553 => 93,  499 => 78,  497 => 77,  489 => 75,  486 => 74,  471 => 72,  459 => 69,  426 => 58,  414 => 52,  403 => 48,  390 => 43,  217 => 66,  212 => 91,  920 => 427,  907 => 419,  887 => 416,  869 => 214,  851 => 414,  841 => 409,  833 => 406,  815 => 391,  792 => 180,  714 => 314,  697 => 300,  650 => 120,  647 => 259,  636 => 116,  632 => 253,  621 => 251,  613 => 109,  600 => 239,  579 => 228,  575 => 227,  569 => 224,  557 => 222,  551 => 92,  543 => 90,  539 => 217,  533 => 214,  525 => 89,  513 => 209,  505 => 80,  501 => 207,  495 => 204,  467 => 198,  463 => 197,  443 => 192,  421 => 184,  363 => 32,  342 => 23,  327 => 143,  306 => 137,  290 => 152,  265 => 120,  250 => 338,  923 => 425,  910 => 417,  890 => 223,  872 => 215,  854 => 412,  844 => 407,  836 => 404,  818 => 389,  795 => 387,  717 => 150,  702 => 300,  698 => 299,  655 => 260,  652 => 259,  641 => 257,  637 => 253,  624 => 251,  620 => 250,  616 => 249,  603 => 239,  590 => 229,  582 => 228,  572 => 98,  554 => 219,  546 => 91,  542 => 217,  522 => 212,  516 => 209,  508 => 81,  490 => 203,  460 => 194,  410 => 176,  366 => 33,  261 => 116,  194 => 245,  693 => 138,  690 => 135,  686 => 245,  588 => 243,  584 => 226,  578 => 227,  570 => 153,  523 => 88,  515 => 135,  511 => 82,  491 => 126,  487 => 203,  483 => 124,  478 => 199,  465 => 118,  456 => 68,  424 => 184,  416 => 90,  328 => 14,  318 => 140,  687 => 337,  662 => 123,  654 => 121,  646 => 257,  638 => 300,  630 => 295,  614 => 285,  606 => 280,  598 => 275,  581 => 225,  574 => 264,  567 => 262,  561 => 223,  558 => 147,  536 => 214,  528 => 213,  520 => 87,  514 => 249,  510 => 248,  502 => 131,  498 => 204,  481 => 202,  464 => 241,  445 => 234,  441 => 233,  383 => 68,  347 => 136,  311 => 148,  302 => 121,  242 => 78,  233 => 301,  406 => 122,  382 => 118,  370 => 160,  274 => 100,  238 => 309,  20 => 1,  571 => 219,  568 => 218,  564 => 223,  408 => 50,  405 => 49,  375 => 186,  359 => 157,  351 => 112,  320 => 159,  316 => 16,  286 => 284,  266 => 118,  262 => 129,  256 => 104,  204 => 86,  161 => 61,  185 => 76,  134 => 41,  378 => 132,  340 => 147,  336 => 123,  330 => 189,  326 => 105,  429 => 230,  422 => 145,  417 => 144,  395 => 8,  388 => 42,  339 => 123,  153 => 55,  506 => 132,  455 => 278,  449 => 193,  434 => 264,  385 => 41,  376 => 27,  372 => 226,  334 => 190,  225 => 68,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 290,  617 => 250,  615 => 110,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 274,  592 => 103,  587 => 229,  585 => 347,  540 => 305,  537 => 304,  534 => 140,  519 => 212,  494 => 244,  482 => 265,  476 => 263,  473 => 262,  452 => 193,  433 => 60,  411 => 226,  380 => 165,  367 => 160,  344 => 24,  338 => 25,  335 => 21,  331 => 186,  297 => 134,  181 => 229,  332 => 20,  323 => 250,  319 => 153,  315 => 140,  308 => 147,  292 => 144,  288 => 4,  281 => 385,  277 => 101,  254 => 112,  197 => 68,  118 => 36,  100 => 32,  504 => 207,  500 => 341,  496 => 128,  492 => 76,  488 => 243,  484 => 202,  479 => 335,  475 => 199,  470 => 198,  466 => 197,  431 => 186,  396 => 238,  394 => 120,  391 => 168,  377 => 37,  354 => 245,  345 => 149,  343 => 124,  310 => 178,  293 => 6,  284 => 124,  257 => 118,  205 => 79,  178 => 67,  462 => 274,  458 => 252,  454 => 272,  450 => 64,  446 => 192,  442 => 62,  436 => 188,  432 => 100,  419 => 147,  386 => 208,  307 => 209,  304 => 103,  289 => 93,  280 => 137,  276 => 378,  249 => 96,  232 => 82,  198 => 84,  174 => 47,  200 => 69,  186 => 77,  152 => 188,  110 => 39,  76 => 26,  260 => 360,  248 => 109,  245 => 79,  240 => 323,  237 => 90,  228 => 101,  221 => 67,  213 => 78,  180 => 50,  401 => 173,  364 => 115,  361 => 174,  353 => 139,  349 => 243,  346 => 125,  333 => 147,  329 => 85,  325 => 141,  321 => 187,  303 => 296,  299 => 8,  295 => 117,  291 => 131,  287 => 130,  279 => 125,  275 => 70,  271 => 371,  267 => 105,  251 => 115,  243 => 93,  239 => 187,  231 => 87,  227 => 86,  223 => 100,  219 => 143,  215 => 69,  211 => 75,  207 => 74,  195 => 59,  191 => 58,  179 => 55,  175 => 70,  167 => 68,  159 => 66,  155 => 44,  129 => 145,  124 => 37,  104 => 34,  563 => 210,  560 => 96,  556 => 205,  428 => 59,  420 => 171,  415 => 126,  412 => 164,  404 => 161,  400 => 47,  397 => 203,  392 => 209,  389 => 200,  371 => 35,  369 => 256,  358 => 114,  356 => 157,  350 => 203,  348 => 161,  317 => 82,  313 => 105,  301 => 102,  296 => 127,  273 => 125,  270 => 99,  263 => 362,  259 => 192,  253 => 339,  234 => 78,  216 => 142,  192 => 80,  188 => 53,  170 => 52,  63 => 19,  53 => 17,  58 => 18,  23 => 3,  34 => 5,  146 => 55,  148 => 59,  137 => 55,  127 => 48,  113 => 34,  102 => 32,  90 => 27,  81 => 26,  59 => 20,  255 => 99,  244 => 84,  236 => 103,  230 => 100,  226 => 99,  222 => 294,  218 => 94,  210 => 267,  206 => 84,  202 => 263,  190 => 49,  184 => 230,  172 => 66,  150 => 54,  77 => 24,  97 => 28,  65 => 21,  480 => 162,  474 => 161,  469 => 71,  461 => 70,  457 => 194,  453 => 236,  444 => 177,  440 => 105,  437 => 61,  435 => 146,  430 => 187,  427 => 263,  423 => 57,  413 => 134,  409 => 241,  407 => 176,  402 => 130,  398 => 173,  393 => 126,  387 => 167,  384 => 167,  381 => 133,  379 => 262,  374 => 36,  368 => 34,  365 => 111,  362 => 186,  360 => 249,  355 => 27,  341 => 105,  337 => 22,  322 => 141,  314 => 99,  312 => 143,  309 => 142,  305 => 316,  298 => 97,  294 => 90,  285 => 128,  283 => 129,  278 => 384,  268 => 370,  264 => 84,  258 => 351,  252 => 121,  247 => 189,  241 => 82,  235 => 105,  229 => 69,  224 => 97,  220 => 287,  214 => 76,  208 => 87,  169 => 61,  143 => 41,  140 => 49,  132 => 41,  128 => 43,  119 => 43,  107 => 36,  71 => 19,  177 => 49,  165 => 62,  160 => 52,  135 => 39,  126 => 38,  114 => 35,  84 => 28,  70 => 21,  67 => 20,  61 => 16,  94 => 30,  89 => 35,  85 => 17,  75 => 21,  68 => 22,  56 => 12,  201 => 78,  196 => 81,  183 => 56,  171 => 69,  166 => 51,  163 => 67,  158 => 49,  156 => 56,  151 => 43,  142 => 54,  138 => 53,  136 => 51,  121 => 37,  117 => 36,  105 => 32,  91 => 27,  62 => 14,  49 => 10,  87 => 28,  21 => 2,  38 => 5,  28 => 3,  24 => 3,  25 => 3,  31 => 4,  26 => 2,  19 => 1,  93 => 29,  88 => 29,  78 => 27,  46 => 7,  44 => 9,  27 => 4,  79 => 28,  72 => 18,  69 => 27,  47 => 7,  40 => 5,  37 => 8,  22 => 2,  246 => 106,  157 => 63,  145 => 45,  139 => 40,  131 => 38,  123 => 36,  120 => 44,  115 => 36,  111 => 107,  108 => 38,  101 => 86,  98 => 31,  96 => 31,  83 => 27,  74 => 26,  66 => 20,  55 => 17,  52 => 15,  50 => 10,  43 => 6,  41 => 8,  35 => 5,  32 => 4,  29 => 3,  209 => 64,  203 => 61,  199 => 60,  193 => 82,  189 => 72,  187 => 57,  182 => 80,  176 => 220,  173 => 67,  168 => 65,  164 => 200,  162 => 50,  154 => 48,  149 => 43,  147 => 42,  144 => 56,  141 => 44,  133 => 50,  130 => 40,  125 => 38,  122 => 37,  116 => 113,  112 => 47,  109 => 36,  106 => 30,  103 => 44,  99 => 68,  95 => 21,  92 => 30,  86 => 46,  82 => 16,  80 => 27,  73 => 29,  64 => 17,  60 => 19,  57 => 29,  54 => 12,  51 => 13,  48 => 13,  45 => 6,  42 => 6,  39 => 5,  36 => 6,  33 => 3,  30 => 2,);
    }
}
