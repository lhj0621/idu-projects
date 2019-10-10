
<div class="alert mycolor1 mymargin5" role="alert">제품선택</div>
<script>
    function find_text()
    {
		if (!form1.text1.value)		// 값이 없는 경우, 전체 자료
        form1.action="/~sale44/findproduct/lists";
		else		// 값이 있는 경우, text1 값 전달
        form1.action="/~sale44/findproduct/lists/text1/" + form1.text1.value;
		form1.submit();
    }
	function SendProduct(no, name, price)
	{
    opener.form1.product_no.value = no;
    opener.form1.product_name.value = name;
    opener.form1.price.value = price;
    opener.form1.prices.value = Number(price) * Number(opener.form1.numo.value);
    self.close();
	}

</script>

  <table class="table table-bordered table-sm mymargin5">
<form name="form1" action="" method="post">
    <div class="row">
        <div class="col-6" align="left">            
            <div class="input-group  input-group-sm">
    <div class="input-group-prepend">
        <span class="input-group-text">이름</span>
    </div>
    <input type="text" name="text1" value="<?=$text1;?>" class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" placeholder="찾을 이름은?"> <!--엔터키 -->

   <div class="input-group-append">
        <button class="btn btn-primary" type="button" onClick="find_text();">검색</button>  <!-- 버튼클릭 -->
    </div>
</div>

        </div>
        <div class="col-6" align="right">           

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
    <td align="left"><a href="javascript:SendProduct(<?=$row->no44?>,'<?=$row->name44?>',<?=$row->price44?>);">
	<?=$row->name44; ?></a></td>
	<td align="right"><?=number_format($row->price44) ?></td>
	<td align="right"><?=number_format($row->jaego44) ?></td>
</tr>
<?
    }
?>

</table>

<?=$pagination; ?>

