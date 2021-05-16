<style>
    .div_style {
        font-family: Microsoft JhengHei;
        color:white;
    }

    #img_div {
        background-image:url('/img/coupon_bg.jpeg');
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
        width: 800px;
        margin: 0 auto;
    }

    #duration_lbl {
        margin-top:7px;
        padding-left:150px;
    }

    #offer_lbl {
        padding: 0 10px 0px 200px;
    }

    #title_lbl {
        padding: 0 10px 0px 200px;
    }

    #cond_lbl {
        padding: 0px 150px 20px 0px;
        float: right;
    }
</style>

<div id="img_div">
    <div class="row">
        <div class="div_style">
            <h3><label id="duration_lbl"></label></h3>
        </div>
    </div>
    <div class="row">
        <div class="div_style">
            <h1><label id="offer_lbl"></label></h1>
        </div>
    </div>
    <div class="row">
        <div class="div_style">
            <h3><label id="title_lbl"></label></h3>
        </div>
    </div>
    <div class="row">
        <div class="div_style">
            <h4><label id="cond_lbl"></label></h4>
        </div>
    </div>
</div>

<script>
    $(function() {
        // 使用起訖日期
        $(".start_date, .end_date").on("dp.change", function (e) {
            var duration = '使用期限: ' + $('.start_date').val() + '至' + $('.end_date').val();
            $('#duration_lbl').text(duration);
        });

        // 優惠標題
        $(".title").on("input", function() {
            var title = $('.title').val();
            $('#title_lbl').text(title);
        });

        // 優惠條件
        $(".condition").on("input", function() {
            var condition = '使用條件: ' + $('.condition').val();
            $('#cond_lbl').text(condition);
        });

        // 優惠內容
        $(".offer").on("input", function() {
            var offer = $('.offer').val();
            $('#offer_lbl').text(offer);
        });

    });
</script>
