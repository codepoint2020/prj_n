
<?php 
  include "php/connection.php";
  include "php/common_variables.php";
  include "php/functions.php";
  include "php/objects.php";

  include "components/head.php";
?>

<style>
.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip:hover::before {
  content: "";
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  bottom: 100%;
  width: 200px;
  height: 200px;
  background: url("../assets/images/default_cover2.png") no-repeat center center/cover;
  z-index: 1;
}

.tooltip:hover::after {
  content: attr(data-tooltip-text);
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  bottom: 100%;
  padding: 8px 12px;
  background-color: #000;
  color: #fff;
  font-size: 14px;
  white-space: nowrap;
  z-index: 1;
}

</style>


<!-- <img src="../assets/images/default_cover2.png" alt=""> -->


<span class="tooltip" data-tooltip-text="Tooltip text">
  <a href="sample.html">Sample</a>
</span>





<script>
const tooltips = document.querySelectorAll('.tooltip');

tooltips.forEach((tooltip) => {
  const tooltipText = tooltip.getAttribute('data-tooltip-text');
  tooltip.removeAttribute('data-tooltip-text');
  tooltip.setAttribute('data-tooltip-text', tooltipText);
});


</script>

















