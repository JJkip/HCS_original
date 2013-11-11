
    <?php
    //News
    $base_url = base_url();
    $filter_news = 'onchange = "filter_content(' . "'" . $base_url . "'," . 'this, \'news\');"';

    $sort_news = 'onchange = "sort_content(this, \'news\') ;"';
//Uploads

    $filter_uploads = 'onchange = "filter_content(' . "'" . $base_url . "'," . 'this, \'documents\');"';
//$sort_uploads='onchange = "sort_content(this, \'documents\');"';
//$sort_options=array("0"=>"","popular"=>"Popular","date"=>"Date");
    ?>
       
       <div class="sixcol">
        <div class="dropdown_section">
            <h2 class="small">LATEST NEWS</h2>
            <div class="drop_down">
                <?php echo form_dropdown("news_organizations", $organizations, "large", $filter_news); ?>
            </div>
        </div>
        <div id="news">
        	<?php for($i=0; $i<count($news); $i++):?>
        	 <div class="newstitle">
				<p>
					<?php echo $news[$i]['news_title'] ?>
					<span> -    <?php echo $news[$i]['date_created']. "by " . $news[$i]['organization'] ?></span>
					<a href="<?php echo base_url() . 'index.php/news/item/' . $news[$i]['slug'] ?>">read more</a>
				</p>
			  </div>
          <?php endfor ?>
        </div>
            <div class="dropdown_section">
                <h2 class="small">LATEST VIDEOS </h2>
            </div>
                
       <!-- <div id="calendar">
        <div class="dropdown_section">
            <h2 class="small">EVENTS CALENDAR</h2>
            </div>
            <?php// echo $calendar; ?>
            </div>-->
        <?php foreach ($media as $m): ?>
        <div class="videolist">
            <h4><?php echo $m['title'] ?></h4>
            <div class="video polaroid">
                <iframe title="YouTube video player" width="290" height="205" src="http://www.youtube.com/embed/<?php echo $m['id']; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <p class="videodescription">
            <?php echo $m['description'] ?>
        </p>
        <p class="videofiledetails"><?php echo $m['keywords']; ?></p>
    </div>
    <?php endforeach ?>

        </div>

        <!--Documents -->
        <div class="sixcol last">
            <div class="dropdown_section">
                <h2 class="small">LATEST DOCUMENTS</h2>
                <!--Latest Uploads-->
                <div class="drop_down">
                <?php echo form_dropdown("uploads_organizations", $organizations, "large", $filter_uploads); ?>
            </div>
        </div>

        <div id="uploads">
        	<?php for($i=0; $i<count($uploads); $i++): ?>
             <div class="downloadlist">
				<h5><?php echo $uploads[$i]['title']; ?> </h5>
				<p class="downloaddescription description-pdf"><?php echo $uploads[$i]['description']; ?></p>
				<p class="downloadfiledetails">
				<a href="<?php  echo base_url(). $uploads[$i]['directory_path']. $uploads[$i]['file_name']; ?>">Download:</a>
     					<?php 
        					echo " " .$uploads[$i]['file_name']. 
        						$uploads[$i]['size']. 
        						" uploaded on ".
        						$uploads[$i]['upload_date'].
								" by: " .$uploads[$i]['organization'];
     					?>

				</p>
			</div>
<?php  endfor; ?>
        </div>
    </div>

