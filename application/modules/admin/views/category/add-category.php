<?php $this->load->view("partial/header"); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Thêm danh mục</h4>
                        <!-- <p class="category">Complete your profile</p> -->
                    </div>
                    <div class="card-content">
                        <?php $this->load->view("category/form-category"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view("partial/footer"); ?>
