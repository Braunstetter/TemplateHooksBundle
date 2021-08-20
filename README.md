# TemplateHooksBundle

Extend your twig templates without inheritance.

## Installation

`composer require braunstetter/template-hooks-bundle`

## Usage

You can use the `hook` tag inside your templates now:

```html
{{ hook('app.cp.global-header') }}
```

Once you used this tag somewhere you and any bundles can hook into this by creating a class : 

```php
<?php


namespace App\Twig;


use Braunstetter\TemplateHooks\Twig\TemplateHook;

class BreadcrumbsHook extends TemplateHook
{

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return $this->templating->render('hooks/breadcrumbs.html.twig', $this->context);
    }

    public function setTarget(): string|array
    {
        return 'app.cp.global-header';
    }
}
```

That's it. Your template gets rendered and you can process any logic before rendering it.
