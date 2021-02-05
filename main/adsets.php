<div class="row layout-top-spacing layout-spacing">
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Адсеты</h4>
                    </div>
                </div>
            </div>
            
            <form action="" method="POST"> 
            
                <div class="container form-group"> 
                    <div class="row">
                        <div class="col-lg-2 col-xl-2 cabs_action">  
                            <div class="form-group"> 
                                <button type="submit" id="startAdsets" style="border: none; outline: none; background-color: white;">
                                <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Запустить выбранные адсеты"><svg style="color:#00bf1f;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg></a>
                            
                                <button type="submit" id="stopAdsets" style="border: none; outline: none; background-color: white;">
                                <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Остановить выбранные адсеты"><svg style="color:#e2a03f;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pause"><rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect></svg></a>
                            
                                </div>
                        </div>
                        
                        <div class="col-lg-5 col-xl-5">  
                            <div class="container"> 
                                <div class="row" hidden>
                                    <div class="col-lg-5 col-xl-5">  
                                        <p>Период обновления:</p> 
                                    </div>
                                    <div class="col-lg-6 col-xl-6">
                                        <select name="date_adsets_refresh" class="form-control basic">
                                            <option value="lifetime">Весь срок действия</option>
                                            <option selected value="today" >Сегодня</option>
                                            <option value="yesterday" >Вчера</option>
                                            <option value="last_7d" >За последние 7 дней</option>
                                            <option value="last_14d" >За последние 14 дней</option>
                                            <option value="last_30d" >За последние 30 дней</option>
                                            <option value="this_week_mon_today" >На этой неделе</option>
                                            <option value="last_week_mon_sun" >Прошлая неделя</option>
                                            <option value="this_month" >В этом месяце</option>
                                            <option value="last_month" >Прошлый месяц</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-1 col-xl-1">
                                        <button type="submit" id="refreshAdsets" style="border: none; outline: none; background-color: white;">
                                        <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Обновить выбранные адсеты"><svg style="color:#007bff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-xl-1"> 
                        </div>
                        <div class="col-lg-4 col-xl-4">  
                            <div class="form-group"> 
                                <div class="container"> 
                                    <div class="row" hidden>
                                        <div class="col-lg-4 col-xl-4">  
                                            <p>Сделать копий:</p> 
                                        </div>
                                        <div class="col-lg-5 col-xl-5">
                                            <input type="number" name="count_adsets_copies" class="form-control" placeholder="0">
                                        </div>
                                        <div class="col-lg-3 col-xl-3">
                                            <button type="submit" id="copyAdsets" style="border: none; outline: none; background-color: white;">
                                            <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Сделать копии выбранных адсетов"><svg style="color:#007bff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div> 
                        
                    </div>  
                </div> 
                
                <div id="adsets_tbody">
                       
                        <?php include("additional_load/adsets_load.php"); ?>
                    
                </div>
        
            </form>
        
        </div>
    </div>
</div>