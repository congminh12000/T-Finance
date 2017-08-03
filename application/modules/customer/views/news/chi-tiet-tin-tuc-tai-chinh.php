<?php $this->load->view("partial/header"); ?>

<div class="newsdetail">
	<div class="container">
        <div class="row">

        <h4><a href="<?php echo base_url(); ?>" target="_self">Trang chủ</a>

        <!-- tree menu -->
        <?php if(count($arrTreeMenu)): ?>
            <?php foreach($arrTreeMenu as $k => $cate):


                if($k == 0){
                    $url = $cate['slug'];
                    $urlUri .= $cate['slug'];
                }

                ?>
                &nbsp;&nbsp;>&nbsp;&nbsp;
                <a href="<?php echo $k == 0 ? base_url($cate['slug']) : base_url($url . '/' . $cate['slug']); ?>" target="_self"><?php echo $cate['name']; ?></a>

            <?php endforeach; ?>
        <?php endif; ?>

                &nbsp;&nbsp;>&nbsp;&nbsp;
                <a href="javascript:void(0);" target="_self"><?php echo $news['title']; ?></a>

        </h4>

        </div> <!--End row-->
        <div class="row">
       	  <div class="hidden-xs col-sm-2 col-md-2 col-lg-2 box_sidebar">
          		<span class="linenews"></span>
                <h2 class="text-center">Bài viết gần đây</h2> <!--3 Tin mới nhất từ tổng tin tức-->

                <?php if(count($arrNewsLeft)): ?>
                    <?php foreach($arrNewsLeft as $item): ?>

                        <div class="box_newest">
                        <h4>
                            <a href="<?php echo base_url($this->uri->segment(1) . '/' . $item->category_slug . '/' . $item->slug . '.html'); ?>"
                             target="_self"><?php echo $item->title; ?></a></h4>
                             <p><?php echo $item->created_at; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

          </div> <!--End col-->

          <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 box_newsdetail text-justify">
            	<h2><?php echo $news['title']; ?></h2>
                <p>Viết bởi <b><?php echo $news['author']; ?></b> vào <?php echo $news['created_at']; ?></p>

                <!-- button social -->
                <div class="fb-share-button" data-href="<?php echo base_url(uri_string()); ?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Chia sẻ</a></div>
                <div class="g-plus" data-action="share" data-height="24" data-href="<?php echo base_url(uri_string()); ?>"></div>

                <p><?php echo $news['description']; ?></p>
                <img src="<?php echo base_url('static/admin/img/news/' . $news['avatar']); ?>" alt="(Tiêu đề bài viết)" class="img-responsive"><br><br>
                <?php echo $news['content']; ?>
                <br><br>
                <span class="linenews"></span>
                <div class="newsrelative">
                    <h5 class="text-right">BÀI VIẾT MỚI</h5>
                    <h6>CÙNG DANH MỤC</h6> <!--3 tin mới nhất cùng danh mục -->

                    <?php if(count($arrNewsBottom)): ?>
                        <?php foreach($arrNewsBottom as $item): ?>

                            <div class="box_newsrelative">
                                <h4><a href="<?php echo base_url($this->uri->segment(1) . '/' . $item->category_slug . '/' . $item->slug . '.html'); ?>" target="_self"><?php echo $item->title; ?></a></h4>
                            </div> <!--End col box_newsrelative-->

                        <?php endforeach; ?>
                    <?php endif; ?>

            	</div> <!--End newsrelative-->
          </div> <!--End col-->
        </div> <!--End row-->
    </div> <!--End container-->
</div> <!--End news-->

<!-- script FB -->
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=1779082595682193";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- script Google -->
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>

<?php $this->load->view("partial/footer"); ?>


