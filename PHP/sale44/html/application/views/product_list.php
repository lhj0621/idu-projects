
<div class="alert mycolor1 mymargin5" role="alert">제품</div>
<script>
    function find_text()
    {
		if (!form1.text1.value)		// 값이 없는 경우, 전체 자료
        form1.action="/~sale44/product/lists";
		else		// 값이 있는 경우, text1 값 전달
        form1.action="/~sale44/product/lists/text1/" + form1.text1.value;
		form1.submit();
    }
</script>

  <table class="table table-bordered table-sm mymargin5">
<form name="form1" action="" method="post">
    <div class="row">
        <div class="col-4" align="left">            
            <div class="input-group  input-group-sm">
    <div class="input-group-prepend">
        <span class="input-group-text">이름</span>
    </div>
    <input type="text" name="text1" value="<?=$text1;?>" class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" placeholder="찾을 이름은?"> <!--엔터키 -->

   <div class="input-group-append">
        <button class="btn btn-primary" type="button" onClick="find_text();">검색</button>  <!-- 버튼클릭 -->
    </div>
</div>
<?
	$tmp = $text1 ? "/text1/$text1" : "";   
?>
        </div>
        <div class="col-8" align="right">           
             <a href="/~sale44/product/add<?=$tmp;?>" class="btn btn-sm mycolor1">추가</a>
			<a href="/~sale44/product/jaego<?=$tmp;?>" class="btn btn-sm mycolor1">재고 계산</a>

        </div>
    </div>
</form>
    <tr class="mycolor2 mymargin5">
        <td width="10%">번호</td>
		<td width="20%">구분명</td>
        <td width="30%">제품명</td>
        <td width="20%">단가</td>
        <td width="20%">재고</td>

    </tr>
<?
    foreach ($list as $row)
    {
        $no=$row->no44;                     
?>
<tr>
    <td><?=$no; ?></td>
    <td><?=$row->gubun_name; ?></td>
    <td align="left"><a href="/~sale44/product/view/no/<?=$no ?><?=$tmp;?>"><?=$row->name44; ?></a></td>
	<td align="right"><?=number_format($row->price44) ?></td>
	<td align="right"><?=number_format($row->jaego44) ?></td>
</tr>
<?
    }
?>

</table>

<?=$pagination; ?>

