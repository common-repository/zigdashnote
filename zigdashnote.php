<?php
/*
Plugin Name: ZigDashNote
Plugin URI: https://www.zigpress.com/plugins/zigdashnote/
Description: Adds a text widget to the Dashboard for notes and reminders. HTML allowed, HTML restrictions observed, URLs automatically linkified.
version: 1.0
Author: ZigPress
Requires at least: 4.0
Tested up to: 5.4
Requires PHP: 5.3
Author URI: https://www.zigpress.com/
License: GPLv2
*/


/*
Copyright (c) 2011-2020 ZigPress

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation Inc, 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
*/


if (!class_exists('zigdashnote')) {


	class zigdashnote
	{

		# TODO - resolve get_plugin_data issue
		# https://wordpress.stackexchange.com/questions/18539/function-deactivate-plugins-does-not-exist#18540

		private $options;


		public function __construct() {
			$this->options = array();
			global $wp_version;
			if (version_compare(phpversion(), '5.3', '<')) $this->AutoDeactivate('PHP 5.3');
			if (version_compare($wp_version, '4.0', '<')) $this->AutoDeactivate('WordPress 4.0');
			add_action('wp_dashboard_setup', array($this, 'action_wp_dashboard_setup'));
			add_action('admin_print_styles', array($this, 'action_admin_print_styles'));
			add_filter('plugin_row_meta', array($this, 'filter_plugin_row_meta'), 10, 2 );
			/* That which can be added without discussion, can be removed without discussion. */
			remove_filter('the_title', 'capital_P_dangit', 11);
			remove_filter('the_content', 'capital_P_dangit', 11);
			remove_filter('comment_text', 'capital_P_dangit', 31);
		}


		public function activate() {
			$this->options = $this->get_or_create_options();
			update_option('zigdashnote_options', $this->options);
		}


		public function autodeactivate($requirement) {
			if (!function_exists('get_plugins')) require_once(ABSPATH . 'wp-admin/includes/plugin.php');
			$plugin = plugin_basename(__FILE__);
			$plugindata = get_plugin_data(__FILE__, false);
			if (is_plugin_active($plugin)) {
				deactivate_plugins($plugin);
				wp_die($plugindata['Name'] . ' requires ' . $requirement . ' and has been deactivated. <a href="' . admin_url('plugins.php') . '">Click here to go back.</a>');
			}
		}


		public function action_wp_dashboard_setup() {
			$this->options = get_option('zigdashnote_options');
			wp_add_dashboard_widget('ZigDashNote', $this->options['title'], array($this, 'output'), array($this, 'control'));
		}


		public function action_admin_print_styles() {
			# https://core.trac.wordpress.org/ticket/34987
			global $wp_version;
			if (version_compare($wp_version, '4.4', '>=')) {
				?>
				<style type="text/css">
					#dashboard-widgets #ZigDashNote h2 span a { display:block; float:right; padding-top:3px;}
				</style>
				<?php
			}
		}


		public function filter_plugin_row_meta($links, $file) {
			$plugin = plugin_basename(__FILE__);
			if ($file == $plugin) return array_merge($links, array('<a target="_blank" href="http://www.zigpress.com/donations/">Donate</a>'));
			return $links;
		}


		private function get_or_create_options() {
			$defaults = array('title'=>'ZigDashNote', 'text'=>'Your text here', 'credit'=>1);
			if ((!$this->options = get_option('zigdashnote_options')) || !is_array($this->options)) $this->options = array();
			return array_merge($defaults, $this->options);
		}


		public function output() {
			echo wpautop($this->options['text']);
			if ($this->options['credit']) {
				?>
				<div class="description"><small><em><a class="description" target="_blank" href="http://www.zigpress.com/plugins/zigdashnote/">ZigDashNote</a> dashboard widget by <a class="description" target="_blank" href="http://www.zigpress.com/">ZigPress</a></em></small></div>
				<?php
			}
		}


		public function control() {
			if (('post' == strtolower($_SERVER['REQUEST_METHOD'])) && isset($_POST['widget_id']) && ('ZigDashNote' == $_POST['widget_id'])) {
				foreach (array('title', 'text', 'credit') as $key) $this->options[$key] = stripslashes(@$_POST['zigdashnote_' . $key]);
				$this->options['credit'] = ($this->options['credit'] == '1') ? 1 : 0;
				if (!current_user_can('unfiltered_html')) {
					$this->options['text'] = stripslashes(wp_filter_post_kses($this->options['text']));
				} else {
					$this->options['text'] = make_clickable($this->options['text']);
				}
				update_option('zigdashnote_options', $this->options);
			}
			?>
			<p>Title: <input class="widefat" type="text" id="zigdashnote_title" name="zigdashnote_title" value="<?php echo $this->options['title'] ?>" /></p>
			<p><textarea class="widefat" rows="10" id="zigdashnote_text" name="zigdashnote_text"><?php echo $this->options['text'] ?></textarea></p>
			<p>Show credit: <input type="checkbox" id="zigdashnote_credit" name="zigdashnote_credit" value="1" <?php echo (@$this->options['credit'] == 1) ? 'checked="checked"' : ''?> /></p>
			<?php
		}


		public function is_classicpress() {
			return function_exists('classicpress_version');
		}


	} # END OF CLASS


} else {
	wp_die('Namespace clash! Class zigdashnote already exists.');
}


# INTEGRATE PLUGIN


$zigdashnote = new zigdashnote();
register_activation_hook(__FILE__, array(&$zigdashnote, 'activate'));


# EOF
