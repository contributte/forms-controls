<?php
/**
 * Copyright (c) 2012-2014 Milan Felix Sulc <rkfelix@gmail.com>
 */

namespace NettePlugins\Forms\Controls;

use Latte\Engine;
use Nette\Forms\Container;
use Nette\Forms\Controls\BaseControl;
use Nette\Utils\Html;

/**
 * Markup control - add html to your form.
 *
 * @author Milan Felix Sulc <rkfelix@gmail.com>
 * @author Petr Stuchl4n3k Stuchlik <stuchl4n3k@gmail.com
 * @version 1.4
 */
class Markup extends BaseControl
{

    /** @var mixed */
    private $content;

    /** @var Html */
    private $wrapper;

    /**
     * Constructor
     *
     * @param string $label
     * @param mixed $content
     * @param string $wrapper
     */
    public function __construct($label, $content, $wrapper = NULL)
    {
        parent::__construct($label);
        $this->setDisabled(TRUE);
        $this->setOmitted(TRUE);
        $this->setContent($content);
        $this->wrapper = Html::el($wrapper);
    }

    /**
     * Sets html content
     *
     * @param mixed $content
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Gets html content
     *
     * @return mixed
     */
    public function getContent()
    {
        if (is_string($this->content) && file_exists($this->content)) {
            $latte = new Engine();
            return $latte->renderToString($this->content);
        }

        return (string)$this->content;
    }

    /**
     * Generates control's HTML element.
     *
     * @return Html
     */
    public function getControl()
    {
        $parentControl = parent::getControl();

        $control = $this->getWrapperPrototype();
        $control->addAttributes([
            'id' => $parentControl->id
        ]);
        $control->setHtml($this->getContent());

        return $control;
    }

    /**
     * @return Html
     */
    public function getWrapperPrototype()
    {
        return $this->wrapper;
    }

    /**
     * Register MarkupControl
     *
     * @static
     * @param string $method
     * @return void
     */
    public static function register($method = 'addMarkup')
    {
        Container::extensionMethod($method, function (Container $container, $name, $label, $content) {
            return $container[$name] = new self($label, $content);
        });
    }
}
