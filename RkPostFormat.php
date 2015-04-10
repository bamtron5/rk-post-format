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

		//init
		public function __construct(){

		}

		//up
		function activate(){

		}

		//down
		function deactivate(){

		}

		//settings page where new classes can be added or deleted
		function printSettings(){

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