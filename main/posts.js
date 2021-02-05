//<!-- MODAL SCRIPTS -->


/////////////////////////////////////////////
         //АККАУНТЫ
/////////////////////////////////////////////



$(document).ready(function(){
    $("#addAccount").click(function(e) {
        e.preventDefault();
        
        var accs = document.querySelector('[name="main_input"]').value.split("\n");
        if(accs[accs.length - 1] == "")
            accs.pop();
        var arr = [];
        var error = [];
        var errorProxy = [];
        var errorDescript = [];
        var errorDuble = [];
        
        
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
        SuccessAlert.innerHTML = 'Секунду...';
        
        
        $('.success').show();
        for(var i = 0; i < accs.length; ++i) {
            arr.push(accs[i].split('#', 5));
            if(arr[i].length < 5)
                error.push(i + 1);
            else {
                if(arr[i][0] == '')
                    error.push(i + 1);
                if(arr[i][1] == '')
                    error.push(i + 1);
                if(arr[i][3] != '')
                    if(!(new RegExp("(http|socks5):\/\/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}:[0-9]{1,4}@[0-9a-zA-Z]*:[0-9a-zA-Z]*").test(arr[i][3])))
                        errorProxy.push(i + 1);
            }
        }
        if(error.length > 0 || errorProxy.length > 0) {
            ErrorAlert.innerHTML = 'Проверьте введенные данные в строках: '+error;
            if(errorProxy.length > 0)
                ErrorAlert.innerHTML += ' и прокси в строках:'+errorProxy;
            $('.success').hide();     
            $('.error').show();
            setTimeout(function(){ $('.error').hide(); 
            }, 10000);
        }
        else {
            // Проверки дублей и тд 
            $.ajax({
                type : 'POST',
                data : {
                    info : arr
                },
                url : 'scripts/checkAddAccounts.php',
                success : function(data) {
                    errorDuble = JSON.parse(data);
                    if(errorDuble[0].length > 0 || errorDuble[1].length > 0  || errorDuble[2].length > 0  || errorDuble[3].length > 0) {
                        //Дублирующй токен в строке: Доблирующее название в строке: 
                        ErrorAlert.innerHTML = 'Ошибки в строках: '
                        if(errorDuble[0].length > 0)
                            ErrorAlert.innerHTML += 'имя аккаунта уже в базе: '+errorDuble[0]+',';
                        if(errorDuble[1].length > 0)
                            ErrorAlert.innerHTML += 'токен аккаунта уже в базе: '+errorDuble[1]+',';
                        if(errorDuble[2].length > 0)
                            ErrorAlert.innerHTML += 'дублируется имя аккаунта во введенных данных: '+errorDuble[2]+',';
                        if(errorDuble[3].length > 0)
                            ErrorAlert.innerHTML += 'дублируется токен аккаунта во введенных данных: '+errorDuble[3];
                        $('.success').hide();  
                        $('.error').show();
                        setTimeout(function(){ $('.error').hide(); 
                        }, 10000);
                    }
                    else {
                        
                        
                        
                        $.ajax({
                            type : 'POST',
                            data : {
                                info : arr
                            },
                            url : 'scripts/checkUserProxy.php',
                            success : function(data) {
                                error = JSON.parse(data);
                                if(error != null){
                                    ErrorAlert.innerHTML = 'Прокси не работают в строках: '+error;
                                    $('.success').hide();  
                                    $('.error').show();
                                    setTimeout(function(){ $('.error').hide(); 
                                    }, 10000);
                                }
                                else {
                                    var errors = [];
                                    $('.close.account').trigger('click');
                                    $('.previewAccountsNumb').trigger('click');
                                    addAcc(0);
                                }
                            },
                            error : function(xhr, err) {
                            }
                        });
                        
                        
                        
                    }
                    
                },
                error : function(xhr, err) {
                }
            });
            
            var errors = [];  
            function addAcc(i) {
                
                if(i < arr.length) {
                    $('.warning').hide();
                    SuccessAlert.innerHTML = 'Добавляем аккаунт: '+(i+1);
                    $('.success').show();
                    var accounts = [];
                    accounts.push(arr[i]);
                    $.ajax({
                        type : 'POST',
                        data : {
                            info : accounts,
                            group: document.querySelector('[name="group"]').value,
                            first: "1"
                        },
                        url : 'scripts/addAccounts.php',
                        success : function(data) {
                                data = JSON.parse(data);
                                account_main_input.value = '';
                                
                                if(data['error']) { 
                                    errors.push(i+1);
                                    if(data['error'][0] == "452")
                                        errorDescript[0] = "требует смены пароля";
                                    else  if(data['error'][0] == "459")
                                        errorDescript[1] = "селфи"; 
                                    else
                                        errorDescript[2] = "неизвестная ошибка";
                                }
                                addAcc(i+1); 
                        },
                        error : function(xhr, err) {
                        }
                    });
                }
                else
                {
                    if(errors.length == 0){
                        account_main_input.value = '';
                        reloadTables();
                        SuccessAlert.innerHTML = 'Готово!';
                        setTimeout(function(){ $('.success').hide(); }, 5000);
                    }
                    else {
                        account_main_input.value = '';
                        reloadTables();
                        WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
                        $('.success').hide();
                        $('.warning').show();
                        setTimeout(function(){ $('.warning').hide(); }, 10000);
                    }
                }
            };
            
        }
    })
});





$(document).ready(function(){
    $("#accounts_action").on('change', function (e) {
        e.preventDefault();
        var arr = [];
        var errorDescript = [];
        var tr = document.querySelectorAll('tr.account.active');
        for(var i = 0; i < tr.length; ++i)
            arr.push(tr[i].id);
            
        
        if(this.value == "apply_policy") {
            url = "scripts/applyPolicy.php";
            SuccessAlert.innerHTML = 'Принимаем политику...';
            $('.success').show();
        }
        if(this.value == "publish_fp") {
            url = "scripts/publishFp.php";
            SuccessAlert.innerHTML = 'Публикуем фанпейджи...';
            $('.success').show();
        }
        if(this.value == "create_fp") {
            basic_action_accounts.disabled = false;
            basic_action_accounts.selected = true;
            basic_action_accounts.disabled = true;
            multiselectLoad();
            $('.selectAccsFp').html('');
            $('.selectAccsFp').innerHTML = '';
            $('.selectAccsFp').append('<p>Выбрано аккаунтов: '+arr.length+'</p>');
            $('#createFpModalButton').trigger('click');
        }
        else {
            basic_action_accounts.disabled = false;
            basic_action_accounts.selected = true;
            basic_action_accounts.disabled = true;
            multiselectLoad();
            var errors = [];
            accAction(0);
            function accAction(i) {
            	if(i < arr.length) {
            		$('.warning').hide();
            		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
            		$('.success').show();
            		var accounts = [];
            		accounts.push(arr[i]);
            		$.ajax({
            			type : 'POST',
            			data : {
            				numbers : accounts,
            				first: "1"
            			},
            			url : url,
            			success : function(data) {
            					data = JSON.parse(data);
            					if(data['error']) { 
            						errors.push(i+1);
            						if(data['error'][0] == "452")
                                    	errorDescript[0] = "требует смены пароля";
                                    else  if(data['error'][0] == "459")
                                    	errorDescript[1] = "селфи"; 
                                    else
                                    	errorDescript[2] = "неизвестная ошибка";
            					}
            					accAction(i+1); 
            			},
            			error : function(xhr, err) {
            			}
            		});
            	}
            	else
            	{
            		if(errors.length == 0){
            			account_main_input.value = '';
            			reloadTables();
            			SuccessAlert.innerHTML = 'Готово!';
            			setTimeout(function(){ $('.success').hide(); }, 5000);
            		}
            		else {
            			account_main_input.value = '';
            			reloadTables();
            			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
            			$('.success').hide();
            			$('.warning').show();
            			setTimeout(function(){ $('.warning').hide(); }, 10000);
            		}
            	}
            };
        }
    });
}); 







$(document).ready(function(){
    $("#addFp").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.account.active');
        for(var i = 0; i < tr.length; ++i)
            arr.push(tr[i].id);
        
        var accs = document.querySelector('[name=fp_names]').value.split("\n");
        var arr1 = [];
        for(var i = 0; i < accs.length; ++i) 
            arr1.push(accs[i]);
        
        
        if(arr.length > arr1.length) {
            ErrorAlert.innerHTML = 'Количество имен меньше количества аккаунтов!';
            $('.error').show();
            setTimeout(function(){ $('.error').hide(); }, 10000);
        }
        else {
            $('.close.fp').trigger('click');
            SuccessAlert.innerHTML = 'Создаем фанпейджи...';
            $('.success').show();
            
            
            var errors = [];
            var errorDescript = [];
            addFp(0);
            function addFp(i) {
            	if(i < arr.length) {
            		$('.warning').hide();
            		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
            		$('.success').show();
            		var accounts = [];
            		accounts.push(arr[i]);
            		var name = [];
            		name.push(arr1[i]);
            		$.ajax({
            			type : 'POST',
            			data : {
            			    numbers: accounts,
                            names: name,
            				first: "1"
            			},
            			url : "scripts/createFp.php",
            			success : function(data) {
            					data = JSON.parse(data);
            					if(data['error']) { 
            						errors.push(i+1);
            						if(data['error'][0] == "452")
                                    	errorDescript[0] = "требует смены пароля";
                                    else  if(data['error'][0] == "459")
                                    	errorDescript[1] = "селфи"; 
                                    else
                                    	errorDescript[2] = "неизвестная ошибка";
            					}
            					addFp(i+1); 
            			},
            			error : function(xhr, err) {
            			}
            		});
            	}
            	else
            	{
            		if(errors.length == 0){
            			account_main_input.value = '';
            			reloadTables();
            			SuccessAlert.innerHTML = 'Готово!';
            			setTimeout(function(){ $('.success').hide(); }, 5000);
            		}
            		else {
            			account_main_input.value = '';
            			reloadTables();
            			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
            			$('.success').hide();
            			$('.warning').show();
            			setTimeout(function(){ $('.warning').hide(); }, 10000);
            		}
            	}
            };
        }
    })
});



$(document).ready(function(){
    $("#refreshAccounts").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.account.active');
        var i;
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].id);
            
        SuccessAlert.innerHTML = 'Обновляем аккаунты...';
        $('.success').show();
        
        
        var errors = [];
        var errorDescript = [];
        refreshAcc(0);
        function refreshAcc(i) {
        	if(i < arr.length) {
        		$('.warning').hide();
        		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
        		$('.success').show();
        		var accounts = [];
        		accounts.push(arr[i]);
        		$.ajax({
        			type : 'POST',
        			data : {
        			    numbers: accounts,
        				first: "1"
        			},
        			url : "scripts/refreshAccounts.php",
        			success : function(data) {
        					data = JSON.parse(data);
        					if(data['error']) { 
        						errors.push(i+1);
        						if(data['error'][0] == "452")
                                	errorDescript[0] = "требует смены пароля";
                                else  if(data['error'][0] == "459")
                                	errorDescript[1] = "селфи"; 
                                else
                                	errorDescript[2] = "неизвестная ошибка";
        					}
        					refreshAcc(i+1); 
        			},
        			error : function(xhr, err) {
        			}
        		});
        	}
        	else
        	{
        		if(errors.length == 0){
        			account_main_input.value = '';
        			reloadTables();
        			SuccessAlert.innerHTML = 'Готово!';
        			setTimeout(function(){ $('.success').hide(); }, 5000);
        		}
        		else {
        			account_main_input.value = '';
        			reloadTables();
        			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
        			$('.success').hide();
        			$('.warning').show();
        			setTimeout(function(){ $('.warning').hide(); }, 10000);
        		}
        	}
        };
        
        
    });
}); 


$(document).ready(function(){
    $("#deleteAccounts").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.account.active');
        var i;
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].id);
       
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
}); 








/////////////////////////////////////////////
         //КАБИНЕТЫ
/////////////////////////////////////////////




$(document).ready(function(){
    $("#cabs_action").on('change', function (e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.rk.active');
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[1]);
            
            
            
        if(this.value == "add_card") {
            basic_action_cabs.disabled = false;
            basic_action_cabs.selected = true;
            basic_action_cabs.disabled = true;
            multiselectLoad();
            $('.selectAccsCard').html('');
            $('.selectAccsCard').innerHTML = '';
            $('.selectAccsCard').append('<p>Выбрано кабинетов: '+arr.length+'</p>');
            $('#addCardModalButton').trigger('click');
        }
        if(this.value == "change_currency") {
            basic_action_cabs.disabled = false;
            basic_action_cabs.selected = true;
            basic_action_cabs.disabled = true;
            multiselectLoad();
            $('.selectAccsCurrency').html('');
            $('.selectAccsCurrency').innerHTML = '';
            $('.selectAccsCurrency').append('<p>Выбрано кабинетов: '+arr.length+'</p>');
            $('#changeCurrencyModalButton').trigger('click');
        }
        
        if(this.value == "create_pixel") {
            basic_action_cabs.disabled = false;
            basic_action_cabs.selected = true;
            basic_action_cabs.disabled = true;
            multiselectLoad();
            SuccessAlert.innerHTML = 'Создаем пиксели...';
            $('.success').show();
        
        
        
            var errors = [];
            var errorDescript = [];
            createPixel(0);
            function createPixel(i) {
            	if(i < arr.length) {
            		$('.warning').hide();
            		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
            		$('.success').show();
            		var accounts = [];
            		accounts.push(arr[i]);
            		$.ajax({
            			type : 'POST',
            			data : {
            			    numbers: accounts,
            				first: "1"
            			},
            			url : "scripts/createPixel.php",
            			success : function(data) {
            					data = JSON.parse(data);
            					if(data['error']) { 
            						errors.push(i+1);
            					if(data['error'][0] == "452")
                                	errorDescript[0] = "требует смены пароля";
                                else  if(data['error'][0] == "459")
                                	errorDescript[1] = "селфи"; 
                                else
                                	errorDescript[2] = "неизвестная ошибка";
            					}
            					createPixel(i+1); 
            			},
            			error : function(xhr, err) {
            			}
            		});
            	}
            	else
            	{
            		if(errors.length == 0){
            			account_main_input.value = '';
            			reloadTables();
            			SuccessAlert.innerHTML = 'Готово!';
            			setTimeout(function(){ $('.success').hide(); }, 5000);
            		}
            		else {
            			account_main_input.value = '';
            			reloadTables();
            		    WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
            			$('.success').hide();
            			$('.warning').show();
            			setTimeout(function(){ $('.warning').hide(); }, 10000);
            		}
            	}
            };
            
            
        }
        
    });
}); 




$(document).ready(function(){
    $("#changeCurrency").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.rk.active');
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[1]);
        
        
        $('.close.changeCurrency').trigger('click');
        SuccessAlert.innerHTML = 'Меняем валюту...';
        $('.success').show();
        
        
        var errors = [];
        var errorDescript = [];
        changeCurrency(0);
        function changeCurrency(i) {
        	if(i < arr.length) {
        		$('.warning').hide();
        		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
        		$('.success').show();
        		var accounts = [];
        		accounts.push(arr[i]);
        		$.ajax({
        			type : 'POST',
        			data : {
        			    numbers: accounts,
        			    currency: document.querySelector('[name=currency]').value,
        				first: "1"
        			},
        			url : "scripts/changeCurrency.php",
        			success : function(data) {
        					data = JSON.parse(data);
        					if(data['error']) { 
        						errors.push(i+1);
        						if(data['error'][0] == "452")
                                	errorDescript[0] = "требует смены пароля";
                                else  if(data['error'][0] == "459")
                                	errorDescript[1] = "селфи"; 
                                else
                                	errorDescript[2] = "неизвестная ошибка";
        					}
        					changeCurrency(i+1); 
        			},
        			error : function(xhr, err) {
        			}
        		});
        	}
        	else
        	{
        		if(errors.length == 0){
        			reloadTables();
        			SuccessAlert.innerHTML = 'Готово!';
        			setTimeout(function(){ $('.success').hide(); }, 5000);
        		}
        		else {
        			reloadTables();
        			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
        			$('.success').hide();
        			$('.warning').show();
        			setTimeout(function(){ $('.warning').hide(); }, 10000);
        		}
        	}
        };
    })
});



$(document).ready(function(){
    $("#addCardForm").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.rk.active');
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[1]);
        
        var accs = document.querySelector('[name=addCardForms]').value.split("\n");
        var arr1 = [];
        for(var i = 0; i < accs.length; ++i) 
            arr1.push(accs[i]);
        
        if(arr.length > arr1.length) {
            ErrorAlert.innerHTML = 'Количество карт меньше количества аккаунтов!';
            $('.error').show();
            setTimeout(function(){ $('.error').hide(); }, 10000);
        }
        else {
        
        
            //Проверка регулярок
            var regCardErrors = [];
            for(var i = 0; i < arr1.length; ++i) 
                if(!(new RegExp("[0-9]{16}:[0-9]{2}\/[0-9]{4}:[0-9]{3}").test(arr1[i])))
                    regCardErrors.push(i + 1);
                    
            if(regCardErrors.length > 0){
                ErrorAlert.innerHTML = 'Проверьте введенные данные в строках: ' +regCardErrors;
                $('.error').show();
                setTimeout(function(){ $('.error').hide(); 
                }, 10000);
            }
            else {
                $('.close.addCardForm').trigger('click');
                SuccessAlert.innerHTML = 'Привязываем карты...';
                $('.success').show();
                
                var errors = [];
                var errorDescript = [];
                addCard(0);
                function addCard(i) {
                	if(i < arr.length) {
                		$('.warning').hide();
                		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
                		$('.success').show();
                		var accounts = [];
                		accounts.push(arr[i]);
                		$.ajax({
                			type : 'POST',
                			data : {
                			    numbers: accounts,
                			    cards: arr1[i],
                				first: "1"
                			},
                			url : "scripts/addCard.php",
                			success : function(data) {
                					data = JSON.parse(data);
                					if(data['error']) { 
                						errors.push(i+1);
                						if(data['error'][0] == "452")
                                        	errorDescript[0] = "требует смены пароля";
                                        else  if(data['error'][0] == "459")
                                        	errorDescript.push("селфи"); 
                                        else  if(data['error'][0] == "1885316") 
                                        	errorDescript.push("рекламный аккаунт деактивирован"); 
                                        else {
                                            if (typeof data['fatalError'] !== "undefined") 
                                                errorDescript.push((i+1) + " : " + data['fatalError']);
                                            else
                                            	errorDescript.push("неизвестная ошибка");
                                        }
                					}
                					addCard(i+1); 
                			},
                			error : function(xhr, err) {
                			}
                		});
                	}
                	else
                	{
                		if(errors.length == 0){
                		    document.querySelector('[name=addCardForms]').value = '';
                			reloadTables();
                			SuccessAlert.innerHTML = 'Готово!';
                			setTimeout(function(){ $('.success').hide(); }, 5000);
                		}
                		else {
                		    document.querySelector('[name=addCardForms]').value = '';
                			reloadTables();
                			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
                			$('.success').hide();
                			$('.warning').show();
                			setTimeout(function(){ $('.warning').hide(); }, 10000);
                		}
                	}
                };
            }
        }
    })
});



$(document).ready(function(){
    $("#refreshCabs").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.rk.active');
        var i;
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[1]);
            
        SuccessAlert.innerHTML = 'Обновляем рекламные кабинеты...';
        $('.success').show();
        
        
        var errors = [];
        var errorDescript = [];
        refreshCabs(0);
        function refreshCabs(i) {
        	if(i < arr.length) {
        		$('.warning').hide();
        		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
        		$('.success').show();
        		var accounts = [];
        		accounts.push(arr[i]);
        		$.ajax({
        			type : 'POST',
        			data : {
        			    numbers: accounts,
        				first: "1"
        			},
        			url : "scripts/refreshCabs.php",
        			
        			success : function(data) {
        					data = JSON.parse(data);
        					if(data['error']) { 
        						errors.push(i+1);
        						if(data['error'][0] == "452")
                                	errorDescript[0] = "требует смены пароля";
                                else  if(data['error'][0] == "459")
                                	errorDescript[1] = "селфи"; 
                                else
                                	errorDescript[2] = "неизвестная ошибка";
        					}
        					refreshCabs(i+1); 
        			},
        			error : function(xhr, err) {
        			}
        		});
        	}
        	else
        	{
        		if(errors.length == 0){
        			reloadTables();
        			SuccessAlert.innerHTML = 'Готово!';
        			setTimeout(function(){ $('.success').hide(); }, 5000);
        		}
        		else {
        			reloadTables();
        			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
        			$('.success').hide();
        			$('.warning').show();
        			setTimeout(function(){ $('.warning').hide(); }, 10000);
        		}
        	}
        };
        
        
    });
}); 







/////////////////////////////////////////////
         //КАМПАНИИ
/////////////////////////////////////////////




$(document).ready(function(){
    $("#refreshCampaigns").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.camp.active');
        var i;
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[1]);
        
        var errors = [];
        var errorDescript = [];
        SuccessAlert.innerHTML = 'Обновляем кампании...';
        $('.success').show();
        
        
        var errors = [];
        var errorDescript = [];
        startCampaigns(0);
        function startCampaigns(i) {
        	if(i < arr.length) {
        		$('.warning').hide();
        		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
        		$('.success').show();
        		var accounts = [];
        		accounts.push(arr[i]);
        		$.ajax({
        			type : 'POST',
        			data : {
                        numbers: arr,
                        date: document.querySelector('[name=date_campaigns_refresh]').value,
                        first: "1"
                    },
                    url : 'scripts/refreshCampaigns.php',
        			success : function(data) {
        					data = JSON.parse(data);
        					if(data['error']) { 
        						errors.push(i+1);
        						if(data['error'][0] == "452")
                                	errorDescript.push("требует смены пароля");
                                else  if(data['error'][0] == "459")
                                	errorDescript.push("селфи"); 
                            	else {
                                    if (typeof data['fatalError'] !== "undefined") 
                                        errorDescript.push((i+1) + " : " + data['fatalError']);
                                    else
                                    	errorDescript.push("неизвестная ошибка"); 
                                }
        					}
        					startCampaigns(i+1); 
        			},
        			error : function(xhr, err) {
        			}
        		});
        	}
        	else
        	{
        		if(errors.length == 0){
        			reloadTables();
        			SuccessAlert.innerHTML = 'Готово!';
        			setTimeout(function(){ $('.success').hide(); }, 5000);
        		}
        		else {
        			reloadTables();
        			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
        			$('.success').hide();
        			$('.warning').show();
        			setTimeout(function(){ $('.warning').hide(); }, 10000);
        		}
        	}
        };
    });
}); 




$(document).ready(function(){
    $("#startCampaigns").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.camp.active');
        var i;
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[1]);
        
        SuccessAlert.innerHTML = 'Запускаем кампании...';
        $('.success').show();
        
        
        var errors = [];
        var errorDescript = [];
        startCampaigns(0);
        function startCampaigns(i) {
        	if(i < arr.length) {
        		$('.warning').hide();
        		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
        		$('.success').show();
        		var accounts = [];
        		accounts.push(arr[i]);
        		$.ajax({
        			type : 'POST',
        			data : {
        			    numbers: accounts,
        				first: "1"
        			},
        			url : "scripts/startCampaigns.php",
        			success : function(data) {
        					data = JSON.parse(data);
        					if(data['error']) { 
        						errors.push(i+1);
        						if(data['error'][0] == "452")
                                	errorDescript[0] = "требует смены пароля";
                                else  if(data['error'][0] == "459")
                                	errorDescript.push("селфи"); 
                            	else  if(data['error'][0] == "1885316") 
                                	errorDescript.push("рекламный аккаунт деактивирован"); 
                                else {
                                    if (typeof data['fatalError'] !== "undefined") 
                                        errorDescript.push((i+1) + " : " + data['fatalError']);
                                    else
                                    	errorDescript.push("неизвестная ошибка");
                                }
        					}
        					startCampaigns(i+1); 
        			},
        			error : function(xhr, err) {
        			}
        		});
        	}
        	else
        	{
        		if(errors.length == 0){
        			reloadTables();
        			SuccessAlert.innerHTML = 'Готово!';
        			setTimeout(function(){ $('.success').hide(); }, 5000);
        		}
        		else {
        			reloadTables();
        			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
        			$('.success').hide();
        			$('.warning').show();
        			setTimeout(function(){ $('.warning').hide(); }, 10000);
        		}
        	}
        };
        
        
        
        
    });
}); 



$(document).ready(function(){
    $("#stopCampaigns").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.camp.active');
        var i;
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[1]);
        
        SuccessAlert.innerHTML = 'Останавливаем кампании...';
        $('.success').show();
        
        
        
        var errors = [];
        var errorDescript = [];
        stopCampaigns(0);
        function stopCampaigns(i) {
        	if(i < arr.length) {
        		$('.warning').hide();
        		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
        		$('.success').show();
        		var accounts = [];
        		accounts.push(arr[i]);
        		$.ajax({
        			type : 'POST',
        			data : {
        			    numbers: accounts,
        				first: "1"
        			},
        			url : "scripts/stopCampaigns.php",
        			success : function(data) {
        					data = JSON.parse(data);
        					if(data['error']) { 
        						errors.push(i+1);
        						if(data['error'][0] == "452")
                                	errorDescript[0] = "требует смены пароля";
                                else  if(data['error'][0] == "459")
                                	errorDescript.push("селфи"); 
                                else  if(data['error'][0] == "1885316") 
                                	errorDescript.push("рекламный аккаунт деактивирован"); 
                                else {
                                    if (typeof data['fatalError'] !== "undefined") 
                                        errorDescript.push((i+1) + " : " + data['fatalError']);
                                    else
                                    	errorDescript.push("неизвестная ошибка");
                                }
        					}
        					stopCampaigns(i+1); 
        			},
        			error : function(xhr, err) {
        			}
        		});
        	}
        	else
        	{
        		if(errors.length == 0){
        			reloadTables();
        			SuccessAlert.innerHTML = 'Готово!';
        			setTimeout(function(){ $('.success').hide(); }, 5000);
        		}
        		else {
        			reloadTables();
        			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
        			$('.success').hide();
        			$('.warning').show();
        			setTimeout(function(){ $('.warning').hide(); }, 10000);
        		}
        	}
        };
    });
}); 







/////////////////////////////////////////////
         //АДСЕТЫ
/////////////////////////////////////////////





$(document).ready(function(){
    $("#refreshAdsets").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.adset.active');
        var i;
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[1]);
        
        SuccessAlert.innerHTML = 'Обновляем адсеты...';
        $('.success').show();
        
        
        var errors = [];
        var errorDescript = [];
        refreshAdsets(0);
        function refreshAdsets(i) {
        	if(i < arr.length) {
        		$('.warning').hide();
        		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
        		$('.success').show();
        		var accounts = [];
        		accounts.push(arr[i]);
        		$.ajax({
        			type : 'POST',
        			data : {
        			    numbers: accounts,
        			    date: document.querySelector('[name=date_adsets_refresh]').value,
        				first: "1"
        			},
        			url : "scripts/refreshAdsets.php",
        			success : function(data) {
        					data = JSON.parse(data);
        					if(data['error']) { 
        						errors.push(i+1);
        						if(data['error'][0] == "452")
                                	errorDescript[0] = "требует смены пароля";
                                else  if(data['error'][0] == "459")
                                	errorDescript[1] = "селфи"; 
                                else
                                	errorDescript[2] = "неизвестная ошибка";
        					}
        					refreshAdsets(i+1); 
        			},
        			error : function(xhr, err) {
        			}
        		});
        	}
        	else
        	{
        		if(errors.length == 0){
        			reloadTables();
        			SuccessAlert.innerHTML = 'Готово!';
        			setTimeout(function(){ $('.success').hide(); }, 5000);
        		}
        		else {
        			reloadTables();
        			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
        			$('.success').hide();
        			$('.warning').show();
        			setTimeout(function(){ $('.warning').hide(); }, 10000);
        		}
        	}
        };
        
        
    });
}); 




$(document).ready(function(){
    $("#startAdsets").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.adset.active');
        var i;
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[1]);
        
        SuccessAlert.innerHTML = 'Запускаем адсеты...';
        $('.success').show();
        var errors = [];
        var errorDescript = [];
        startAdsets(0);
        function startAdsets(i) {
        	if(i < arr.length) {
        		$('.warning').hide();
        		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
        		$('.success').show();
        		var accounts = [];
        		accounts.push(arr[i]);
        		$.ajax({
        			type : 'POST',
        			data : {
        			    numbers: accounts,
        				first: "1"
        			},
        			url : "scripts/startAdsets.php",
        			success : function(data) {
        					data = JSON.parse(data);
        					if(data['error']) { 
        						errors.push(i+1);
        						if(data['error'][0] == "452")
                                	errorDescript[0] = "требует смены пароля";
                                else  if(data['error'][0] == "459")
                                	errorDescript.push("селфи"); 
                                else  if(data['error'][0] == "1885316") 
                                	errorDescript.push("рекламный аккаунт деактивирован"); 
                                else {
                                    if (typeof data['fatalError'] !== "undefined") 
                                        errorDescript.push((i+1) + " : " + data['fatalError']);
                                    else
                                    	errorDescript.push("неизвестная ошибка");
                                }
        					}
        					startAdsets(i+1); 
        			},
        			error : function(xhr, err) {
        			}
        		});
        	}
        	else
        	{
        		if(errors.length == 0){
        			reloadTables();
        			SuccessAlert.innerHTML = 'Готово!';
        			setTimeout(function(){ $('.success').hide(); }, 5000);
        		}
        		else {
        			reloadTables();
        			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
        			$('.success').hide();
        			$('.warning').show();
        			setTimeout(function(){ $('.warning').hide(); }, 10000);
        		}
        	}
        };
        
        
    });
}); 



$(document).ready(function(){
    $("#stopAdsets").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.adset.active');
        var i;
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[1]);
        
        SuccessAlert.innerHTML = 'Останавливаем адсеты...';
        $('.success').show();
        
        
        var errors = [];
        var errorDescript = [];
        stopAdsets(0);
        function stopAdsets(i) {
        	if(i < arr.length) {
        		$('.warning').hide();
        		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
        		$('.success').show();
        		var accounts = [];
        		accounts.push(arr[i]);
        		$.ajax({
        			type : 'POST',
        			data : {
        			    numbers: accounts,
        				first: "1"
        			},
        			url : "scripts/stopAdsets.php",
        			success : function(data) {
        					data = JSON.parse(data);
        					if(data['error']) { 
        						errors.push(i+1);
        						if(data['error'][0] == "452")
                                	errorDescript[0] = "требует смены пароля";
                                else  if(data['error'][0] == "459")
                                	errorDescript.push("селфи"); 
                                else  if(data['error'][0] == "1885316") 
                                	errorDescript.push("рекламный аккаунт деактивирован"); 
                                else {
                                    if (typeof data['fatalError'] !== "undefined") 
                                        errorDescript.push((i+1) + " : " + data['fatalError']);
                                    else
                                    	errorDescript.push("неизвестная ошибка");
                                }
        					}
        					stopAdsets(i+1); 
        			},
        			error : function(xhr, err) {
        			}
        		});
        	}
        	else
        	{
        		if(errors.length == 0){
        			reloadTables();
        			SuccessAlert.innerHTML = 'Готово!';
        			setTimeout(function(){ $('.success').hide(); }, 5000);
        		}
        		else {
        			reloadTables();
        			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
        			$('.success').hide();
        			$('.warning').show();
        			setTimeout(function(){ $('.warning').hide(); }, 10000);
        		}
        	}
        };
        
        
    });
}); 












/////////////////////////////////////////////
         //ОБЪЯВЛЕНИЯ
/////////////////////////////////////////////





$(document).ready(function(){
    $("#refreshAds").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.ad.active');
        var i;
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[4]);
            
        arr = Array.from(new Set(arr));
        
        
        SuccessAlert.innerHTML = 'Обновляем аккаунты...';
        $('.success').show();
        
        
        var errors = [];
        var errorDescript = [];
        refreshAds(0);
        function refreshAds(i) {
        	if(i < arr.length) {
        		$('.warning').hide();
        		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
        		$('.success').show();
        		var accounts = [];
        		accounts.push(arr[i]);
        		$.ajax({
        			type : 'POST',
        			data : {
        			    numbers: accounts,
        			    date: document.querySelector('[name=date_ads_refresh]').value,
        				first: "1"
        			},
        			url : "scripts/refreshAds.php",
        			success : function(data) {
        					data = JSON.parse(data);
        					if(data['error']) { 
        						errors.push(i+1);
        						if(data['error'][0] == "452")
                                	errorDescript[0] = "требует смены пароля";
                                else  if(data['error'][0] == "459")
                                	errorDescript[1] = "селфи"; 
                                else
                                	errorDescript[2] = "неизвестная ошибка";
        					}
        					refreshAds(i+1); 
        			},
        			error : function(xhr, err) {
        			}
        		});
        	}
        	else
        	{
        		if(errors.length == 0){
        			reloadTables();
        			SuccessAlert.innerHTML = 'Готово!';
        			setTimeout(function(){ $('.success').hide(); }, 5000);
        		}
        		else {
        			reloadTables();
        			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
        			$('.success').hide();
        			$('.warning').show();
        			setTimeout(function(){ $('.warning').hide(); }, 10000);
        		}
        	}
        };
    });
}); 




$(document).ready(function(){
    $("#startAds").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.ad.active');
        var i;
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[1]);
        
        SuccessAlert.innerHTML = 'Запускаем объявления...';
        $('.success').show();
        
        var errors = [];
        var errorDescript = [];
        startAds(0);
        function startAds(i) {
        	if(i < arr.length) {
        		$('.warning').hide();
        		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
        		$('.success').show();
        		var accounts = [];
        		accounts.push(arr[i]);
        		$.ajax({
        			type : 'POST',
        			data : {
        			    numbers: accounts,
        				first: "1"
        			},
        			url : "scripts/startAds.php",
        			success : function(data) {
        					data = JSON.parse(data);
        					if(data['error']) { 
        						errors.push(i+1);
        						if(data['error'][0] == "452")
                                	errorDescript[0] = "требует смены пароля";
                                else  if(data['error'][0] == "459")
                                	errorDescript.push("селфи"); 
                                else  if(data['error'][0] == "1885316") 
                                	errorDescript.push("рекламный аккаунт деактивирован"); 
                                else {
                                    if (typeof data['fatalError'] !== "undefined") 
                                        errorDescript.push((i+1) + " : " + data['fatalError']);
                                    else
                                    	errorDescript.push("неизвестная ошибка");
                                }
        					}
        					startAds(i+1); 
        			},
        			error : function(xhr, err) {
        			}
        		});
        	}
        	else
        	{
        		if(errors.length == 0){
        			reloadTables();
        			SuccessAlert.innerHTML = 'Готово!';
        			setTimeout(function(){ $('.success').hide(); }, 5000);
        		}
        		else {
        			reloadTables();
        			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
        			$('.success').hide();
        			$('.warning').show();
        			setTimeout(function(){ $('.warning').hide(); }, 10000);
        		}
        	}
        };
        
    });
}); 



$(document).ready(function(){
    $("#stopAds").click(function(e) {
        e.preventDefault();
        var arr = [];
        var tr = document.querySelectorAll('tr.ad.active');
        var i;
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[1]);
        
        SuccessAlert.innerHTML = 'Останавливаем объявления...';
        $('.success').show();
        
        var errors = [];
        var errorDescript = [];
        stopAds(0);
        function stopAds(i) {
        	if(i < arr.length) {
        		$('.warning').hide();
        		SuccessAlert.innerHTML = 'Обрабатываем аккаунт: '+(i+1);
        		$('.success').show();
        		var accounts = [];
        		accounts.push(arr[i]);
        		$.ajax({
        			type : 'POST',
        			data : {
        			    numbers: accounts,
        				first: "1"
        			},
        			url : "scripts/stopAds.php",
        			success : function(data) {
        					data = JSON.parse(data);
        					if(data['error']) { 
        						errors.push(i+1);
        						if(data['error'][0] == "452")
                                	errorDescript[0] = "требует смены пароля";
                                else  if(data['error'][0] == "459")
                                	errorDescript.push("селфи"); 
                                else  if(data['error'][0] == "1885316") 
                                	errorDescript.push("рекламный аккаунт деактивирован"); 
                                else {
                                    if (typeof data['fatalError'] !== "undefined") 
                                        errorDescript.push((i+1) + " : " + data['fatalError']);
                                    else
                                    	errorDescript.push("неизвестная ошибка");
                                }
        					}
        					stopAds(i+1); 
        			},
        			error : function(xhr, err) {
        			}
        		});
        	}
        	else
        	{
        		if(errors.length == 0){
        			reloadTables();
        			SuccessAlert.innerHTML = 'Готово!';
        			setTimeout(function(){ $('.success').hide(); }, 5000);
        		}
        		else {
        			reloadTables();
        			WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errors+ '. Ошибки: ' +errorDescript;
        			$('.success').hide();
        			$('.warning').show();
        			setTimeout(function(){ $('.warning').hide(); }, 10000);
        		}
        	}
        };
        
        
    });
}); 
















/////////////////////////////////////////////
         //ОСТАЛЬНЫЕ
/////////////////////////////////////////////


//<!-- Add Group scripts --> 

$(document).ready(function(){
    $("#addGroup").click(function(e) {
        e.preventDefault();
        if($("#groupName").val() != '') {
            $.ajax({
                type : 'POST',
                data : {
                    name : $("#groupName").val()
                },
                url : 'scripts/addGroup.php',
                success : function(data) {
                    if(data != -1 && data != -2) {
                        $('.close.group').trigger('click');
                        var file = JSON.parse(data);
                        $('.deleteGroupForm').html('');
                        $('.deleteGroupForm').innerHTML = '';
                        $('#groupAcc').html('');
                        $('#groupAcc').innerHTML = '';
                        $('#groupAcc').append('<option>Нет</option>');
                        for(var i = 0; i < file.length; ++i) {
                            $('.deleteGroupForm').append('<label class="new-control new-checkbox sq checkbox-primary" style="width:210px"><input type="checkbox" class="new-control-input deleteGroupCheckbox" value="'+file[i]+'"><span class="new-control-indicator"></span>'+file[i]+'</label>');
                            $('#groupAcc').append('<option>'+file[i]+'</option>');
                        }
                        
                        multiselectLoad();
                        
                        groupName.value = '';
                        SuccessAlert.innerHTML = 'Группа добавлена!';
                        $('.success').show();
                        setTimeout(function(){ $('.success').hide(); }, 5000);
                    }
                    else {
                        if(data == -1){
                            alert(data);
                            ErrorAlert.innerHTML = 'Ошибка! Группа не добавлена!';
                            $('.error').show();
                            setTimeout(function(){ $('.error').hide(); }, 5000);
                        }
                        if(data == -2){
                            ErrorAlert.innerHTML = 'Ошибка! Группа с таким именем существует!';
                            $('.error').show();
                            setTimeout(function(){ $('.error').hide(); }, 5000);
                        }
                    }
                },
                error : function(xhr, err) {
                }
            });
        }
        else {
            ErrorAlert.innerHTML = 'Имя группы не может быть пустым!';
            $('.error').show();
            setTimeout(function(){ $('.error').hide(); }, 5000);
        }
    });
});



//<!-- Delete Group scripts --> 

$(document).ready(function(){
    $("#deleteGroup").click(function(e) {
        e.preventDefault();
        var inp = document.querySelectorAll(".deleteGroupCheckbox");
        var i = 0;
        var arr = [];
        for(i = 0; i < inp.length; ++i)
            if(inp[i].checked)
                arr.push(inp[i].value);
                
        $.ajax({
            type : 'POST',
            data : {
                names : arr
            },
            url : 'scripts/deleteGroup.php',
            success : function(data) {
                if(data != -1) {
                    $('.close.deleteGroup').trigger('click');
                    var file = JSON.parse(data);
                    $('.deleteGroupForm').html('');
                    $('.deleteGroupForm').innerHTML = '';
                    $('#groupAcc').html('');
                    $('#groupAcc').innerHTML = '';
                    $('#groupAcc').append('<option>Нет</option>');
                    for(var i = 0; i < file.length; ++i) {
                        $('.deleteGroupForm').append('<label class="new-control new-checkbox sq checkbox-primary" style="width:210px"><input type="checkbox" class="new-control-input deleteGroupCheckbox" value="'+file[i]+'"><span class="new-control-indicator"></span>'+file[i]+'</label>');
                        $('#groupAcc').append('<option>'+file[i]+'</option>');
                    }
                    
                    multiselectLoad();
                    
                    SuccessAlert.innerHTML = 'Группы успешно удалены!';
                    $('.success').show();
                    setTimeout(function(){ $('.success').hide(); }, 5000);
                }
                else {
                    ErrorAlert.innerHTML = 'Ошибка! Группы не удалены!';
                    $('.error').show();
                    setTimeout(function(){ $('.error').hide(); }, 5000);
                }
            },
            error : function(xhr, err) {
            }
        });
    });
});


//<!-- Add Template scripts --> 

$(document).ready(function(){
    var parent = document.querySelector('#template_form');
    var child = parent.querySelector('a[href="#finish"]');
    child.id = "template_form_finish";
    $('#template_form_finish').click(function() {
        
        //Проверки
        ErrorAlert.innerHTML = createAdTemplateCheck("template_form", 0);
        if(ErrorAlert.innerHTML != ''){
            $('.error').show();
            setTimeout(function(){ $('.error').hide(); }, 10000);
        }
        else {
        
            var data = new FormData(template_form);
            $.ajax({
                url: 'scripts/addTemplate.php',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST', 
                success: function(data){
                    $('.close.template').trigger('click');
                    $('.deleteTemplateForm').html('');
                    $('.deleteTemplateForm').innerHTML = '';
                    var file = JSON.parse(data);
                    for(var i = 2; i < file.length; ++i)
                        if(file[i] != 'Нет.json')
                            $('.deleteTemplateForm').append('<label class="new-control new-checkbox sq checkbox-primary" style="width:210px"><input type="checkbox" class="new-control-input" value="'+file[i]+'"><span class="new-control-indicator"></span>'+file[i].split('.json')[0]+'</label>');
                    
                    
                    $('#template_select').html('');
                    $('#template_select').innerHTML = '';
                    $('#template_select').append('<option selected dropdown-item>Нет</option>');
                    
                    for(var i = 2; i < file.length; ++i) 
                        if(file[i] != 'Нет.json')
                            $('#template_select').append('<option value="'+file[i]+'" dropdown-item>'+file[i].split('.json')[0]+'</option>');
                    
                    SuccessAlert.innerHTML = 'Шаблон успешно добавлен!';
                    $('.success').show();
                    setTimeout(function(){ $('.success').hide(); }, 5000);
                }
            });
        }

    })
});



//<!-- Delete Template scripts --> 

$(document).ready(function(){
    $("#deleteTemplate").click(function(e) {
        e.preventDefault();
        var inp = document.querySelectorAll(".deleteTemplateCheckbox");
        var i = 0;
        var arr = [];
        for(i = 0; i < inp.length; ++i)
            if(inp[i].checked)
                arr.push(inp[i].value);
                
        $.ajax({
            type : 'POST',
            data : {
                names : arr
            },
            url : 'scripts/deleteTemplate.php',
            success : function(data) {
                if(data != -1) {
                    $('.close.deleteTemplate').trigger('click');
                    var file = JSON.parse(data);
                    //var file = data;
                    $('.deleteTemplateForm').html('');
                    $('.deleteTemplateForm').innerHTML = '';
                    for(var i = 0; i < file.length; ++i) 
                        if(file[i] != 'Нет.json')
                            $('.deleteTemplateForm').append('<label class="new-control new-checkbox sq checkbox-primary" style="width:210px"><input type="checkbox" class="new-control-input deleteTemplateCheckbox" value="'+file[i]+'"><span class="new-control-indicator"></span>'+file[i].split('.json')[0]+'</label>');
                    
                    
                    $('#template_select').html('');
                    $('#template_select').innerHTML = '';
                    $('#template_select').append('<option selected dropdown-item>Нет</option>');
                
                    for(var i = 0; i < file.length; ++i) 
                        $('#template_select').append('<option value="'+file[i]+'" dropdown-item>'+file[i].split('.json')[0]+'</option>');
                    
                    SuccessAlert.innerHTML = 'Шаблоны успешно удалены!';
                    $('.success').show();
                    setTimeout(function(){ $('.success').hide(); }, 5000);
                }
                else {
                    ErrorAlert.innerHTML = 'Ошибка! Шаблоны не удалены!';
                    $('.error').show();
                    setTimeout(function(){ $('.error').hide(); }, 5000);
                }
            },
            error : function(xhr, err) {
            }
        });
    });
});


//<!-- Add Proxy scripts --> 

$(document).ready(function(){
    $("#addProxy").click(function(e) {
        e.preventDefault();
        if($("#proxys").val() != '') {
            var s = $("#proxys").val();
            $.ajax({
                type : 'POST',
                data : {
                    proxys : $("#proxys").val()
                },
                url : 'scripts/addProxy.php',
                success : function(data) {
                    if(data != -1 && data.indexOf("-2") == -1) {
                        $('.close.proxy').trigger('click');
                        var file = JSON.parse(data);
                        $('.deleteProxyForm').html('');
                        $('.deleteProxyForm').innerHTML = '';
                        for(var i = 0; i < file.length; ++i)
                            $('.deleteProxyForm').append('<label class="new-control new-checkbox sq checkbox-primary" style="width:210px"><input type="checkbox" class="new-control-input deleteProxyCheckbox" value="'+file[i]+'"><span class="new-control-indicator"></span>'+file[i]+'</label>');
                        
                        
                        groupName.value = '';
                        SuccessAlert.innerHTML = 'Прокси успешно добавлены!';
                        $('.success').show();
                        setTimeout(function(){ $('.success').hide(); }, 5000);
                    }
                    else {
                        if(data == -1){
                            alert(data);
                            ErrorAlert.innerHTML = 'Ошибка! Поркси не добавлены!';
                            $('.error').show();
                            setTimeout(function(){ $('.error').hide(); }, 5000);
                        }
                        if(data.indexOf("-2") != -1){
                            data = data.replace('-2','');
                            $('.close.proxy').trigger('click');
                            var file = JSON.parse(data);
                            $('.deleteProxyForm').html('');
                            $('.deleteProxyForm').innerHTML = '';
                            for(var i = 0; i < file.length; ++i)
                            $('.deleteProxyForm').append('<label class="new-control new-checkbox sq checkbox-primary" style="width:210px"><input type="checkbox" class="new-control-input deleteProxyCheckbox" value="'+file[i]+'"><span class="new-control-indicator"></span>'+file[i]+'</label>');
                            WarningAlert.innerHTML = 'Часть прокси не были добавлены, так как уже присутсвуют в системе!';
                            $('.warning').show();
                            setTimeout(function(){ $('.warning').hide(); }, 5000);
                        }
                    }
                },
                error : function(xhr, err) {
                }
            });
        }
        else {
            ErrorAlert.innerHTML = 'Поле не может быть пустым!';
            $('.error').show();
            setTimeout(function(){ $('.error').hide(); }, 5000);
        }
    });
});



//<!-- Delete Group scripts --> 

$(document).ready(function(){
    $("#deleteProxy").click(function(e) {
        e.preventDefault();
        var inp = document.querySelectorAll(".deleteProxyCheckbox");
        var i = 0;
        var arr = [];
        for(i = 0; i < inp.length; ++i)
            if(inp[i].checked)
                arr.push(inp[i].value);
                
        $.ajax({
            type : 'POST',
            data : {
                proxys : arr
            },
            url : 'scripts/deleteProxy.php',
            success : function(data) {
                if(data != -1) {
                    $('.close.deleteProxy').trigger('click');
                    var file = JSON.parse(data);
                    $('.deleteProxyForm').html('');
                    $('.deleteProxyForm').innerHTML = '';
                    for(var i = 0; i < file.length; ++i)
                        $('.deleteProxyForm').append('<label class="new-control new-checkbox sq checkbox-primary" style="width:210px"><input type="checkbox" class="new-control-input deleteGroupCheckbox" value="'+file[i]+'"><span class="new-control-indicator"></span>'+file[i]+'</label>');
                    
                    SuccessAlert.innerHTML = 'Прокси успешно удалены!';
                    $('.success').show();
                    setTimeout(function(){ $('.success').hide(); }, 5000);
                }
                else {
                    ErrorAlert.innerHTML = 'Ошибка! Прокси не удалены!';
                    $('.error').show();
                    setTimeout(function(){ $('.error').hide(); }, 5000);
                }
            },
            error : function(xhr, err) {
            }
        });
    });
});









$(document).ready(function(){
    var parent = document.querySelector('#createAd_form');
    var child = parent.querySelector('a[href="#finish"]');
    child.id = "createAd_form_finish";
    $('#createAd_form_finish').click(function() {
         
         
        var data = new FormData(createAd_form);
        var arr = [];
        var tr = document.querySelectorAll('tr.rk.active');
        for(i = 0; i < tr.length; ++i)
            arr.push(tr[i].classList[1]);
        
        
        //Проверки
        ErrorAlert.innerHTML = cardChecks(arr);
        if(ErrorAlert.innerHTML != ''){
            ErrorAlert.innerHTML = "Ошибки в аккаунтах: " + cardChecks(arr);
            $('.error').show();
            setTimeout(function(){ $('.error').hide(); }, 10000);
        }
        else {
            
            ErrorAlert.innerHTML = createAdTemplateCheck("createAd_form", arr.length);
            if(ErrorAlert.innerHTML != ''){
                $('.error').show();
                setTimeout(function(){ $('.error').hide(); }, 10000);
            }
            else {
            
                $('.close.createAd').trigger('click');
                SuccessAlert.innerHTML = 'Запускаем рекламу...';
                $('.success').show();    
                
                var errors = [];
                var errorDescript = [];
                createAd(0);
                function createAd(i) {
                    if(i < arr.length) {
                        data.append('numbers', arr[i]); 
                        data.append('currentAcc', i);
                        $('.warning').hide();
                        SuccessAlert.innerHTML = 'Запускаем аккаунт: '+(i+1);
                        $('.success').show();  
                        $.ajax({
                            url: 'scripts/createAd/createAd.php',
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            //async: false,
                            method: 'POST',
                            type: 'POST', 
                            success: function(data){
                                data = JSON.parse(data);
                                if(!data['error']) { 
                                    $('.warning').hide();
                                    SuccessAlert.innerHTML = 'Реклама успешно запущена!';
                                    $('.success').show();
                                    //setTimeout(function(){ $('.success').hide(); }, 5000);
                                    createAd(i+1); 
                                }
                                else {
                                    $('.success').hide();
                                    WarningAlert.innerHTML = 'Ошибка в аккаунте:' +(i+1);
                                    $('.warning').show();
                                    errors.push(i+1);
                                    if(data['error'][0]['error']['error_subcode'] == "452") {
                                    	errorDescript.push("требует смены пароля");
                                    	createAd(i+1); 
                                    }
                                    else  if(data['error'][0]['error']['error_subcode'] == "459") {
                                    	errorDescript.push("селфи"); 
                                    	createAd(i+1); 
                                    }
                                    else  if(data['error'][0]['error']['error_subcode'] == "1885316") {
                                    	errorDescript.push("рекламный аккаунт деактивирован"); 
                                    	createAd(i+1); 
                                    }
                                    else {
                                        if (typeof data['fatalError'] !== "undefined") 
                                            errorDescript.push((i+1) + " : " + data['fatalError']);
                                        else
                                        	errorDescript.push("неизвестная ошибка");
                                        createAd(arr.length); 
                                    }
                                    //setTimeout(function(){ $('.warning').hide(); }, 5000);
                                }
                                
                            }
                        })
                    }
                    else
                    {
                        if(errors.length == 0){
                            reloadTables();
                            SuccessAlert.innerHTML = 'Готово!';
                            setTimeout(function(){ $('.success').hide(); }, 5000);
                        }
                        else {
                            reloadTables();
                            WarningAlert.innerHTML = 'Готово! Ошибки в аккаунтах: ' +errorDescript;
                            $('.success').hide();
                            $('.warning').show();
                            setTimeout(function(){ $('.warning').hide(); }, 10000);
                        }
                    }
                };
            }
        }
    })
});

