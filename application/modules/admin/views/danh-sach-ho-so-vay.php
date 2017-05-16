<?php $this->load->view("partial/header"); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Danh sách hồ sơ</h4>
                        <!--<p class="category">Here is a subtitle for this table</p>-->
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                            <th>Vay mua</th>
                            <th>Thế chấp</th>
                            <th>Hộ khẩu</th>
                            <th>Thời gian hẹn</th>
                            </thead>
                            <tbody>
                                <?php foreach ($arrList as $item): ?>
                                    <tr>
                                        <td><?php echo $item['step_one_buy']; ?></td>
                                        <td><?php echo $item['step_two_loan'] ?></td>
                                        <td><?php echo $item['step_four_shk_address'] ?></td>
                                        <td><?php echo $item['step_five_day'] . ' - ' .$item['step_five_time']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view("partial/footer"); ?>