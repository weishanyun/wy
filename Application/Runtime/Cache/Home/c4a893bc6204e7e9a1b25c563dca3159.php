<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--禁止浏览器缩放-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type" />
    <!--清除浏览器缓存-->
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <meta http-equiv="expires" content="Wed, 26 Feb 1997 08:21:57 GMT">
    <!--iPhone 手机上设置手机号码不被显示为拨号链接）-->
    <meta content="telephone=no, address=no" name="format-detection" />
    <!--IOS私有属性，可以添加到主屏幕-->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!--屏幕顶部条的颜色-->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <title>微语</title>
    <link rel="stylesheet" type="text/css" href="/hdd/Public/weixin/css/weui.min.css">
    <link rel="stylesheet" type="text/css" href="/hdd/Public/weixin/css/ACT.css">
    <script src="/hdd/Public/weixin/js/ACT.js" type="text/javascript" charset="utf-8" ></script>
</head>
<body ontouchstart>
    <div id="background"><img src="/hdd/Public/weixin/images/background.jpg"></div>
    <div id="container">
    <div id="addTime">
        <div id="addTime_top">！点击选择框来填写课程时间</div>
        <div id="addTime_content"  class="weui-cells weui-cells_radio">
            <div class="addTime_contentDiv" id="addTime_contentDiv1">
                <label class="weui-cell weui-check__label" for="x1_1">
                <div class="weui-cell__bd">
                <p>周一</p>
                </div>
                <div class="weui-cell__ft">
                <input type="radio" name="radio1" class="weui-check" id="x1_1">
                <span class="weui-icon-checked"></span>
                 </div>
                </label>
            </div>
            <div class="addTime_contentDiv" id="addTime_contentDiv2">
                <label class="weui-cell weui-check__label" for="x2_1">
                <div class="weui-cell__bd">
                <p>第<br>1<br>节</p>
                </div>
                <div class="weui-cell__ft">
                <input type="radio" name="radio2" class="weui-check" id="x2_1">
                <span class="weui-icon-checked"></span>
                 </div>
                </label>
            </div>
            <div class="addTime_contentDiv" id="addTime_contentDiv3">
                <label class="weui-cell weui-check__label" for="x3_1">
                <div class="weui-cell__bd">
                <p>第<br>1<br>节</p>
                </div>
                <div class="weui-cell__ft">
                <input type="radio" name="radio3" class="weui-check"  id="x3_1">
                <span class="weui-icon-checked"></span>
                </div>
                </label>
            </div>
        </div>
        <div id="addTime_bottom">
            <div onclick="timeCancel()">取消</div>
            <div onclick="timeConfirm()">确定</div>
        </div>
    </div>
    <div id="addWeek">
        <div id="addWeek_top">!点击下面的格子选择上课周数</div>
        <div class="weui-cells weui-cells_radio" id="addWeek_banner">
             <div class="addWeek_banner" id="addWeek_banner1">
             <label class="weui-cell weui-check__label" for="x4_1">
                <div class="weui-cell__bd">
                <p>单周</p>
                </div>
                <div class="weui-cell__ft">
                <input type="radio" name="radio4" class="weui-check" id="x4_1">
                <span class="weui-icon-checked"></span>
                </div>
            </label>
            </div>
            <div class="addWeek_banner" id="addWeek_banner2">
            <label class="weui-cell weui-check__label" for="x4_2">
                <div class="weui-cell__bd">
                <p>双周</p>
                </div>
                <div class="weui-cell__ft">
                <input type="radio" name="radio4" class="weui-check" id="x4_2">
                <span class="weui-icon-checked"></span>
                </div>
            </label>
            </div>
            <div class="addWeek_banner" id="addWeek_banner3">
            <label class="weui-cell weui-check__label" for="x4_3">
                <div class="weui-cell__bd">
                <p>全选</p>
                </div>
                <div class="weui-cell__ft">
                <input type="radio" name="radio4" class="weui-check" id="x4_3">
                <span class="weui-icon-checked"></span>
                </div>
            </label>
            </div>
        </div>
        <div id="addWeek_content">
            <table id="addWeek_table">
                <tr>
                    <td onclick="changeStatus(this)"><input type="hidden" value="0"><span>1</span></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
            </table>
        </div>
        <div id="addWeek_footer">
            <div onclick="weekCancel()">×</div>
            <div onclick="weekConfirm()">√</div>
        </div>
    </div>
        <form action="?c=Wxteacher&a=createclass" method="post">
            <div id="container_1">
            <table id="title">
                <tr>
                    <td>
                        <img src="/hdd/Public/weixin/images/class.png">
                    </td>
                    <td>
                        <input type="text" name="className" placeholder="请输入课程名称" required="required">
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="/hdd/Public/weixin/images/teacher.png">
                    </td>
                    <td>
                    <input type="text" name="teacher" placeholder="请输入授课教师姓名" required="required">
                    </td>
                </tr>
            </table>
            <table class="ClassTable" id="ClassTable_1">
                <input type="hidden" name="week">
                <input type="hidden" name="start_jie" >
                <input type="hidden" name="end_jie" >
                <input type="hidden" name="weekTime" >
                <tr class="tr_1">
                   <td rowspan="2">课时<br>1</td>
                    <td><img src="/hdd/Public/weixin/images/calendar.png"></td>
                    <td>
                        <select id="week_1" class="float" onchange="changeSelect(this)" name="start_week">
                            <option value="1">1</option>
                        </select>
                        <span class="float" id="textSpan_2">—</span>
                        <select id="week_2" class="float" name="end_week">
                            <option value="1">1</option>
                        </select>
                        <span class="float" id="textSpan_2">周</span>
                    </td>

                    <!--<td><input type="text" name="week" class="addweek" placeholder="点击添加周数" required="required" onclick="addWeek(this)"></td>-->
                </tr>
                 <tr class="tr_2">
                    <td><img src="/hdd/Public/weixin/images/time.png"></td>
                    <td><input type="text" name="time" class="addtime" placeholder="点击添加上课时间" required="required" onclick="addtime(this)" onfocus="this.blur();"></td>
                </tr>
                 <tr class="tr_3">
                    <td><div onclick="deletebox(this)" ><img src="/hdd/Public/weixin/images/delete.png"></div></td>
                    <td><img src="/hdd/Public/weixin/images/location.png"></td>
                    <td><input type="text" name="classPlace" placeholder="请输入上课地点" required="required"></td>
                </tr>
            </table>
            </div>
        <div class="weui-btn-area">
            <a href="#" class="weui-btn weui-btn_primary" id="addcoursetime">添加课程时间</a>
        </div>
        <div class="weui-btn-area">
             <input type="submit" name="submit" class="weui-btn weui-btn_primary" id="submit_1" value="添加课程">
        </div>
        </form>
    </div>
    <div id="blackBg"></div>
</body>
</html>