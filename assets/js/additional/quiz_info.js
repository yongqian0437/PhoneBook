// Array of quiz symptoms questions

if (database == "quiz_symptom") {

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

    var correct_answers = [1, 2, 3, 4, 1, 2, 3, 4, 1, 4];

} else if (database == "quiz_tips") {
    var quiz_questions = [
        "1. What is an effective tip for communicating with someone with dementia?",
        "2. How can you create a calm and comfortable environment for communication?",
        "3. Which approach is recommended for effective communication with dementia patients?",
        "4. What is a helpful strategy for engaging in conversation with someone with dementia?",
        "5. How can you improve comprehension during communication with a person with dementia?",
        "6. Which type of questions should you use when communicating with someone with dementia?",
        "7. What is an important aspect of non-verbal communication in dementia care?",
        "8. How can you demonstrate empathy and understanding in communication with a person with dementia?",
        "9. What is a potential barrier to effective communication with dementia patients?",
        "10. How can you encourage participation and involvement in communication with a person with dementia?"
    ];

    var option_a = [
        "Speak loudly",
        "Rush the conversation",
        "Interrupt frequently",
        "Use abstract and ambiguous language",
        "Use formal language",
        "Ask open-ended questions",
        "Avoid physical touch",
        "Minimize distractions",
        "Assuming memory loss",
        "Speak in a louder tone"
    ];

    var option_b = [
        "Keep the environment noisy",
        "Create a quiet and soothing atmosphere",
        "Have distractions in the room",
        "Keep the environment bright and busy",
        "Avoid visual aids",
        "Use negative statements",
        "Maintain good eye contact",
        "Use unfamiliar vocabulary",
        "Encouraging reminiscence",
        "Allow adequate response time"
    ];

    var option_c = [
        "Use complex language",
        "Speak quickly",
        "Use technical jargon",
        "Provide lengthy explanations",
        "Speak slowly and clearly",
        "Provide limited response options",
        "Speak in a condescending tone",
        "Assume they understand everything",
        "Avoiding repetition",
        "Speak in a hurried manner"
    ];

    var option_d = [
        "Provide clear and simple instructions",
        "Ask multiple questions at once",
        "Avoid eye contact",
        "Show patience and give time for response",
        "Raise your voice",
        "Interrupt frequently",
        "Use complicated gestures",
        "Finish their sentences",
        "Using complex sentences",
        "Use abstract metaphors"
    ];

    var correct_answers = [4, 2, 1, 4, 3, 1, 2, 1, 1, 2];

} else {

    var quiz_questions = [
        "1. What is an important aspect when dealing with people with dementia?",
        "2. How can you create a supportive environment for individuals with dementia?",
        "3. Which approach is recommended for effective communication with individuals with dementia?",
        "4. What is a helpful strategy for managing challenging behaviors in individuals with dementia?",
        "5. How can you promote independence in daily activities for individuals with dementia?",
        "6. Which type of activities are beneficial for individuals with dementia?",
        "7. What is a key aspect of providing personal care for individuals with dementia?",
        "8. How can you ensure safety in the environment for individuals with dementia?",
        "9. What is an important aspect of interacting with individuals with dementia?",
        "10. How can you provide emotional support to individuals with dementia and their caregivers?"
    ];

    // Array of options A for each quiz question
    var option_a = [
        "Empathy and understanding",
        "Keep the environment noisy",
        "Speak loudly and quickly",
        "Use confrontational approach",
        "Take over tasks completely",
        "Physical exercises",
        "Respect personal space",
        "Remove all safety measures",
        "Avoid eye contact",
        "Provide practical assistance only"
    ];

    // Array of options B for each quiz question
    var option_b = [
        "Patience and flexibility",
        "Create a calm and soothing atmosphere",
        "Speak in complex language",
        "Ignore challenging behaviors",
        "Do everything for them",
        "Social activities",
        "Maintain dignity and privacy",
        "Make the environment cluttered",
        "Speak loudly and quickly",
        "Focus on physical care only"
    ];

    // Array of options C for each quiz question
    var option_c = [
        "Isolation and exclusion",
        "Have distractions in the room",
        "Use technical jargon",
        "Punish and reprimand",
        "Encourage complete dependence",
        "Cognitive activities",
        "Use force during personal care",
        "Provide obstacles and hazards",
        "Use formal language",
        "Ignore emotional needs"
    ];

    // Array of options D for each quiz question
    var option_d = [
        "Rushing and impatience",
        "Create a supportive and understanding environment",
        "Speak slowly and clearly",
        "Redirect and distract",
        "Promote independence and choice",
        "Art and music therapy",
        "Respect preferences and choices",
        "Ensure a safe and hazard-free environment",
        "Show empathy and understanding",
        "Focus on physical care only"
    ];

    // Array of correct answers for each quiz question
    var correct_answers = [1, 2, 3, 4, 1, 2, 3, 4, 1, 3];

}