function start_sendig() {

    $('#responce').html("Sending to <span id='curent-number'></span>");
    var numbers = $('#numbers').val();
    var message = $('#message').val();
    var path_uri = "multiple_number.php";
    var number = numbers.split('+');
    var key = "";
    var secrete = "";
    var dummy_number = "";


    //radio button value
    var provider = $('input[name=radio-grp]:checked').val();


    if (provider == "nexmo") {
        key = $('#key').val();
        secrete = $('#secrete').val();
        dummy_number = $('#nexmo-from').val();
    } else if (provider == "twilio") {
        key = $('#sid').val();
        secrete = $('#token').val();
        dummy_number = $('#twilio_number').val();

    } else if (provider == "textlocal") {
        key = $('#textlusername').val();
        secrete = $('#textlhash').val();
        dummy_number = $('#textlocal-from').val();
    } else if (provider == "sinch") {

        key = $('#service_plan_id').val();
        secrete = $('#bearer_token').val();
        dummy_number = $('#send_from').val();
    } else if (provider == "telnyx") {
        key = $('#apiKey').val();
        secrete = $('#telnyx_token').val();
        dummy_number = $('#telnyx_send_from').val();
    }


    $.ajax({
        type: "POST",
        url: path_uri,
        data: {
            numbers: number_loop(number),
            message: message,
            provider: provider,
            key: key,
            secrete: secrete,
            dummy_number: dummy_number
        },
        success: function (data) {

            console.log(data);


            var json = $.parseJSON(data);
            if (json[2] == "nexmo") {
                if (json[1] == "0") {
                    $('#responce').html("Message Sent Successfully to " + json[0] + " !!");
                }
            } else if (json.response == "success") {
                $('#responce').html("Message Sent Successfully to " + json.current + " !!");
            } else {
                $('#responce').html("Error to Sent " + json.current + " !!");
            }

        }

    });
}


var i = 0;

//upload xls
$('#upload_list').on('change', function () {
    $('#outer-loader').show();
    var file_data = $('#upload_list').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);


    $.ajax({
        url: 'uploadtxt.php', // point to server-side PHP script 
        dataType: 'text', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (data) {
            $('#numbers').html(data);

        }
    });
});


$(document).ready(function () {
    $('input[name=radio-grp]').change(function () {
        if ($('#rdo-0').prop('checked')) {
            $('.enable-nexmo').show();
            $('.enable-twilio').hide();
            $('.enable-textlocal').hide();
        } else if ($('#rdo-1').prop('checked')) {

            //twilio
            $('.enable-twilio').show();
            $('.enable-nexmo').hide();
            $('.enable-textlocal').hide();

        } else if ($('#rdo-2').prop('checked')) {
            $('.enable-twilio').hide();
            $('.enable-nexmo').hide();
            $('.enable-textlocal').show();
        } else if ($('#rdo-4').prop('checked')) {
            $('.enable-twilio').hide();
            $('.enable-nexmo').hide();
            $('.enable-textlocal').hide();
            $('.enable-sinch').show();
            $('.enable-telnyx').hide();
        } else if ($('#rdo-5').prop('checked')) {
            $('.enable-twilio').hide();
            $('.enable-nexmo').hide();
            $('.enable-textlocal').hide();
            $('.enable-sinch').hide();
            $('.enable-telnyx').show();
        }
    });

});
