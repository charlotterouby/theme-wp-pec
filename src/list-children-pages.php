<?php
    $children = list_page_children();
//    echo '<pre>';
//    print_r($children);
//    echo '</pre>';
//    exit;

    if($children): ?>
    <div class="masonry-grid mdl-grid mdl-cell mdl-cell--12-col-phone mdl-cell--10-col width-100">
    <?php foreach($children as $child){ ?>

        <article id="post-<?php $child->ID; ?>" class="pec-thumbnail mdl-grid mdl-grid--no-spacing mdl-cell mdl-cell--4-col mdl-cell--12-col-phone mdl-cell--order-<?php echo $child->menu_order;?>">
           <!-- image thumbnail -->
           <a href="<?php echo $child->guid;?>" class="post-thumbnail mdl-cell mdl-cell--12-col">
                <?php
                    $imageData = wp_get_attachment_image_url($child->ID);
                    if ($imageData):
                ?>
                <img src="<?php $imageData; ?>" alt="thumbnail de <?php $child->post_title;?>">
                <?php else : ?>
                <img src="<?php echo get_template_directory_uri();?>/assets/img/default-image.jpg" alt="default thumbnail">
                <?php endif; ?>
            </a>
            <!-- .entry-header -->
            <div class="entry-header mdl-cell mdl-cell--12-col mdl-cell--top">
                <h3 class="entry-title h6">
                    <a href="<?php echo $child->guid; ?>" rel="bookmark"><?php echo $child->post_title; ?></a>
                </h3>
            </div>
        </article>

    <?php } // end foreach ?>
    </div>
<?php endif; ?>
