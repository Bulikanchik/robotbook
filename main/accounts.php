<div class="row layout-top-spacing layout-spacing">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Аккаунты</h4>
                    </div>
                </div>
            </div>
            
            <form action="" method="POST"> 
            
                <div class="container form-group"> 
                    <div class="row">
                        <div class="col-lg-4 col-xl-4 accounts_action">  
                            <div id="select_accounts" class="form-group"> 
                                <select id="accounts_action" class="form-control basic">
                                    <option selected disabled id="basic_action_accounts">Действия с аккаунтами</option>
                                    <option id="apply_policy" value="apply_policy">Принять политику</option>
                                    <option id="create_fp" value="create_fp">Создать фанпейдж</option>
                                    <option id="publish_fp" value="publish_fp">Опубликовать фанпейдж</option>
                                </select>
                            </div>
                        </div>  
                        <div class="col-lg-4 col-xl-4">  
                            <div class="form-group"> 
                                <button type="submit" id="refreshAccounts" style="border: none; outline: none; background-color: white;">
                                <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Обновить выбранные аккаунты"><svg style="color:#007bff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></a>
                            
                                <button type="submit" id="deleteAccounts" style="border: none; outline: none; background-color: white;">
                                <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Удалить выбранные аккаунты"><svg style="color:#ff225b;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                            </div>
                        </div> 
                        <div class="col-lg-4 col-xl-4">  
                            <div class="form-group" hidden> 
                                <a id="createFpModalButton" aria-expanded="false" class="dropdown-toggle" data-toggle="modal" data-target="#createFpModal">
                                    <button class="btn btn-primary mt-2 mb-2 btn-block" style="margin-top: 0px !important;width: 70%;height: 45px;margin-bottom: 0px !important;">Создать фанпейдж</button>
                                </a>
                            </div>
                        </div>  
                                       
                    </div>  
                </div> 
                
                <div id="accounts_tbody">
                       
                        <?php include("additional_load/accounts_load.php"); ?>
                    
                </div>
        
            </form>
        
        </div>
    </div>
</div>