<?php 

class WP_LightWeightCleanUPS {
    public $attrs = null;
    public function __construct($attrs) {
        $this->attrs = $attrs;
        if($this->attrs['removeLogo']) {
            add_action( 'wp_before_admin_bar_render', 'WP_LightWeightCleanUPS::removeLogo');
        };
        if($this->attrs['removeHelp']) {
            add_filter( 'contextual_help', 'WP_LightWeightCleanUPS::removeHelp', 999, 3 );
        };
        if($this->attrs['removeDashboardQuickPress']) {
            add_action( 'wp_dashboard_setup', 'WP_LightWeightCleanUPS::removeDashboardQuickPress' );
        };
        if($this->attrs['removeDashboardPrimary']) {
            add_action( 'wp_dashboard_setup', 'WP_LightWeightCleanUPS::removeDashboardPrimary' );
        };
        if($this->attrs['removeYoast']) {
            add_action( 'wp_dashboard_setup', 'WP_LightWeightCleanUPS::removeYoast' );
        };
        if($this->attrs['removeSiteHealth']) {
            add_action( 'wp_dashboard_setup', 'WP_LightWeightCleanUPS::removeSiteHealth' );
        };
        if($this->attrs['removeDashboardActivity']) {
            add_action( 'wp_dashboard_setup', 'WP_LightWeightCleanUPS::removeDashboardActivity' );
        };
        if($this->attrs['removeAtAGlance']) {
            add_action( 'wp_dashboard_setup', 'WP_LightWeightCleanUPS::removeAtAGlance' );
        };
        if($this->attrs['removeWelcome']) {
            add_action( 'wp_dashboard_setup', 'WP_LightWeightCleanUPS::removeWelcome' );
        };
        if($this->attrs['removeUpdate']) {
            add_action( 'wp_dashboard_setup', 'WP_LightWeightCleanUPS::removeUpdate' );
        };
        if($this->attrs['removeAdminBar']) {
            if (!is_admin()) {
                show_admin_bar(false);
                add_filter( 'show_admin_bar', '__return_false' );
            }
        };
        if($this->attrs['removeAdminText']) {
            add_filter('admin_title', 'WP_LightWeightCleanUPS::removeAdminText', 10, 2);
        };
        if($this->attrs['removeGotoLogin']) {
            add_action('login_head', 'WP_LightWeightCleanUPS::removeGotoLogin');
        };
        if($this->attrs['removeWidgetBlock']) {
            add_filter( 'use_widgets_block_editor', '__return_false' );
        };
        if($this->attrs['removeDashboardbyID']) {
            if (is_admin()) {
                add_action('admin_head','WP_LightWeightCleanUPS::removeDashboardbyID');
            }
        };
        if($this->attrs['removeNotice']) {
            add_action('admin_head','WP_LightWeightCleanUPS::removeNotice');
        };
        if($this->attrs['removeGutenbergPanel']) {
            add_action( 'wp_dashboard_setup', 'WP_LightWeightCleanUPS::removeGutenbergPanel' );
        };
        if($this->attrs['addCopyright']) {
            add_action( 'admin_footer_text', 'WP_LightWeightCleanUPS::addCopyright' );
        };
    }
    public function removeLogo() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu( 'wp-logo' );
    }
    public function removeDashboardQuickPress() {
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    }
    public function removeDashboardPrimary() {
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    }
    public function removeYoast() {
        remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );
        remove_meta_box('wpseo-dashboard-overview','dashboard', 'normal');
    }
    public function removeSiteHealth() {
        remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
    }
    public function removeDashboardActivity() {
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
        remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'normal' );
    }
    public function removeAtAGlance() {
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    }
    public function removeWelcome() {
        remove_action( 'welcome_panel', 'wp_welcome_panel' );
    }
    public function removeIncoming() {
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    }
    public function removePlugins() {
        remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    }
    public function removeSecondary() {
        remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
    }
    public function removeDraft() {
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    }
    public function removeComment() {
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    }
    public function removeUpdate() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu( 'updates' );
        $wp_admin_bar->remove_menu( 'easy-updates-manager-admin-bar' );
        remove_action( 'admin_notices', 'update_nag' );
    }
    public function removeDashboardbyID() {
        $str = preg_replace("/\s+/", "", carbon_get_theme_option('___wp_lightweight_remove_dashboardbyid'));
        $arr = array_unique(explode(",",$str));
        $idhide = '';
        foreach ($arr as $key => $value) {
            $idhide .= trim($value)."{display:none!important}";
        }
        if(isset($arr) && isset($idhide)) {
            ?><style><?php echo $idhide;?></style><?php
        }
    }
    public function removeNotice() {
        ?><style>.notice , .update-plugins, .updated, .update_nag, .update-message.notice {display:none!important}</style><?php
    }
    public function removeGutenbergPanel() {
        remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel');
    }
    public function removeHelp($old_help, $screen_id, $screen) {
        $screen->remove_help_tabs();
        return $old_help;
    }
    public function addCopyright( $text ) {
        if(carbon_get_theme_option('___wp_lightweight_add_copyright')) {
            $text = carbon_get_theme_option('___wp_lightweight_add_copyright');
        }
        return $text;
    }
    public function removeAdminText($admin_title, $title) {
        return $title.' - '.get_bloginfo('name');
    }
    public function removeGotoLogin() {
        ?><style>#login #backtoblog{display:none}</style><?php
    }
}

// CLEAN UP 
add_action( 'carbon_fields_fields_registered', '___wp_lightweight_clearUpSystem' );

function ___wp_lightweight_clearUpSystem() {
    $attrs = array(
        'addCopyright' => carbon_get_theme_option('___wp_lightweight_add_copyright') ? carbon_get_theme_option('___wp_lightweight_add_copyright') : null,
        'removeDashboardbyID' => carbon_get_theme_option('___wp_lightweight_remove_dashboardbyid') ? carbon_get_theme_option('___wp_lightweight_remove_dashboardbyid') : null,
        'removeLogo' => carbon_get_theme_option('___wp_lightweight_remove_wp_logo') ? true: false,
        'removeHelp' => carbon_get_theme_option('___wp_lightweight_remove_help_menu') ? true: false,
        'removeDashboardQuickPress' => carbon_get_theme_option('___wp_lightweight_remove_dashboard_quick_press') ? true: false,
        'removeDashboardPrimary' => carbon_get_theme_option('___wp_lightweight_remove_dashboard_primary') ? true: false,
        'removeYoast' => carbon_get_theme_option('___wp_lightweight_remove_yoast_db_widget') ? true: false,
        'removeSiteHealth' => carbon_get_theme_option('___wp_lightweight_remove_dashboard_site_health') ? true: false,
        'removeDashboardActivity' => carbon_get_theme_option('___wp_lightweight_remove_dashboard_activity') ? true: false,
        'removeAtAGlance' => carbon_get_theme_option('___wp_lightweight_remove_dashboard_right_now') ? true: false,
        'removeWelcome' => carbon_get_theme_option('___wp_lightweight_remove_welcome_panel') ? true: false,
        'removeUpdate' => carbon_get_theme_option('___wp_lightweight_remove_update_nag') ? true: false,
        'removeGutenbergPanel' => carbon_get_theme_option('___wp_lightweight_remove_gutenberg_panel') ? true: false,
        'removeNotice' => carbon_get_theme_option('___wp_lightweight_remove_notice') ? true: false,
        'removeAdminBar' => carbon_get_theme_option('___wp_lightweight_remove_admin_bar') ? true: false,
        'removeAdminText' => carbon_get_theme_option('___wp_lightweight_remove_admin_text') ? true: false,
        'removeGotoLogin' => carbon_get_theme_option('___wp_lightweight_remove_goto') ? true: false,
        'removeWidgetBlock' => carbon_get_theme_option('___wp_lightweight_disable_widget_block_editor') ? true: false,
        'removeIncoming' => carbon_get_theme_option('___wp_lightweight_remove_incoming_links') ? true: false,
        'removePlugins' => carbon_get_theme_option('___wp_lightweight_remove_plugins') ? true: false,
        'removeSecondary' => carbon_get_theme_option('___wp_lightweight_remove_secondary') ? true: false,
        'removeDraft' => carbon_get_theme_option('___wp_lightweight_remove_recent_drafts') ? true: false,
        'removeComment' => carbon_get_theme_option('___wp_lightweight_remove_recent_comments') ? true: false,
    );
    new WP_LightWeightCleanUPS($attrs);
}