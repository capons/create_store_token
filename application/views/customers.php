 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title text-center">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Add customer
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <form action="<?php echo base_url('admin/customer_add');?>" method="POST">
                                    <div class="col-xs-6">
                                        <label class="m-top-5" for="name">Customer name</label>
                                        <input type="text" required name="name" class="form-control" id="name" placeholder="Name">
                                    </div>
                                    <div class="col-xs-6">
                                        <label class="m-top-5" for="address_line_1">Address line 1</label>
                                        <input type="text" required name="address_line_1" class="form-control" id="address_line_1" placeholder="Address line 1">
                                    </div>
                                    <div class="col-xs-6">
                                        <label class="m-top-5" for="address_line_2">Address line 2</label>
                                        <input type="text" name="address_line_2" class="form-control" id="address_line_2" placeholder="Address line 2">
                                    </div>
                                    <div class="col-xs-6">
                                        <label class="m-top-5" for="town">Town</label>
                                        <input type="text" required name="town" class="form-control" id="town" placeholder="Town">
                                    </div>
                                    <div class="col-xs-6">
                                        <label class="m-top-5" for="post_code">Post code</label>
                                        <input type="text" required name="post_code" class="form-control" id="post_code" placeholder="Post code">
                                    </div>
                                    <div class="col-xs-6">
                                        <label class="m-top-5" for="country">Country</label>
                                        <select required name="country_id" class="form-control" id="country">
                                            <?php foreach($countries as $country) :?>
                                                <option value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="created" value="<?php echo date("Y-m-d H:i:s"); ?>">
                                    <div class="col-xs-6">
                                        <button type="submit" class="btn btn-primary m-top-13">Save</button>
                                    </div>
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
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>

                <table class="table table-hover">
                    <thead>

                    <tr>
                        <th>ID</th>
                        <th><a class="glyphicon glyphicon-arrow-down sort-pos <?php if (isset($_GET['field']) && $_GET['field'] == 'name' && $_GET['sort'] == 'desc'){ echo 'rotate_sort';} ?>" data-field="name"  href="<?php echo base_url('admin/customers?field=name&sort="');?>"></a>Name</th>
                        <th>Address line 1</th>
                        <th>Address line 2</th>
                        <th>Town</th>
                        <th>Post code</th>
                        <th><a class="glyphicon glyphicon-arrow-down sort-pos <?php if (isset($_GET['field']) && $_GET['field'] == 'country' && $_GET['sort'] == 'desc'){ echo 'rotate_sort';} ?>" data-field="country"  href="<?php echo base_url('admin/customers?field=country&sort="');?>"></a>Country</th>
                        <th><a class="glyphicon glyphicon-arrow-down sort-pos <?php if (isset($_GET['field']) && $_GET['field'] == 'created' && $_GET['sort'] == 'desc'){ echo 'rotate_sort';} ?>" data-field="created" href="<?php echo base_url('admin/customers?field=created&sort="');?>"></a>Created</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customers as $customer) :?>
                            <tr>
                                <td><?php echo $customer->id;?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/stores/'.$customer->id);?>"><?php echo $customer->name;?></a>
                                </td>
                                <td><?php echo $customer->address_line_1;?></td>
                                <td><?php echo $customer->address_line_2;?></td>
                                <td><?php echo $customer->town;?></td>
                                <td><?php echo $customer->post_code;?></td>
                                <td><?php echo $customer->country;?></td>
                                <td><?php echo $customer->created;?></td>
                                <td>
                                    <a href="<?php echo base_url();?>admin/customer_edit/<?php echo $customer->id;?>" class="btn btn-primary">Edit</a>
                                    <a href="<?php echo base_url();?>admin/customer_delete/<?php echo $customer->id;?>" class="btn btn-primary">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>

            </div>
        </div>
