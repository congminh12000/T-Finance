<?php $this->load->view("partial/header"); ?>

<?php

$urlUri = base_url();
?>

<style>
.title-news, .short-description{
    word-wrap: break-word;
    overflow-wrap: break-word;
}
</style>

<div class="news">
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

        </h4>
        </div> <!--End row-->
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h1><?php echo $category['name']; ?></h1>
            </div>
         </div> <!--End row-->
        <div class="row">
            <?php if(count($arrNews)): ?>
       <?php foreach ($arrNews as $i_key => $new) :
            $urlDetail = $urlUri . '/' . $new->category_slug . '/' . $new->slug . '.html';

            ?>
       	  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center box_news">
          <h2 class="title-news">
                <a href="<?php echo $urlDetail; ?>" target="_self">
                    <?php echo strlen($new->title) > 160 ? substr($new->title, 0, 160) . '...' : $new->title; ?>
                </a>
            </h2>
          <p>Viết bởi <b><?php echo $new->author; ?></b> vào <?php echo $new->created_at; ?></p>
                <a href="<?php echo $urlDetail; ?>" target="_self">
                    <img src="<?php echo  base_url('static/admin/img/news/' . $new->avatar); ?>" alt="(Tiêu đề bài viết)" class="img-responsive" width="600" height="400">
                </a>
                <div class="short-description">
                    <?php echo strlen($new->description) > 450 ? substr($new->description, 0, 450) . '...' : $new->description; ?>
                </div>
                <h5><a href="<?php echo $urlDetail; ?>" target="_self">Xem thêm <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></h5>
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

