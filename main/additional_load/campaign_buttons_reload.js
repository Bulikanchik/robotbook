$("button[name=refreshCampaign]").click(function(e) {
    e.preventDefault();
    var arr = []
    arr.push(this.value);
    
    SuccessAlert.innerHTML = 'Обновляем кампании...';
    $('.success').show();
    $.ajax({
        type : 'POST',
        data : {
            numbers: arr,
            date: "lifetime",
            first: "1"
        },
        url : 'scripts/refreshCampaigns.php',
        success : function(data) {
            data = JSON.parse(data);
            reloadTables();
            $('.success').hide();
            SuccessAlert.innerHTML = 'Кампании успешно обновлены!';
            $('.success').show();
            setTimeout(function(){ $('.success').hide(); }, 5000);
        },
        error : function(xhr, err) {
        }
    });
    
});

$("button[name=startCampaign]").click(function(e) {
    e.preventDefault();
    var arr = []
    arr.push(this.value);
    
    SuccessAlert.innerHTML = 'Запускаем кампании...';
    $('.success').show();
    $.ajax({
        type : 'POST',
        data : {
            numbers: arr,
            first: "1"
        },
        url : 'scripts/startCampaigns.php',
        success : function(data) {
            data = JSON.parse(data);
            reloadTables();
            $('.success').hide();
            if(!data['error']) { 
                SuccessAlert.innerHTML = 'Кампании успешно запущены!';
                $('.success').show();
                setTimeout(function(){ $('.success').hide(); }, 5000);
            }
            else {
                WarningAlert.innerHTML = 'Часть кампаний не были запущены, из-за ошибок!';
                $('.warning').show();
                setTimeout(function(){ $('.warning').hide(); }, 5000);
            }
            
        },
        error : function(xhr, err) {
        }
    });
    
});


$("button[name=stopCampaign]").click(function(e) {
    e.preventDefault();
    var arr = []
    arr.push(this.value);
    
    SuccessAlert.innerHTML = 'Останавливаем кампании...';
    $('.success').show();
    $.ajax({
        type : 'POST',
        data : {
            numbers: arr,
            first: "1"
        },
        url : 'scripts/stopCampaigns.php',
        success : function(data) {
            data = JSON.parse(data);
            reloadTables();
            $('.success').hide();
            if(!data['error']) { 
                SuccessAlert.innerHTML = 'Кампании успешно остановлены!';
                $('.success').show();
                setTimeout(function(){ $('.success').hide(); }, 5000);
            }
            else {
                WarningAlert.innerHTML = 'Часть кампаний не были остановлены, из-за ошибок!';
                $('.warning').show();
                setTimeout(function(){ $('.warning').hide(); }, 5000);
            }
            
        },
        error : function(xhr, err) {
        }
    });
    
});



    