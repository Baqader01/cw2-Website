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

/* open/manage.twig */
class __TwigTemplate_b1eb774bdf5c9482f1089c5d62ed1279 extends Template
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
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["thisWeek"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
            // line 25
            yield "      <tr>
        <td>";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["h"], "day_name", [], "any", false, false, false, 26), "html", null, true);
            yield "</td>
        <td>
          ";
            // line 28
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["h"], "is_closed", [], "any", false, false, false, 28)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 29
                yield "            Closed
          ";
            } else {
                // line 31
                yield "            ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "open_time", [], "any", false, false, false, 31), 0, 5), "html", null, true);
                yield " – ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "close_time", [], "any", false, false, false, 31), 0, 5), "html", null, true);
                yield "
          ";
            }
            // line 33
            yield "        </td>
        <td>
          <a href=\"/website/opening/edit?week=current\"  class=\"book-button\">
            Edit
          </a>
        </td>
      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['h'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        yield "  </tbody>
</table>

<table id=\"next-week-table\" class=\"opening-table\" style=\"display:none\">
  <thead>
    <tr>
      <th>Day</th>
      <th>Hours</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    ";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["nextWeek"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
            // line 54
            yield "      <tr>
        <td>";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["h"], "day_name", [], "any", false, false, false, 55), "html", null, true);
            yield "</td>
        <td>
          ";
            // line 57
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["h"], "is_closed", [], "any", false, false, false, 57)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 58
                yield "            Closed
          ";
            } else {
                // line 60
                yield "            ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "open_time", [], "any", false, false, false, 60), 0, 5), "html", null, true);
                yield " – ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "close_time", [], "any", false, false, false, 60), 0, 5), "html", null, true);
                yield "
          ";
            }
            // line 62
            yield "        </td>
        <td>
          <a href=\"/website/opening/edit?week=next\" class=\"book-button\">
            Edit
          </a>
        </td>
      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['h'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        yield "  </tbody>
</table>

<script>
const thisWeekLabel = \"Week commencing ";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["thisWeekStart"] ?? null), "l d M Y"), "html", null, true);
        yield "\";
const nextWeekLabel = \"Week commencing ";
        // line 75
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
        return "open/manage.twig";
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
        return array (  185 => 75,  181 => 74,  175 => 70,  162 => 62,  154 => 60,  150 => 58,  148 => 57,  143 => 55,  140 => 54,  136 => 53,  122 => 41,  109 => 33,  101 => 31,  97 => 29,  95 => 28,  90 => 26,  87 => 25,  83 => 24,  68 => 12,  58 => 4,  51 => 3,  40 => 1,);
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
      <th>Actions</th>
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
        <td>
          <a href=\"/website/opening/edit?week=current\"  class=\"book-button\">
            Edit
          </a>
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
      <th>Actions</th>
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
        <td>
          <a href=\"/website/opening/edit?week=next\" class=\"book-button\">
            Edit
          </a>
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
", "open/manage.twig", "/var/www/html/website/src/Views/open/manage.twig");
    }
}
