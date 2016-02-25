<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('get_pagination')) {

    function pagination($parametres) {

        $CI = & get_instance();
        $CI->load->library('pagination');
        $config['num_links'] = 5;
        $config['base_url'] = $parametres['base_url'];
        $config['total_rows'] = $parametres['total'];
        $config['per_page'] = $parametres['start'];
        $config['page_query_string'] = TRUE;
        $config['is_ajax_paging'] = TRUE; // default FALSE
        $config['paging_function'] = 'ajax_paging'; // Your jQuery paging
        // $config['uri_segment']  = $parametres['uri_segment'];
        $config['query_string_segment'] = 'start';
        // First Links
        $config['first_link'] = '|<';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        // Last Links
        $config['last_link'] = '>|';
        $config['last_tag_open'] = '<li >';
        $config['last_tag_close'] = '</li>';

        // Next Link
        $config['next_link'] = 'Suivant';
        $config['next_tag_open'] = '<li >';
        $config['next_tag_close'] = '</li>';

        // Previous Link
        $config['prev_link'] = 'Precedent';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        // Current Link
        $config['cur_tag_open'] = '<li class="active"><a href="#?" >';
        $config['cur_tag_close'] = '</a></li>';

        // Digit Link
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $CI->pagination->initialize($config);
        return $CI->pagination->create_links();
    }

}
?>
