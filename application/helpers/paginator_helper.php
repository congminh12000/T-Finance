<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
     *
     *  $total <int> Total all record database
     *  $limit <int> show limit record per page
     *  $url <string> redirect url site after click pagination
     *  $uriSegment <int> position uri segment number page
     *  $numLinks <int> number link page show in pagination
     */
   function getPaginator($total, $limit, $url, $uriSegment, $numLinks = 5){
       //get main CodeIgniter object
       $ci =& get_instance();

		$config['total_rows']  = (int) $total;
       $config['per_page']  = (int) $limit;
       $config['num_links']	= (int) $numLinks;
       $config['base_url'] =  $url;
       $config['uri_segment'] = (int) $uriSegment;

       $config['use_page_numbers'] = TRUE;

		$config['next_link'] =  '»';
		$config['prev_link'] =  '«';

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>"
            ;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = "<li class='active'><a href='javascript:void(0);'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";

        $config['prev_tag_open'] = "<li>";
        $config['prev_tag_close'] = "</li>";

        $config['first_tag_open'] = "<li>";
        $config['first_tag_close'] = "</li>";

        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";

                # Khởi tạo phân trang
		$ci->pagination->initialize($config);

                # Tạo link phân trang
        $pagination =  $ci->pagination->create_links();

        return $pagination;

    }
