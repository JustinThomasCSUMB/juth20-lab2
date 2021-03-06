<!DOCTYPE html>
<html>
<!--

First Website
and comment
in html
(comments can span multiple lines)

-->

<!-- This is the head -->
<!-- All styles and javascript go inside the head -->
    <head>
        <meta charset="utf-8"/>
        <title>US Quiz</title>
        <!--<link href="css/style.css" rel="stylesheet" type="text/css"/>-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
        <script>
            $(document).ready(function(){
                
                var score = 0;
                var attempts = localStorage.getItem("total_attempts");
                    
                $("button").on("click", gradeQuiz);
                
                $(".q5Choice").on("click", function(){
                    $(".q5Choice").css("background-color","");
                    $(this).css("background-color","rgb(255, 255, 0)")
                });
                
                displayQ4Choices();
                
                function isFormValid(){
                    let isValid = true;
                    if($("#q1").val() == ""){
                        isValid = false;
                        $("#validationFeedback").html("Question 1 was not answered");
                    }
                    return isValid;
                }// isFormValid
                
                function gradeQuiz(){
                    $("#validationFeedback").html("");
                    if(!isFormValid()){
                        return;
                    }
                    
                    let q1Response = $("#q1").val().toLowerCase();
                    let q2Response = $("#q2").val();
                    let q4Response = $("input[name=q4]:checked").val();
                    let q7Response = $("#q7").val();
                    let q8Response = $("#q8").val().toLowerCase();
                    
                    if(q1Response == "sacramento"){
                        rightAnswer(1);
                    }else {
                        wrongAnswer(1);
                    }
                    
                    if(q2Response == "mo"){
                        rightAnswer(2);
                    }else {
                        wrongAnswer(2);
                    }
                    
                    if($("#Jefferson").is(":checked") && $("#Roosevelt").is(":checked") && !$("#Jackson").is(":checked") && !$("#Franklin").is(":checked")){
                        rightAnswer(3);
                    }else {
                        wrongAnswer(3);
                    }
                    
                    if(q4Response == "Rhode Island"){
                        rightAnswer(4);
                    }else{
                        wrongAnswer(4);
                    }
                    
                    if($("#seal2").css("background-color") == "rgb(255, 255, 0)"){
                        rightAnswer(5);
                    }else {
                        wrongAnswer(5);
                    }
                    
                    if($("#California").is(":checked") && !$("#Florida").is(":checked")){
                        rightAnswer(6);
                    }else{
                        wrongAnswer(6);
                    }
                    
                    if(q7Response == "bear"){
                        rightAnswer(7);
                    }else{
                        wrongAnswer(7);
                    }
                    
                    if(q8Response == "springfield"){
                        rightAnswer(8);
                    }else{
                        wrongAnswer(8);
                    }
                    
                    if($("#Alaska").is(":checked") && !$("#Texas").is(":checked")){
                        rightAnswer(9);
                    }else{
                        wrongAnswer(9);
                    }
                    
                    if($("#q10False").is(":checked") && !$("#q10True").is(":checked")){
                        rightAnswer(10);
                    }else {
                        wrongAnswer(10);
                    }
                    
                    $("#totalScore").html(`Total Score: ${score}`);
                    $("#totalAttempts").html(`Total Attempts: ${++attempts}`);
                    localStorage.setItem("total_attempts", attempts);
                    
                    if(score >= 80){
                     $("#totalScore").attr("class", "text-success");   
                    }else{
                     $("#totalScore").attr("class", "text-danger");   

                    }
                    
                }// gradeQuiz
                
                function rightAnswer(index){
                    $(`#q${index}Feedback`).html("Correct!");
                    $(`#q${index}Feedback`).attr("class", "bg-success text-white");
                    $(`#markImg${index}`).html("<img src='img/checkmark.png'>");
                    score += 10;
                }// rightAnswer
                    
                function wrongAnswer(index){
                    $(`#q${index}Feedback`).html("Incorrect!");
                    $(`#q${index}Feedback`).attr("class", "bg-warning text-white");
                    $(`#markImg${index}`).html("<img src='img/xmark.png' alt='xmark'>");
                }// Wrong Answer
                    
                function displayQ4Choices(){
                    let q4ChoicesArray = ["Main", "Rhode Island", "Maryland", "Delaware"];
                    q4ChoicesArray = _.shuffle(q4ChoicesArray);
                    
                    for (let i = 0; i < q4ChoicesArray.length; i++){
                       $("#q4Choices").append(` <input type="radio" name="q4" id="${q4ChoicesArray[i]}" value="${q4ChoicesArray[i]}"> <label for="${q4ChoicesArray[i]}"> ${q4ChoicesArray[i]} </label>`);
                    }
                }// displayQ4Choices
                    
            }) // ready
            
        </script>
        
    </head>
<!-- closing head -->

    <!-- This is the body -->
    <!-- This is where we place the content of our website -->
    <body class="text-center">
        
        <h1 class="jumbotron">US Geography Quiz</h1>
        
        <h3><span id="markImg1"></span> What is the capital of California?</h3>
        <input type="text" id="q1"/>
        <br/><br/>
        <div id="q1Feedback"></div>
        <br>
        
        <h3><span id="markImg2"></span>What is the longest river?</h3>
        <select id="q2">
            <option value="">Select One</option>
            <option value="ms">Mississippi</option>
            <option value="mo">Missouri</option>
            <option value="co">Colorado</option>
            <option value="de">Delaware</option>
        </select>
        <br><br>
        <div id="q2Feedback"></div>
        <br>
        
        <h3><span id="markImg3"></span>What presidents are carved into mount Rushmore?</h3>
        <input type="checkbox" id="Jackson"> <label for"Jackson">A.Jackson</label>
        <input type="checkbox" id="Franklin"> <label for"Franklin">B. Franklin</label>
        <input type="checkbox" id="Jefferson"> <label for"Jefferson">T. Jefferson</label>
        <input type="checkbox" id="Jackson"> <label for"Roosevelt">T. Roosevelt</label>
        <br><br>
        <div id="q3Feedback"></div>
        <br>
        
        <h3><span id="markImg4"></span>What is the smallest US state</h3>
        <div id="q4Choices"></div>
        <div id="q4Feedback"></div>
        <br><br>
        
        <h3><span id="markImg5"></span>What image is in the Great Seal of the State of California?</h3>
        <img src="img/seal1.png" alt="Seal 1" class="q5Choice" id="seal1">
        <img src="img/seal2.png" alt="Seal 2" class="q5Choice" id="seal2">
        <img src="img/seal3.png" alt="Seal 3" class="q5Choice" id="seal3">
        <div id="q5Feedback"></div>
        <br></br>
        
        <!--additional five questions-->
        <h3><span id="markImg6"></span>What state is called the golden state?</h3>
        <input type="checkbox" id="California"> <label for"California">California</label>
        <input type="checkbox" id="Florida"> <label for"Florida">Florida</label>
        <div id="q6Feedback"></div>
        <br><br>
        
        <h3><span id="markImg7"></span>What animal is on the California flag?</h3>
        <select id="q7">
            <option value="">Select One</option>
            <option value="eagle">Eagle</option>
            <option value="bear">Bear</option>
        </select>
        <div id="q7Feedback"></div>
        <br><br>
        
        <h3><span id="markImg8"></span>What is the capital of Illinois?</h3>
        <input type="text" id="q8">
        <div id="q8Fedback"></div>
        <br><br>
        
        <h3><span id="markImg9"></span>Which state is considered to be the largest by area?</h3>
        <input type="checkbox" id="Alaska"> <label for"Alaska">Alaska</label>
        <input type="checkbox" id="Texas"> <label for"Texas">Texas</label>
        <div id="q9Feedback"></div>
        <br><br>
        
        <h3><span id="markImg10"></span>The major body of water that touches Texas is the Antlatic Ocean</h3>
        <input type="checkbox" id="q10True"> <label for"q10True">True</label>
        <input type="checkbox" id="q10False"> <label for"q10False">False</label>
        <div id="q10Feedback"></div>
        <br><br>
        
        <!--attempts and score printout-->
        <h3 id="validationFeedback" class="bg-danger text-white"></h3>
        <button class="btn btn-outline-success">Submit Quiz</button>
        <h2 id="totalScore" class="text-info"></h2>
        <h3 id="totalAttempts"></h3>
        
    </body>
    <!-- closing body -->

</html>