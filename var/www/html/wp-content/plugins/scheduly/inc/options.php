<?php /**
 * Plugin Options page
 *
 * @package    Scheduly
 * @author     Scheduly <support@scheduly.com>
 * @copyright  Copyright (c) 2021, Scheduly
 * @link       https://scheduly.com/
 * @license    GPL
 */ ?>
<?php 
wp_register_style( 'style_css', plugins_url('style.css',__FILE__ )); 
wp_enqueue_style('style_css');
?>
<div class="wrap">
    <h2><?php _e('Connect to your Scheduly account', 'scheduly'); ?> </h2>
    <hr />
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <div class="postbox">
                    <div class="inside">
                        <?php if( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) { ?>
                            <div class="notice notice-success is-dismissible">
                                <p><?php _e('Client Id connected!.', 'shapeSpace'); ?></p>
                            </div>
                        <?php } ?>

                        <form class="validate" name="dofollow" action="options.php" method="post">

                            <?php settings_fields('scheduly'); ?>

                            <h3 class="shfs-labels footerlabel" for="schedulyInsertFooter"><?php _e('Please enter your partner ID:', 'scheduly'); ?></h3>

                            <div class="form-required term-name-wrap">
                                <input style="width:98%;" rows="10" cols="57" id="schedulyInsertFooter" name="schedulyInsertFooter" value="<?php echo esc_html(get_option('schedulyInsertFooter')); ?>" aria-required="true" required>
                            </div>
                             <p class="submit">
                                <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save', 'scheduly'); ?>" />
                            </p>
                            <p><?php _e('- To get a partner ID you need a Scheduly account. You can register for a free account at <a target="_blank" href="https://scheduly.com/signup">scheduly.com</a>', 'scheduly'); ?></p> 
                            <p><?php _e('- To get a partner ID <a target="_blank" href="https://scheduly.com/admin"><b>login</b></a> to your Scheduly Admin Panel -> tap on the "Online Scheduler" tab on left side bar -> tap on the "Wordpress site" tab.', 'scheduly'); ?></p>
                            <p><?php _e('- To configure services, staff, etc go to your <a class="button button-primary" target="_blank" href="https://scheduly.com/admin"><b>Admin Panel</b></a>', 'scheduly'); ?></p>
                            <p><?php _e('- For more information see our <a target="_blank" href="https://scheduly.com/help"><b>Help Center</b></a>', 'scheduly'); ?></p>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
