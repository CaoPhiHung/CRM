<?php

/* AevitasChannelBundle:Default:listTemplate.html.twig */
class __TwigTemplate_30b7093e7b7615fd6553448bc99bd5db extends Vietland\AevitasBundle\Helper\AevitasTwigTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AevitasLevisBundle:Backend:root.html.twig");

        $this->blocks = array(
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

    // line 3
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 4
        echo "    <ul class=\"breadcrumb\">
\t<li><a class=\"glyphicons home\" href=\"/backend\"><i></i> BACKEND</a></li>
\t<li class=\"divider\"></li>
        <li><a href=\"#\">Template</a></li>
        <li class=\"divider\"></li>
\t<li style=\"text-transform:uppercase;\"> ";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
        echo " List </li>
    </ul>
";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "    <div class=\"loading-bar\" style=\"display:none;\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/aevitaslevis/images/ajax-loader.gif"), "html", null, true);
        echo "\"></div>
            ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 16
            echo "                <div class=\"alert alert-faded\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                    ";
            // line 18
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo " ";
        // line 24
        echo "    <div class=\"separator\"></div>
    <table aria-describedby=\"DataTables_Table_0_info\" id=\"DataTables_Table_0\" class=\"dynamicTable table table-striped table-bordered table-condensed dataTable\" className=\"\">
            <thead>
                <tr role=\"row\" style=\"color:#0F0\">
                    <th>Template Name</th>

                    <th>Type</th>

                    <th>Action</th>
                    
            </thead>

            <tbody aria-relevant=\"all\" aria-live=\"polite\" role=\"alert\">
                ";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lists"]) ? $context["lists"] : $this->getContext($context, "lists")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 38
            echo "                    <tr class=\"gradeA odd\">
                        <td class=\" \">";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "name"), "html", null, true);
            echo "</td>
                        <td class=\" \">
                            ";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "type"), "html", null, true);
            echo "
                            ";
            // line 62
            echo "                        </td>
                        <td>
                            ";
            // line 65
            echo "                            &nbsp;&nbsp;&nbsp;<a href=\"
                            ";
            // line 66
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_edit_template", array("id" => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "id"), "type" => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "type"))), "html", null, true);
            echo "\" class=\"glyphicons no-js edit\"><i></i>Edit</a>
                            &nbsp;&nbsp;&nbsp;<a href=\"javascript:if(confirm('Are you sure want to delete this Template?')){window.location='";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("backend_delete_template", array("id" => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "id"))), "html", null, true);
            echo "'}\" class=\"glyphicons no-js delete\"><i></i>delete</a>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "            </tbody>
    </table>

    <div class=\"modal fade\" id=\"myModal\" style=\"color:#000\">
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
              <h4 class=\"modal-title\" style=\"color:#000\">Send email</h4>
            </div>
            <div class=\"modal-body\">
            </div>
            <div class=\"modal-footer\">
              <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
              <button type=\"button\" class=\"btn btn-primary\" id=\"bt-process\">Send</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
";
    }

    // line 92
    public function block_javascript($context, array $blocks = array())
    {
        // line 93
        echo "    <script>
        function DoSend(tid){
            \$('.loading-bar').show();
            \$('#myModal #bt-process').removeAttr('disabled');
            \$.ajax({
                url: '";
        // line 98
        echo $this->env->getExtension('routing')->getPath("backend_send_info_template");
        echo "',
                dataType: 'json',
                type: 'post',
                data: {id:tid},
                success: function(response){
                    \$('.loading-bar').hide();
                    console.log(response);
                    if (typeof(response.error)!='undefined'){
                        alert(response.error);
                        return;
                    }
                    if (response.count == 0){
                        \$('#bt-process').attr({'disabled':true});
                    }else{
                        \$('#bt-process').removeAttr('disabled');
                    }
                    //
                    var cts = '<div id =\"div-mes\"></div>';
                    cts += '<div>total users: '+response.count+'</div>';
                    if (typeof(response.mail) != 'undefined' && response.mail == true){
                        cts += '<div><label class=\"checkbox\"><input type=\"checkbox\" id=\"send-email\"/>send E-mail</label></div>';
                    }else{
                        cts += '<div><label class=\"checkbox\"><input type=\"checkbox\" id=\"send-email\" disabled=\"true\"/>send E-mail</label></div>';
                    }
                    if (typeof(response.sms) != 'undefined' && response.sms == true){
                        cts += '<div><label class=\"checkbox\"><input type=\"checkbox\" id=\"send-sms\" />send SMS</label></div>';
                    }else{
                        cts += '<div><label class=\"checkbox\"><input type=\"checkbox\" id=\"send-sms\" disabled=\"true\" />send SMS</label></div>';
                    }
                    cts += '<div id=\"v-status\" style=\"display:none;\">Processing...</div>';
                    cts += '<input type=\"hidden\" id=\"uid\" value=\"'+tid+'\">'
                    \$('#myModal .modal-body').html(cts);
                    \$('#myModal').modal(\"show\");
                }
            });
        }
        
        \$('#myModal #bt-process').click(function(){
            var smsCheck = \$('#send-sms').is(':checked')?1:0;
            var emailCheck = \$('#send-email').is(':checked')?1:0;
            \$('#v-status').show();
            \$('#div-mes').removeClass('alert-success');
            \$('#div-mes').removeClass('alert-danger');
            \$('#div-mes').html('');
            \$.ajax({
                url: '";
        // line 143
        echo $this->env->getExtension('routing')->getPath("backend_send_process_template");
        echo "',
                dataType: 'json',
                type: 'post',
                data: {
                    'send-email': emailCheck,
                    'send-sms': smsCheck,
                    'id': \$('#uid').val()
                },
                success: function(response){
                    \$('#v-status').hide();
                    if (typeof(response.error) != 'undefined' || typeof(response.msg) == 'undefined' || response.msg != 'ok'){
                        // error
                        \$('#div-mes').addClass('alert-danger');
                        \$('#div-mes').html(response.error);
                    }else{
                        // success
                        \$('#myModal #bt-process').attr({'disabled':'disabled'});
                        \$('#div-mes').addClass('alert-success');
                        \$('#div-mes').html(response.msg);
                    }
                }
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "AevitasChannelBundle:Default:listTemplate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  207 => 143,  159 => 98,  152 => 93,  149 => 92,  126 => 71,  116 => 67,  112 => 66,  109 => 65,  105 => 62,  101 => 41,  96 => 39,  93 => 38,  89 => 37,  74 => 24,  72 => 21,  63 => 18,  59 => 16,  55 => 15,  50 => 14,  47 => 13,  40 => 9,  33 => 4,  30 => 3,);
    }
}
