<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>News Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">News Management</li>
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
                            <h5 class="m-0 text-dark">News List
                                <div class="float-right">
                                    <a href="<?=base_url()?>admin/create_news" class="btn btn-sm btn-info"><i
                                            class="fa fa-plus"></i> Add News</a>
                                </div>
                            </h5>
                            
                        </div>
                        <div class="card-body">
                        <?= $this->session->userdata('message'); ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>News Title</th>
                                        <th>News Author</th>
                                        <th>News Content</th>
                                        <th>News Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                <?php $i = 0; foreach($newsData as $row): $i++ ?>
                                <?php $author_name = $this->db->get_where('member',['member_id' => $row['author_id']])->row_array()['member_name']; ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row['news_title'] ?></td>
                                        <td><?= $author_name ?></td>
                                        <td><?= $row['news_content'] ?></td>
                                        <td>
                                        <a class="image-popup" ><img width="120" class="img-responsive" src="<?=base_url()?>/assets/image/news/<?= $row['news_image'] ?>"></a>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?=base_url()?>/admin/edit_news/<?=$row['news_slug']?>"
                                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                <a href="<?=base_url()?>/admin/delete_news/<?=$row['news_slug']?>"
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