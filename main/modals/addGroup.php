<!-- group modal -->
<div class="modal fade group-modal" id="groupModal" tabindex="-1" role="dialog" aria-labelledby="groupModalLabel" aria-hidden="true">
    <div class="modal-dialog addGroupForm" role="document">
        <div class="modal-content">

                <div class="modal-header" id="groupModalLabel">
                    <h4 class="modal-title">Добавить группу</h4>
                    <button type="button" class="close group" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                </div>
          
         
                <div class="modal-body">
                    <form class="mt-0" action="" method="POST">
                        <div class="form-group">
                            Название группы
                            <input maxlength="20" type="text" class="form-control mb-2" id="groupName" name="name" placeholder="Name">
                        </div>
                        <button id="addGroup" name="addGroup" type="submit" class="btn btn-primary mt-2 mb-2 btn-block">Добавить группу</button>
                    </form>
    
                </div>
            
        </div>
    </div>
</div>