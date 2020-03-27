function GrabQuote() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              obj = JSON.parse(this.responseText);
              document.getElementById("lp-quote").innerHTML = obj.quote; 
            }
        };
        xmlhttp.open("GET", "https://api.lightningpath.org/v1/get_random_quote.php", true);
        xmlhttp.send();
  }
  
  window.addEventListener('load', GrabQuote);
  
 