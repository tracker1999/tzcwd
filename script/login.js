(function($) {
    $(function(){
        var errorCode = $.getUrlParam('errorCode');
        var errorMessage = '';
        if (errorCode == '1') {
        	errorMessage = '账号不能为空，请重新登陆';
        } else if (errorCode == '2') {
        	errorMessage = '密码不能为空，请重新登陆';
        } else if (errorCode == '3') {
        	errorMessage = '账号/密码错误，请重新登陆';
        }
        if (errorMessage) {
        	$('.error-notice').text(errorMessage).css('visibility', 'visible');
        }
    });
})(jQuery);