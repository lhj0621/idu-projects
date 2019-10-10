
<div class="alert mycolor1 mymargin5" role="alert">식품</div>
<script>
    function find_text()
    {
		if (!form1.text1.value)		// 값이 없는 경우, 전체 자료
        form1.action="/~sale44/food/lists";
		else		// 값이 있는 경우, text1 값 전달
        form1.action="/~sale44/food/lists/text1/" + form1.text1.value;
		form1.submit();
    }
</script>

  <table class="table table-bordered table-sm mymargin5">
<form name="form1" action="" method="post">
    <div class="row">
        <div class="col-4" align="left">            
            <div class="input-group  input-group-sm">
    <div class="input-group-prepend">
        <span class="input-group-text">식품</span>
    </div>
    <input type="text" name="text1" value="<?=$text1;?>" class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" placeholder="찾을 식품은?"> <!--엔터키 -->

   <div class="input-group-append">
        <button class="btn  btn-primary" type="button" onClick="find_text();">검색</button>  <!-- 버튼클릭 -->
    </div>
</div>
<?
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";   
?>
        </div>
        <div class="col-8" align="right">           
            
        </div>
    </div>
</form>
    <tr class="mycolor2 mymargin5">
        <td>번호</td>
		<td>이름</td>
        <td>날짜</td>
        <td>품질</td>
        <td>수량</td>
        <td>배송지</td>
		<td>특이사항</td>
    </tr>
<?
    foreach ($list as $row)
    {
        $no=$row->food_Id;                     

?>
<tr>
    <td><img src="/~sale44/my/img/apple.png" width="300"  alt=""></td>
    <td><a href="/~sale44/food/view/no/<?=$no ?><?=$tmp;?>"><?=$row->food_Name; ?></a></td>
    <td><?=$row->food_Date; ?></td>
    <td><?=$row->food_Quality; ?></td>
	<td><?=$row->food_EA; ?></td>
	<td><?=$row->food_From; ?></td>
	<td><?=$row->food_Comment; ?></td>
</tr>
<?
    }
?>

</table>

<?=$pagination; ?>

