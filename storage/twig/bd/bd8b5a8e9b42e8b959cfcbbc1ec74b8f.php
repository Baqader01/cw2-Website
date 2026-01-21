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

/* open/index.twig */
class __TwigTemplate_a883501611d0ae2fc4c1b8864e2448db extends Template
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
        yield "<h2>Manage Opening Hours</h2>

<div class=\"week-toggle\">
  <button id=\"show-this-week\">This Week</button>
  <button id=\"show-next-week\">Next Week</button>
</div>

<p id=\"week-label\" class=\"week-label\">
  Week commencing ";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["thisWeekStart"] ?? null), "l d M Y"), "html", null, true);
        yield "
</p>

<table id=\"this-week-table\" class=\"opening-table\">
  <thead>
    <tr>
      <th>Day</th>
      <th>Hours</th>
    </tr>
  </thead>
  <tbody>
    ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["thisWeek"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
            // line 24
            yield "      <tr>
        <td>";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["h"], "day_name", [], "any", false, false, false, 25), "html", null, true);
            yield "</td>
        <td>
          ";
            // line 27
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["h"], "is_closed", [], "any", false, false, false, 27)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 28
                yield "            Closed
          ";
            } else {
                // line 30
                yield "            ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "open_time", [], "any", false, false, false, 30), 0, 5), "html", null, true);
                yield " – ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "close_time", [], "any", false, false, false, 30), 0, 5), "html", null, true);
                yield "
          ";
            }
            // line 32
            yield "        </td>
      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['h'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        yield "  </tbody>
</table>

<table id=\"next-week-table\" class=\"opening-table\" style=\"display:none\">
  <thead>
    <tr>
      <th>Day</th>
      <th>Hours</th>
    </tr>
  </thead>
  <tbody>
    ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["nextWeek"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
            // line 47
            yield "      <tr>
        <td>";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["h"], "day_name", [], "any", false, false, false, 48), "html", null, true);
            yield "</td>
        <td>
          ";
            // line 50
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["h"], "is_closed", [], "any", false, false, false, 50)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 51
                yield "            Closed
          ";
            } else {
                // line 53
                yield "            ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "open_time", [], "any", false, false, false, 53), 0, 5), "html", null, true);
                yield " – ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "close_time", [], "any", false, false, false, 53), 0, 5), "html", null, true);
                yield "
          ";
            }
            // line 55
            yield "        </td>
      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['h'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        yield "  </tbody>
</table>

<script>
const thisWeekLabel = \"Week commencing ";
        // line 62
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["thisWeekStart"] ?? null), "l d M Y"), "html", null, true);
        yield "\";
const nextWeekLabel = \"Week commencing ";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["nextWeekStart"] ?? null), "l d M Y"), "html", null, true);
        yield "\";

document.getElementById('show-this-week').onclick = () => {
  document.getElementById('this-week-table').style.display = 'table';
  document.getElementById('next-week-table').style.display = 'none';
  document.getElementById('week-label').textContent = thisWeekLabel;
};

document.getElementById('show-next-week').onclick = () => {
  document.getElementById('this-week-table').style.display = 'none';
  document.getElementById('next-week-table').style.display = 'table';
  document.getElementById('week-label').textContent = nextWeekLabel;
};
</script>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "open/index.twig";
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
        return array (  173 => 63,  169 => 62,  163 => 58,  155 => 55,  147 => 53,  143 => 51,  141 => 50,  136 => 48,  133 => 47,  129 => 46,  116 => 35,  108 => 32,  100 => 30,  96 => 28,  94 => 27,  89 => 25,  86 => 24,  82 => 23,  68 => 12,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout/base.twig' %}

{% block content %}
<h2>Manage Opening Hours</h2>

<div class=\"week-toggle\">
  <button id=\"show-this-week\">This Week</button>
  <button id=\"show-next-week\">Next Week</button>
</div>

<p id=\"week-label\" class=\"week-label\">
  Week commencing {{ thisWeekStart|date('l d M Y') }}
</p>

<table id=\"this-week-table\" class=\"opening-table\">
  <thead>
    <tr>
      <th>Day</th>
      <th>Hours</th>
    </tr>
  </thead>
  <tbody>
    {% for h in thisWeek %}
      <tr>
        <td>{{ h.day_name }}</td>
        <td>
          {% if h.is_closed %}
            Closed
          {% else %}
            {{ h.open_time|slice(0,5) }} – {{ h.close_time|slice(0,5) }}
          {% endif %}
        </td>
      </tr>
    {% endfor %}
  </tbody>
</table>

<table id=\"next-week-table\" class=\"opening-table\" style=\"display:none\">
  <thead>
    <tr>
      <th>Day</th>
      <th>Hours</th>
    </tr>
  </thead>
  <tbody>
    {% for h in nextWeek %}
      <tr>
        <td>{{ h.day_name }}</td>
        <td>
          {% if h.is_closed %}
            Closed
          {% else %}
            {{ h.open_time|slice(0,5) }} – {{ h.close_time|slice(0,5) }}
          {% endif %}
        </td>
      </tr>
    {% endfor %}
  </tbody>
</table>

<script>
const thisWeekLabel = \"Week commencing {{ thisWeekStart|date('l d M Y') }}\";
const nextWeekLabel = \"Week commencing {{ nextWeekStart|date('l d M Y') }}\";

document.getElementById('show-this-week').onclick = () => {
  document.getElementById('this-week-table').style.display = 'table';
  document.getElementById('next-week-table').style.display = 'none';
  document.getElementById('week-label').textContent = thisWeekLabel;
};

document.getElementById('show-next-week').onclick = () => {
  document.getElementById('this-week-table').style.display = 'none';
  document.getElementById('next-week-table').style.display = 'table';
  document.getElementById('week-label').textContent = nextWeekLabel;
};
</script>

{% endblock %}
", "open/index.twig", "/var/www/html/cw2/src/Views/open/index.twig");
    }
}
