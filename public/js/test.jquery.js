$(document).ready(function(){
  $("#form").submit(function(){
    var name = $("#name").val();
      $.post('save', {name: name}, function(data){
        alert(data);
      });
    return false;
  });
  $('#video').click(function(){
    $(this).get(0).paused ? $(this).get(0).play() : $(this).get(0).pause();
  });
  $('#video').prop("volume", '0.2');
  $('#audio').prop("volume", '0.5');
});
