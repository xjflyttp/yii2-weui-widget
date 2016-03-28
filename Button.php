<?php
namespace xj\weui;

use yii\helpers\Url;

/**
 *
 * @author xjflyttp <xjflyttp@gmail.com>
 * @see https://github.com/weui/weui/wiki/Button
 */
class Button extends Widget
{

    const BTN = 'weui_btn';
    const BTN_DISABLED = 'weui_btn_disabled';

    const BTN_DEFAULT = 'weui_btn_default';
    const BTN_PRIMARY = 'weui_btn_primary';
    const BTN_WARN = 'weui_btn_warn';

    const BTN_PLAIN_DEFAULT = 'weui_btn_plain_default';
    const BTN_PLAIN_PRIMARY = 'weui_btn_plain_primary';
    const BTN_PLAIN_WARN = 'weui_btn_plain_warn';

    const BTN_MINI = 'weui_btn_mini';
    const BTN_INLINE = 'weui_btn_inline';

    const BTN_DIALOG = 'weui_btn_dialog';
    const BTN_DIALOG_DEFAULT = 'default';
    const BTN_DIALOG_PRIMARY = 'primary';

    /**
     * @var string the tag to use to render the button
     */
    public $tagName;
    /**
     * @var string the button label
     */
    public $label = 'Button';
    /**
     * @var boolean whether the label should be HTML-encoded.
     */
    public $encodeLabel = true;

    /**
     * @var string
     */
    public $url;

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        if (null !== $this->url) {
            $this->url = Url::to($this->url);
        }
        if (null === $this->tagName) {
            $this->tagName = (null === $this->url) ? 'button' : 'a';
        }
        if ($this->url && $this->tagName === 'a') {
            $this->options['href'] = $this->url;
        }
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        return Html::tag($this->tagName, $this->encodeLabel ?
            Html::encode($this->label) :
            $this->label, $this->options);
    }
}