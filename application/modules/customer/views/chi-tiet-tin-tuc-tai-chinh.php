<?php $this->load->view("partial/header"); ?>

<div class="newsdetail">
	<div class="container">
    	<div class="row">
        <h3><a href="#" target="_self">Trang chủ</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="#" target="_self">Tin tức tài chính</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="#" target="_self">Tiền tệ</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="#" target="_self"><?php echo $news['title']; ?></a></h3>
        </div> <!--End row-->
        <div class="row">
       	  <div class="hidden-xs col-sm-2 col-md-2 col-lg-2 box_sidebar">
          		<span class="linenews"></span>
            	<h2 class="text-center">Bài viết gần đây</h2> <!--3 Tin mới nhất từ tổng tin tức-->
                <div class="box_newest">
                	<h4><a href="#" target="_self"><?php echo $news['title']; ?></a></h4>
                    <p>25/07/2017 09:18</p>
                </div>

                <div class="box_newest">
                	<h4><a href="#" target="_self">Content cũng chính là sản phẩm - Tác giả: Hồ Công Hoài Phương</a></h4>
                    <p>25/07/2017 09:18</p>
                </div>

                <div class="box_newest">
                	<h4><a href="#" target="_self">Content cũng chính là sản phẩm - Tác giả: Hồ Công Hoài Phương</a></h4>
                    <p>25/07/2017 09:18</p>
                </div>

          </div> <!--End col-->

          <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 box_newsdetail text-justify">
            	<h2><?php echo $news['title']; ?></h2>
                <p>Viết bởi <b><?php echo $news['author']; ?></b> vào <?php echo $news['created_at']; ?></p>
                <p><?php echo $news['description']; ?></p>
                <img src="<?php echo base_url('static/admin/img/news/' . $news['avatar']); ?>" alt="(Tiêu đề bài viết)" class="img-responsive"><br><br>
                <?php echo $news['content']; ?>
                <br><br>
                <span class="linenews"></span>
                <div class="newsrelative">
                    <h5 class="text-right">BÀI VIẾT MỚI</h5>
                    <h6>CÙNG DANH MỤC</h6> <!--3 tin mới nhất cùng danh mục -->
                	<div class="box_newsrelative">
                    	<h4><a href="#" target="_self">4 nguyên tắc cốt lõi của Content Marketing</a></h4>
                    </div> <!--End col box_newsrelative-->

                    <div class="box_newsrelative">
                    	<h4><a href="#" target="_self">4 nguyên tắc cốt lõi của Content Marketing</a></h4>
                    </div> <!--End col box_newsrelative-->

                    <div class="box_newsrelative">
                    	<h4><a href="#" target="_self">4 nguyên tắc cốt lõi của Content Marketing</a></h4>
                    </div> <!--End col box_newsrelative-->

            	</div> <!--End newsrelative-->
          </div> <!--End col-->
        </div> <!--End row-->
    </div> <!--End container-->
</div> <!--End news-->

<?php $this->load->view("partial/footer"); ?>


