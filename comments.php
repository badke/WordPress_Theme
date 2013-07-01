<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
 ?>
<div id="comment-list">

	<?php if (!empty($post->post_password) && $_COOKIE['wp-postpass_'.COOKIEHASH]!=$post->post_password) : ?> 
        <p>Enter your password to view comments.</p> 
    <?php return; endif; ?> 

	<?php if ($comments) : ?> 
    
        <?php  
        $numPingBacks = 0; 
        $numComments  = 0; 
    
        foreach ($comments as $comment) { 
            if (get_comment_type() != "comment") { $numPingBacks++; } 
            else { $numComments++; } 
        } 
         
        $thiscomment = 'odd';  
    ?> 
    
    <?php if ($numPingBacks != 0) : ?> 
    	<h3 class="comments-header"><span><?php _e($numPingBacks); ?> Trackbacks/Pingbacks</span></h3> 
        <ol id="trackbacks"> 
         
		<?php foreach ($comments as $comment) : ?> 
        <?php if (get_comment_type()!="comment") : ?> 
        
            <li id="comment-<?php comment_ID() ?>" class="<?php _e($thiscomment); ?>"> 
            <?php comment_type(__('Comment'), __('Trackback'), __('Pingback')); ?>:  
            <?php comment_author_link(); ?> on <?php comment_date(); ?> 
            </li> 
             
            <?php if('odd'==$thiscomment) { $thiscomment = 'even'; } else { $thiscomment = 'odd'; } ?> 
             
        <?php endif; endforeach; ?> 
    	
        </ol> 
    <?php endif; ?> 
    
    <?php if ($numComments != 0) : ?> 
    
        <h3 class="comments-header"><span><?php _e($numComments); ?> Responses to <em><?php the_title(); ?></em></span></h3> 
        <ol id="comments"> 
         
        <?php foreach ($comments as $comment) : ?> 
        <?php if (get_comment_type()=="comment") : ?> 
         
            <li id="comment-<?php comment_ID(); ?>" class="<?php echo $thiscomment; ?>"> 
                <div class="comment-meta"> 
                    <span class="comment-author"><?php comment_author_link() ?>:</span>  
                    <span class="comment-date"><?php comment_date() ?> at <?php comment_time(); ?></span> 
                </div> 
                <div class="comment-text"> 
                	<?php comment_text(); ?> 
                </div> 
                <div class="reply">
					<?php comment_reply_link( 
						 array( 
							 'reply_text'   => __( 'Reply', OXO_TEXTDOMAIN )
							,'depth'        => isset( $args['args']['depth'] ) ? $args['args']['depth'] : (int) 3
							,'max_depth'    => isset( $args['args']['max_depth'] ) ? $args['args']['max_depth'] : (int) 5
						 )
						,get_comment_ID()
						,$post->ID
					); ?>
                </div>
            </li> 
             
        <?php if('odd'==$thiscomment) { $thiscomment = 'even'; } else { $thiscomment = 'odd'; } ?> 
         
        <?php endif; endforeach; ?> 
         
        </ol> 
         
        <?php endif; ?> 
         
    <?php else :   ?> 
    
        <h3 class="comments-header"><span>No Comments Yet</span></h3> 
    
        <p>You can be the first to comment!</p> 
         
    <?php endif; ?> 

</div>

<?php if (comments_open()) : ?> 
	
    <div id="comments-form"> 
    
	<?php if (get_option('comment_registration') && !$user_ID ) : ?> 
        <p id="comments-blocked">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p> 
    <?php else : ?> 
 		<?php comment_form(); ?> 
	<?php endif; ?>
    
    </div>  

<?php else : ?> 
    
    <p id="comments-closed">Sorry, comments for this entry are closed at this time.</p> 

<?php endif; ?>

