<?php
include($_SERVER['DOCUMENT_ROOT'].'/main/currency.php');
?>
<!-- changeCurrency modal -->
<div class="modal fade changeCurrency-modal" id="changeCurrencyModal" tabindex="-1" role="dialog" aria-labelledby="changeCurrencyModalLabel" aria-hidden="true">
    <div class="modal-dialog changeCurrencyForm" role="document">
        <div class="modal-content">

                <div class="modal-header" id="changeCurrencyModalLabel">
                    <h4 class="modal-title">Изменить валюту</h4>
                    <button type="button" class="close changeCurrency" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                </div>
          
                
                <div class="modal-body">
                    <div class="container"> 
                        <div class="row selectAccsCurrency">
                            <p>Выбрано аккаунтов: </p>    
                        </div>
                    </div>
                    <form action="" method="POST">
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            Выберите валюту:
                            <select name="currency" class="form-control form-small">
                                                         
                                <?php 
                                foreach ($currency as $value)
                                    printf("<option value='{$value}'>{$value}</option>  ");
                                ?>
                            </select>
                            
                        </div>
                        <div class="form-group mb-6">
                            <small class="form-text text-muted">Выбранная валюта будет установлена на отмеченные аккаунты</small>
                        </div>
                           
                        <button id="changeCurrency" type="submit" class="btn btn-primary mt-2 mb-2 btn-block">Применить</button>
                    </form>
    
                </div>
            
        </div>
    </div>
</div>