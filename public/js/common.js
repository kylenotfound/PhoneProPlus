/**
 * Take an HTML Input field (textfield, textarea etc) and a char count ex 150
 * And display the how many chars the user can still type, as they type.
 */
 function displayCharsLeft(element, countFrom) {
    var textInput = element.value.length;
    var charactersLeft = countFrom - textInput;
    document.getElementById('charsLeft').innerHTML = "Characters left: " + charactersLeft;
  }

//On page load open table
$("body").on('show.bs.collapse', function(e) {
  if(e.target.id == "recordsCollapse") {
    document.getElementById("recordsButton").innerHTML = ("Collapse Records");
  }
});

$("body").on('hide.bs.collapse', function(e) {
    if(e.target.id == "recordsCollapse") {
      document.getElementById("recordsButton").innerHTML = ("Expand Records");
    }
});
