<?php
//var_dump($this->cizacl->check_isAllowed($this->session->userdata('user_cizacl_role_id', 'documents')));
//var_dump($this -> session -> userdata('region_id'));
//var_dump($this -> session -> userdata('organization_id'));
?>
<div class="ninecol">
    <div class="downloadlist">
        <div class="dropdown_section">
            <h2>Documents</h2>
            <div class="drop_down">

                <?php
                $js = 'id="category"';
                echo form_dropdown("category", $categories, $category_id, $js);
                ?>
            </div>
        </div>
        <?php
                $num_docs = count($saved_docs);
                if ($num_docs > 0) {
                    for ($i = 0; $i < $num_docs; $i++):
                        $current_doc = $saved_docs[$i];
                        $file_extension = strstr($current_doc['file_name'], '.');
                        $current_doc['upload_date'] = date('j F Y', strtotime($current_doc['upload_date']));
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
                                <a href="<?php echo base_url() . $current_doc['directory_path'] . $current_doc['file_name']; ?>">Download:&nbsp;&nbsp;&nbsp;</a>
                <?php
                        echo $current_doc['file_name'] . " ";
                        echo $current_doc['size'] . "kb ";
                        echo "Uploaded on " . $current_doc['upload_date']
                ?>
                    </p>
                </div>

        <?php
                        endfor;
                    } else {
        ?>
                        <div id="no_documents">
                            <p>No documents have been uploaded by this organization. Please check again soon</p>
                        </div>
        <?php } ?>
                </div>
            </div>

            <div class="threecol last">
                <h2>Related media</h2>
    <?php if (count($related_media) > 0) {
    ?>
                        <ul>
        <?php
                        foreach ($related_media as $media) {
        ?>
                            <li><a href="<?php echo site_url('media_centre/item/'.$media['slug'])?>"><?php echo $media['title']; ?></a></li>

        <?php
                        }
        ?>
                    </ul>
    <?php } else {
    ?>
                        <div id="no_media">
                            <p>No media related to this section has been uploaded</p>
                        </div>
    <?php } ?>
                </div>
                <script type="text/javascript">// <![CDATA[
                    $(document).ready(function(){
                        $('#category').change(function(){ //any select change on the dropdown with id country trigger this code
                            var cat_id = $('#category').val();  // here we are taking organization id of the selected one.

                            var url="<?php echo base_url() ?>index.php/documents/<?php echo $region_id; ?>/<?php echo $organization_id; ?>/"+cat_id;
            //                    alert(url)
            //                    return false;
            //we now redirect to the relevant controller
            window.location.replace(url);
        });
    });
    // ]]>
</script>