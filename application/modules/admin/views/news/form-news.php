<script type="text/javascript" src="<?php echo base_url('static/admin/ckeditor/ckeditor.js');?>"></script>

<?php

$CI =& get_instance();

$categoryModel = $CI->load->model('category_model');
$arrCategory = $categoryModel->getMainCategory();
?>

        <?php if(validation_errors()): ?>
            <div class="alert alert-danger">
                <span><?php echo validation_errors(); ?></span>
            </div>
        <?php endif; ?>

            <?php if ($arrMessageError) : ?>
                <div class="alert alert-danger">
                    <?php foreach($arrMessageError as $error) : ?>
                        <span><?php echo $error; ?></span>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>

            <?php echo form_open_multipart(''); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                            <label class="control-label">Tiêu đề</label>
                            <input type="text" name="title" class="form-control" value="<?php echo set_value('title', $news['title']); ?>">
                        </div>
                    </div>
                <div class="col-md-12">
                    <div class="form-group label-floating">
                            <label class="control-label">Tác giả</label>
                            <input type="text" name="author" class="form-control" value="<?php echo set_value('author', $news['author']); ?>">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group label-floating">
                            <label class="control-label">Danh mục</label>
                            <select class="form-control" name="categoryId">
                                <option value="0">== Chọn danh mục ==</option>
                                <?php if($arrCategory): ?>
                                    <?php foreach($arrCategory as $item): ?>
                                    <option value="<?php echo $item['id']; ?>" <?php echo set_select('categoryId', $item['id'], $item['id'] == $news['category_id'] ? TRUE : FALSE ); ?>>
                                        <?php echo $item['name']; ?>
                                    </option>

                                    <?php if($item['children']): ?>
                                        <?php foreach($item['children'] as $_item): ?>
                                        <option value="<?php echo $_item['id']; ?>" <?php echo set_select('categoryId', $_item['id'], $_item['id'] == $news['category_id'] ? TRUE : FALSE ); ?>>
                                            &nbsp; &nbsp; &#8888; <?php echo $_item['name']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                    </div>
                </div>

                    <div class="col-md-12">
                        <!-- <div class="form&#45;group label&#45;floating"> -->
                            <label class="control-label">Ảnh đại diện</label>
                            <input type="file" class="" name="avatar" accept="image/*">

                            <?php if(isset($news['avatar'])): ?>
                                <img src="<?php echo base_url('static/admin/img/news/' . $news['avatar']); ?>" style="width: 200px; height: 100px" /><br/>
                            <?php endif; ?>

                            <small style="color: red">( Kích thước tối đa 600 x 400 px, dung lượng tối đa 5MB )</small>

                        <!-- </div> -->
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Hiện bài viết</label>
                            <input type="radio" name="status" class="form-control" value="1" <?php echo isset($news) ? ( $news['status'] == 1 ? 'checked' : '' ) : set_radio('status', '1', true ); ?> />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Ẩn bài viết</label>
                            <input type="radio" name="status" class="form-control" value="0" <?php echo isset($news) ? ( $news['status'] == 0 ? 'checked' : '' ) : set_radio('status', '0'); ?>>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Mô tả ngắn</label><br>
                            <textarea id="ck-description" name="description"><?php echo set_value('description', $news['description']); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Nội dung</label><br>
                             <textarea id="ck-content" name="content"><?php echo set_value('content', $news['content']); ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Meta title</label>
                            <input type="text" name="metaTitle" class="form-control" value="<?php echo set_value('metaTitle', $news['meta_title']); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Meta keyword</label>
                            <input type="text" name="metaKeyword" class="form-control" value="<?php echo set_value('metaKeyword', $news['meta_keyword']); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Meta description</label>
                            <input type="text" name="metaDescription" class="form-control" value="<?php echo set_value('metaDescription', $news['meta_description']); ?>">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success pull-right">
                    <i class="fa fa-check"></i>
                        Hoàn tất
                </button>
                <div class="clearfix"></div>
            </form>

<script type="text/javascript">
    $(function() {
        //ck 1
		if(CKEDITOR.instances['ck-description']) {
			CKEDITOR.remove(CKEDITOR.instances['ck-description']);
		}
		CKEDITOR.config.width = '100%';
	    CKEDITOR.config.height = 200;
        CKEDITOR.replace('ck-description',{});

        //ck 2
        if(CKEDITOR.instances['ck-content']) {
			CKEDITOR.remove(CKEDITOR.instances['ck-content']);
		}
		CKEDITOR.config.width = '100%';
	    CKEDITOR.config.height = 200;
		CKEDITOR.replace('ck-content',{});
	})
</script>

