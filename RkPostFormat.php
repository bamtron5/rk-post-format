<?php 
	class RkPostFormat{
	/*
    Copyright (c) 2015, Q4
    All rights reserved.

    Redistribution and use in source and binary forms, with or without
    modification, are permitted provided that the following conditions are met:

     * Redistributions of source code must retain the above copyright notice,
       this list of conditions and the following disclaimer.
     * Redistributions in binary form must reproduce the above copyright
       notice, this list of conditions and the following disclaimer in the
       documentation and/or other materials provided with the distribution.
     * Neither the name of Automotive.com nor the names of its contributors may
       be used to endorse or promote products derived from this software
       without specific prior written permission.

    THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
    AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
    IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
    ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
    LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
    CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
    SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
    INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
    CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
    ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
    POSSIBILITY OF SUCH DAMAGE.
	*
	/*
	    Plugin Name: Post Format
	    Plugin URI: http://www.qfor.com
	    Description: Adds classes and meta data to post for multiple post styling
	    Version: 1.0 | Intended for: All Sites
	    Author: Brandon Morrison
	    Author URI: bamtron5
	    License: moeplified BSD
	*/
		//TODO
		//register settings page for adding classes

	    private $_options;
	    private $_plugin_options_name;
	    private $_meta_key;
	    private $_pf;

		//init
		public function __construct(){
			$this->_plugin_options_name = 'pf_options';
			$this->_options  = array(
				'names' = "Big Image, Small Image, Video"
			);
			$this->_meta_key = 'pf_meta';
		}

		public function activate(){
			//echo "activate";
			$tmp = get_option( $this->_plugin_options_name );
			if( !is_array( $tmp ) )
			{
				update_option( $this->_plugin_options_name, $this->_options );
			}
		}

		public function deactivate(){
			echo "deactivated";
			delete_option($this->_plugin_options_name);
		}

		

		public function adminForm(){
			?>
			<div class="wrap">
				<h2>Post Format Settings</h2>
				<form method="post" action="options.php">
					<?php settings_fields( 'pf_options_group' ); ?>
					<?php do_settings_sections( 'pf_options_group' ); ?>
					<?php submit_button(); ?>
				</form>
				<?php $this->printCurrentFormats(); ?>
			</div>
			<?php
		}

		//when admin
		public function adminInit(){
			register_setting( 
				'pf_options_group',
		  		'pf_options',
		  		'pfSanitizeOptions'
			);
			
			add_settings_section(
				'pf_options_group',
				'Post Format Settings',
				array(&$this, 'pfSettingsSection'),
				'pf_options_page'
			);
			
			add_settings_field( 
				'pf-name-input', 
				'Name', 
				array(&$this, 'adminFormatNameInput'), 
				'pf_options_page'
			);
		}

		public function adminMenu(){
			add_options_page(__('Post Format Options'),
						 __( 'Post Format' ),
						'activate_plugins',
						'post-format-options',
						array( &$this, 'adminForm' )
			);
			add_action( 'admin_init', array( &$this, 'adminInit' ) );
		}

		public function pfSettingsSection(){
			echo "...";
		}

		public function pfSanitizeOptions($input){
			return $input;
		}

		public function adminFormatNameInput(){
			echo '
				<label>Add Format <i>+</i></label>
				<input type="text" name="pf_options[names][]" id="pf_options[names][]" value="' . get_option( $this->_plugin_options_name[names] ) . '"></input>
			';
		}

		public function printCurrentFormats(){
			$options =  get_option( $this->_plugin_options_name );
			echo "<ul>";
			for($x = 0; $x < count($options['names']); $x++){
				echo "<li><b>" . $options['names'][$x] . "</b> | <a href='javascript:void(0);'><span style='color: #cc0000;'>Delete</span></li></a>";
			}
			echo "</ul>";
			var_dump($options);
		}

		

	}

	//actions and filters req
	add_action( 'admin_menu', array( new RkPostFormat(), 'adminMenu' ) );
	register_activation_hook(__FILE__, array( new RkPostFormat(), 'activate' ) );
	register_deactivation_hook(__FILE__, array( new RkPostFormat(), 'deactivate'));
	//add_meta_box( $id, $title, $callback, $screen, $context, $priority, $callback_args );
?>