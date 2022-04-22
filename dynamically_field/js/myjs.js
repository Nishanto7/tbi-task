
// //     // var remove_element = document.getElementById('me').remove();
// //  var input1 = document.createElement("INPUT");
// //  input1.setAttribute("type","text");

// //  var addbtn = document.getElementById('addbtn');
// //  addbtn.appendChild(input1);

// // $(button).after('<br><input type="text"><button>Hii</button>');
// function addBtn()
// {
// //     var count = document.getElementById('count');
// //     var getCount = parseInt(count.value);
// //    getCount = getCount+1;
// //    document.getElementById('count').value=getCount;
// // var group_id = "id"+getCount
// // alert("id"+getCount);

//  $("#output").append("<div id='btn_box' class='ms-5'><br><input type='text' class='ms-3 p-3 rounded'>\
//  <input type='text' class='ms-3 p-3 rounded'>\
//  <button class='ms-3 p-3 btn btn-danger' onclick='document.getElementById(\"btn_box\").remove();'>\
//  REMOVE</button><br>\
//  </div>");
// }

 
    


// // document.getElementsByTagName("p")
// // function addBtn()

// // {
// // //     var count = document.getElementById('count');
// // //     var getCount = parseInt(count.value);
// // //    getCount = getCount+1;
// // //    document.getElementById('count').value=getCount;

// // // alert("id"+getCount);
// // // var btnId = "id"+getCount;

// // //     var my="Hello";
// // //     $(button).after("<br><br>\
// // //     <div id='id"+btnId+"'>\
// // //     <input type='text' class='p-3 ms-3 rounded' value=''>\
// // // <input type='text' class='p-3 ms-3 rounded'>\
// // // <input type='button' class='p-3 ms-3 rounded btn btn-danger' value='REMOVE' \
// // // onclick='document.getElementById('').remove();'>\
// // // </div>\
// // //     ");

// // //  var input1 = document.createElement("INPUT");
// // //  input1.setAttribute("type","text");

// // //  var addbtn = document.getElementById('addbtn');
// // //  addbtn.appendChild(input1);


// // }


// function addBtn()
// {

//   var count = document.getElementById('count');
//  var getCount = parseInt(count.value);
// getCount = getCount+1;
//  document.getElementById('count').value=getCount;
// var group_id = "id"+getCount
// // alert("id"+getCount);
// var output = document.getElementById('output');
// output.innerHTML+="<div id='"+group_id+"'><br>Row"+getCount+"<input type='text' class='ms-3 p-3 rounded'>\
//  <input type='text' class='ms-3 p-3 rounded'>\
//  <button class='ms-3 p-3 btn btn-danger' onclick='\
//  document.getElementById(\""+group_id+"\").remove();'>\
//  REMOVE</button><br></div>\
// \
// ";
// }

//               alert(\"hello\");




function addBtn()
{

  var count = document.getElementById('count');
 var getCount = parseInt(count.value);
getCount = getCount+1;

 document.getElementById('count').value=getCount;
var group_id = "id"+getCount
// alert("id"+getCount);
var output = document.getElementById('output');
$("#output").append(`<div id='${group_id}'>\
<br><input type='text' class='ms-3 p-3 rounded' name='mydata[]' id='mytxt1${group_id}'>\
 <input type='text' class='ms-3 p-3 rounded' name='mydata[]' id='mytxt2${group_id}'>\
 \
 
 \
 <input type='file' class='ms-3 p-3 rounded' name='imgdata[]' accept='image/*'\
  style='' onchange='loadFile${group_id}(event)' \
 id='imgFile${group_id}'>\
 \
 \
 <script>\
 function loadFile${group_id}(event) {\
  var output = document.getElementById('output${group_id}');\
  output.style.visibility='visible';\
  output.src = URL.createObjectURL(event.target.files[0]);\
  output.onload = function() {\
    URL.revokeObjectURL(output.src);\
  }\
}\
 </script>\
 \
 <img id='output${group_id}' style='visibility: hidden;' width='100px' height='100px' class='ms-3 p-3'/>\
 <button class='ms-3 p-3 btn btn-danger' onclick='\
 document.getElementById(\"${group_id}\").remove();'>\
 <svg xmlns='http://www.w3.org/2000/svg' width='35' height='35'\
  fill='currentColor' class='bi bi-tras' viewBox='0 0 16 16'>\
 <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>\
 <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>\
</svg>\
 </button>\
 <script>
$("#mytxt1${group_id}").keyup(()=>
{
  $inputData = document.getElementById("mytxt1${group_id}").value;
  function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
}

if(isEmptyOrSpaces($inputData))
{
  document.getElementById("imgFile${group_id}").required = false;
}
else
{

  document.getElementById("imgFile${group_id}").required = true;
}

});
 </script>
 \<br></div>\
\
\
\
\
\
`);
}
//============create file ===================
// var txt1= "mytxt1"+group_id;
// var txt2 ="mytxt2"+group_id;
// $.ajax({
//   type:'POST',
//   url:'writedata.php',
//   data:{'input1':txt1,'input2':txt2},
//   success:function(data){

//   }
//   });
// }

// output.innerHTML+=


//================= F O R M    V A L I D A T I O N ================================
