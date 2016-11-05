
        <div class="pull-right">
            <div class="notice-bar mar-t30">
                <div class="right-title">
                    <h4>{:getCategory(60,'catname')}</h4><a class="pull-right mar-r10 font-nor" href="{:getCategory(60,'url')}">更多</a>
                </div>
                <div class="notice-con">
                    <ul>
                        <content action="lists" catid="60" order="id DESC" num="8">
                            <volist name="data" id="vo">
                                <li><a href="{$vo.url}">{$vo.title|str_cut=###,18}</a></li>
                            </volist>
                        </content>
                    </ul>
                </div>
            </div>
            <div class="open-bar mar-t30">
                <div class="right-title">
                    <h4>警务公开</h4>
                </div>
                <div class="open-con">
                    <ul>
                        <li><img src="{$config_siteurl}statics/themes/L2_Flat/images/list-icon.png" width="64px" /><a href="{:U('Content/Index/lists', array('catid'=>45))}">公安简介</a></li>
                        <li><img src="{$config_siteurl}statics/themes/L2_Flat/images/list-icon.png" /><a href="http://weibo.com/u/2918589882?nick=%E9%87%91%E7%9B%BE%E5%B9%BF%E5%AE%89&is_hot=1">公安微博</a></li>
                        <li><img src="{$config_siteurl}statics/themes/L2_Flat/images/list-icon.png" /><a href="{:U('DirectorMail/Consult/add@' . C('GLOBAL_SITE_DOMAIN'), array('type'=>'wsjb'))}">网上报警</a></li>
                        <li><img src="{$config_siteurl}statics/themes/L2_Flat/images/list-icon.png" /><a href="{:U('Content/Site/l2_service')}">便民专栏</a></li>
                        <li><img src="{$config_siteurl}statics/themes/L2_Flat/images/list-icon.png" /><a href="#" class="disabled-link">民意征集</a></li>
                        <li><img src="{$config_siteurl}statics/themes/L2_Flat/images/list-icon.png" /><a href="{:U('DirectorMail/Index/add')}">局长信箱</a></li>               
                    </ul>
                </div>
            </div>
        </div>
