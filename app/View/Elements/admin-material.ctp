<?php $this->append('styles'); ?>
<?php $this->end(); ?>

<?php $this->append('scripts'); ?>
  <script type="text/javascript">var lang = "<?php echo Configure::read('Config.language'); ?>";</script>
  <!--MATERIAL DESIGN INCLUDES-->
  <script src="/js/select2/select2.js"></script>
  <script src="/js/select2/i18n/<?php echo Configure::read('Config.language'); ?>.js"></script>
  <script src="/js/admin/admin-material.js"></script>
<?php $this->end(); ?>
