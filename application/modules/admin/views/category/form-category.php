<?php
$ci =& get_instance();

$ci->load->helper('category');
$arrParentCategory = getParentCategoryHelper();

$action = $this->uri->segment(2);
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

            <?php echo form_open(''); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group label-floating">
                            <label class="control-label">Tên danh mục</label>
                            <input type="text" name="name" class="form-control" value="<?php echo set_value('name', $category['name']); ?>">
                        </div>
                    </div>

                <?php if( $action == 'add' || ( $action == 'edit' && $category['parent_id'])): ?>
                <div class="col-md-12">
                    <div class="form-group label-floating">
                            <label class="control-label">Danh mục cha</label>
                            <select class="form-control" name="parentId">
                                <option value="0">== Không chọn ==</option>
                                <?php if($arrParentCategory): ?>
                                    <?php foreach($arrParentCategory as $item): ?>
                                    <option value="<?php echo $item['id']; ?>" <?php echo set_select('parentId', $item['id'], $item['id'] == $category['parent_id'] ? TRUE : FALSE ); ?>>
                                        <?php echo $item['name']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                    </div>
                </div>

                <?php endif; ?>

                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Hiện danh mục</label>
                            <input type="radio" name="status" class="form-control" value="1" <?php echo isset($category) ? ( $category['status'] == 1 ? 'checked' : '' ) : set_radio('status', '1', true ); ?> />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Ẩn danh mục</label>
                            <input type="radio" name="status" class="form-control" value="0" <?php echo isset($category) ? ( $category['status'] == 0 ? 'checked' : '' ) : set_radio('status', '0'); ?>>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Meta title</label>
                            <input type="text" name="metaTitle" class="form-control" value="<?php echo set_value('metaTitle', $category['meta_title']); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Meta keyword</label>
                            <input type="text" name="metaKeyword" class="form-control" value="<?php echo set_value('metaKeyword', $category['meta_keyword']); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Meta description</label>
                            <input type="text" name="metaDescription" class="form-control" value="<?php echo set_value('metaDescription', $category['meta_description']); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group label-floating">
                            <label class="control-label">Icon</label>
                            <input type="text" name="icon" class="form-control" value="<?php echo set_value('icon', $category['icon']); ?>">
                            <small style="color: red">( Icon dựa theo http://fontawesome.io/icons/ )</small>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success pull-right">
                    <i class="fa fa-check"></i>
                        Hoàn tất
                </button>
                <div class="clearfix"></div>
            </form>

