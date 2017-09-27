var Gbase_url = "http://zermood.zzz.com.ua/";

// send ajax request
function AJAXINA(adata, aurl, doafter, doerror){
    if(Object.prototype.toString.call(adata) == '[object FormData]'){
        var contentType = false;
        var processData = false;
    }else{
        var contentType = 'application/x-www-form-urlencoded; charset=UTF-8'
        var processData = true;
    }
    $.ajax({
        type: 'POST',
        data: (adata),
        contentType: contentType,
        processData: processData,
        url : aurl,
        async: true,
        success: function(response){
             doafter(response);
           
        }
    });
}


$(document).ready(function(){
// add onchage to conteinteditable divs
$('body').on('focus', '[contenteditable]', function() {
    var $this = $(this);
    $this.data('before', $this.html());
    return $this;
}).on('blur keyup paste input', '[contenteditable]', function() {
    var $this = $(this);
    if ($this.data('before') !== $this.html()) {
        $this.data('before', $this.html());
        $this.trigger('change');
    }
    return $this;
});

});



// On load page things
$(document).ready(function(){
    show_tasks(Gbase_url, 0);
    $('#darker').click(function(){
        $('#darker').fadeOut(500);
        $('#loginForm').fadeOut(500);
        $('#regaForm').fadeOut(500);
    });
});   
// page in value
var iintaskpage = 0;
// Show Tasks list    
function show_tasks(base_url, page){
    iintaskpage = page;
    $('#tasksList').html('<div style="text-align:center; padding:50px;">  <img src="'+base_url+'img/loading.gif" /> </div>');
     var adata = { 'page':page };
     var aurl = base_url+'main/get_tasks/';
     AJAXINA(adata, aurl, function(response){
        $('#tasksList').html(response);
     });
}

// Show Tasks preview    
function show_task_preview(base_url, formid){
    $('#taskPreview').fadeIn(500);
    $('#taskPreview').html('<div style="text-align:center; padding:50px; border-radius:50px;">  <img src="'+base_url+'img/loading.gif" /> </div>');
     var $that = $('#'+formid),
    formData = new FormData($that.get(0));
    var adata = formData;
    var aurl = base_url+'main/show_task_preview/';
    AJAXINA(adata, aurl, function(response){
       $('#taskPreview').html(response);
    });
    
}

// Add Task
function add_task(base_url, formid){
    var $that = $('#'+formid),
    formData = new FormData($that.get(0));
    var adata = formData;
    var aurl = base_url+'main/add_task/';
    AJAXINA(adata, aurl, function(response){
        show_tasks(Gbase_url, iintaskpage);    
    });
    
}
// Change task image
function ch_task_pic(base_url, tid){
    $('#Timg'+tid).css('background-size', '10%');
    $('#Timg'+tid).css('background-image', 'url('+base_url+'img/loading.gif'+')');
    var $that = $('#TchForm'+tid),
    formData = new FormData($that.get(0));

    var adata = formData;
    var aurl = base_url+'main/ch_task_pic/';
    AJAXINA(adata, aurl, function(response){
        if(response != "-"){
            $('#Timg'+tid).css('background-size', 'cover');
            $('#Timg'+tid).css('background-image', 'url('+base_url + response +'?'+Math.random()+')');   
        } 
    });
}

// change task text  
function change_task_text(base_url, tid, text){
    var adata = { 'tid':tid, 'text':text };
    var aurl = base_url+'main/ch_task_text/';
    AJAXINA(adata, aurl, function(response){
          
    });
    
}

// change task status  
function change_task_status(base_url, tid, status){
    var adata = { 'tid':tid, 'status':status };
    var aurl = base_url+'main/ch_task_status/';
    AJAXINA(adata, aurl, function(response){
        show_tasks(Gbase_url, iintaskpage);    
    });
    
}

// delete task
function delete_task(base_url, tid){
    var adata = { 'tid':tid };
    var aurl = base_url+'main/delete_task/';
    AJAXINA(adata, aurl, function(response){
        show_tasks(Gbase_url, iintaskpage);    
    });
    
}

// set tasks list sort 
function set_sort(base_url,  sort){
    var adata = { 'sort':sort };
    var aurl = base_url+'main/set_sort/';
    AJAXINA(adata, aurl, function(response){
        show_tasks(Gbase_url, 0);    
    });
    
}

// set tasks list filter
function set_filter(base_url,  filter){
    var adata = { 'filter':filter };
    var aurl = base_url+'main/set_filter/';
    AJAXINA(adata, aurl, function(response){
        show_tasks(Gbase_url, 0);    
    });
    
}

// chage task date
function change_task_date(base_url, tid, date){
    var adata = { 'tid':tid, 'date':date };
    var aurl = base_url+'main/ch_task_date/';
    AJAXINA(adata, aurl, function(response){
        show_tasks(Gbase_url, iintaskpage);    
    });
}




// -------------------------------------------------------------------------------

// user enter form submit
function login(base_url, login, pass){
    var adata = { 'login':login, 'pass':pass };
    var aurl = base_url+'users/login/';
    AJAXINA(adata, aurl, function(response){
        if(response == "+"){
            document.location = base_url;
        }else{
            $('#Lerror').html(response);
            $('#Lerror').fadeIn(500);
        }    
    });
}

// user registration form submit
function rega(base_url, login, pass, pass2, email){
    var adata = { 'login':login, 'pass':pass, 'pass2':pass2, 'email':email };
    var aurl = base_url+'users/rega/';
    AJAXINA(adata, aurl, function(response){
        if(response == "+"){
            $('#regaForm').fadeOut(500);
            $('#loginForm').fadeIn(500);
        }else{
            $('#Rerror').html(response);
            $('#Rerror').fadeIn(500);
        }    
    });
}



