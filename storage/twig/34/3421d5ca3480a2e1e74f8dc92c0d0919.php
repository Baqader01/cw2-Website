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
class __TwigTemplate_b92a803ead49e0810863869962bbbd35 extends Template
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
        if ((($tmp = ($context["isStaff"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "        <a href=\"/website/shifts/create\" class=\"create-button\">
            + Create Shift
        </a>
    ";
        }
        // line 11
        yield "
    ";
        // line 12
        if (Twig\Extension\CoreExtension::testEmpty(($context["shiftsByDay"] ?? null))) {
            // line 13
            yield "    <p>No upcoming shifts.</p>
    ";
        }
        // line 15
        yield "
    ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["shiftsByDay"] ?? null));
        foreach ($context['_seq'] as $context["date"] => $context["shifts"]) {
            // line 17
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
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["shifts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                // line 30
                yield "            ";
                $context["isFull"] = (CoreExtension::getAttribute($this->env, $this->source, $context["s"], "booked_count", [], "any", false, false, false, 30) >= CoreExtension::getAttribute($this->env, $this->source, $context["s"], "max_volunteers", [], "any", false, false, false, 30));
                // line 31
                yield "
            <tr>
            <td>";
                // line 33
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "label", [], "any", false, false, false, 33), "html", null, true);
                yield "</td>
            <td>";
                // line 34
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["s"], "start_time", [], "any", false, false, false, 34), 0, 5), "html", null, true);
                yield " – ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["s"], "end_time", [], "any", false, false, false, 34), 0, 5), "html", null, true);
                yield "</td>
            <td>";
                // line 35
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "booked_count", [], "any", false, false, false, 35), "html", null, true);
                yield " / ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "max_volunteers", [], "any", false, false, false, 35), "html", null, true);
                yield "</td>
            <td>
                ";
                // line 37
                if ((($tmp = ($context["isVolunteer"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 38
                    yield "                ";
                    if ((($tmp = ($context["isFull"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 39
                        yield "                    <span class=\"full\">Full</span>
                ";
                    } else {
                        // line 41
                        yield "                    <a class=\"book-button\" href=\"/website/shifts/book?shift_id=";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "shift_id", [], "any", false, false, false, 41), "html", null, true);
                        yield "\">
                    Book
                    </a>
                ";
                    }
                    // line 45
                    yield "                ";
                }
                // line 46
                yield "
                ";
                // line 47
                if ((($tmp = ($context["isStaff"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 48
                    yield "                    <div class=\"shift-actions\">
                        <a class=\"book-button\" href=\"/website/shifts/edit?shift_id=";
                    // line 49
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "shift_id", [], "any", false, false, false, 49), "html", null, true);
                    yield "\">
                            Edit
                        </a>

                        <span style=\"margin-left: 0.75rem;\"></span>
                        ";
                    // line 54
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["s"], "booked_count", [], "any", false, false, false, 54) == 0)) {
                        // line 55
                        yield "                            <form method=\"post\"
                                action=\"/website/shifts/delete\"
                                style=\"display:inline\"
                                onsubmit=\"return confirm('Delete this shift?');\">
                            <input type=\"hidden\" name=\"shift_id\" value=\"";
                        // line 59
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "shift_id", [], "any", false, false, false, 59), "html", null, true);
                        yield "\">
                            <button type=\"submit\">Delete</button>
                            </form>
                        ";
                    } else {
                        // line 63
                        yield "                            <span style=\"color: #888;\">Delete disabled</span>
                        ";
                    }
                    // line 65
                    yield "                    </div>
                ";
                }
                // line 67
                yield "            </td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['s'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            yield "        </tbody>
    </table>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['date'], $context['shifts'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
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
        return array (  205 => 73,  197 => 70,  189 => 67,  185 => 65,  181 => 63,  174 => 59,  168 => 55,  166 => 54,  158 => 49,  155 => 48,  153 => 47,  150 => 46,  147 => 45,  139 => 41,  135 => 39,  132 => 38,  130 => 37,  123 => 35,  117 => 34,  113 => 33,  109 => 31,  106 => 30,  102 => 29,  86 => 17,  82 => 16,  79 => 15,  75 => 13,  73 => 12,  70 => 11,  64 => 7,  62 => 6,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout/base.twig' %}

{% block content %}    
    <h2>Available Shifts</h2>

    {% if isStaff %}
        <a href=\"/website/shifts/create\" class=\"create-button\">
            + Create Shift
        </a>
    {% endif %}

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
                    <a class=\"book-button\" href=\"/website/shifts/book?shift_id={{ s.shift_id }}\">
                    Book
                    </a>
                {% endif %}
                {% endif %}

                {% if isStaff %}
                    <div class=\"shift-actions\">
                        <a class=\"book-button\" href=\"/website/shifts/edit?shift_id={{ s.shift_id }}\">
                            Edit
                        </a>

                        <span style=\"margin-left: 0.75rem;\"></span>
                        {% if s.booked_count == 0 %}
                            <form method=\"post\"
                                action=\"/website/shifts/delete\"
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

{% endblock %}", "shifts/index.twig", "/var/www/html/website/src/Views/shifts/index.twig");
    }
}
