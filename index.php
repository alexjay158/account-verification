<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="assets/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <style>

            body{
                background-image: url(body-bg.jpg);
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;

            }


            body .col-md-8{
                background: #fff;
                padding: 20px;
                margin-top: 30px;
            }

            #submit-btn{
                background: #4c6a96;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h3>SMS Master<hr></h3>
                    <div id="responce"></div>

                    <div class="cntr">

                        <label for="rdo-4" class="btn-radio">
                            <input type="radio" id="rdo-4" name="radio-grp" value="sinch">
                            <svg width="20px" height="20px" viewBox="0 0 20 20">
                            <circle cx="10" cy="10" r="9"></circle>
                            <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                            <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                            </svg>
                            <span>sinch</span>
                        </label>

                        <label for="rdo-5" class="btn-radio">
                            <input type="radio" id="rdo-5" name="radio-grp" value="telnyx">
                            <svg width="20px" height="20px" viewBox="0 0 20 20">
                            <circle cx="10" cy="10" r="9"></circle>
                            <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                            <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                            </svg>
                            <span>telnyx</span>
                        </label>




                        <div style="clear: both;"></div>
                    </div>
                    
                    <br>

                    <div class="form-group hidden-container enable-twilio">
                        <input type="text" id="sid" placeholder="SID">
                        <input type="text" id="token" placeholder="Token">
                        <input type="text" id="twilio_number" placeholder="Twilio Number">

                    </div>


                    <div class="form-group hidden-container enable-nexmo">
                        <input type="text" id="key" placeholder="Key">
                        <input type="text" id="secrete" placeholder="Secrete">
                        <input type="text" id="nexmo-from" placeholder="Sender Name eg. Nexmo">
                    </div>

                    <div class="form-group hidden-container enable-textlocal">
                        <input type="text" id="textlusername" placeholder="Username">
                        <input type="text" id="textlhash" placeholder="Hash">
                        <input type="text" id="textlocal-from" placeholder="Sender Name eg. TXTLCL">
                    </div>

                    <div class="form-group hidden-container enable-sinch">
                        <input type="text" id="service_plan_id" placeholder="Service Id">
                        <input type="text" id="bearer_token" placeholder="Token">
                        <input type="text" id="send_from" placeholder="From">
                    </div>
                    
                    
                    
                      <div class="form-group hidden-container enable-telnyx">
                        <input type="text" id="apiKey" placeholder="API Key" value="KEY01787B31F7123FBE65D732E427F53B60_BSeju2mqgJ3RqU3TyQXo">
                        <input type="hidden" id="telnyx_token" placeholder="Token" value="000000">
                        <input type="text" id="telnyx_send_from" placeholder="From" value="+12182101595">
                    </div>


                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="float-rigth comman">
                            <textarea placeholder="Phone Number List" id="numbers"></textarea>
                        </div>


                        <div class="float-left comman">
                            <textarea placeholder="Message" id="message"></textarea>
                        </div>




                        <div class="form-group comman">
                            <span>Upload your number list(txt)</span>
                            <input type="file" id="upload_list">
                        </div>






                        <div style="clear: both">
                            <input class="btn" type="button" id="submit-btn" value="Send Now" onclick="start_sendig();">
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>




        </div>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="assets/main.js" type="text/javascript"></script>
    </body>
</html>
