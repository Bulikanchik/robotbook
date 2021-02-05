<!-- Register modal -->
<div class="modal fade register-modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1200px;">
        <div class="modal-content" style="margin-top: 25px;">

            <div class="modal-header" id="registerModalLabel">
                <h4 class="modal-title">Добавить аккаунт</h4>
                <button type="button" class="close account" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
            </div>
            
            <div class="modal-body">    
                <form class="mt-0 addAccModal" action="" method="POST">
                    <div class="widget-content widget-content-area">
                        <div id="circle-basic2" class="">
                            <h3>Массовое заполнение</h3>
                            <section>
                               <textarea id="account_main_input" rows="10" cols="5" type="text" class="form-control mb-2" name="main_input" placeholder="Название#Токен#User-Agent#Proxy#Комментарий"></textarea>
                                
                                <br>
                                <small class="form-text text-muted">
            Введите один или несколько аккаунтов через перенос строки.<br><br>
            Изначальный шаблон:<br>
            &nbsp;&nbsp;&nbsp;Название#Токен#User-Agent#Proxy#Комментарий<br>
            <br>
            Обязательные поля:<br>
            &nbsp;&nbsp;&nbsp;Название<br>
            &nbsp;&nbsp;&nbsp;Токен<br>
            Необязательные поля:<br>
            &nbsp;&nbsp;&nbsp;User-Agent<br>
            &nbsp;&nbsp;&nbsp;Proxy<br>
            &nbsp;&nbsp;&nbsp;Комментарий<br>
            <br>
            Если необязательные поля не нужны, оставьте пустые места там, где они должы быть.
            <br>
            <br>
            Примеры:<br>
            &nbsp;&nbsp;&nbsp;Название#Токен#User-Agent#Proxy#Комментарий<br>
            &nbsp;&nbsp;&nbsp;Название#Токен#User-Agent#Proxy#<br>
            &nbsp;&nbsp;&nbsp;Название#Токен#User-Agent##<br>
            &nbsp;&nbsp;&nbsp;Название#Токен###<br>
            <br>
            Шаблоны прокси:<br>
            &nbsp;&nbsp;&nbsp;http://192.168.0.1:8000@login:password
            &nbsp;&nbsp;&nbsp;http://192.168.0.1:8000
            &nbsp;&nbsp;&nbsp;socks5://192.168.0.1:8000@login:password
            &nbsp;&nbsp;&nbsp;socks5://192.168.0.1:8000
            <br>
            <br>
            </small>
                                <div class="form-group">
                                    Добавить в группу:
                                    <select id="groupAcc" class="form-control mb-2 basic" name="group">
                                        <option>Нет</option>
                                        <?php
                                        $handle = @fopen($_SERVER['DOCUMENT_ROOT']."/groups.txt", "r");
                                        while($str = fgets($handle))
                                            printf("
                                            <option>".$str."</option>
                                                ");
                                        ?>
                                    </select>
                                </div>
                            </section>
                            <h3>Предпросмотр</h3>
                            <section>
                                <div class="container" style="height:450px;overflow: auto;"> 
                                    <div class="row">
                                        <div class="col-lg-2 col-xl-2"><p>Имя</p></div>
                                        <div class="col-lg-2 col-xl-2"><p>Токен</p></div>
                                        <div class="col-lg-2 col-xl-2"><p>Uaer-Agent</p></div>
                                        <div class="col-lg-4 col-xl-4"><p>Прокси</p></div>
                                        <div class="col-lg-2 col-xl-2"><p>Комментарий</p></div>
                                    </div>
                                    <div class="row review">
                                    </div>
                                </div>
                            </section>  
                        </div>    
                    </div>
                </form>
            </div>
            
            
        </div>
    </div>
</div>