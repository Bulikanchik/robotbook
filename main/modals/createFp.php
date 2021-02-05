<!-- fp modal -->
<div class="modal fade fp-modal" id="createFpModal" tabindex="-1" role="dialog" aria-labelledby="fpModalLabel" aria-hidden="true">
    <div class="modal-dialog addfpForm" role="document">
        <div class="modal-content">

                <div class="modal-header" id="fpModalLabel">
                    <h4 class="modal-title">Создать фанпейджи</h4>
                    <button type="button" class="close fp" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                </div>
          
         
                <div class="modal-body">
                    <div class="container"> 
                        <div class="row selectAccsFp">
                            <p>Выбрано аккаунтов: </p>    
                        </div>
                    </div>
                    <form class="mt-0" action="" method="POST">
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            Введите названия для фанпейджей:
                            <textarea rows="10" cols="45" type="text" class="form-control mb-2" name="fp_names" placeholder="Name"></textarea>
                            <small class="form-text text-muted">Ввводите каждое новое имя с новой строки</small>
                        </div>
                        <button id="addFp" type="submit" class="btn btn-primary mt-2 mb-2 btn-block">Создать</button>
                    </form>
    
                </div>
            
        </div>
    </div>
</div>