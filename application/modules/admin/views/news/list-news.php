<?php $this->load->view("partial/header"); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <?php if($this->session->flashdata('save_news_success')): ?>
            <?php echo '<div class="alert alert-success"><span>' .
            $this->session->flashdata('save_news_success') .
                '</span></div>';
            ?>
            <?php endif; ?>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Danh sách tin tức tài chính
                        <a href="<?php echo base_url('news/add'); ?>" class="btn btn-success" style="margin-left: 60%"><i class="fa fa-plus"></i> Thêm tin tức</a>
                        </h4>
                        <!--<p class="category">Here is a subtitle for this table</p>-->
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                            <th>Tiêu đề</th>
                            <th>Tác giả</th>
                            <th>Danh mục</th>
                            <th>Ngày tạo</th>
                            <th>Ảnh đại diện</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                            </thead>
                            <tbody>
                            <?php if(count($arrNews)): ?>
                                <?php foreach ($arrNews as $i_key => $new) {

                                $status = $new->status ? '<p style="color: green">Kích hoạt</p>' : '<p style="color: red">Chưa kích hoạt</p>';
                                ?>
                                <tr>
                                    <td><?php echo $new->title;?></td>
                                    <td><?php echo $new->author;?></td>
                                    <td><?php echo $arrCategory[$new->category_id]['name'];?></td>
                                    <td><?php echo $new->created_at;?></td>
                                    <td>
                                        <?php if($new->avatar): ?>
                                        <img src="<?php echo base_url('static/admin/img/news/' . $new->avatar); ?>" style="width: 200px; height: 100px" />
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $status; ?></td>
                                    <td>
                                    <a class="btn btn-default" href="<?php echo base_url('news/edit/' . $new->id ); ?>"><i class="fa fa-pencil"></i> Sửa</a><br/>
                                    <button class="btn btn-danger btn-remove" data-id="<?php echo $new->id; ?>"><i class="fa fa-times"></i> Xóa</button>
                                    </td>
                                </tr>
                            <?php }?>

                                <tr>
                                            <td colspan="100">
                                                <?php echo $paginator;?>
                                            </td>
                                        </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="100" style="text-align: center">Không có dữ liệu</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
$('.btn-remove').click(function () {
            var id = $(this).data('id');

            swal({
                title: 'Xóa',
                text: 'Bạn có muốn xóa không ?',
                allowOutsideClick: false,
                showCancelButton: true,
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy bỏ',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve, reject) {

                        $.ajax({
                            url: '<?php echo base_url("news/remove"); ?>',
                            type: 'GET',
                            dataType: 'JSON',
                            data: {
                                id: id
                            },
                            success: function (result) {

                                if (!result.isError) {
                                    window.location = window.location.href;
                                } else {
                                    swal('Lỗi !', result.message, 'error');
                                }
                            }
                        })
                    })
                }
            })


        });
});
</script>

<?php $this->load->view("partial/footer"); ?>

