<form method="POST" action="?action=add" class="form-horizontal form-validate">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Edit</h4>
    </div>
    <?=$content?>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <input type="submit" name="add" class="btn btn-success" value="Update"/>
    </div>
    <input type="hidden" name="id" value="<?=$id?>"/>
</form>