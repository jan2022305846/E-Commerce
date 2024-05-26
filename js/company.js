$(document).ready(function() {
  var $paragraphs = $('#paragraphs p');
  var currentIndex = 0;
  var fadeDuration = 1000;
  
  // Function to fade in and out paragraphs sequentially
  function fadeParagraphs() {
      var $current = $paragraphs.eq(currentIndex);
      var $next = $paragraphs.eq((currentIndex + 1) % $paragraphs.length);
      
      $current.fadeOut(fadeDuration, function() {
          $next.fadeIn(fadeDuration);
      });
      
      currentIndex = (currentIndex + 1) % $paragraphs.length;
  }
  
  // Initially hide all paragraphs except the first one
  $paragraphs.not(':first').hide();
  
  // Set interval to execute the fadeParagraphs function every 5 seconds
  setInterval(fadeParagraphs, 5000);
});