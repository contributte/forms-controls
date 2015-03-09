# MarkupControl for Nette/Forms

Add HTML to your form.

## Register

Anywhere. (e.q. before you used in a form)

```php
Minetro\Forms\Controls\Money::register();
```

## Scheme
```php
$form->addMarkup(NAME, LABEL, DATA);
```

## Use case

1) Pure html

```php
$form->addMarkup('myHtmlInput1', 'Pure html', '\<div id="myInput" class="anyClass"></div>');
```

2) Nette\Utils\Html

```php
$form->addMarkup('myHtmlInput2', 'HTML', Nette\Utils\Html::el('img')->src('image.jpg')->alt('photo'));
```

3) Template

```php
$tpl = new Nette\Bridges\ApplicationLatte\Template();
$tpl->setSource('xxx');
// or
$tpl->setFile(__DIR__ . '/template.latte');
$form->addMarkup('myHtmlInput3', 'Nette\Bridges\ApplicationLatte\Template', $tpl);
```

4) File path

```php
$form->addMarkup('myHtmlInput5', 'File path', __DIR__ . '/app/templates/control.latte');
```

## Changelog

**1.4**
- Added tests
- Update readme
- Update to Nette 2.3

**1.3**
- Update readme
- Update to Nette 2.2

**1.2**
- Fix some bugs
- Added licence

**1.1**
- Update phpDocs
- Added manual

**1.0**
- Base idea