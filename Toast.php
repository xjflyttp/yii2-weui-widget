<?php
namespace xj\weui;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 *
 * @author xjflyttp <xjflyttp@gmail.com>
 * @see https://github.com/weui/weui/wiki/Toast
 */
class Toast extends Widget
{
    const TYPE_COMPLETED = 'renderCompleted';
    const TYPE_LOADING = 'renderLoading';

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $type;

    public function run()
    {
        if (null === $this->type) {
            throw new InvalidConfigException('type must be set');
        }

        return call_user_func([$this, $this->type]);
    }

    protected function renderCompleted()
    {
        $options = $this->options;
        $label = ArrayHelper::getValue($this, 'label', '已完成');
        Html::addCssStyle($options, ['display' => 'none']);
        $content = <<<EOF
<div class="weui_mask_transparent"></div>
<div class="weui_toast">
    <i class="weui_icon_toast"></i>
    <p class="weui_toast_content">{$label}</p>
</div>
EOF;
        return Html::tag('div', $content, $options);
    }

    protected function renderLoading()
    {
        $options = $this->options;
        $label = ArrayHelper::getValue($this, 'label', '数据加载中');
        Html::addCssClass($options, ['weui_loading_toast']);
        Html::addCssStyle($options, ['display' => 'none']);
        $content = <<<EOF
<div class="weui_mask_transparent"></div>
<div class="weui_toast">
    <div class="weui_loading">
        <div class="weui_loading_leaf weui_loading_leaf_0"></div>
        <div class="weui_loading_leaf weui_loading_leaf_1"></div>
        <div class="weui_loading_leaf weui_loading_leaf_2"></div>
        <div class="weui_loading_leaf weui_loading_leaf_3"></div>
        <div class="weui_loading_leaf weui_loading_leaf_4"></div>
        <div class="weui_loading_leaf weui_loading_leaf_5"></div>
        <div class="weui_loading_leaf weui_loading_leaf_6"></div>
        <div class="weui_loading_leaf weui_loading_leaf_7"></div>
        <div class="weui_loading_leaf weui_loading_leaf_8"></div>
        <div class="weui_loading_leaf weui_loading_leaf_9"></div>
        <div class="weui_loading_leaf weui_loading_leaf_10"></div>
        <div class="weui_loading_leaf weui_loading_leaf_11"></div>
    </div>
    <p class="weui_toast_content">{$label}</p>
</div>
EOF;
        return Html::tag('div', $content, $options);
    }

}