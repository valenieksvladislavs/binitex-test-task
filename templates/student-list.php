<h3>Student list</h3>

<div class="filter-box">
    <form method="get" class="filter">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>
                            Insurance number
                        </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="insurance_number" id="insurance_number" class="form-control" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>
                            Surname
                        </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="surname" id="surname" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>
                            Year of birth
                        </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="year_of_birth" id="year_of_birth" class="form-control" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>
                            City
                        </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="city_of_birth" id="city_of_birth" class="form-control" value="">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-inline">
            <button name="filter" bind-action="filter" class="btn btn-primary">Filter</button>
            <button class="btn" bind-action="reset">Reset</button>
        </div>
        <input type="hidden" name="inumber" id="inumber" value=""/>
        <input type="hidden" name="lname" id="lname" value=""/>
        <input type="hidden" name="year" id="year" value=""/>
        <input type="hidden" name="city" id="city" value=""/>
        <input type="hidden" name="sort" id="sort" value=""/>
        <input type="hidden" name="page" id="page" value=""/>
    </form>
</div>
<br />
<div id="student-list">
    <?=$content?>
</div>
<div class="modal fade in" id="create-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>

<div class="modal fade in" id="modal-delete" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 500px;">
        <div class="modal-content">

        </div>
    </div>
</div>
<script>

</script>