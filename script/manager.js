var tudou = {};
tudou.action = {};
tudou.action.reviewPerson = {};
tudou.action.reviewPerson.add = function(id) {
    $.ajax({
      url: '/action/reviewEmployeeAction.php?o=a&id=' + id,
      success: function(result){
          if (result == 'success') {
              window.location.reload();
          } else {
              alert('添加失败, 请重试111');
          }
      },
      error: function(result){alert('添加失败, 请重试');}
    });
};
tudou.action.reviewPerson.del = function(id) {
    $.ajax({
      url: '/action/reviewEmployeeAction.php?o=d&id=' + id,
      success: function(result){
          if (result == 'success') {
              window.location.reload();
          } else {
              alert('删除失败, 请重试');
          }
      },
      error: function(result){alert('删除失败, 请重试');}
    });
};