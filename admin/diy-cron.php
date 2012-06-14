<?php require_once 'isLogin.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="css/all.min.css">

<title>Cron 配置生成工具</title>

<style type="text/css" media="all">@import "css/cron.css";</style>

 

  

  <script type="text/javascript" src="js/jquery.js"></script>

  <script type="text/javascript" src="js/jquery.timePicker.js"></script>



   <script type="text/javascript">

   		

   		function echoItems() {

			//alert("hello");

			var min = document.getElementById("perMin");

			var hour = document.getElementById("perHour");

			var month = document.getElementById("perMonth");

			var choice = document.getElementById("cycle");

			if ( choice.value == "choice" ){

				min.style.display = "none";

				hour.style.display = "none";

				month.style.display = "none";

			}else if( choice.value == "min" ){

				min.style.display = "block";

				hour.style.display = "none";

				month.style.display = "none";

			}else if( choice.value == "hour" ){

				min.style.display = "none";

				hour.style.display = "block";

				month.style.display = "none";

			}else if ( choice.value == "day" ){

				min.style.display = "none";

				hour.style.display = "none";

				month.style.display = "block";

			}

		}

		

		function echoLogin(){

			

			var login = document.getElementById("login");

			var logform = document.getElementById("logform");

			if ( login.checked){

				logform.style.display = "block";

			}else{

				logform.style.display = "none";	

			}

		}

		

		function echoMinOffset(){

			var offset_checkbox = document.getElementById("isMinOffset");

			var offset_div = document.getElementById("minOffset");

			if( offset_checkbox.checked ){

				offset_div.style.display = "inline";

			}else{

				offset_div.style.display = "none";

			}

		}

		

		function echoHourOffset(){

			var offset_checkbox = document.getElementById("isHourOffset");

			var offset_div = document.getElementById("hourOffset");

			if( offset_checkbox.checked ){

				offset_div.style.display = "inline";

			}else{

				offset_div.style.display = "none";

			}

		}

		

		function echoNthDay(){

			var ch_day = document.getElementById("ch_day");

			var nthday_span = document.getElementById("nthday_span");

			if( ch_day.value == "NthDay" ){

				nthday_span.style.display = "inline";

			}else{

				nthday_span.style.display = "none";

			}

		}

		

		function echoResult(){

            var appname = document.getElementById("appname").value;

            var version = document.getElementById("version").value;

			var result = document.getElementById("result");

			var desc = document.getElementById("desc").value;

			var relative = document.getElementById("relative").value;

			var cycle = document.getElementById("cycle").value;

            var needLogin = document.getElementById("login");

            var result_str = "";

            if( appname != "" && version != "" ){

                result_str += "appname: " + appname + "<br />\n";

                result_str += "version: " + version + "<br /><br />\n";

            }

            

			result_str += "cron:<br />\n";

            if( desc == "" ){

                desc = "untitled cron";

            }

            result_str += "&nbsp;&nbsp;&nbsp;&nbsp;- description: " + desc + "<br /> \n";

            result_str += "&nbsp;&nbsp;&nbsp;&nbsp;url: " + relative + "<br /> \n";

            result_str += "&nbsp;&nbsp;&nbsp;&nbsp;";

			if( relative == "" ){

				result.innerHTML = "请填写页面路径";

				return false;	

			}

            

			if( cycle == "choice"){

				result_str = "请选择周期";

				result.innerHTML = result_str;

				return false;

			}else if( cycle == "min" ){

				var permin = document.getElementById("perm").value;

				result_str += "schedule: every " + permin;

				if( permin == 1 ){

					result_str += " min";

				}else{

					result_str += " mins";

				}

                var isoffset = document.getElementById("isMinOffset");

                if( isoffset.checked ){

                    var offset = document.getElementById("minoffset").value;

                    result_str += ", offset " + offset;

                }

			}else if( cycle == "hour" ){

				//result_str = "hour";

                var hour   = document.getElementById("perh").value;

                result_str += "schedule: every " + hour + " ";

                if( hour == 1 ){

                    result_str += "hour";

                }else{

                    result_str += "hours";

                }

                var isoffset = document.getElementById("isHourOffset");

                if( isoffset.checked ){

                    var offset = document.getElementById("houroffset").value;

                    result_str += ", offset " + offset;

                }

			}else if( cycle == "day" ){

				var month  = document.getElementById("ch_month").value;

				var day    = document.getElementById("ch_day").value;

				var NthDay = document.getElementById("nthday").value;

				var time   = document.getElementById("time1").value;

				var tzone  = document.getElementById("timezone").value;

				//result_str = month + "\n" + day + "\n" + NthDay + "\n" + time + "\n" + tzone + "<br>";

                if( day == "no_select" ){

                    result_str = "请选择“天”";

					result.innerHTML = result_str;

					return false;

                }else if( day == "Perday" ){

                    result_str += "schedule: every day of";

                }else if( day == "NthDay"){

                    result_str += "schedule: $" + NthDay + " day of";

                }else{

                    result_str += "schedule: every " + day + " of";

                }

                if( month == "no_select" ){

                    result_str = "请选择“月份”";

					result.innerHTML = result_str;

					return false;

                }else if( month == "months" ){

                    result_str += " month";

                }else{

                    result_str += " " + month;

                }

                result_str += " " + time;

                if( tzone != "Beijing" ){

                    result_str += "<br />&nbsp;&nbsp;&nbsp;&nbsp;timezone: " + tzone;

                }

			}else{

				result_str = "null";

			}

			if( needLogin.checked ){

                var username = document.getElementById("usrname").value;

                var password = document.getElementById("passwd").value;

				if( username == "" ){

					result.innerHTML = "用户名不能为空";

					return false;	

				}

				if( password == "" ){

					result.innerHTML = "密码不能为空";

					return false;	

				}

                result_str += "<br />\nlogin: " + username + "@" + password;

            }

			result.innerHTML = result_str;

            echoHelp('success');

			return false;

		}

		

        function echoHelp( which ){

            //alert(which);

            var help = document.getElementById("help");

            var info = "";

            if( which == "desc" ){

                var desc = document.getElementById("desc");

                desc.value = "";

                info = "这里填写cron描述信息";

            }else if( which == "relative" ){

                info = "如，需要执行http://yourapp.sinaapp.com/cron/test.php，此处填写cron/test.php";

            }else if( which == "cycle" ){

                info = "选择cron执行周期";

            }else if( which == "offsetMin" ){

                var min = document.getElementById("perm").value;

                var off = document.getElementById("minoffset").value;

                info = "带偏移将更加精确地指定某个时间点，如偏移量为"+off+"，表示：每"+min+"分钟"+off+"秒执行。选中“带偏移”，将按cron-offset服务收费。";

            }else if( which == "offsetHour" ){

                var hour = document.getElementById("perh").value;

                var off = document.getElementById("houroffset").value;

                info = "带偏移将更加精确地指定某个时间点，如偏移量为"+off+"，表示：每"+hour+"小时"+off+"分执行。选中“带偏移”，将按cron-offset服务收费。";

            }else if( which == "login" ){

                info = "当欲执行的页面需要<a href='http://sae.sina.com.cn/?m=devcenter&a=index&catId=34&content_id=71#anchor_7983aef9f5ded83f84c21b04a4812889' target='_blank'>认证</a>时，请输入用户名密码。";

            }else if( which == "success" ){

                info = "生成cron配置成功！请将下面cron段复制到config.yaml，重新部署应用即可生效。";

            }else if( which == "appname" ){

                info = "请输入英文应用名";

            }else if( which == "appversion" ){

                info = "请输入整型版本号";

            }

            help.innerHTML = info;

            return true;

        }

        

		function returnFalse(){

			//alert("test");

			return false;	

		}

		

   </script>

   

<script type="text/javascript">

  jQuery(function() {

    // Default.

    $("#time1").timePicker();

    // 02.00 AM - 03.30 PM, 15 minutes steps.

  });

  

</script>

  

<style type="text/css">

<!--

#apDiv1 {

	position:absolute;

	width:332px;

	height:63px;

	z-index:1;

	left: 266px;

	top: 153px;

}

.cron_head {

	text-align: center;

	font-weight: bold;

	font-size: 18px;

	padding: 10px;

}

.red_sharp {

	color: #F00;

}

#apDiv2 {

	position:absolute;

	width:292px;

	height:27px;

	z-index:2;

	left: 16px;

	top: 185px;

}

#apDiv3 {

	position:absolute;

	width:168px;

	height:28px;

	z-index:3;

	top: -1px;

	left: 125px;

}



.tip{

	width:105px;

}

.tb{line-height:220%;}

.nthday_span {

	display:inline-block;

}





-->

</style>

</head>

<body>

<form id="form1" name="form1" method="post" action="" onsubmit="return returnFalse()" >

<table width="600" height="161" border="0">

  <tr>

    <td  colspan="3" class="cron_head">Cron 配置生成工具</td>

  </tr>

  <tr>

  	<td>应用名：</td>

    <td style="text-align:left"><input type="text" name="appname" id="appname" value="<?php echo $_SERVER['HTTP_APPNAME'];?>" onfocus="echoHelp('appname')" style="width:5em" />

    版本号：<input type="text" name="version" id="version" value="<?php echo $_SERVER['HTTP_APPVERSION'];?>" onfocus="echoHelp('appversion')"  style="size:3em; width:2em"/>

    </td>

    <td width="452" rowspan="2" class="help">

    <div id="help" style="border:#FED626;">帮助信息</div>

    </td>

  </tr>

  

 

    <td height="26" class="tip">描述：</td>

    <td width="160" class="leftalign" >

    <input type="text" name="desc" id="desc" value="Down Monitor" onfocus="echoHelp('desc')" /></td>

    

  </tr>

  <tr>

    <td height="29" class="tip" >相对路径：</td>

    <td class="leftalign"><input type="text" name="relative" id="relative" value="cron/cron.php" onfocus="echoHelp('relative')" />

     </td>

     

  </tr>

  <tr>

    <td height="25" class="tip" style="vertical-align:top">周期：</td>

    <td class="leftalign" colspan="2"><label>

      <select name="cycle" id="cycle" onchange="echoItems()" onfocus="echoHelp('cycle')">

        <option value="choice" selected="selected">请选择</option>

        <option value="min">分钟</option>

        <option value="hour">小时</option>

        <option value="day">天</option>

      </select>

    </label>

    <div id="perMin" class="per_min">每几分钟执行一次？

        <input name="perm" type="text" id="perm" size="3" maxlength="3" class="perM" value="1" />

      <span class="redSharp">*</span>(1~59)<label> 

        <input name="isMinOffset" id="isMinOffset" type="checkbox" onclick="echoMinOffset()" onfocus="echoHelp('offsetMin')"/>带偏移</label>

        <div id="minOffset" style="display:none"><label>偏移量：<input name="minoffset" type="text" id="minoffset" size="2" maxlength="2" value="0" class="perM">(0~59)秒</label></div>

        </div> 

    <div id="perHour" class="per_hour">每几小时执行一次？

      <input name="perh" type="text" id="perh" size="3" maxlength="3" class="perM" value="1" />

      <span class="redSharp">*</span>(1~23) <label><input name="isHourOffset" id="isHourOffset" type="checkbox" onclick="echoHourOffset()" onfocus="echoHelp('offsetHour')" />带偏移</label>

       <div id="hourOffset" style="display:none"><label>偏移量：<input name="houroffset" type="text" id="houroffset" size="2" maxlength="2" value="0" class="perM">(0~59)分</label></div>



      </div>

      

    <div id="perMonth" class="per_month">

      某月哪几天执行一次？

        <label>

          <select name="ch_month" id="ch_month"> 

            <option value="no_select" selected="selected">月份</option>

            <option value="months">每月</option>

            <option value="January">一月</option>

            <option value="February">二月</option>

            <option value="March">三月</option>

            <option value="April">四月</option>

            <option value="May">五月</option>

            <option value="June">六月</option>

            <option value="July">七月</option>

            <option value="August">八月</option>

            <option value="September">九月</option>

            <option value="Octorber">十月</option>

            <option value="November">十一月</option>

            <option value="December">十二月</option>

          </select>

        </label>

        <label>

          <select name="ch_day" id="ch_day" onchange="echoNthDay()">

            <option value="no_select">天</option>

            <option value="Perday">每天</option>

            <option value="NthDay">第几天</option>

            <option value="Monday">星期一</option>

            <option value="Tuesday">星期二</option>

            <option value="Wednesday">星期三</option>

            <option value="Thursday">星期四</option>

            <option value="Friday">星期五</option>

            <option value="Saturday">星期六</option>

            <option value="Sunday">星期日</option>

          </select><span class="nthday_span" id="nthday_span" style="display:none">第<input name="nthday" type="text" id="nthday" size="2" maxlength="2" value="0" class="perM" />天</span>

        </label> 

        <br />时间

        <input type="text" id="time1" size="4"  maxlength="5" style="width:4em" value="00:00" />

        时区<select name="timezone" id="timezone" size="1">

          <option value="Beijing" selected="selected">Beijing</option>

          <option value="NewYork">NewYork</option>

          <option value="London">London</option>

          <option value="Sydney">Sydney</option>

          <option value="Moscow">Moscow</option>

          <option value="Berlin">Berlin</option>

          <option value="Tokyo">Tokyo</option>

          <option value="LosAngeles">LosAngeles</option>

        </select>

      </div>

      

      </td>

  </tr>

 

  <tr>

    <td height="29"><label>

      <input type="checkbox" name="login" id="login"  onclick="echoLogin()" onfocus="echoHelp('login')"/>

      需要登陆</label></td>

    <td colspan="2" style="text-align:left"><div id="logform" class="login">

    &nbsp;&nbsp;

      <label>用户名

        <input type="text" name="usrname" id="usrname" />

      </label>

      

      <label>密码

        <input type="text" name="passwd" id="passwd" />

      </label>

    </div></td>

    </tr>

    <tr><td colspan="2"><input type="submit" name="submit" value="生成配置" onclick="echoResult()" /></td></tr>

    <tr><td colspan="3" class="help">

    <div id="result" style="border:#FED626;">

    <span id="result_str"></span>

	</div>

    </td></tr>

</table>



</form>



</body>

</html>

