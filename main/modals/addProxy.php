<!-- proxy modal -->
<div class="modal fade proxy-modal" id="proxyModal" tabindex="-1" role="dialog" aria-labelledby="proxyModalLabel" aria-hidden="true">
    <div class="modal-dialog addProxyForm" role="document">
        <div class="modal-content">

                <div class="modal-header" id="proxyModalLabel">
                    <h4 class="modal-title">Добавить прокси</h4>
                    <button type="button" class="close proxy" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                </div>
          
         
                <div class="modal-body">
                    <form class="mt-0" action="" method="POST">
                        <div class="form-group">
                            Введите прокси:
                            <textarea id="proxys" rows="10" cols="45" type="text" class="form-control mb-2" name="proxys" placeholder="http://192.168.0.1:8000@login:password
socks5://192.168.0.1:8000@login:password
..."></textarea>
                            <small class="form-text text-muted">Примеры возможных вариантов:<br>
&nbsp;&nbsp;&nbsp;http://192.168.0.1:8000@login:password<br>
&nbsp;&nbsp;&nbsp;http://192.168.0.1:8000<br>
&nbsp;&nbsp;&nbsp;socks5://192.168.0.1:8000@login:password<br>
&nbsp;&nbsp;&nbsp;socks5://192.168.0.1:8000<br>
</small>
                        </div>
                        <button id="addProxy" name="addProxy" type="submit" class="btn btn-primary mt-2 mb-2 btn-block">Добавить прокси</button>
                    </form>
    
                </div>
            
        </div>
    </div>
</div>