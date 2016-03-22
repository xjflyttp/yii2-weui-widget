<?php
namespace xj\weui;

/**
 *
 * @author xjflyttp <xjflyttp@gmail.com>
 * @see https://github.com/weui/weui/wiki/ActionSheet
 */
class ActionSheetCell extends Widget
{
    const CLASS_CELL = 'weui_actionsheet_cell';

    /**
     * @var string
     */
    public $tagName = 'div';

    /**
     * @var string
     */
    public $label;

    /**
     * @var bool
     */
    public $encodeLabel = true;


    public function init()
    {
        parent::init();

        Html::addCssClass($this->options, [self::CLASS_CELL]);
    }

    public function run()
    {
        $label = $this->encodeLabel ? Html::encode($this->label) : $this->label;
        return Html::tag($this->tagName, $label, $this->options);
    }
}