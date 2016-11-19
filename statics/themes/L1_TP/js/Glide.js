//<!CDATA[
function g(o){return document.getElementById(o);}
function hoverLi(n){
//如果有N个标签,就将i<=N;

  $(".news-tab-hd").removeClass("hovertab").addClass("normaltab");
  $(".news-tab").removeClass("dis").addClass("undis");

  $("#tb_" + n).removeClass("normaltab").addClass("hovertab");
  $("#tbc_0" + n).removeClass("undis").addClass("dis");
}
//如果要做成点击后再转到请将<li>中的onmouseover 改成 onclick;
//]]>
