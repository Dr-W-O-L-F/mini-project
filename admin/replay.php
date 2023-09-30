<?php
include("header.php");
$id = $_GET['id'];

?>
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Replay</h2>
        <form
            method="POST"
            class="w-100 rounded-1 p-4 border bg-white"
            action="sendreplay.php"
        >
            <!-- Add a hidden input field to pass the $id -->
            <input type="hidden" name="complaint_id" value="<?php echo $id; ?>">

            <label class="d-block mb-4">
                <span class="form-label d-block"> Message Here..</span>
                <textarea
                    name="message"
                    class="form-control"
                    rows="10"
                    placeholder="Write Your Message Here"
                ></textarea>
            </label>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary px-3 rounded-3">
                    SEND
                </button>
            </div>

            <div class="d-block text-end">
                <div class="small">

                </div>
            </div>
        </form>
    </div>
</div>

<?php
include("footer.php");
?>
