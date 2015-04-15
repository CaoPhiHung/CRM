<?php

/* AevitasLevisBundle:Checkout:checkoutStepOne.html.twig */
class __TwigTemplate_d1166db202256f9b3e47ff5257b511df extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Front:root.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'jslib' => array($this, 'block_jslib'),
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
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Checkout"), "html", null, true);
        echo "</title>
        ";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div id=\"panel\" class=\"toppanel\">
    <div class=\"shadow_wrapper\">
        <div>
            <div class=\"content\">
                <h3>";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Check-out"), "html", null, true);
        echo "</h3>
            </div>
        </div>
    </div>
</div><!-- /.carousel -->
    <section id=\"form_reg\" class=\"clearfix\">
        <div class=\"shadow_wrapper\">
            <div>
                <div class=\"content\" style=\"background:url('";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/images/credit.jpg"), "html", null, true);
        echo "') no-repeat scroll bottom right #fff\">
                    <ul class=\"steps\">
                        <li class=\"active step1\"><span><span>1. ";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Confirm your cart"), "html", null, true);
        echo "</span></span></li>
                        <li class=\"step2\"><span><span>2. ";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Finish"), "html", null, true);
        echo "</span></span></li>
                    </ul>
                    <div class=\"info stepone\">
                        <span class=\"title\"><h3>1. ";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Confirm your cart"), "html", null, true);
        echo "</h3></span>
                        <div>
                            <p>";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Check all your selected items again before you go any further."), "html", null, true);
        echo "</p>
                            <div class=\"cartitem\"><div class=\"giftname\">";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Item"), "html", null, true);
        echo "</div><div class=\"quantity\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Quantity"), "html", null, true);
        echo "</div><div class=\"point\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Points"), "html", null, true);
        echo "</div><div class=\"subtotal\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Subtotal"), "html", null, true);
        echo "</div><div class=\"shipmethod\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Shipping Method"), "html", null, true);
        echo "</div></div>
                            ";
        // line 28
        echo (isset($context["giftform"]) ? $context["giftform"] : $this->getContext($context, "giftform"));
        echo "
                                </div>
                                <span><a class=\"yellow_button submit3\" href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("checkout_step_two");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Continue"), "html", null, true);
        echo "</a></span>
                            </div>
                        </div>
                        <iframe id=\"iframe-post-form\" name=\"iframe-post-form\" style=\"display:none\"></iframe>
                    </div>
                </div>
            </section>

    <!-- Modal -->
    <div id=\"error\" class=\"modal hide fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
            <h3 id=\"myModalLabel\">";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Unable to add more gift"), "html", null, true);
        echo "</h3>
        </div>
        <div class=\"modal-body\">
            <p>";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Your cart is over your point"), "html", null, true);
        echo "
        </div>
        <div class=\"modal-footer\">
            <button class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
        </div>
    </div>
";
    }

    // line 52
    public function block_jslib($context, array $blocks = array())
    {
        // line 53
        echo "                <script src=\"//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js\"></script>
    ";
        // line 54
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "3a9519c_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_0") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_bootstrap-transition_1.js");
            // line 65
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_1") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_jquery.uniform.min_2.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_2") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_bootstrap-modal_3.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_3") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_bootstrap-dropdown_4.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_4") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_bootstrap-carousel_5.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_5") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_bootstrap-grayscale_6.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_6") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_select2_7.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_7") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_bootstrap-holder_8.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
            // asset "3a9519c_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c_8") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout_iframe_9.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "3a9519c"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3a9519c") : $this->env->getExtension('assets')->getAssetUrl("js/front_compress_checkout.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 67
        echo "        ";
    }

    // line 68
    public function block_javascript($context, array $blocks = array())
    {
        // line 69
        echo "    \$(document).ready(function(){
        \$('.yellow_button').on('click',function(e){
            e.preventDefault();
            if(\$('form.changing').length){
                setTimeout(function(){\$('.yellow_button').trigger('click')},1000);
            } else window.location = \$(this).attr('href');
        });
        \$('form .quantity a').on('click', function(e){
            e.preventDefault();
            url = \$(this).attr('href');
            \$.ajax({
                url: url,
                dataType: 'json',
                success: function(data){
                    \$('form#item'+data.id).remove();
                }
            })
        });
        \$('select').select2({ showSearchInput: false });
        \$('form.cartitem').each(function(){
            \$form = \$(this);
            \$(this).iframePostForm({
            json: true,
            post: function(){
                \$form.addClass('changing');
            },
            complete: function(response){
                console.log(response);
                if(response.status) \$('#error').modal('show');
                else \$form.find('.subtotal').text(response.points);
                \$form.removeClass('changing');
            }
        });
        });
        \$('form.cartitem').change(function(){
            \$form = \$(this);
            console.log(\$form.serialize());
            \$form.submit()
        });
    });
";
    }

    public function getTemplateName()
    {
        return "AevitasLevisBundle:Checkout:checkoutStepOne.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1357 => 388,  1348 => 387,  1346 => 386,  1343 => 385,  1327 => 381,  1320 => 380,  1318 => 379,  1315 => 378,  1292 => 374,  1267 => 373,  1265 => 372,  1262 => 371,  1250 => 366,  1245 => 365,  1243 => 364,  1240 => 363,  1231 => 357,  1225 => 355,  1222 => 354,  1217 => 353,  1215 => 352,  1212 => 351,  1205 => 346,  1196 => 344,  1192 => 343,  1189 => 342,  1186 => 341,  1184 => 340,  1181 => 339,  1173 => 335,  1171 => 334,  1168 => 333,  1162 => 329,  1156 => 327,  1153 => 326,  1151 => 325,  1148 => 324,  1139 => 319,  1137 => 318,  1114 => 317,  1111 => 316,  1108 => 315,  1105 => 314,  1102 => 313,  1099 => 312,  1096 => 311,  1094 => 310,  1091 => 309,  1084 => 305,  1080 => 304,  1075 => 303,  1073 => 302,  1070 => 301,  1063 => 296,  1060 => 295,  1052 => 290,  1049 => 289,  1047 => 288,  1044 => 287,  1036 => 282,  1032 => 281,  1028 => 280,  1025 => 279,  1023 => 278,  1020 => 277,  1012 => 273,  1010 => 269,  1008 => 268,  1005 => 267,  1000 => 263,  978 => 258,  975 => 257,  972 => 256,  969 => 255,  966 => 254,  963 => 253,  960 => 252,  957 => 251,  954 => 250,  951 => 249,  948 => 248,  946 => 247,  943 => 246,  935 => 240,  932 => 239,  930 => 238,  927 => 237,  919 => 233,  916 => 232,  914 => 231,  911 => 230,  899 => 226,  896 => 225,  893 => 224,  888 => 222,  885 => 221,  877 => 217,  874 => 216,  861 => 210,  858 => 209,  856 => 208,  853 => 207,  845 => 203,  842 => 202,  840 => 201,  837 => 200,  829 => 196,  826 => 195,  824 => 194,  821 => 193,  813 => 189,  810 => 188,  808 => 187,  805 => 186,  797 => 182,  794 => 181,  789 => 179,  781 => 175,  779 => 174,  776 => 173,  768 => 169,  765 => 168,  763 => 167,  760 => 166,  752 => 162,  749 => 161,  747 => 160,  745 => 159,  742 => 158,  735 => 153,  725 => 152,  720 => 151,  711 => 148,  708 => 147,  706 => 146,  703 => 145,  695 => 139,  692 => 137,  691 => 136,  685 => 134,  679 => 132,  676 => 131,  674 => 130,  671 => 129,  658 => 122,  645 => 119,  639 => 117,  634 => 115,  631 => 114,  610 => 108,  594 => 104,  589 => 102,  553 => 93,  499 => 78,  497 => 77,  489 => 75,  486 => 74,  471 => 72,  459 => 69,  426 => 58,  414 => 52,  403 => 48,  390 => 43,  217 => 286,  212 => 68,  920 => 427,  907 => 419,  887 => 416,  869 => 214,  851 => 414,  841 => 409,  833 => 406,  815 => 391,  792 => 180,  714 => 314,  697 => 300,  650 => 120,  647 => 259,  636 => 116,  632 => 253,  621 => 251,  613 => 109,  600 => 239,  579 => 228,  575 => 227,  569 => 224,  557 => 222,  551 => 92,  543 => 90,  539 => 217,  533 => 214,  525 => 89,  513 => 209,  505 => 80,  501 => 207,  495 => 204,  467 => 198,  463 => 197,  443 => 192,  421 => 184,  363 => 32,  342 => 23,  327 => 143,  306 => 137,  290 => 5,  265 => 85,  250 => 338,  923 => 425,  910 => 417,  890 => 223,  872 => 215,  854 => 412,  844 => 407,  836 => 404,  818 => 389,  795 => 387,  717 => 150,  702 => 300,  698 => 299,  655 => 260,  652 => 259,  641 => 257,  637 => 253,  624 => 251,  620 => 250,  616 => 249,  603 => 239,  590 => 229,  582 => 228,  572 => 98,  554 => 219,  546 => 91,  542 => 217,  522 => 212,  516 => 209,  508 => 81,  490 => 203,  460 => 194,  410 => 176,  366 => 33,  261 => 113,  194 => 245,  693 => 138,  690 => 135,  686 => 245,  588 => 243,  584 => 226,  578 => 227,  570 => 153,  523 => 88,  515 => 135,  511 => 82,  491 => 126,  487 => 203,  483 => 124,  478 => 199,  465 => 118,  456 => 68,  424 => 184,  416 => 90,  328 => 14,  318 => 140,  687 => 337,  662 => 123,  654 => 121,  646 => 257,  638 => 300,  630 => 295,  614 => 285,  606 => 280,  598 => 275,  581 => 225,  574 => 264,  567 => 262,  561 => 223,  558 => 147,  536 => 214,  528 => 213,  520 => 87,  514 => 249,  510 => 248,  502 => 131,  498 => 204,  481 => 202,  464 => 241,  445 => 234,  441 => 233,  383 => 68,  347 => 151,  311 => 14,  302 => 121,  242 => 117,  233 => 301,  406 => 122,  382 => 118,  370 => 160,  274 => 100,  238 => 309,  20 => 1,  571 => 219,  568 => 218,  564 => 223,  408 => 50,  405 => 49,  375 => 186,  359 => 157,  351 => 112,  320 => 159,  316 => 16,  286 => 284,  266 => 363,  262 => 129,  256 => 104,  204 => 86,  161 => 199,  185 => 64,  134 => 158,  378 => 132,  340 => 147,  336 => 123,  330 => 143,  326 => 105,  429 => 230,  422 => 145,  417 => 144,  395 => 8,  388 => 42,  339 => 123,  153 => 69,  506 => 132,  455 => 278,  449 => 193,  434 => 264,  385 => 41,  376 => 27,  372 => 226,  334 => 18,  225 => 295,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 290,  617 => 250,  615 => 110,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 274,  592 => 103,  587 => 229,  585 => 347,  540 => 305,  537 => 304,  534 => 140,  519 => 212,  494 => 244,  482 => 265,  476 => 263,  473 => 262,  452 => 193,  433 => 60,  411 => 226,  380 => 165,  367 => 160,  344 => 24,  338 => 25,  335 => 21,  331 => 186,  297 => 94,  181 => 229,  332 => 20,  323 => 154,  319 => 153,  315 => 140,  308 => 13,  292 => 144,  288 => 4,  281 => 385,  277 => 101,  254 => 124,  197 => 246,  118 => 36,  100 => 29,  504 => 207,  500 => 341,  496 => 128,  492 => 76,  488 => 243,  484 => 202,  479 => 335,  475 => 199,  470 => 198,  466 => 197,  431 => 186,  396 => 238,  394 => 120,  391 => 168,  377 => 37,  354 => 245,  345 => 149,  343 => 124,  310 => 178,  293 => 6,  284 => 124,  257 => 84,  205 => 87,  178 => 79,  462 => 274,  458 => 252,  454 => 272,  450 => 64,  446 => 192,  442 => 62,  436 => 188,  432 => 100,  419 => 147,  386 => 208,  307 => 209,  304 => 98,  289 => 93,  280 => 137,  276 => 378,  249 => 83,  232 => 82,  198 => 84,  174 => 78,  200 => 69,  186 => 236,  152 => 188,  110 => 30,  76 => 24,  260 => 360,  248 => 333,  245 => 332,  240 => 323,  237 => 104,  228 => 101,  221 => 70,  213 => 94,  180 => 50,  401 => 173,  364 => 115,  361 => 174,  353 => 113,  349 => 243,  346 => 125,  333 => 147,  329 => 85,  325 => 141,  321 => 187,  303 => 296,  299 => 8,  295 => 117,  291 => 126,  287 => 73,  279 => 71,  275 => 70,  271 => 371,  267 => 116,  251 => 190,  243 => 324,  239 => 187,  231 => 101,  227 => 298,  223 => 100,  219 => 96,  215 => 69,  211 => 77,  207 => 266,  195 => 50,  191 => 243,  179 => 221,  175 => 64,  167 => 57,  159 => 74,  155 => 73,  129 => 145,  124 => 129,  104 => 87,  563 => 210,  560 => 96,  556 => 205,  428 => 59,  420 => 171,  415 => 126,  412 => 164,  404 => 161,  400 => 47,  397 => 203,  392 => 209,  389 => 200,  371 => 35,  369 => 256,  358 => 114,  356 => 157,  350 => 26,  348 => 161,  317 => 82,  313 => 15,  301 => 176,  296 => 127,  273 => 377,  270 => 99,  263 => 362,  259 => 192,  253 => 339,  234 => 78,  216 => 96,  192 => 88,  188 => 53,  170 => 76,  63 => 20,  53 => 17,  58 => 13,  23 => 3,  34 => 3,  146 => 65,  148 => 62,  137 => 48,  127 => 47,  113 => 37,  102 => 30,  90 => 27,  81 => 26,  59 => 13,  255 => 350,  244 => 84,  236 => 179,  230 => 300,  226 => 100,  222 => 294,  218 => 61,  210 => 267,  206 => 96,  202 => 263,  190 => 49,  184 => 230,  172 => 76,  150 => 56,  77 => 24,  97 => 28,  65 => 21,  480 => 162,  474 => 161,  469 => 71,  461 => 70,  457 => 194,  453 => 236,  444 => 177,  440 => 105,  437 => 61,  435 => 146,  430 => 187,  427 => 263,  423 => 57,  413 => 134,  409 => 241,  407 => 176,  402 => 130,  398 => 173,  393 => 126,  387 => 167,  384 => 167,  381 => 133,  379 => 262,  374 => 36,  368 => 34,  365 => 111,  362 => 186,  360 => 249,  355 => 27,  341 => 105,  337 => 22,  322 => 141,  314 => 99,  312 => 134,  309 => 137,  305 => 316,  298 => 97,  294 => 90,  285 => 3,  283 => 283,  278 => 384,  268 => 370,  264 => 84,  258 => 351,  252 => 121,  247 => 189,  241 => 82,  235 => 308,  229 => 218,  224 => 109,  220 => 287,  214 => 209,  208 => 67,  169 => 207,  143 => 38,  140 => 50,  132 => 46,  128 => 47,  119 => 42,  107 => 34,  71 => 12,  177 => 49,  165 => 65,  160 => 52,  135 => 62,  126 => 144,  114 => 108,  84 => 41,  70 => 21,  67 => 16,  61 => 18,  94 => 31,  89 => 47,  85 => 27,  75 => 19,  68 => 22,  56 => 12,  201 => 85,  196 => 89,  183 => 66,  171 => 213,  166 => 206,  163 => 73,  158 => 189,  156 => 192,  151 => 72,  142 => 54,  138 => 50,  136 => 52,  121 => 39,  117 => 49,  105 => 32,  91 => 56,  62 => 14,  49 => 10,  87 => 28,  21 => 2,  38 => 7,  28 => 3,  24 => 3,  25 => 3,  31 => 2,  26 => 2,  19 => 1,  93 => 28,  88 => 29,  78 => 46,  46 => 11,  44 => 6,  27 => 4,  79 => 32,  72 => 18,  69 => 22,  47 => 14,  40 => 5,  37 => 8,  22 => 2,  246 => 106,  157 => 57,  145 => 61,  139 => 53,  131 => 157,  123 => 36,  120 => 39,  115 => 34,  111 => 107,  108 => 46,  101 => 86,  98 => 31,  96 => 67,  83 => 27,  74 => 23,  66 => 20,  55 => 31,  52 => 15,  50 => 10,  43 => 6,  41 => 5,  35 => 8,  32 => 6,  29 => 3,  209 => 87,  203 => 74,  199 => 262,  193 => 82,  189 => 237,  187 => 199,  182 => 80,  176 => 220,  173 => 194,  168 => 82,  164 => 200,  162 => 71,  154 => 186,  149 => 179,  147 => 54,  144 => 173,  141 => 65,  133 => 44,  130 => 41,  125 => 45,  122 => 54,  116 => 113,  112 => 47,  109 => 102,  106 => 33,  103 => 37,  99 => 68,  95 => 30,  92 => 30,  86 => 46,  82 => 26,  80 => 15,  73 => 23,  64 => 3,  60 => 19,  57 => 29,  54 => 15,  51 => 7,  48 => 8,  45 => 6,  42 => 5,  39 => 5,  36 => 5,  33 => 3,  30 => 2,);
    }
}
