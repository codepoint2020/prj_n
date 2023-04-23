<style>
    .lh-normal{
        
        line-height: normal !important;

    }
</style>

<!-- Row -->
 <div class="row">
    <?php
        $query_categories = $conn->query("SELECT * FROM tbl_categories ORDER BY name DESC");
        while ($category = $query_categories->fetch_assoc()):
        $row_category = $category['name'];
    ?>
    <div class="col-md-6">
        <div class="card text-white bg-dark">
            <div class="card-header ">
                <h4 class="text-white h3 lh-normal"><?php echo ucwords($row_category); ?></h4>
                <?php 
                    $query_category_availability = $conn->query("SELECT * FROM tbl_books WHERE category  = '$row_category'");
                    $row = $query_category_availability->fetch_assoc();
                    $number_of_references = $query_category_availability->num_rows;


                    $query_videos = $conn->query("SELECT * FROM tbl_books WHERE category  = '$row_category' AND file_name LIKE '%.mp4' AND file_name NOT LIKE '%.%.mp4';");
                    $num_videos = $query_videos->num_rows;

                    $query_pptx = $conn->query("SELECT * FROM tbl_books WHERE category  = '$row_category' AND file_name LIKE '%.pptx' AND file_name NOT LIKE '%.%.pptx';");
                    $num_pptx = $query_pptx->num_rows;

                    $query_pdf = $conn->query("SELECT * FROM tbl_books WHERE category  = '$row_category' AND file_name LIKE '%.pdf' AND file_name NOT LIKE '%.%.pdf';");
                    $num_pdf = $query_pdf->num_rows;

                    $query_docx = $conn->query("SELECT * FROM tbl_books WHERE category  = '$row_category' AND file_name LIKE '%.docx' AND file_name NOT LIKE '%.%.docx';");
                    $num_docx = $query_docx->num_rows;

        
                ?>
              
                <p class="lh-normal"><?php echo "Number of available references: ".$number_of_references; ?></p>
                <p><?php echo "Videos: ".$num_videos; ?></p>
                <p><?php echo "Powerpoint: ".$num_pptx; ?></p>
                <p><?php echo "PDF: ".$num_pdf; ?></p>
                <p><?php echo "MSWord: ".$num_docx; ?></p>
            </div>
            <div class="card-body">
               
                
            </div>
        </div>
    </div>
    
    <?php endwhile; ?>

</div>
                <!-- Row -->