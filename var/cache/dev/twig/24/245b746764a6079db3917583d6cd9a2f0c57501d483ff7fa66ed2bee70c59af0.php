<?php

/* new-domain.html.twig */
class __TwigTemplate_7c564ece8dcf08573d11c160cec22a189954c558123f785cfe674aaec693061e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "new-domain.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5840be5f807405149c69abae767c47752f69b72b6c40c388e86900783c9be45f = $this->env->getExtension("native_profiler");
        $__internal_5840be5f807405149c69abae767c47752f69b72b6c40c388e86900783c9be45f->enter($__internal_5840be5f807405149c69abae767c47752f69b72b6c40c388e86900783c9be45f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "new-domain.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5840be5f807405149c69abae767c47752f69b72b6c40c388e86900783c9be45f->leave($__internal_5840be5f807405149c69abae767c47752f69b72b6c40c388e86900783c9be45f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_0960488addc7426ff296543adeea23b90f763a8d0c61892d00128157d5e582ec = $this->env->getExtension("native_profiler");
        $__internal_0960488addc7426ff296543adeea23b90f763a8d0c61892d00128157d5e582ec->enter($__internal_0960488addc7426ff296543adeea23b90f763a8d0c61892d00128157d5e582ec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Add a new domain ";
        
        $__internal_0960488addc7426ff296543adeea23b90f763a8d0c61892d00128157d5e582ec->leave($__internal_0960488addc7426ff296543adeea23b90f763a8d0c61892d00128157d5e582ec_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_71fe3b62615a4bb32f886e8e590bd21a05a96ca468d399c68daed4e7eda39ed6 = $this->env->getExtension("native_profiler");
        $__internal_71fe3b62615a4bb32f886e8e590bd21a05a96ca468d399c68daed4e7eda39ed6->enter($__internal_71fe3b62615a4bb32f886e8e590bd21a05a96ca468d399c68daed4e7eda39ed6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <div id=\"sidebar\">
        ";
        // line 7
        $this->displayBlock('sidebar', $context, $blocks);
        // line 13
        echo "    </div>

    <h1>Add a new domain</h1>
";
        
        $__internal_71fe3b62615a4bb32f886e8e590bd21a05a96ca468d399c68daed4e7eda39ed6->leave($__internal_71fe3b62615a4bb32f886e8e590bd21a05a96ca468d399c68daed4e7eda39ed6_prof);

    }

    // line 7
    public function block_sidebar($context, array $blocks = array())
    {
        $__internal_e5f754a82a34b7dab63c7216c67489e6571ba4e7439bc559cade4e4ed7ed2651 = $this->env->getExtension("native_profiler");
        $__internal_e5f754a82a34b7dab63c7216c67489e6571ba4e7439bc559cade4e4ed7ed2651->enter($__internal_e5f754a82a34b7dab63c7216c67489e6571ba4e7439bc559cade4e4ed7ed2651_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar"));

        // line 8
        echo "            <ul>
                <li><a href=\"/\">Home</a></li>
                <li><a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("add_new_domain");
        echo "\">Add New Domain</a></li>
            </ul>
        ";
        
        $__internal_e5f754a82a34b7dab63c7216c67489e6571ba4e7439bc559cade4e4ed7ed2651->leave($__internal_e5f754a82a34b7dab63c7216c67489e6571ba4e7439bc559cade4e4ed7ed2651_prof);

    }

    public function getTemplateName()
    {
        return "new-domain.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 10,  75 => 8,  69 => 7,  59 => 13,  57 => 7,  54 => 6,  48 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}Add a new domain {% endblock %}*/
/* */
/* {% block body %}*/
/*     <div id="sidebar">*/
/*         {% block sidebar %}*/
/*             <ul>*/
/*                 <li><a href="/">Home</a></li>*/
/*                 <li><a href="{{ path ('add_new_domain') }}">Add New Domain</a></li>*/
/*             </ul>*/
/*         {% endblock %}*/
/*     </div>*/
/* */
/*     <h1>Add a new domain</h1>*/
/* {% endblock %}*/
/* */
/* */
/* */
