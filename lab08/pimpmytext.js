function hello(){
  var clickMe = document.getElementById("content");
  if(clickMe.style.fontSize==''){
    clickMe.style.fontSize = '12pt';
  }
  else{
    var size = parseInt(clickMe.style.fontSize);
    size = size + 2;
    clickMe.style.fontSize = size + 'pt';
  }

}
function bling(){
  var clickMe = document.getElementById("content");
  var checkbox = document.getElementById("check")

  if (checkbox.checked == true){
    clickMe.style.fontWeight = "bold";
    clickMe.style.color = "green";
    clickMe.style.textDecoration = "underline";
  }
  if (checkbox.checked == false){
    clickMe.style.fontWeight = "normal";
  }
}

function snoopify(){
  var clickMe = document.getElementById("content");
  var s = clickMe.value.toUpperCase();
  clickMe.value = s

  var strArray = s.split('.');
  var join = strArray.join('-izzle.');
  clickMe.value = join;
}
