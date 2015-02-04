<style type="text/css">

    .thumbnails{ margin-left: 20px;}
</style>


<?php
$this->widget(
    'bootstrap.widgets.TbThumbnails',
    array(
        'dataProvider' =>ProductImage::model()->getImage($id),
        'template' => "{items}",
        'itemView' => 'application.modules.product.views.admin_product.image_render_thumb',
    )
);
?>

