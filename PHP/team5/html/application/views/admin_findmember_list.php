
<div class="alert mycolor1 mymargin5" role="alert">사용자</div>
<script>
    function find_text()
    {
		if (!form1.text1.value)		// 값이 없는 경우, 전체 자료
        form1.action="/~team5/admin_member/lists";
		else		// 값이 있는 경우, text1 값 전달
        form1.action="/~team5/admin_member/lists/text1/" + form1.text1.value;
		form1.submit();
    }
	function Sendmember(no,name){
				opener.form1.member_no.value=no;
				opener.form1.member_name.value=name;
				self.close();
	}
</script>

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>사용자</h3>
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
             <a href="/~team5/admin_member/add<?=$tmp;?>" class="btn btn-sm mycolor1">추가</a>
				</div>
			 </div>
	---->
</form>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>사용자 테이블 <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a href="/~team5/admin_member/add<?=$tmp;?>">추가</a>
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
        <th>아이디</th>
        <th>암호</th>
        <th>전화</th>
		<th>나이</th>
		<th>성별</th>
		<th>이메일</th>
        <th>등급</th>
    </tr>
</thead>
<tbody>
<?
    foreach ($list as $row)
    {
        $no=$row->no;                     
        $tel1 = trim(substr($row->tel,0,3));  
        $tel2 = trim(substr($row->tel,3,4));   
        $tel3 = trim(substr($row->tel,7,4));      
        $tel = $tel1 . "-" . $tel2 . "-" . $tel3;
		$gender = $row->gender==0 ? "남자" : "여자" ;   
        $rank = $row->rank==0 ? "사용자" : "관리자" ;   
?>
<tr>
    <td><?=$no; ?></td>
    <td><a href="javascript:Sendmember(<?=$row->no?>,'<?=$row->name?>')"><?=$row->name; ?></a></td>
    <td><?=$row->id; ?></td>
    <td><?=$row->pw; ?></td>
	<td><?=$tel; ?></td>
	<td><?=$row->age; ?></td>
	<td><?=$gender; ?></td>
	<td><?=$row->email; ?></td>
    <td><?=$rank; ?></td>
</tr>
<?
    }
?>
</tbody>
</table>

<?=$pagination; ?>

