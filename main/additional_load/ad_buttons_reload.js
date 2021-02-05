$("button[name=refreshAd]").click(function(e) {
    e.preventDefault();
    var arr = []
    arr.push(this.value);
    
    SuccessAlert.innerHTML = 'Обновляем объявления...';
    $('.success').show();
    $.ajax({
        type : 'POST',
        data : {
            numbers: arr,
            date: "lifetime",
            first: "1"
        },
        url : 'scripts/refreshAds.php',
        success : function(data) {
            data = JSON.parse(data);
            reloadTables();
            $('.success').hide();
            SuccessAlert.innerHTML = 'Объявления успешно обновлены!';
            $('.success').show();
            setTimeout(function(){ $('.success').hide(); }, 5000);
        },
        error : function(xhr, err) {
        }
    });
    
});

$("button[name=startAd]").click(function(e) {
    e.preventDefault();
    var arr = []
    arr.push(this.value);
    
    SuccessAlert.innerHTML = 'Запускаем объявления...';
    $('.success').show();
    $.ajax({
        type : 'POST',
        data : {
            numbers: arr,
            first: "1"
        },
        url : 'scripts/startAds.php',
        success : function(data) {
            data = JSON.parse(data);
            reloadTables();
            $('.success').hide();
            if(!data['error']) { 
                SuccessAlert.innerHTML = 'Объявления успешно запущены!';
                $('.success').show();
                setTimeout(function(){ $('.success').hide(); }, 5000);
            }
            else {
                WarningAlert.innerHTML = 'Часть объявлений не были запущены, из-за ошибок!';
                $('.warning').show();
                setTimeout(function(){ $('.warning').hide(); }, 5000);
            }
            
        },
        error : function(xhr, err) {
        }
    });
    
});


$("button[name=stopAd]").click(function(e) {
    e.preventDefault();
    var arr = []
    arr.push(this.value);
    
    SuccessAlert.innerHTML = 'Останавливаем объявления...';
    $('.success').show();
    $.ajax({
        type : 'POST',
        data : {
            numbers: arr,
            first: "1"
        },
        url : 'scripts/stopAds.php',
        success : function(data) {
            data = JSON.parse(data);
            reloadTables();
            $('.success').hide();
            if(!data['error']) { 
                SuccessAlert.innerHTML = 'Объявления успешно остановлены!';
                $('.success').show();
                setTimeout(function(){ $('.success').hide(); }, 5000);
            }
            else {
                WarningAlert.innerHTML = 'Часть объявлений не были остановлены, из-за ошибок!';
                $('.warning').show();
                setTimeout(function(){ $('.warning').hide(); }, 5000);
            }
            
        },
        error : function(xhr, err) {
        }
    });
    
});



    