// Array of quiz symptoms questions

// if(database == "quiz_symptom"){

// } else if(database == "quiz_tips"){

// } else {

// }
var quiz_questions = [
    "1. Which of the following is a common early symptom of dementia?",
    "2. Memory loss in dementia typically affects which type of memory?",
    "3. Difficulty with language and communication is a symptom of dementia known as:",
    "4. What type of memory is often preserved in individuals with dementia?",
    "5. Which of the following is a common cognitive symptom of dementia?",
    "6. Changes in mood and behavior are often observed in individuals with dementia.",
    "7. Dementia can cause difficulties with which of the following?",
    "8. What sleep disturbances are commonly associated with dementia?",
    "9. Motor symptoms such as tremors can be present in certain types of dementia.",
    "10. Which of the following is not a common risk factor for dementia?"
];

// Arrays of options
var option_a = [
    "Memory loss",
    "Short-term memory loss",
    "Aphasia",
    "Short-term memory",
    "Difficulty with concentration and attention",
    "Agitation",
    "Language skills",
    "Insomnia",
    "Tremors",
    "Smoking"
];

var option_b = [
    "Confusion",
    "Long-term memory loss",
    "Apraxia",
    "Long-term memory",
    "Visual hallucinations",
    "Apathy",
    "Problem-solving",
    "Sleep apnea",
    "Muscle weakness",
    "High blood pressure"
];

var option_c = [
    "Difficulty with language",
    "Semantic memory loss",
    "Agnosia",
    "Procedural memory",
    "Problems with executive functions",
    "Depression",
    "Memory recall",
    "Restless legs syndrome",
    "Speech difficulties",
    "Obesity"
];

var option_d = [
    "Mood swings",
    "Procedural memory loss",
    "Apathy",
    "Episodic memory",
    "Impaired judgment",
    "Anxiety",
    "Social interactions",
    "REM sleep behavior disorder",
    "Vision problems",
    "Diabetes"
];

var symptom_correct_answers = [1, 2, 3, 4, 1, 2, 3, 4, 1, 4];


$(document).ready(function () {

    $('#leave_button').click(function () {

        Swal.fire({
            text: 'Are you sure you want leave?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#1cc88a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = base_url + "quiz";
            }
        })

    });

    update_ans_ques(progress);



});

function update_ans_ques(progress){
    $("#question").text(quiz_questions[progress]);
    $("#answer_a").text(option_a[progress]);
    $("#answer_b").text(option_b[progress]);
    $("#answer_c").text(option_c[progress]);
    $("#answer_d").text(option_d[progress]);
}