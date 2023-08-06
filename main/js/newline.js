document.addEventListener('DOMContentLoaded', function () {
  var submit = document.getElementById('submit');
  var content = document.getElementById('content');

  submit.addEventListener('click', function () {
    var newsContent = content.value;

    // Send the news content to the server using AJAX or form submission
    // Save it to the database and handle the insertion process

    content.value = ''; // Clear the input field
  });

  // Enable submitting the form by pressing Enter key
  content.addEventListener('keydown', function (event) {
    if (event.keyCode === 13 && !event.shiftKey) { // Enter key without Shift key
      event.preventDefault(); // Prevent the default behavior (line break)
      submitBtn.click(); // Trigger the button click event
    }
  });
});