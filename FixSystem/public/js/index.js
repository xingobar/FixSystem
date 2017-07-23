$(document).ready(function(){
    ajaxSetup();
    getProduct();
    getDepartment();
    getModel();
});

function ajaxSetup(){
    $.ajaxSetup({
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}
function getProduct(){
    $('#brand_id').change(function(){
        console.log($(this).val());
        $('#product option').remove();
        $.ajax({
            url:'/get_product/' + $(this).val(),
            type:'post',
            success:function(data){
               data.forEach(function(element) {
                   $('#product').append('<option value=\"' + element.id+ '\">' + element.name+ '</option>');
               });
            }
        });
    });
}

function getModel(){
    $('#product').change(function(){
        $('#model option').remove();
        var productName = $(this).find('option:selected').text();
        $.ajax({
            url:'/get_model/' + productName,
            type:'post',
            success:function(data){
                data.forEach(function(element){
                    $('#model').append('<option value=\"' + element.id+ '\">' + element.model +'</option>')
                });
            }
        })
    });
}

function getDepartment(){
    $("#department_id").change(function(){
        $('#unit option').remove();
        $.ajax({
            url:'/get_unit/' + $(this).val(),
            type:'post',
            success:function(data){
                data.forEach(function(element){
                    $('#unit').append('<option value=\"' + element.id+ '\">' + element.name+ '</option>');
                });
            }
        })
    });
}