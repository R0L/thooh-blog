<div class="widget widget-tabs">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab"
                                                  data-toggle="tab" draggable="false">统计信息</a></li>
        <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab"
                                   draggable="false">联系站长</a></li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane contact active" id="notice">
            <h2>日志总数:
                {{$articleTotal or 0}}篇
            </h2>
            <h2>网站运行:
                <span id="sitetime"><SCRIPT language=javascript>
       <!--
       BirthDay=new Date("may 20,2012");
       today=new Date();
       timeold=(today.getTime()-BirthDay.getTime());
       sectimeold=timeold/1000
       secondsold=Math.floor(sectimeold);
       msPerDay=24*60*60*1000
       e_daysold=timeold/msPerDay
       daysold=Math.floor(e_daysold);
       document.write("<font color=red>"+daysold+"</font>天 !");
       //-->
</SCRIPT> </span></h2>
        </div>
        <div role="tabpanel" class="tab-pane contact" id="contact">
            <h2>QQ:
                <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=577211782&amp;site=qq&amp;menu=yes"
                   target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title=""
                   draggable="false" data-original-title="QQ:208075740">208075740</a>
            </h2>
            <h2>Email:
                <a href="mailto:577211782@qq.com" target="_blank" data-toggle="tooltip" rel="nofollow"
                   data-placement="bottom" title="" draggable="false"
                   data-original-title="Email:577211782@qq.com">208075740@qq.com</a></h2>
        </div>
    </div>
</div>