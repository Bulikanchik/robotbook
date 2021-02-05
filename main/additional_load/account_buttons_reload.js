$("button[name=deleteAcc]").click(function(e) {
    e.preventDefault();
    var arr = []
    arr.push(this.value);
   
    $.ajax({
        type : 'POST',
        data : {
            numbers: arr
        },
        url : 'scripts/deleteAccounts.php',
        success : function(data) {
            
            reloadTables();
            $('.success').hide();
            SuccessAlert.innerHTML = 'Аккаунты успешно удалены!';
            $('.success').show();
            setTimeout(function(){ $('.success').hide(); }, 5000);
        },
        error : function(xhr, err) {
        }
    });
    
});



$(document).ready(function(){
    $("button[name=refreshAcc]").click(function(e) {
        e.preventDefault();
        var arr = []
        arr.push(this.value);
        
        SuccessAlert.innerHTML = 'Обновляем аккаунты...';
        $('.success').show();
        $.ajax({
            type : 'POST',
            data : {
                numbers: arr,
                first: "1"
            },
            url : 'scripts/refreshAccounts.php',
            success : function(data) {
                reloadTables();
                $('.success').hide();
                SuccessAlert.innerHTML = 'Аккаунты успешно обновлены!';
                $('.success').show();
                setTimeout(function(){ $('.success').hide(); }, 5000);
            },
            error : function(xhr, err) {
            }
        });
        
    });
});

    