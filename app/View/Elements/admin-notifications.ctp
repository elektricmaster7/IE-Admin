<a class="pull-right" data-toggle="dropdown"><i class="material-icons md-24 topbar-button">message</i><?php if($notifications_count > 0){ ?><div class="note-counter"><?php echo $notifications_count; ?></div><?php } ?></a>
<ul id="notifications" class="dropdown-menu material-dropdown">
  <?php foreach($notifications as $notification){ ?>
    <li><a href="/admin/notifications/view/<?php echo $notification['Notification']['id']; ?>"><i class="material-icons md-24 pull-left note-icon">insert_comment</i><?php echo $notification['Notification']['message']; ?><br><div class="info"><?php echo date('Y-m-d H:i', strtotime($notification['Notification']['created'])); ?></div></a></li>
  <?php } ?>
  <li class="divider"></li>
  <li>
    <a href="#" class="material-button-flat inverted-button"><?php echo __("Ver todas"); ?></a>
  </li>
</ul>
<?php $this->append('scripts'); ?>
  <script type="text/javascript" src="/js/plugins/touchswipe/jquery.touchSwipe.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#notifications").swipe( {
      swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
        if(direction == "up"){
            //alert(direction);
            $('.dropdown-menu').dropdown('toggle');
        }
      }
    });
  });
  </script>
<?php $this->end(); ?>
