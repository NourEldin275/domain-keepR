<?php

/* clients.html.twig */
class __TwigTemplate_0b6d2885a136c464990ba09f96707b928627ebcce882111a9fce2cb2cc964f14 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_2d110a7da397e980ee45370e198573e8d2017297d3da32e58257ece1df67b597 = $this->env->getExtension("native_profiler");
        $__internal_2d110a7da397e980ee45370e198573e8d2017297d3da32e58257ece1df67b597->enter($__internal_2d110a7da397e980ee45370e198573e8d2017297d3da32e58257ece1df67b597_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "clients.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>
<div id=\"content\">
    <h1>Clients:</h1>
    <a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("add_new_client");
        echo "\">Add new client</a>
    <br>
    ";
        // line 12
        $this->displayBlock('body', $context, $blocks);
        // line 32
        echo "</div>
</body>
</html>";
        
        $__internal_2d110a7da397e980ee45370e198573e8d2017297d3da32e58257ece1df67b597->leave($__internal_2d110a7da397e980ee45370e198573e8d2017297d3da32e58257ece1df67b597_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_2f2b3958e08cc6f67ad97c542caa75b1dbd38dfd947d17358234d70c2ed68fd5 = $this->env->getExtension("native_profiler");
        $__internal_2f2b3958e08cc6f67ad97c542caa75b1dbd38dfd947d17358234d70c2ed68fd5->enter($__internal_2f2b3958e08cc6f67ad97c542caa75b1dbd38dfd947d17358234d70c2ed68fd5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Clients";
        
        $__internal_2f2b3958e08cc6f67ad97c542caa75b1dbd38dfd947d17358234d70c2ed68fd5->leave($__internal_2f2b3958e08cc6f67ad97c542caa75b1dbd38dfd947d17358234d70c2ed68fd5_prof);

    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        $__internal_8abb58955e94cfe9f24aa6f5067bbcc083e8ea3c9d608db58ee8d14b32c7f09b = $this->env->getExtension("native_profiler");
        $__internal_8abb58955e94cfe9f24aa6f5067bbcc083e8ea3c9d608db58ee8d14b32c7f09b->enter($__internal_8abb58955e94cfe9f24aa6f5067bbcc083e8ea3c9d608db58ee8d14b32c7f09b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 13
        echo "        <table>
            <tr>
                <th>Client Name</th>
                <th>Email</th>
                <th>Phone </th>
                <th>Domains</th>
                <th>Notification</th>
            </tr>
            ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["clients"]) ? $context["clients"] : $this->getContext($context, "clients")));
        foreach ($context['_seq'] as $context["_key"] => $context["client"]) {
            // line 22
            echo "                <tr>
                    <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["client"], "name", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["client"], "email", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["client"], "phone", array()), "html", null, true);
            echo "</td>
                    ";
            // line 27
            echo "                    ";
            // line 28
            echo "                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['client'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "        </table>
    ";
        
        $__internal_8abb58955e94cfe9f24aa6f5067bbcc083e8ea3c9d608db58ee8d14b32c7f09b->leave($__internal_8abb58955e94cfe9f24aa6f5067bbcc083e8ea3c9d608db58ee8d14b32c7f09b_prof);

    }

    public function getTemplateName()
    {
        return "clients.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 30,  103 => 28,  101 => 27,  97 => 25,  93 => 24,  89 => 23,  86 => 22,  82 => 21,  72 => 13,  66 => 12,  54 => 5,  45 => 32,  43 => 12,  38 => 10,  30 => 5,  24 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <title>{% block title %}Clients{% endblock %}</title>*/
/* </head>*/
/* <body>*/
/* <div id="content">*/
/*     <h1>Clients:</h1>*/
/*     <a href="{{ path('add_new_client') }}">Add new client</a>*/
/*     <br>*/
/*     {% block body %}*/
/*         <table>*/
/*             <tr>*/
/*                 <th>Client Name</th>*/
/*                 <th>Email</th>*/
/*                 <th>Phone </th>*/
/*                 <th>Domains</th>*/
/*                 <th>Notification</th>*/
/*             </tr>*/
/*             {% for client in clients %}*/
/*                 <tr>*/
/*                     <td>{{ client.name }}</td>*/
/*                     <td>{{ client.email }}</td>*/
/*                     <td>{{ client.phone }}</td>*/
/*                     {#<td>{{ client.domains }}</td>#}*/
/*                     {#<td>{{ client.notification }}</td>#}*/
/*                 </tr>*/
/*             {% endfor %}*/
/*         </table>*/
/*     {% endblock %}*/
/* </div>*/
/* </body>*/
/* </html>*/
