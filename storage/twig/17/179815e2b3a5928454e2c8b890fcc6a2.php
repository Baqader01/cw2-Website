<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* register.twig */
class __TwigTemplate_d766b868a0f8e550fabcca3a4c670a92 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "layout/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("layout/base.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "
  ";
        // line 5
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(($context["errors"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 6
            yield "    <div class=\"error-box\">
      <ul>
        ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
                // line 9
                yield "          <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["e"], "html", null, true);
                yield "</li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['e'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            yield "      </ul>
    </div>
  ";
        }
        // line 14
        yield "
  <form method=\"POST\" action=\"\">
    <h2>Volunteer Registration</h2>
    <p>Fill in the form below to register as a volunteer.</p>

    <label>
      Full name
      <input
        type=\"text\"
        name=\"full_name\"
        value=\"";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["old"] ?? null), "full_name", [], "any", true, true, false, 24)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["old"] ?? null), "full_name", [], "any", false, false, false, 24), "")) : ("")), "html", null, true);
        yield "\"
        required
      >
    </label>

    <label>
      Email
      <input
        type=\"email\"
        name=\"email\"
        value=\"";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["old"] ?? null), "email", [], "any", true, true, false, 34)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["old"] ?? null), "email", [], "any", false, false, false, 34), "")) : ("")), "html", null, true);
        yield "\"
        required
      >
    </label>

    <label>
      Phone
      <input
        type=\"text\"
        name=\"phone\"
        value=\"";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["old"] ?? null), "phone", [], "any", true, true, false, 44)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["old"] ?? null), "phone", [], "any", false, false, false, 44), "")) : ("")), "html", null, true);
        yield "\"
      >
    </label>

    <label>
      Password
      <input type=\"password\" name=\"password\" required>
    </label>

    <label>
      Confirm password
      <input type=\"password\" name=\"password_confirm\" required>
    </label>

    <label>
      <input
        type=\"checkbox\"
        name=\"over18\"
        ";
        // line 62
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["old"] ?? null), "over18", [], "any", true, true, false, 62) && CoreExtension::getAttribute($this->env, $this->source, ($context["old"] ?? null), "over18", [], "any", false, false, false, 62))) {
            // line 63
            yield "          checked
        ";
        }
        // line 65
        yield "        required
      >
      I confirm I am over 18
    </label>

    <button type=\"submit\" class=\"button\">Register</button>
  </form>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "register.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  150 => 65,  146 => 63,  144 => 62,  123 => 44,  110 => 34,  97 => 24,  85 => 14,  80 => 11,  71 => 9,  67 => 8,  63 => 6,  61 => 5,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout/base.twig' %}

{% block content %}

  {% if errors is not empty %}
    <div class=\"error-box\">
      <ul>
        {% for e in errors %}
          <li>{{ e }}</li>
        {% endfor %}
      </ul>
    </div>
  {% endif %}

  <form method=\"POST\" action=\"\">
    <h2>Volunteer Registration</h2>
    <p>Fill in the form below to register as a volunteer.</p>

    <label>
      Full name
      <input
        type=\"text\"
        name=\"full_name\"
        value=\"{{ old.full_name|default('') }}\"
        required
      >
    </label>

    <label>
      Email
      <input
        type=\"email\"
        name=\"email\"
        value=\"{{ old.email|default('') }}\"
        required
      >
    </label>

    <label>
      Phone
      <input
        type=\"text\"
        name=\"phone\"
        value=\"{{ old.phone|default('') }}\"
      >
    </label>

    <label>
      Password
      <input type=\"password\" name=\"password\" required>
    </label>

    <label>
      Confirm password
      <input type=\"password\" name=\"password_confirm\" required>
    </label>

    <label>
      <input
        type=\"checkbox\"
        name=\"over18\"
        {% if old.over18 is defined and old.over18 %}
          checked
        {% endif %}
        required
      >
      I confirm I am over 18
    </label>

    <button type=\"submit\" class=\"button\">Register</button>
  </form>

{% endblock %}
", "register.twig", "/var/www/html/cw2/src/Views/register.twig");
    }
}
