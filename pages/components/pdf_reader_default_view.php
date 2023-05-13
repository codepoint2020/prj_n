
<body oncontextmenu="return false">
    <div class="top-bar">
      <button class="btn" id="prev-page">
        <i class="fas fa-arrow-circle-left"></i> Prev
      </button>
      <button class="btn" id="next-page">
        Next <i class="fas fa-arrow-circle-right"></i>
      </button>
      <span class="page-info">
        Page <span id="page-num"></span> of <span id="page-count"></span>
      </span>

     
    

      
    </div>

    <canvas id="pdf-render"></canvas>

    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

<?php

$js_script = <<<DELIMETER

<script>

let url = '{$pdf_file}';

let pdfDoc = null,
pageNum = 1,
pageIsRendering = false,
pageNumIsPending = null;

const scale = 1.6,
canvas = document.querySelector('#pdf-render'),
ctx = canvas.getContext('2d');

// Render the page
const renderPage = num => {
pageIsRendering = true;

// Get page
pdfDoc.getPage(num).then(page => {
// Set scale
const viewport = page.getViewport({ scale });
canvas.height = viewport.height;
canvas.width = viewport.width;

const renderCtx = {
  canvasContext: ctx,
  viewport
};

page.render(renderCtx).promise.then(() => {
  pageIsRendering = false;

  if (pageNumIsPending !== null) {
    renderPage(pageNumIsPending);
    pageNumIsPending = null;
  }
});

// Output current page
document.querySelector('#page-num').textContent = num;
});
};

// Check for pages rendering
const queueRenderPage = num => {
if (pageIsRendering) {
pageNumIsPending = num;
} else {
renderPage(num);
}
};

// Show Prev Page
const showPrevPage = () => {
if (pageNum <= 1) {
return;
}
pageNum--;
queueRenderPage(pageNum);
};

// Show Next Page
const showNextPage = () => {
if (pageNum >= pdfDoc.numPages) {
return;
}
pageNum++;
queueRenderPage(pageNum);
};

// Get Document
pdfjsLib
.getDocument(url)
.promise.then(pdfDoc_ => {
pdfDoc = pdfDoc_;

document.querySelector('#page-count').textContent = pdfDoc.numPages;

renderPage(pageNum);
})
.catch(err => {
// Display error
const div = document.createElement('div');
div.className = 'error';
div.appendChild(document.createTextNode(err.message));
document.querySelector('body').insertBefore(div, canvas);
// Remove top bar
document.querySelector('.top-bar').style.display = 'none';
});

// Button Events
document.querySelector('#prev-page').addEventListener('click', showPrevPage);
document.querySelector('#next-page').addEventListener('click', showNextPage);


</script>

DELIMETER;

echo $js_script;



?>