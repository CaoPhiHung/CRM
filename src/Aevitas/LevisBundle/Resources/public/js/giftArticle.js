/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    $('.delete-item-gift').live("click",function(e) {
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
                        'url': backend_gift_delete,
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
                              $('#table-list-gift tr.remove_item_'+ KardId).remove();                           
                                alert('Your gift has been deleted.'); 
                        }else {
                            alert('Your gift can not delete. Please contact administrator.');  
                        }
                            return;
                        }
                    });
                }
            }
        }); 
    }); 
    
    //delete-item-category
  $('.delete-item-category').live("click",function(e) {
        e.preventDefault();
        var categoryId = $(this).attr('rel');        
        var $dialogForm = $('#open-form-delete');
        $dialogForm.dialog({
            resizable: false,
            width: 400,
            buttons: {
                "Cancel": function() {
                    $(this).dialog("close");            
                },
                "Yes": function(){                  
                    
                    $.ajax({
                        'url': backend_gift_category_delete,
                        'type': 'post',
                        'dataType': 'json',
                        'data': {
                            id:categoryId                          
                        },
                        beforeSend: function() {
                            $('#open-form-delete').dialog("close");
                            $('.loading-bar').show();
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
                              $('#table-list-category tr.remove_item_'+ categoryId).remove();                           
                                alert('Your category has been deleted.'); 
                        }else {
                            alert('Your category can not delete. Please contact administrator.');  
                        }
                        
                            return;
                        }
                    });
                }
            }
        }); 
    });   
});



