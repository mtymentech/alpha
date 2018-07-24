<div class="comments">
    <h2 class="comments_title">
        <?php

        $alpha_cn = get_comments_number();

        if(1 == $alpha_cn){
            _e("1 Comments","alpha");
        }else{
          echo $alpha_cn ." ". __("Comments","alpha");
        }

        ?>
    </h2>

    <div class="comments_list">
        <?php wp_list_comments(); ?>
        <div class="comments-pagination">
            <?php
            the_comments_pagination(array(
                'prev_text'=> '<'.__('Previous Comments', 'alpha'),
                'next_text'=> '>'.__('Next Comments', 'alpha'),
                'screen_reader_text'=> __('Pagination', 'alpha'),
            ));

            ?>

        </div>
    </div>

<?php
    if(!comments_open()){
        _e('Comments are closed','alpha');
    }
    ?>

    <div class="comment_form">
        <?php comment_form(); ?>
    </div>

</div>

