<?php
/**
 * Plugin Name: Productos - Nuevas funcionalidades
 * Plugin URI: https://laclave.es
 * Description: Nuevos campos para la taxonomia: Familias de productos
 * Author: laclave
 * Author URI: https://www.laclave.es
 * Version: 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // error when open direct link on browser
}

add_image_size( 'thumbnailHero', 1620, 620, true);
add_image_size( 'iconFamily', 52, 52, true);

//INCLUDE METABOX TO CUSTOM TAXONOMY
//include the main class file
require_once("Tax-meta-class/Tax-meta-class.php");
if (is_admin()){
  /* 
   * prefix of meta keys, optional
   */
  //$prefix = 'ba_';
  /* 
   * configure your meta box
   */
  $config = array(
    'id' => 'info_familia',          // meta box id, unique per meta box
    'title' => 'Informaciones Adicionales',          // meta box title
    'pages' => array('familias'),        // taxonomy name, accept categories, post_tag and custom taxonomies
    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'fields' => array(),            // list of meta fields (can be added by field arrays)
    'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  
  /*
   * Initiate your meta box
   */
  $info_familia_meta =  new Tax_Meta_Class($config);
  
  /*
   * Add fields to your meta box
   */

  //Color field
  //$info_familia_meta->addText('text_field_id',array('name'=> 'My Text '));

  //Color field
  $info_familia_meta->addColor('color_field_main',array('name'=> __('Color principal ','tax-meta')));
  //Color field
  $info_familia_meta->addColor('color_field_secondary',array('name'=> __('Color secundario ','tax-meta')));

  //Image field
  $info_familia_meta->addImage('image_field_icon',array('name'=> __('Icono ','tax-meta')));
  //Image field
  $info_familia_meta->addImage('image_field_featured',array('name'=> __('Imagen destacada ','tax-meta')));

  //Image field
  $info_familia_meta->addImage('image_field_product_featured',array('name'=> __('Imagen del producto destacado ','tax-meta')));

  //text field
  $info_familia_meta->addText('order_field_id',array('name'=> 'Orden '));
  
  //wysiwyg field
  //$info_familia_meta->addWysiwyg($prefix.'wysiwyg_field_id',array('name'=> __('My wysiwyg Editor ','tax-meta')));

  
  /*
   * Don't Forget to Close up the meta box decleration
   */
  //Finish Meta Box Decleration
  $info_familia_meta->Finish();
}
