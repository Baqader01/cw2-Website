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

/* shifts/create.twig */
class __TwigTemplate_5e722e473ab887b25f7e9fc00a3a8936 extends Template
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
        yield "<h2>Create Shift</h2>

";
        // line 6
        if ((($tmp = ($context["error"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "  <p class=\"error\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["error"] ?? null), "html", null, true);
            yield "</p>
";
        }
        // line 9
        yield "
<form method=\"post\" action=\"/cw2/public/shifts/store\">

  <label>
    Date
    <input type=\"date\" name=\"shift_date\"
           value=\"";
        // line 15
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "shift_date", [], "any", true, true, false, 15) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "shift_date", [], "any", false, false, false, 15)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "shift_date", [], "any", false, false, false, 15), "html", null, true)) : (""));
        yield "\" required>
  </label>

  <label>
    Label
    <input type=\"text\" name=\"label\"
           value=\"";
        // line 21
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "label", [], "any", true, true, false, 21) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "label", [], "any", false, false, false, 21)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "label", [], "any", false, false, false, 21), "html", null, true)) : (""));
        yield "\" required>
  </label>

  <label>
    Start Time
    <input type=\"time\" name=\"start_time\"
           value=\"";
        // line 27
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "start_time", [], "any", true, true, false, 27) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "start_time", [], "any", false, false, false, 27)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "start_time", [], "any", false, false, false, 27), "html", null, true)) : (""));
        yield "\" required>
  </label>

  <label>
    End Time
    <input type=\"time\" name=\"end_time\"
           value=\"";
        // line 33
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "end_time", [], "any", true, true, false, 33) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "end_time", [], "any", false, false, false, 33)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "end_time", [], "any", false, false, false, 33), "html", null, true)) : (""));
        yield "\" required>
  </label>

    <label>
    Required Volunteers
    <input type=\"number\"
            name=\"required_volunteers\"
            min=\"1\"
            max=\"10\"
            value=\"";
        // line 42
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "required_volunteers", [], "any", true, true, false, 42) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "required_volunteers", [], "any", false, false, false, 42)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "required_volunteers", [], "any", false, false, false, 42), "html", null, true)) : (2));
        yield "\"
            required>
    </label>

    <label>
    Max Volunteers
    <input type=\"number\"
            name=\"max_volunteers\"
            min=\"1\"
            max=\"10\"
            value=\"";
        // line 52
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "max_volunteers", [], "any", true, true, false, 52) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "max_volunteers", [], "any", false, false, false, 52)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "max_volunteers", [], "any", false, false, false, 52), "html", null, true)) : (2));
        yield "\"
            required>
    </label>

  <button type=\"submit\">Create Shift</button>
  <a href=\"/cw2/public/shifts\">Cancel</a>

</form>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "shifts/create.twig";
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
        return array (  130 => 52,  117 => 42,  105 => 33,  96 => 27,  87 => 21,  78 => 15,  70 => 9,  64 => 7,  62 => 6,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layout/base.twig' %}

{% block content %}
<h2>Create Shift</h2>

{% if error %}
  <p class=\"error\">{{ error }}</p>
{% endif %}

<form method=\"post\" action=\"/cw2/public/shifts/store\">

  <label>
    Date
    <input type=\"date\" name=\"shift_date\"
           value=\"{{ data.shift_date ?? '' }}\" required>
  </label>

  <label>
    Label
    <input type=\"text\" name=\"label\"
           value=\"{{ data.label ?? '' }}\" required>
  </label>

  <label>
    Start Time
    <input type=\"time\" name=\"start_time\"
           value=\"{{ data.start_time ?? '' }}\" required>
  </label>

  <label>
    End Time
    <input type=\"time\" name=\"end_time\"
           value=\"{{ data.end_time ?? '' }}\" required>
  </label>

    <label>
    Required Volunteers
    <input type=\"number\"
            name=\"required_volunteers\"
            min=\"1\"
            max=\"10\"
            value=\"{{ data.required_volunteers ?? 2 }}\"
            required>
    </label>

    <label>
    Max Volunteers
    <input type=\"number\"
            name=\"max_volunteers\"
            min=\"1\"
            max=\"10\"
            value=\"{{ data.max_volunteers ?? 2 }}\"
            required>
    </label>

  <button type=\"submit\">Create Shift</button>
  <a href=\"/cw2/public/shifts\">Cancel</a>

</form>
{% endblock %}
", "shifts/create.twig", "/var/www/html/cw2/src/Views/shifts/create.twig");
    }
}
