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

/* includes/footer.twig */
class __TwigTemplate_ffcb5ad27f5ff2ff8cfe87c0a6949374 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<footer id=\"contact\">
  <h2>Contact Us</h2>
  <address>
    <p>Email: <a href=\"mailto:hello@communitykitchen.org.uk\">hello@communitykitchen.org.uk</a></p>
    <p>Follow us on Instagram: <a href=\"https://www.instagram.com/communitykitchenldn\" target=\"_blank\" rel=\"noopener\">@communitykitchenldn</a></p>
  </address>
  <p>&copy; 2025 The Community Table. All rights reserved.</p>
</footer>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "includes/footer.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<footer id=\"contact\">
  <h2>Contact Us</h2>
  <address>
    <p>Email: <a href=\"mailto:hello@communitykitchen.org.uk\">hello@communitykitchen.org.uk</a></p>
    <p>Follow us on Instagram: <a href=\"https://www.instagram.com/communitykitchenldn\" target=\"_blank\" rel=\"noopener\">@communitykitchenldn</a></p>
  </address>
  <p>&copy; 2025 The Community Table. All rights reserved.</p>
</footer>", "includes/footer.twig", "/var/www/html/cw2/src/Views/includes/footer.twig");
    }
}
