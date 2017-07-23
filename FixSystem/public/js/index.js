$(document).ready(function(){
    ajaxSetup();
    $('#brand_id').change(function(){
        console.log('test');
        $.ajax({
            url:'/get_product/' + $(this).attr('id'),
            type:'post',
            data:{
                brand_id:$(this).attr('id')
            },
            success:function(data){
                console.log(data);
            }
        });
    });
});

function ajaxSetup(){
    $.ajaxSetup({
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}