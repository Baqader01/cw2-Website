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

/* layout/base.twig */
class __TwigTemplate_73c917a59193b928fc124f74ad76130a extends Template
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

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en-GB\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("title", $context)) ? (Twig\Extension\CoreExtension::default(($context["title"] ?? null), "The Community Table")) : ("The Community Table")), "html", null, true);
        yield "</title>

  <link rel=\"stylesheet\" href=\"/cw2/assets/css/stylesheet.css\">
</head>

<body>

  ";
        // line 13
        yield from $this->load("includes/header.twig", 13)->unwrap()->yield($context);
        // line 14
        yield "
  <main>
    ";
        // line 16
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 17
        yield "  </main>

  ";
        // line 19
        yield from $this->load("includes/footer.twig", 19)->unwrap()->yield($context);
        // line 20
        yield "
</body>
</html>
";
        yield from [];
    }

    // line 16
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layout/base.twig";
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
        return array (  82 => 16,  74 => 20,  72 => 19,  68 => 17,  66 => 16,  62 => 14,  60 => 13,  50 => 6,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en-GB\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>{{ title|default('The Community Table') }}</title>

  <link rel=\"stylesheet\" href=\"/cw2/assets/css/stylesheet.css\">
</head>

<body>

  {% include 'includes/header.twig' %}

  <main>
    {% block content %}{% endblock %}
  </main>

  {% include 'includes/footer.twig' %}

</body>
</html>
", "layout/base.twig", "/var/www/html/cw2/src/Views/layout/base.twig");
    }
}
