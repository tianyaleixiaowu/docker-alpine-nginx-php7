<?php 
// error_reporting(0);
define('IN_QY',true);
session_start();
include("./include/common.inc.php");
include("./include/pdo.class.php");

$mydabase=new DB("172.26.249.246","md","maida6868","zhoubao");
// $mydabase=new DB("127.0.0.1","root","root","zhoubao");

 if (empty($_GET)) {
   $sql = "SELECT * FROM essential_information WHERE weekly_newspaper_ctime=(SELECT MAX(weekly_newspaper_ctime) FROM  essential_information WHERE weekly_newspaper_type=1)";
   $result=$mydabase->mysql_query_rest($sql);
}else{
    $sql = "SELECT * FROM essential_information WHERE essen_id=".$_GET['essen_id'];
    $result=$mydabase->mysql_query_rest($sql);
}

// print_r($result);die;
$sql = "SELECT * FROM content WHERE relevance_id=".$result['essen_id'];
$res=$mydabase->mysql_query_fetchAll($sql);
// print_r($res);die;
// 循环处理数组
foreach ($res as $key => $value) {
    // 键值为0的是正文第一页的内容
    $Title1 = $res[0]['title'];
    $Content1 = explode('@#$',$res[0]['content']);
    $page1 = $res[0]['page'];
    

  /*  $Title1 = $res[1]['title'];
    $Content1 = $res[1]['content'];
    $page1 = $res[1]['page'];*/
    // print_r($Content0);die;

    // 键值为1的是分项进展总结的第一条
    $Title2 = $res[1]['title'];
    $Content2 = explode('@#$%', $res[1]['content']);
    // print_r($Content2);die; 
    $Title2_1 = $Content2[0];
    $Content2_1 = explode('@#$', $Content2[1]);
    $page2 = $res[1]['page'];
    // print_r($Content2_1);die;

    // 键值为2的是分项进展总结的第二条
    $Title3 = $res[2]['title'];
    $Content3 = explode('@#$%', $res[2]['content']);
    // print_r($Content3);die;
    $Title3_1 = $Content3[0];
    $Content3_1 = explode('@#$', $Content3[1]);
    $page3 = $res[2]['page'];
    // print_r($Content3_1);die;


    // 键值为3的是分项进展总结的第三条
    $Title4 = $res[3]['title'];
    $Content4 = explode('@#$%', $res[3]['content']);
    // print_r($Content4);die;
    $Title4_1 = $Content4[0];
    $Content4_1 = explode('@#$', $Content4[1]);
    $page4 = $res[3]['page'];
    // print_r($Content4_1);die;
}
// print_r($res);die;

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>麦达数字技术部工作周报</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">

    <script src="js/flexible_css.js"></script>
    <script src="js/flexible.js"></script>

    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/page/index.css">
</head>
<body>
    <div class="containers" id="page0">
        <div class="page page-home">
            <img src="http://i2137.com/php/zhoubao12-3/images/edit.jpg" style="float: right;width: 10%;height: 10%;margin:0 auto;">
            <!--首页-->
        </div>
        <div class="page" id="page1">
            <div class="title">
                <div class="title-content">
                    <span class="title-1"></span>
                    <h3><?=$Title1; ?></h3>
                    <p class="title-line"></p>
                </div>
            </div>
            <div class="list-border">
                <p></p>
                <ul class="part">
                    <?php for ($i=0; $i <count($Content1) ; $i++) { ?>
                        <li><?=$Content1[$i]; ?></li>
                    <?php } ?>
<!--                     <li>1）EC营销线索算法模型，本周完成第二次模型迭代，经验证和分析较初版特征工程效果提升30%，并已完成模型算法API封装，正在进行内部试用对采集的EC线索进行评测。这版模型的文本特征太多，下周优化模型降维，开始第三次迭代优化；</li>
                    <li>2）投资数据库方面，由于人力资源问题，初版应用产品的研发工作先暂停，重点先推进企业数据仓库的数据采集、清洗和入库等工作，以3个月内积累4000万企业信息为目标；</li>
                    <li>3）爬虫系统OCR电话号码图片识别、简单验证码识别功能研发进展顺利，后续重点是进行图片样本的训练积累。4000万企业数据采集工程已经开始准备，初步数据源确认，研发布隆过滤器、深度爬虫器研发进展50%；</li>
                    <li>4）营销线索平台本周完成主体布局调整、销售个人相关等功能的迭代和发布，目前正在重点进行数据统计和分析功能，优先移动版开发实现。</li> -->
                </ul>
            </div>
        </div>
        <div class="page" id="page1">
            <div class="title">
                <div class="title-content">
                    <span class="title-1"></span>
                    <h3>工作总结</h3>
                    <p class="title-line"></p>
                </div>
            </div>
            <div class="list-border-1">
                <!-- <p></p>
                <ul class="part">
                    <li><?=$Content1;?></li>                    
                </ul> -->
                <div class="tables">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tr><td colspan="5" style="font-size: 15px;">12月份截至目前营销线索分析</td></tr>
                            <tr style="background-color: rgba(255, 255, 255, .2);">  
                                <td>科目</td><td>技术</td><td>市场</td><td>其他</td><td>合计</td>
                            </tr>
                            <tr>
                                <td>线索动态总量</td><td>6595</td><td>419</td><td>13546</td><td>20560</td>
                            </tr>
                            <tr>
                                <td>总量占比</td><td>32.08%</td><td>2.04%</td><td>65.89%</td><td>100%</td>
                            </tr>
                            <tr>
                                <td>放弃线索量</td><td>3703</td><td>187</td><td>6280</td><td>10170</td>
                            </tr>
                            <tr>
                                <td>新增线索量</td><td>3110</td><td>37</td><td>2102</td><td>5249</td>
                            </tr>
                            <tr>
                                <td>新增占比</td><td>59.25%</td><td>0.70%</td><td>40.05%</td><td>100%</td>
                            </tr>
                            <tr>
                                <td>意向量</td><td>536</td><td>43</td><td>594</td><td>1173</td>
                            </tr>
                            <tr>
                                <td>意向率</td><td>8.13%</td><td>10.26%</td><td>4.39%</td><td>5.71%</td>
                            </tr><tr>
                                <td>拨打电话量</td><td>4864</td><td>207</td><td>8218</td><td>13289</td>
                            </tr>
                            <tr>
                                <td>接通量</td><td>3075</td><td>119</td><td>4630</td><td>7824</td>
                            </tr>
                            <tr>
                                <td>接通率</td><td>63.22%</td><td>57.49%</td><td>56.34%</td><td>58.88%</td>
                            </tr>
                            <tr>
                                <td>有效沟通量 （>30s）</td><td>1161</td><td>63</td><td>1434</td><td>2658</td>
                            </tr>
                            <tr>
                                <td>30s有效沟通率</td><td>37.76%</td><td>52.94%</td><td>30.97%</td><td>33.97%</td>
                            </tr><tr>
                                <td>有效沟通量 （>60s）</td><td>465</td><td>42</td><td>673</td><td>1180</td>
                            </tr>
                            <tr>
                                <td>60s有效沟通率</td><td>15.12%</td><td>35.29%</td><td>14.54%</td><td>15.08%</td>
                            </tr>
                            <tr>
                                <td>有效沟通量（>120s）</td><td>187</td><td>23</td><td>290</td><td>500</td>
                            </tr>
                            <tr>
                                <td>有效沟通量（>240s）</td><td>73</td><td>9</td><td>116</td><td>198</td>
                            </tr>
                        </table>
                    </div>
            </div>
        </div>
        <div class="page" id="page2">
            <div class="title">
                <div class="title-content">
                    <span class="title-2"></span>
                    <h3><?=$Title2;?></h3>
                    <p class="title-line"></p>
                </div>
            </div>
            <div class="list-border">
                <h4 id="title"><?=$Title2_1; ?></h4>
                <ul class="small">
                    <?php for ($i=0; $i <count($Content2_1); $i++) { ?> 
                        <li><?=$Content2_1[$i]; ?></li>
                    <?php } ?>
                    <!-- <li>1）EC营销系统后台项目相关数据逻辑和功能服务实现工作，已完成如下：</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;a）数据钻取功能，按省、市、行业分布钻取；</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;b）历史推送记录里沟通状态数据补充；</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;c）通话历史功能加入平台推送的总沟通量、有效沟通量等字段；</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;d）根据公司地址从百度、高德获取经纬度功能，并根据经纬度查询附近公司功能（50%）；</li>
                    <li>2）EC销售数据统计分析，区分平台推送和其他渠道线索，统计动态线索量、拨打线索量、接通数量、拨打次数、有效沟通量、意向线索量、成单量等维度数据进行分析；</li>
                    <li>3）营销线索平台功能迭代：主体布局调整、整合相关功能并测试、发布；</li>
                    <li>4）营销线索平台移动端线索数据统计功能开发进行中。</li> -->
                </ul>
            </div>
        </div>
        <div class="page" id="page3">
            <div class="title">
                <div class="title-content">
                    <span class="title-2"></span>
                    <h3><?=$Title3;?></h3>
                    <p class="title-line"></p>
                </div>
            </div>
            <div class="list-border">
                <h4 id="title"><?=$Title3_1; ?></h4>
                <ul class="small">
                    <?php for ($i=0; $i <count($Content3_1); $i++) { ?> 
                        <li><?=$Content3_1[$i]; ?></li>
                    <?php } ?>
                    <!-- <li>1）EC营销系统后台项目相关数据逻辑和功能服务实现工作，已完成如下：</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;a）数据钻取功能，按省、市、行业分布钻取；</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;b）历史推送记录里沟通状态数据补充；</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;c）通话历史功能加入平台推送的总沟通量、有效沟通量等字段；</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;d）根据公司地址从百度、高德获取经纬度功能，并根据经纬度查询附近公司功能（50%）；</li>
                    <li>2）EC销售数据统计分析，区分平台推送和其他渠道线索，统计动态线索量、拨打线索量、接通数量、拨打次数、有效沟通量、意向线索量、成单量等维度数据进行分析；</li>
                    <li>3）营销线索平台功能迭代：主体布局调整、整合相关功能并测试、发布；</li>
                    <li>4）营销线索平台移动端线索数据统计功能开发进行中。</li> -->
                </ul>
            </div>
        </div>
        <div class="page" id="page4">
            <div class="title">
                <div class="title-content">
                    <span class="title-2"></span>
                    <h3><?=$Title4;?></h3>
                    <p class="title-line"></p>
                </div>
            </div>
            <div class="list-border">
                <h4 id="title"><?=$Title4_1; ?></h4>
                <ul class="small">
                    <?php for ($i=0; $i <count($Content4_1); $i++) { ?> 
                        <li><?=$Content4_1[$i]; ?></li>
                    <?php } ?>
                    <!-- <li>1）EC营销系统后台项目相关数据逻辑和功能服务实现工作，已完成如下：</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;a）数据钻取功能，按省、市、行业分布钻取；</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;b）历史推送记录里沟通状态数据补充；</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;c）通话历史功能加入平台推送的总沟通量、有效沟通量等字段；</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;d）根据公司地址从百度、高德获取经纬度功能，并根据经纬度查询附近公司功能（50%）；</li>
                    <li>2）EC销售数据统计分析，区分平台推送和其他渠道线索，统计动态线索量、拨打线索量、接通数量、拨打次数、有效沟通量、意向线索量、成单量等维度数据进行分析；</li>
                    <li>3）营销线索平台功能迭代：主体布局调整、整合相关功能并测试、发布；</li>
                    <li>4）营销线索平台移动端线索数据统计功能开发进行中。</li> -->
                </ul>
            </div>
        </div>
        <div class="page" id="page5">
            <div class="title">
                <div class="title-content">
                    <span class="title-3"></span>
                    <h3>成果展示</h3>
                    <p class="title-line"></p>
                </div>
            </div>
            <div class="list-images">
                <img src="temp/0.png">
            </div>
        </div>
        <div class="page" id="page6">
            <div class="title">
                <div class="title-content">
                    <span class="title-5"></span>
                    <h3>团队人员情况</h3>
                    <p class="title-line"></p>
                </div>
            </div>
            <div class="list">
                <ul> 
                    <li><span class="list-icon"></span><p>目前在职：<span>13</span>人</p></li>
                    <li><span class="list-icon"></span><p>计划入职：无</p></li>
                    <li><span class="list-icon"></span><p>本周离职：<span>1</span>人</p></li>
                    <li><span class="list-icon"></span><p>本周面试：<span>10</span>人</p></li>
                    <li><span class="list-icon"></span><p>人员缺口：NLP、数据分析、产品经理、前端开发</p></li>
                </ul>
            </div>
        </div>
        <div class="page" id="page7">
            <div class="title">
                <div class="title-content">
                    <span class="title-6"></span>
                    <h3>总体阶段进展</h3>
                    <p class="title-line"></p>
                </div>
            </div>
            <div class="progress"></div>
            <div class="charts" style="height: 7.8rem;">
                <div class="chart-title">整体阶段进展</div>
                <div class="chart" id="chart-total" style="width: 9.6rem;height: 6.8rem;"></div>
            </div>
        </div>
        <div class="page" id="page8">
            <div class="title">
                <div class="title-content">
                    <span class="title-7"></span>
                    <h3>关键子项目进展</h3>
                    <p class="title-line"></p>
                </div>
            </div>
            <div class="images">
                <p><span class="icon"></span>EC数据和模型合作项目</p>
                <img src="temp/1.jpg">
            </div>
            <div class="images">
                <p><span class="icon"></span>爬虫系统-研发</p>
                <img src="temp/2.jpg">
            </div>
            <div class="images">
                <p><span class="icon"></span>4000万企业数据采集</p>
                <img src="temp/3.jpg">
            </div>
        </div>
    </div>
    <!--script-->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/islider.min.js"></script>
    <script src="js/echarts.min.js"></script>
    <script src="js/echarts-map-china.min.js"></script>
    <script src="js/page/index.js"></script>

    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript">
        $.ajax({
                type: 'POST',
                url:'http://i2137.com/php/zhoubao12-3/sign.php',
                data:{
                     'url': window.location.href.split('#')[0]
                },
                dataType: 'json',
                success: function(data){ 
                    // 获取信息成功
                    console.log(data)
                     wx.config({
                        debug: false,
                        appId: data.result.appId,
                        timestamp: data.result.timestamp,
                        nonceStr: data.result.nonceStr,
                        signature: data.result.signature,
                        jsApiList: [
                            // 所有要调用的 API 都要加到这个列表中
                            'checkJsApi',
                            'onMenuShareTimeline',
                            'onMenuShareAppMessage',
                            'onMenuShareQQ'
                        ]
                    });

                window.share_config = {
                        "share": {
                            "imgUrl": "http://i2137.com/php/zhoubao12-3/images/share.jpg",//分享图，默认当相对路径处理，所以使用绝对路径的的话，“http://”协议  前缀必须在。
                            "desc" : "麦达数字技术部2017年12月第三周工作周报",//摘要,如果分享到朋友圈的话，不显示摘要。
                            "title" : '麦达数字技术部工作周报',//分享卡片标题
                            "link": window.location.href,//分享出去后的链接，这里可以将链接设置为另一个页面。
                            "success":function(){//分享成功后的回调函数
                                // alert('已分享');
                            },
                            'cancel': function () { 
                                // 用户取消分享后执行的回调函数
                                // alerat('已取消');
                            }
                        }
                    };  
                    wx.ready(function () {
                            wx.onMenuShareAppMessage(share_config.share);//分享给好友
                            wx.onMenuShareTimeline(share_config.share);//分享到朋友圈
                            wx.onMenuShareQQ(share_config.share);//分享给手机QQ
                    });
                    wx.error(function(res){
                        // config信息验证失败会执行error函数，如签名过期导致验证失败，
                        // 具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，
                        //对于SPA可以在这里更新签名。
                        // alert("好像出错了！！");
                        // alert("errorMSG:"+res);
                        // console.log(res);                    
                    });

                    
                },
                error: function(xhr){
                    alert("请求失败，请联系管理员")
                   // console.log(xhr);
                }
            });
    </script>
    <script type="text/javascript">
        $("#page0 img").bind("click",function(){
           window.location.href="index.php?essen_id=<?php echo $result['essen_id'];?>";
        })
    </script>
</body>
</html>