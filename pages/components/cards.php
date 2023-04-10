<!-- Row MARKED-->
<div class="row mb-4">
 
    <div class="col-md-3">
        <li class="nav-item d-none d-md-block">
            <a class="nav-link" href="javascript:void(0)">
                <form>
                    <div class="customize-input">
                        <input class="form-control custom-shadow custom-radius border-0 bg-white search-input"
                            type="search" placeholder="Search" aria-label="Search">
                    
                    </div>
                </form>
            </a>
        </li>
    </div>
    <div class="col-md-3">
        <select class="form-select mr-sm-2 mb-2" id="categories" name="expiration_date">
            <option selected value="">Choose category...</option>
            <option value="6">6 months</option>
            <option value="9">9 months</option>
            <option value="12">12 months</option>
        </select>
    </div>
    <div class="col-md-3">
        <div class="btn-group me-2" role="group" aria-label="First group">
            <button type="button" class="btn btn-secondary disabled"><<</button>
            <button type="button" class="btn btn-secondary">1</button>
            <button type="button" class="btn btn-info">2</button>
            <button type="button" class="btn btn-secondary">3</button>
            <button type="button" class="btn btn-secondary">4</button>
            <button type="button" class="btn btn-secondary disabled">>></button>
        </div>
    </div>
     
</div>
 <!-- card parent -->

<div class="row card-parent">

    <?php 
        $get_books = $conn->query("SELECT * FROM tbl_books; ");
        while ($row = $get_books->fetch_assoc()):
    ?>    

     <div class="col-lg-2 col-md-4 col-sm-6 card-handle align-content-stretch">
        <div class="card grow shadow-2">
            <?php if (empty($row['cover_img'])): ?>
            <img class="card-img-top img-fluid" src="../assets/images/default_cover.png"
                alt="Card image cap">
            <?php else: ?>
                <img class="card-img-top img-fluid" src="../assets/references/pdf/<?php echo $row['cover_img'];?>"
                alt="Card image cap">
                <?php endif; ?>
            <div class="card-body">
                <h4 class="card-title"><?php echo ucwords(strtolower($row['title'])); ?></h4>
                <small class="card-category">Category: <a href="#"><?php echo $row['category']; ?></a></small>
                <p class="card-text"><?php echo short_desc($row['details']); ?></p>
                <a href="javascript:void(0)">Read more</a>
            </div>
        </div>
    </div>
    <?php endwhile ?>
    <!-- column -->

   

</div>
<!-- Row -->


<script>


// Get the search input and card parent elements
const searchInput = document.querySelector('.search-input');
const cardParent = document.querySelector('.card-parent');


// Add a keyup event listener to the search input
searchInput.addEventListener('input', function() {
  // Get the search query
  const query = this.value.trim().toLowerCase();

  // Get all the cards
  const cards = cardParent.querySelectorAll('.card-handle');

  // Loop through each card and check if the card title or description contains the search query
  cards.forEach(function(card) {

    const title = card.querySelector('.card-title').textContent.toLowerCase();
    const description = card.querySelector('.card-text').textContent.toLowerCase();
    const category = card.querySelector('.card-category').textContent.toLowerCase();
    
    const title_desc_category = title + description + category;

    if (title_desc_category.includes(query)) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
});



    
    

    

</script>