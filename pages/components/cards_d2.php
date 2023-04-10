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
     <!-- column -->
     <div class="col-lg-2 col-md-4 col-sm-6 card-handle align-content-stretch">
        <!-- Card -->
        <div class="card">
            <img class="card-img-top img-fluid" src="../assets/images/big/img1.jpg"
                alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">HTML</h4>
                <p class="card-text">The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. </p>
                <a href="javascript:void(0)">Read more</a>
            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- column -->

    <!-- column -->
    <div class="col-lg-2 col-md-4 col-sm-6 card-handle align-content-stretch">
        <!-- Card -->
        <div class="card">
            <img class="card-img-top img-fluid" src="../assets/images/big/img1.jpg"
                alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">HTML</h4>
                <p class="card-text">The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. </p>
                <a href="javascript:void(0)">Read more</a>
            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- column -->
    <!-- column -->
    <div class="col-lg-2 col-md-4 col-sm-6 card-handle ">
        <!-- Card -->
        <div class="card">
            <img class="card-img-top img-fluid" src="../assets/images/big/img2.jpg"
                alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">CSS</h4>
                <p class="card-text">Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language such as HTML or XML.</p>
                <a href="javascript:void(0)">Read</a>
            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- column -->
    <!-- column -->
    <div class="col-lg-2 col-md-4 col-sm-6 card-handle align-content-stretch">
        <!-- Card -->
        <div class="card">
            <img class="card-img-top img-fluid" src="../assets/images/big/img3.jpg"
                alt="Card image cap"ALL RE>
            <div class="card-body">
                <h4 class="card-title">JAVASCRIPT</h4>
                <p class="card-text">JavaScript, often abbreviated as JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS.</p>
                <a href="javascript:void(0)">Read</a>
            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- column -->
    <!-- column -->
    <div class="col-lg-2 col-md-4 col-sm-6 card-handle align-content-stretch">
        <!-- Card -->
        <div class="card">
            <img class="card-img-top img-fluid" src="../assets/images/big/img4.jpg"
                alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">PHP</h4>
                <p class="card-text">PHP is a general-purpose scripting language geared toward web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995.</p>
                <a href="javascript:void(0)">Read</a>
            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- column -->
    <!-- column -->
    <div class="col-lg-2 col-md-4 col-sm-6 card-handle align-content-stretch">
        <!-- Card -->
        <div class="card">
            <img class="card-img-top img-fluid" src="../assets/images/big/img4.jpg"
                alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">MYSQL</h4>
                <p class="card-text">MySQL is an open-source relational database management system.</p>
                <a href="javascript:void(0)">Read</a>
            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- column -->
    <!-- column -->
    <div class="col-lg-2 col-md-4 col-sm-6 card-handle align-content-stretch">
        <!-- Card -->
        <div class="card">
            <img class="card-img-top img-fluid" src="../assets/images/big/img4.jpg"
                alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">BOOTSTRAP</h4>
                <p class="card-text">Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development.</p>
                <a href="javascript:void(0)">Read</a>
            </div>
        </div>
        <!-- Card -->
    </div>
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
    const title_desc = title + description;
    console.log(title_desc);
    if (title_desc.includes(query)) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
});


// // Get the search input, card parent, and pagination elements
// const searchInput = document.querySelector('.search-input');
// const cardParent = document.querySelector('.card-parent');
// const pagination = document.querySelector('.pagination');

// // Define the number of cards to show per page
// const cardsPerPage = 2;

// // Add a keyup event listener to the search input
// searchInput.addEventListener('input', function() {
//   // Get the search query
//   const query = this.value.trim().toLowerCase();

//   // Get all the cards
//   const cards = cardParent.querySelectorAll('.card-handle');

//   // Create an array to store the filtered cards
//   let filteredCards = [];

//   // Loop through each card and check if the card title or description contains the search query
//   cards.forEach(function(card) {
//     const title = card.querySelector('.card-title').textContent.toLowerCase();
//     const description = card.querySelector('.card-text').textContent.toLowerCase();
//     const title_desc = title + description;

//     if (title_desc.includes(query)) {
//       filteredCards.push(card);
//     }
//   });

//   // Get the number of pages needed to display all the filtered cards
//   const numPages = Math.ceil(filteredCards.length / cardsPerPage);


//                 <div class="btn-group me-2" role="group" aria-label="First group">
//                     <button type="button" class="btn btn-secondary disabled">1</button>
//                     <button type="button" class="btn btn-info">2</button>
//                     <button type="button" class="btn btn-secondary">3</button>
//                     <button type="button" class="btn btn-secondary">4</button>
//                 </div>

//   // Generate the pagination buttons
//   let paginationButtons = '';
//   for (let i = 1; i <= numPages; i++) {
//     paginationButtons += `<button class="btn btn-secondary disabled">${i}</button>`;
//   }
//   pagination.innerHTML = paginationButtons;

//   // Display the correct cards based on the current page
//   const currentPage = 1;
//   displayCards(filteredCards, currentPage);
// });

// function displayCards(cards, page) {
//   // Calculate the start and end index of the cards to display
//   const startIndex = (page - 1) * cardsPerPage;
//   const endIndex = startIndex + cardsPerPage;

//   // Loop through the cards and display only the cards in the current page
//   cards.forEach(function(card, index) {
//     if (index >= startIndex && index < endIndex) {
//       card.style.display = 'block';
//     } else {
//       card.style.display = 'none';
//     }
//   });
// }

// // Add click event listeners to the pagination buttons
// pagination.addEventListener('click', function(event) {
//   if (event.target.tagName === 'BUTTON') {
//     const currentPage = parseInt(event.target.textContent);
//     const filteredCards = cardParent.querySelectorAll('.card-handle[style*="display: block"]');
//     displayCards(filteredCards, currentPage);
//   }
// });

    
    

    

</script>