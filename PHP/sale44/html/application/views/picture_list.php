
<div class="alert mycolor1 mymargin5" role="alert">제품 사진</div>
<script>
    function find_text()
    {
		if (!form1.text1.value)		// 값이 없는 경우, 전체 자료
        form1.action="/~sale44/findbook/lists";
		else		// 값이 있는 경우, text1 값 전달
        form1.action="/~sale44/findbook/lists/text1/" + form1.text1.value;
		form1.submit();
    }
	function zoomimage(iname, pname)
		{
			w = window.open("/~sale44/picture/zoom/iname/" + iname + "/pname/" + pname, "imageview", "resizable=yes, scrollbars=yes, status=no, width=800, height=600");
			w.focus();
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
        <button class="btn btn-primary mycolor1" type="button" onClick="find_text();">검색</button>  <!-- 버튼클릭 -->
    </div>
</div>
        </div>
        <div class="col-8" align="right">           
        </div>
    </div>
</form>
<br>
	<div class="row">
<?
    foreach ($list as $row)
    {
		$no=$row->no44; 
        $iname=$row->pic44 ? $row->pic44 : "";
		$pname=$row->title44;
?>
<div class="col-3" align="middle">
	<div class="mythmb_box">
	<a href="/~sale44/book/view/no/<?=$no?>">
		<img src="/~sale44/book_img/<?=$iname?>" class="mythumb_image ">
	</a>
	<div class="mycolor1"><?=$pname?></div>
	</div>
</div>
<?
    }
?>
</div>
</table>

<?=$pagination; ?>

