<div class="row layout-top-spacing layout-spacing">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Рекламные кабинеты</h4>
                    </div>
                </div>
            </div>
            
            <form action="" method="POST"> 
            
                <div class="container form-group"> 
                    <div class="row">
                        <div class="col-lg-3 col-xl-3 cabs_action">  
                            <div class="form-group"> 
                                <select id="cabs_action" class="form-control basic select_send_ajax">
                                    <option id="basic_action_cabs" disabled selected>Действия с аккаунтами</option>
                                    <option value="add_card" dropdown-item>Привязать карту</option>
                                    <option value="create_pixel" dropdown-item>Создать пиксель</option>
                                    <option value="change_currency" dropdown-item>Изменить валюту</option>
                                    
                                </select>
                            </div>
                        </div>  
                        <div class="col-lg-1 col-xl-1">  
                            <div class="form-group"> 
                                <button type="submit" id="refreshCabs" style="border: none; outline: none; background-color: white;">
                                <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Обновить выбранные аккаунты"><svg style="color:#007bff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></a>
                            </div>
                        </div>         
                        <div class="col-lg-4 col-xl-4">  
                            <div class="form-group"> 
                                <a id="createAdModalButton" aria-expanded="false" class="dropdown-toggle">
                                    <button class="btn btn-primary mt-2 mb-2 btn-block" style="margin-top: 0px !important;width: 70%;height: 45px;margin-bottom: 0px !important;">Запустить рекламу</button>
                                </a>
                                <a hidden id="createAd" aria-expanded="false" class="dropdown-toggle" data-toggle="modal" data-target="#createAdModal">
                                    <button class="btn btn-primary mt-2 mb-2 btn-block" style="margin-top: 0px !important;width: 70%;height: 45px;margin-bottom: 0px !important;">Запустить рекламу</button>
                                </a>
                            </div>
                        </div>  
                        <div class="col-lg-4 col-xl-4">  
                            <div class="form-group" hidden> 
                                <a id="addCardModalButton" aria-expanded="false" class="dropdown-toggle" data-toggle="modal" data-target="#addCardModal">
                                    <button class="btn btn-primary mt-2 mb-2 btn-block" style="margin-top: 0px !important;width: 70%;height: 45px;margin-bottom: 0px !important;">Привязать карту</button>
                                </a>
                            </div>
                            <div class="form-group" hidden> 
                                <a id="changeCurrencyModalButton" aria-expanded="false" class="dropdown-toggle" data-toggle="modal" data-target="#changeCurrencyModal">
                                    <button class="btn btn-primary mt-2 mb-2 btn-block" style="margin-top: 0px !important;width: 70%;height: 45px;margin-bottom: 0px !important;">Изменить валюту</button>
                                </a>
                            </div>
                        </div>  
                    </div>  
                </div> 
                
                <div id="cabs_tbody">
                       
                        <?php include("additional_load/cabs_load.php"); ?>
                    
                </div>
        
            </form>
        
        </div>
    </div>
</div>