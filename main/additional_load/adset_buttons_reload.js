$("button[name=refreshAdset]").click(function(e) {
    e.preventDefault();
    var arr = []
    arr.push(this.value);
    
    SuccessAlert.innerHTML = 'Обновляем адсеты...';
    $('.success').show();
    $.ajax({
        type : 'POST',
        data : {
            numbers: arr,
            date: "lifetime",
            first: "1"
        },
        url : 'scripts/refreshAdsets.php',
        success : function(data) {
            data = JSON.parse(data);
            reloadTables();
            $('.success').hide();
            SuccessAlert.innerHTML = 'Адсеты успешно обновлены!';
            $('.success').show();
            setTimeout(function(){ $('.success').hide(); }, 5000);
        },
        error : function(xhr, err) {
        }
    });
    
});

$("button[name=startAdset]").click(function(e) {
    e.preventDefault();
    var arr = []
    arr.push(this.value);
    
    SuccessAlert.innerHTML = 'Запускаем адсеты...';
    $('.success').show();
    $.ajax({
        type : 'POST',
        data : {
            numbers: arr,
            first: "1"
        },
        url : 'scripts/startAdsets.php',
        success : function(data) {
            data = JSON.parse(data);
            reloadTables();
            $('.success').hide();
            if(!data['error']) { 
                SuccessAlert.innerHTML = 'Адсеты успешно запущены!';
                $('.success').show();
                setTimeout(function(){ $('.success').hide(); }, 5000);
            }
            else {
                WarningAlert.innerHTML = 'Часть адсетов не были запущены, из-за ошибок!';
                $('.warning').show();
                setTimeout(function(){ $('.warning').hide(); }, 5000);
            }
            
        },
        error : function(xhr, err) {
        }
    });
    
});


$("button[name=stopAdset]").click(function(e) {
    e.preventDefault();
    var arr = []
    arr.push(this.value);
    
    SuccessAlert.innerHTML = 'Останавливаем адсеты...';
    $('.success').show();
    $.ajax({
        type : 'POST',
        data : {
            numbers: arr,
            first: "1"
        },
        url : 'scripts/stopAdsets.php',
        success : function(data) {
            data = JSON.parse(data);
            reloadTables();
            $('.success').hide();
            if(!data['error']) { 
                SuccessAlert.innerHTML = 'Адсеты успешно остановлены!';
                $('.success').show();
                setTimeout(function(){ $('.success').hide(); }, 5000);
            }
            else {
                WarningAlert.innerHTML = 'Часть адсетов не были остановлены, из-за ошибок!';
                $('.warning').show();
                setTimeout(function(){ $('.warning').hide(); }, 5000);
            }
            
        },
        error : function(xhr, err) {
        }
    });
    
});



    