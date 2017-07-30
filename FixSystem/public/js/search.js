var filter_category ;
var filter_text;

$(document).ready(function(){

    ajaxSetup();
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
    getRecord(url);
}

function keyPress(event){
    if (event.keyCode == 13) {
        filter_text = $('#filter_text').val();
        getRecord('/search');
    }
}

function getRecord(url){
    $.ajax({
        url:url+'/' + filter_category + '/' +filter_text,
        type:'get',
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