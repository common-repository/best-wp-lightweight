<?php 

use Carbon_Fields\Container;
use Carbon_Fields\Field;

if (!class_exists('WP_Lightweight_Core_Setup')) {
	class WP_Lightweight_Core_Setup {

		function __construct()  {
			add_action( 'carbon_fields_register_fields', array( $this, 'wp_lightweight_option_attach_theme_options') );
			add_action( 'after_setup_theme', array( $this, 'crb_load') );
		}

		private function ___tabCleanUp() {
			$data = array(
				Field::make( 'html', 'crb_html_2', __( 'Section Description' ) )
					->set_html('Clean Up can help us to clean up the wordpress dashboard.'),
				Field::make( 'separator', 'crb_separator_1', __( 'Global' ) ),
				Field::make(
					'checkbox', 
					'___wp_lightweight_disable_comments',
					__('Disable Comments on WordPress')
					)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_gutenberg_editor',
						__('Disable the Gutenberg Editor')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_admin_bar',
						__('Remove Admin bar')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_admin_text',
						__('Remove label \'WordPress\' from the title bar')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_wp_logo',
						__('Remove WP Logo on Admin bar')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_help_menu',
						__('Remove Admin Help Menu')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_goto',
						__('Remove Go to link from Login page')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_disable_widget_block_editor',
						__('Disable Widget Block Editor')
						)->set_option_value( 'yes' ),
					Field::make( 'separator', 'crb_separator_2', __( 'Dashboard' ) ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_dashboard_quick_press',
						__('Remove Quick Draft on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_dashboard_primary',
						__('Remove Wordpress Events and News on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_yoast_db_widget',
						__('Remove Yoast SEO on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_dashboard_site_health',
						__('Remove Site Health on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_dashboard_activity',
						__('Remove Wordpress Activity on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_dashboard_right_now',
						__('Remove At a Glance on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_welcome_panel',
						__('Remove Welcome Panel on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_update_nag',
						__('Remove Admin Update on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_gutenberg_panel',
						__('Remove Gutenberg Panel on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_incoming_links',
						__('Remove Incoming links on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_plugins',
						__('Remove Plugins on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_secondary',
						__('Remove the secondary on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_recent_drafts',
						__('Remove Recent Drafts on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_recent_comments',
						__('Remove Recent Comments on Dashboard')
						)->set_option_value( 'yes' ),
					Field::make(
						'checkbox', 
						'___wp_lightweight_remove_notice',
						__('Remove Wordpress Notifications')
						)->set_option_value( 'yes' ),
					Field::make(
						'text', 
						'___wp_lightweight_add_copyright',
						__('Add text into Footer')
						)->set_width(6),
					Field::make(
						'textarea', 
						'___wp_lightweight_remove_dashboardbyid',
						__('Remove Panel ID on Dashboard')
						)->set_rows(6)->set_attribute( 'placeholder', 'enter panel id and add comma (,) end of id. e.g: #wp_lightweight_home, #wp_lightweight_contact' ),
			);
			return $data;
		}
		private function ___tabUpdates() {
			$data = array(
				Field::make( 'separator', 'crb_separator_4', __( 'Update' ) ),
				Field::make(
					'checkbox', 
					'___wp_lightweight_remove_core_update',
					__('Disable Automatic Core update')
					)->set_option_value( 'yes' ),
				Field::make(
					'checkbox', 
					'___wp_lightweight_remove_plugins_update',
					__('Disable Automatic Plugins update')
					)->set_option_value( 'yes' ),
				Field::make(
					'checkbox', 
					'___wp_lightweight_remove_theme_update',
					__('Disable Automatic Themes update')
					)->set_option_value( 'yes' ),
				Field::make( 'separator', 'crb_separator_5', __( 'Update Email Notification' ) ),
				Field::make(
					'checkbox', 
					'___wp_lightweight_remove_core_email',
					__('Disable Update Core email notification')
					)->set_option_value( 'yes' ),
				Field::make(
					'checkbox', 
					'___wp_lightweight_remove_plugins_email',
					__('Disable Update Plugins email notification')
					)->set_option_value( 'yes' ),
				Field::make(
					'checkbox', 
					'___wp_lightweight_remove_theme_email',
					__('Disable Update Themes email notification')
					)->set_option_value( 'yes' ),
			);
			return $data;
		}
		private function ___tabCopyright() {
			$data = array();
			$data = array(
				Field::make( 'separator', 'crb_separator_3', __( 'Copyright' ) ),
		
				Field::make( 'html', 'crb_html_4', __( 'Section Description' ) )
						->set_html('
						
						<p>Copyright by WOW WordPress</p>
						<p><strong>Author:</strong> <a href="https://baonguyenyam.github.io" target="_blank">Nguyen Pham</a></p>
						
						'),
		
			);
			return $data;
		}
		private function ___tabWelcome() {
			$data = array();
			$data = array(
				// Field::make( 'separator', 'crb_separator_4', __( 'Welcome' ) ),
		
				Field::make( 'html', 'crb_html_5', __( 'Section Description' ) )
						->set_html('
						
						<p><img src="'.plugin_dir_url( __DIR__ ).'/admin/assets/img/logo.png"></p>
						<h1>Best WP Lightweight</h1>
						<p>Best WP Lightweight help you configure your websites without any coding knowledge required. Lightweight and using best practices for fastest load time.</p>
						<hr>
						<p style="margin-top:0;margin-bottom:0"><strong>Website:</strong> <a href="https://wow-wp.com/" target="_blank">wow-wp.com</a></p>
						
						'),
		
			);
			return $data;
		}
		private function ___tabSecurity() {
			$data = array();
			$data = array(
				Field::make( 'separator', 'crb_separator_7', __( 'Password' ) ),
				Field::make(
					'checkbox', 
					'___wp_lightweight_disable_password_reset',
					__('Disable Password Reset')
					)->set_option_value( 'yes' )->set_help_text('Disable password reset functionality. Only users with administrator role will be able to change passwords from inside admin area.' ),
				Field::make( 'separator', 'crb_separator_8', __( 'Theme/Plugin Editing' ) ),
				Field::make(
					'checkbox', 
					'___wp_lightweight_disable_theme_plugin_edit',
					__('Disable File Editing')
					)->set_option_value( 'yes' )->set_help_text('When file editing is enabled, Administrator users can edit the code of themes and plugins directly from the WordPress dashboard. This is a potential security risk because not everyone has the skills to write code, and if a hacker breaks in, they would have access to all your data. That\'s why we recommend disabling it.'),
			);
			return $data;
		}
		private function ___tabScript() {
			$data = array();
			$data = array(
				Field::make( 'header_scripts', '___wp_lightweight_header_scripts', __( 'Header Scripts' ) ),
				// Field::make( 'separator', 'crb_separator', __( 'Separator' ) ),,
				Field::make( 'footer_scripts', '___wp_lightweight_footer_scripts', __( 'Footer Scripts' ) )
			);
			return $data;
		}
		private function ___tabSeometa() {
			$data = array();
			$data = array(
				// Field::make( 'file', 'crb_file', __( 'File' ) ),
				Field::make( 'header_scripts', '___wp_lightweight_seo_meta', __( 'Header SEO Meta tags' ) )
				->set_rows(20)
				->set_hook_priority(-9999)
				->set_help_text( 'If you need to add HTML tags to your header, you should enter them here.' )
			);
			return $data;
		}
		function wp_lightweight_option_attach_theme_options() {
			Container::make( 'theme_options', __( 'Best WP Lightweight' ) )
				->set_page_menu_title( 'WP Lightweight' )
				->set_page_menu_position(2)
				->set_icon( 'dashicons-admin-generic' )
				->add_tab( __( 'Welcome' ), self::___tabWelcome() )
				->add_tab( __( 'Clean-Up' ), self::___tabCleanUp() )
				->add_tab( __( 'Updates' ), self::___tabUpdates() )
				->add_tab( __( 'Login Screen' ), array(
					Field::make( 'image', '___wp_lightweight_login_logo', __( 'Login Logo' ) )
					->set_value_type( 'url' )
					->set_visible_in_rest_api( $visible = true )
					->set_width(40),
					Field::make( 'text', '___wp_lightweight_login_logo_width', __( 'Width' ) )
					->set_default_value('300px')
					->set_classes( 'wp-lightweight-cabon-width-class' )
					->set_width(20),
					Field::make( 'text', '___wp_lightweight_login_logo_height', __( 'Height' ) )
					->set_default_value('80px')
					->set_classes( 'wp-lightweight-cabon-width-class' )
					->set_width(20),
					Field::make( 'text', '___wp_lightweight_login_logo_margin', __( 'Margin' ) )
					->set_default_value('30px')
					->set_classes( 'wp-lightweight-cabon-width-class' )
					->set_width(20),
					Field::make( 'image', '___wp_lightweight_login_bg', __( 'Login Background' ) )
					->set_value_type( 'url' )
					->set_visible_in_rest_api( $visible = true )
					->set_width(40),
					Field::make( 'color', '___wp_lightweight_login_bg_color', 'Login Background color' )
					->set_alpha_enabled( true )
					->set_width(30),
					Field::make(
						'select', 
						'___wp_lightweight_login_style',
						__( 'Choose Style' )
					)->set_options( array(
						'default' => 'Default',
						'style-1' => 'Style 1',
						'style-2' => 'Style 2',
						'style-3' => 'Style 3',
					) )
					->set_width(30),
				) )
				->add_tab( __( 'Images' ), array(
					Field::make( 'html', 'crb_html_1', __( 'Section Description' ) )
						->set_html('With the WP Lightweight, you can quickly rename all your image URLs based on the post title.'),
					Field::make(
						'checkbox', 
						'___wp_lightweight_auto_rename_img',
						__('Rename image file by post title')
						)->set_option_value( 'yes' )->set_help_text('you-img.jpg => post-title-you-img.jpg' ),
				) )
				->add_tab( __( 'Security' ), self::___tabSecurity() )
				->add_tab( __( 'Scripts' ), self::___tabScript() )
				->add_tab( __( 'SEO Tags' ), self::___tabSeometa() )
				->add_tab( __( 'Copyright' ), self::___tabCopyright() )
				;
		}
		function crb_load() {
			require_once plugin_dir_path( __DIR__ ) .'vendor/autoload.php';
			\Carbon_Fields\Carbon_Fields::boot();
		}
	}
}

new WP_Lightweight_Core_Setup();
