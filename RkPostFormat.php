<?php 
	class RkPostFormat{
		//TODO
		//register on composer

		//init
		public function __construct(){

		}

		//what options are available
		function getOptions(){

		}

		//meta box add for post config
		function printMetaBox($options){

		}

		//based of post
		//add class to body on front-end markup
		function addClassToTheme($post){

		}
	}

	//actions and filters req
	add_meta_box( $id, $title, $callback, $screen, $context, $priority, $callback_args );
?>