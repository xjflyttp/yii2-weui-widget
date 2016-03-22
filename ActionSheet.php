<?php
namespace xj\weui;

/**
 *
 * @author xjflyttp <xjflyttp@gmail.com>
 * @see https://github.com/weui/weui/wiki/ActionSheet
 */
class ActionSheet extends Widget
{
    /**
     * Menu Cells
     * @var array
     */
    public $menus = [];

    /**
     * Action Cells
     * @var array
     */
    public $actions = [];

    /**
     * @var string
     */
    public $maskId;

    /**
     * @var string
     */
    public $actionsheetId;

    public function init()
    {
        parent::init();

        if (null === $this->maskId) {
            $this->maskId = $this->getId() . '_mask';
        }

        if (null === $this->actionsheetId) {
            $this->actionsheetId = $this->getId() . '_actionsheet';
        }
    }

    public function run()
    {
        $options = $this->options;
        $maskId = $this->maskId;
        $actionsheetId = $this->actionsheetId;
        $menus = $this->renderMenus();
        $actions = $this->renderActions();

        $content = <<<EOF
<div class="weui_mask_transition" id="{$maskId}"></div>
<div class="weui_actionsheet" id="{$actionsheetId}">
    <div class="weui_actionsheet_menu">
        {$menus}
    </div>
    <div class="weui_actionsheet_action">
        {$actions}
    </div>
</div>
EOF;
        return Html::tag('div', $content, $options);
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function renderMenus()
    {
        $menusHtml = '';
        foreach ($this->menus as $menu) {
            $menusHtml .= ActionSheetCell::widget($menu);
        }
        return $menusHtml;
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function renderActions()
    {
        $actionsHtml = '';
        foreach ($this->actions as $action) {
            $actionsHtml .= ActionSheetCell::widget($action);
        }
        return $actionsHtml;
    }
}