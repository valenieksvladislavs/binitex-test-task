<form method="POST" action="?action=delete" class="form-horizontal form-delete">
    <div class="modal-header" style="border: 0;">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
    </div>
    <div class="modal-footer"  style="border: 0;">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <input type="submit" name="yes" class="btn btn-success" value="Yes"/>
        <input type="hidden" name="id" value="<?=$id?>"/>
    </div>
</form>