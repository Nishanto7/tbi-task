<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Form Inputs Feilds</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-warning mb-3" name="add" id="add" onclick="add()">+</button>
                        <form method="POST" action="display.php" id="addForm" enctype="multipart/form-data" name='addInputs' onsubmit="return validateForm()">
                           
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div id="addFields">
                                        <div class="row justify-content-center ">
                                            <div class="col">
                                                <div class="form-group mb-2">
                                                    <label for="username">Username</label>
                                                    <input type="text" name="username[]" id="username" class="form-control" placeholder="Enter Your username">
                                                </div>
                                                <div id="username-info">
                                                    
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group mb-2">
                                                    <label for="email">Email</label>
                                                    <input type="text" id="email" name="email[]" class="form-control" placeholder="Enter Your Email Address" />
                                                </div>
                                                <div id="email-info">
                                                    
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group mb-2">
                                                    <label for="drop">Select Values</label>
                                                    <select name="drop[]" id="drop" class="form-control">
                                                        <option value="" selected>Select your Value</option>
                                                        <option value="dfsd">dfsd</option>
                                                        <option value="ert">ert</option>
                                                        <option value="srt">srt</option>
                                                        <option value="bfsg">bfsg</option>
                                                    </select>
                                                </div>
                                                <div id="drop-info">
                                                    
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group mb-2">
                                                    <label for="image">User_Pic</label>
                                                    <input type="file"  class="form-control" name="image[]" id="image">
                                                </div>
                                            </div>
                                            <div class="col m-4">
                                                <div class="form-group-append">                
                                                    <button id="removeFields" type="button" class="btn btn-danger">Remove</button>
                                                </div>
                                            </div>
                                            <div id="newFields"></div>
                                            <input type="hidden" value="0" id="total_fields">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="addNewFields"></div>
                                </div>
                                <div class="con-md-12 submit-btn">
                                        <button type="submit" name="submit"  id="frmsubmit" class="btn btn-primary mt-3" >Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>