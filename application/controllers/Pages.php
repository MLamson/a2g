<?php
class Pages extends CI_Controller {


				/**
				*Loads the page to be viewed.  Adds templates. 
				*/

        public function view($page = 'home')
        {

        		/** 
        		* Checks to see if the page exists.  If not send error page.
        		*/
	        	if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        /** 
	        * Not sure of the $data['title'] part
	        */
	        $data['title'] = ucfirst($page); // Capitalize the first letter

	        /**
	        * Loads headers and choosen page in view.
	        */
	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/'.$page, $data);
	        $this->load->view('templates/footer', $data);
        }

        
}