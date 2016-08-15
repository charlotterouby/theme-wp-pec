<?php
    global $post;
    $children = list_page_children();

    function random_thumbnail(){
        $array_default_thumbnails = array("default-image.jpg", "background-1.jpg", "background-2.jpg", "background-4.jpg");
        $rand_int = rand(0,3);
        return $array_default_thumbnails[$rand_int];
    }
//    echo '<pre>';
//    print_r($children);
//    echo '</pre>';
//    exit;

    if($children):
        $nbrChildren = count($children);
        $nbrColumns = floor(12/$nbrChildren);
    ?>
    <div class="child-pages mdl-cell--bottom mdl-cell mdl-cell--12-col">
        <h4 class="mdl-grid mdl-cell mdl-cell--12-col-phone mdl-cell--10-col width-100">Lire aussi</h4>

        <div class="masonry-grid mdl-grid mdl-cell mdl-cell--12-col-phone mdl-cell--10-col width-100">
            <?php foreach($children as $child){

                // If the child is equal to the current post then ignore it
                if($child->ID == $post->ID) {
                    continue;
                } else {
            ?>

                <article id="post-<?php echo $child->ID; ?>" class="pec-thumbnail mdl-grid mdl-grid--no-spacing mdl-cell mdl-cell--12-col mdl-cell--6-col-tablet mdl-cell--<?php echo $nbrColumns; ?>-col-desktop  mdl-cell--order-<?php if($child->post_parent == 0) { echo 1; } else { echo $child->menu_order + 1;}?>">
                    <!-- image thumbnail -->
                    <a href="<?php echo $child->guid;?>" class="post-thumbnail mdl-cell mdl-cell--12-col">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/<?php echo random_thumbnail(); ?>" alt="default thumbnail">
                    </a>
                    <!-- .entry-header -->
                    <div class="entry-header mdl-cell mdl-cell--12-col mdl-cell--top">
                        <h6 class="entry-title">
                            <a href="<?php echo $child->guid; ?>" rel="bookmark"><?php echo $child->post_title; ?></a>
                        </h6>
                    </div>
                </article>

                <?php } // end if / else
            } // end foreach ?>
        </div>
    </div>
    <?php endif; ?>
