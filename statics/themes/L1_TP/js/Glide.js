//<!CDATA[
function g(o){return document.getElementById(o);}
function hoverLi(n){
//如果有N个标签,就将i<=N;
for(var i=1;i<=n;i++)
{g('tb_'+i).className='normaltab';
 g('tbc_0'+i).className='undis';}
 g('tbc_0'+n).className='dis';
 g('tb_'+n).className='hovertab';}
//如果要做成点击后再转到请将<li>中的onmouseover 改成 onclick;
//]]>