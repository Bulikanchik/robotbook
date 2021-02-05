<div class="table-responsive mb-4">
    <div class="widget-content widget-content-area">
        <table id="style-2" class="table style-2 table-hover">
            <thead>
                <tr>
                    <th class="checkbox-column" style="padding-right: 7px;"> Номер аккаунта </th>
                    <th class="text-center">Рекламный кабинет</th>
                    <th class="text-center">Статус</th>
                    <th class="text-center">Действие</th>
                </tr>
            </thead>
            <tbody>
                    
                
              
                    <?php
                    include($_SERVER['DOCUMENT_ROOT'].'/connects.php'); 
                    $query = $link->query("SELECT * FROM Tokenbase");
                    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                        $number = 0;
                        $queryRk = $link->query("SELECT * FROM Rk_Id WHERE access_token='".$row['access_token']."'");
                        while($rowRk = mysqli_fetch_array($queryRk, MYSQLI_ASSOC)){
                        
                     
                     
                        printf('<tr id="'.$row['number'].'_'.$rowRk['rk_id'].'" class="rk '.$rowRk['rk_id'].' '.$row['number'].'">
                                <td class="checkbox-column"></td>
                                <td class="account_info">
                                    <div class="container"> 
                                        <div class="row">
                                            <div class="col-lg-4 col-xl-4">
                                                <div class="form-group">
                                                    <h6>'.$row['acc_name'].'</h6>
                                                </div>
                                                <div class="form-group">
                                                    '.$row['groups'].'
                                                </div>
                                                <div class="form-group" style="font-size: 11px;">
                                                    '.$rowRk['rk_id'].'
                                                </div>
                                                <div class="form-group" style="font-size: 11px;">
                                                    '.$rowRk['name'].'
                                                </div>');
                        if($rowRk['pixel_id'] != '')
                        printf('                <div class="form-group" style="font-size: 11px;">
                                                    Pixel: '.$rowRk['pixel_id'].'
                                                </div>');
                        else
                        printf('                <p style="font-size:10px;">Pixel: <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check" style="color: #ba1f00"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </p>'); 
                        printf('            </div>
                                            <div class="col-lg-4 col-xl-4 mt-4">');
                                            
                        printf('               <div class="form-group" name="'.$rowRk['rk_id'].'" style="font-size: 15px;" >'.$rowRk['card'].'</div>
                                               <div class="form-group" style="font-size: 15px;">'.$rowRk['currency'].'</div>
                                               <div class="form-group" style="font-size: 15px;">'.$rowRk['adtrust_dsl'].'/'.$rowRk['threshold_amount'].'</div>');
                        
                        printf('            </div>
                                            <div class="col-lg-4 col-xl-4 mt-4">
                                                <div class="form-group">
                                                    Последнее обновление аккаунта:
                                                </div>
                                                <div class="form-group">
                                                    '.date("d.m.Y H:i", strval($row['reftime'])).'<br>
                                                </div>
                                            </div>
                                        
                                        
                                        </div>
                                    </div>
                                    
                                </td>
                                <td>
                        ');
                        if($rowRk['state'] == 'ACTIVE')
                            printf('<span name="'.$rowRk['rk_id'].'" class="shadow-none badge badge-primary">Active</span></td>
                                    
                            ');
                        else 
                            printf('
                                <span name="'.$rowRk['rk_id'].'" class="shadow-none badge badge-danger">'.$rowRk['state'].'</span>
                                <br>
                                <br>
                                <span name="'.$rowRk['rk_id'].'" class="shadow-none badge badge-danger">'.$rowRk['disable_reason'].'</span>
                            </td>');
                            
                        printf('<td class="account_action">
                                    <div class="form-group">
                                        <form action="" method="POST">
                                            <button type="submit" name="refreshRk" value="'.$rowRk['rk_id'].'" style="border: none; outline: none; background-color: white;">
                                            <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Обновить"><svg style="color:#007bff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></a>
                                        </form>
                                    </div>
                                </td>
                                </tr>');
                        ++$number;    
                        }
                    }
                    ?>
            </tbody>
        </table>
    </div>
</div>

<script src="additional_load/cab_buttons_reload.js"></script>
