<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_da1dc7d5958804a7ed261cdd12acef9f57a1b5eedaf075b31b799ea9eb9d7082 extends Twig_Template
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
        $__internal_eb9adc2f203c548eea9764ce7fe6a3923415938491eb7abf72f1d45e5a57dbaf = $this->env->getExtension("native_profiler");
        $__internal_eb9adc2f203c548eea9764ce7fe6a3923415938491eb7abf72f1d45e5a57dbaf->enter($__internal_eb9adc2f203c548eea9764ce7fe6a3923415938491eb7abf72f1d45e5a57dbaf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_eb9adc2f203c548eea9764ce7fe6a3923415938491eb7abf72f1d45e5a57dbaf->leave($__internal_eb9adc2f203c548eea9764ce7fe6a3923415938491eb7abf72f1d45e5a57dbaf_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_09d735e09878a6a35f1724695ebacae344376d0fe229ce733ff64f603487f6d1 = $this->env->getExtension("native_profiler");
        $__internal_09d735e09878a6a35f1724695ebacae344376d0fe229ce733ff64f603487f6d1->enter($__internal_09d735e09878a6a35f1724695ebacae344376d0fe229ce733ff64f603487f6d1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_09d735e09878a6a35f1724695ebacae344376d0fe229ce733ff64f603487f6d1->leave($__internal_09d735e09878a6a35f1724695ebacae344376d0fe229ce733ff64f603487f6d1_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_d0b848cc966388e5b0b9d8ab55439139a678e529159a9791b483b22ccd90cfd0 = $this->env->getExtension("native_profiler");
        $__internal_d0b848cc966388e5b0b9d8ab55439139a678e529159a9791b483b22ccd90cfd0->enter($__internal_d0b848cc966388e5b0b9d8ab55439139a678e529159a9791b483b22ccd90cfd0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_d0b848cc966388e5b0b9d8ab55439139a678e529159a9791b483b22ccd90cfd0->leave($__internal_d0b848cc966388e5b0b9d8ab55439139a678e529159a9791b483b22ccd90cfd0_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_b526e81847b47feec2e68b1bf036be82963d02932d693179a5df121306de2c91 = $this->env->getExtension("native_profiler");
        $__internal_b526e81847b47feec2e68b1bf036be82963d02932d693179a5df121306de2c91->enter($__internal_b526e81847b47feec2e68b1bf036be82963d02932d693179a5df121306de2c91_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_b526e81847b47feec2e68b1bf036be82963d02932d693179a5df121306de2c91->leave($__internal_b526e81847b47feec2e68b1bf036be82963d02932d693179a5df121306de2c91_prof);

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
