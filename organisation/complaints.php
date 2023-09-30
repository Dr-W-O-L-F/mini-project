<?php
include("header.php");
?>
			<div id="page-wrapper">
			<div class="main-page">
				<h2 class="title1">Complaints</h2>
				

				<div class="row mx-0 justify-content-center">
    <div class="col-md-7 col-lg-5 px-lg-2 col-xl-4 px-xl-0 px-xxl-3">
      <form
        method="POST"
        class="w-100 rounded-1 p-4 border bg-white"
        action="complaintinsert.php"
      >
        <label class="d-block mb-4">
          <span class="form-label d-block">Subject</span>
          <input
            name="subject"
            type="text"
            class="form-control"
            placeholder="Complaint Title"
          />
        </label><br>

        <label class="d-block mb-4">
          <span class="form-label d-block"> Description</span>
		  <textarea
  name="description"
  class="form-control"
  rows="10"
  placeholder="Additional details?"
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
</div>
		
			</div>
		</div>
	
  <?php
  include("footer.php");
  ?>