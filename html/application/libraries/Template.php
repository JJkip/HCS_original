<?php

class Template
   {
      var $ci;
      function __construct()
      {
         $this->ci =& get_instance();
      }
   
function load($tpl_view, $body_view = null, $data = null)
{
   if ( ! is_null( $body_view ) )
   {
	    /*
		  Try and locate the relevant view from a folder similar to the controller 
		  under discusion for example  applicantion/views/home/home.php
		*/
      if ( file_exists( APPPATH.'views/'.$tpl_view.'/'.$body_view ) )
      {
         $body_view_path = $tpl_view.'/'.$body_view;
      }
      else if ( file_exists( APPPATH.'views/'.$tpl_view.'/'.$body_view.'.php' ) )
      {
         $body_view_path = $tpl_view.'/'.$body_view.'.php';
      }
	  
	     /*
		  Try and locate the relevant view  from application/views/home.php
		  
		*/
      else if ( file_exists( APPPATH.'views/'.$body_view ) )
      {
         $body_view_path = $body_view;
      }
      else if ( file_exists( APPPATH.'views/'.$body_view.'.php' ) )
      {
         $body_view_path = $body_view.'.php';
      }
	  /* 
	    If  view is located it is allocated to the $body value else,
	     If file is not found Display error message and exit
	  */
      else
      {
         show_error('Unable to load the requested file: ' . $tpl_name.'/'.$view_name.'.php');
      }
      $body = $this->ci->load->view($body_view_path, $data, TRUE);
	  
	  /* 
	    $body variable can now be used in template view files as a placeholder for embedded views.
	  */
      if ( is_null($data) )
      {
         $data = array('body' => $body);
      }
      else if ( is_array($data) )
      {
         $data['body'] = $body;
      }
      else if ( is_object($data) )
      {
         $data->body = $body;
      }
   }
   $this->ci->load->view('templates/'.$tpl_view, $data);
   
   /* 
  Finally the view is loaded
   */
}
 }
?>