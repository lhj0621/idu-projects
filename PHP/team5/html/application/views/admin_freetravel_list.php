
<div class="alert mycolor1 mymargin5" role="alert">자유여행</div>
<script>
    function find_text()
    {
		if (!form1.text1.value)		// 값이 없는 경우, 전체 자료
        form1.action="/~team5/admin_freetravel/lists";
		else		// 값이 있는 경우, text1 값 전달
        form1.action="/~team5/admin_freetravel/lists/text1/" + form1.text1.value;
		form1.submit();
    }
</script>

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>자유여행</h3>
              </div>
			<form name="form1" action="" method="post">
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
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
             <a href="/~team5/admin_country/add<?=$tmp;?>" class="btn btn-sm mycolor1">추가</a>
				</div>
			 </div>
	---->
</form>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>자유여행 테이블<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a href="/~team5/admin_freetravel/add<?=$tmp;?>">추가</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  
				  </div>
<div class="x_content">
<table class="table table-striped">
<thead>
    <tr>
        <th>번호</th>
		<th>투어명</th>
		<th>국가</th>
		<th>도시</th>

		<th>상품번호</th>
		<th>기간</th>
		<th>출발일</th>
		<th>도착일</th>

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
    <td><a href="/~team5/admin_freetravel/view/no/<?=$no ?><?=$tmp;?>"><?=$row->name; ?></a></td>
	<td><?=$row->country_name?></td>
	<td><?=$row->city_name?></td>
	<td><?=$row->product_no?></td>
	<td><?=$row->term?></td>
	<td><?=$row->startday?></td>
	<td><?=$row->endday?></td>


</tr>
<?
    }
?>
</tbody>
</table>

<?=$pagination; ?>

