
<h1>Прайс</h1>
<div class="line" style="background-color:#5BC1B5"></div>
<div id="expand_all" style="float:right;width:110px;cursor:pointer;background-color:#6699CC;color:#FFFFFF;font-family:sans-serif;
font-size:11px;
font-weight:bold;padding:2px;border-radius: 3px;padding-left:5px;margin-top:2px;">развернуть все</div>
<div id="upload_price" style="float:right;width:110px;cursor:pointer;background-color:#6699CC;color:#FFFFFF;font-family:sans-serif;
font-size:11px;
font-weight:bold;padding:2px;border-radius: 3px;padding-left:5px;margin-top:2px;margin-right:10px;" data-href="/download/price.xls">скачать прайс</div>
<br><br>
<?php
$rowclass = 0;
foreach($section as $p){
    echo '<div class="price_section">'.$p->id.' '.$p->name.'</div>
<div class="price">';

    echo '<p style="float:right">Цены указаны в у.е. (*) в рекламных целях.</p>
<div class="clear"></div>';
    echo '<table width="100%" cellpadding="0" cellspacing="0">
		<tr class="head_table">
<td align="center">Название</td>
<td width="100">Цена у.е.(*)</td>
<td width="100">Цена ГРН</td>
</tr>';
    foreach($price as $list){
        if($list->section_id == $p->id){
            $class = ($rowclass++ % 2) ? '#E2E2E2' : '#EFEFEF';
            if ($list['num_name'] != '') {
                echo '<tr style="background-color: ' . $class . '"><td colspan="3"> <strong>' . $list['num_name'] . ' ' . $list['name'] . '</strong></td></tr>';
            }else{
                echo '<tr style="background-color: ' . $class . '"><td>' . $list['name'] . '</td><td width="100">' . $list['price_usd'] . '*</td><td width="100">' . $list['price_grn'] . '</td></tr>';
            }
        }
    }
    echo '</table>';

    echo '</div>';
}
?>
<br>
