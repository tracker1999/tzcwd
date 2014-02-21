(function($) {
    $(function(){
    	var addPane = $('#addPane');
    	var editPane = $('#editPane');
    	var editId;
    	var departmentAction = function(data) {
    		$.ajax({
  		      url: 'action/departmentAction.php',
  		      data: data,
  		      success: function(result){
  		    	  console.log(result);
  		          if (result == 'success') {
  		              window.location.reload();
  		          } else {
  		              alert('操作失败, 请重试');
  		          }
  		      },
  		      error: function(result){alert('操作失败, 请重试');}
  		    });
    	};
    	$('.add').click(function(event) {
    		addPane.show();
    		editPane.hide();
    	});
        $('#addButton').click(function(event) {
        	var name = $('#name').val();
        	if (!name) {
        		alert('部门名字不能为空');
        	} else {
        		departmentAction({type: 'save', name: name});
        	}
        });
        $('#editButton').click(function(event) {
        	if (editId) {
        		var name = $('#name_edit').val();
            	if (!name) {
            		alert('部门名字不能为空');
            	} else {
            		departmentAction({type: 'update', id: editId, name: name});
            	}
        	}
        });
        $('#departmentList').click(function(event) {
        	var target = event.target;
        	if (target.nodeName === 'A') {
        		target = $(target);
        		editId = target.attr('j_id');
        		if (target.text() === '修改') {
        			addPane.hide();
        			$('#name_edit').val(target.parent().prev().text());
            		editPane.show();
        		} else {
        			departmentAction({type: 'delete', id: editId});
        		}
        	}
        });
    });
})(jQuery);