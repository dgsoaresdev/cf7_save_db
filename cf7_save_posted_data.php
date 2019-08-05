<?php 

function save_posted_data( $posted_data ) {
$args = array(
'post_type' => 'post',
'post_status'=>'draft',
'post_title'=>$posted_data['your-name'],
'post_content'=>$posted_data['your-message'],
//Caso tenha algum meta_data
'meta_input' => array(
	'nome_campo_exemplo' => $posted_data['nome_campo_exemplo'],
	'nome_campo_exemplo_2' => $posted_data['nome_campo_exemplo_2'],
  ),
);
$post_id = wp_insert_post($args);

   if(!is_wp_error($post_id)){
     if( isset($posted_data['your-name']) ){
       update_post_meta($post_id, 'your-name', $posted_data['your-name']);
     }
    // if( isset($posted_data['your-email']) ){
    //  update_post_meta($post_id, 'your-email', $posted_data['your-email']);
    // }
    // if( isset($posted_data['your-subject']) ){
    //  update_post_meta($post_id, 'your-subject', $posted_data['your-subject']);
    // }
    if( isset($posted_data['your-message']) ){
      update_post_meta($post_id, 'your-message', $posted_data['your-message']);
     }

    // Caso tenha algum meta_data
     if( isset($posted_data['nome_campo_exemplo']) ){
           update_post_meta($post_id, 'nome_campo_exemplo', $posted_data['nome_campo_exemplo']);
         }
    if( isset($posted_data['nome_campo_exemplo_2']) ){
       update_post_meta($post_id, 'nome_campo_exemplo_2', $posted_data['nome_campo_exemplo']);
     }
  //and so on ...
  return $posted_data;
 }
}
add_filter( 'wpcf7_posted_data', 'save_posted_data' );

?>