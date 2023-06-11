<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    input[type="text"] {
        width: 500px;
    }
    </style>
    <meta charset="UTF-8">
    <title>Test Input</title>
    <script>
    function addSubQuestions(mainQuestion) {
        const numSubQuestions = parseInt(document.getElementById(`num_sub_questions_${mainQuestion}`).value);
        const subQuestionsContainer = document.getElementById(`sub_questions_${mainQuestion}`);
        subQuestionsContainer.innerHTML = '';
        for (let i = 1; i <= numSubQuestions; i++) {
            subQuestionsContainer.innerHTML += `
                    <div>
                        <label for="sub_question_${mainQuestion}_${i}">Subquestion ${i}:</label>
                        <textarea id="sub_question_${mainQuestion}_${i}" name="sub_question_${mainQuestion}_${i}" required maxlength="10000"></textarea>
                        <label for="marks_${mainQuestion}_${i}">Marks:</label>
                        <input type="number" id="marks_${mainQuestion}_${i}" name="marks_${mainQuestion}_${i}" min="1" required>
                        <label for="co_${mainQuestion}_${i}">CO:</label>
                        <input type="number" id="co_${mainQuestion}_${i}" name="co_${mainQuestion}_${i}" min="1" max="6" required>
                        <label for="bl_${mainQuestion}_${i}">BL:</label>
                        <input type="number" id="bl_${mainQuestion}_${i}" name="bl_${mainQuestion}_${i}" min="1" max="6" required>
                    </div>`;
        }
    }
    </script>
</head>

<body>
    <h1>Enter Test Details</h1>
    <form action="<?php echo site_url('test_input/handle-form-submission'); ?>" method="POST">
        <label for="num_main_questions">Number of Main Questions:</label>
        <input type="number" id="num_main_questions" name="num_main_questions" min="1" onchange="addMainQuestions()"
            required><br><br>
        <div id="main_questions_container"></div>
        <button type="submit">Submit</button>
    </form>
    <script>
    function addMainQuestions() {
        const numMainQuestions = parseInt(document.getElementById('num_main_questions').value);
        const mainQuestionsContainer = document.getElementById('main_questions_container');
        mainQuestionsContainer.innerHTML = '';
        for (let i = 1; i <= numMainQuestions; i++) {
            mainQuestionsContainer.innerHTML += `
                    <div>
                        <h3>Main Question ${i}</h3>
                        <label for="num_sub_questions_${i}">
                            Number of Subquestions:</label>
                        <input type="number" id="num_sub_questions_${i}" name="num_sub_questions_${i}" min="1" onchange="addSubQuestions(${i})" required>
                        <div id="sub_questions_${i}"></div>
                    </div>`;
        }
    }
    </script>
</body>

</html>