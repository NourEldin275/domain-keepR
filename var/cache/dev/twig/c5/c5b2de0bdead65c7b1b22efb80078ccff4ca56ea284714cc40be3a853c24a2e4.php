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
        $__internal_d401756fddc30394cc7b228f6ac2fb587ccba1bed95e2d17b2f1931dce7f0843 = $this->env->getExtension("native_profiler");
        $__internal_d401756fddc30394cc7b228f6ac2fb587ccba1bed95e2d17b2f1931dce7f0843->enter($__internal_d401756fddc30394cc7b228f6ac2fb587ccba1bed95e2d17b2f1931dce7f0843_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d401756fddc30394cc7b228f6ac2fb587ccba1bed95e2d17b2f1931dce7f0843->leave($__internal_d401756fddc30394cc7b228f6ac2fb587ccba1bed95e2d17b2f1931dce7f0843_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_905f84b0d44b053686c3ee463196c6294fbda5b20a0cbb1c0b0b102eae838a03 = $this->env->getExtension("native_profiler");
        $__internal_905f84b0d44b053686c3ee463196c6294fbda5b20a0cbb1c0b0b102eae838a03->enter($__internal_905f84b0d44b053686c3ee463196c6294fbda5b20a0cbb1c0b0b102eae838a03_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_905f84b0d44b053686c3ee463196c6294fbda5b20a0cbb1c0b0b102eae838a03->leave($__internal_905f84b0d44b053686c3ee463196c6294fbda5b20a0cbb1c0b0b102eae838a03_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_c382afa22e7ff55670968498c9c4094552c4453777b8ee6dc4edad9ff5e3ca9f = $this->env->getExtension("native_profiler");
        $__internal_c382afa22e7ff55670968498c9c4094552c4453777b8ee6dc4edad9ff5e3ca9f->enter($__internal_c382afa22e7ff55670968498c9c4094552c4453777b8ee6dc4edad9ff5e3ca9f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_c382afa22e7ff55670968498c9c4094552c4453777b8ee6dc4edad9ff5e3ca9f->leave($__internal_c382afa22e7ff55670968498c9c4094552c4453777b8ee6dc4edad9ff5e3ca9f_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_6d35459cc1df146fd8b398c9b860c398c96bbd300e1c1e6e597d04270e4f3046 = $this->env->getExtension("native_profiler");
        $__internal_6d35459cc1df146fd8b398c9b860c398c96bbd300e1c1e6e597d04270e4f3046->enter($__internal_6d35459cc1df146fd8b398c9b860c398c96bbd300e1c1e6e597d04270e4f3046_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_6d35459cc1df146fd8b398c9b860c398c96bbd300e1c1e6e597d04270e4f3046->leave($__internal_6d35459cc1df146fd8b398c9b860c398c96bbd300e1c1e6e597d04270e4f3046_prof);

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
