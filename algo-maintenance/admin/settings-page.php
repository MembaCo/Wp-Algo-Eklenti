<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    
    <form method="post" action="options.php">
        <?php settings_fields('algo_maintenance_settings'); ?>
        
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="algo_maintenance_active"><?php _e('Bakım Modu', 'algo-maintenance'); ?></label>
                </th>
                <td>
                    <label>
                        <input type="checkbox" 
                               name="algo_maintenance_active" 
                               id="algo_maintenance_active" 
                               value="1" 
                               <?php checked(1, $active); ?>>
                        <?php _e('Bakım Modunu Aktifleştir', 'algo-maintenance'); ?>
                    </label>
                </td>
            </tr>
            
            <tr>
                <th scope="row">
                    <label for="algo_maintenance_message"><?php _e('Bakım Mesajı', 'algo-maintenance'); ?></label>
                </th>
                <td>
                    <textarea name="algo_maintenance_message" 
                              id="algo_maintenance_message" 
                              class="large-text" 
                              rows="5"><?php echo esc_textarea($message); ?></textarea>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php _e('Sosyal Medya Linkleri', 'algo-maintenance'); ?></th>
                <td>
                    <p>
                        <label>
                            <span class="label"><?php _e('Facebook URL:', 'algo-maintenance'); ?></span>
                            <input type="url" 
                                   name="algo_maintenance_social[facebook]" 
                                   value="<?php echo esc_url($social['facebook']); ?>" 
                                   class="regular-text">
                        </label>
                    </p>
                    <p>
                        <label>
                            <span class="label"><?php _e('Twitter URL:', 'algo-maintenance'); ?></span>
                            <input type="url" 
                                   name="algo_maintenance_social[twitter]" 
                                   value="<?php echo esc_url($social['twitter']); ?>" 
                                   class="regular-text">
                        </label>
                    </p>
                    <p>
                        <label>
                            <span class="label"><?php _e('Google+ URL:', 'algo-maintenance'); ?></span>
                            <input type="url" 
                                   name="algo_maintenance_social[google]" 
                                   value="<?php echo esc_url($social['google']); ?>" 
                                   class="regular-text">
                        </label>
                    </p>
                    <p>
                        <label>
                            <span class="label"><?php _e('Instagram URL:', 'algo-maintenance'); ?></span>
                            <input type="url" 
                                   name="algo_maintenance_social[instagram]" 
                                   value="<?php echo esc_url($social['instagram']); ?>" 
                                   class="regular-text">
                        </label>
                    </p>
                </td>
            </tr>
        </table>
        
        <?php submit_button(); ?>
    </form>
</div>