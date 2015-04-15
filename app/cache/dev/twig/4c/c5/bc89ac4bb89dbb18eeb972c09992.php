<?php

/* WebProfilerBundle:Profiler:toolbar.css.twig */
class __TwigTemplate_4cc5bc89ac4bb89dbb18eeb972c09992 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
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
        echo ".sf-minitoolbar {
    display: none;

    position: fixed;
    bottom: 0;
    right: 0;

    padding: 5px 5px 0;

    background-color: #f7f7f7;
    background-image: -moz-linear-gradient(top, #e4e4e4, #ffffff);
    background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#e4e4e4), to(#ffffff));
    background-image: -o-linear-gradient(top, #e4e4e4, #ffffff);
    background: linear-gradient(top, #e4e4e4, #ffffff);

    border-radius: 16px 0 0 0;

    z-index: 6000000;
}

.sf-toolbarreset {
    position: fixed;
    background-color: #f7f7f7;
    left: 0;
    right: 0;
    height: 38px;
    margin: 0;
    padding: 0 40px 0 0;
    z-index: 6000000;
    font: 11px Verdana, Arial, sans-serif;
    text-align: left;
    color: #2f2f2f;

    background-image: -moz-linear-gradient(top, #e4e4e4, #ffffff);
    background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#e4e4e4), to(#ffffff));
    background-image: -o-linear-gradient(top, #e4e4e4, #ffffff);
    background: linear-gradient(top, #e4e4e4, #ffffff);

    bottom: 0;
    border-top: 1px solid #bbb;
}
.sf-toolbarreset abbr {
    border-bottom: 1px dotted #000000;
    cursor: help;
}
.sf-toolbarreset span,
.sf-toolbarreset div {
    font-size: 11px;
}
.sf-toolbarreset img {
    width: auto;
    display: inline;
}

.sf-toolbarreset .hide-button {
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    width: 40px;
    height: 40px;
    cursor: pointer;
    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAMAAAAMCGV4AAAAllBMVEXDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PDw8PExMTPz8/Q0NDR0dHT09Pb29vc3Nzf39/h4eHi4uLj4+P6+vr7+/v8/Pz9/f3///+Nh2QuAAAAIXRSTlMABgwPGBswMzk8QktRV4SKjZOWmaKlq7TAxszb3urt+fy1vNEpAAAAiklEQVQIHUXBBxKCQBREwRFzDqjoGh+C2YV//8u5Sll2S0E/dof1tKdKM6GyqCto7PjZRJIS/mbSELgXOSd/BzpKIH1ZefVWpDDTHsi8mZVnwImPi5ndCLbaAZk3M58Bay0h9VbeSvMpjDUAHj4jL55AW1rxN5fU2PLjIgVRzNdxVFOlGzvnJi0Fb1XNGBHA9uQOAAAAAElFTkSuQmCC');
    background-repeat: no-repeat;
    background-position: 13px 11px;
}

.sf-toolbar-block {
    white-space: nowrap;
    color: #2f2f2f;
    display: block;
    min-height: 28px;
    border-right: 1px solid #e4e4e4;
    padding: 0;
    float: left;
    cursor: default;
}

.sf-toolbar-block span {
    display: inline-block;
}

.sf-toolbar-block .sf-toolbar-info-piece {
    line-height: 19px;
    margin-bottom: 5px;
}

.sf-toolbar-block .sf-toolbar-info-piece .sf-toolbar-status {
    padding: 0px 5px;
    border-radius: 5px;
    margin-bottom: 0px;
    vertical-align: top;
}

.sf-toolbar-block .sf-toolbar-info-piece:last-child {
    margin-bottom: 0;
}

.sf-toolbar-block .sf-toolbar-info-piece a,
.sf-toolbar-block .sf-toolbar-info-piece abbr {
    color: #2f2f2f;
}

.sf-toolbar-block .sf-toolbar-info-piece b {
    display: inline-block;
    width: 110px;
    vertical-align: top;
}

.sf-toolbar-block .sf-toolbar-info-with-next-pointer:after {
    content: ' :: ';
    color: #999;
}

.sf-toolbar-block .sf-toolbar-info-with-delimiter {
    border-right: 1px solid #999;
    padding-right: 5px;
    margin-right: 5px;
}

.sf-toolbar-block .sf-toolbar-info {
    display: none;
    position: absolute;
    background-color: #fff;
    border: 1px solid #bbb;
    padding: 9px 0;
    margin-left: -1px;

    bottom: 38px;
    border-bottom-width: 0;
    border-bottom: 1px solid #bbb;
    border-radius: 4px 4px 0 0;
}

.sf-toolbarreset > div:last-of-type .sf-toolbar-info {
    right: -1px;
}

.sf-toolbar-block .sf-toolbar-info:empty {
    visibility: hidden;
}

.sf-toolbar-block .sf-toolbar-status {
    display: inline-block;
    color: #fff;
    background-color: #666;
    padding: 3px 6px;
    border-radius: 3px;
    margin-bottom: 2px;
    vertical-align: middle;
    min-width: 6px;
    min-height: 13px;
}

.sf-toolbar-block .sf-toolbar-status abbr {
    color: #fff;
    border-bottom: 1px dotted black;
}

.sf-toolbar-block .sf-toolbar-status-green {
    background-color: #759e1a;
}

.sf-toolbar-block .sf-toolbar-status-red {
    background-color: #a33;
}

.sf-toolbar-block .sf-toolbar-status-yellow {
    background-color: #ffcc00;
    color: #000;
}

.sf-toolbar-block .sf-toolbar-status-black {
    background-color: #000;
}

.sf-toolbar-block .sf-toolbar-icon {
    display: block;
}

.sf-toolbar-block .sf-toolbar-icon > a,
.sf-toolbar-block .sf-toolbar-icon > span {
    display: block;
    text-decoration: none;
    margin: 0;
    padding: 5px 8px;
    min-width: 20px;
    text-align: center;
    vertical-align: middle;
}

.sf-toolbar-block .sf-toolbar-icon > a,
.sf-toolbar-block .sf-toolbar-icon > a:link
.sf-toolbar-block .sf-toolbar-icon > a:hover {
    color: black !important;
}

.sf-toolbar-block .sf-toolbar-icon img {
    border-width: 0;
    vertical-align: middle;
}

.sf-toolbar-block .sf-toolbar-icon img + span {
    margin-left: 5px;
    margin-top: 2px;
}

.sf-toolbar-block .sf-toolbar-icon .sf-toolbar-status {
    border-radius: 12px;
    border-bottom-left-radius: 0;
    margin-top: 0;
}

.sf-toolbar-block .sf-toolbar-info-method {
    border-bottom: 1px dashed #ccc;
    cursor: help;
}

.sf-toolbar-block .sf-toolbar-info-method[onclick=\"\"] {
    border-bottom: none;
    cursor: inherit;
}

.sf-toolbar-info-php {}
.sf-toolbar-info-php-ext {}

.sf-toolbar-info-php-ext .sf-toolbar-status {
    margin-left: 2px;
}

.sf-toolbar-info-php-ext .sf-toolbar-status:first-child {
    margin-left: 0;
}

.sf-toolbar-block a .sf-toolbar-info-piece-additional,
.sf-toolbar-block a .sf-toolbar-info-piece-additional-detail {
    display: inline-block;
}

.sf-toolbar-block a .sf-toolbar-info-piece-additional:empty,
.sf-toolbar-block a .sf-toolbar-info-piece-additional-detail:empty {
    display: none;
}

.sf-toolbarreset:hover {
    box-shadow: rgba(0, 0, 0, 0.3) 0 0 50px;
}

.sf-toolbar-block:hover {
    box-shadow: rgba(0, 0, 0, 0.35) 0 0 5px;
    border-right: none;
    margin-right: 1px;
    position: relative;
}

.sf-toolbar-block:hover .sf-toolbar-icon {
    background-color: #fff;
    border-top: 1px dotted #DDD;
    position: relative;
    margin-top: -1px;
    z-index: 10002;
}

.sf-toolbar-block:hover .sf-toolbar-info {
    display: block;
    min-width: -webkit-calc(100% + 2px);
    min-width: calc(100% + 2px);
    z-index: 10001;
    box-sizing: border-box;
    padding: 9px;
    line-height: 19px;
}

/***** Override the setting when the toolbar is on the top *****/
";
        // line 275
        if (((isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")) == "top")) {
            // line 276
            echo "    .sf-minitoolbar {
        top: 0;
        bottom: auto;
        right: 0;

        background-color: #f7f7f7;

        background-image: -moz-linear-gradient(225deg, #e4e4e4, #ffffff);
        background-image: -webkit-gradient(linear, 100% 0%, 0% 0%, from(#e4e4e4), to(#ffffff));
        background-image: -o-linear-gradient(135deg, #e4e4e4, #ffffff);
        background: linear-gradient(225deg, #e4e4e4, #ffffff);

        border-radius: 0 0 0 16px;
    }

    .sf-toolbarreset {
        background-image: -moz-linear-gradient(225deg, #e4e4e4, #ffffff);
        background-image: -webkit-gradient(linear, 100% 0%, 0% 0%, from(#e4e4e4), to(#ffffff));
        background-image: -o-linear-gradient(135deg, #e4e4e4, #ffffff);
        background: linear-gradient(225deg, #e4e4e4, #ffffff);

        top: 0;
        bottom: auto;
        border-bottom: 1px solid #bbb;
    }

    .sf-toolbar-block .sf-toolbar-info {
        top: 39px;
        bottom: auto;
        border-top-width: 0;
        border-radius: 0 0 4px 4px;
    }

    .sf-toolbar-block:hover .sf-toolbar-icon {
        border-top: none;
        border-bottom: 1px dotted #DDD;
        margin-top: 0;
        margin-bottom: -1px;
    }
";
        }
        // line 316
        echo "
";
        // line 317
        if ((!(isset($context["floatable"]) ? $context["floatable"] : $this->getContext($context, "floatable")))) {
            // line 318
            echo "    .sf-toolbarreset {
        position: static;
        background: #cbcbcb;

        background-image: -moz-linear-gradient(90deg, #cbcbcb, #e8e8e8); !important;
        background-image: -webkit-gradient(linear, 0% 0%, 100% 0%, from(#cbcbcb), to(#e8e8e8)); !important;
        background-image: -o-linear-gradient(180deg, #cbcbcb, #e8e8e8); !important;
        background: linear-gradient(90deg, #cbcbcb, #e8e8e8); !important;
    }
";
        }
        // line 328
        echo "
/***** Media query *****/
@media screen and (max-width: 779px) {
    .sf-toolbar-block .sf-toolbar-icon > * > :first-child ~ * {
        display: none;
    }

    .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional,
    .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional-detail {
        display: none !important;
    }
}

@media screen and (min-width: 880px) {
    .sf-toolbar-block .sf-toolbar-icon a[href\$=\"config\"] .sf-toolbar-info-piece-additional {
        display: inline-block;
    }
}

@media screen and (min-width: 980px) {
    .sf-toolbar-block .sf-toolbar-icon a[href\$=\"security\"] .sf-toolbar-info-piece-additional {
        display: inline-block;
    }
}

@media screen and (max-width: 1179px) {
    .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional {
        display: none;
    }
}

@media screen and (max-width: 1439px) {
    .sf-toolbar-block .sf-toolbar-icon > * > .sf-toolbar-info-piece-additional-detail {
        display: none;
    }
}
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar.css.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  282 => 96,  576 => 197,  425 => 145,  269 => 87,  656 => 305,  649 => 301,  629 => 287,  518 => 185,  503 => 176,  472 => 163,  324 => 131,  272 => 87,  1357 => 388,  1348 => 387,  1346 => 386,  1343 => 385,  1327 => 381,  1320 => 380,  1318 => 379,  1315 => 378,  1292 => 374,  1267 => 373,  1265 => 372,  1262 => 371,  1250 => 366,  1245 => 365,  1243 => 364,  1240 => 363,  1231 => 357,  1225 => 355,  1222 => 354,  1217 => 353,  1215 => 352,  1212 => 351,  1205 => 346,  1196 => 344,  1192 => 343,  1189 => 342,  1186 => 341,  1184 => 340,  1181 => 339,  1173 => 335,  1171 => 334,  1168 => 333,  1162 => 329,  1156 => 327,  1153 => 326,  1151 => 325,  1148 => 324,  1139 => 319,  1137 => 318,  1114 => 317,  1111 => 316,  1108 => 315,  1105 => 314,  1102 => 313,  1099 => 312,  1096 => 311,  1094 => 310,  1091 => 309,  1084 => 305,  1080 => 304,  1075 => 303,  1073 => 302,  1070 => 301,  1063 => 296,  1060 => 295,  1052 => 290,  1049 => 289,  1047 => 288,  1044 => 287,  1036 => 282,  1032 => 281,  1028 => 280,  1025 => 279,  1023 => 278,  1020 => 277,  1012 => 273,  1010 => 269,  1008 => 268,  1005 => 267,  1000 => 263,  978 => 258,  975 => 257,  972 => 256,  969 => 255,  966 => 254,  963 => 253,  960 => 252,  957 => 251,  954 => 250,  951 => 249,  948 => 248,  946 => 247,  943 => 246,  935 => 240,  932 => 239,  930 => 238,  927 => 237,  919 => 233,  916 => 232,  914 => 231,  911 => 230,  899 => 226,  896 => 225,  893 => 224,  888 => 222,  885 => 221,  877 => 217,  874 => 216,  861 => 210,  858 => 209,  856 => 208,  853 => 207,  845 => 203,  842 => 202,  840 => 201,  837 => 200,  829 => 196,  826 => 195,  824 => 194,  821 => 193,  813 => 189,  810 => 188,  808 => 187,  805 => 186,  797 => 182,  794 => 181,  789 => 179,  781 => 175,  779 => 174,  776 => 173,  768 => 169,  765 => 168,  763 => 167,  760 => 166,  752 => 162,  749 => 161,  747 => 160,  745 => 159,  742 => 158,  735 => 153,  725 => 152,  720 => 151,  711 => 148,  708 => 147,  706 => 146,  703 => 145,  695 => 139,  692 => 137,  691 => 136,  685 => 134,  679 => 132,  676 => 131,  674 => 130,  671 => 129,  658 => 122,  645 => 119,  639 => 117,  634 => 115,  631 => 114,  610 => 271,  594 => 104,  589 => 102,  553 => 191,  499 => 78,  497 => 77,  489 => 75,  486 => 74,  471 => 72,  459 => 159,  426 => 58,  414 => 52,  403 => 48,  390 => 142,  217 => 66,  212 => 59,  920 => 427,  907 => 419,  887 => 416,  869 => 214,  851 => 414,  841 => 409,  833 => 406,  815 => 391,  792 => 180,  714 => 314,  697 => 300,  650 => 120,  647 => 259,  636 => 116,  632 => 253,  621 => 251,  613 => 109,  600 => 239,  579 => 228,  575 => 227,  569 => 224,  557 => 222,  551 => 92,  543 => 90,  539 => 217,  533 => 214,  525 => 89,  513 => 209,  505 => 80,  501 => 207,  495 => 204,  467 => 198,  463 => 197,  443 => 192,  421 => 184,  363 => 32,  342 => 317,  327 => 143,  306 => 137,  290 => 103,  265 => 100,  250 => 85,  923 => 425,  910 => 417,  890 => 223,  872 => 215,  854 => 412,  844 => 407,  836 => 404,  818 => 389,  795 => 387,  717 => 150,  702 => 300,  698 => 299,  655 => 260,  652 => 259,  641 => 296,  637 => 253,  624 => 251,  620 => 250,  616 => 249,  603 => 239,  590 => 229,  582 => 228,  572 => 98,  554 => 219,  546 => 91,  542 => 217,  522 => 212,  516 => 209,  508 => 81,  490 => 168,  460 => 194,  410 => 176,  366 => 33,  261 => 83,  194 => 53,  693 => 138,  690 => 135,  686 => 245,  588 => 243,  584 => 198,  578 => 227,  570 => 153,  523 => 88,  515 => 135,  511 => 82,  491 => 126,  487 => 203,  483 => 124,  478 => 199,  465 => 118,  456 => 158,  424 => 184,  416 => 148,  328 => 14,  318 => 140,  687 => 337,  662 => 123,  654 => 121,  646 => 257,  638 => 300,  630 => 295,  614 => 285,  606 => 280,  598 => 275,  581 => 225,  574 => 264,  567 => 262,  561 => 223,  558 => 147,  536 => 214,  528 => 213,  520 => 180,  514 => 249,  510 => 248,  502 => 179,  498 => 204,  481 => 202,  464 => 241,  445 => 234,  441 => 233,  383 => 136,  347 => 144,  311 => 148,  302 => 105,  242 => 78,  233 => 76,  406 => 122,  382 => 118,  370 => 160,  274 => 81,  238 => 309,  20 => 1,  571 => 219,  568 => 196,  564 => 223,  408 => 50,  405 => 49,  375 => 186,  359 => 143,  351 => 112,  320 => 130,  316 => 16,  286 => 284,  266 => 84,  262 => 139,  256 => 104,  204 => 56,  161 => 75,  185 => 76,  134 => 32,  378 => 132,  340 => 104,  336 => 123,  330 => 189,  326 => 105,  429 => 230,  422 => 145,  417 => 144,  395 => 8,  388 => 42,  339 => 316,  153 => 59,  506 => 132,  455 => 278,  449 => 193,  434 => 264,  385 => 41,  376 => 27,  372 => 226,  334 => 105,  225 => 68,  689 => 421,  643 => 378,  635 => 372,  627 => 368,  625 => 367,  622 => 290,  617 => 250,  615 => 110,  612 => 361,  607 => 358,  605 => 357,  602 => 356,  597 => 353,  595 => 274,  592 => 103,  587 => 229,  585 => 347,  540 => 183,  537 => 304,  534 => 140,  519 => 212,  494 => 244,  482 => 265,  476 => 166,  473 => 262,  452 => 193,  433 => 60,  411 => 226,  380 => 165,  367 => 160,  344 => 318,  338 => 115,  335 => 21,  331 => 104,  297 => 276,  181 => 50,  332 => 102,  323 => 250,  319 => 116,  315 => 112,  308 => 147,  292 => 144,  288 => 99,  281 => 385,  277 => 101,  254 => 97,  197 => 58,  118 => 34,  100 => 38,  504 => 207,  500 => 175,  496 => 128,  492 => 76,  488 => 243,  484 => 178,  479 => 335,  475 => 199,  470 => 198,  466 => 197,  431 => 160,  396 => 238,  394 => 120,  391 => 168,  377 => 37,  354 => 245,  345 => 107,  343 => 133,  310 => 178,  293 => 6,  284 => 104,  257 => 98,  205 => 69,  178 => 57,  462 => 274,  458 => 252,  454 => 272,  450 => 64,  446 => 151,  442 => 62,  436 => 188,  432 => 149,  419 => 147,  386 => 208,  307 => 114,  304 => 103,  289 => 97,  280 => 96,  276 => 91,  249 => 79,  232 => 75,  198 => 68,  174 => 50,  200 => 74,  186 => 83,  152 => 52,  110 => 22,  76 => 28,  260 => 100,  248 => 72,  245 => 78,  240 => 77,  237 => 77,  228 => 73,  221 => 66,  213 => 71,  180 => 47,  401 => 173,  364 => 115,  361 => 174,  353 => 151,  349 => 138,  346 => 125,  333 => 102,  329 => 101,  325 => 100,  321 => 97,  303 => 296,  299 => 8,  295 => 275,  291 => 86,  287 => 130,  279 => 125,  275 => 70,  271 => 88,  267 => 91,  251 => 79,  243 => 78,  239 => 76,  231 => 69,  227 => 68,  223 => 100,  219 => 72,  215 => 60,  211 => 101,  207 => 58,  195 => 67,  191 => 54,  179 => 51,  175 => 49,  167 => 99,  159 => 50,  155 => 49,  129 => 71,  124 => 36,  104 => 40,  563 => 210,  560 => 195,  556 => 220,  428 => 146,  420 => 171,  415 => 126,  412 => 164,  404 => 161,  400 => 47,  397 => 203,  392 => 209,  389 => 200,  371 => 129,  369 => 256,  358 => 114,  356 => 328,  350 => 203,  348 => 161,  317 => 82,  313 => 115,  301 => 89,  296 => 127,  273 => 125,  270 => 80,  263 => 78,  259 => 77,  253 => 86,  234 => 78,  216 => 60,  192 => 67,  188 => 52,  170 => 49,  63 => 21,  53 => 11,  58 => 17,  23 => 2,  34 => 4,  146 => 69,  148 => 51,  137 => 53,  127 => 60,  113 => 43,  102 => 17,  90 => 32,  81 => 24,  59 => 13,  255 => 86,  244 => 71,  236 => 77,  230 => 68,  226 => 74,  222 => 72,  218 => 71,  210 => 58,  206 => 57,  202 => 75,  190 => 70,  184 => 230,  172 => 78,  150 => 70,  77 => 21,  97 => 41,  65 => 17,  480 => 162,  474 => 161,  469 => 162,  461 => 70,  457 => 194,  453 => 236,  444 => 177,  440 => 105,  437 => 167,  435 => 146,  430 => 187,  427 => 153,  423 => 57,  413 => 147,  409 => 146,  407 => 176,  402 => 130,  398 => 173,  393 => 143,  387 => 143,  384 => 167,  381 => 133,  379 => 262,  374 => 36,  368 => 34,  365 => 128,  362 => 144,  360 => 249,  355 => 27,  341 => 105,  337 => 105,  322 => 141,  314 => 99,  312 => 143,  309 => 109,  305 => 121,  298 => 104,  294 => 90,  285 => 128,  283 => 97,  278 => 82,  268 => 87,  264 => 84,  258 => 87,  252 => 73,  247 => 81,  241 => 76,  235 => 70,  229 => 75,  224 => 62,  220 => 287,  214 => 58,  208 => 100,  169 => 63,  143 => 67,  140 => 66,  132 => 72,  128 => 37,  119 => 22,  107 => 49,  71 => 23,  177 => 65,  165 => 76,  160 => 63,  135 => 62,  126 => 42,  114 => 38,  84 => 27,  70 => 15,  67 => 22,  61 => 12,  94 => 34,  89 => 30,  85 => 32,  75 => 24,  68 => 17,  56 => 11,  201 => 68,  196 => 68,  183 => 66,  171 => 53,  166 => 48,  163 => 51,  158 => 79,  156 => 57,  151 => 48,  142 => 68,  138 => 54,  136 => 73,  121 => 45,  117 => 19,  105 => 18,  91 => 27,  62 => 14,  49 => 13,  87 => 26,  21 => 2,  38 => 6,  28 => 3,  24 => 2,  25 => 35,  31 => 4,  26 => 9,  19 => 1,  93 => 28,  88 => 31,  78 => 26,  46 => 8,  44 => 6,  27 => 1,  79 => 20,  72 => 18,  69 => 13,  47 => 8,  40 => 6,  37 => 7,  22 => 2,  246 => 134,  157 => 44,  145 => 42,  139 => 63,  131 => 61,  123 => 59,  120 => 20,  115 => 36,  111 => 35,  108 => 19,  101 => 43,  98 => 29,  96 => 38,  83 => 24,  74 => 27,  66 => 16,  55 => 9,  52 => 14,  50 => 18,  43 => 11,  41 => 10,  35 => 6,  32 => 3,  29 => 3,  209 => 70,  203 => 75,  199 => 69,  193 => 88,  189 => 72,  187 => 51,  182 => 58,  176 => 79,  173 => 64,  168 => 77,  164 => 98,  162 => 43,  154 => 71,  149 => 43,  147 => 47,  144 => 54,  141 => 55,  133 => 42,  130 => 31,  125 => 40,  122 => 44,  116 => 42,  112 => 41,  109 => 40,  106 => 45,  103 => 19,  99 => 29,  95 => 34,  92 => 37,  86 => 35,  82 => 28,  80 => 30,  73 => 16,  64 => 13,  60 => 14,  57 => 20,  54 => 19,  51 => 8,  48 => 9,  45 => 8,  42 => 7,  39 => 7,  36 => 5,  33 => 4,  30 => 3,);
    }
}
