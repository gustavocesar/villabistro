<div class="row">
    <div class="col-lg-12">
        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <?php
                foreach ($arrLocations as $location) {
                    $typeIndicator = substr($location['LocationType']['name'], 0, 1);
                    $control = "location_" . $location['Location']['id'];
                    ?>
                    <li role="presentation">
                        <a href="#<?= $control ?>" aria-controls="<?= $control ?>" role="tab" data-toggle="tab" onclick="javascript:hideReturnMessage();showStockLocation('<?= $control ?>')">
                            <?php echo $location['Location']['name']; ?>
                            &nbsp;
                            <span class="badge pull-right" data-original-title="<?php echo $location['LocationType']['id'] == 1 ? "Físico" : "Virtual" ;?>" data-toggle="tooltip" data-placement="top"><?php echo $typeIndicator;?></span>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            
            <div class="responseParentMessage">
            </div>

            <div class="responseShowItems">
            </div>

            <!-- Tab panes -->
            <div class="tab-content">
                <?php
                foreach ($arrLocations as $location) {
                    $control = "location_" . $location['Location']['id'];
                    ?>
                    <div role="tabpanel" class="tab-pane fade" id="<?= $control ?>">
                    </div>
                    <?php
                }
                ?>
            </div>

        </div>
    </div>
</div>

<?= $this->element('loading'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('.nav-tabs a:first').click();
    });

    function showStockLocation(element_id) {
        $.get(
            "stocks/get_list_stock_by_location/"+element_id,
            null,
            function (data) {
                $("#"+element_id).html(data);
            }
        );
    }

</script>


<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div id="modal-content" class="modal-content">

        </div>
    </div>
</div>