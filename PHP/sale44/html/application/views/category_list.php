
<div class="alert mycolor1 mymargin5" role="alert">카테고리</div>
<?
	$tmp = $text1 ? "/text1/$text1" : "";   
?>
<script>
    function find_text()
    {
		if (!form1.text1.value)		// 값이 없는 경우, 전체 자료
        form1.action="/~sale44/category/lists";
		else		// 값이 있는 경우, text1 값 전달
        form1.action="/~sale44/category/lists/text1/" + form1.text1.value;
		form1.submit();
    }
	$(function(){
			$("#category_add").click(function(){
				var name = $("#name").val();
				$.ajax({
					url: "/~sale44/category/category_insert",
					type: "POST",
					data:{
						"name":name
					},
					dataType:"html",
					complete: function(xhr, textStatus){
						var no = xhr.responseText;
						$("#table_list").append(
						"<tr id='rowno"+no+"'>"+
							"<td>"+ no + "</td>" +
							"<td><a href='/~sale44/category/view/no/"+ no +"<?=$tmp?>'>"+name+"</a></td>"+
							"<td><a href='#' rowno='"+no+"' class='category_del btn btn-sm mycolor1' onClick='javascript:confirm(\'삭제할까요?\');'>삭제</a></td>" + 
						"</tr>");
						$("#name").val('');
					}
				});
			});

			$("#table_list").on("click",".category_del",function(){
				$.ajax({
					url: "/~sale44/category/category_delete",
					type: "POST",
					data:{
						"no":$(this).attr("rowno")
					},
					dataType:"text",
					complete: function(xhr, textStatus){
						var no = xhr.responseText;
						$("#rowno"+no).remove();
					}
				});
			});

		});
	
</script>

  <table class="table table-bordered table-sm mymargin5" id="table_list">
<form name="form1" action="" method="post">
    <div class="row">
        <div class="col-4" align="left">            
            <div class="input-group  input-group-sm">
    <div class="input-group-prepend">
        <span class="input-group-text">이름</span>
    </div>
    <input type="text" name="text1" value="<?=$text1;?>" class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" placeholder="찾을 이름은?"> <!--엔터키 -->

   <div class="input-group-append">
        <button class="btn  btn-primary" type="button" onClick="find_text();">검색</button>  <!-- 버튼클릭 -->
    </div>
</div>

        </div>
        <div class="col-8" align="right">           
             <a href="#collapseExample" class="btn btn-sm mycolor1" data-toggle="collapse" aria-expanded="fales" aria-controls="collapseExample">추가</a>
        </div>
    </div>
</form>
    <tr class="mycolor2 mymargin5">
        <td width="10%">번호</td>
		<td width="90%">이름</td>
        <td width="10%">삭제</td>
    </tr>
<?
    foreach ($list as $row)
    {
        $no=$row->no44;                     
?>
<tr id="rowno<?=$no; ?>">
    <td><?=$no; ?></td>
    <td><a href="/~sale44/category/edit/no/<?=$no ?><?=$tmp;?>"><?=$row->name44; ?></a></td>
	<td>
		<a href="#" rowno="<?=$no; ?>" class="category_del btn btn-sm mycolor1" onClick="javascript:confirm('삭제할까요?');">삭제</a>
</tr>
<?
    }
?>

</table>
<div class="collapse mymargin5" id="collapseExample">
		<div class="card card-body" style="padding:0px 5px 0px 5px;">
			<table class="table table-sm table-bordered mymargin5 alert-primary">
				<form name="form2">
					<tr>
						<td width="10%"></td>
						<td width="80%">
							<input type="text" name="name" id="name" value="" class="form-control form-control-sm">
						</td>
						<td width="10%" style="vertical-align:middle">
							<a href="#" id="category_add" class="btn btn-sm btn-primary">저장</a>
						</td>
					</tr>
				</form>
			</table>
		</div>
</div>

<?=$pagination; ?>

