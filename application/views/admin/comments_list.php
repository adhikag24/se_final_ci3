<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Comments Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Comments Management</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <!-- /.card-header -->

                        <div class="card-header">
                            <h5 class="m-0 text-dark">Comments List
                               
                            </h5>
                          <?= $this->session->userdata('message'); ?>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Comment</th>
                                        <th>News Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i= 0; foreach($comments as $row): $i++?>
                                <?php
                                    $name = $this->db->get_where('member',['member_id'=>$row['user_id']])->row_array()['member_name'];
                                    $title = $this->db->get_where('news',['news_id'=>$row['news_id']])->row_array()['news_title'];
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $name ?></td>
                                        <td><?= $row['comment'] ?></td>
                                        <td>
                                            <?= $title ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?=base_url()?>admin/delete_comment/<?=$row['comment_id']?>"
                                                    onclick="return confirm('Are you sure?')"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


