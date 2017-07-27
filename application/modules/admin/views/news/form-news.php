<script type="text/javascript" src="<?php echo base_url('static/admin/ckeditor/ckeditor.js');?>"></script>

        <?php if(validation_errors()): ?>
            <div class="alert alert-danger">
                <span><?php echo validation_errors(); ?></span>
            </div>
        <?php endif; ?>

            <?php if ($messageError) {?>
                <div class="alert alert-danger">
                    <span><?php echo $messageError; ?></span>
                </div>

            <?php }?>

            <?php echo form_open_multipart(''); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                            <label class="control-label">Tiêu đề</label>
                            <input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>">
                        </div>
                    </div>
                <div class="col-md-12">
                    <div class="form-group label-floating">
                            <label class="control-label">Tác giả</label>
                            <input type="text" name="author" class="form-control" value="<?php echo set_value('author'); ?>">
                    </div>
                </div>
                    <div class="col-md-12">
                        <!-- <div class="form&#45;group label&#45;floating"> -->
                            <label class="control-label">Ảnh đại diện</label>
                            <input type="file" class="" name="avatar" accept="image/*">
                            <small style="color: red">( Kích thước tối đa 600 x 400 px, dung lượng tối đa 5MB )</small>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Ẩn bài viết</label>
                            <input type="radio" name="status" class="form-control" value="1" <?php echo set_radio('status', '1', true); ?> />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Hiện bài viết</label>
                            <input type="radio" name="status" class="form-control" value="0" <?php echo set_radio('status', '0'); ?>>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Mô tả ngắn</label><br>
                            <textarea id="ck-description" name="description"><?php echo set_value('description'); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Nội dung</label><br>
                             <textarea id="ck-content" name="content"><?php echo set_value('content'); ?></textarea>
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

