<form action="<?php echo base_url('admin/store_edit/' . $store->id . '?back=' . $customer->id);?>" method="POST">
    <div class="form-group">
        <label for="name">Store name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $store->name;?>">
    </div>
    <div class="form-group">
        <label for="address_line_1">Address line 1</label>
        <input type="text" name="address_line_1" class="form-control" id="address_line_1" placeholder="Address line 1" value="<?php echo $store->address_line_1;?>">
    </div>
    <div class="form-group">
        <label for="address_line_2">Address line 2</label>
        <input type="text" name="address_line_2" class="form-control" id="address_line_2" placeholder="Address line 2" value="<?php echo $store->address_line_1;?>">
    </div>
    <div class="form-group">
        <label for="town">Town</label>
        <input type="text" name="town" class="form-control" id="town" placeholder="Town" value="<?php echo $store->town;?>">
    </div>
    <div class="form-group">
        <label for="post_code">Post code</label>
        <input type="text" name="post_code" class="form-control" id="post_code" placeholder="Post code" value="<?php echo $store->post_code;?>">
    </div>
    <div class="form-group">
        <label for="country">Country</label>
        <select id="country" name="country_id" class="form-control">
            <?php foreach($countries as $country) :?>
                <option value="<?php echo $country->id;?>" <?php echo (($country->id == $store->country_id)?'selected="selected"':'');?>><?php echo $country->name;?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div>
        <label for="pouch_id_option">Pouch ID option</label>
        <select name="pouch_id_option" id="pouch_id_option" class="form-control">
            <option value="barcode" <?php echo (($store->pouch_id_option == 'barcode')?'selected="selected"':'');?>>Barcode</option>
            <option value="increment" <?php echo (($store->pouch_id_option == 'increment')?'selected="selected"':'');?>>Increment</option>
        </select>
    </div>
    <div>
        <label for="number_of_tills">Number of tills</label>
        <input type="text" name="number_of_tills" class="form-control" id="number_of_tills" placeholder="Post code" value="<?php echo $store->number_of_tills;?>">
    </div>
    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
</div>
<hr>
</div>