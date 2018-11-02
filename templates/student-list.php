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
    $(function () {
        $(document).on("click", "[bind-action=open-create]", function (e) {
            var ajax_body = $(this).attr('action-link');
            $('#create-modal').modal('show')
                .find('.modal-content')
                .load(ajax_body);
            e.preventDefault();
        })
    })

    $(function () {
        $(document).on("click", "[bind-action=open-edit]", function (e) {
            var ajax_body = $(this).attr('href');
            $('#create-modal').modal('show')
                .find('.modal-content')
                .load(ajax_body);
            e.preventDefault();
        })
    })

    $(function () {
        $(document).on("click", "[bind-action=filter]", function (e) {
            var inumber = $('#insurance_number').val();
            var surname = $('#surname').val();
            var year = $('#year_of_birth').val();
            var city = $('#city_of_birth').val();
            var sort = $('#sort').val();
            var page = $('#page').val();
            $('#inumber').val(inumber);
            $('#lname').val(surname);
            $('#year').val(year);
            $('#city').val(city);
            $.get('/?action=table', {insurance_number: inumber, surname: surname, year_of_birth: year, city_of_birth: city, sort: sort, page: page}, function (response) {
                $('#student-list').html(response);
            });
            e.preventDefault();
        })
    })

    $(function () {
        $(document).on("click", "[bind-action=filter]", function (e) {
            var inumber = $('#insurance_number').val();
            var surname = $('#surname').val();
            var year = $('#year_of_birth').val();
            var city = $('#city_of_birth').val();
            var sort = $('#sort').val();
            var page = $('#page').val();
            $('#inumber').val(inumber);
            $('#lname').val(surname);
            $('#year').val(year);
            $('#city').val(city);
            $.get('/?action=table', {insurance_number: inumber, surname: surname, year_of_birth: year, city_of_birth: city, sort: sort, page: page}, function (response) {
                $('#student-list').html(response);
            });
            e.preventDefault();
        })
    })

    $(function () {
        $(document).on("click", "[bind-action=page]", function (e) {
            var inumber = $('#inumber').val();
            var surname = $('#lname').val();
            var year = $('#year').val();
            var city = $('#city').val();
            var sort = $('#sort').val();
            var page = $(this).attr('page');
            $('#page').val(page);
            $.get('/?action=table', {insurance_number: inumber, surname: surname, year_of_birth: year, city_of_birth: city, sort: sort, page: page}, function (response) {
                $('#student-list').html(response);
            });
            e.preventDefault();
        })
    })

    $(function () {
        $(document).on("click", "[bind-action=sort]", function (e) {
            var inumber = $('#inumber').val();
            var surname = $('#lname').val();
            var year = $('#year').val();
            var city = $('#city').val();
            var sort = $(this).attr('sort');
            var page = $('#page').val();
            $('#sort').val(sort);
            $.get('/?action=table', {insurance_number: inumber, surname: surname, year_of_birth: year, city_of_birth: city, sort: sort, page: page}, function (response) {
                $('#student-list').html(response);
            });
            e.preventDefault();
        })
    })

    $(function () {
        $(document).on("click", "[bind-action=reset]", function (e) {
            $('#inumber').val('');
            $('#lname').val('');
            $('#year').val('');
            $('#city').val('');
            $('#sort').val('');
            $('#page').val('');
            $.get('/?action=table', function (response) {
                $('#student-list').html(response);
            });
            e.preventDefault();
        })
    })

    $(function () {
        $(document).on("click", "[bind-action=delete]", function (e) {
            var ajax_body = $(this).attr('href');
            $('#modal-delete').modal('show')
                .find('.modal-content')
                .load(ajax_body);
            e.preventDefault();
        })
    })
</script>