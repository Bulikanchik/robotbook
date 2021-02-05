<!-- addCardForm modal -->
<div class="modal fade addCardForm-modal" id="addCardModal" tabindex="-1" role="dialog" aria-labelledby="addCardFormModalLabel" aria-hidden="true">
    <div class="modal-dialog addaddCardFormForm" role="document">
        <div class="modal-content">

                <div class="modal-header" id="addCardFormModalLabel">
                    <h4 class="modal-title">Добавить карту</h4>
                    <button type="button" class="close addCardForm" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                </div>
          
                
                <div class="modal-body">
                    <form class="mt-0" action="" method="POST">
                        
                        <div class="container"> 
                            <div class="row selectAccsCard">
                                <p>Выбрано аккаунтов: </p>    
                            </div>
                        </div>
                        <div class="form-group">
                            Введите карты:
                            <textarea id="addCardForms" rows="10" cols="45" type="text" class="form-control mb-2" name="addCardForms" placeholder="XXXXXXXXXXXXXXXX:MM/YYYY:XXX"></textarea>
                            <small class="form-text text-muted">Шаблон:<br>
&nbsp;&nbsp;&nbsp;номер карты:месяц/год(4 цифры):cvc
&nbsp;&nbsp;&nbsp;XXXXXXXXXXXXXXXX:MM/YYYY:XXX
</small>
<small class="form-text text-muted">Вводите каждую новую карту с новой строки</small>
                        </div>
                        <button id="addCardForm" name="addCardForm" type="submit" class="btn btn-primary mt-2 mb-2 btn-block">Добавить карты</button>
                    </form>
    
                </div>
            
        </div>
    </div>
</div>