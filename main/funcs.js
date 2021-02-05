function loadTables() {
c1 = $('#style-1').DataTable({
    headerCallback:function(e, a, t, n, s) {
        e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
    },
    columnDefs:[ {
        targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
            return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
        }
    }],
    "oLanguage": {
        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
        "sInfo": "Страница _PAGE_ из _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Найти...",
       "sLengthMenu": "Отображать строк:  _MENU_",
    },
    "lengthMenu": [5, 10, 20, 50],
    "pageLength": 50 
});

multiCheck(c1);
      

c2 = $('#style-2').DataTable({
headerCallback:function(e, a, t, n, s) {
    e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
},
columnDefs:[ {
    targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
        return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
    }
}],
"oLanguage": {
    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
    "sInfo": "Страница _PAGE_ из _PAGES_",
    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
    "sSearchPlaceholder": "Найти...",
   "sLengthMenu": "Отображать строк:  _MENU_",
},
"lengthMenu": [5, 10, 20, 50],
"pageLength": 50 
});

multiCheck(c2);


c3 = $('#style-3').DataTable({
    headerCallback:function(e, a, t, n, s) {
        e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
    },
    columnDefs:[ {
        targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
            return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
        }
    }],
    "oLanguage": {
        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
        "sInfo": "Страница _PAGE_ из _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Найти...",
       "sLengthMenu": "Отображать строк:  _MENU_",
    },
    "lengthMenu": [5, 10, 20, 50],
    "pageLength": 50 
});

multiCheck(c3);


c4 = $('#style-4').DataTable({
    headerCallback:function(e, a, t, n, s) {
        e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
    },
    columnDefs:[ {
        targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
            return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
        }
    }],
    "oLanguage": {
        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
        "sInfo": "Страница _PAGE_ из _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Найти...",
       "sLengthMenu": "Отображать строк:  _MENU_",
    },
    "lengthMenu": [5, 10, 20, 50],
    "pageLength": 50 
});

multiCheck(c4);


c5 = $('#style-5').DataTable({
    headerCallback:function(e, a, t, n, s) {
        e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
    },
    columnDefs:[ {
        targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
            return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
        }
    }],
    "oLanguage": {
        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
        "sInfo": "Страница _PAGE_ из _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Найти...",
       "sLengthMenu": "Отображать строк:  _MENU_",
    },
    "lengthMenu": [5, 10, 20, 50],
    "pageLength": 50 
});

multiCheck(c5);

}



////////////////////////  Загрузка шаблона  ////////////////////////////////////
template_select.onchange = function() {
    $.when($.ajax(uploadTemplate(this.value))).then(function () {
       disables();
    });
};



function uploadTemplate(template){
    $.getJSON("templates/" + template, function(data) {
        SuccessAlert.innerHTML = 'Загружаем шаблон...';
        $('.success').show();
        
        var texts = $("#createAd_form").find("input[type=text]");
        for(i = 0; i < texts.length; ++i)
            if(texts[i].name in data)
                texts[i].value = data[texts[i].name];
            
        var numbers = $("#createAd_form").find("input[type=number]");
        for(i = 0; i < numbers.length; ++i)
            if(numbers[i].name in data)
                numbers[i].value = data[numbers[i].name];    
            
        var areas = $("#createAd_form").find("textarea");
        for(i = 0; i < areas.length; ++i)
            if(areas[i].name in data)
                areas[i].value = data[areas[i].name];
            
        
        var selects = $("#createAd_form").find("select");
        for(i = 1; i < selects.length; ++i) {
            for(j = 0; j < selects[i].length; ++j)  {
                selects[i][j].selected = false;
                if(!Array.isArray(data[selects[i].name.replace('[]', '')])) {
                    if(selects[i][j].value == data[selects[i].name.replace('[]', '')])
                        selects[i][j].selected = true;
                }
                else 
                    if(data[selects[i].name.replace('[]', '')].indexOf(selects[i][j].value) !== -1) 
                        selects[i][j].selected = true;
            }
        }  
   
        var checkboxes = $("#createAd_form").find("input[type=checkbox]");
        for(i = 0; i < checkboxes.length; ++i)
            if(!(checkboxes[i].name in data))
                checkboxes[i].checked = false;
            else
                checkboxes[i].checked = true;
        
        if(checkboxes[3].checked)
            for(i = 4; i < checkboxes.length - 3; ++i) {
                checkboxes[i].checked = true;
                checkboxes[i].disabled = true;
            }
            
        multiselectLoad();
        
        SuccessAlert.innerHTML = 'Готово!';
        setTimeout(function(){ $('.success').hide(); }, 2000);

    });
};


function disables() {
    if($("#createAd_form").find('[name=targeting_optimization]')[0].checked) {
        var children = $("#createAd_form").find('.ad_auto_placement_children');
        for(i = 0; i < children.find("input[type=checkbox]").length; ++i) 
            children.find("input[type=checkbox]")[i].disabled = true;
        for(i = 0; i < children.find("select").length; ++i)
            children.find("select")[i].disabled = true;
    }
    else 
    {
        var children = $("#createAd_form").find('.ad_auto_placement_children');
        for(i = 0; i < children.find("input[type=checkbox]").length; ++i) 
            children.find("input[type=checkbox]")[i].disabled = false;
        for(i = 0; i < children.find("select").length; ++i)
            children.find("select")[i].disabled = false;
    }
    
    if($("#createAd_form").find('[name=bid_strategy]')[0].value == 'LOWEST_COST_WITHOUT_CAP') 
        $("#createAd_form").find('[name=bid_amount]')[0].disabled = true;
    else
        $("#createAd_form").find('[name=bid_amount]')[0].disabled = false;
    
    if($("#createAd_form").find('[name=objective]')[0].value == 'LINK_CLICKS') {
        $("#createAd_form").find('[name=attribution_spec]')[0].disabled = true;
        $("#createAd_form").find('[name=is_pixel]')[0].disabled = true;
        $("#createAd_form").find('[name=pixel_name]')[0].disabled = true;
    }
    else {
        $("#createAd_form").find('[name=attribution_spec]')[0].disabled = false;
        $("#createAd_form").find('[name=is_pixel]')[0].disabled = false;
        $("#createAd_form").find('[name=pixel_name]')[0].disabled = false;
    }
    
    if(!$("#createAd_form").find('[name=is_pixel]')[0].checked) 
        $("#createAd_form").find('[name=pixel_name]')[0].disabled = true;
    else
        $("#createAd_form").find('[name=pixel_name]')[0].disabled = false;
        
};


function reloadTables() {
  
    var table = $('#style-1').DataTable();
    table.destroy();
    $('#style-1').empty(); 
     
    var myNode = document.getElementById("accounts_tbody");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
    
    $("#accounts_tbody").load(
        "additional_load/accounts_load.php",function(){
            c1 = $('#style-1').DataTable({
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs:[ {
                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }
            }],
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Страница _PAGE_ из _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Найти...",
               "sLengthMenu": "Отображать строк:  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 50 
        });
    
        multiCheck(c1);
    });
      
      
    table = $('#style-2').DataTable();
    table.destroy();
    $('#style-2').empty(); 
     
    var myNode = document.getElementById("cabs_tbody");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
    
    $("#cabs_tbody").load(
        "additional_load/cabs_load.php",function(){
            c2 = $('#style-2').DataTable({
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs:[ {
                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }
            }],
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Страница _PAGE_ из _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Найти...",
               "sLengthMenu": "Отображать строк:  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 50 
        });
    
        multiCheck(c2);
    });
    
    
    table = $('#style-3').DataTable();
    table.destroy();
    $('#style-3').empty(); 
     
    var myNode = document.getElementById("campaigns_tbody");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
    
    $("#campaigns_tbody").load(
        "additional_load/campaigns_load.php",function(){
            c3 = $('#style-3').DataTable({
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs:[ {
                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }
            }],
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Страница _PAGE_ из _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Найти...",
               "sLengthMenu": "Отображать строк:  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 50 
        });
    
        multiCheck(c3);
    });
    
    
    table = $('#style-4').DataTable();
    table.destroy();
    $('#style-4').empty(); 
     
    var myNode = document.getElementById("adsets_tbody");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
    
    $("#adsets_tbody").load(
        "additional_load/adsets_load.php",function(){
            c4 = $('#style-4').DataTable({
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs:[ {
                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }
            }],
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Страница _PAGE_ из _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Найти...",
               "sLengthMenu": "Отображать строк:  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 50 
        });
    
        multiCheck(c4);
    });
    
    
    table = $('#style-5').DataTable();
    table.destroy();
    $('#style-5').empty(); 
     
    var myNode = document.getElementById("ads_tbody");
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
    
    $("#ads_tbody").load(
        "additional_load/ads_load.php",function(){
            c5 = $('#style-5').DataTable({
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs:[ {
                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }
            }],
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Страница _PAGE_ из _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Найти...",
               "sLengthMenu": "Отображать строк:  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 50 
        });
    
        multiCheck(c5);
    });
}
















////////////////////////  Функции по дизаблам общие на все формы шаблонов////////////////////////////////////
$(document).ready(function(){
    $('[name=datetime]').on('change', function (e) {
       if(!this.checked) 
           $('input[name=date]').prop('disabled', true);
        else 
           $('input[name=date]').prop('disabled', false);
    })
});

$(document).ready(function(){
    $('[name=is_preview]').on('change', function (e) {
       if(!this.checked) 
           $('input[name=preview]').prop('disabled', true);
        else 
           $('input[name=preview]').prop('disabled', false);
    })
});


$(document).ready(function(){
    $('[name=bid_strategy]').on('change', function (e) {
       if(this.value == 'LOWEST_COST_WITHOUT_CAP') 
           $('input[name=bid_amount].'+this.classList[0]).prop('disabled', true);
        else 
           $('input[name=bid_amount].'+this.classList[0]).prop('disabled', false);
    })
});

$(document).ready(function(){
    $('[name=objective]').on('change', function (e) {
       if(this.value == 'LINK_CLICKS') {
            $('select[name=attribution_spec].'+this.classList[0]).prop('disabled', true);
            $('input[name=is_pixel].'+this.classList[0]).prop('checked', false);
            $('input[name=is_pixel].'+this.classList[0]).prop('disabled', true);
            $('input[name=pixel_name].'+this.classList[0]).prop('disabled', true);
       }
        else {
            $('select[name=attribution_spec].'+this.classList[0]).prop('disabled', false);
            $('input[name=is_pixel].'+this.classList[0]).prop('disabled', false);
            $('input[name=is_pixel].'+this.classList[0]).prop('checked', false);
            $('input[name=pixel_name].'+this.classList[0]).prop('disabled', true);
        }
    })
});

$(document).ready(function(){
    $('[name=is_pixel]').on('change', function (e) {
       if(!this.checked) 
           $('input[name=pixel_name]').prop('disabled', true);
        else 
           $('input[name=pixel_name]').prop('disabled', false);
    })
});

$(document).ready(function(){
    $('[name=targeting_optimization].ad_template').on('change', function (e) {   
        if(this.checked) {
            var selects = $(".ad_auto_placement_children").find("select");
            for(i = 0; i < selects.length; ++i) {
                selects[i].disabled = false;
                selects[i].selected = false;
                selects[i][0].selected = true;
                selects[i].disabled = true;
            }  
            
            var checkboxes = $(".ad_auto_placement_children").find("input[type=checkbox]");
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].disabled = false;
                checkboxes[i].checked = true;
                checkboxes[i].disabled = true;
            }
       }
       else {
            var selects = $(".ad_auto_placement_children").find("select");
            for(i = 0; i < selects.length; ++i) 
                selects[i].disabled = false;
            
            var checkboxes = $(".ad_auto_placement_children").find("input[type=checkbox]");
            for(i = 0; i < checkboxes.length; ++i)
                checkboxes[i].disabled = false;
                
                
            var selects = $(".ad_mobile_children").find("select");
                    
            for(i = 0; i < selects.length; ++i) 
                selects[i].disabled = true;
            
           
            var checkboxes = $(".ad_mobile_children").find("input[type=checkbox]");
            for(i = 0; i < 7; ++i) 
                if(checkboxes[i].name != 'IOS' && checkboxes[i].name != 'Android')
                    checkboxes[i].disabled = true;
            
       }
       multiselectLoad();
    })
});

$(document).ready(function(){
    $('[name=targeting_optimization].template_template').on('change', function (e) {   
        if(this.checked) {
            var selects = $(".template_auto_placement_children").find("select");
            for(i = 0; i < selects.length; ++i) {
                selects[i].disabled = false;
                selects[i].selected = false;
                selects[i][0].selected = true;
                selects[i].disabled = true;
            }  
            
            var checkboxes = $(".template_auto_placement_children").find("input[type=checkbox]");
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].disabled = false;
                checkboxes[i].checked = true;
                checkboxes[i].disabled = true;
            }
       }
       else {
            var selects = $(".template_auto_placement_children").find("select");
            for(i = 0; i < selects.length; ++i) 
                selects[i].disabled = false;
            
            var checkboxes = $(".template_auto_placement_children").find("input[type=checkbox]");
            for(i = 0; i < checkboxes.length; ++i)
                checkboxes[i].disabled = false;
            
            var selects = $(".template_mobile_children").find("select");
                    
            for(i = 0; i < selects.length; ++i) 
                selects[i].disabled = true;
            
           
            var checkboxes = $(".template_mobile_children").find("input[type=checkbox]");
            for(i = 0; i < 7; ++i) 
                if(checkboxes[i].name != 'IOS' && checkboxes[i].name != 'Android')
                    checkboxes[i].disabled = true;
            
       }
       multiselectLoad();
    })
});


$(document).ready(function(){   
    $('[name=mobile].ad_template').on('change', function (e) {
        if(this.checked) {
           var selects = $(".ad_mobile_children").find("select");
            for(i = 0; i < selects.length; ++i) {
                selects[i].disabled = false;
                selects[i].selected = false;
                selects[i][0].selected = true;
            }  
           
            var checkboxes = $(".ad_mobile_children").find("input[type=checkbox]");
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].disabled = false;
                checkboxes[i].checked = true;
            }
            
            var selects = $(".ad_mobile_children").find("select");
                    
            for(i = 0; i < selects.length; ++i) 
                selects[i].disabled = true;
            
           
            var checkboxes = $(".ad_mobile_children").find("input[type=checkbox]");
            for(i = 0; i < 7; ++i) 
                if(checkboxes[i].name != 'IOS' && checkboxes[i].name != 'Android')
                    checkboxes[i].disabled = true;
            
        }
        else {
            var selects = $(".ad_mobile_children").find("select");
            for(i = 0; i < selects.length; ++i) {
                selects[i].selected = false;
                selects[i][0].selected = true;
                selects[i].disabled = true;
            }
       
            var checkboxes = $(".ad_mobile_children").find("input[type=checkbox]");
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].checked = false;
                checkboxes[i].disabled = true;
            }
           
        }
        multiselectLoad();    
    })
});

$(document).ready(function(){   
    $('[name=mobile].template_template').on('change', function (e) {
        if(this.checked) {
            var selects = $(".template_mobile_children").find("select");
            for(i = 0; i < selects.length; ++i) {
                selects[i].disabled = false;
                selects[i].selected = false;
                selects[i][0].selected = true;
            }  
           
            var checkboxes = $(".template_mobile_children").find("input[type=checkbox]");
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].disabled = false;
                checkboxes[i].checked = true;
            }
            
            var selects = $(".template_mobile_children").find("select");
                    
            for(i = 0; i < selects.length; ++i) 
                selects[i].disabled = true;
            
           
            var checkboxes = $(".template_mobile_children").find("input[type=checkbox]");
            for(i = 0; i < 7; ++i) 
                if(checkboxes[i].name != 'IOS' && checkboxes[i].name != 'Android')
                    checkboxes[i].disabled = true;
            
        }
        else {
            var selects = $(".template_mobile_children").find("select");
            for(i = 0; i < selects.length; ++i) {
                selects[i].selected = false;
                selects[i][0].selected = true;
                selects[i].disabled = true;
            }
       
            var checkboxes = $(".template_mobile_children").find("input[type=checkbox]");
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].checked = false;
                checkboxes[i].disabled = true;
            }
           
        }
        multiselectLoad();    
    })
});



$(document).ready(function(){   
    $('[name=IOS]').on('change', function (e) {
        if(this.checked) {
            if($('[name=Android].'+this.classList[0])[0].checked) {
                if(this.classList[0] == 'ad_template')
                    var selects = $(".ad_mobile_children").find("select");
                else
                    var selects = $(".template_mobile_children").find("select");
                
                    
                for(i = 0; i < selects.length; ++i) {
                    selects[i].selected = false;
                    selects[i][0].selected = true;
                    selects[i].disabled = true;
                }
           
                if(this.classList[0] == 'ad_template')
                    var checkboxes = $(".ad_mobile_children").find("input[type=checkbox]");
                else
                    var checkboxes = $(".template_mobile_children").find("input[type=checkbox]");
                    
                checkboxes[1].checked = true;
                checkboxes[2].checked = true;
                checkboxes[3].checked = true;
                checkboxes[5].checked = true;
                checkboxes[6].checked = true;
                checkboxes[1].disabled = true;
                checkboxes[2].disabled = true;
                checkboxes[3].disabled = true;
                checkboxes[5].disabled = true;
                checkboxes[6].disabled = true;
            }
            else {
                if(this.classList[0] == 'ad_template')
                    var selects = $(".ad_mobile_children").find("select");
                else
                    var selects = $(".template_mobile_children").find("select");
                
                for(i = 0; i < 2; ++i) {
                    selects[i].selected = false;
                    selects[i][0].selected = true;
                    selects[i].disabled = false;
                }   
                for(i = 2; i < 4; ++i) {
                    selects[i].selected = false;
                    selects[i][0].selected = true;
                    selects[i].disabled = true;
                }
           
                if(this.classList[0] == 'ad_template')
                    var checkboxes = $(".ad_mobile_children").find("input[type=checkbox]");
                else
                    var checkboxes = $(".template_mobile_children").find("input[type=checkbox]");
                    
                checkboxes[5].checked = false;
                checkboxes[6].checked = false;
                checkboxes[5].disabled = true;
                checkboxes[6].disabled = true;
                
                checkboxes[1].checked = true;
                checkboxes[2].checked = true;
                checkboxes[3].checked = true;
                checkboxes[1].disabled = false;
                checkboxes[2].disabled = false;
                checkboxes[3].disabled = false;
                
            }
            
        }
        else {
            if($('[name=Android].'+this.classList[0])[0].checked) {
                if(this.classList[0] == 'ad_template')
                    var selects = $(".ad_mobile_children").find("select");
                else
                    var selects = $(".template_mobile_children").find("select");
                
                    
                for(i = 0; i < 2; ++i) {
                    selects[i].selected = false;
                    selects[i][0].selected = true;
                    selects[i].disabled = true;
                }   
                for(i = 2; i < 4; ++i) {
                    selects[i].selected = false;
                    selects[i][0].selected = true;
                    selects[i].disabled = false;
                }
           
                if(this.classList[0] == 'ad_template')
                    var checkboxes = $(".ad_mobile_children").find("input[type=checkbox]");
                else
                    var checkboxes = $(".template_mobile_children").find("input[type=checkbox]");
                    
                checkboxes[1].checked = false;
                checkboxes[2].checked = false;
                checkboxes[3].checked = false;
                checkboxes[1].disabled = true;
                checkboxes[2].disabled = true;
                checkboxes[3].disabled = true;
                checkboxes[5].disabled = false;
                checkboxes[6].disabled = false;
            }
            else {
                if(this.classList[0] == 'ad_template')
                    var selects = $(".ad_mobile_children").find("select");
                else
                    var selects = $(".template_mobile_children").find("select");
                
                    
                for(i = 0; i < selects.length; ++i) {
                    selects[i].selected = false;
                    selects[i][0].selected = true;
                    selects[i].disabled = true;
                }
           
                if(this.classList[0] == 'ad_template')
                    var checkboxes = $(".ad_mobile_children").find("input[type=checkbox]");
                else
                    var checkboxes = $(".template_mobile_children").find("input[type=checkbox]");
                    
                checkboxes[1].checked = false;
                checkboxes[2].checked = false;
                checkboxes[3].checked = false;
                checkboxes[5].checked = false;
                checkboxes[6].checked = false;
                checkboxes[1].disabled = true;
                checkboxes[2].disabled = true;
                checkboxes[3].disabled = true;
                checkboxes[5].disabled = true;
                checkboxes[6].disabled = true;
                
            }
           
        }
        multiselectLoad();    
    })
});

$(document).ready(function(){   
    $('[name=Android]').on('change', function (e) {
        if(this.checked) {
            if($('[name=IOS].'+this.classList[0])[0].checked) {
                if(this.classList[0] == 'ad_template')
                    var selects = $(".ad_mobile_children").find("select");
                else
                    var selects = $(".template_mobile_children").find("select");
                
                    
                for(i = 0; i < selects.length; ++i) {
                    selects[i].selected = false;
                    selects[i][0].selected = true;
                    selects[i].disabled = true;
                }
           
                if(this.classList[0] == 'ad_template')
                    var checkboxes = $(".ad_mobile_children").find("input[type=checkbox]");
                else
                    var checkboxes = $(".template_mobile_children").find("input[type=checkbox]");
                    
                checkboxes[1].checked = true;
                checkboxes[2].checked = true;
                checkboxes[3].checked = true;
                checkboxes[5].checked = true;
                checkboxes[6].checked = true;
                checkboxes[1].disabled = true;
                checkboxes[2].disabled = true;
                checkboxes[3].disabled = true;
                checkboxes[5].disabled = true;
                checkboxes[6].disabled = true;
            }
            else {
                if(this.classList[0] == 'ad_template')
                    var selects = $(".ad_mobile_children").find("select");
                else
                    var selects = $(".template_mobile_children").find("select");
                
                for(i = 0; i < 2; ++i) {
                    selects[i].selected = false;
                    selects[i][0].selected = true;
                    selects[i].disabled = true;
                }   
                for(i = 2; i < 4; ++i) {
                    selects[i].selected = false;
                    selects[i][0].selected = true;
                    selects[i].disabled = false;
                }
           
                if(this.classList[0] == 'ad_template')
                    var checkboxes = $(".ad_mobile_children").find("input[type=checkbox]");
                else
                    var checkboxes = $(".template_mobile_children").find("input[type=checkbox]");
                    
                checkboxes[5].checked = true;
                checkboxes[6].checked = true;
                checkboxes[5].disabled = false;
                checkboxes[6].disabled = false;
                
                checkboxes[1].checked = false;
                checkboxes[2].checked = false;
                checkboxes[3].checked = false;
                checkboxes[1].disabled = true;
                checkboxes[2].disabled = true;
                checkboxes[3].disabled = true;
                
            }
            
        }
        else {
            if($('[name=IOS].'+this.classList[0])[0].checked) {
                if(this.classList[0] == 'ad_template')
                    var selects = $(".ad_mobile_children").find("select");
                else
                    var selects = $(".template_mobile_children").find("select");
                
                    
                for(i = 0; i < 2; ++i) {
                    selects[i].selected = false;
                    selects[i][0].selected = true;
                    selects[i].disabled = false;
                }   
                for(i = 2; i < 4; ++i) {
                    selects[i].selected = false;
                    selects[i][0].selected = true;
                    selects[i].disabled = true;
                }
           
                if(this.classList[0] == 'ad_template')
                    var checkboxes = $(".ad_mobile_children").find("input[type=checkbox]");
                else
                    var checkboxes = $(".template_mobile_children").find("input[type=checkbox]");
                    
                checkboxes[5].checked = false;
                checkboxes[6].checked = false;
                checkboxes[1].disabled = false;
                checkboxes[2].disabled = false;
                checkboxes[3].disabled = false;
                checkboxes[5].disabled = true;
                checkboxes[6].disabled = true;
            }
            else {
                if(this.classList[0] == 'ad_template')
                    var selects = $(".ad_mobile_children").find("select");
                else
                    var selects = $(".template_mobile_children").find("select");
                
                    
                for(i = 0; i < selects.length; ++i) {
                    selects[i].selected = false;
                    selects[i][0].selected = true;
                    selects[i].disabled = true;
                }
           
                if(this.classList[0] == 'ad_template')
                    var checkboxes = $(".ad_mobile_children").find("input[type=checkbox]");
                else
                    var checkboxes = $(".template_mobile_children").find("input[type=checkbox]");
                    
                checkboxes[1].checked = false;
                checkboxes[2].checked = false;
                checkboxes[3].checked = false;
                checkboxes[5].checked = false;
                checkboxes[6].checked = false;
                checkboxes[1].disabled = true;
                checkboxes[2].disabled = true;
                checkboxes[3].disabled = true;
                checkboxes[5].disabled = true;
                checkboxes[6].disabled = true;
                
            }
           
        }
        multiselectLoad();    
    })
});




$(document).ready(function(){
    $('input[name="publisher_platforms_facebook"]').click(function(e) {
        if(this.checked) {
            if(this.classList[0] == 'ad_template')
                var checkboxes = $(".ad_facebook").find("input[type=checkbox]");
            else
                var checkboxes = $(".template_facebook").find("input[type=checkbox]");
                
                    
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].checked = true;
                checkboxes[i].disabled = false;
            }   
        }
        else {
            if(this.classList[0] == 'ad_template')
                var checkboxes = $(".ad_facebook").find("input[type=checkbox]");
            else
                var checkboxes = $(".template_facebook").find("input[type=checkbox]");
                
                    
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].checked = false;
                checkboxes[i].disabled = true;
            }
        }
    });
});


$(document).ready(function(){
    $('input[name="publisher_platforms_instagram"]').click(function(e) {
        if(this.checked) {
            if(this.classList[0] == 'ad_template')
                var checkboxes = $(".ad_instagram").find("input[type=checkbox]");
            else
                var checkboxes = $(".template_instagram").find("input[type=checkbox]");
                
                    
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].checked = true;
                checkboxes[i].disabled = false;
            }   
        }
        else {
            if(this.classList[0] == 'ad_template')
                var checkboxes = $(".ad_instagram").find("input[type=checkbox]");
            else
                var checkboxes = $(".template_instagram").find("input[type=checkbox]");
                
                    
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].checked = false;
                checkboxes[i].disabled = true;
            }   
            
        }
    });
});


$(document).ready(function(){
    $('input[name="publisher_platforms_audience_network"]').click(function(e) {
        if(this.checked) {
            if(this.classList[0] == 'ad_template')
                var checkboxes = $(".ad_netw").find("input[type=checkbox]");
            else
                var checkboxes = $(".template_netw").find("input[type=checkbox]");
                
                    
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].checked = true;
                checkboxes[i].disabled = false;
            }   
            
        }
        else {
            if(this.classList[0] == 'ad_template')
                var checkboxes = $(".ad_netw").find("input[type=checkbox]");
            else
                var checkboxes = $(".template_netw").find("input[type=checkbox]");
                
                    
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].checked = false;
                checkboxes[i].disabled = true
            }  
            
        }
    });
});


$(document).ready(function(){
    $('input[name="publisher_platforms_messenger"]').click(function(e) {
        if(this.checked) {
            if(this.classList[0] == 'ad_template')
                var checkboxes = $(".ad_mess").find("input[type=checkbox]");
            else
                var checkboxes = $(".template_mess").find("input[type=checkbox]");
                
                    
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].checked = true;
                checkboxes[i].disabled = false;
            }  
            
        }
        else {
            if(this.classList[0] == 'ad_template')
                var checkboxes = $(".ad_mess").find("input[type=checkbox]");
            else
                var checkboxes = $(".template_mess").find("input[type=checkbox]");
                
                    
            for(i = 0; i < checkboxes.length; ++i) {
                checkboxes[i].checked = false;
                checkboxes[i].disabled = true;
            }  
        }
    });
});




/////////////////////////////  Доп функционал ///////////////////////////////
$(document).ready(function(){
    $(".nav-link").click(function(e) {
        var nav = document.querySelectorAll(".nav-link");
        for(i = 0; i < nav.length; ++i)
            if(nav[i].id != this.id)
                nav[i].classList.remove("active");
    })
    
});

$("#createAdModalButton").click(function(e) {
    e.preventDefault();
    var arr = [];
    var tr = document.querySelectorAll('tr.rk.active');
    for(i = 0; i < tr.length; ++i)
        arr.push(tr[i].classList[1]);
    $('.selectAccs').html('');
    $('.selectAccs').innerHTML = '';
    $('.selectAccs').append('<p>Выбрано кабинетов: '+arr.length+'</p>');
    
    document.querySelector('[name=stage]').value = "allAd";
    $('#createAd').trigger('click');
});



$(document).ready(function(){
    $('input[name=preview]').prop('disabled', true);
    
    var selects = $(".ad_auto_placement_children").find("select");
    for(i = 0; i < selects.length; ++i) 
        selects[i].disabled = true;
    
    
    var checkboxes = $(".ad_auto_placement_children").find("input[type=checkbox]");
    for(i = 0; i < checkboxes.length; ++i)
        checkboxes[i].disabled = true;
    
    
    var selects1 = $(".template_auto_placement_children").find("select");
    for(i = 0; i < selects1.length; ++i) 
        selects1[i].disabled = true;
    
    
    var checkboxes1 = $(".template_auto_placement_children").find("input[type=checkbox]");
    for(i = 0; i < checkboxes1.length; ++i)
        checkboxes1[i].disabled = true;
    

    
    
    document.querySelector('[name=is_pixel').checked = false;
    document.querySelector('[name=pixel_name').disabled = true;
});



function createAdTemplateCheck(form, accs) {
    var texts = $("#"+form).find("input[type=text]");
    var numbers = $("#"+form).find("input[type=number]");
    var selects1 = $("#"+form).find("select");
    var checkboxes = $("#"+form).find("input[type=checkbox]");
    var selects = [];
   
    if(form == 'createAd_form')
        for(i = 1; i < selects1.length; ++i)
            selects[i - 1] = selects1[i];
            
    else
        selects = selects1;
    
    var errors = [];
    
    
    
    //numbers
    if(numbers[0].value == '')
        errors.push("Заполните поле: 'Дневной бюджет'");
    if(Number(numbers[0].value) < 0 || !(new RegExp("[0-9]*").test(numbers[0].value)) && numbers[0].value != '')
        errors.push("Некорректное значение: 'Дневной бюджет'");
    
    
    if(numbers[1].value == '' && selects[2].value != 'LOWEST_COST_WITHOUT_CAP')
        errors.push("Заполните поле: 'Бюджет ставки' или выберите другую стратегию ставки");
    if(Number(numbers[1].value) < 0 || !(new RegExp("[0-9]*").test(numbers[1].value)) && numbers[1].value != '' && selects[3].value != 'LOWEST_COST_WITHOUT_CAP')
        errors.push("Некорректное значение: 'Бюджет ставки'");
    
    if(Number(numbers[2].value) < 13 && Number(numbers[2].value) != '' || !(new RegExp("[0-9]*").test(numbers[2].value)) && numbers[2].value != '')
        errors.push("Некорректное значение: 'Минимальный возраст (От 13 лет)'");
    
    if((Number(numbers[3].value) < 13 || Number(numbers[3].value) > 65 || !(new RegExp("[0-9]*").test(numbers[3].value))) && Number(numbers[3].value) != '')
        errors.push("Некорректное значение: 'Максимальный возраст (От 13 до 65 лет)'");
    
    
 
    //selects
    if(selects[4].value == '')
        errors.push("Заполните поле: 'Страны'");
    
    
    if(form == 'createAd_form') 
        var checkboxesm = $(".ad_mobile_children").find("input[type=checkbox]:checked");
    else
        var checkboxesm = $(".template_mobile_children").find("input[type=checkbox]:checked");
    
    if(checkboxes[4].checked && !checkboxes[6].checked && !checkboxes[10].checked)
        errors.push("Выберите хотя бы одну ОС");
    
    if(!checkboxes[4].checked && !checkboxes[5].checked)
        errors.push("Выберите хотя бы одно устройство");
    
    
    if(form == 'createAd_form') 
        var checkboxes1 = $(".ad_facebook").find("input[type=checkbox]:checked");
    else
        var checkboxes1 = $(".template_facebook").find("input[type=checkbox]:checked");
       
    if(checkboxes1.length == 0 && checkboxes[13].checked) 
        errors.push("Выберите хотя бы одно место размещения на фейсбуке");
        

    if(form == 'createAd_form') 
        var checkboxes2 = $(".ad_netw").find("input[type=checkbox]:checked");
    else
        var checkboxes2 = $(".template_netw").find("input[type=checkbox]:checked");
       
    if(checkboxes2.length == 0 && checkboxes[21].checked) 
        errors.push("Выберите хотя бы одно место размещения в Audience Network");
        
    if(form == 'createAd_form') 
        var checkboxes3 = $(".ad_instagram").find("input[type=checkbox]:checked");
    else
        var checkboxes3 = $(".template_instagram").find("input[type=checkbox]:checked");
       
    if(checkboxes3.length == 0 && checkboxes[25].checked) 
        errors.push("Выберите хотя бы одно место размещения в Instagram");
            
            
    if(form == 'createAd_form') 
        var checkboxes4 = $(".ad_mess").find("input[type=checkbox]:checked");
    else
        var checkboxes4 = $(".template_mess").find("input[type=checkbox]:checked");
       
    if(checkboxes4.length == 0 && checkboxes[29].checked) 
        errors.push("Выберите хотя бы одно место размещения в Messanger");
        
        
    if(!checkboxes[13].checked && !checkboxes[21].checked && !checkboxes[25].checked && !checkboxes[29].checked)
        errors.push("Выберите хотя бы одно место размещения");
        
        
    if(checkboxes[6].checked && !checkboxes[7].checked && !checkboxes[8].checked && !checkboxes[9].checked)
        errors.push("Выберите хотя бы одно IOS утройство");
        
    if(checkboxes[10].checked && !checkboxes[11].checked && !checkboxes[12].checked)
        errors.push("Выберите хотя бы одно Android утройство");
        
    if(Number(selects[17].value) > Number(selects[18].value))
        errors.push("Версии IOS устройства некорректны");
        
    if(Number(selects[19].value) > Number(selects[20].value)) 
        errors.push("Версии Android устройства некорректны");
        
    
        
        
    if(form == 'createAd_form') {    
        if(document.querySelector("[name=creo]").value == '')
            errors.push("Добавьте креатив");
        
        if(document.querySelector("[name=creo]").value != '') {
            let file = document.querySelector("[name=creo]").files[0];
            if(file.size > 200*1024*1024) 
                errors.push("Размер креатива превышает 200МБ");
        }
        
        if(checkboxes[32].checked && preview.value != '') {
            let file1 = document.querySelector("[name=preview]").files[0];
            if(file1.size > 200*1024*1024) 
                errors.push("Размер превью превышает 200МБ");
        }
        
        
        if(checkboxes[33].checked && texts[4].value == '')
            errors.push("Добавьте имя пикселя или отключите его");
        
        
        if(Number(numbers[4].value) < 0 || !(new RegExp("[0-9]*").test(numbers[4].value)) && numbers[4].value != '')
            errors.push("Некорректное значение: 'Количество копий адсета'");
        
        if(checkboxes[32].checked && preview.value == '')
            errors.push("Добавьте превью или отключите его");     
            
        if(checkboxes[34].checked && date.value == '')
            errors.push("Добавьте дату или отключите ее");
       
        var urls = document.querySelector('[name=url]').value.split("\n");
        if(urls.length < accs)
            errors.push("Ссылок меньше чем выбрано аккаунтов");
        
        for(i = 0; i < urls.length; ++i)
            if(!(new RegExp("(http|https):\/\/([a-zA-Z\.0-9\/]*)*").test(urls[i])))
                errors.push("Некорректная ссылка в строке: "+(i+1));
                
        
    }
    else {
        /*if(checkboxes[32].checked && texts[3].value == '')
            errors.push("Добавьте имя пикселя или отключите его");*/
        
        
        if(document.querySelector('[name=template]').value == '')
            errors.push("Введите имя шаблона");
            
        var template_names = $('#template_select').find('option');
        for(i = 0; i < template_names.length; ++i)
            if(document.querySelector('[name=template]').value == template_names[i].text)
                errors.push("Шаблон с таким именем уже существует");
        
    }
   
   
   
    return errors;
};


        
//Проверка карты на выбранных акках
function cardChecks(accs) {
    var errors = [];
    for(i = 0; i < accs.length; ++i) {
        if(document.querySelectorAll('[name='+accs[i]+']')[0].innerText == '')
            errors.push((i+1)+": Карта не добавлена \n\r");
        if(document.querySelectorAll('[name='+accs[i]+']')[1].innerText != 'Active')
            errors.push((i+1)+": Рекламный кабинет неактивен \n\r");    
    }
            
    return errors;
}

$(document).ready(function(){
    $('.addAccModal').find('[href="#next"]')[0].classList.add("reviewAccounts");
    $('.addAccModal').find('[href="#previous"]')[0].classList.add("previewAccounts");
    $('.addAccModal').find('.number')[1].classList.add("reviewAccountsNumb");
    $('.addAccModal').find('.number')[0].classList.add("previewAccountsNumb");
    
    $('.addAccModal').find('[href="#finish"]')[0].id = 'addAccount';
    $('.reviewAccounts').on('click', function (e) {
        e.preventDefault();
        $('.review').html('');
        $('.review').innerHTML = '';
        
        var accs = document.querySelector('#account_main_input').value.split("\n");
        for(var i = 0; i < accs.length; ++i) {
            if(accs[i] != '') {
                var arr = accs[i].split('#', 5);
                $('.review').append('<div class="col-lg-2 col-xl-2"><input type="text" class="form-control mb-2 acc_name" value="'+arr[0]+'"></div><div class="col-lg-2 col-xl-2"><input type="text" class="form-control mb-2 acc_token" value="'+arr[1]+'"></div><div class="col-lg-2 col-xl-2"><input type="text" class="form-control mb-2 acc_user" value="'+arr[2]+'"></div><div class="col-lg-4 col-xl-4"><input type="text" class="form-control mb-2 acc_proxy" value="'+arr[3]+'"></div><div class="col-lg-2 col-xl-2"><input type="text" class="form-control mb-2 acc_comment" value="'+arr[4]+'"></div>');
            }
        }
        
        $('.review').append('<button disabled type="submit" id="addAccButton" style="border: none; outline: none; background-color: white; margin-top: 30px;"><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Добавить"><svg style="color:#007bff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> </a></button>');
    });
    
    $('.previewAccounts').on('click', function (e) {
        e.preventDefault();
        account_main_input.value = '';
        
        var names = document.querySelectorAll('.acc_name');
        var tokens = document.querySelectorAll('.acc_token');
        var users = document.querySelectorAll('.acc_user');
        var proxys = document.querySelectorAll('.acc_proxy');
        var comments = document.querySelectorAll('.acc_comment');
        var val = "";
        for(var i = 0; i < names.length; ++i) {
            val += names[i].value+"#"+tokens[i].value+"#"+users[i].value+"#"+proxys[i].value+"#"+comments[i].value+"\n";
        }
        account_main_input.value = val;
    });
    
    
    $('.reviewAccountsNumb').on('click', function (e) {
        e.preventDefault();
        $('.review').html('');
        $('.review').innerHTML = '';
        
        var accs = document.querySelector('#account_main_input').value.split("\n");
        for(var i = 0; i < accs.length; ++i) {
            if(accs[i] != '') {
                var arr = accs[i].split('#', 5);
                $('.review').append('<div class="row"><div class="col-lg-2 col-xl-2"><input type="text" class="form-control mb-2 acc_name" value="'+arr[0]+'"></div><div class="col-lg-2 col-xl-2"><input type="text" class="form-control mb-2 acc_token" value="'+arr[1]+'"></div><div class="col-lg-2 col-xl-2"><input type="text" class="form-control mb-2 acc_user" value="'+arr[2]+'"></div><div class="col-lg-4 col-xl-4"><input type="text" class="form-control mb-2 acc_proxy" value="'+arr[3]+'"></div><div class="col-lg-2 col-xl-2"><input type="text" class="form-control mb-2 acc_comment" value="'+arr[4]+'"></div></div>');
            }
        }
        $('.review').append('<button disabled type="submit" id="addAccButton" style="border: none; outline: none; background-color: white; margin-top: 30px;"><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Добавить"><svg style="color:#007bff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> </a></button>');
    
    });
    
    $('.previewAccountsNumb').on('click', function (e) {
        e.preventDefault();
        account_main_input.value = '';
        
        var names = document.querySelectorAll('.acc_name');
        var tokens = document.querySelectorAll('.acc_token');
        var users = document.querySelectorAll('.acc_user');
        var proxys = document.querySelectorAll('.acc_proxy');
        var comments = document.querySelectorAll('.acc_comment');
        var val = "";
        for(var i = 0; i < names.length; ++i) {
            val += names[i].value+"#"+tokens[i].value+"#"+users[i].value+"#"+proxys[i].value+"#"+comments[i].value+"\n";
        }
        account_main_input.value = val;
    });
    
    var y = $('#addAccButton');
    $('#addAccButton').onclick = function(e) {
        e.preventDefault();
        
    };
});