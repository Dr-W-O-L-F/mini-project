<?php
include("header.php");
?>

<div id="page-wrapper">
  <div class="main-page">
    <h2 class="title1">Complaints</h2>

    <div class="col-md-8 compose-right widget-shadow">
      <div class="panel-default">
        <div class="panel-heading">
          Compose New Complaint
        </div>
        <div class="panel-body">
          <div class="alert alert-info">
            Please fill details to send a new message
          </div>
          <form class="com-mail" method="POST" action="complaintinsert.php">
            <input type="text" class="form-control1 control3" placeholder="Subject :" name="subject">
            <textarea rows="6" class="form-control1 control2" placeholder="Message :" name="description"></textarea>
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
