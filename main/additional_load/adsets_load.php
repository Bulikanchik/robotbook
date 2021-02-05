<div class="table-responsive mb-4">
    <div class="widget-content widget-content-area">
        <table id="style-4" class="table style-2 table-hover">
            <thead>
                <tr>
                    <th class="checkbox-column" style="padding-right: 7px;"> Номер аккаунта </th>
                    <th class="text-center">Адсеты</th>
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
                        $queryAdset = $link->query("SELECT * FROM Adset_Id WHERE access_token='".$row['access_token']."'");
                        while($rowAdset = mysqli_fetch_array($queryAdset, MYSQLI_ASSOC)){
                            
                            $queryCamp = $link->query("SELECT * FROM Camp_Id WHERE camp_id='".$rowAdset['camp_id']."'");
                            $rowCamp = mysqli_fetch_array($queryCamp, MYSQLI_ASSOC);
                            
                            $queryRk = $link->query("SELECT * FROM Rk_Id WHERE rk_id='".$rowCamp['rk_id']."'");
                            $rowRk = mysqli_fetch_array($queryRk, MYSQLI_ASSOC);
                        
                     
                     
                        printf('<tr id="'.$rowCamp['camp_id'].'_'.$rowAdset['adset_id'].'_'.$row['number'].'" class="adset '.$rowAdset['adset_id'].' '.$rowCamp['camp_id'].' '.$rowCamp['rk_id'].' '.$row['number'].'">
                                <td class="checkbox-column"></td>
                                <td class="adset_info">
                                    <div class="container"> 
                                        <div class="row">
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <h6>'.$row['acc_name'].'</h6>
                                                </div>
                                                <div class="form-group">
                                                    '.$row['groups'].'
                                                </div>
                                                <div class="form-group" style="font-size: 11px;">
                                                    '.$rowAdset['adset_id'].'
                                                </div>
                                                <div class="form-group" style="font-size: 11px;">
                                                    '.$rowAdset['name'].'
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6 mt-4">
                                                <div class="form-group">
                                                    Последнее обновление аккаунта:
                                                </div>
                                                <div class="form-group">
                                                    '.date("d.m.Y H:i", strval($row['reftime'])).'<br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>');
                                    
                        printf('</td>
                         
                                <td class="adset_state">
                        ');
                        if($rowRk['state'] != 'ACTIVE' || $row['state'] != 'ACTIVE')
                            printf('
                                <span class="shadow-none badge badge-danger">ERROR</span>
                                </td>');
                        else {
                            if($rowAdset['state'] == 'ACTIVE')
                                printf('<span class="shadow-none badge badge-primary">Active</span></td>
                                        
                                ');
                            else if($rowAdset['state'] == 'PAUSED')
                                printf('<span class="shadow-none badge badge-warning">Paused</span></td>
                                        
                                ');
                            else 
                                printf('
                                    <span class="shadow-none badge badge-danger">'.$rowAdset['state'].'</span>
                                </td>');
                        }
                        printf('<td class="ad_action">
                                    <div class="form-group">
                                        <form action="" method="POST">
                                            <div class="form-group" hidden>
                                                <button type="submit" name="refreshAdset" value="'.$rowAdset['adset_id'].'" style="border: none; outline: none; background-color: white;">
                                                <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Обновить"><svg style="color:#007bff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></a>
                                             </div>
                                            <div class="form-group">
                                                <button type="submit" name="startAdset" value="'.$rowAdset['adset_id'].'" style="border: none; outline: none; background-color: white;">
                                                <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Запустить выбранные объявления"><svg style="color:#00bf1f;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg></a>
                                             </div>
                                            <div class="form-group">
                                                <button type="submit" name="stopAdset" value="'.$rowAdset['adset_id'].'" style="border: none; outline: none; background-color: white;">
                                                <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Остановить выбранные объявления"><svg style="color:#e2a03f;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pause"><rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect></svg></a>
                                            </div>
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

<script src="additional_load/adset_buttons_reload.js"></script>