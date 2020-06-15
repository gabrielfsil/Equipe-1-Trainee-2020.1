
<!-- inicio modal de remoção de usuário -->
<div class="modal fade" id="exampleModal<?=$user->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo excluir este usuário?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <img src="/public/img/trash.png" class="img-modal">
      </div>
      <div class="modal-footer">
          <form method="POST" action='/admin/user-delete'>
            <input type="hidden" name="id" value="<?= $user->id ?>">
            <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
          </form>
      </div>
    </div>
  </div>
</div>            
<!-- fim modal de remoção de usuário -->