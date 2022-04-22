/*$("#add").click(function() {

    for( i = 0; i < 10 ; i++){
    var inputs = "";
    inputs += '<div class="row justify-content-center">';
    inputs +='<div class="col">';
    inputs +='<div class="form-group mb-2">';
    inputs +='<label for="username">Username</label>';
    inputs +='<input type="text" class="form-control" name="username[]" id="username_'+ [i] +'" placeholder="Enter Your Username">';
    inputs +='</div>';
    inputs += '<div id="username-info">';
    inputs +='</div>';
    inputs +='</div>';
    inputs +='<div class="col">';
    inputs +='<div class="form-group mb-2">';
    inputs +='<label for="email">Email</label>';
    inputs +='<input type="text" class="form-control" name="email[]" id="email_'+ [i] +'" placeholder="Enter Your Email Address" >';
    inputs +='</div>';
    inputs += '<div id="email-info">';
    inputs +='</div>';
    inputs +='</div>';
    inputs +='<div class="col">';
    inputs +='<div class="form-group mb-2">';
    inputs +='<label for="drop">Drop Values</label>';
    inputs +='<select name="drop[]" id="drop_'+ [i] + '" class="form-control">';
    inputs +='<option value="" selected>Select your Value</option>';
    inputs +='<option value="dfsd">dfsd</option>';
    inputs +='<option value="ert">ert</option>';
    inputs +='<option value="srt">srt</option>';
    inputs +='<option value="bfsg">bfsg</option>';
    inputs +='</select>';
    inputs +='</div>';
    inputs += '<div id="drop-info">';
    inputs +='</div>';
    inputs +='</div>';
    inputs +='<div class="col">';
    inputs +='<div class="form-group mb-2">';
    inputs +='<label for="image">User_Pic</label>';
    inputs +='<input type="file" class="form-control" name="image[]" id="image_'+ i++ +'">';
    inputs +='</div>';
    inputs +='</div>';
    inputs +='<div class="col">';
    inputs +='<div class="form-group-append mt-4">';         
    inputs +='<button id="removeFields" type="button" class="btn btn-danger">Remove</button>';
    inputs +='</div>';
    inputs +='</div>';
    }  
    $('#newFields').append(inputs);   
});*/
function add(){
    // alert("hello");
    var inputs = parseInt($('#total_fields').val())+1;
    var new_input = '<div class="row justify-content-center">'+
                        '<div class="col">'+
                            '<div class="form-group mb-2">'+
                                '<label for="username'+ inputs +'">Username</label>'+
                                '<input type="text" value="" name="username[]" id="username'+ inputs +'" class="form-control" placeholder="Enter Your username">'+
                            '</div>'+
                            '<div id="username-info'+ inputs +'">'+
                                                    
                            '</div>'+                                    
                        '</div>'+
                        '<div class="col">'+
                            '<div class="form-group mb-2">'+
                                '<label for="email'+ inputs +'">Email</label>'+
                                '<input type="text" value="" name="email[]" id="email'+inputs+'" class="form-control" placeholder="Enter Your username">'+
                            '</div>'+
                            '<div id="email-info'+ inputs +'">'+
                                                    
                            '</div>'+                                 
                        '</div>'+
                        '<div class="col">'+
                            '<div class="form-group mb-2">'+
                                '<label for="drop'+ inputs +'">Select Values</label>'+
                                '<select name="drop[]" id="drop'+inputs+'" class="form-control">'+
                                    '<option value="" selected>Select your Value</option>'+
                                    '<option value="dfsd">dfsd</option>'+
                                    '<option value="ert">ert</option>'+
                                    '<option value="srt">srt</option>'+
                                    '<option value="bfsg">bfsg</option>'+
                                '</select>'+
                            '</div>'+
                            '<div id="drop-info'+ inputs +'">'+
                                                    
                            '</div>'+
                        '</div>'+
                        '<div class="col">'+
                            '<div class="form-group mb-2">'+
                                '<label for="image'+inputs+'">Image</label>'+
                                '<input type="file"  class="form-control" name="image[]" id="image'+inputs+'">'+
                            '</div>'+
                            '<div id="image-info'+ inputs +'">'+
                                                    
                            '</div>'+
                        '</div>'+
                        '<div class="col m-4">'+
                            '<div class="form-group-append">'+              
                                '<button id="removeFields" type="button" class="btn btn-danger">Remove</button>'+
                            '</div>'+
                        '</div>'
                    '</div>'
    $('#addNewFields').append(new_input);
    $('#total_fields').val(inputs);
    // function validationForm() {
    //     console.log(document.getElementById("username1"));
    // }
    
}

function validateForm() {  
    let username = document.forms.addInputs.username;
    let email = document.forms.addInputs.email;
    let drop = document.forms.addInputs.drop;
    let image = document.forms.addInputs.image;
    var drop_len = drop.value.length;
    if(drop_len)
    {
        var username_len = username.value.length;
        if(username_len == "")
        {
            document.getElementById("username-info").innerHTML = "username is required.";
            username.focus();
            return false;
        }
        var email_len = email.value.length;
        if (email_len == 0 ){
            document.getElementById("email-info").innerHTML = "email is required.";
            email.focus();
            return false;
        } 
    }
    var max = 20;
    var user1 = [];
    var email1 = [];
    var drop1 = [];
    var image1 = [];
    for(i=1; i<=max; i++) 
    {
        var user1 = document.forms.addInputs["username"+i+""];
        var email1 = document.forms.addInputs["email"+i+""];
        var drop1 = document.forms.addInputs["drop"+i+""];
        var image1 = document.forms.addInputs["image"+i+""].value;
        var drop1_len = drop1.value.length;
        if(drop1_len) {
            user1_len = user1.value.length;
            if(user1_len == '') {
                document.getElementById('username-info'+i).innerHTML = 'username is required';
                user1.focus();
                return false;
            }
            email1_len = email1.value.length;
            if(email1_len == '') {
                document.getElementById('email-info'+i).innerHTML = 'username is required';
                email1.focus();
                return false;
            }
        }
    }
            
        
}
        
        
   