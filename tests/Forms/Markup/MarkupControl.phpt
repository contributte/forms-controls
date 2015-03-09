<?php

/**
 * Test: MarkupControl
 */

use Nette\Utils\Html;
use NettePlugins\Forms\Controls\Markup;
use Tester\Assert;
use Latte\Engine;

require __DIR__ . '/../../bootstrap.php';

test(function () {
    $content = 'test';
    $name = 'markup';
    $input = new Markup($name, $content);

    Assert::equal($name, $input->caption);
    Assert::equal($content, $input->getContent());
});

test(function () {
    $content = 'test';
    $input = new Markup('markup', $content, 'div');

    Assert::equal((string)Html::el('div'), (string)$input->getWrapperPrototype());
});

test(function () {
    $text = 'test';
    $content = Html::el()->setText($text);
    $input = new Markup('markup', $content, 'div');

    Assert::equal($text, (string)$input->getContent());
});

test(function () {
    $content = '<p><img></p>';
    $input = new Markup('markup', $content);

    Assert::equal($content, $input->getContent());
});

test(function () {
    $input = new Markup('markup', __DIR__ . '/files/source.latte');
    Assert::equal(date('Y'), $input->getContent());
});

test(function () {
    $engine = new Engine();
    $template = new Nette\Bridges\ApplicationLatte\Template($engine);
    $template->setFile( __DIR__ . '/files/source.latte');

    $input = new Markup('markup', $template);
    Assert::equal(date('Y'), $input->getContent());
});