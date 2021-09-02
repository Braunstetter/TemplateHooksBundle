# TemplateHooksBundle

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Braunstetter/TemplateHooksBundle/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/Braunstetter/TemplateHooksBundle/?branch=main)

Extend your twig templates without inheritance.

## Installation

`composer require braunstetter/template-hooks-bundle`

## Usage

You can use the `hook` tag inside your templates now:

```html
{{ hook('app.cp.global-header') }}
```

Once you inserted this tag somewhere you and any bundles can hook into this by creating a class :

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
        
        // it would be possible to register to multiple hooks
        // return ['app.cp.global-header', 'app.cp.global-sidebar'];
    }
}
```

That's it. Your template gets rendered and you can process any logic before rendering it.

### Ship javascript and css

With the use of [AssetsPushBundle](https://github.com/Braunstetter/assets-push-bundle) you can write
inside `hooks/breadcrumbs.html.twig`:

```html
{% css '/breadcrumbs.css' %}
```

The css or js will get included inside the head of the page.

For more information follow the [official docs](https://github.com/Braunstetter/assets-push-bundle).