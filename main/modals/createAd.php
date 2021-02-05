<?php
include($_SERVER['DOCUMENT_ROOT'].'/main/geo.php');
?>
<!-- createAd Modal -->
<div class="modal fade register-modal" id="createAdModal" tabindex="-1" role="dialog" aria-labelledby="createAdModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1200px;">
        <div class="modal-content" style="margin-top: 20px;">
    
            <div class="modal-header" id="createAdModalLabel">
                <h4 class="modal-title">Запустить рекламу</h4>
                <button type="button" class="close createAd" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
            </div>
          
            <div class="modal-body">
                <form id="createAd_form" class="mt-0" action="" method="POST" enctype='multipart/form-data'>
                    <input name="stage" type="text" value="" hidden>
                    <div class="container"> 
                        <div class="row selectAccs">
                            <p>Выбрано аккаунтов: </p>    
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div id="circle-basic1" class="">
                            
                            
                            
                            <h3>Основные настройки</h3>
                            <section>
                                <div class="container"> 
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <p>Выберите шаблон</p>
                                                    <select id="template_select" class="form-control basic">
                                                        <?php
                                                        $dir = $_SERVER['DOCUMENT_ROOT'].'/main/templates';
                                                         
                                                        $f = scandir($dir);
                                                        unset($f[0],$f[1]);
                                                        
                                                        foreach ($f as $file){
                                                            if(explode('.json', $file)[0] != 'Нет')
                                                            printf('
                                                                <option value="'.$file.'" dropdown-item>'.explode('.json', $file) [0].'</option>
                                                                ');
                                                            else
                                                                printf('
                                                                <option selected value="'.$file.'" dropdown-item>'.explode('.json', $file) [0].'</option>
                                                                ');
                                                        }
                                                        ?>
                                                    </select>
                                                    <small class="form-text text-muted"></small>
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4">
                                            <div class="form-group mainSettings">
                                                <input type="text" name="camp_name" class="form-control" placeholder="Имя кампании">
                                                <small class="form-text text-muted">Введите имя кампании</small>
                                                <small class="form-text text-muted"></small>
                                            </div>
                                            <div class="form-group mainSettings">
                                                <input type="text" name="adset_name" class="form-control" placeholder="Имя адсета">
                                                <small class="form-text text-muted">Введите имя адсета</small>
                                                <small class="form-text text-muted"></small>
                                            </div>
                                            <div class="form-group mainSettings">
                                                <input type="text" name="ad_name" class="form-control" placeholder="Имя рекламы">
                                                <small class="form-text text-muted">Введите имя рекламы</small>
                                                <small class="form-text text-muted"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4">
                                            <div class="form-group mainSettings">
                                                <p>Кампания     /     Адсет     /     Объявление</p>
                                                <label class="switch s-primary  mb-4 mr-2" style="margin: 0px 14px !important;">
                                                    <input name='campaign_status' value='ACTIVE' checked type="checkbox" hidden>
                                                    <span class="slider round"></span>
                                                </label>
                                                
                                                <label class="switch s-primary  mb-4 mr-2" style="margin: 0px 14px !important;">
                                                    <input name='adset_status' value='ACTIVE' checked type="checkbox" hidden>
                                                    <span class="slider round"></span>
                                                </label>
                                                
                                                <label class="switch s-primary  mb-4 mr-2" style="margin: 0px 14px !important;">
                                                    <input name='ad_status' value='ACTIVE' checked type="checkbox" hidden>
                                                    <span class="slider round"></span>
                                                </label>
                                                
                                                <small class="form-text text-muted" style="margin-left: 40px;">Активно/Остановлено</small>
                                            </div>
                                            <div class="form-group mainSettings">
                                                <select name="place_daily_budget" class="form-control basic">
                                                    <option value="campaign_daily_budget" dropdown-item>Кампания</option>
                                                    <option value="adset_daily_budget" dropdown-item>Группа объявлений</option>
                                                </select>
                                                <small class="form-text text-muted">Куда устанавливать дневной бюджет?</small>
                                            </div>
                                            
                                            <div class="form-group mainSettings">
                                                <input type="number" name="daily_budget" class="form-control" placeholder="50">
                                                <small class="form-text text-muted">Дневной бюджет</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4">
                                            <div class="form-group mainSettings">
                                                <select name="objective" class="ad_template form-control basic">
                                                    <option selected value='CONVERSIONS' dropdown-item>Конверсии</option>
                                                    <option value='LINK_CLICKS' dropdown-item>Траффик</option>
                                                </select>
                                            </div>
                                            <div class="form-group mainSettings">
                                                <select name="bid_strategy" class="ad_template form-control basic">
                                                    <option value='LOWEST_COST_WITHOUT_CAP' dropdown-item >Минимальная цена</option>
                                                    <option value='LOWEST_COST_WITH_BID_CAP' dropdown-item>Предельная ставка</option>
                                                    <!--<option value='TARGET_COST' dropdown-item>Целевая цена</option>-->
                                                    <option value='COST_CAP' dropdown-item>Предельная цена</option>
                                                </select>
                                                <small class="form-text text-muted">Ставка</small>
                                            </div>
                                            <div class="form-group mainSettings">
                                                <input disabled type="number" name='bid_amount' class="ad_template form-control" placeholder="0">
                                                <small class="form-text text-muted">Бюджет ставки</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            
                            
                            <h3>Таргетинг</h3>
                            <section>
                                <div class="container"> 
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <p>Детальный таргетинг</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="row">
                                                <div class="col-lg-4 col-xl-4">
                                                </div>
                                                <div class="col-lg-4 col-xl-4">
                                                    <select name="genders" class="form-control basic">
                                                        <option selected dropdown-item value='0'>Все</option>
                                                        <option dropdown-item value='1'>Мужчины</option>
                                                        <option dropdown-item value='2'>Женщины</option>
                                                    </select>
                                                    <small class="form-text text-muted">Пол</small>
                                                </div>
                                                <div class="col-lg-4 col-xl-4">
                                                </div>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <p>Возраст</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-xl-6">
                                                        <input type="number" name='age_min' class="form-control" placeholder="20">
                                                        <small class="form-text text-muted">Минимальный возраст</small>
                                                    </div>
                                                    <div class="col-lg-6 col-xl-6">
                                                        <input type="number" name='age_max' class="form-control" placeholder="65">
                                                        <small class="form-text text-muted">Максимальный возраст</small>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="row">
                                                    <p>Страны</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-xl-6">
                                                        <select placeholder="Страна" name="countries[]" class="form-control form-small countries tagging" multiple="multiple">
                                                            <?php 
                                                            foreach ($countries as $value)
                                                                printf("<option value='{$value['country_code']}'>{$value['name']}</option>  ");
                                                            ?>
                                                        </select>
                                                        <small class="form-text text-muted">Включить</small>
                                                    </div>
                                                    <div class="col-lg-6 col-xl-6" hidden>
                                                        <select disabled placeholder="Страна" name="ex_countries[]" class="form-control form-small" multiple="multiple">
                                                            <?php 
                                                            foreach ($countries as $value)
                                                                printf("<option value='{$value['country_code']}'>{$value['name']}</option>  ");
                                                            ?>
                                                        </select>
                                                        <small class="form-text text-muted">Исключить</small>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group"hidden>
                                                <div class="row">
                                                    <p>Регионы</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-xl-6">
                                                        <select disabled name="regions[]" class="form-control form-small" multiple="multiple">
                                                            <?php 
                                                            foreach ($countries as $value)
                                                                printf("<option value='{$value['country_code']}'>{$value['name']}</option>  ");
                                                            ?>
                                                        </select>
                                                        <small class="form-text text-muted">Включить</small>
                                                    </div>
                                                    <div class="col-lg-6 col-xl-6">
                                                        <select disabled name="ex_regions[]" class="form-control form-small" multiple="multiple">
                                                            <?php 
                                                            foreach ($countries as $value)
                                                                printf("<option value='{$value['country_code']}'>{$value['name']}</option>  ");
                                                            ?>
                                                        </select>
                                                        <small class="form-text text-muted">Исключить</small>
                                                    </div>
                                                </div>
                                            </div>    
                                                
                                                
                                            <div class="row" hidden>
                                                <p>Города</p>
                                            </div>
                                            <div class="row" hidden>
                                                <div class="col-lg-6 col-xl-6">
                                                    <select disabled name="cities[]" class="form-control form-small" multiple="multiple">
                                                        <?php 
                                                        foreach ($countries as $value)
                                                            printf("<option value='{$value['country_code']}'>{$value['name']}</option>  ");
                                                        ?>
                                                    </select>
                                                    <small class="form-text text-muted">Включить</small>
                                                </div>
                                                <div class="col-lg-6 col-xl-6">
                                                    <select disabled name="ex_cities[]" class="form-control form-small" multiple="multiple">
                                                        <?php 
                                                        foreach ($countries as $value)
                                                            printf("<option value='{$value['country_code']}'>{$value['name']}</option>  ");
                                                        ?>
                                                    </select>
                                                    <small class="form-text text-muted">Исключить</small>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12">
                                                    <div class="form-group">
                                                        <p>Местоположение</p>
                                                        <select name="location_types" class="form-control basic">
                                                            <option value="recent and home" selected dropdown-item>Живущие здесь или недавние посетители</option>
                                                            <option value="home" dropdown-item>Люди, живущие здесь</option>
                                                            <option value="recent" dropdown-item>Недавние посетители</option>
                                                            <option value="travel_in" dropdown-item>Путешественники</option>
                                                        </select>
                                                        <small class="form-text text-muted">Кнопка</small>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                    <div class="col-lg-6 col-xl-6">
                                        <div hidden>
                                        <div class="row">
                                            <p>Интересы</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <select name="interests[]" class="form-control flatpickr flatpickr-input active">
                                                        
                                                    </select>
                                                    <small class="form-text text-muted">Включить</small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <select name="ex_interests[]" class="form-control flatpickr flatpickr-input active">
                                                        
                                                    </select>
                                                    <small class="form-text text-muted">Исключить</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <p>Регионы</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <select name="behaviors[]" class="form-control flatpickr flatpickr-input active">
                                                        
                                                    </select>
                                                    <small class="form-text text-muted">Включить</small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <select name="ex_behaviors[]" class="form-control flatpickr flatpickr-input active">
                                                        
                                                    </select>
                                                    <small class="form-text text-muted">Исключить</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <p>Языки</p>
                                                <select name="languages[]" class="form-control flatpickr flatpickr-input active">
                                                    <option></option>
                                                </select>
                                                <small class="form-text text-muted">Оставьте пустым, если нужны все языки</small>
                                            </div>
                                        </div>
                                            </div>
                                    
                                    
                                     </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12 mt-5">
                                            <div class="form-group">
                                                <p>Оптимизация по клику</p>
                                                <select name="attribution_spec" class="ad_template form-control basic">
                                                    <option value="1 click" selected dropdown-item>1 день после клика</option>
                                                    <option value="7 click" dropdown-item>7 дней после клика</option>
                                                    <option value="1 click 1 view" dropdown-item>1 день после клика или просмотра</option>
                                                    <option value="7 click 1 view" dropdown-item>7 дней после клика или 1 день после просмотра</option>
                                                </select>
                                                <small class="form-text text-muted">Кнопка</small>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    </div>
                                    </div>
                                </div>
                                    
                            </section> 
                            
                            
                            
                            <h3>Плейсменты и устройства</h3>
                            <section>
                                <div class="container"> 
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <p>Авто-плейсменты</p>
                                                <label class="switch s-primary">
                                                    <input name='targeting_optimization' value='targeting_optimization' class="ad_template" checked type="checkbox" hidden>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ad_auto_placement_children">
                                        <div class="row">
                                            <div class="col-lg-5 col-xl-5">
                                                <div class="form-group">
                                                    <p>Девайсы</p>
                                                    <div class="container"> 
                                                        <div class="row">
                                                            <div class="col-lg-6 col-xl-6">
                                                                <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary">
                                                                    <input checked name='mobile' value='mobile' type="checkbox" class="ad_template new-control-input">
                                                                    <span class="new-control-indicator"></span><span class="new-chk-content">Мобильная</span>
                                                                </label>
                                                            </div>
                                                            <div class="col-lg-6 col-xl-6">
                                                                <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary">
                                                                    <input checked name='desktop' value='desktop' type="checkbox" class="new-control-input">
                                                                    <span class="new-control-indicator"></span><span class="new-chk-content">Десктопная</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                     
                                                <div class="ad_mobile_children">     
                                                    <div class="form-group">
                                                        <div class="container"> 
                                                            <div class="row">
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <p>IOS</p>
                                                                    <label class="switch s-primary">
                                                                        <input name='IOS' value='IOS' class="ad_template" checked type="checkbox" hidden>
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="ad_ios_box">
                                                        <div class="form-group">
                                                            <div class="container"> 
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-xl-4">
                                                                        <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary">
                                                                            <input checked name='iPhone' value='iPhone' type="checkbox" class="new-control-input">
                                                                            <span class="new-control-indicator"></span><span class="new-chk-content">iPhone</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-xl-4">
                                                                        <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary">
                                                                            <input checked name='iPad' value='iPad' type="checkbox" class="new-control-input">
                                                                            <span class="new-control-indicator"></span><span class="new-chk-content">iPad</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-lg-4 col-xl-4">
                                                                        <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary">
                                                                            <input checked name='iPod' value='iPod' type="checkbox" class="new-control-input">
                                                                            <span class="new-control-indicator"></span><span class="new-chk-content">iPod</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="container"> 
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        <select name="ios_version1" class="form-control basic">
                                                                            <option value="2.0" selected dropdown-item>Любая (2.0≥)</option>
                                                                            <option value="3.0" dropdown-item>3.0</option>
                                                                            <option value="4.0" dropdown-item>4.0</option>
                                                                            <option value="4.3" dropdown-item>4.3</option>
                                                                            <option value="5.0" dropdown-item>5.0</option>
                                                                            <option value="6.0" dropdown-item>6.0</option>
                                                                            <option value="7.0" dropdown-item>7.0</option>
                                                                            <option value="8.0" dropdown-item>8.0</option>
                                                                            <option value="9.0" dropdown-item>9.0</option>
                                                                            <option value="10.0" dropdown-item>10.0</option>
                                                                            <option value="11.0" dropdown-item>11.0</option>
                                                                            <option value="12.0" dropdown-item>12.0</option>
                                                                            <option value="13.0" dropdown-item>13.0</option>
                                                                            <option value="14.0" dropdown-item>14.0</option>
                                                                        </select>
                                                                        <small class="form-text text-muted">От</small>
                                                                    </div>
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        <select name="ios_version2" class="form-control basic">
                                                                            <option value="14.0" selected dropdown-item>Любая (≤14.0)</option>
                                                                            <option value="2.0" dropdown-item>2.0</option>
                                                                            <option value="3.0" dropdown-item>3.0</option>
                                                                            <option value="4.0" dropdown-item>4.0</option>
                                                                            <option value="4.3" dropdown-item>4.3</option>
                                                                            <option value="5.0" dropdown-item>5.0</option>
                                                                            <option value="6.0" dropdown-item>6.0</option>
                                                                            <option value="7.0" dropdown-item>7.0</option>
                                                                            <option value="8.0" dropdown-item>8.0</option>
                                                                            <option value="9.0" dropdown-item>9.0</option>
                                                                            <option value="10.0" dropdown-item>10.0</option>
                                                                            <option value="11.0" dropdown-item>11.0</option>
                                                                            <option value="12.0" dropdown-item>12.0</option>
                                                                            <option value="13.0" dropdown-item>13.0</option>
                                                                        </select>
                                                                        <small class="form-text text-muted">До</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                        
                                                    <div class="form-group">
                                                        <div class="container"> 
                                                            <div class="row">
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <p>Android</p>
                                                                    <label class="switch s-primary">
                                                                        <input name='Android' value='Android' class="ad_template" checked type="checkbox" hidden>
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="ad_android_box">
                                                        <div class="form-group">
                                                            <div class="container"> 
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary">
                                                                            <input checked name='Android_Smartphone' value='Android_Smartphone' type="checkbox" class="new-control-input">
                                                                            <span class="new-control-indicator"></span><span class="new-chk-content">Смартфоны</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary">
                                                                            <input checked name='Android_Tablet' value='Android_Tablet' type="checkbox" class="new-control-input">
                                                                            <span class="new-control-indicator"></span><span class="new-chk-content">Планшеты</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="container"> 
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        <select name="android_version1" class="form-control basic">
                                                                            <option value="2.0" selected dropdown-item>Любая (2.0≥)</option>
                                                                            <option value="2.1" dropdown-item>2.1</option>
                                                                            <option value="2.2" dropdown-item>2.2</option>
                                                                            <option value="2.3" dropdown-item>2.3</option>
                                                                            <option value="3.0" dropdown-item>3.0</option>
                                                                            <option value="3.1" dropdown-item>3.1</option>
                                                                            <option value="3.2" dropdown-item>3.2</option>
                                                                            <option value="4.0" dropdown-item>4.0</option>
                                                                            <option value="4.1" dropdown-item>4.1</option>
                                                                            <option value="4.2" dropdown-item>4.2</option>
                                                                            <option value="4.3" dropdown-item>4.3</option>
                                                                            <option value="4.4" dropdown-item>4.4</option>
                                                                            <option value="4.3" dropdown-item>4.3</option>
                                                                            <option value="5.0" dropdown-item>5.0</option>
                                                                            <option value="5.1" dropdown-item>5.1</option>
                                                                            <option value="6.0" dropdown-item>6.0</option>
                                                                            <option value="7.0" dropdown-item>7.0</option>
                                                                            <option value="7.1" dropdown-item>7.1</option>
                                                                            <option value="8.0" dropdown-item>8.0</option>
                                                                            <option value="9.0" dropdown-item>9.0</option>
                                                                            <option value="10.0" dropdown-item>10.0</option>
                                                                            <option value="11.0" dropdown-item>11.0</option>
                                                                        </select>
                                                                        <small class="form-text text-muted">От</small>
                                                                    </div>
                                                                    <div class="col-lg-6 col-xl-6">
                                                                        <select name="android_version2" class="form-control basic">
                                                                            <option value="11.0" selected dropdown-item>Любая (≤11.0)</option>
                                                                            <option value="2.0" dropdown-item>2.0</option>
                                                                            <option value="2.1" dropdown-item>2.1</option>
                                                                            <option value="2.2" dropdown-item>2.2</option>
                                                                            <option value="2.3" dropdown-item>2.3</option>
                                                                            <option value="3.0" dropdown-item>3.0</option>
                                                                            <option value="3.1" dropdown-item>3.1</option>
                                                                            <option value="3.2" dropdown-item>3.2</option>
                                                                            <option value="4.0" dropdown-item>4.0</option>
                                                                            <option value="4.1" dropdown-item>4.1</option>
                                                                            <option value="4.2" dropdown-item>4.2</option>
                                                                            <option value="4.3" dropdown-item>4.3</option>
                                                                            <option value="4.4" dropdown-item>4.4</option>
                                                                            <option value="4.3" dropdown-item>4.3</option>
                                                                            <option value="5.0" dropdown-item>5.0</option>
                                                                            <option value="5.1" dropdown-item>5.1</option>
                                                                            <option value="6.0" dropdown-item>6.0</option>
                                                                            <option value="7.0" dropdown-item>7.0</option>
                                                                            <option value="7.1" dropdown-item>7.1</option>
                                                                            <option value="8.0" dropdown-item>8.0</option>
                                                                            <option value="9.0" dropdown-item>9.0</option>
                                                                            <option value="10.0" dropdown-item>10.0</option>
                                                                        </select>
                                                                        <small class="form-text text-muted">До</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-xl-4">
                                                <p>Позиция в Facebook</p>
                                                <label class="switch s-primary  mb-4 mr-2">
                                                    <input class="ad_template" id='publisher_platforms_facebook' name='publisher_platforms_facebook' value='publisher_platforms_facebook' checked type="checkbox" hidden>
                                                    <span class="slider round"></span>
                                                </label>
                                        
                                                <div class="form-group ad_facebook">
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="facebook_positions_feed" name='facebook_positions_feed' value='facebook_positions_feed' type="checkbox" class="fb new-control-input">
                                                        <span class="fb new-control-indicator"></span><span class="new-chk-content">Лента новостей Facebook</span>
                                                    </label>
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="facebook_positions_right_hand_column" name='facebook_positions_right_hand_column' value='facebook_positions_right_hand_column' type="checkbox" class="fb new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Правый стобец Facebook</span>
                                                    </label>
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="facebook_positions_instant_article" name='facebook_positions_instant_article' value='facebook_positions_instant_article' type="checkbox" class="fb new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Моментальные статьи на Facebook</span>
                                                    </label>
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="facebook_positions_marketplace" name='facebook_positions_marketplace' value='facebook_positions_marketplace' type="checkbox" class="fb new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Facebook маркетплейс</span>
                                                    </label>
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="facebook_positions_video_feeds" name='facebook_positions_video_feeds' value='facebook_positions_video_feeds' type="checkbox" class="fb new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Видеоленты Facebook</span>
                                                    </label>
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="facebook_positions_story" name='facebook_positions_story' value='facebook_positions_story' type="checkbox" class="fb new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Истории Facebook</span>
                                                    </label>
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="facebook_positions_search" name='facebook_positions_search' value='facebook_positions_search' type="checkbox" class="fb new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Результаты поиска на Facebook</span>
                                                    </label>
                                                </div>
                                                
                                                
                                                <p>Позиция в Audience Network</p>
                                                <label class="switch s-primary  mb-4 mr-2">
                                                    <input class="ad_template" id="publisher_platforms_audience_network" name='publisher_platforms_audience_network' value='publisher_platforms_audience_network' checked type="checkbox" hidden>
                                                    <span class="slider round"></span>
                                                </label>
                                        
                                                <div class="form-group ad_netw">
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="audience_network_positions_classic" name='audience_network_positions_classic' value='audience_network_positions_classic' type="checkbox" class="netw new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Классическая</span>
                                                    </label>
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="audience_network_positions_instream_video" name='audience_network_positions_instream_video' value='audience_network_positions_instream_video' type="checkbox" class="netw new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Видеореклама Инстрим</span>
                                                    </label>
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="audience_network_positions_rewarded_video" name='audience_network_positions_rewarded_video' value='audience_network_positions_rewarded_video' type="checkbox" class="netw new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Видео с вознаграждением</span>
                                                    </label>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="col-lg-3 col-xl-3 ad_mobile_children">
                                                <p>Позиция в Instagram</p>
                                                <label class="switch s-primary  mb-4 mr-2">
                                                    <input class="ad_template" id="publisher_platforms_instagram" name='publisher_platforms_instagram' value='publisher_platforms_instagram' checked type="checkbox" hidden>
                                                    <span class="slider round"></span>
                                                </label>
                                        
                                                <div class="form-group ad_instagram">
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="instagram_positions_stream" name='instagram_positions_stream' value='instagram_positions_stream' type="checkbox" class="inst new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Лента Instagram</span>
                                                    </label>
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="instagram_positions_story" name='instagram_positions_story' value='instagram_positions_story' type="checkbox" class="inst new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Истории Instagram</span>
                                                    </label>
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="instagram_positions_explore" name='instagram_positions_explore' value='instagram_positions_explore' type="checkbox" class="inst new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Интересное в Instagram</span>
                                                    </label>
                                                </div>
                                        
                                                <p>Позиция в Messenger</p>
                                                <label class="switch s-primary  mb-4 mr-2">
                                                    <input class="ad_template" id="publisher_platforms_messenger" name='publisher_platforms_messenger' value='publisher_platforms_messenger' checked type="checkbox" hidden>
                                                    <span class="slider round"></span>
                                                </label>
                                        
                                                <div class="form-group ad_mess">
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="messenger_positions_messenger_home" name='messenger_positions_messenger_home' value='messenger_positions_messenger_home' type="checkbox" class="mess new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Входящие Messenger</span>
                                                    </label>
                                                    <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="messenger_positions_story" name='messenger_positions_story' value='messenger_positions_story' type="checkbox" class="mess new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">Истории в Messenger</span>
                                                    </label>
                                                    <!--<label hidden class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                        <input checked id="messenger_positions_sponsored_messages" name='messenger_positions_sponsored_messages' value='messenger_positions_sponsored_messages' type="checkbox" class="mess new-control-input">
                                                        <span class="new-control-indicator"></span><span class="new-chk-content">?</span>
                                                    </label>-->
                                                </div>
                                            </div>
                                        </div>
                                            
                                    </div>
                                </div>        
                            </section>
                            
                            <h3>Креатив</h3>
                            <section>
                                <div class="container"> 
                                    <div class="row">
                                        <div class="col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <p>Креатив (Изображение или видео, макс. 200МБ)</p>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-file-container" data-upload-id="myFirstImage" style="height: 150px;">
                                                    <label>Загрузить <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                    <label class="custom-file-container__custom-file" >
                                                        <input name="creo" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*, video/*">
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview" style="margin-top: 0px; height: 100px; width: 100px;"></div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-5">
                                                <p>Загружать превью?</p>
                                                <label class="switch s-primary mb-4 mr-2">
                                                    <input name="is_preview" type="checkbox" hidden>
                                                    <span class="slider round"></span>
                                                </label>   
                                            </div>
                                            <div class="form-group">
                                                <p>Превью к видео (Изображение, макс. 200МБ)</p>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-file-container" data-upload-id="mySecondImage" style="height: 150px;">
                                                    <label>Загрузить <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                    <label class="custom-file-container__custom-file" >
                                                        <input id="preview" name="preview" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview" style="margin-top: 0px; height: 100px; width: 100px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <textarea name='message' rows="5" cols="30" type="text" class="form-control" placeholder="Основной текст"></textarea>
                                                <small class="form-text text-muted">Необязательно</small>
                                            </div>
                                            <div class="form-group">
                                                <textarea name='title' rows="5" cols="30" type="text" class="form-control" placeholder="Заголовок"></textarea>
                                                <small class="form-text text-muted">Необязательно</small>
                                            </div>
                                            <div class="form-group">
                                                <textarea name='description' rows="5" cols="30" type="text" class="form-control" placeholder="Описание"></textarea>
                                                <small class="form-text text-muted">Необязательно</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4">
                                            <div class="form-group" style="width:100%" >
                                                <select name="call_to_action" class="form-control basic">
                                                    <option value="LEARN_MORE" selected dropdown-item>Подробнее</option>
                                                    <option value="SHOP_NOW" dropdown-item>В магазин</option>
                                                </select>
                                                <small class="form-text text-muted">Кнопка</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="new-control new-checkbox new-checkbox-rounded new-checkbox-text checkbox-primary" style="font-size: 13px;">
                                                    <input name="is_pixel" checked type="checkbox" class="ad_template new-control-input">
                                                    <span class="new-control-indicator"></span><span class="new-chk-content">Приписывать ли пиксель к ссылке?(https://mysite.com?sub=sub1&pixel_name=00000000000)</span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="pixel_name" class="ad_template form-control" placeholder="pixel_name">
                                                <small class="form-text text-muted">Имя пикселя</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            
                            <h3>Последние настройки</h3>
                            <section>
                                <div class="container"> 
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <textarea name="url" rows="5" cols="30" type="text" class="form-control" placeholder="https://mysite.com?sub=sub1"></textarea>
                                                <small class="form-text text-muted">Ссылки в виде: 
                                                <br>https://mysite.com?sub=sub1
                                                <br>https://mysite.com?sub=sub1
                                                <br>...
                                                <br>https://mysite.com?sub=sub1</small>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <p>Запуск по времени</p>
                                                <label class="switch s-primary  mb-4 mr-2" style="margin: 0px 14px !important;">
                                                    <input name="datetime" type="checkbox" hidden>
                                                    <span class="slider round"></span>
                                                </label>  
                                                <br>
                                                <br>
                                                <input disabled id="date" type="datetime-local" name="date" class="form-control flatpickr flatpickr-input active" style="z-index: 2500;">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="form-group">
                                                <p>Сколько копий адсета делать?</p>
                                                <input type="number" name="duble" class="form-control" placeholder="0" value="<?=$template['duble']?>">
                                                <small class="form-text text-muted">Копии адсета</small>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </section>
                            
                            
                            
                        </div>
                    </div>
                </form>
            </div>
          
        </div>
    </div>
</div>


