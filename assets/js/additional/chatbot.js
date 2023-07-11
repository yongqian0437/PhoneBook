$(document).ready(function () {

    if (!new_chat) {
        load_history(con_id);
        $('#new_chat_info').hide();
    }

});


function enter_prompt() {
    var prompt = $('#user_prompt').text();

    if (prompt !== '') {

        //loading
        Swal.fire({
            title: 'The chatbot is responding...',
            html: 'Please wait...',
            allowEscapeKey: false,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });

        $('#new_chat_info').hide();

        //append user prompt text
        $('#conversation_body').append('<div class="row py-2 mr-5 my-1 ml-2">' +
            '    <div class="card chatbubble mr-4" style="background-color: #eaeaea; color: black; ">' +
            '        <div class="card-body">' +
            '            ' + prompt + '' +
            '        </div>' +
            '    </div>' +
            '</div>');


        $('#conversation_body').append('<div class="row py-2 ml-5 my-1 mr-2 justify-content-end">' +
            '    <div class="card chatbubble ml-4" style="background-color: #007aff; color: white;">' +
            '        <div class="card-body">' +
            '            test' +
            '        </div>' +
            '    </div>' +
            '</div>');


        $.ajax({
            url: base_url + "chatbot/generate_response",
            type: 'POST',
            data: {
                prompt: prompt,
                new_chat: new_chat,
                con_id: con_id
            },
            dataType: "json",
            success: function (response) {

                //Close loading pop up
                swal.close();

                //change global variable so its NOT a new chat
                var delay = 20; // Delay in milliseconds between each character

                //append gpt response text
                $('#conversation_body').append('<div class="row py-2 ml-5 my-1 mr-2 justify-content-end">' +
                    '    <div class="card chatbubble ml-4" style="background-color: #007aff; color: white;">' +
                    '        <div class="card-body response-card"></div>' +
                    '    </div>' +
                    '</div>');

                // Append text with the writing effect
                appendTextWithDelay(response, delay);


            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'There was an error generating your response, please try again',
                })
            }
        });


        //Append new card to conversation list if its a new chat
        if (new_chat = true) {

            $.ajax({
                url: base_url + "chatbot/generate_response",
                type: 'POST',
                data: {
                    user_id: user_id,
                },
                dataType: "json",
                success: function (response) {

                    //Close loading pop up
                    swal.close();

                    //change global variable so its NOT a new chat
                    var delay = 20; // Delay in milliseconds between each character

                    //append gpt response text
                    $('#conversation_body').append('<div class="row py-2 ml-5 my-1 mr-2 justify-content-end">' +
                        '    <div class="card chatbubble ml-4" style="background-color: #007aff; color: white;">' +
                        '        <div class="card-body response-card"></div>' +
                        '    </div>' +
                        '</div>');

                    // Append text with the writing effect
                    appendTextWithDelay(response, delay);


                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'There was an error generating your response, please try again',
                    })
                }
            });

            //ajax to get latest added conversation history row id
            //======================= Need to change ========================

            $('#conversation_list').append('<div onclick = "load_history()" class="card shadow chatbubble" style=" color: black;">' +
                '    <div class="card-body">' +
                '         test' +
                '    </div>' +
                '</div>');
        }
        new_chat = false;

    }
}

function open_new_chat() {
    new_chat = 0;
    $('#new_chat_info').show();
}

function appendTextWithDelay(text, delay) {
    var index = 0;
    var cardBody = $('.response-card:last');

    var interval = setInterval(function () {
        cardBody.append(text[index]);
        index++;

        if (index >= text.length) {
            clearInterval(interval);
        }
    }, delay);
}

// Dealing with Textarea Height
function calcHeight(value) {
    let numberOfLineBreaks = (value.match(/\n/g) || []).length;
    // min-height + lines x line-height + padding + border
    let newHeight = 20 + numberOfLineBreaks * 20 + 12 + 2;
    return newHeight;
}

let textarea = document.querySelector(".resize-ta");
textarea.addEventListener("keyup", () => {
    textarea.style.height = calcHeight(textarea.value) + "px";
});



function load_history(con_id) {

    //loading pop up
    Swal.fire({
        title: 'The chatbot is responding...',
        html: 'Please wait...',
        allowEscapeKey: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading()
        }
    });

    $.ajax({
        url: base_url + "chatbot/load_conversation_history",
        type: 'POST',
        data: {
            con_id: con_id,
        },
        dataType: "json",
        success: function (response) {

            //Close loading pop up
            swal.close();

            //======================= Need to change ========================
            //append gpt response text
            $('#conversation_body').append('<div class="row py-2 ml-5 my-1 mr-2 justify-content-end">' +
                '    <div class="card chatbubble ml-4" style="background-color: #007aff; color: white;">' +
                '        <div class="card-body response-card"></div>' +
                '    </div>' +
                '</div>');


        },
        error: function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'There was an error generating your response, please try again',
            })
        }
    });
}