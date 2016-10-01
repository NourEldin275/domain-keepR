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
        $__internal_399bc7a418e5c6e79e9166af837393530806f7ec76f03d4a80af4853c758474a = $this->env->getExtension("native_profiler");
        $__internal_399bc7a418e5c6e79e9166af837393530806f7ec76f03d4a80af4853c758474a->enter($__internal_399bc7a418e5c6e79e9166af837393530806f7ec76f03d4a80af4853c758474a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "clients.html.twig"));

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
<div id=\"messages\">
    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashBag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 10
            echo "        <h4>";
            echo twig_escape_filter($this->env, $context["flash_message"], "html", null, true);
            echo "</h4>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash_message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "</div>
<div id=\"content\">
    <h1>Clients:</h1>
    <a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("add_new_client");
        echo "\">Add new client</a>
    <br>
    ";
        // line 17
        $this->displayBlock('body', $context, $blocks);
        // line 42
        echo "</div>
</body>
</html>";
        
        $__internal_399bc7a418e5c6e79e9166af837393530806f7ec76f03d4a80af4853c758474a->leave($__internal_399bc7a418e5c6e79e9166af837393530806f7ec76f03d4a80af4853c758474a_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_b862a08c59117f02cef736cd04493e7b4a2d440bfdebeb6e9a8eb3014d40f844 = $this->env->getExtension("native_profiler");
        $__internal_b862a08c59117f02cef736cd04493e7b4a2d440bfdebeb6e9a8eb3014d40f844->enter($__internal_b862a08c59117f02cef736cd04493e7b4a2d440bfdebeb6e9a8eb3014d40f844_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Clients";
        
        $__internal_b862a08c59117f02cef736cd04493e7b4a2d440bfdebeb6e9a8eb3014d40f844->leave($__internal_b862a08c59117f02cef736cd04493e7b4a2d440bfdebeb6e9a8eb3014d40f844_prof);

    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        $__internal_2d840c3083c29fa48114f18acc32152192afb2c877d0aa7a35e614e4e5d51f4f = $this->env->getExtension("native_profiler");
        $__internal_2d840c3083c29fa48114f18acc32152192afb2c877d0aa7a35e614e4e5d51f4f->enter($__internal_2d840c3083c29fa48114f18acc32152192afb2c877d0aa7a35e614e4e5d51f4f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 18
        echo "        ";
        if ( !twig_test_empty((isset($context["clients"]) ? $context["clients"] : $this->getContext($context, "clients")))) {
            // line 19
            echo "        <table>
            <tr>
                <th>Client Name</th>
                <th>Email</th>
                <th>Phone </th>
                <th>Domains</th>
                <th>Notification</th>
            </tr>
            ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["clients"]) ? $context["clients"] : $this->getContext($context, "clients")));
            foreach ($context['_seq'] as $context["_key"] => $context["client"]) {
                // line 28
                echo "                <tr>
                    <td>";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($context["client"], "name", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($context["client"], "email", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($context["client"], "phone", array()), "html", null, true);
                echo "</td>
                    ";
                // line 33
                echo "                    ";
                // line 34
                echo "                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['client'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "        </table>

        ";
        } else {
            // line 39
            echo "            <h4>No records found.</h4>
        ";
        }
        // line 41
        echo "    ";
        
        $__internal_2d840c3083c29fa48114f18acc32152192afb2c877d0aa7a35e614e4e5d51f4f->leave($__internal_2d840c3083c29fa48114f18acc32152192afb2c877d0aa7a35e614e4e5d51f4f_prof);

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
        return array (  139 => 41,  135 => 39,  130 => 36,  123 => 34,  121 => 33,  117 => 31,  113 => 30,  109 => 29,  106 => 28,  102 => 27,  92 => 19,  89 => 18,  83 => 17,  71 => 5,  62 => 42,  60 => 17,  55 => 15,  50 => 12,  41 => 10,  37 => 9,  30 => 5,  24 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <title>{% block title %}Clients{% endblock %}</title>*/
/* </head>*/
/* <body>*/
/* <div id="messages">*/
/*     {% for flash_message in app.session.flashBag.get('notice') %}*/
/*         <h4>{{ flash_message }}</h4>*/
/*     {% endfor %}*/
/* </div>*/
/* <div id="content">*/
/*     <h1>Clients:</h1>*/
/*     <a href="{{ path('add_new_client') }}">Add new client</a>*/
/*     <br>*/
/*     {% block body %}*/
/*         {% if clients is not empty %}*/
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
/* */
/*         {% else %}*/
/*             <h4>No records found.</h4>*/
/*         {% endif %}*/
/*     {% endblock %}*/
/* </div>*/
/* </body>*/
/* </html>*/
