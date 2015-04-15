/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#vietland_select_user").select2({
        minimumInputLength: 2,
        ajax: {
            url: backend_user_search,
            dataType: 'jsonp',
            data: function(term, page){
                return {
                    q: term
                };
            },
            results: function (data, page) {
                console.log(data);
                return {
                    results: data
                };
            }
        }
    });
    $('.delete-item-store').live("click",function(e) {
        e.preventDefault();
        var KardId = $(this).attr('rel');        
        var $dialogForm = $('#open-form-delete');
        $dialogForm.dialog({
            resizable: false,
            width: 400,
            buttons: {
                "Cancel": function() {
                    $(this).dialog("close");            
                },
                "Yes": function(){                  
                    $('.loading-bar').show();
                    $.ajax({
                        'url': backend_store_delete,
                        'type': 'post',
                        'dataType': 'json',
                        'data': {
                            id:KardId                          
                        },
                        beforeSend: function() {
                            $('#open-form-delete').dialog("close");
                        },
                        error: function() {
                            $('.loading-bar').hide();
                        },
                        complete: function() {
                            $('.loading-bar').hide();
                        },
                        success: function(response){ 
                            console.log(response);
                            $('.loading-bar').hide();
                            //alert(response.status);
                            if(response.status == 1) {
                                $('#table-list-store tr.remove_item_'+ KardId).remove();                           
                                alert('Your store has been deleted.'); 
                            }else {
                                alert('Your store can not delete. Please contact administrator.');  
                            }
                            return;
                        }
                    });
                }
            }
        }); 
    }); 
    
    //delete-item-category
    $('#choosen-store-item').live("change", function(){
        $('.loading-bar').show();
        var storeId = $(this).val();
        $.ajax({
            'url': backend_store_removeuser,
            'type': 'post',
            'dataType': 'json',
            'data': {
                storeId:storeId                          
            },
            beforeSend: function() {
            },
            error: function() {
                $('.loading-bar').hide();
            },
            complete: function() {
                $('.loading-bar').hide();
            },
            success: function(response){ 
                console.log(response);
                $('.loading-bar').hide();
                //alert(response.status);
                if(response.status == 1) {
                    $('#list-user-update').html(response.output);                           
                }else {
                   alert('There no user in this store. Please choosen other store.');  
                }
                return;
            }
        });
    });
      $('.remove-user-from-store').live("click",function(e) {
        e.preventDefault();
        var userId = $(this).attr('rel');        
        var $dialogForm = $('#open-form-delete');
        $dialogForm.dialog({
            resizable: false,
            width: 400,
            buttons: {
                "Cancel": function() {
                    $(this).dialog("close");            
                },
                "Yes": function(){                  
                    $('.loading-bar').show();
                    $.ajax({
                        'url': backend_remove_user_store,
                        'type': 'post',
                        'dataType': 'json',
                        'data': {
                            userId:userId                          
                        },
                        beforeSend: function() {
                            $('#open-form-delete').dialog("close");
                        },
                        error: function() {
                            $('.loading-bar').hide();
                        },
                        complete: function() {
                            $('.loading-bar').hide();
                        },
                        success: function(response){ 
                            console.log(response);
                            $('.loading-bar').hide();
                            //alert(response.status);
                            if(response.status == 1) {
                                $('.list-user-by-store li.remove_'+userId ).remove();                           
                                alert('User has been removed.'); 
                            }else {
                                alert('User can not remove. Please contact administrator.');  
                            }
                            return;
                        }
                    });
                }
            }
        }); 
    });
});



