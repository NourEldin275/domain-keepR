<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_6da5d5c78955f5c657742061b31700cb653178dec9a1b15e8d17775e587bb350 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0568a12deeca34db54732f4e06fd0605ffb84675508f955f62905c30bf413671 = $this->env->getExtension("native_profiler");
        $__internal_0568a12deeca34db54732f4e06fd0605ffb84675508f955f62905c30bf413671->enter($__internal_0568a12deeca34db54732f4e06fd0605ffb84675508f955f62905c30bf413671_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0568a12deeca34db54732f4e06fd0605ffb84675508f955f62905c30bf413671->leave($__internal_0568a12deeca34db54732f4e06fd0605ffb84675508f955f62905c30bf413671_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_fa910ac9af26c4f5b7998ae38ba028ebd3bb723a25988851ba9a228e02660b03 = $this->env->getExtension("native_profiler");
        $__internal_fa910ac9af26c4f5b7998ae38ba028ebd3bb723a25988851ba9a228e02660b03->enter($__internal_fa910ac9af26c4f5b7998ae38ba028ebd3bb723a25988851ba9a228e02660b03_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_fa910ac9af26c4f5b7998ae38ba028ebd3bb723a25988851ba9a228e02660b03->leave($__internal_fa910ac9af26c4f5b7998ae38ba028ebd3bb723a25988851ba9a228e02660b03_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_8e71880e1fdb9eb1e3d7cc5c2ed0a88b4fa9f1ef643d141519e7fa8646d94a14 = $this->env->getExtension("native_profiler");
        $__internal_8e71880e1fdb9eb1e3d7cc5c2ed0a88b4fa9f1ef643d141519e7fa8646d94a14->enter($__internal_8e71880e1fdb9eb1e3d7cc5c2ed0a88b4fa9f1ef643d141519e7fa8646d94a14_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_8e71880e1fdb9eb1e3d7cc5c2ed0a88b4fa9f1ef643d141519e7fa8646d94a14->leave($__internal_8e71880e1fdb9eb1e3d7cc5c2ed0a88b4fa9f1ef643d141519e7fa8646d94a14_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_736675b6d7f4d50feecfc5d18e5ffe95a30901528f0d7cf0d9d9f46b00d9e79d = $this->env->getExtension("native_profiler");
        $__internal_736675b6d7f4d50feecfc5d18e5ffe95a30901528f0d7cf0d9d9f46b00d9e79d->enter($__internal_736675b6d7f4d50feecfc5d18e5ffe95a30901528f0d7cf0d9d9f46b00d9e79d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_736675b6d7f4d50feecfc5d18e5ffe95a30901528f0d7cf0d9d9f46b00d9e79d->leave($__internal_736675b6d7f4d50feecfc5d18e5ffe95a30901528f0d7cf0d9d9f46b00d9e79d_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
