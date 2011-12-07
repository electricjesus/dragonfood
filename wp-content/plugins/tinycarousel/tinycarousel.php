<?php
/*
Plugin Name: WP TinyCarousel
Plugin URI: http://www.facebook.com/electricjesus
Description: Wordpress TinyCarousel plugin
Version: 0.1 SUPERBETA
Author: OMG ELECTRICJEEBUS
Author URI: http://www.facebook.com/electricjesus
*/

/*
WP TinyCarousel (Wordpress Plugin)
Copyright (C) 2011 Seth Malaki
Contact me at http://www.facebook.com/electricjesus

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/


add_shortcode("wp-tiny-carousel", "tinycarousel_handler");

function tinycarousel_handler() {
  $slideshow .= tinycarousel_domelements();
  $slideshow .= tinycarousel_scriptinit();
  return $slideshow
}

function tinycarousel_domelements() {
  $domelements = "";
  return $domelements;
}
function tinycarousel_scriptinit() {
  $scriptinit = "";
  return $scriptinit;
}
?>