<h1>Customers</h1>
<div class="row">
    <div class="col-md-3">
        <a href="#" id="add_customer_btn" class="btn">Add customer</a>
    </div>
</div>
<div class="row" id="add_customer" style="display: none;">
    <form action="<?php echo base_url('admin/customer_add');?>" method="POST">
        <div class="form-group">
            <label for="name">Customer name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="address_line_1">Address line 1</label>
            <input type="text" name="address_line_1" class="form-control" id="address_line_1" placeholder="Address line 1">
        </div>
        <div class="form-group">
            <label for="address_line_2">Address line 2</label>
            <input type="text" name="address_line_2" class="form-control" id="address_line_2" placeholder="Address line 2">
        </div>
        <div class="form-group">
            <label for="town">Town</label>
            <input type="text" name="town" class="form-control" id="town" placeholder="Town">
        </div>
        <div class="form-group">
            <label for="post_code">Post code</label>
            <input type="text" name="post_code" class="form-control" id="post_code" placeholder="Post code">
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <select name="country_id" class="form-control" id="country">
                <?php foreach($countries as $country) :?>
                    <option value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-default">Create</button>
        </div>
    </form>
    <hr>
</div>
<div class="row">
    <form>
        <input type="text" name="search" class="form-control" placeholder="Search" value="<?php echo (empty($_GET['search'])?'':$_GET['search']);?>">
    </form>
    <div  class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address line 1</th>
                <th>Address line 2</th>
                <th>Town</th>
                <th>Post code</th>
                <th>Country</th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
    <div  class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php foreach($customers as $customer) :?>
                <tr>
                    <td><?php echo $customer->id;?></td>
                    <td><a href="<?php echo base_url();?>admin/stores/<?php echo $customer->id;?>"><?php echo $customer->name;?></a></td>
                    <td><?php echo $customer->address_line_1;?></td>
                    <td><?php echo $customer->address_line_2;?></td>
                    <td><?php echo $customer->town;?></td>
                    <td><?php echo $customer->post_code;?></td>
                    <td><?php echo $customer->country;?></td>
                    <td><a href="<?php echo base_url();?>admin/customer_edit/<?php echo $customer->id;?>">Edit</a><br>
                        <a href="<?php echo base_url();?>admin/customer_delete/<?php echo $customer->id;?>">Delete</a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>