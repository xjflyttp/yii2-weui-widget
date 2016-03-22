<?php
namespace xj\weui;

use yii\base\InvalidConfigException;
use yii\di\Instance;
use yii\helpers\ArrayHelper;

/**
 *
 * @author xjflyttp <xjflyttp@gmail.com>
 * @see https://github.com/weui/weui/wiki/Dialog
 */
class Dialog extends Widget
{
    const TYPE_ALERT = 'weui_dialog_alert';
    const TYPE_CONFIRM = 'weui_dialog_confirm';

    /**
     * @var string
     */
    public $type;

    /**
     * @var bool
     */
    public $encodeTitle = true;

    /**
     * @var string
     */
    public $title;

    /**
     * @var bool
     */
    public $encodeContent = true;

    /**
     * @var string
     */
    public $content;

    /**
     * @var Button[]
     */
    public $buttons = [];

    public function init()
    {
        parent::init();
        if (null === $this->type) {
            throw new InvalidConfigException('type must be set');
        }
        Html::addCssClass($this->options, [$this->type]);
    }

    public function run()
    {
        $title = $this->encodeTitle ? Html::encode($this->title) : $this->title;
        $content = $this->encodeContent ? Html::encode($this->content) : $this->content;
        $buttons = $this->getButtonsHtml();
        $content = <<<EOF
    <div class="weui_mask"></div>
    <div class="weui_dialog">
        <div class="weui_dialog_hd">
          <strong class="weui_dialog_title">{$title}</strong>
      </div>
        <div class="weui_dialog_bd">{$content}</div>
        <div class="weui_dialog_ft">
            {$buttons}
        </div>
    </div>
EOF;

        return Html::tag('div', $content, $this->options);
    }

    protected function getButtonsHtml()
    {
        $buttons = '';
        foreach ($this->buttons as $button) {
            /* @var $button array */
            Html::addCssClass($button, [Button::BTN_DIALOG]);
            $buttons .= Button::widget($button);
        }
        return $buttons;
    }
}