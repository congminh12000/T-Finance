<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   function getPaginator($total, $limit, $url){
       //get main CodeIgniter object
       $ci =& get_instance();


		$config['total_rows']  =  $total;
		$config['per_page']  =  $limit;
		$config['next_link'] =  '»';
		$config['prev_link'] =  '«';
		$config['num_links']	=  5;
		$config['base_url'] =  $url;
        $config['uri_segment']	 =  2;
        $config['full_tag_open'] = "<ul class='pagination'>";
$config['full_tag_close'] ="</ul>";
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='javascript:void(0);'>";
$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
$config['next_tag_open'] = "<li>";
$config['next_tagl_close'] = "</li>";
$config['prev_tag_open'] = "<li>";
$config['prev_tagl_close'] = "</li>";
$config['first_tag_open'] = "<li>";
$config['first_tagl_close'] = "</li>";
$config['last_tag_open'] = "<li>";
$config['last_tagl_close'] = "</li>";

                # Khởi tạo phân trang
		$ci->pagination->initialize($config);

                # Tạo link phân trang
        $pagination =  $ci->pagination->create_links();

        return $pagination;

    }
