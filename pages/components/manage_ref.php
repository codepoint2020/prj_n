<div class="row">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage References</h4>
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-2">Title</label>
                            <input type="text" class="form-control mb-4" placeholder="Enter reference/book title...">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Description</label>
                            <div class="form-group">
                                <textarea class="form-control mb-4" rows="3" placeholder="Text Here..."></textarea>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="mb-2">Category</label>
                            <select class="form-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected="">Choose category...</option>
                                <?php 
                                    $get_categories = $conn->query("SELECT * FROM tbl_categories ") or die(jm_error('Categories query failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
                                    while ($row = $get_categories->fetch_assoc()):
                                ?>
                                    <option value="<?php echo $row['name']; ?>"><?php echo ucwords($row['name']); ?></option>
                                <?php endwhile; ?>
                               
                            </select>
                        </div>

                        
                       
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-2">Title</label>
                            <input type="text" class="form-control mb-4" placeholder="Enter reference/book title...">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Title</label>
                            <input type="text" class="form-control mb-4" placeholder="Enter reference/book title...">
                        </div>

                        
                       
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>