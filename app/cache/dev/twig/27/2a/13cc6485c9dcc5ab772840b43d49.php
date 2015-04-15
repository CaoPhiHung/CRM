<?php

/* AevitasChannelBundle:eLRTE:elrte.html.twig */
class __TwigTemplate_272a13cc6485c9dcc5ab772840b43d49 extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'import' => array($this, 'block_import'),
            'content' => array($this, 'block_content'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('import', $context, $blocks);
        // line 95
        echo "
";
        // line 96
        $this->displayBlock('content', $context, $blocks);
        // line 103
        echo "
";
        // line 104
        $this->displayBlock('javascript', $context, $blocks);
    }

    // line 1
    public function block_import($context, array $blocks = array())
    {
        // line 2
        echo "    <!-- jQuery and UI -->
        <!-- jQuery and UI -->
\t";
        // line 5
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
\t<script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/el_extra/js/jquery-ui-1.8.13.custom.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/el_extra/css/smoothness/jquery-ui-1.8.13.custom.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" title=\"no title\" charset=\"utf-8\">
    <!-- CSS for widgets -->
\t<link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/ellib/css/elcommon.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" charset=\"utf-8\">
\t<link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/ellib/css/elcolorpicker.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" charset=\"utf-8\">
\t<link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/ellib/css/eldialogform.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" charset=\"utf-8\">
\t<link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/ellib/css/elpaddinginput.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" charset=\"utf-8\">
\t<link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/ellib/css/elselect.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" charset=\"utf-8\">
\t<link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/css/elrte.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" charset=\"utf-8\">

\t<!-- Common JS and widgets -->
\t<script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/ellib/js/eli18n.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/ellib/js/eldialogform.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/ellib/js/jquery.elcolorpicker.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/ellib/js/jquery.elborderselect.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/ellib/js/jquery.elpaddinginput.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/ellib/js/jquery.elselect.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>

\t<!-- elRTE core -->
\t<script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/elRTE.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/elRTE.options.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/elRTE.utils.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/elRTE.DOM.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/elRTE.selection.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/elRTE.w3cRange.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/elRTE.ui.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/elRTE.history.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/elRTE.filter.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>

\t<!-- elRTE languages -->
\t<script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/i18n/elrte.en.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>

\t<!-- elRTE buttons -->
\t<script src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/anchor.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/blockquote.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/copy.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/css.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/div.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/docstructure.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/elfinder.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/fontname.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/fontsize.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/forecolor.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/formatblock.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/fullscreen.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/horizontalrule.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/image.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/flash.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/indent.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/justifyleft.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/link.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/nbsp.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/outdent.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/pasteformattext.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/pastetext.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/save.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/stopfloat.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/table.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/tablerm.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/tbcellprops.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/tbcellsmerge.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/tbcellsplit.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/tbcollbefore.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/tbcolrm.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/tbrowbefore.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/tbrowrm.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/unlink.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/undo.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/direction.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/smiley.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/pagebreak.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/js/ui/about.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>

\t<!-- elFinder -->
\t<link rel=\"stylesheet\" href=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elfinder/css/elfinder.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"screen\" charset=\"utf-8\">
\t<script src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elfinder/js/elFinder.js"), "html", null, true);
        echo "\"               type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elfinder/js/elFinder.view.js"), "html", null, true);
        echo "\"          type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elfinder/js/elFinder.ui.js"), "html", null, true);
        echo "\"            type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elfinder/js/elFinder.quickLook.js"), "html", null, true);
        echo "\"     type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elfinder/js/elFinder.eventsManager.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
\t<script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elfinder/js/i18n/elfinder.vi.js"), "html", null, true);
        echo "\" type=\"text/javascript\" charset=\"utf-8\"></script>
        
        <style>
            .el-paddinginput > *{width:40px;}
            input[type=\"text\"]{width:40px;height:18px;padding:0px}
            select{height:18px;padding:0px}
            legend{width:50px;}
        </style>
";
    }

    // line 96
    public function block_content($context, array $blocks = array())
    {
        // line 97
        echo "<!-- <div  style=\"color:#333;\">
    <div id=\"template-content\">
        <textarea name=\"template-content\" class=\"span12\">";
        // line 99
        echo (isset($context["content"]) ? $context["content"] : $this->getContext($context, "content"));
        echo "</textarea>
    </div>
</div> -->
";
    }

    // line 104
    public function block_javascript($context, array $blocks = array())
    {
        // line 105
        echo "<script>
    elRTE.prototype.options.panels.custom = [
            'bold', 'italic', 'underline', 'forecolor',
            'fontsize', 'formatblock', 'insertorderedlist', 'insertunorderedlist', 'docstructure'
    ];
    elRTE.prototype.options.toolbars.custom = ['custom', 'eol', 'undoredo', 'alignment', 'eol', 'links', 'images'];
            \$('#elFinder a').hover(
                    function () {
                            \$('#elFinder a').animate({
                                    'background-position' : '0 -45px'
                            }, 300);
                    },
                    function () {
                            \$('#elFinder a').delay(400).animate({
                                    'background-position' : '0 0'
                            }, 300);
                    }
            );

    \$('#elFinder a').delay(800).animate({'background-position' : '0 0'}, 300);
    var opts = {
    absoluteURLs: false,
    cssClass : 'el-rte',
    lang     : 'en',
    height   : 300,
    toolbar  : 'maxi',
    cssfiles : ['";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/css/elrte-inner.css"), "html", null, true);
        echo "', '";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/elrte/css/inner-example.css"), "html", null, true);
        echo "'],
            // elfinder
            fmOpen   : function(callback) {
                    \$('<div id=\"myelfinder\"></div>').elfinder({
                            url : '";
        // line 135
        echo $this->env->getExtension('routing')->getPath("backend_elfinder_connection");
        echo "',
                            lang : 'en',
                            dialog : { width : 900,height: 600, modal : true, title : 'Files' }, // open in dialog
                            closeOnEditorCallback : true, // close elFinder after file select
                            editorCallback : callback // pass callback to editor
                    });
            },
            // example of user replacement
            // restricts edit of blocks like <!-- BEGIN MY_BLOCK -->anything<!-- END MY_BLOCK -->
            replace : [ function(html) {
                    var self = this;
                    return html.replace(/(<!--\\s*BEGIN\\s*([^>]+)\\s*-->([\\s\\S]*?)<!--\\s*END\\s*(\\2)\\s*-->)/gi, function(t, a, b, c, d) {

                            if (b == d) {
                                    //self.rte.log([b, d]);
                                    var id = 'MYTAG'+Math.random().toString().substring(2);
                                    self.scripts[id] = t;
                                    return '<img id=\"'+id+'\" src=\"'+self.url+'pixel.gif\" class=\"elrte-protected elrte-MYTAG\">';
                            }
                            return html;
                    });
            }],
            restore : [ function(html) {
                    var self = this;
                    return html.replace(this.serviceClassRegExp, function(t, n, a) {
                            a = self.parseAttrs(a);
                            if (a[\"class\"]['elrte-MYTAG']) {
                                    return self.scripts[a.id] + \"\\n\" || '';
                            }
                            return t;
                    });
            }]
    };

    function strip(html){
        var tmp = document.createElement(\"DIV\");
        tmp.innerHTML = html;
        return tmp.textContent||tmp.innerText;
    }
    // create elRTE
";
        // line 177
        echo "    
</script>
";
    }

    public function getTemplateName()
    {
        return "AevitasChannelBundle:eLRTE:elrte.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  401 => 135,  364 => 105,  361 => 104,  353 => 99,  349 => 97,  346 => 96,  333 => 86,  329 => 85,  325 => 84,  321 => 83,  303 => 77,  299 => 76,  295 => 75,  291 => 74,  287 => 73,  279 => 71,  275 => 70,  271 => 69,  267 => 68,  251 => 64,  243 => 62,  239 => 61,  231 => 59,  227 => 58,  223 => 57,  219 => 56,  215 => 55,  211 => 54,  207 => 53,  195 => 50,  191 => 49,  179 => 46,  175 => 45,  167 => 43,  159 => 41,  155 => 40,  129 => 28,  124 => 25,  104 => 21,  563 => 210,  560 => 209,  556 => 205,  428 => 203,  420 => 180,  415 => 169,  412 => 168,  404 => 161,  400 => 108,  397 => 107,  392 => 131,  389 => 8,  371 => 206,  369 => 180,  358 => 171,  356 => 168,  350 => 164,  348 => 161,  317 => 82,  313 => 81,  301 => 129,  296 => 127,  273 => 110,  270 => 109,  263 => 67,  259 => 66,  253 => 101,  234 => 84,  216 => 78,  192 => 71,  188 => 67,  170 => 63,  63 => 11,  53 => 10,  58 => 10,  23 => 3,  34 => 11,  146 => 51,  148 => 53,  137 => 48,  127 => 30,  113 => 49,  102 => 34,  90 => 31,  81 => 17,  59 => 10,  255 => 65,  244 => 7,  236 => 122,  230 => 119,  226 => 118,  222 => 117,  218 => 116,  210 => 75,  206 => 73,  202 => 112,  190 => 106,  184 => 65,  172 => 97,  150 => 84,  77 => 29,  97 => 21,  65 => 25,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 177,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 181,  413 => 134,  409 => 132,  407 => 162,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 212,  379 => 209,  374 => 207,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 80,  305 => 130,  298 => 91,  294 => 90,  285 => 118,  283 => 72,  278 => 86,  268 => 107,  264 => 84,  258 => 81,  252 => 75,  247 => 63,  241 => 77,  235 => 60,  229 => 73,  224 => 71,  220 => 82,  214 => 115,  208 => 68,  169 => 60,  143 => 51,  140 => 48,  132 => 46,  128 => 66,  119 => 28,  107 => 25,  71 => 13,  177 => 65,  165 => 59,  160 => 61,  135 => 32,  126 => 43,  114 => 37,  84 => 17,  70 => 29,  67 => 12,  61 => 17,  94 => 36,  89 => 19,  85 => 18,  75 => 14,  68 => 16,  56 => 22,  201 => 92,  196 => 109,  183 => 47,  171 => 44,  166 => 71,  163 => 42,  158 => 67,  156 => 58,  151 => 39,  142 => 78,  138 => 43,  136 => 56,  121 => 55,  117 => 40,  105 => 40,  91 => 31,  62 => 17,  49 => 20,  87 => 20,  21 => 1,  38 => 6,  28 => 3,  24 => 95,  25 => 1,  31 => 4,  26 => 2,  19 => 1,  93 => 20,  88 => 18,  78 => 30,  46 => 6,  44 => 9,  27 => 96,  79 => 27,  72 => 20,  69 => 19,  47 => 19,  40 => 8,  37 => 10,  22 => 1,  246 => 32,  157 => 88,  145 => 36,  139 => 33,  131 => 31,  123 => 29,  120 => 39,  115 => 27,  111 => 26,  108 => 37,  101 => 22,  98 => 33,  96 => 31,  83 => 28,  74 => 28,  66 => 19,  55 => 9,  52 => 21,  50 => 7,  43 => 5,  41 => 18,  35 => 11,  32 => 104,  29 => 103,  209 => 82,  203 => 52,  199 => 51,  193 => 73,  189 => 71,  187 => 48,  182 => 66,  176 => 98,  173 => 74,  168 => 66,  164 => 59,  162 => 62,  154 => 54,  149 => 51,  147 => 53,  144 => 53,  141 => 50,  133 => 55,  130 => 41,  125 => 44,  122 => 43,  116 => 36,  112 => 42,  109 => 41,  106 => 22,  103 => 37,  99 => 38,  95 => 34,  92 => 33,  86 => 27,  82 => 16,  80 => 19,  73 => 27,  64 => 24,  60 => 23,  57 => 23,  54 => 18,  51 => 23,  48 => 7,  45 => 19,  42 => 6,  39 => 2,  36 => 1,  33 => 10,  30 => 3,);
    }
}
