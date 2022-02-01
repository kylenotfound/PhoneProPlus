/**
 * Take an HTML Input field (textfield, textarea etc) and a char count ex 150
 * And display the how many chars the user can still type, as they type.
 */
 function displayCharsLeft(element, countFrom) {
    var textInput = element.value.length;
    var charactersLeft = countFrom - textInput;
    document.getElementById('charsLeft').innerHTML = "Characters left: " + charactersLeft;
  }
