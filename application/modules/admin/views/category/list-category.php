<?php $this->load->view("partial/header"); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <?php if($this->session->flashdata('save_category_success')): ?>
            <?php echo '<div class="alert alert-success"><span>' .
            $this->session->flashdata('save_category_success') .
                '</span></div>';
            ?>
            <?php endif; ?>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Danh sách danh mục
                            <a href="<?php echo base_url('category/add'); ?>" class="btn btn-success" style="margin-left: 60%"><i class="fa fa-plus"></i> Thêm danh mục</a>
                        </h4>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                            <th>Danh mục</th>
                            </thead>
                            <tbody>
                            <?php if(count($arrCategory)): ?>
                                <?php foreach ($arrCategory as $category) {

                                $status = $category['status'] ? '<span style="color: green">Kích hoạt</span>' : '<span style="color: red">Chưa kích hoạt</span>';
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $category['name']; ?>
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        <?php echo $status; ?>
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                                        <a class="btn btn-default btn-xs" href="<?php echo base_url('category/edit/' . $category['id'] ); ?>"><i class="fa fa-pencil"></i> Sửa</a>
                                        <button class="btn btn-danger btn-xs btn-remove" data-id="<?php echo $category['id']; ?>"><i class="fa fa-times"></i> Xóa</button>

                                        <?php if(count($category['children'])): ?>
                                            <?php foreach($category['children'] as $child):

                                                $status = $child['status'] ? '<span style="color: green">Kích hoạt</span>' : '<span style="color: red">Chưa kích hoạt</span>';
                                            ?>

                                                <?php echo '<br/> &nbsp; &nbsp; &#8888; ' . $child['name']; ?>
                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                <?php echo $status; ?>
                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                <a class="btn btn-default btn-xs" href="<?php echo base_url('category/edit/' . $child['id'] ); ?>"><i class="fa fa-pencil"></i> Sửa</a>
                                                <button class="btn btn-danger btn-remove btn-xs" data-id="<?php echo $child['id']; ?>"><i class="fa fa-times"></i> Xóa</button>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php }?>

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
                            url: '<?php echo base_url("category/remove"); ?>',
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

