<div class="container mt-2">
    <div class="jumbotron">
        <h1>Welcome to</h1>
        <h1 class="display-4 font-weight-bold">Newsfeed</h1>
        <p class="lead">Where the news quality is the number one priority</p>
    </div>
</div>

<div class="container carousel-container">
    <div class="d-flex justify-content-between mt-4">
        <h1>Latest News</h1>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

        <?php $i=0; foreach($latestNews as $row): $i++ ?>
            <div class="carousel-item <?=($i == 1) ? 'active' : ''?>">
                <img style="filter: opacity(100%);"  class="d-block w-95 img-thumbnail img-fluid" src="<?= base_url() ?>assets/image/news/<?= $row['news_image']?>" alt="First slide">
                <!-- https://www.cnbc.com/2020/12/01/elon-musk-warns-tesla-employees-stock-could-get-crushed-like-a-souffle-if-company-doesnt-ac.html -->
                <div class="carousel-caption d-none d-md-block bg-light mb-4">
                    <h5><?= $row['news_title']?></h5>
                    <!-- <p><?= $row['news_content']?></p> -->
                </div> 
            </div>
        <?php endforeach; ?>
           
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
</div>
<?php if(empty($keyword)): ?>
<div class="container">
    <div class="d-flex justify-content-between mt-4 mb-2">
        <h1>News</h1>
    </div>

    <div class="card-deck">

    <?php foreach($newsData as $news): ?>
    <div class="card">
        <img class="card-img-top" src="<?= base_url() ?>/assets/image/news/<?= $news['news_image'] ?>" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><a href="<?=base_url()?>home/view_news/<?=$news['news_id']?>"><?= $news['news_title'] ?></a></h5>
        <!-- <p class="card-text"><?= $news['news_content'] ?></p> -->
        <p class="card-text"><small class="text-muted">By: <?= $news['member_name'] ?></small></p>
        <p class="card-text"><small class="text-muted"><?= $news['date_created'] ?></small></p>
        </div>
    </div>
    <?php endforeach; ?>
    </div>
    <div id="pagination" class="my-4">
    <?php echo $this->pagination->create_links(); ?>
    </div>
    </div>
    
</div>

    <?php else: ?>
<div class="container">
<div class="d-flex justify-content-between mt-4 mb-2">
        <h1>Search Result for '<?=$keyword?>'</h1>
    </div>

<?php foreach($searchedNews as $row): ?>
<div class="mag-small-post col-md-12">
																					
	<div class="post-item-grid row mb-4">
	<div class="mag-post-thumb col-4">
        <a href="https://sindi4.com/news/news_detail/68">
				<img src="<?=base_url()?>assets/image/news/<?=$row['news_image']?>" class="img-responsive" style="width:100%" alt="Image">
	    </a>

	</div>
	<div class="mag-post-details col-8">
        <h4 class="mag-post-title">
	<a class="text-dark" href="<?=base_url()?>home/view_news/<?=$row['news_id']?>"><?=$row['news_title']?></a> </h4>
								

				                <div class="mag-post-meta text-dark">
											<div class="user-block">
												<span class="username ml-0 text-dark my-auto">
												<span class="description text-dark my-auto ml-0"><?=$row['date_created']?></span>
											</div>
											<!-- <span class="meta-author"><span class="text-white">By&nbsp;</span><a href="#" class="author-name text-white">Admin IKFTLMATE</a> </span>
											<span class="author-date text-white">Desember 07, 2020</span> -->
										</div>
									</div>
								</div>
									
							
						</div>
<?php endforeach;?>


</div>
    <?php endif; ?>
<!-- NITIP -->
