
<div class="table-responsive mb-4">
    <div class="widget-content widget-content-area">
        <table id="style-1" class="table style-2 table-hover">
            <thead>
                <tr>
                    <th class="checkbox-column" style="padding-right: 7px;"> Номер аккаунта </th>
                    <th class="text-center">Аккаунт</th>
                    <th class="text-center">Статус</th>
                    <th class="text-center">Действие</th>
                </tr>
            </thead>
            <tbody>
                    
                
              
                    <?php
                    include($_SERVER['DOCUMENT_ROOT'].'/connects.php'); 
                    $query = $link->query("SELECT * FROM Tokenbase");
                    $numb = 0;
                    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                        $_GET[$numb] = $row['number'];
                        ++$numb;
                        printf('<tr id="'.$row['number'].'" class="account '.$row['number'].'">
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
                                                    '.$row['acc_id'].'
                                                </div>
                                                <div class="form-group" style="font-size: 11px;">
                                                    '.$row['name'].'
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xl-4 mt-5">');
                                            
                        printf('                <div class="form-group">');
                        if($row['policy'] == "+")
                            printf('                <p style="font-size:10px;">Политика принята:<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check" style="color: #00bf1f"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                    </p>');
                        else 
                            printf('                <p style="font-size:10px;">Политика принята:<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check" style="color: #ba1f00"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </p>');
                        printf('                </div>');
                        printf('                <div class="form-group">');
                        if($row['fp'] == "+") {
                            $queryFp = $link->query("SELECT * FROM Fp_Id WHERE access_token='".$row['access_token']."'");
                            $rowFp = mysqli_fetch_array($queryFp, MYSQLI_ASSOC);
                            if($rowFp['is_published'] == '1')
                                printf('            <p style="font-size:10px;">Фанпейдж:<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check" style="color: #00bf1f"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                    </p>');
                                else
                                    printf('        <p style="font-size:10px;">Фанпейдж:<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash" style="color: #FFD700"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg>
                                                    </p>');
                            }
                            else
                                printf('            <p style="font-size:10px;">Фанпейдж:<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check" style="color: #ba1f00"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </p>'); 
                        
                        printf('                </div>');
                        
                        
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
                        ');
                        if($row['state'] == 'Active')
                            printf('<td class="account_state"><span class="shadow-none badge badge-primary">Active</span></td>');
                        if($row['state'] == 'Check Passwd')
                            printf('<td class="account_state"><span class="shadow-none badge badge-warning">Check Passwd</span></td>');
                        if($row['state'] == 'Selfy')
                            printf('<td class="account_state"><span class="shadow-none badge badge-danger">Selfy</span></td>');    
                    
                        printf('<td class="account_action">
                                    <div class="form-group">
                                        <form action="" method="POST">
                                            <button type="submit" name="deleteAcc" value="'.$row['number'].'" style="border: none; outline: none; background-color: white;">
                                            <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Удалить"><svg style="color:#ff225b;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg> </a>
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <form action="" method="POST">
                                            <button type="submit" name="refreshAcc" value="'.$row['number'].'" style="border: none; outline: none; background-color: white;">
                                            <a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Обновить"><svg style="color:#007bff;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></a>
                                        </form>
                                    </div>
                                </td>
                                </tr>');
                    }
                    ?>
            </tbody>
        </table>
    </div>
</div>


<script src="additional_load/account_buttons_reload.js"></script>