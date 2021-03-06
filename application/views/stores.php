<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-primary">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Add store
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <form action="<?php echo base_url('admin/store_add?back='.$customer->id);?>" method="POST">
                    <input  type="text" name="customer_id" value="<?php echo $customer->id;?>" style="display: none;" >
                    <div class="form-group">
                        <label for="name">Store name</label>
                        <input type="text" name="name" class="form-control" id="name" required placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="address_line_1">Address line 1</label>
                        <input type="text" name="address_line_1" class="form-control" id="address_line_1" required placeholder="Address line 1">
                    </div>
                    <div class="form-group">
                        <label for="address_line_2">Address line 2</label>
                        <input type="text" name="address_line_2" class="form-control" id="address_line_2" required placeholder="Address line 2">
                    </div>
                    <div class="form-group">
                        <label for="town">Town</label>
                        <input type="text" name="town" class="form-control" id="town" required placeholder="Town">
                    </div>
                    <div class="form-group">
                        <label for="post_code">Post code</label>
                        <input type="text" name="post_code" class="form-control" id="post_code" required placeholder="Post code">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select name="country_id" class="form-control" required id="country">
                            <?php foreach($countries as $country) :?>
                                <option value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pouch_id_option">Post code</label>
                        <select name="pouch_id_option" required class="form-control">
                            <option value="barcode">Barcode</option>
                            <option value="increment">Increment</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="number_of_tills">Number of tills</label>
                        <input type="number"  name="number_of_tills" class="form-control" required id="number_of_tills" placeholder="Number of tills">
                    </div>
                    <button type="submit" class="btn btn-primary">Add store</button>
                </form>

            </div>
        </div>
    </div>
</div>

<form class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputSearch" placeholder="Search" name="search" value="<?php echo(!empty($_GET['search']))?$_GET['search']:'';?>">
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<table class="table table-hover" style="font-size: 12px;">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address line 1</th>
        <th>Address line 2</th>
        <th>Town</th>
        <th>Post code</th>
        <th>Country</th>
        <th>Pouch ID option</th>
        <th>Number of tills</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($stores as $store) :?>
        <tr>
            <td><?php echo $store->id;?></td>
            <td>
                <a href="<?php echo base_url('admin/tokens/'.$store->id);?>"><?php echo $store->name;?></a>
            </td>
            <td><?php echo $store->address_line_1;?></td>
            <td><?php echo $store->address_line_2;?></td>
            <td><?php echo $store->town;?></td>
            <td><?php echo $store->post_code;?></td>
            <td><?php echo $store->country;?></td>
            <td><?php echo $store->pouch_id_option;?></td>
            <td><?php echo $store->number_of_tills;?></td>
            <td>
                <a href="<?php echo base_url('admin/store_edit/'.$store->id);?>" class="btn btn-primary">Edit</a>
                <a href="<?php echo base_url('admin/store_delete/'.$store->id.'?back='.$customer->id);?>" class="btn btn-primary">Delete</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

</div>
</div>
