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

/* open/edit.twig */
class __TwigTemplate_bf180156a4c795532b469b355271a440 extends Template
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
        yield "<h2>Edit Opening Hours</h2>

<p class=\"week-label\">
  Week commencing ";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["weekStart"] ?? null), "l d M Y"), "html", null, true);
        yield "
</p>

<form method=\"post\" action=\"/cw2/public/opening/save\">
  <input type=\"hidden\" name=\"week\" value=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["week"] ?? null), "html", null, true);
        yield "\">

  <table class=\"shifts-table\">
    <thead>
      <tr>
        <th>Day</th>
        <th>Open</th>
        <th>Close</th>
        <th>Closed</th>
      </tr>
    </thead>
    <tbody>
      ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["hours"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
            // line 24
            yield "        <tr>
          <td>";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["h"], "day_name", [], "any", false, false, false, 25), "html", null, true);
            yield "</td>

          <td>
            <input type=\"time\"
                name=\"days[";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["h"], "day_name", [], "any", false, false, false, 29), "html", null, true);
            yield "][open_time]\"
                value=\"";
            // line 30
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["h"], "open_time", [], "any", false, false, false, 30)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "open_time", [], "any", false, false, false, 30), 0, 5), "html", null, true)) : (""));
            yield "\"
                ";
            // line 31
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["h"], "is_closed", [], "any", false, false, false, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "readonly";
            }
            yield ">

          </td>

          <td>
            <input type=\"time\"
                   name=\"days[";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["h"], "day_name", [], "any", false, false, false, 37), "html", null, true);
            yield "][close_time]\"
                   value=\"";
            // line 38
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["h"], "close_time", [], "any", false, false, false, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "close_time", [], "any", false, false, false, 38), 0, 5), "html", null, true)) : (""));
            yield "\"
                   ";
            // line 39
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["h"], "is_closed", [], "any", false, false, false, 39)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "readonly";
            }
            yield ">
          </td>

          <td>
            <input type=\"checkbox\"
                   name=\"days[";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["h"], "day_name", [], "any", false, false, false, 44), "html", null, true);
            yield "][is_closed]\"
                   ";
            // line 45
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["h"], "is_closed", [], "any", false, false, false, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "checked";
            }
            yield ">
          </td>
        </tr>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['h'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        yield "    </tbody>
  </table>

  <button type=\"submit\">Save Changes</button>
  <a href=\"/cw2/public/opening\">Cancel</a>
</form>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "open/edit.twig";
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
        return array (  152 => 49,  140 => 45,  136 => 44,  126 => 39,  122 => 38,  118 => 37,  107 => 31,  103 => 30,  99 => 29,  92 => 25,  89 => 24,  85 => 23,  70 => 11,  63 => 7,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout/base.twig' %}

{% block content %}
<h2>Edit Opening Hours</h2>

<p class=\"week-label\">
  Week commencing {{ weekStart|date('l d M Y') }}
</p>

<form method=\"post\" action=\"/cw2/public/opening/save\">
  <input type=\"hidden\" name=\"week\" value=\"{{ week }}\">

  <table class=\"shifts-table\">
    <thead>
      <tr>
        <th>Day</th>
        <th>Open</th>
        <th>Close</th>
        <th>Closed</th>
      </tr>
    </thead>
    <tbody>
      {% for h in hours %}
        <tr>
          <td>{{ h.day_name }}</td>

          <td>
            <input type=\"time\"
                name=\"days[{{ h.day_name }}][open_time]\"
                value=\"{{ h.open_time ? h.open_time|slice(0,5) : '' }}\"
                {% if h.is_closed %}readonly{% endif %}>

          </td>

          <td>
            <input type=\"time\"
                   name=\"days[{{ h.day_name }}][close_time]\"
                   value=\"{{ h.close_time ? h.close_time|slice(0,5) : '' }}\"
                   {% if h.is_closed %}readonly{% endif %}>
          </td>

          <td>
            <input type=\"checkbox\"
                   name=\"days[{{ h.day_name }}][is_closed]\"
                   {% if h.is_closed %}checked{% endif %}>
          </td>
        </tr>
      {% endfor %}
    </tbody>
  </table>

  <button type=\"submit\">Save Changes</button>
  <a href=\"/cw2/public/opening\">Cancel</a>
</form>
{% endblock %}
", "open/edit.twig", "/var/www/html/cw2/src/Views/open/edit.twig");
    }
}
