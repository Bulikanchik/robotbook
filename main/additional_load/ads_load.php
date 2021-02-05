<div class="table-responsive mb-4">
    <div class="widget-content widget-content-area">
        <table id="style-5" class="table style-2 table-hover">
            <thead>
                <tr>
                    <th class="checkbox-column" style="padding-right: 7px;"> Номер аккаунта </th>
                    <th class="text-center">Объявление</th>
                    <th class="text-center">Статистика</th>
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
                        $queryAd = $link->query("SELECT * FROM Ad_Id WHERE access_token='".$row['access_token']."'");
                        while($rowAd = mysqli_fetch_array($queryAd, MYSQLI_ASSOC)){
                            $queryAdset = $link->query("SELECT * FROM Adset_Id WHERE adset_id='".$rowAd['adset_id']."'");
                            $rowAdset = mysqli_fetch_array($queryAdset, MYSQLI_ASSOC);
                            
                            $queryCamp = $link->query("SELECT * FROM Camp_Id WHERE camp_id='".$rowAdset['camp_id']."'");
                            $rowCamp = mysqli_fetch_array($queryCamp, MYSQLI_ASSOC);
                            
                            $queryRk = $link->query("SELECT * FROM Rk_Id WHERE rk_id='".$rowCamp['rk_id']."'");
                            $rowRk = mysqli_fetch_array($queryRk, MYSQLI_ASSOC);
                        
                     
                     
                        printf('<tr id="'.$rowAd['adset_id'].'_'.$rowAd['ad_id'].'_'.$row['number'].'" class="ad '.$rowAd['ad_id'].' '.$rowAd['adset_id'].' '.$rowCamp['camp_id'].' '.$rowRk['rk_id'].' '.$row['number'].'">
                                <td class="checkbox-column"></td>
                                <td class="ad_info">
                                    <div class="form-group">
                                        <h6>'.$row['acc_name'].'</h6>
                                    </div>
                                    <div class="form-group">
                                        '.$row['groups'].'
                                    </div>
                                    <div class="form-group" style="font-size: 11px;">
                                        '.$rowAd['ad_id'].'
                                    </div>
                                    <div class="form-group" style="font-size: 11px;">
                                        '.$rowAd['name'].'
                                    </div>
                                    <div class="form-group" style="font-size: 11px;">
                                        '.$rowAd['link'].'
                                    </div>
                                    ');
                        
                                    
                        printf('</td>
                        
                        
                        <td>');
                        echo '<div class="form-group">
                            <span><img src="'.$rowAd['creative'].'" class="rounded-circle profile-img"></span>
                        </div>';
                        printf('<table bordercolor="white">
                            <tr>
                                <td>
                                    <span style="font-weight: bold;">Impressions</span>
                                </td> 
                                <td>
                                    <span style="font-weight: bold;">Clicks</span>
                                </td>
                                <td>
                                    <span style="font-weight: bold;">Results</span>
                                </td>
                                <td>
                                    <span style="font-weight: bold;">Spend</span>
                                </td>
                                <td>
                                    <span style="font-weight: bold;">CPL</span>
                                </td> 
                                <td>
                                    <span style="font-weight: bold;">CTR</span>
                                </td>
                                <td>
                                    <span style="font-weight: bold;">CPM</span>
                                </td> 
                                <td>
                                    <span style="font-weight: bold;">CPC</span>
                                </td>
                            </tr>
                            <tr>
                            <td>
                                <span>'.$rowAd['impressions'].'</span>
                            </td>
                            <td>
                                <span>'.$rowAd['clicks'].'</span>
                            </td>
                            <td>
                                <span>'.$rowAd['results'].'</span>
                            </td>
                            <td>
                                <span>'.$rowAd['spend'].'</span>
                            </td>
                            <td>
                                <span>'.$rowAd['cpl'].'</span>
                            </td>
                            <td>
                                <span>'.$rowAd['ctr'].'</span>
                            </td>
                            <td>
                                <span>'.$rowAd['cpm'].'</span>
                            </td>
                            <td>
                                <span>'.$rowAd['cpc'].'</span>
                            </td>
                            
                        </table>
                        
                    </td>  
                        
                        
                        
                                <td class="ad_state">
                        ');
                        if($rowRk['state'] != 'ACTIVE' || $row['state'] != 'ACTIVE')
                            printf('
                                <span class="shadow-none badge badge-danger">ERROR</span>
                                </td>');
                        else {
                            if($rowAd['state'] == 'ACTIVE')
                                printf('<span class="shadow-none badge badge-primary">Active</span></td>
                                        
                                ');
                            else if($rowAd['state'] == 'PAUSED')
                                printf('<span class="shadow-none badge badge-warning">Paused</span></td>
                                        
                                ');
                            else if($rowAd['state'] == 'PENDING_REVIEW')
                                printf('<span class="shadow-none badge badge-warning">PENDING_REVIEW</span></td>
                                        
                                ');
                            else if($rowAd['state'] == 'IN_PROCESS')
                                printf('<span class="shadow-none badge badge-warning">IN_PROCESS</span></td>
                                        
                                ');
                            else 
                                printf('
                                    <span class="shadow-none badge badge-danger">'.$rowAd['state'].'</span>
                                    <br>
                                    <br>
                                    <span class="shadow-none badge badge-danger">'.$rowAd['disable_reason'].'</span>
                                </td>');
                        }        
                        printf('<td class="ad_action">
                                    <div class="form-group">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <button type="submit" name="refreshAd" value="'.$rowRk['rk_id'].'" style="border: none; outline: none; background-color: white;">
                                                <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Обновить"><svg style="color:#007bff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></a>
                                             </div>
                                            <div class="form-group">
                                                <button type="submit" name="startAd" value="'.$rowAd['ad_id'].'" style="border: none; outline: none; background-color: white;">
                                                <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Запустить выбранные объявления"><svg style="color:#00bf1f;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg></a>
                                             </div>
                                            <div class="form-group">
                                                <button type="submit" name="stopAd" value="'.$rowAd['ad_id'].'" style="border: none; outline: none; background-color: white;">
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

<script src="additional_load/ad_buttons_reload.js"></script>