<!-- Template modal -->
<div class="modal fade deleteTemplate-modal" id="deleteTemplateModal" tabindex="-1" role="dialog" aria-labelledby="deleteTemplateModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 300px;" role="document">
        <div class="modal-content">

            <div class="modal-header" id="deleteTemplateModalLabel">
                <h4 class="modal-title">Удалить шаблон</h4>
                <button type="button" class="close deleteTemplate" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
            </div>
      
     
            <div class="modal-body">
                <form class="mt-0" action="" method="POST">
                    <div class="form-group">
                        <div class="deleteTemplateForm" style="max-width: 250px; max-height:300px; overflow:auto;">
                            <?php
                            $dir = $_SERVER['DOCUMENT_ROOT'].'/main/templates';
                             
                            $f = scandir($dir);
                            unset($f[0],$f[1]);
                            foreach ($f as $file)
                                if($file != "Нет.json") 
                                    printf('
                                        <label class="new-control new-checkbox sq checkbox-primary" style="width:210px">
                                            <input type="checkbox" class="new-control-input deleteTemplateCheckbox" value="'.$file.'">
                                            <span class="new-control-indicator"></span>'.explode('.json', $file) [0].'
                                        </label>
                                        ');
                            ?>
                        </div>
                    </div>
                    <button id="deleteTemplate" name="deleteTemplate" type="submit" class="btn btn-primary mt-2 mb-2 btn-block">Удалить выбранные шаблоны</button>
                </form>

            </div>
            
            
        </div>
    </div>
</div>