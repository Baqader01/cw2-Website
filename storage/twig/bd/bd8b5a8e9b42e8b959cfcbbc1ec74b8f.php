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
            'scripts' => [$this, 'block_scripts'],
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

<p id=\"week-label\"
   class=\"week-label\"
   data-this-week=\"Week commencing ";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["thisWeekStart"] ?? null), "l d M Y"), "html", null, true);
        yield "\"
   data-next-week=\"Week commencing ";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["nextWeekStart"] ?? null), "l d M Y"), "html", null, true);
        yield "\">
  Week commencing ";
        // line 15
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
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["thisWeek"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
            // line 28
            yield "      <tr>
        <td>";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["h"], "day_name", [], "any", false, false, false, 29), "html", null, true);
            yield "</td>
        <td>
          ";
            // line 31
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["h"], "is_closed", [], "any", false, false, false, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 32
                yield "            Closed
          ";
            } else {
                // line 34
                yield "            ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "open_time", [], "any", false, false, false, 34), 0, 5), "html", null, true);
                yield " – ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "close_time", [], "any", false, false, false, 34), 0, 5), "html", null, true);
                yield "
          ";
            }
            // line 36
            yield "        </td>
      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['h'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
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
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["nextWeek"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["h"]) {
            // line 51
            yield "      <tr>
        <td>";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["h"], "day_name", [], "any", false, false, false, 52), "html", null, true);
            yield "</td>
        <td>
          ";
            // line 54
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["h"], "is_closed", [], "any", false, false, false, 54)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 55
                yield "            Closed
          ";
            } else {
                // line 57
                yield "            ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "open_time", [], "any", false, false, false, 57), 0, 5), "html", null, true);
                yield " – ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["h"], "close_time", [], "any", false, false, false, 57), 0, 5), "html", null, true);
                yield "
          ";
            }
            // line 59
            yield "        </td>
      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['h'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        yield "  </tbody>
</table>

";
        // line 65
        if ((($tmp = ($context["isStaff"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 66
            yield "  <div class=\"shift-actions\">
    <a id=\"edit-week-btn\"
       href=\"/website/opening/edit?week=current\"
       class=\"book-button\">
      Edit Opening Hours
    </a>
  </div>
";
        }
        // line 74
        yield "
";
        yield from [];
    }

    // line 77
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 78
        yield "  <script src=\"/website/assets/js/opening-hours.js\"></script>
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
        return array (  204 => 78,  197 => 77,  191 => 74,  181 => 66,  179 => 65,  174 => 62,  166 => 59,  158 => 57,  154 => 55,  152 => 54,  147 => 52,  144 => 51,  140 => 50,  127 => 39,  119 => 36,  111 => 34,  107 => 32,  105 => 31,  100 => 29,  97 => 28,  93 => 27,  78 => 15,  74 => 14,  70 => 13,  59 => 4,  52 => 3,  41 => 1,);
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

<p id=\"week-label\"
   class=\"week-label\"
   data-this-week=\"Week commencing {{ thisWeekStart|date('l d M Y') }}\"
   data-next-week=\"Week commencing {{ nextWeekStart|date('l d M Y') }}\">
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

{% if isStaff %}
  <div class=\"shift-actions\">
    <a id=\"edit-week-btn\"
       href=\"/website/opening/edit?week=current\"
       class=\"book-button\">
      Edit Opening Hours
    </a>
  </div>
{% endif %}

{% endblock %}

{% block scripts %}
  <script src=\"/website/assets/js/opening-hours.js\"></script>
{% endblock %}", "open/index.twig", "/var/www/html/website/src/Views/open/index.twig");
    }
}
