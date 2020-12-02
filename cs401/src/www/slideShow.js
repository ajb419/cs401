
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var slides = $(".mySlides");
  if (n > slides.length) {slideIndex = 1}
  else if (n < 1) {slideIndex = slides.length}

  slides.css("display", "none");
  slides.eq(slideIndex-1).css("display", "block")
  slides.eq(slideIndex-1).find("img").attr("style", "width:auto; height:500px; display:block; margin-left:auto; margin-right:auto;");
}
