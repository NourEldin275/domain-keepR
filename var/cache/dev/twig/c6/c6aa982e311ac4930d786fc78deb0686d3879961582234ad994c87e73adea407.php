<?php

/* base.html.twig */
class __TwigTemplate_5a7d2cb377d9e398164fe407fe2839ddcdb8567f6bcf4274404b2f0efa7e8ee7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d1ef4f46db17afa92f4ff5ae5315e598c2583742360795f0014ae614056aa7c4 = $this->env->getExtension("native_profiler");
        $__internal_d1ef4f46db17afa92f4ff5ae5315e598c2583742360795f0014ae614056aa7c4->enter($__internal_d1ef4f46db17afa92f4ff5ae5315e598c2583742360795f0014ae614056aa7c4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
<title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 10
        echo "
    ";
        // line 11
        $this->displayBlock('javascripts', $context, $blocks);
        // line 15
        echo "</head>
<body>
<header>";
        // line 17
        $this->displayBlock('header', $context, $blocks);
        echo "</header>
";
        // line 18
        $this->loadTemplate("sidebar.html.twig", "base.html.twig", 18)->display($context);
        // line 19
        echo "
<div id=\"content\" class=\"col-xs-11\">
    ";
        // line 21
        $this->displayBlock('body', $context, $blocks);
        // line 22
        echo "</div>
</body>
</html>";
        
        $__internal_d1ef4f46db17afa92f4ff5ae5315e598c2583742360795f0014ae614056aa7c4->leave($__internal_d1ef4f46db17afa92f4ff5ae5315e598c2583742360795f0014ae614056aa7c4_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_0c757c1265c714b38b1ad736a1ebb5eed30232d7aa86c3e2ae61d4eef6c51b5e = $this->env->getExtension("native_profiler");
        $__internal_0c757c1265c714b38b1ad736a1ebb5eed30232d7aa86c3e2ae61d4eef6c51b5e->enter($__internal_0c757c1265c714b38b1ad736a1ebb5eed30232d7aa86c3e2ae61d4eef6c51b5e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome to Domain Keeper";
        
        $__internal_0c757c1265c714b38b1ad736a1ebb5eed30232d7aa86c3e2ae61d4eef6c51b5e->leave($__internal_0c757c1265c714b38b1ad736a1ebb5eed30232d7aa86c3e2ae61d4eef6c51b5e_prof);

    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_235aacf401d42afcc2f5c8fb981e757138ae6c9ef1494aa60d484306fe1a1d1d = $this->env->getExtension("native_profiler");
        $__internal_235aacf401d42afcc2f5c8fb981e757138ae6c9ef1494aa60d484306fe1a1d1d->enter($__internal_235aacf401d42afcc2f5c8fb981e757138ae6c9ef1494aa60d484306fe1a1d1d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 8
        echo "        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
    ";
        
        $__internal_235aacf401d42afcc2f5c8fb981e757138ae6c9ef1494aa60d484306fe1a1d1d->leave($__internal_235aacf401d42afcc2f5c8fb981e757138ae6c9ef1494aa60d484306fe1a1d1d_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_0a6ddf5c91222913abee8a9e8e9a3f98a296a7d4c4a60e13e87a8ec956543de0 = $this->env->getExtension("native_profiler");
        $__internal_0a6ddf5c91222913abee8a9e8e9a3f98a296a7d4c4a60e13e87a8ec956543de0->enter($__internal_0a6ddf5c91222913abee8a9e8e9a3f98a296a7d4c4a60e13e87a8ec956543de0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 12
        echo "        <script src=\"https://code.jquery.com/jquery-3.1.1.slim.min.js\" integrity=\"sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=\" crossorigin=\"anonymous\"></script>
        <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
    ";
        
        $__internal_0a6ddf5c91222913abee8a9e8e9a3f98a296a7d4c4a60e13e87a8ec956543de0->leave($__internal_0a6ddf5c91222913abee8a9e8e9a3f98a296a7d4c4a60e13e87a8ec956543de0_prof);

    }

    // line 17
    public function block_header($context, array $blocks = array())
    {
        $__internal_1bfcbfa8d32961c88ee3f982d9bd494c0b279f1ba68ec865ef3e2818a8f75eff = $this->env->getExtension("native_profiler");
        $__internal_1bfcbfa8d32961c88ee3f982d9bd494c0b279f1ba68ec865ef3e2818a8f75eff->enter($__internal_1bfcbfa8d32961c88ee3f982d9bd494c0b279f1ba68ec865ef3e2818a8f75eff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        
        $__internal_1bfcbfa8d32961c88ee3f982d9bd494c0b279f1ba68ec865ef3e2818a8f75eff->leave($__internal_1bfcbfa8d32961c88ee3f982d9bd494c0b279f1ba68ec865ef3e2818a8f75eff_prof);

    }

    // line 21
    public function block_body($context, array $blocks = array())
    {
        $__internal_5d94795360c3bbac209da905d52ea32cdff90b33c26c5c70df2ae51b1dc3f41c = $this->env->getExtension("native_profiler");
        $__internal_5d94795360c3bbac209da905d52ea32cdff90b33c26c5c70df2ae51b1dc3f41c->enter($__internal_5d94795360c3bbac209da905d52ea32cdff90b33c26c5c70df2ae51b1dc3f41c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_5d94795360c3bbac209da905d52ea32cdff90b33c26c5c70df2ae51b1dc3f41c->leave($__internal_5d94795360c3bbac209da905d52ea32cdff90b33c26c5c70df2ae51b1dc3f41c_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 21,  111 => 17,  102 => 12,  96 => 11,  88 => 8,  82 => 7,  70 => 5,  61 => 22,  59 => 21,  55 => 19,  53 => 18,  49 => 17,  45 => 15,  43 => 11,  40 => 10,  38 => 7,  33 => 5,  27 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/* <title>{% block title %}Welcome to Domain Keeper{% endblock %}</title>*/
/* */
/*     {% block stylesheets %}*/
/*         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">*/
/*     {% endblock %}*/
/* */
/*     {% block javascripts %}*/
/*         <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc=" crossorigin="anonymous"></script>*/
/*         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>*/
/*     {% endblock %}*/
/* </head>*/
/* <body>*/
/* <header>{% block header %}{% endblock %}</header>*/
/* {% include('sidebar.html.twig') %}*/
/* */
/* <div id="content" class="col-xs-11">*/
/*     {% block body %}{% endblock %}*/
/* </div>*/
/* </body>*/
/* </html>*/
