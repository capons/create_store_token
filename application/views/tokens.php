<form class="form-horizontal" action="<?php echo base_url('admin/generate/' . $store->id . '?back='.$store->id);?>" method="POST">
    <div class="form-group">
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputSearch" placeholder="Number of tokens to generate" required name="number">
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">Generate</button>
        </div>
    </div>
</form>

<table class="table table-hover" style="font-size: 12px;">
    <thead>
    <tr>
        <th>ID</th>
        <th>Token</th>
        <th>Status</th>
        <th>Last login</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tokens as $token) :?>
        <tr <?php echo (($token->status == 'expired')?'style="color: gray;"':'');?>>
            <td><?php echo $token->id;?></td>
            <td><?php echo  substr($token->token,0,30)."..." /*echo $token->token*/;?></td>
            <td><?php echo $token->status;?></td>
            <td><?php echo $token->last_login;?></td>
            <td>
                <a href="#"  class="btn-clipboard" onclick="copyToClipboard(this)" data-clipboard-target="<?php echo $token->token;?>" class="btn btn-primary">Copy</a>
                <a href="<?php echo base_url('admin/change_status/'. $token->id . '?status=expired&back=' . $store->id);?>" class="btn btn-primary">Deactivate</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

</div>
</div>
<script>
    new Clipboard('.btn-clipboard'); // Не забываем инициализировать библиотеку на нашей кнопке
    function copyToClipboard(obj) {  //copy TOKEN in buffer
        var one = obj.getAttribute('data-clipboard-target');
        window.prompt("Copy to clipboard: Ctrl+C, Enter", one);
    }
</script>