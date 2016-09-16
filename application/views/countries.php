<div class="row">
    <form action="<?php echo base_url('admin/country_add');?>" method="post">
        <div class="col-md-8">
            <input type="text" name="name" required class="form-control" placeholder="Country name">
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>
</div>
<div class="row" style="margin-top: 10px;">
    <table class="table table-hover">
        <thead>
        <tr>
            <!--
            <th>ID</th>
            -->
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($countries as $country) :?>
                <tr>
                    <!--
                    <td><?php echo $country->id;?></td>
                    -->
                    <td class="full-width">
                        <form action="<?php echo base_url('admin/country_edit/'.$country->id);?>" method="POST">
                            <div class="col-md-10 no-padding">
                                <input type="text" name="name" value="<?php echo $country->name;?>" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="<?php echo base_url();?>admin/country_delete/<?php echo $country->id;?>" class="btn btn-primary">Delete</a>
                            </div>
                        </form>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>