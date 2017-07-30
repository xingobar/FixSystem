var filter_category ;
var filter_text;

$(document).ready(function(){

    ajaxSetup();
   // filter();
    // $('.search').click(function(e){
    //     e.preventDefault();
    //     filter_category = $('#filter').val();
    //     filter_text = $('#filter_text').val();
    //     //console.log(filter_text);
    //     switch(filter_category){
    //         case 'brand_name':
    //             console.log('brand name');
    //             searchBrandByName(filter_text);
    //             break;
    //     }
    // });
});

function ajaxSetup(){
    $.ajaxSetup({
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function filter(){
    filter_category = $('#filter').val();
    filter_text = $('#filter_text').val();
    console.log('filter text : ' + filter_text);
    console.log('category  : '  + filter_category);
    filter_text = (filter_category === 'all') ? 'all' : filter_text;
    search('/search');
}

function search(url){
    ajaxSetup();
    $.ajax({
        url:url+'/' + filter_category + '/' +filter_text,
        type:'post',
        async:false,
        dataType:'html',
        success:function(data){
            $("#app").html(data);
            $('#filter').val(filter_category);
            console.log('success');
        },
        error:function(data){
            console.log('error');
        }
    })
}