<div class="ninecol">
    <?php
    
    if($items=='0'){
    foreach ($search_results as $key => $value): ?>
    <?php if (count($value) > 0) {
    ?>
            <div class="downloadlist">
                <h2 align="center"><? echo $key; ?></h2>
        <?php
            $num_rows = count($value);
            for ($i = 0; $i < $num_rows; $i++):
                $current_doc = $value[$i];
                $file_extension = strstr($current_doc['file_name'], '.');

                $icon_class = '';
                switch ($file_extension) {
                    case '.docs':
                        $icon_class = 'description-word';
                        break;

                    case '.docx':
                        $icon_class = 'description-word';
                        break;

                    case '.xls':
                        $icon_class = 'description-excel';
                        break;

                    case '.xlsx':
                        $icon_class = 'description-excel';
                        break;

                    case '.pdf':
                        $icon_class = 'description-pdf';
                        break;

                    default:
                        $icon_class = 'description-pdf';
                        break;
                }

                //var_dump($file_extension . ": ". $icon_class);
        ?>

                <div class="downloadlist">
                    <h5><?php echo $current_doc['title']; ?></h5>
                    <p class ="downloaddescription <?php echo $icon_class; ?>">
                        Description: <?php echo $current_doc['description']; ?>
                    </p>

                    <p class="downloadfiledetails">
                        <a href="<?php echo base_url() . $current_doc['directory_path'] . $current_doc['file_name']; ?>">Download:</a>
                <?php
                echo $current_doc['file_name'] . " ";
                echo $current_doc['size'] . "kb ";
                echo "Uploaded on " . $current_doc['upload_date']
                ?>
            </p>
        </div>

        <?php endfor; ?>
            </div>

            <!-- If there is Content display it -->
    <?php }
        endforeach; }else{?>
            <div id="no_result">
                <h2>No items found</h2>
                <p>No items matching your search phrase were found. You can try again with a different phrase</p>
            </div>
            <?php } ?>

</div>

<div class="threecol last">

</div>

