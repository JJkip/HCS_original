<div class="twelvecol">
<div class="dropdown_section">
    <h2><?php echo $title; ?></h2>
</div>
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