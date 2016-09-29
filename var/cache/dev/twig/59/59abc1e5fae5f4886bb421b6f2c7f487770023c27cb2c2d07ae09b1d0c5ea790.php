<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_70d4eb72ee5846809054c0198083e3c9da9f1d8df2014b96116fe0e7b6e58412 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5d4c34d7c3aeb2ea78f94edac2294c4c81b56dd11fda6d8fb92181c1f8db26e8 = $this->env->getExtension("native_profiler");
        $__internal_5d4c34d7c3aeb2ea78f94edac2294c4c81b56dd11fda6d8fb92181c1f8db26e8->enter($__internal_5d4c34d7c3aeb2ea78f94edac2294c4c81b56dd11fda6d8fb92181c1f8db26e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5d4c34d7c3aeb2ea78f94edac2294c4c81b56dd11fda6d8fb92181c1f8db26e8->leave($__internal_5d4c34d7c3aeb2ea78f94edac2294c4c81b56dd11fda6d8fb92181c1f8db26e8_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_8f4acf2be9a5392c3eeed565b5fa0200c40378a9f1eba1bca96a0fb7ebbe75e0 = $this->env->getExtension("native_profiler");
        $__internal_8f4acf2be9a5392c3eeed565b5fa0200c40378a9f1eba1bca96a0fb7ebbe75e0->enter($__internal_8f4acf2be9a5392c3eeed565b5fa0200c40378a9f1eba1bca96a0fb7ebbe75e0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_8f4acf2be9a5392c3eeed565b5fa0200c40378a9f1eba1bca96a0fb7ebbe75e0->leave($__internal_8f4acf2be9a5392c3eeed565b5fa0200c40378a9f1eba1bca96a0fb7ebbe75e0_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_b1fc2ad2e6e8d7b30ecee3d88e22755ad074eeb91612496bcfe84d4d85a468c0 = $this->env->getExtension("native_profiler");
        $__internal_b1fc2ad2e6e8d7b30ecee3d88e22755ad074eeb91612496bcfe84d4d85a468c0->enter($__internal_b1fc2ad2e6e8d7b30ecee3d88e22755ad074eeb91612496bcfe84d4d85a468c0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_b1fc2ad2e6e8d7b30ecee3d88e22755ad074eeb91612496bcfe84d4d85a468c0->leave($__internal_b1fc2ad2e6e8d7b30ecee3d88e22755ad074eeb91612496bcfe84d4d85a468c0_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_50906654ef20fe077df1f33b45a8baec72185ce4b1f26cc4bcdfef005029ec16 = $this->env->getExtension("native_profiler");
        $__internal_50906654ef20fe077df1f33b45a8baec72185ce4b1f26cc4bcdfef005029ec16->enter($__internal_50906654ef20fe077df1f33b45a8baec72185ce4b1f26cc4bcdfef005029ec16_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_50906654ef20fe077df1f33b45a8baec72185ce4b1f26cc4bcdfef005029ec16->leave($__internal_50906654ef20fe077df1f33b45a8baec72185ce4b1f26cc4bcdfef005029ec16_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
