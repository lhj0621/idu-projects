
<div class="alert mycolor1 mymargin5" role="alert">상품</div>
<script>
    function find_text()
    {
		if (!form1.text1.value)		// 값이 없는 경우, 전체 자료
        form1.action="/~team5/admin_product/lists";
		else		// 값이 있는 경우, text1 값 전달
        form1.action="/~team5/admin_product/lists/text1/" + form1.text1.value;
		form1.submit();
    }
	function Sendproduct(no,name){
				opener.form1.product_no.value=no;
				opener.form1.product_name.value=name;
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
                    <h2>상품 테이블 <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                   
                      <li><a href="/~team5/admin_product/add<?=$tmp;?>">추가</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  
				  </div>
<div class="x_content">
<table class="table table-striped">
<thead>
    <tr>
        <th>번호</th>
		<th>이름</th>
        <th>국가</th>
        <th>기간</th>
		<th>항공사</th>
        <th>가격</th>
		<th>이벤트</th>
		<th>총인원</th>
		<th>재고</th>
    </tr>
</thead>
<tbody>
<?
    foreach ($list as $row)
    {
        $no=$row->no;                     
        $event = $row->event == 0 ? "hit" : "hot" ;   
?>
<tr>
    <td><?=$no; ?></td>
    <td><a href="javascript:Sendproduct(<?=$row->no?>,'<?=$row->name?>')"><?=$row->name; ?></a></td>
    <td><?=$row->country_name; ?></td>
    <td><?=$row->term; ?></td>
	<td><?=$row->airline; ?></td>
	<td><?=$row->price; ?></td>
	<td><?=$event; ?></td>
	<td><?=$row->personnel; ?></td>
	<td><?=$row->stock; ?></td>
</tr>
<?
    }
?>
</tbody>
</table>

<?=$pagination; ?>

