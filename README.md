# yii2-weui-widget
```
https://github.com/weui/weui
```
composer.json
---
```json
"require": {
    "xj/yii2-weui-widget": "dev-master"
},
```
Assets
---
```php
xj\weui\WeuiAsset::register($this);
```

Button
---
```php
Button::widget([
    'label' => 'Action',
    'options' => [
        'class' => [
            Button::BTN_PRIMARY,
            Button::BTN_MINI,
            Button::BTN_DISABLED
        ],
    ],
])
```


Dialog
---
```php
\xj\weui\Dialog::widget([
    'type' => \xj\weui\Dialog::TYPE_CONFIRM,
    'id' => 'myDialog',
    'title' => 'MyTitle',
    'content' => 'MyContent',
    'buttons' => [
        [
            'tagName' => 'a',
            'label' => 'ok',
            'options' => [
                'href' => 'javascript:;',
                'class' => [
                    Button::BTN_DIALOG,
                    Button::BTN_DIALOG_DEFAULT,
                ],
            ]
        ],
        [
            'tagName' => 'a',
            'label' => 'cancel',
            'options' => [
                'href' => 'javascript:;',
                'class' => [
                    Button::BTN_DIALOG,
                    Button::BTN_DIALOG_PRIMARY,
                ],
            ]
        ]
    ]
])
```

Grid
---
```php
\xj\weui\Grid::widget([
    'items' => [
        ['label' => 'a', 'icon' => \yii\helpers\Html::img('http://weui.github.io/weui/images/icon_nav_cell.png')],
        ['label' => 'b', 'icon' => \yii\helpers\Html::img('http://weui.github.io/weui/images/icon_nav_toast.png')],
        ['label' => 'c', 'icon' => \yii\helpers\Html::img('http://weui.github.io/weui/images/icon_nav_button.png')],
        ['label' => 'd', 'icon' => \yii\helpers\Html::img('http://weui.github.io/weui/images/icon_nav_icons.png')],
    ]
]);
```

Msg Page
---
```php
\xj\weui\MsgPage::widget([
    'title' => 'myTitle',
    'desc' => 'myDesc',
    'extra' => \yii\helpers\Html::a('More', ['index']),
    'buttons' => [
        [
            'tagName' => 'a',
            'label' => 'ok',
            'options' => [
                'href' => 'javascript:;',
                'class' => [
                    Button::BTN,
                    Button::BTN_PRIMARY,
                ],
            ]
        ],
        [
            'tagName' => 'a',
            'label' => 'cancel',
            'options' => [
                'href' => 'javascript:;',
                'class' => [
                    Button::BTN,
                    Button::BTN_DEFAULT,
                ],
            ]
        ],
    ]
]);
```

Toast
---
```php
\xj\weui\Toast::widget([
    'type' => \xj\weui\Toast::TYPE_LOADING,
    'id' => 'myToast',
    'label' => 'loading',
]);

\xj\weui\Toast::widget([
    'type' => \xj\weui\Toast::TYPE_COMPLETED,
    'id' => 'myToast',
    'label' => 'complete',
]);
```

