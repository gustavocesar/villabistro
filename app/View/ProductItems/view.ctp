<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-blue" style="background:#FFF;">
            <div class="panel-heading"><?php echo '<i class="fa fa-search"></i>&nbsp;' . __('View'); ?></div>
            <div class="panel-body">
                <table class="table table-hover">
                    <tbody>
                        		<tr>
		<td class="col-lg-3"><?php echo __('Id'); ?></td>
		<td class="col-lg-9">
			<?php echo h($productItem['ProductItem']['id']); ?>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Product'); ?></td>
		<td class="col-lg-9">
			<span class="label label-sm label-success custom-label-link">
			<?php echo $this->Html->link($productItem['Product']['name'], array('controller' => 'products', 'action' => 'view', $productItem['Product']['id'])); ?>
			</span>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Item'); ?></td>
		<td class="col-lg-9">
			<span class="label label-sm label-success custom-label-link">
			<?php echo $this->Html->link($productItem['Item']['name'], array('controller' => 'products', 'action' => 'view', $productItem['Item']['id'])); ?>
			</span>
		</td>
		</tr>
		<tr>
		<td class="col-lg-3"><?php echo __('Quantity'); ?></td>
		<td class="col-lg-9">
			<?php echo h($productItem['ProductItem']['quantity']); ?>
		</td>
		</tr>
                    </tbody>
                </table>
            </div>
            <div class="form-actions text-right pal">
                	<?php echo $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-left btn btn-yellow', 'style' => 'margin-left:10px']); ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>




<p>&nbsp;</p>


