$(document).ready(function(){
  $("#myform").submit(function(){
    var hello = $("#hello");
      $.ajax({
        url:'/admin/test_post',
        type: "post",
        data:{ 'hello': hello.val(),'_token': $('input[name=_token]').val() },
        success:function(data){
          var result = data;
          hello.parents('form').find('#error').text('');
          hello.parents('form').after(data);
          hello.blur();
          hello.val('');
        },
        error: function(data){
          var error = data.responseJSON;
          if (error) {
            hello.attr('required', true);
            hello.parents('form').find('#error').text(error.hello[0]);
            hello.focus();
          }
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
