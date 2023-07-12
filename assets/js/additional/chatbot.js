$(document).ready(function () {

    if (new_chat === "no") {
        load_history(current_con_id);
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


        $.ajax({
            url: base_url + "chatbot/generate_response",
            type: 'POST',
            data: {
                prompt: prompt,
                new_chat: new_chat,
                con_id: current_con_id
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
        if (new_chat === "yes") {

            //ajax to get latest added conversation history row id
            $.ajax({
                url: base_url + "chatbot/get_latest_con_id",
                method: "GET",
                dataType: "json",
                success: function (response) {

                    $('#conversation_list').append('<div onclick = "load_history(' + response.con_id + ')" class="card shadow chatbubble mt-2" style=" color: black;">' +
                        '    <div class="card-body">' +
                        '        ' + response.con_name + '' +
                        '    </div>' +
                        '</div>');

                    //set current con_id to newly created con_id
                    current_con_id = response.con_id;
                    
                },
                error: function (xhr, status, error) {
                    // Handle errors, if any
                    console.error(error);
                }
            });

        }

        new_chat = "no";

    }
}

function open_new_chat() {
    new_chat = "yes";
    $('#conversation_body').empty();
    $('#conversation_body').append(`
    <div class="row justify-content-center py-2" id="new_chat_info">
        <div class="col-xl-7 py-2">
            <div class="card shadow chatbubble" style="color: black;">
                <div class="card-body">
                    Ask the chatbot about something
                </div>
            </div>
        </div>
        <div class="col-xl-7 py-2">
            <div class="card shadow chatbubble" style="color: black;">
                <div class="card-body">
                    Do not know where to start? Try asking these questions!
                    <div class="card my-2" style="color: black; background-color: #F2F0F0; border-radius: 40px; width: 50%; padding-top:0px; padding: bottom 0px;">
                        <div class="card-body">
                            List out the top 5 most profitable items sold in the past 12 months
                        </div>
                    </div>
                    <div class="card my-2" style="color: black; background-color: #F2F0F0; border-radius: 40px; width: 50%; padding-top:0px; padding: bottom 0px;">
                        <div class="card-body">
                            What are the company’s policies on vacation time and sick leave?
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
`);
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

            //set new con_id
            current_con_id = con_id;

            $('#conversation_body').empty();


            //append chat history
            $.each(response, function (index, chat) {

                if (chat.role == 1) {

                    $('#conversation_body').append('<div class="row py-2 mr-5 my-1 ml-2">' +
                        '    <div class="card chatbubble mr-4" style="background-color: #eaeaea; color: black; ">' +
                        '        <div class="card-body">' +
                        '            ' + chat.message + '' +
                        '        </div>' +
                        '    </div>' +
                        '</div>');

                } else {

                    $('#conversation_body').append('<div class="row py-2 ml-5 my-1 mr-2 justify-content-end">' +
                        '    <div class="card chatbubble ml-4" style="background-color: #007aff; color: white; white-space: pre; word-break: break-all; ">' +
                        '        <div class="card-body response-card">' + chat.message + '</div>' +
                        '    </div>' +
                        '</div>');
                }

            });
            //Close loading pop up
            swal.close();

        },
        error: function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'There was an error loading your history, please try again',
            })
        }
    });
}