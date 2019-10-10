
<div class="alert mycolor1 mymargin5" role="alert">국가검색</div>
<script>
			function find_text(){
				if(!form1.text1.value)
					form1.action="/~team5/admin_findcity/lists";
				else
						form1.action="/~team5/admin_findcity/lists/text1/"+form1.text1.value+"/text2/"+form1.text2.value;
				form1.submit();
			}
			function SendCountry(country_no,country_name,no,name){
				opener.form1.country_no.value=country_no;
				opener.form1.country_name.value=country_name;
				opener.form1.city_no.value=no;
				opener.form1.city_name.value=name;
				self.close();
			}
		</script>

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>상품</h3>
              </div>
			<form name="form1" action="" method="post">
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
					<select name="text2" class="form-control form-control-sm">
						<?if($text2==$data["text2"]){?>
							<option value=1 selected>국가</option>
							<option value=2>도시</option>
						<?}else{?>
							<option value=1>국가</option>
							<option value=2 selected>도시</option>
						<?}?>
					</select>
                    <input type="text" name="text1" class="form-control" value="<?=$text1;?>" onKeydown="if (event.keyCode == 13) { find_text(); }" placeholder="찾을 이름은?">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button" onClick="find_text();">검색</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
		</div>
 
<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";   
?>
   <!------- <div class="col-8" align="right">           
             <a href="/~team5/admin_product/add<?=$tmp;?>" class="btn btn-sm mycolor1">추가</a>
				</div>
			 </div>
	---->
</form>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>국가 테이블 <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                    </ul>
                    <div class="clearfix"></div>
                  
				  </div>
<div class="x_content">
<table class="table table-striped">
<thead>
    <tr>
        <th>번호</th>
        <th>국가</th>
		<th>도시</th>
    </tr>
</thead>
<tbody>
<?
    foreach ($list as $row)
    {
        $no=$row->no;                     
?>
<tr>
    <td><?=$no; ?></td>
	<td><?=$row->country_name;?></td>
    <td><a href="javascript:SendCountry(<?=$row->country_no?>,'<?=$row->country_name?>',<?=$row->no?>,'<?=$row->name?>')"><?=$row->name; ?></a></td>
</tr>
<?
    }
?>
</tbody>
</table>

<?=$pagination; ?>

