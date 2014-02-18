(function($) {
    $(function(){
        $('#submitButton').click(function(event) {
            var code = $('#code').val();
            if (!code) {
                alert('请输入身份证号码');
                return;
            }
            var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
            if(reg.test(code) == false) {
                alert('身份证号码输入不合法');
                return;
            }
            if(window.confirm('您确定要提交评分吗？')) {
                var inputs = $('.personList table input');
                var scores = [];
                for (var i = 0, len = inputs.length; i < len; i++) {
                    scores.push($.trim($(inputs[i]).val()));
                }
                $.ajax({
                  url: 'reviewrecord.php?o=s&code=' + encodeURIComponent(code) + '&score=' + encodeURIComponent(scores.join(',')),
                  success: function(result){
                      if (result == 'success') {
                          $.cookie('uid', new Date().getTime(), {expires: 30, path: '/'});
                          window.location.reload();
                      } else {
                          alert('提交失败, 请重试');
                      }
                  },
                  error: function(result){alert('提交失败, 请重试');}
                });
            }
        });
    });
})(jQuery);