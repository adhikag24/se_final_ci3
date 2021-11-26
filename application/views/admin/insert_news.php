<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Insert News</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">News</li>
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
                        <div class="card-body">
                          <?= form_open_multipart(base_url('admin/insert_news')) ?>
                                 <div class="form-group">
                                    <label for="title">News Title</label>
                                    <input type="text" class="form-control " onkeyup = "createSlug()" id="title" value="" name = "title"
                                        placeholder="Title goes here...">
                                </div>
                                <?= form_error('title', '<small class="text-danger pl-3">', '</small>') ?>
                                
                                
                                <div class="form-group purple-border">
                                    <label for="editor">News Content</label>
                                    <textarea style="height: 100%;" class="form-control " rows="10" name="content" id="editor"></textarea>
                                </div>
                                <?= form_error('content', '<small class="text-danger pl-3">', '</small>') ?>

                                <?php $users = $this->db->get('member')->result_array() ?>
                                <div class="form-group purple-border">
                                    <label for="editor">News Author</label>
                                <select class="custom-select my-1 mr-sm-2" name="news_author" id="inlineFormCustomSelectPref">
                                    <option selected>Choose...</option>
                                    <?php foreach($users as $user): ?>
                                    <option value="<?=$user['member_id']?>"><?=$user['member_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                                <?= form_error('content', '<small class="text-danger pl-3">', '</small>') ?>
                                <div class="form-group">
                                    <label for="content">News Slug</label>
                                    <input type="text" value="" class="form-control" id="slug" name="slug" placeholder="" readonly>
                                </div>

                                <div class="form-group">
                                <label for="content">News Image</label><br>
                                <!-- <div class="custom-file mb-3"> -->
                                    <input type="file" class="" id="news_image" name="news_image">
                                    <!-- <label for="" class="custom-file-label">Choose Image..</label> -->
                                <!-- </div> -->
                                <div class="invalid-feedback"></div>
                                </div>
                                <button type="submit" class="btn btn-primary">Insert</button>
                            </form>
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