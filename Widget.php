<?php
namespace xj\weui;

class Widget extends \yii\base\Widget
{
    /**
     * @var array the HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    public function init()
    {
        parent::init();

        $view = $this->getView();
        WeuiAsset::register($view);

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }
}
