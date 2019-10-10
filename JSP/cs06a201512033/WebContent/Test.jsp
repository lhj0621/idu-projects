<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
	String ip = request.getRemoteAddr();
	out.println(ip);
	String headerValue = request.getHeader("user-agent");
	if(headerValue.contains("Trident"))
		out.println("IE로 접속하셨습니다.");
	if(headerValue.contains("Chrome"))
		out.println("Chrome을 접속하셨습니다.");
	//out.println(headerValue);
	request.setAttribute("reqkey", "request 객체에 속성 저장 : forward 되야 유지");
	session.setAttribute("seskey", "session 객체에 속성 저장 : forware 되지 않아도 유지");
	//request.getRequestDispatcher("Test2.jsp").forward(request,response);
	response.sendRedirect("Test2.jsp");
%>
</body>
</html>