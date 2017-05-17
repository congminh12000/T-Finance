<?php $this->load->view("partial/header"); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Danh sách hồ sơ vay</h4>
                        <!--<p class="category">Here is a subtitle for this table</p>-->
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                            <th>Vay mua</th>
                            <th>Thế chấp</th>
                            <th>Hộ khẩu</th>
                            <th>Thời gian hẹn</th>
                            <th class="text-center">Chức năng</th>
                            </thead>
                            <tbody>
                                <?php
                                if (count($arrList) > 0):

                                    $this->load->library('loan_lib');

                                    $listStepOneLabel = $this->loan_lib->listStepOneLabel();
                                    $listStepTwoLabel = $this->loan_lib->listStepTwoLabel();
                                    $listStepThreeLabel = $this->loan_lib->listStepThreeLabel();
                                    $listStepFourLabel = $this->loan_lib->listStepFourLabel();
                                    $listStepFiveLabel = $this->loan_lib->listStepFiveLabel();

                                    foreach ($arrList as $item):
                                        ?>
                                        <tr>
                                            <td><?php echo $item['step_one_buy']; ?></td>
                                            <td><?php echo $item['step_two_loan'] ?></td>
                                            <td><?php echo $item['step_four_shk_address'] ?></td>
                                            <td><?php echo $item['step_five_day'] . ' - ' . $item['step_five_time']; ?></td>
                                            <td class="text-center">
                                                <a href="javascript:void(0);" class="btn-view-detail" data-json='<?php echo json_encode($item); ?>'>
                                                    <i class="material-icons">local_hospital</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view("partial/footer"); ?>

<script>
    var listStepOneLabel = '<?php echo isset($listStepOneLabel) ? json_encode($listStepOneLabel) : ''; ?>';
    var listStepTwoLabel = '<?php echo isset($listStepTwoLabel) ? json_encode($listStepTwoLabel) : ''; ?>';
    var listStepThreeLabel = '<?php echo isset($listStepThreeLabel) ? json_encode($listStepThreeLabel) : ''; ?>';
    var listStepFourLabel = '<?php echo isset($listStepFourLabel) ? json_encode($listStepFourLabel) : ''; ?>';
    var listStepFiveLabel = '<?php echo isset($listStepFiveLabel) ? json_encode($listStepFiveLabel) : ''; ?>';
</script>