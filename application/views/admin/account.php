<?php $this->load->view('header'); ?>

    <div class="container">
        <div class="row">
            <div class="col-6 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                        Admin Home <?php echo $title; ?>
                    </div>
                    <div class="card-body">
                        Content
                        <?php
                        echo '<pre>';
                        print_r ($this->session->userdata());


                        print_r ($this->smarty_acl->get_admin()['id']);
                        echo '</pre>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('account'); ?>
