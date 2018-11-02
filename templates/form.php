<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="insurance_number" class="col-sm-4 control-label">Insurance Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control validate" value="<?=$student->insurance_number?>" name="insurance_number" id="insurance_number" placeholder="Insurance Number">
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="surname" class="col-sm-4 control-label">Surname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control validate" value="<?=$student->surname?>" name="surname" id="surname" placeholder="Surname">
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control validate" value="<?=$student->name?>" name="name" id="name" placeholder="Name">
                    <span class="help-block"></span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="year_of_birth" class="col-sm-4 control-label">Year of birth</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control validate" value="<?=$student->year_of_birth?>" name="year_of_birth" id="year_of_birth" placeholder="Year of birth">
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="city_of_birth" class="col-sm-4 control-label">City of birth</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control validate" value="<?=$student->city_of_birth?>" name="city_of_birth" id="city_of_birth" placeholder="City of birth">
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="university" class="col-sm-4 control-label">University</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control validate" value="<?=$student->university?>" name="university" id="university" placeholder="University">
                    <span class="help-block"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>