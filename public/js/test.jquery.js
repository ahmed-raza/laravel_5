$(document).ready(function(){
  $("#myform").submit(function(){
    var hello = $("#hello").val();
      $.ajax({
        url:'/admin/test_post',
        type: "post",
        data:{ 'hello': hello,'_token': $('input[name=_token]').val() },
        success:function(data){
          alert(data);
        }
      });
    return false;
  });
  $('#video').click(function(){
    $(this).get(0).paused ? $(this).get(0).play() : $(this).get(0).pause();
  });
  $('#video').prop("volume", '0.2');
  $('#audio').prop("volume", '0.5');
  $('.hidden-forms').hide();
  $('.comments .actions .btn-danger').click(function(){
    $('.hidden-forms').show();
  });
});
