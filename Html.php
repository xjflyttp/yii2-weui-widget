<?php
namespace xj\weui;

use yii\helpers\BaseHtml;

class Html extends BaseHtml
{
    const ICON_PREFIX = 'weui_icon_';
    //size
    const ICON_MSG = 'msg';
    const ICON_SAFE = 'safe';
    //type
    const ICON_SUCCESS = 'success';
    const ICON_SUCCESS_CIRCLE = 'success_circle';
    const ICON_SUCCESS_NO_CIRCLE = 'success_no_circle';
    const ICON_INFO = 'info';
    const ICON_INFO_CIRCLE = 'info_circle';
    const ICON_WARN = 'warn';
    const ICON_WAITING = 'waiting';
    const ICON_WAITING_CIRCLE = 'waiting_circle';
    const ICON_DOWNLOAD = 'download';
    const ICON_CANCEL = 'cancel';
    const ICON_SAFE_SUCCESS = 'safe_success';
    const ICON_SAFE_WARN = 'safe_warn';


    /**
     * @param string|array $type
     * @param string $tagName
     * @return string
     * @see http://mp.weixin.qq.com/wiki/2/ae9782fb42e47ad79eb7b361c2149d16.html#Icon
     */
    public static function icon($type, $tagName = 'i')
    {
        if (!is_array($type)) {
            $type = [$type];
        }
        foreach ($type as &$t) {
            $t = static::ICON_PREFIX . $t;
        }
        $options = [];
        Html::addCssClass($options, $type);
        return static::tag($tagName, '', $options);
    }
}