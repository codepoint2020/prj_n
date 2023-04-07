// Get the search input, card parent, and pagination elements
const searchInput = document.querySelector('.search-input');
const cardParent = document.querySelector('.card-parent');
const pagination = document.querySelector('.pagination');

// Define the number of cards to show per page
const cardsPerPage = 2;

// Add a keyup event listener to the search input
searchInput.addEventListener('input', function() {
  // Get the search query
  const query = this.value.trim().toLowerCase();

  // Get all the cards
  const cards = cardParent.querySelectorAll('.card-handle');

  // Create an array to store the filtered cards
  let filteredCards = [];

  // Loop through each card and check if the card title or description contains the search query
  cards.forEach(function(card) {
    const title = card.querySelector('.card-title').textContent.toLowerCase();
    const description = card.querySelector('.card-text').textContent.toLowerCase();
    const title_desc = title + description;

    if (title_desc.includes(query)) {
      filteredCards.push(card);
    }
  });

  // Get the number of pages needed to display all the filtered cards
  const numPages = Math.ceil(filteredCards.length / cardsPerPage);

  // Generate the pagination buttons
  let paginationButtons = '';
  for (let i = 1; i <= numPages; i++) {
    paginationButtons += `<button>${i}</button>`;
  }
  pagination.innerHTML = paginationButtons;

  // Display the correct cards based on the current page
  const currentPage = 1;
  displayCards(filteredCards, currentPage);
});

function displayCards(cards, page) {
  // Calculate the start and end index of the cards to display
  const startIndex = (page - 1) * cardsPerPage;
  const endIndex = startIndex + cardsPerPage;

  // Loop through the cards and display only the cards in the current page
  cards.forEach(function(card, index) {
    if (index >= startIndex && index < endIndex) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
}

// Add click event listeners to the pagination buttons
pagination.addEventListener('click', function(event) {
  if (event.target.tagName === 'BUTTON') {
    const currentPage = parseInt(event.target.textContent);
    const filteredCards = cardParent.querySelectorAll('.card-handle[style*="display: block"]');
    displayCards(filteredCards, currentPage);
  }
});
