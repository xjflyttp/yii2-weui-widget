<?php
namespace xj\weui;


/**
 *
 * @author xjflyttp <xjflyttp@gmail.com>
 * @see https://github.com/weui/weui/wiki/Grid
 */
class GridItem extends Widget
{
    /**
     * @var bool
     */
    public $encodeLabel = true;

    /**
     * @var string
     */
    public $label;

    /**
     * @var bool
     */
    public $encodeIcon = false;

    /**
     * @var string
     */
    public $icon;

    /**
     * @var string
     */
    public $tagName = 'a';

    public function init()
    {
        parent::init();

        Html::addCssClass($this->options, ['weui_grid']);

        if (!isset($this->options['href'])) {
            $this->options['href'] = "javascript:;";
        }
    }

    public function run()
    {
        $icon = $this->encodeIcon ? Html::encode($this->icon) : $this->icon;
        $label = $this->encodeLabel ? Html::encode($this->label) : $this->label;

        $content = <<<EOF
<div class="weui_grid_icon">
    {$icon}
</div>
<p class="weui_grid_label">
    {$label}
</p>
EOF;
        return \xj\weui\Html::tag($this->tagName, $content, $this->options);
    }
}