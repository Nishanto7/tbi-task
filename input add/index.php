<html>
<head>   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
</head>
<body>
<center>
<div>
<button id="btnadd" onclick="addtext()" class="btn m-1" style="border:1px solid">+</button>
</div>
<form name="textbox" method="post" action="post.php" enctype="multipart/form-data" onsubmit="return formvalidate()">
<div id="new"></div>
<input type="submit" name="submit" value="Submit" class="btn btn-success m-1"/>
<div id="txt"></div>
</form>
<script>
function formvalidate()
{
  var errno = 0;
  for(let i=1; i<=total; i++)
  {
    if(remove.includes(`${i}`))
    {
      continue;
    }else{
      var x=document.forms["textbox"]["txtval"+i].value;
      var y=document.forms["textbox"]["txt_val"+i].value;
      var z=document.forms["textbox"]["state"+i].value;
      //alert(x);
      //alert(y);
      //alert(z);
      if(x !="" && y !="")
      {
        if(z=="")
        {
          document.getElementById("msg"+i).innerHTML = "Please Select State"; 
          // return false;
          errno +=1;
        }
        else
        {
          
          document.getElementById("msg"+i).innerHTML = "";  
        }
      }
    }
  }
  if(errno>0)
  {
    return false;
  }
}
  
const button = document.querySelector("#btnadd");
var parent = document.getElementById("new");
const previewCon = document.querySelector("#txt");
var total = 0;
var inptxt = 0;
var inptxt2 = 0;
var inptxt3=0;
var inptxt4=0;
var inptxt5=0;
var emsg=0;
var inpbtn = 0;
const remove=[];

function addtext(){
	total += 1;
	inptxt += 1;
	inptxt2 += 1;
  inptxt3 +=1;
  inptxt4 +=1;
  inptxt5 +=1;
  emsg +=1;
	inpbtn += 1;
	var txtval = "txtval" +inptxt;
	var txtval2 = "txt_val" + inptxt2;
  var txtval3 = "image" + inptxt3;
  var txtval4 = "state" + inptxt4;
  var txtval5 = "slider"+inptxt5;
  var errormsg = "msg" + emsg;
	var btnremove = "btnremove" + + inpbtn;
  let inpdemo1 = `<input type="hidden" name='num${inptxt}'class='m-1' value="${inptxt}"/>`;
    var element5= `<input type ='file' name='${txtval5}' multiple/>`;
    var element1= `<input type='text' name='${txtval}' placeholder='Enter Text' class='m-1 col-2' />`
    var element2= `<input type='text' name='${txtval2}' placeholder='Enter Text' class='m-1 col-2' />`
    var element3= `<input type='file' name='${txtval3}'class='m-1 col-2' />`
    var element4= `<select name='${txtval4}' class='col-2'><option value=''>Select State</option><option value='HP'>HP</option><option value='PB'>Punjab</option><option value='Chd'>Chandigarh</option></select>`
    var div= document.createElement("div");
    var count= `<input type='hidden' name='total' value="${total}"/>`
    var msg=`<span id=${errormsg} style='color:red' class='col-1'></span>`
    var element6= `<input type='button' name='txtbtn' class='btnremove m-1 col-1' id='${btnremove}' class='m-1'  onclick='removeElement(this)' value='Remove'/>`
    var div = document.createElement("div");
    div.id = "innerdiv" + inptxt;
	  div.className  = "innerdiv";
    div.innerHTML = element5 + inpdemo1 + element1 + element2 + element3 + element4 + msg + element6 + count  ;
    parent.appendChild(div);
    
    
	 // let inpdemo = `<input type="hidden" name="inpdemo"  value="${total}"/>`;
	  //let remove = `<input type="hidden" name="remove"  value="${remove}"/>`;


	  //previewCon.innerHTML = inpdemo;
	  //previewCon.innerHTML = remove;

}



function removeElement(elem) {


  // let inpdemo = `<input type="hidden" name="remove"  value="${remove}"/>`;
	// previewCon.innerHTML = inpdemo;
  var demo = elem.parentNode.id;

  const myobj = document.getElementById(demo);
  var first =myobj.firstChild.value;
  
  remove.push(first);
  console.log(remove);
  myobj.remove();
  //let inpdemo = `<input type="hidden" name="inpdemo"  value="${total}"/>`;
  let inpdemo = `<input type="hidden" name="remove"  value="${remove}"/>`;
  previewCon.innerHTML = inpdemo;
	//previewCon.innerHTML = remove;
}


</script>
</center>
</body>
</html>
<!-- 
// function removeElement() {
// const removeButtons = document.getElementsByClassName('btnremove');

// Array.from(removeButtons).forEach((removeButton) => {
//   removeButton.addEventListener('click', () => {
//     removeButton.parentNode.remove();
//   });
// });
// }

// function removeElement() {
// var btn = document.getElementsByClassName('btnremove')
// for (var i = 0; i < btn.length; i++) {
//   btn[i].addEventListener('click', function(e) {
//     e.currentTarget.parentNode.remove();
//   }, false);
// }
// } -->