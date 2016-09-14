 <form action="<?php echo base_url('admin/customer_edit/' . $customer->id);?>" method="POST">
            <div class="form-group">
                <label for="name">Customer name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $customer->name;?>">
            </div>
            <div class="form-group">
                <label for="address_line_1">Address line 1</label>
                <input type="text" name="address_line_1" class="form-control" id="address_line_1" placeholder="Address line 1" value="<?php echo $customer->address_line_1;?>">
            </div>
            <div class="form-group">
                <label for="address_line_2">Address line 2</label>
                <input type="text" name="address_line_2" class="form-control" id="address_line_2" placeholder="Address line 2" value="<?php echo $customer->address_line_1;?>">
            </div>
            <div class="form-group">
                <label for="town">Town</label>
                <input type="text" name="town" class="form-control" id="town" placeholder="Town" value="<?php echo $customer->town;?>">
            </div>
            <div class="form-group">
                <label for="post_code">Post code</label>
                <input type="text" name="post_code" class="form-control" id="post_code" placeholder="Post code" value="<?php echo $customer->post_code;?>">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select id="country" name="country_id" class="form-control">
                    <?php foreach($countries as $country) :?>
                        <option value="<?php echo $country->id;?>" <?php echo (($country->id == $customer->country_id)?'selected="selected"':'');?>><?php echo $country->name;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <hr>
</div>