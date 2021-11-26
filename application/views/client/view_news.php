<div class="container">
    <div class="d-flex justify-content-center mt-4 mb-4">
        <h1><?= $news['news_title'] ?></h1>
    </div>
    <div class="d-flex justify-content-center">
        <figure class="figure">
            <img src="<?= base_url() ?>/assets/image/news/<?= $news['news_image'] ?>" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
            <figcaption class="figure-caption">By: <?= $this->db->get_where('member',['member_id'=>$news['author_id']])->row_array()['member_name']; ?></figcaption>
        </figure>
    </div>
    <div>
    <?= $news['news_content'] ?>
    </div>
    <div class="d-flex justify-content-start mt-4">
        <h5>Comments:</h5>
    </div>

    <?php if($this->session->userdata('role') == 0):?>
    <div class="d-flex justify-content-start">
        <form action="<?=base_url()?>comment/insert_comment" class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Type your comments</label>
                <input type="hidden" name="news_id" value="<?= $news['news_id'] ?>">
                <input type="text" name="comment" class="form-control" id="inputPassword2" placeholder="Type your comments">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Send</button>
        </form>
    </div>
    <?php endif; ?>
    <?php foreach($comments as $row): ?>
    <div class="d-flex justify-content-start mb-2">
        <div class="d-flex flex-column">
            <div class="p font-weight-bold"><?=$row['member_name']?></div>
            <div><?=$row['comment']?></div>
            <div class="p font-weight-light"><?=$row['date_created']?></div>
        </div>
    </div>
    <?php endforeach; ?> 
</div>