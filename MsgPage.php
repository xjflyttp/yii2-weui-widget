<?php
namespace xj\weui;
use yii\base\InvalidConfigException;

/**
 *
 * @author xjflyttp <xjflyttp@gmail.com>
 * @see https://github.com/weui/weui/wiki/Msg-Page
 */
class MsgPage extends Widget
{

    /**
     * @var string
     * @example weui_icon_*
     * @see http://weui.github.io/weui/weui.css
     */
    public $iconClass;

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
    public $encodeDesc = true;

    /**
     * @var string
     */
    public $desc;

    /**
     * @var array
     */
    public $buttons = [];

    /**
     * @var bool
     */
    public $encodeExtra = false;

    /**
     * @var string
     */
    public $extra;

    public function init()
    {
        parent::init();
        if (null === $this->iconClass) {
            throw new InvalidConfigException('iconClass must be set');
        }
        Html::addCssClass($this->options, ['weui_msg']);
    }

    public function run()
    {
        $options = $this->options;
        $iconClass = $this->iconClass;
        $title = $this->encodeTitle ? Html::encode($this->title) : $this->title;
        $desc = $this->encodeDesc ? Html::encode($this->desc) : $this->desc;
        $extra = $this->encodeExtra ? Html::encode($this->extra) : $this->extra;
        $buttons = $this->renderButtons();

        $content = <<<EOF
<div class="weui_icon_area"><i class="{$iconClass} weui_icon_msg"></i></div>
<div class="weui_text_area">
    <h2 class="weui_msg_title">{$title}</h2>
    <p class="weui_msg_desc">{$desc}</p>
</div>
<div class="weui_opr_area">
    <p class="weui_btn_area">
        {$buttons}
    </p>
</div>
<div class="weui_extra_area">
    {$extra}
</div>
EOF;
        return Html::tag('div', $content, $options);
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function renderButtons()
    {
        $buttonsHtml = '';
        foreach ($this->buttons as $button) {
            $buttonsHtml .= Button::widget($button);
        }
        return $buttonsHtml;
    }
}