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

/* shifts/index.twig */
class __TwigTemplate_819c970ddeabe6514b4533a746739d83 extends Template
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
        yield "    
    <h2>Available Shifts</h2>

    ";
        // line 6
        if (Twig\Extension\CoreExtension::testEmpty(($context["shiftsByDay"] ?? null))) {
            // line 7
            yield "    <p>No upcoming shifts.</p>
    ";
        }
        // line 9
        yield "
    ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["shiftsByDay"] ?? null));
        foreach ($context['_seq'] as $context["date"] => $context["shifts"]) {
            // line 11
            yield "    <h3>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate($context["date"], "l d M Y"), "html", null, true);
            yield "</h3>

    <table class=\"shifts-table\">
        <thead>
        <tr>
            <th>Label</th>
            <th>Time</th>
            <th>Booked</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        ";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["shifts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 24
                yield "            ";
                $context["isFull"] = (CoreExtension::getAttribute($this->env, $this->source, $context["s"], "booked_count", [], "any", false, false, false, 24) >= CoreExtension::getAttribute($this->env, $this->source, $context["s"], "max_volunteers", [], "any", false, false, false, 24));
                // line 25
                yield "
            <tr>
            <td>";
                // line 27
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "label", [], "any", false, false, false, 27), "html", null, true);
                yield "</td>
            <td>";
                // line 28
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["s"], "start_time", [], "any", false, false, false, 28), 0, 5), "html", null, true);
                yield " – ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["s"], "end_time", [], "any", false, false, false, 28), 0, 5), "html", null, true);
                yield "</td>
            <td>";
                // line 29
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "booked_count", [], "any", false, false, false, 29), "html", null, true);
                yield " / ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "max_volunteers", [], "any", false, false, false, 29), "html", null, true);
                yield "</td>
            <td>
                ";
                // line 31
                if ((($tmp = ($context["isVolunteer"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 32
                    yield "                ";
                    if ((($tmp = ($context["isFull"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 33
                        yield "                    <span class=\"full\">Full</span>
                ";
                    } else {
                        // line 35
                        yield "                    <a class=\"book-button\" href=\"/cw2/public/shifts/book?shift_id=";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "shift_id", [], "any", false, false, false, 35), "html", null, true);
                        yield "\">
                    Book
                    </a>
                ";
                    }
                    // line 39
                    yield "                ";
                }
                // line 40
                yield "
                ";
                // line 41
                if ((($tmp = ($context["isStaff"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 42
                    yield "                    <div class=\"shift-actions\">
                        <a class=\"book-button\" href=\"/cw2/public/shifts/edit?shift_id=";
                    // line 43
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "shift_id", [], "any", false, false, false, 43), "html", null, true);
                    yield "\">
                            Edit
                        </a>

                        <span style=\"margin-left: 0.75rem;\"></span>
                        ";
                    // line 48
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["s"], "booked_count", [], "any", false, false, false, 48) == 0)) {
                        // line 49
                        yield "                            <form method=\"post\"
                                action=\"/cw2/public/shifts/delete\"
                                style=\"display:inline\"
                                onsubmit=\"return confirm('Delete this shift?');\">
                            <input type=\"hidden\" name=\"shift_id\" value=\"";
                        // line 53
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "shift_id", [], "any", false, false, false, 53), "html", null, true);
                        yield "\">
                            <button type=\"submit\">Delete</button>
                            </form>
                        ";
                    } else {
                        // line 57
                        yield "                            <span style=\"color: #888;\">Delete disabled</span>
                        ";
                    }
                    // line 59
                    yield "                    </div>
                ";
                }
                // line 61
                yield "            </td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['s'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            yield "        </tbody>
    </table>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['date'], $context['shifts'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        yield "
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "shifts/index.twig";
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
        return array (  194 => 67,  186 => 64,  178 => 61,  174 => 59,  170 => 57,  163 => 53,  157 => 49,  155 => 48,  147 => 43,  144 => 42,  142 => 41,  139 => 40,  136 => 39,  128 => 35,  124 => 33,  121 => 32,  119 => 31,  112 => 29,  106 => 28,  102 => 27,  98 => 25,  95 => 24,  91 => 23,  75 => 11,  71 => 10,  68 => 9,  64 => 7,  62 => 6,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout/base.twig' %}

{% block content %}    
    <h2>Available Shifts</h2>

    {% if shiftsByDay is empty %}
    <p>No upcoming shifts.</p>
    {% endif %}

    {% for date, shifts in shiftsByDay %}
    <h3>{{ date|date('l d M Y') }}</h3>

    <table class=\"shifts-table\">
        <thead>
        <tr>
            <th>Label</th>
            <th>Time</th>
            <th>Booked</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        {% for s in shifts %}
            {% set isFull = s.booked_count >= s.max_volunteers %}

            <tr>
            <td>{{ s.label }}</td>
            <td>{{ s.start_time|slice(0,5) }} – {{ s.end_time|slice(0,5) }}</td>
            <td>{{ s.booked_count }} / {{ s.max_volunteers }}</td>
            <td>
                {% if isVolunteer %}
                {% if isFull %}
                    <span class=\"full\">Full</span>
                {% else %}
                    <a class=\"book-button\" href=\"/cw2/public/shifts/book?shift_id={{ s.shift_id }}\">
                    Book
                    </a>
                {% endif %}
                {% endif %}

                {% if isStaff %}
                    <div class=\"shift-actions\">
                        <a class=\"book-button\" href=\"/cw2/public/shifts/edit?shift_id={{ s.shift_id }}\">
                            Edit
                        </a>

                        <span style=\"margin-left: 0.75rem;\"></span>
                        {% if s.booked_count == 0 %}
                            <form method=\"post\"
                                action=\"/cw2/public/shifts/delete\"
                                style=\"display:inline\"
                                onsubmit=\"return confirm('Delete this shift?');\">
                            <input type=\"hidden\" name=\"shift_id\" value=\"{{ s.shift_id }}\">
                            <button type=\"submit\">Delete</button>
                            </form>
                        {% else %}
                            <span style=\"color: #888;\">Delete disabled</span>
                        {% endif %}
                    </div>
                {% endif %}
            </td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
    {% endfor %}

{% endblock %}", "shifts/index.twig", "/var/www/html/cw2/src/Views/shifts/index.twig");
    }
}
