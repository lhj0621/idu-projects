
<div class="alert mycolor1 mymargin5" role="alert">제품</div>
<script>
    function find_text()
    {
		if (!form1.text1.value)		// 값이 없는 경우, 전체 자료
        form1.action="/~sale44/book/lists";
		else		// 값이 있는 경우, text1 값 전달
        form1.action="/~sale44/book/lists/text1/" + form1.text1.value;
		form1.submit();
    }
</script>

  <table class="table table-bordered table-sm mymargin5">
<form name="form1" action="" method="post">
    <div class="row">
        <div class="col-4" align="left">            
            <div class="input-group  input-group-sm">
    <div class="input-group-prepend">
        <span class="input-group-text ">이름</span>
    </div>
    <input type="text" name="text1" value="<?=$text1;?>" class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" placeholder="찾을 이름은?"> <!--엔터키 -->

   <div class="input-group-append">
        <button class="btn btn-primary mycolor1" type="button" onClick="find_text();">검색</button>  <!-- 버튼클릭 -->
    </div>
</div>
<?
	$tmp = $text1 ? "/text1/$text1" : "";   
?>
        </div>
        <div class="col-8" align="right">           
             <a href="/~sale44/book/add<?=$tmp;?>" class="btn btn-sm mycolor1">추가</a>
        </div>
    </div>
</form>
    <tr class="mycolor2 mymargin5">
        <td width="12%">사진</td>
		<td width="10%">분야</td>
        <td width="20%">제목</td>
		<td width="26%">작가</td>
        <td width="10%">출판사</td>
        <td width="10%">단가</td>
        <td width="12%">상태</td>

    </tr>
<?
    foreach ($list as $row)
    {
        $no=$row->no44; 
		$status = $row->status44==0 ? "대여가능" : "대여불가" ;  
		$iname=$row->pic44 ? $row->pic44 : "";
?>
<tr>
    <td><img src="/~sale44/book_img/thumb/<?=$iname?>" class="mythumb_image"></td>
    <td><br><br><br><?=$row->category_name; ?></td>
    <td><br><br><br><a href="/~sale44/book/view/no/<?=$no ?><?=$tmp;?>"><?=$row->title44; ?></a></td>
	<td><br><br><br><?=$row->author44; ?></td>
	<td><br><br><br><?=$row->publisher44; ?></td>
	<td><br><br><br><?=number_format($row->price44) ?></td>
	<td><br><br><br><?=$status ?></td>
</tr>
<?
    }
?>

</table>

<?=$pagination; ?>

