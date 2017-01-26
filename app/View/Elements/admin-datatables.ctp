<?php $this->append('styles'); ?>
  <!--<link rel="stylesheet" type="text/css" href="/js/datatables/datatables.css"/>-->
<?php $this->end(); ?>

<?php $this->append('scripts'); ?>
  <script type="text/javascript">var datatables_lang = "<?php echo Configure::read('Config.language'); ?>";</script>
  <script type="text/javascript" src="/js/datatables/datatables.js"></script>
  <script type="text/javascript" src="/js/admin/admin-datatables.js"></script>
<?php $this->end(); ?>
