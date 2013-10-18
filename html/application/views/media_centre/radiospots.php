<div class="twelvecol">

    <div class="dropdown_section">
        <h2><?php echo $title; ?></h2>
        <div class="drop_down">
            <?php
//    $filter = 'onchange = "filter_content(' . "'" .  base_url() . "'," . 'this, \'news\');"';
            $js = 'id="organization"';
            echo form_dropdown("organization", $organizations, $org_id, $js);
            ?>
        </div>
    </div>
    <table class="table table-hover table-striped">
    <tbody>
    <div id="message">
        <?php
            echo $this->session->flashdata('message');
        ?>
        </div>  
              
    <?php
            if (count($media) > 0) {
                foreach ($media as $m): ?>
                <tr>
                <td>
                        <div class="downloadlist">
                        <h2><?php echo $m['title'] ?></h2>
                        <p class="downloaddescription <?php echo $m['css_class']; ?>">
            <?php echo $m['description'] ?>
                </p>
                <p class="downloadfiledetails"><a href="<?php echo $m['download_link']; ?>" target="_blank">Download</a>
            <?php echo $m['file']; ?>&nbsp;<?php echo $m['size']; ?>Kb uploaded on <?php echo $m['created']; ?> by <?php echo $m['organization']; ?></p>
            </div>
            </td>
            </tr>
    <?php
                    endforeach;
                }else {
    ?>
                    <div class="alert">
                        <p><strong>Sorry,</strong> no media has been uploaded to this section yet. Please check again later</p>
                    </div>
    <?php } ?>
    </tbody>
    </table>
            </div>
            <script type="text/javascript">// <![CDATA[
                $(document).ready(function(){
                    $('#organization').change(function(){ //any select change on the dropdown with id country trigger this code
                        var org_id = $('#organization').val();  // here we are taking organization id of the selected one.
                        //we now redirect to the relevant controller
                        window.location.replace("<?php echo base_url() ?>index.php/media_centre/posters/"+org_id);
        });
    });
    // ]]>
</script>