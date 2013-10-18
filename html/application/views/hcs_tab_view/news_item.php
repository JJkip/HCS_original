<div class="twelvcol">
<div class="news_items">
    <div id="news_item">
   <!-- <table class="table table-striped">
        <tbody>
        <tr>
        <td>-->
        <div class="newstitle"><?php echo $item->news_title ?></div>
        
        <p class="date"><?php echo 'written on ' . $item->date_created . ' by ' . $item->organization; ?></p>
        <p class="description">
            <?php echo $item->description ?>
        </p>
        <?php if ($item->file <> "") {
        ?>
                <div class="download">
                    Download <a href="<?php echo base_url() . 'uploads/news/' . $item->file; ?>" target="_blank">
                <?php echo $item->file; ?>
            </a>
        </div>
        <!--</td>
        </tr>
        </tbody>
        </table>-->
        <?php } ?>
    </div>
</div>
</div>
