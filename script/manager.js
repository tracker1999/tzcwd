(function($) {
    $(function() {
        $('.personList a').click(function(){
            var id = $(this).attr('data_id');
            if (!id) {
                return;
            }
            $.ajax({
              url: 'reviewperson.php?o=d&id=' + id,
              success: function(result){
                  if (result == 'success') {
                      window.location.reload();
                  } else {
                      alert('删除失败, 请重试');
                  }
              },
              error: function(result){alert('删除失败, 请重试');}
            });
        });
        $('#submitButton').click(function() {
            var name = $('#name').val();
            var job = $('#job').val();
            if (!name) {
                alert('请输入姓名');
                return;
            }
            if (!job) {
                alert('请输入职务');
                return;
            }
            $.ajax({
              url: 'reviewperson.php?o=a&name=' + encodeURIComponent(name) + '&job=' + encodeURIComponent(job),
              success: function(result){
                  if (result == 'success') {
                      window.location.reload();
                  } else {
                      alert('添加失败, 请重试');
                  }
              },
              error: function(result){alert('添加失败, 请重试');}
            });
        });
    });
})(jQuery);