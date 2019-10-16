// JavaScript 文档
$(function(){
	$('textarea, input, select').blur(function() {
		var e = $(this);
		if (e.attr("data-validate")) {
			e.closest('.field').find(".input-help").remove();
			var $checkdata = e.attr("data-validate").split(',');
			var $checkvalue = e.val();
			var $checkstate = true;
			var $checktext = "";
			if (e.attr("placeholder") == $checkvalue) {
				$checkvalue = "";
			}
			if ($checkvalue != "" || e.attr("data-validate").indexOf("required") >= 0) {
				for (var i = 0; i < $checkdata.length; i++) {
					var $checktype = $checkdata[i].split(':');
					if (!$pintuercheck(e, $checktype[0], $checkvalue)) {
						$checkstate = false;
						$checktext = $checktext + "<li>" + $checktype[1] + "</li>";
					}
				}
			};
			if ($checkstate) {
				e.closest('.form-group').removeClass("check-error");
				e.parent().find(".input-help").remove();
				e.closest('.form-group').addClass("check-success");
			} else {
				e.closest('.form-group').removeClass("check-success");
				e.closest('.form-group').addClass("check-error");
				e.closest('.field').append('<div class="input-help"><ul>' + $checktext + '</ul></div>');
			}
		}
	});
	$pintuercheck = function(element, type, value) {
		$pintu = value.replace(/(^\s*)|(\s*$)/g, "");
		switch (type) {
			case "required":
				return /[^(^\s*)|(\s*$)]/.test($pintu);
				break;
			case "chinese":
				return /^[\u0391-\uFFE5]+$/.test($pintu);
				break;
			case "number":
				return /^([+-]?)\d*\.?\d+$/.test($pintu);
				break;
			case "integer":
				return /^-?[1-9]\d*$/.test($pintu);
				break;
			case "plusinteger":
				return /^[0-9]\d*$/.test($pintu);
				break;
			case "unplusinteger":
				return /^-[1-9]\d*$/.test($pintu);
				break;
			case "znumber":
				return /^[1-9]\d*|0$/.test($pintu);
				break;
			case "fnumber":
				return /^-[1-9]\d*|0$/.test($pintu);
				break;
			case "double":
				return /^[-\+]?\d+(\.\d+)?$/.test($pintu);
				break;
			case "plusdouble":
				return /^[+]?\d+(\.\d+)?$/.test($pintu);
				break;
			case "unplusdouble":
				return /^-[1-9]\d*\.\d*|-0\.\d*[1-9]\d*$/.test($pintu);
				break;
			case "english":
				return /^[A-Za-z]+$/.test($pintu);
				break;
			case "username":
				return /^[a-z]\w{3,}$/i.test($pintu);
				break;
			case "mobile":
				return /^\s*(15\d{9}|13\d{9}|14\d{9}|17\d{9}|18\d{9})\s*$/.test($pintu);
				break;
			case "phone":
				return /^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$/.test($pintu);
				break;
			case "tel":
				return /^((\(\d{3}\))|(\d{3}\-))?13[0-9]\d{8}?$|15[89]\d{8}?$|170\d{8}?$|147\d{8}?$/.test($pintu) || /^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$/.test($pintu);
				break;
			case "email":
				return /^[^@]+@[^@]+\.[^@]+$/.test($pintu);
				break;
			case "url":
				return /^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/.test($pintu);
				break;
			case "ip":
				return /^[\d\.]{7,15}$/.test($pintu);
				break;
			case "qq":
				return /^[1-9]\d{4,10}$/.test($pintu);
				break;
			case "currency":
				return /^\d+(\.\d+)?$/.test($pintu);
				break;
			case "zipcode":
				return /^[1-9]\d{5}$/.test($pintu);
				break;
			case "chinesename":
				return /^[\u0391-\uFFE5]{2,15}$/.test($pintu);
				break;
			case "englishname":
				return /^[A-Za-z]{1,161}$/.test($pintu);
				break;
			case "age":
				return /^[1-99]?\d*$/.test($pintu);
				break;
			case "date":
				return /^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$/.test($pintu);
				break;
			case "datetime":
				return /^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-)) (20|21|22|23|[0-1]?\d):[0-5]?\d:[0-5]?\d$/.test($pintu);
				break;
			case "idcard":
				return /^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/.test($pintu);
				break;
			case "bigenglish":
				return /^[A-Z]+$/.test($pintu);
				break;
			case "smallenglish":
				return /^[a-z]+$/.test($pintu);
				break;
			case "color":
				return /^#[0-9a-fA-F]{6}$/.test($pintu);
				break;
			case "ascii":
				return /^[\x00-\xFF]+$/.test($pintu);
				break;
			case "md5":
				return /^([a-fA-F0-9]{32})$/.test($pintu);
				break;
			case "zip":
				return /(.*)\.(rar|zip|7zip|tgz)$/.test($pintu);
				break;
			case "img":
				return /(.*)\.(jpg|gif|ico|jpeg|png)$/.test($pintu);
				break;
			case "doc":
				return /(.*)\.(doc|xls|docx|xlsx|pdf)$/.test($pintu);
				break;
			case "mp3":
				return /(.*)\.(mp3)$/.test($pintu);
				break;
			case "video":
				return /(.*)\.(rm|rmvb|wmv|avi|mp4|3gp|mkv)$/.test($pintu);
				break;
			case "flash":
				return /(.*)\.(swf|fla|flv)$/.test($pintu);
				break;
			case "radio":
				var radio = element.closest('form').find('input[name="' + element.attr("name") + '"]:checked').length;
				return eval(radio == 1);
				break;
			default:
				var $test = type.split('#');
				if ($test.length > 1) {
					switch ($test[0]) {
						case "compare":
							return eval(Number($pintu) + $test[1]);
							break;
						case "regexp":
							return new RegExp($test[1], "gi").test($pintu);
							break;
						case "length":
							var $length;
							if (element.attr("type") == "checkbox") {
								$length = element.closest('form').find('input[name="' + element.attr("name") + '"]:checked').length;
							} else {
								$length = $pintu.replace(/[\u4e00-\u9fa5]/g, "***").length;
							}
							return eval($length + $test[1]);
							break;
						case "ajax":
							var $getdata;
							var $url = $test[1] + $pintu;
							$.ajaxSetup({
								async: false
							});
							$.getJSON($url, function(data) {
								$getdata = data.getdata;
							});
							if ($getdata == "true") {
								return true;
							}
							break;
						case "repeat":
							return $pintu == jQuery('input[name="' + $test[1] + '"]').eq(0).val();
							break;
						default:
							return true;
							break;
					}
					break;
				} else {
					return true;
				}
		}
	};
	$('form').submit(function() {
		$(this).find('input[data-validate],textarea[data-validate],select[data-validate]').trigger("blur");
		var numError = $(this).find('.check-error').length;
		if (numError) {
			$(this).find('.check-error').first().find('input[data-validate],textarea[data-validate],select[data-validate]').first().focus().select();
			return false;
		}
	});	
	$('.form-reset').click(function() {
		$(this).closest('form').find(".input-help").remove();
		$(this).closest('form').find('.form-submit').removeAttr('disabled');
		$(this).closest('form').find('.form-group').removeClass("check-error");
		$(this).closest('form').find('.form-group').removeClass("check-success");
	});
});