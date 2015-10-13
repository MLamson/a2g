<?php
class Concepts extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('concepts_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['concepts'] = $this->concepts_model->get_concepts();

                $data['title'] = 'Current Concepts';

                $this->load->view('templates/header', $data);
                $this->load->view('concepts/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
                $data['concepts_item'] = $this->concepts_model->get_concepts($slug);

                if (empty($data['concepts_item']))
                {
                        show_404();
                }

                $data['title'] = $data['concepts_item']['title'];

                $this->load->view('templates/header', $data);
                $this->load->view('concepts/view', $data);
                $this->load->view('templates/footer');
        }

        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Create a concepts item';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'text', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('concepts/create');
                $this->load->view('templates/footer');

            }
            else
            {
                $this->concepts_model->set_concepts();
                $this->load->view('concepts/success');
            }
        }
}