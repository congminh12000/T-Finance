<?php $this->load->view("partial/header"); ?>

<div class="news">
	<div class="container">
    	<div class="row">
        	<h4><a href="#" target="_self">Trang chủ</a>&nbsp;&nbsp;<span>&nbsp;&nbsp;<a href="#" target="_self">Tin tức tài chính</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="#" target="_self">Tiền tệ</a></h4>
        </div> <!--End row-->
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            	<h1>TIỀN TỆ</h1>
            </div>
         </div> <!--End row-->
        <div class="row">
            <?php if(count($arrNews)): ?>
       <?php foreach ($arrNews as $i_key => $new) : ?>
       	  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center box_news">
          <h2><a href="<?php echo base_url('chi-tiet-tin-tuc-tai-chinh/' . $new->id ); ?>" target="_self"><?php echo $new->title; ?></a></h2>
          <p>Viết bởi <b><?php echo $new->author; ?></b> vào <?php echo $new->created_at; ?></p>
                <img src="<?php echo  base_url('static/admin/img/news/' . $new->avatar); ?>" alt="(Tiêu đề bài viết)" class="img-responsive" width="600" height="400">
                <p><?php echo $new->description; ?></p>
                <h5><a href="<?php echo base_url('chi-tiet-tin-tuc-tai-chinh/' . $new->id ); ?>" target="_self">Xem thêm <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></h5>
                </div> <!--End col-->
                <?php endforeach; ?>
            <?php else: ?>
            <p class="text-center">Không có dữ liệu ! </p>
            <?php endif; ?>

        </div> <!--End row-->
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                 <?php echo $paginator;?>
            </div> <!--End col-->
        </div> <!--End row-->
    </div> <!--End container-->
</div> <!--End news-->

<?php $this->load->view("partial/footer"); ?>

