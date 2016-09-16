<form action="<?php echo base_url('admin/store_edit/' . $store->id . '?back=' . $customer->id);?>" method="POST">
    <div class="form-group">
        <label class="m-top-5" for="name">Store name</label>
        <input required type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $store->name;?>">
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">Store address</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label  for="address_line_1">Address line 1</label>
                        <input required type="text" name="address_line_1" class="form-control" id="address_line_1" placeholder="Address line 1" value="<?php echo $store->address_line_1;?>">
                    </div>
                    <div class="form-group">
                        <label  for="address_line_2">Address line 2</label>
                        <input required type="text" name="address_line_2" class="form-control" id="address_line_2" placeholder="Address line 2" value="<?php echo $store->address_line_2;?>">
                    </div>
                    <div class="form-group">
                        <label  for="town">Town</label>
                        <input required type="text" name="town" class="form-control" id="town" placeholder="Town" value="<?php echo $store->town;?>">
                    </div>
                    <div class="form-group">
                        <label  for="post_code">Post code</label>
                        <input required type="text" name="post_code" class="form-control" id="post_code" placeholder="Post code" value="<?php echo $store->post_code;?>">
                    </div>
                    <div class="form-group">
                        <label  for="country">Country</label>
                        <select required id="country" name="country_id" class="form-control">
                            <?php foreach($countries as $country) :?>
                                <option value="<?php echo $country->id;?>" <?php echo (($country->id == $store->country_id)?'selected="selected"':'');?>><?php echo $country->name;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading">Configuration</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label  for="pouch_id_option">Pouch ID option</label>
                        <select required name="pouch_id_option" id="pouch_id_option" class="form-control">
                            <option value="barcode" <?php echo (($store->pouch_id_option == 'barcode')?'selected="selected"':'');?>>Barcode</option>
                            <option value="increment" <?php echo (($store->pouch_id_option == 'increment')?'selected="selected"':'');?>>Increment</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label  for="number_of_tills">Number of tills</label>
                        <input type="number" required name="number_of_tills" class="form-control" id="number_of_tills" placeholder="Post code" value="<?php echo $store->number_of_tills;?>">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 no-padding">
        <a href="<?php echo base_url();?>admin/stores/<?php echo $store->customer_id;?>" class="btn btn-primary m-top-5">Cancel</a>
        <button type="submit" class="btn btn-primary float-right m-top-5">Save changes</button>
    </div>
</form>
</div>
<hr>
</div>