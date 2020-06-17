<div class="modal modal-edicao fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?= $act['message'] ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="<?= $act['error'] ? '/public/img/password-error.png' : '/public/img/password.png'; ?>" class="img-modal">
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary">Ok</button>
        </div>
      </div>
    </div>
  </div>
</div>  