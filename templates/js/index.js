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

function validate_field(that)
{
    var field = that.closest('.col-sm-6').find('.validate');
    var data = field.val();
    var field_name = field.attr("name");
    var help_block = that.closest('.col-sm-6').find('.help-block');
    var input = that.closest('.form-group');
    var result = true;
    $.ajaxSetup({
        async: false
    });
    $.getJSON('/?action=validate_field', {data: data, field: field_name}, function(json){
        if(json.error){
            result = false;
            help_block.html(json.error);
            input.addClass('has-error');
        }
        else{
            input.removeClass('has-error');
            input.addClass('has-success');
            help_block.empty();
        }
    });
    $.ajaxSetup({
        async: true
    });
    return result;
}

$(document).on("blur", ".validate", function () {
    validate_field($(this));
});

$(document).on("submit", ".form-validate", function () {
    var res = true;
    $('.validate').each(function() {
        if(validate_field($(this)) === false) res = false;
    });
    return res;
});