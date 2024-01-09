/* scripts.js */
function increment(inputId) {
  const input = document.getElementById(inputId);
  input.stepUp();
}

function decrement(inputId) {
  const input = document.getElementById(inputId);
  input.stepDown();
}