<div class="row">
    <form action="<?php echo base_url('admin/country_add');?>" method="post">
        <div class="col-md-8">
            <input type="text" name="name" required class="form-control" placeholder="Country name">
        </div>
        <div class="col-md-4">
            <button class="btn" type="submit">Add</button>
        </div>
    </form>
</div>
<div class="row" style="margin-top: 10px;">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($countries as $country) :?>
                <tr>
                    <td><?php echo $country->id;?></td>
                    <td>
                        <form action="<?php echo base_url('admin/country_edit/'.$country->id);?>" method="POST">
                            <div class="col-md-10">
                                <input type="text" name="name" value="<?php echo $country->name;?>" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>