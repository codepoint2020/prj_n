<?php
display_notification();
post_announcement();
?>

<div class="row jm-width">
    <div class="card ">
        <div class="card-body ">

            <h4 class="card-title">Create New Annoucement</h4>
            <form action="panel.php?announcement_form=true" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-2">
                            <label class="form-label" for="title">Title</label>
                            <!-- <h6 class="card-subtitle"><code>Required</code></h6> -->
                            <input type="text" id="title" name="title" class="form-control mb-4" placeholder="Enter title...">
                        </div>
                        <div class="mb-2">
                            <label class="form-label" for="content">Content</label>
                            <div class="form-group">
                                <textarea id="content" name="content" class="form-control mb-4 
                                
                            <?php 
                            
                            ?>
                                " rows="12" placeholder="Type here..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary btn-lg" id="post_announcement" name="post_announcement">Submit</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>


<script>

  
   

</script>