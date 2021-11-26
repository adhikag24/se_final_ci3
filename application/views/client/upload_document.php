<div class="container mt-4">
<div class="d-flex justify-content-center">
<h1>Upload your document here</h1>
</div>
<?= $this->session->userdata('message'); ?>

<div class="d-flex justify-content-center">
<?= form_open_multipart(base_url('home/insert_document')) ?>
  <div class="form-group">
    <label for="exampleFormControlFile1">word document file only (.docx)</label>
    <input type="file" name="news_document" class="form-control-file" id="exampleFormControlFile1">
  </div>
</div>
<div class="d-flex justify-content-center">
<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Send!</button>
</div>
</form>
</div>