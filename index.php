<!DOCTYPE html>
<html>

<head>
     <title>点掉校标</title>
    <meta itemprop="name" content="点掉校标" />
    <meta itemprop="description"  content="点掉校标" />
    <meta charset="utf-8" />
    <meta name="viewport"
        content="initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0, width=device-width,target-densitydpi=device-dpi" />
    <link rel="icon" href="https://zzwushang.github.io/123/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="https://zzwushang.github.io/123/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="./static/index.css" rel="stylesheet" type="text/css">
    <script src="https://pv.sohu.com/cityjson?ie=utf-8"></script>
    <script src="https://code.createjs.com/1.0.0/createjs.min.js"></script>
    <script src="https://passport.cnblogs.com/scripts/jsencrypt.min.js"></script>
    <script src="./static/index.js"></script>
</head>

<body onLoad="init()" oncontextmenu=self.event.returnValue=false>
    <div id="GameScoreLayer" class="BBOX SHADE bgc1" style="display:none;">
        <div style="padding:5%;margin-top: 200px;background-color: rgba(125, 181, 216, 0.8);">
            <div id="GameScoreLayer-text"></div>
            <div id="GameScoreLayer-score" style="margin:10px 0;">得分</div>
            <div id="GameScoreLayer-bast">最佳</div>
            <div id="now" style="font-size:0.9em;">键型</div>
            <button type="button" class="btn btn-secondary btn-lg" onclick="replayBtn()">再来一次</button>
            <button type="button" class="btn btn-secondary btn-lg"
                onclick="hideGameScoreLayer();showWelcomeLayer();gameRestart()">返回主页</button>
            <button type="button" class="btn btn-secondary btn-lg"
                onclick="window.location.href='https://github.com/Eafoo/eatcat'">源代码(改版后)</button>
            <button type="button" class="btn btn-secondary btn-lg"
                onclick="window.location.href='https://github.com/arcxingye/EatKano'">源代码(原版)</button>
			<button type="button" class="btn btn-secondary btn-lg"
                onclick="window.location.href='https://github.com/zzwushang/123'">源代码(点掉校标)</button>
        </div>
    </div>
    </div>
    <div id="welcome" class="SHADE BOX-M">
        <div class="welcome-bg FILL"></div>
        <div class="FILL BOX-M" style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:5;">
            <div style="margin:0 8% 0 9%;">
                <div style="font-size:2.6em; color:#00ffed;">
				点掉校标<br />
				（由源代码魔改）<br />
				</div>
				<br />
                <div style="font-size:2.2em; color:#fff; line-height:1.5em;">
                    从最底下校标开始<br />
                    看看你20秒能多少分<br />
					（如一直在加载请不断的退出从进）<br />
                </div>
                <br />
                <div id="btn_group" style="display: block;">
                    <button type="button" id="ready-btn" class="btn btn-primary loading btn-lg">点击开始</button>
					   <br /><br />
                    <button type="button" class="btn btn-secondary btn-lg"
                        onclick="foreach()">刷新</button>
				<br /><br />
                </div>

                <div id="btn_group2" style="display: block;">
                    </h2>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('!')">纯随机</button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('@')">无纵连的随机</button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('@#')">短纵</button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('2')">全纵连</button>
                    <br><br>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('32')">交互</button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('123432')">楼梯</button>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="autoset('@##')">三纵</button>
                </div>
                <div id="setting" style="display: none;">
                    <h3 style="font-size:1.2em; color:#fff; line-height:1.3em;">
                        请在此处输入四个 英文字母 <br />
                        以绑定键盘上对应的四个按键哦（不区分大小写,手机端玩家请忽略按键设置）！<br />
                        电脑默认为DFJK哦！<br />
                    </h3>
                    <div class="input-group mb-3">
                        <input type="text" id="keyboard" class="form-control" maxlength=4>
                    </div>
                    <h3 style="font-size:1.2em; color:#fff; line-height:1.3em;">
                        请在此处输入您想要设置的时间限制哦~ （单位：秒） <br />
                    </h3>
                    <div class="input-group mb-3">
                        <input type="text" id="timeinput" class="form-control" maxlength=4>
                    </div>
                    <h3 style="font-size:1.2em; color:#fff; line-height:1.3em;">
                        请在此处输入您想要设置的键型哦~ <a href="https://docs.qq.com/doc/DYVNMQ0pEWm12VGpv/" target="_blank">
                            <br>（注意：键型设置有改动，详细说明请点击这里）</a> <br />
                    </h3>
                    <div class="input-group mb-3">
                        <input type="text" id="note" class="form-control" maxlength=99999>
                    </div>
                    <h3 style="font-size:1.2em; color:#fff; line-height:1.3em;">
                        隐藏结算后显示的评语
                    </h3>
                    <input type="checkbox" id="hide" class="form-control">
                    <br>
                    <button type="button" class="btn btn-secondary btn-lg"
                        onclick="show_btn();save_cookie();">完成</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
