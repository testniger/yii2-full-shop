<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Management', 'options' => ['class' => 'header']],
                    ['label' => 'Shop', 'icon' => 'folder', 'items' => [
                        ['label' => 'Orders', 'icon' => 'file-o', 'url' => ['/shop/order/index'], 'active' => $this->context->id == 'shop/order'],
                        ['label' => 'Products', 'icon' => 'file-o', 'url' => ['/shop/product/index'], 'active' => $this->context->id == 'shop/product'],
                        ['label' => 'Brands', 'icon' => 'file-o', 'url' => ['/shop/brand/index'], 'active' => $this->context->id == 'shop/brand'],
                        ['label' => 'Tags', 'icon' => 'file-o', 'url' => ['/shop/tag/index'], 'active' => $this->context->id == 'shop/tag'],
                        ['label' => 'Categories', 'icon' => 'file-o', 'url' => ['/shop/category/index'], 'active' => $this->context->id == 'shop/category'],
                        ['label' => 'Characteristics', 'icon' => 'file-o', 'url' => ['/shop/characteristic/index'], 'active' => $this->context->id == 'shop/characteristic'],
                        ['label' => 'Reviews', 'icon' => 'file-o', 'url' => ['/shop/review/index'], 'active' => $this->context->id == 'shop/review'],
                        ['label' => 'Delivery Methods', 'icon' => 'file-o', 'url' => ['/shop/delivery/index'], 'active' => $this->context->id == 'shop/delivery'],
                        ['label' => 'Payment Methods', 'icon' => 'file-o', 'url' => ['/shop/payment/index'], 'active' => $this->context->id == 'shop/payment'],
                        [
                            'label' => 'Modifications',
                            'items' => [
                                ['label' => 'Groups', 'icon' => 'file-o', 'url' => ['/shop/modification-group/index'], 'active' => $this->context->id == 'shop/modification-group'],
                                ['label' => 'Modifications', 'icon' => 'file-o', 'url' => ['/shop/modification/index'], 'active' => $this->context->id == 'shop/modification'],
                            ]
                        ],
                        [
                            'label' => 'Other misc',
                            'items' => [
                                ['label' => 'Delivery Terms', 'icon' => 'file-o', 'url' => ['/shop/delivery-term/index'], 'active' => $this->context->id == 'shop/delivery-term'],
                                ['label' => 'Extra Statuses', 'icon' => 'file-o', 'url' => ['/shop/extra-status/index'], 'active' => $this->context->id == 'shop/extra-status'],
                                ['label' => 'Discounts', 'icon' => 'file-o', 'url' => ['/shop/discount/index'], 'active' => $this->context->id == 'shop/discount'],

                            ]
                        ],
                        ['label' => 'Warehouses', 'icon' => 'file-o', 'url' => ['/shop/warehouse/index'], 'active' => $this->context->id == 'shop/warehouse'],
                        ['label' => 'Give Points', 'icon' => 'file-o', 'url' => ['/shop/give-point/index'], 'active' => $this->context->id == 'shop/give-point'],
                        ['label' => 'Stores', 'icon' => 'file-o', 'url' => ['/shop/store/index'], 'active' => $this->context->id == 'shop/store'],
                    ]],
                    ['label' => 'Blog', 'icon' => 'folder', 'items' => [
                        ['label' => 'Posts', 'icon' => 'file-o', 'url' => ['/blog/post/index'], 'active' => $this->context->id == 'blog/post'],
                        ['label' => 'Comments', 'icon' => 'file-o', 'url' => ['/blog/comment/index'], 'active' => $this->context->id == 'blog/comment'],
                        ['label' => 'Tags', 'icon' => 'file-o', 'url' => ['/blog/tag/index'], 'active' => $this->context->id == 'blog/tag'],
                        ['label' => 'Categories', 'icon' => 'file-o', 'url' => ['/blog/category/index'], 'active' => $this->context->id == 'blog/category'],
                    ]],
                    ['label' => 'Content', 'icon' => 'folder', 'items' => [
                        ['label' => 'Pages', 'icon' => 'file-o', 'url' => ['/page/index'], 'active' => $this->context->id == 'page'],
                        ['label' => 'Files', 'icon' => 'file-o', 'url' => ['/file/index'], 'active' => $this->context->id == 'file'],
                    ]],
                    ['label' => 'Users', 'icon' => 'user', 'url' => ['/user/index'], 'active' => $this->context->id == 'user'],
                    ['label' => 'System', 'icon' => 'folder', 'items' => [
                        ['label' => 'Roles', 'icon' => 'file-o', 'url' => ['/system/role/index'], 'active' => $this->context->id == 'roles'],
                    ]],
                ],
            ]
        ) ?>

    </section>

</aside>
