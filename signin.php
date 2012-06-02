<?php 
/*
Plugin Name: OBA Sign-in
Plugin URI: 
Description: Enables members to sign in to Fastcase and my.okbar
Version: 0.9.5
Author: Morgan Estes
Author URI: http://morganestes.wordpress.com
License: GPL2

    Copyright 2010  Morgan Estes  (email : morgane@okbar.org)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('wp_print_styles', 'add_signin_styles');
add_action('wp_print_scripts', 'add_signin_scripts');

function add_signin_styles(){

	wp_register_style('signin', get_bloginfo('wpurl') . '/wp-content/plugins/signin/css/signin.css', null, null, 'screen');
	wp_enqueue_style('signin');
}

function add_signin_scripts(){
	wp_enqueue_script('signin', get_bloginfo('wpurl') . '/wp-content/plugins/signin/js/signin.js', 'jquery');
	wp_enqueue_script('showpassword', get_bloginfo('wpurl') . '/wp-content/plugins/signin/js/jquery.showpassword-1.0.js', 'jquery');
	//wp_enqueue_script('DOMWindow', get_bloginfo('wpurl') . '/wp-content/plugins/signin/js/jquery.DOMWindow.js', 'jquery');
}

function signin(){
/** TODO:
 * in signin.js (around line 11), change getScript to call path correctly,based on user's current install folder
 *
 */
?>
<div id="signin-wrapper">
  <div id="signin-topnav" class="signin-topnav"><a href="#" class="signin-link"><span>Members,
        sign in here</span></a> </div>
  <fieldset id="signin_menu">
  <form method="post" id="signin" name="signin" action="https://secure.okbar.org/logon">
    <label for="user">Bar #</label>
    <input id="user" name="user" value="" title="Bar Number" tabindex="4" type="text">
    </p>
    <p>
      <label for="password">Password</label>
      <input id="password" name="password" value="" title="Password" tabindex="5" type="password">
      <input id="show" type="checkbox" /><label>Show password</label>
    </p>
    <br />
    <p>
      <input type="radio" name="whereto" id="fastcase" value="fastcase" title="Sign in to Fastcase" checked="checked" />     
      <label for="fastcase" title="Sign in to Fastcase"><strong>Fastcase</strong></label>
      &emsp;
      <input type="radio" name="whereto" id="my" value="my" title="Sign in to myOKBar" />
      <label for="my" title="Sign in to myOKBar"><strong>myOKBar</strong></label>
    </p>
    <br />
    <p>
      <input id="signin_submit" value="Sign in" tabindex="6" type="submit" onclick="submitForm();" />	
    </p>
    <p class="forgot"> <a href="https://secure.okbar.org/logon/okbarpass" id="resend_password_link">Forgot your password?</a> </p>
  </form>
  </fieldset>
</div>
<?php } ?>
