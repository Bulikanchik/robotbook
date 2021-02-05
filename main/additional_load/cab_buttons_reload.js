$("button[name=refreshRk]").click(function(e) {
    e.preventDefault();
    var arr = []
    arr.push(this.value);
    
    SuccessAlert.innerHTML = 'Обновляем рекламные кабинеты...';
    $('.success').show();
    $.ajax({
        type : 'POST',
        data : {
            numbers: arr,
            first: "1"
        },
        url : 'scripts/refreshCabs.php',
        success : function(data) {
            reloadTables();
            $('.success').hide();
            SuccessAlert.innerHTML = 'Рекламные кабинеты успешно обновлены!';
            $('.success').show();
            setTimeout(function(){ $('.success').hide(); }, 5000);
        },
        error : function(xhr, err) {
        }
    });
    
});


    