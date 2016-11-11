    <!-- 公告列表右 -->
    <div class="Traffic-rightMid fr">
       <ul class="TrafficBut">
         <a href="{:getCategory(76,'url')}"><li><i><img src="{$config_siteurl}statics/themes/L1_TP/images/GA21.png"></i>政务信息公开</li></a>
         <a href="{:getCategory(77,'url')}"><li class="marginT20"><i><img src="{$config_siteurl}statics/themes/L1_TP/images/GA22.png"></i>交通管理公告</li></a>
         <a href="{:getCategory(78,'url')}"><li class="marginT20"><i><img src="{$config_siteurl}statics/themes/L1_TP/images/GA23.png"></i>机动车管理公告</li></a>
         <a href="{:getCategory(79,'url')}"><li class="marginT20"><i><img src="{$config_siteurl}statics/themes/L1_TP/images/GA24.png"></i>驾驶人管理公告</li></a>
         <a href="{:getCategory(80,'url')}"><li class="marginT20"><i><img src="{$config_siteurl}statics/themes/L1_TP/images/GA25.png"></i>交通管理公告</li></a>
       </ul>

    <notpresent name="catid">
        <assign name="catid" value="2" />
    </notpresent>
       <!-- 热门点击 -->
    <div class="Traffic-rightMid marginT20">
       <div class="line-height30"><i class="fl"><img src="{$config_siteurl}statics/themes/L1_TP/images/GA38.png"></i><span class="fs16 blue">热门点击</span></div>
       <div class="borderB-bule marginT5"></div>
       <content action="lists" catid="$catid" order="id DESC" num="10">
          <volist name="data" id="vo" offset="0" length="3" key="k">
               <dl class="HotClick marginT10">
                 <dt class="fl redBG marginR10">{$k}</dt><dd class="fl"><a href="{$vo.url}">{$vo.title|str_cut=###,15}</a></dd>
               </dl>
               <div class="dashed"></div>
          </volist>
          <volist name="data" id="vo" offset="3" length="7" key="k">
               <dl class="HotClick marginT10">
                 <dt class="fl blackBG marginR10">{$k+3}</dt><dd class="fl"><a href="{$vo.url}">{$vo.title|str_cut=###,15}</a></dd>
               </dl>
               <div class="dashed"></div>
          </volist>
        </content>
    </div>
    <!-- 热门点击结束 -->
    </div>
    <!-- 公告列表右结束 -->
