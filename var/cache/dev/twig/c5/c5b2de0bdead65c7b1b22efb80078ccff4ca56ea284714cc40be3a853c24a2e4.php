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
        $__internal_c0046a5d946d78facc3108f1f2b2c32a1bcfde022ef61081d44fb697feddf29d = $this->env->getExtension("native_profiler");
        $__internal_c0046a5d946d78facc3108f1f2b2c32a1bcfde022ef61081d44fb697feddf29d->enter($__internal_c0046a5d946d78facc3108f1f2b2c32a1bcfde022ef61081d44fb697feddf29d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c0046a5d946d78facc3108f1f2b2c32a1bcfde022ef61081d44fb697feddf29d->leave($__internal_c0046a5d946d78facc3108f1f2b2c32a1bcfde022ef61081d44fb697feddf29d_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_851ca724cd9c2f99dfa3861fc63c5a7c4372abb359eb8185ab6dcef0703ac702 = $this->env->getExtension("native_profiler");
        $__internal_851ca724cd9c2f99dfa3861fc63c5a7c4372abb359eb8185ab6dcef0703ac702->enter($__internal_851ca724cd9c2f99dfa3861fc63c5a7c4372abb359eb8185ab6dcef0703ac702_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_851ca724cd9c2f99dfa3861fc63c5a7c4372abb359eb8185ab6dcef0703ac702->leave($__internal_851ca724cd9c2f99dfa3861fc63c5a7c4372abb359eb8185ab6dcef0703ac702_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_23f01fa0d3df638abf174b03d5a79bef10521647adb900b94b4caf737a9f365f = $this->env->getExtension("native_profiler");
        $__internal_23f01fa0d3df638abf174b03d5a79bef10521647adb900b94b4caf737a9f365f->enter($__internal_23f01fa0d3df638abf174b03d5a79bef10521647adb900b94b4caf737a9f365f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_23f01fa0d3df638abf174b03d5a79bef10521647adb900b94b4caf737a9f365f->leave($__internal_23f01fa0d3df638abf174b03d5a79bef10521647adb900b94b4caf737a9f365f_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_cb535f64a659f38de3b9aecc68bf861e620c578dfccf1cff9d225754ddb0afd8 = $this->env->getExtension("native_profiler");
        $__internal_cb535f64a659f38de3b9aecc68bf861e620c578dfccf1cff9d225754ddb0afd8->enter($__internal_cb535f64a659f38de3b9aecc68bf861e620c578dfccf1cff9d225754ddb0afd8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_cb535f64a659f38de3b9aecc68bf861e620c578dfccf1cff9d225754ddb0afd8->leave($__internal_cb535f64a659f38de3b9aecc68bf861e620c578dfccf1cff9d225754ddb0afd8_prof);

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
