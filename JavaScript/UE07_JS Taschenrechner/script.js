// Wandratsch David, 3BHIT
function getButtonValue(a) 
{
  document.getElementById('inputwindow').value += a;
}

function calculateResult() 
{
  var result = eval(document.getElementById('inputwindow').value);
  document.getElementById('inputwindow').value = result;
}

function clearInput(b) 
{
  document.getElementById('inputwindow').value = b;
}