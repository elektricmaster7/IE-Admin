<!--CONFIRM MODAL-->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo __("Confirmar"); ?></h4>
      </div>
      <div class="modal-body">
        <p><?php echo __("Tem a certeza que pretende continuar esta acção?"); ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="material-button-flat" data-dismiss="modal"><?php echo __("Cancelar"); ?></button>
        <a href="#" class="material-button-flat"><?php echo __("Confirmar"); ?></a>
      </div>
    </div>
  </div>
</div>
<!--END CONFIRM MODAL-->
<?php $this->append('scripts'); ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#confirmModal').on('show.bs.modal', function(e) {
        $(this).find('.modal-title').html($(e.relatedTarget).data('title'));
        $(this).find('.modal-body').html($(e.relatedTarget).data('message'));
        $(this).find('.material-button-flat').attr('href', $(e.relatedTarget).data('href'));
      });
    });
  </script>
<?php $this->end(); ?>
