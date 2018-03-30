<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>admin</p>

                <?= yii\helpers\Html::a(
                    "<i class='fa fa-circle text-success'></i>退出",
                    ['/site/logout'],
                    ['data-method' => 'post']
                ) ?>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

<!--        --><?php //echo dmstr\widgets\Menu::widget(
//            [
//                'options' => ['class' => 'sidebar-menu'],
//                'items' => [
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                    ['label' => '用户管理', 'icon' => 'file-code-o', 'url' => ['/user-backend']],
//                    ['label' => '前台用户管理', 'icon' => 'file-code-o', 'url' => ['/user']],
//                    ['label' => '博客管理', 'icon' => 'file-code-o', 'url' => ['/blog']],
//                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
//
//
//
//
//
//                    [
//                        'label' => '权限管理',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => '路由', 'icon' => 'file-code-o', 'url' => ['/admin/route'],],
//                          //  ['label' => '角色', 'icon' => 'file-code-o', 'url' => ['/admin'],],
//                            ['label' => '权限', 'icon' => 'file-code-o', 'url' => ['/admin/permission'],],
//                            ['label' => '分配', 'icon' => 'file-code-o', 'url' => ['/admin/assignment'],],
//                            ['label' => '角色', 'icon' => 'file-code-o', 'url' => ['/admin/role'],],
//                    ]],
//
//

//
//                    [
//                        'label' => 'Same tools',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
//                ],
//            ]
//        ) ?>



        <?php
        use mdm\admin\components\MenuHelper;
        $callback = function($menu){
            $data = json_decode($menu['data'], true);
            $items = $menu['children'];
            $return = [
                'label' => $menu['name'],
                'url' => [$menu['route']],
            ];
            //处理我们的配置
            if ($data) {
                //visible
                isset($data['visible']) && $return['visible'] = $data['visible'];
                //icon
                isset($data['icon']) && $data['icon'] && $return['icon'] = $data['icon'];
                //other attribute e.g. class...
                $return['options'] = $data;
            }
            //没配置图标的显示默认图标
            (!isset($return['icon']) || !$return['icon']) && $return['icon'] = 'fa fa-circle-o';
            $items && $return['items'] = $items;
            return $return;
        };
        //这里我们对一开始写的菜单menu进行了优化
        echo dmstr\widgets\Menu::widget( [
            'options' => ['class' => 'sidebar-menu'],
            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback),
        ] );

        ?>




    </section>

</aside>
