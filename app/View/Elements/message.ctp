<?php 
$fdata = $this->Session->read('Message');
if(isset($fdata['flash']) && !empty($fdata['flash'])) {
?>

    <?php 
    $mc = 'success';
        if($this->Session->read('Message.flash.params.class') == 'success'){
            $mc = 'success';
        }else{
            $mc = 'danger';
        }
    
    ?>
  <div class=" alert-<?php echo $mc; ?>">
    <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
    <?php echo $this->Session->flash(); ?>
  </div>


<script>
    $(document).ready( function() {
        $('.alert').delay(3000).fadeOut('slow');
      });
</script>
<?php } ?>