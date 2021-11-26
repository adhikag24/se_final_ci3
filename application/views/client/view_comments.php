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
                                        <th>Comment</th>
                                        <th>News Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($comment as $row): ?>
                                <?php 
                                $news_title = $this->db->get_where('news',['news_id' => $row['news_id']])->row_array()['news_title'];
                                ?>
                                    <tr>
                                        <td>1</td>
                                        <td><?= $row['comment'] ?></td>
                                        <td>
                                        <?= $news_title; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group" >
                                                <a href="<?=base_url()?>/home/view_news/<?=$row['news_id']?>"
                                                    class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                            </div>
                                            <div class="btn-group" data-toggle="modal" data-target="#exampleModal" data-id="<?= $row['comment_id']?>" data-comment="<?= $row['comment']?>">
                                                <a href="#!"
                                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <a href="<?=base_url()?>comment/delete_comment/<?=$row['comment_id']?>"
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?=base_url()?>comment/update_comment">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Old Comment:</label>
            <input type="text" id="old_comment" name="old_comment" class="form-control" readonly>
          </div>
          <input type="hidden" id="comment_id" name="comment_id">
          <div class="form-group">
            <label for="message-text" class="col-form-label">New Comment:</label>
            <input type="text" name="new_comment" class="form-control required">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
 
 $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var comment = button.data('comment') 
  var id = button.data('id') 

  var modal = $(this)
  modal.find('#old_comment').val(comment)
  modal.find('#comment_id').val(id)
})

</script>