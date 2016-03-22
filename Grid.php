<?php
namespace xj\weui;

/**
 *
 * @author xjflyttp <xjflyttp@gmail.com>
 * @see https://github.com/weui/weui/wiki/Grid
 */
class Grid extends Widget
{
    /**
     * Grid Items
     * @var GridItem[]
     */
    public $items = [];

    /**
     * @var string
     */
    public $itemsClass = 'xj\weui\GridItem';

    public function init()
    {
        parent::init();

        Html::addCssClass($this->options, ['weui_grids']);
    }

    public function run()
    {
        if (empty($this->items)) {
            return '';
        }
        $options = $this->options;
        $content = $this->renderItems();

        return Html::tag('div', $content, $options);
    }

    /**
     * @return string
     */
    protected function renderItems()
    {
        $itemsHtml = '';
        foreach ($this->items as $item) {
            $itemsHtml .= call_user_func([$this->itemsClass, 'widget'], $item);
        }
        return $itemsHtml;
    }
}