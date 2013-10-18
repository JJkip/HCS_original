<div class="twelvecol">
    <div id="gallery">
    <div class="dropdown_section">
        <h2>Photo gallery - albums</h2>
        </div>
        <div id="message">
            <?php
            echo $this->session->flashdata('message');
            ?>
        </div>
        <?php
            $counter = 0;
//            echo '<pre>';
//            var_dump($data); die;
            foreach ($data['albums'] as $image): ?>
                <div class="single<?php echo ($counter == 0 ? '' : 'first') ?>">
                    <div class="thumbnail">
                        <a href="<?php echo site_url() . '/gallery/album/' . urlencode($image['album']); ?>"
                           title="<?php echo $image['caption']; ?>">
                            <img src="<?php echo base_url() . $data['random_pics'][$counter]; ?>" alt="Plants: image 1 0f 4 thumb" />

                        </a>
                    </div>
                    <p class="description"><?php echo $image['caption']; ?></p>
            <?php if ($image['created'] <> "NA") {
            ?>
                    <p class="credits">Uploaded on <?php echo $image['created']; ?></p>
            <?php } ?>
            </div>

        <?php
                $counter++;
            endforeach;
        ?>

    </div>

</div>