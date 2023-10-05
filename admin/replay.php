<?php
include("header.php");
$id = $_GET['id'];

?>
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Replay</h2>


        <div class="col-md-8 compose-right widget-shadow">
      <div class="panel-default">
        <div class="panel-heading">
          Compose Your Replay
        </div>
        <div class="panel-body">
          <div class="alert alert-info">
            Please fill details to send the replay
          </div>
          <form class="com-mail" method="POST" action="sendreplay.php">
          <input type="hidden" name="complaint_id" value="<?php echo $id; ?>">
            <textarea rows="6" class="form-control1 control2" placeholder="Replay :" name="message"></textarea>
            <input type="submit" value="Send Message">
          </form>
        </div>
      </div>
    </div>



    </div>
</div>

<?php
include("footer.php");
?> 



