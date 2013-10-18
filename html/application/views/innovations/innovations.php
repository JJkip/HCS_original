 
<div class="twelvecol">
    <div class="dropdown_section">
        <h2>Innovations and Lessons</h2>
        <div class="drop_down">
            <?php $js = 'id="organization"'; ?>
            <?php echo form_dropdown("organizations", $organizations, $org_id, $js); ?>
        </div>
    </div>
 <table class="table table-hover table-striped">
        <tbody>
    <div><?php echo $this->session->flashdata('message'); ?> </div>

    <?php
            for ($i = 0; $i < count($innovations); $i++):
                $current_doc = $innovations[$i];
                $file_extension = strstr($current_doc['file_name'], '.');

                $icon_class = '';
                switch ($file_extension) {
                    case '.docs':
                        $icon_class = 'description-word';
                        break;
                    case '.docx':
                        $icon_class = 'description-word';
                    case '.xls':
                        $icon_class = 'description-excel';
                        break;
                    case '.xlsx':
                        $icon_class = 'description-excel';
                    case '.pdf':
                        $icon_class = 'description-pdf';


                    default:
                        $icon_class = 'description-pdf';
                        break;
                }

                //var_dump($file_extension . ": ". $icon_class);
    ?>
 <tr>
        <td>


                <h5 class="header5"><?php echo $current_doc['title']; ?></h5>

                <p class="downloaddescription <?php echo $icon_class; ?> >">
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
</td>
        </tr>

    <?php endfor; ?>
                </tbody>
           </table>

            </div>

            <div class="threecol last"></div>
            <script type="text/javascript">// <![CDATA[
                $(document).ready(function(){
                    $('#organization').change(function(){ //any select change on the dropdown with organization trigger this code
                        var org_id = $('#organization').val();  // here we are taking organization id of the selected one.
                        //we now redirect to the relevant controller
                        window.location.replace("<?php echo base_url() ?>index.php/innovations/filter/"+org_id);
        });
    });
    // ]]>
</script>