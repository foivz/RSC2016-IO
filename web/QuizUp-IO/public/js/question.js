var Question = {
  
};

var QuestionTypeFactoryMethod = {
   getFactory : function(){
     var id = $("#type").val();
     switch(id){
       case "1": return QuestionType.generateSingleAnswerQuestion();
       case "2": return QuestionType.generateMultipleAnswersQuestion();
       default: return null;
     }
   }
};

var QuestionType = {
  generateSingleAnswerQuestion : function(){
    var html = "<div><input type='text' placeholder='Question' name='question[]' />";
    html += "<input type='checkbox' name='questionCheckboxes[]'/> Correct </div>" ; 
    return html;
  },
  generateMultipleAnswersQuestion : function(){
    var html = "";
    for(var i = 0; i < 4; i++) html += this.generateSingleAnswerQuestion();
    return html;
  }
};


$(document).ready(function(){
  $("#type").change(function(){
    var html = QuestionTypeFactoryMethod.getFactory();
    $("#a").html(html);
  });  
});



