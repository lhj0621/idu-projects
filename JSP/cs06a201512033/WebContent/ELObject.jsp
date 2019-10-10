<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<a href="param.jsp?name=induk&dept=comso">파라미터</a>
<%@ page import="java.util.*" %>
<%
	ArrayList<String> bookNames = new ArrayList<String>();
	bookNames.add("c++");
	bookNames.add("c#");
	bookNames.add(0,"jsp");
	bookNames.add("android");
	bookNames.add("javascript");
	request.setAttribute("list", bookNames);
	
	//request, session 객체에 지정한 속성을 저장
	request.setAttribute("req", "요청 객체");
	session.setAttribute("email", "세션-이메일");
	session.setAttribute("req", "세션-요청");
	//requestScope.req : el의 기본 객체이기 때문에 사용하 수 없음
%>
<h1>${list[0] }</h1>
<!-- requestScope와 sessionScope는 EL의  유효범위를 관히라 때 사용하는 기복 객체 -->
<h1><%= request.getAttribute("req") %></h1>
<h1>${requestScope.req }</h1>
<h1>${req }</h1><!-- EL의 경우 속성을 page, request, session, application 유효범위 순으로 검색 -->

<h1><%= session.getAttribute("email") %></h1>
<h1>${sessionScope.email }</h1>
<h1>${email }</h1><!-- EL의 경우 속성을 page, request, session, application 유효범위 순으로 검색 -->

</body>
</html>