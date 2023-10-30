<?php
include("header.php");
$email = $_GET['email'];
?>
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Compose your mail here!!</h2>
        <div class="col-md-8 compose-right widget-shadow">
            <div class="panel-default">
                <div class="panel-heading">
                    Compose New Message
                </div>
                <div class="panel-body">
                    <div class="alert alert-info">
                        Please fill details to send a new message
                    </div>
                    <form class="com-mail" method="POST" action="send_email.php" enctype="multipart/form-data">
                        <input type="hidden" name="email" value="<?php echo $email ?>">
                        <input type="text" class="form-control1 control3" name="subject" placeholder="Subject :">
                        <textarea rows="6" class="form-control1 control2" name="message" placeholder="Message:"></textarea>
                        <div class="form-group">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Attachment
                                <input type="file" name="attachment">
                            </div>
                            <p class="help-block">Max. 32MB</p>
                        </div>
                        <input type="submit" name="send_message" value="Send Message">
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<?php
include("footer.php");
?>
