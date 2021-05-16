<style>
    .perCircS {
        position: relative;
        margin: 0 auto;
        text-align: center;
        width: 110px;
        height: 110px;
        border-radius: 100%;
        background-color: #65cea7;
        background-image: linear-gradient(91deg, transparent 50%, #65cea7 50%), linear-gradient(90deg, #65cea7 50%, transparent 50%);
    }

    .perCircW {
        position: relative;
        margin: 0 auto;
        text-align: center;
        width: 110px;
        height: 110px;
        border-radius: 100%;
        background-color: #f3ce85;
        background-image: linear-gradient(91deg, transparent 50%, #f3ce85 50%), linear-gradient(90deg, #f3ce85 50%, transparent
        50%);
    }

    .perCircD {
        position: relative;
        margin: 0 auto;
        text-align: center;
        width: 110px;
        height: 110px;
        border-radius: 100%;
        background-color: #fc8675;
        background-image: linear-gradient(91deg, transparent 50%, #fc8675 50%), linear-gradient(90deg, #fc8675 50%, transparent
        50%);
    }
    .perCircS .perCircInner, .perCircW .perCircInner, .perCircD .perCircInner {
        position: relative;
        top: 10px;
        left: 10px;
        text-align: center;
        width: 90px;
        height: 90px;
        border-radius: 100%;
        background-color: #eee;
    }
    .perCircS .perCircInner div, .perCircW .perCircInner div, .perCircD .perCircInner div {
        position: relative;
        top: 22px;
        color:#777;
    }
    .perCircS .perCircStat, .perCircW .perCircStat, .perCircD .perCircStat {
        font-size: 30px;
        line-height:1em;
    }

    .progress {
        border-radius: 10px;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        height: 12px;

        animation-name: progressBar;
        animation-iteration-count: 1;
        animation-duration: 3s;
    }

    @keyframes progressBar {
        0% {
        width: 10%;
        }

        100% {
        width: 100%;
        }
    }
    .progress .progress-bar {
        background-color: #6bafbd;
    }

    .progress .progress-bar .progress-bar-success {
        background-color: #65cea7;
    }
    .progress .progress-bar.progress-bar-warning {
        background-color: #f3ce85;
    }
    .progress .progress-bar.progress-bar-danger {
        background-color: #fc8675;
    }
</style>

<div class="row">
    <div class="col-md-4">
        <div id="firstCirc" class="perCircS">
            <div class="perCircInner">
                <div class="perCircStat">0%</div>
                <div>Complete</div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div id="secondCirc" class="perCircW">
            <div class="perCircInner">
                <div class="perCircStat">0%</div>
                <div>Complete</div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div id="thirdCirc" class="perCircD">
            <div class="perCircInner">
                <div class="perCircStat">0%</div>
                <div>Complete</div>
            </div>
        </div>
    </div>
</div>
<br>
<div>進度條一
    <span class="pull-right">80%</span>
    <div class="progress progress-striped">
        <div class="progress-bar progress-bar-success" style="width:80%"></div>
    </div>
</div>

<div>進度條二
    <span class="pull-right">70%</span>
    <div class="progress progress-striped">
        <div class="progress-bar progress-bar-warning" style="width:70%"></div>
    </div>
</div>

<div>進度條三
    <span class="pull-right">50%</span>
    <div class="progress progress-striped">
        <div class="progress-bar progress-bar-danger" style="width:50%"></div>
    </div>
</div>

<script>
    // change the value below from 80 to whichever percentage you want
    perCirc($('#firstCirc'), 'success', 80);
    perCirc($('#secondCirc'), 'warning', 70);
    perCirc($('#thirdCirc'), 'danger', 50);

    function perCirc($el, $color, end, i) {
        var $render = '';
        switch ($color) {
            case 'warning':
                $render = '#f3ce85';
                break;
            case 'danger':
                $render = '#fc8675';
                break;
            default:
                $render = '#65cea7';
        }

        if (end < 0)
            end=0;
        else if (end> 100)
            end = 100;
        if (typeof i === 'undefined')
            i = 0;
        var curr = (100 * i) / 360;
        $el.find(".perCircStat").html(Math.round(curr) + "%");
        if (i <= 180) {
            $el.css('background-image', 'linear-gradient(' + (90 + i)
            + 'deg, transparent 50%, #ccc 50%),linear-gradient(90deg, #ccc 50%, transparent 50%)' );
        } else {
            $el.css('background-image', 'linear-gradient(' + (i - 90)
            + 'deg, transparent 50%, ' + $render + ' 50%),linear-gradient(90deg, #ccc 50%, transparent 50%)' );
        }
        if (curr < end) {
            setTimeout(function () { perCirc($el, $color, end, ++i);
            }, 1);
        }
    }
</script>
